<?php defined('SYSPATH') or die('No direct script access.');


/**
 * EGP_GameReservation
 *
 * @package default
 * @author Cesar Jacquet
 */
class EGP_GameReservation
{
	
	private $formData		= array();	// NEWFLOW

	public $beginDateTime;				// Slot horaire de la partie
	private $idTrace;					// NEWFLOW Id du trace en cours pour cette resa: normal, InOut, etc... (initialisé avec l'objet)
	private $startHole;					// NEWFLOW

	public $slotAller;					// objet de type  EGP_GameSlot ou null
	public $slotRetour;					// objet de type  EGP_GameSlot ou null
	public $slotCurrent;				// pointeur sur un des 2 objet de type EGP_GameSlot suivant: slotAller ou slotRetour

	private $isProvisoire	= false;	// Reservation provisoire ou permanente

	private $isWizard		= false;	// Res en provenance du wizard

	public $isValid			= true;
	public $message			= "";

	private $maxPlayers;				// Lu depuis Settings::get('max_players_by_game'); 
	private $userIdMin;					// Lu depuis Settings::get('id_min_user')
	private $temporaryLifeSetting;		// Lu depuis Settings::get('resa_provi_timeout_xxx')


	////////////////////////////////
	// PUBLIC FUNCTIONS ////////////
	////////////////////////////////

	// public function getTrouDepart(){
	// 	return $this->trouDepart;
	// }	// getter
	//
	// public function setTrouDepart($value){
	// 	$this->trouDepart = $value;
	// 	// $this->UpdatePlayersParcours();	// DEPRECATED
	// 	$this->LoadParcoursToSlot();
	// }	// setter avec mise à jour des parcours joueurs
	
	/**
	 * getStartHole
	 *
	 * @return int
	 * @author Cesar Jacquet
	 */
	public function getStartHole(){
		return $this->trouDepart;
	}	// getter

	/**
	 * setStartHole
	 *
	 * @param string $value 
	 * @return boolean
	 * @author Cesar Jacquet
	 */
	public function setStartHole($value){
		if (intval($value) == 1 || intval($value) == 10){
			$this->startHole = $value;
			return true;
		}else if($this->isWizard){
			return true;
		}else{
			$this->isValid = false;
			$this->message = "ERREUR, le trou de départ est incohérent !";
			return false;
		}
	}	// setter
	
	////////////////////////////////
	// INIT FUNCTIONS ////////////
	////////////////////////////////

	/**
	 * EGP_GameReservation function
	 *
	 * @param string $current_trace 
	 * @param string $isProvisoire 
	 * @param string $isWizard 
	 * @return void
	 * @author Cesar Jacquet
	 */
	public function EGP_GameReservation($current_trace = 1, $isProvisoire = false, $isWizard = false)
	{
		$this->maxPlayers 			= Settings::get('max_players_by_game');
		$this->userIdMin 			= Settings::get('id_min_user');
		$this->temporaryLifeSetting	= Settings::get('resa_provi_timeout_public');
		$this->idTrace 				= Settings::get('id_trace');			// TODO gérer le tracé en fonction de la date
		$this->beginDateTime 		= new DateTime();	// pour que ce soit bien un objet initialisé
		$this->slotAller 			= new  EGP_GameSlot(null, $isProvisoire);
		$this->slotRetour 			= new  EGP_GameSlot(null, $isProvisoire);
		$this->slotCurrent 			= &$this->slotAller;
		$this->isProvisoire			= $isProvisoire;

	}	// EGP_GameReservation

	/**
	 * InitResa
	 *
	 * @param string $post 
	 * @param string $isProvi 
	 * @return void
	 * @author Cesar Jacquet
	 */
	public function InitResa($post, $isProvi = false)
	{
		//////////////////////////////////////////////////////////
		// Récupération des données du formulaire				//
		
		$this->formData['date_resa'] 			= Arr::get( $post, 'date_resa');
		$this->formData['heure_resa'] 			= Arr::get( $post, 'heure_resa');
		$this->formData['trou_depart'] 			= Arr::get( $post, 'trou_depart');
		$this->formData['nb_trous'] 			= Arr::get( $post, 'nb_trous');		// uniquement pour wizard TODO A supprimer
		$this->formData['nb_joueurs'] 			= Arr::get( $post, 'nb_joueurs');	// TODO A SUPPRIMER
		$this->formData['event_type'] 			= Arr::get( $post, 'event_type');
		$this->formData['crud_mode'] 			= Arr::get( $post, 'crud_mode');
		$this->formData['id_resa_provi_aller'] 	= Arr::get( $post, 'id_resa_provi_aller');
		$this->formData['id_resa_provi_retour'] = Arr::get( $post, 'id_resa_provi_retour');
		$this->formData['current_user_id'] 		= Arr::get( $post, 'current_user_id');

		if(!$this->formData['trou_depart']){
			$this->isWizard = true;
		}
		
		//////////////////////////////////////////////////////////
		// Vérification de la date								//
		
		$elem = explode('/', $this->formData['date_resa']); // 20/12/2012
		$datetmp = $elem[2].'-'.$elem[1].'-'.$elem[0].' '.$this->formData['heure_resa'].':00';	// Date et heure de la partie
		$this->beginDateTime = new DateTime($datetmp);	// Datetime du début de partie: Slot horaire

		if(!$this->CheckPostDateAndTime()){	// probleme dans les dates
			return array(
				'valid' => $this->isValid,
				'message' => $this->message
			);
		}
		
		//////////////////////////////////////////////////////////
		// Trou de depart										//
		if(!$this->setStartHole($this->formData['trou_depart'])){
			return array(
				'valid' => $this->isValid,
				'message' => $this->message
			);
		};

		//////////////////////////////////////////////////////////
		// Récupération eventuelle des resa provi				//

		$this->slotAller->id = $this->formData['id_resa_provi_aller'];
		$this->slotRetour->id= $this->formData['id_resa_provi_retour'];
		
		//////////////////////////////////////////////////////////
		// Récupération des parcours							//

		if(!$this->LoadParcoursToSlot() && !$this->isWizard){
			return array(
				'valid' => $this->isValid,
				'message' => $this->message
			);
		}

		//////////////////////////////////////////////////////////
		// Récupération et validation des joueurs				//

		// Construction du tableau de ressource de ce golf
		$golf_ressources = DB_SQL::select("default")
			->from("ressources")
				->where("id_golf", "=", Settings::get('current_golf'))
					->query();

		// Création des joueurs pour l'Aller et le Retour
		for($i = 0; $i < $this->maxPlayers; $i++) {
			
			$crudPlayer = Arr::get( $post, 'crud_J'.($i+1));
			if(($crudPlayer == "none") || ($crudPlayer == "Read"))
				continue;

			$formplayerid = Arr::get( $post, 'id_J'.($i+1), -1);	// default to -1
			if($formplayerid >= 0) {
				$formplayernbtrous = Arr::get( $post, 'nb_trous_J'.($i+1));
				if(!$formplayernbtrous) {
					$formplayernbtrous = Arr::get( $post, 'nb_trous');	// Si resa du Wizard
				}
				$pl	= DB_ORM::model('users',array($formplayerid));
				$pl->load();
				$info = "";
				if($formplayerid == 0 || $formplayerid == 1 || $formplayerid == 2) {
					$info = Arr::get( $post, 'joueur'.($i+1));
				}
				$newplayer = new EGP_GamePlayer($formplayerid, $formplayernbtrous, $pl->firstname, $pl->lastname, $info);
				$newplayer->setCrudState($crudPlayer);
				
				//////////////////////////////////////////////////////////
				// Récupération des ressources demandées				//
				
				$formplayerres = Arr::get( $post, 'res_J'.($i+1));

				if($formplayerres){
					// Le joueur a des ressources
					// TODO gerer le codage des ressources
					foreach($golf_ressources as $res) {
						if($res['id'] == "2"){			// TODO gerer toutes les ressources
							$newplayer->ressources[] = $res["ressource"];
							$newplayer->ressourcesIds[] = $res["id"];
						}
					}
				}

				// Ajout du joueur dans le slot Aller
				$this->slotAller->addPlayer($newplayer);

				// Ajout du joueur dans le slot Retour si besoin
				if($newplayer->nbTrous == 18){
					$retourPlayer = clone($newplayer);	// clonage du joueur
					$this->slotRetour->addPlayer($retourPlayer);
				}
			}
		}

		if(!$this->isProvisoire){
			if(!$this->CheckPostNbPlayers()){	// probleme dans les joueurs
				return array(
					'valid' => $this->isValid,
					'message' => $this->message
				);
			}
		}

		
		//////////////////////////////////////////////////////////
		//Tout semble ok										//
		
		return array(
			'valid' => $this->isValid,		// ici uniquement true
			'message' => $this->message
		);

		//////////////////////////////////////////////////////////

	}	// InitResa
	
	/**
	 * InitResaByLoading
	 *
	 * @param string $id_resa 
	 * @return array
	 * @author Cesar Jacquet
	 */
	public function InitResaByLoading($id_resa)
	{
		// On charge la ligne de la resa
		$postresa = DB_ORM::model("reservation", array($id_resa));

		// Init de beginDatetime
		$this->beginDateTime = new DateTime($postresa->date_reservation);	// Datetime du début de partie: Slot horaire

		// Récupère la reservation lié si il y en a une
		$linkedresa = DB_ORM::model("reservation");
		
		if($postresa->id_parent == null || $postresa->id_parent == 0) {	// id_parent est soit null soit > 0
			// ce slot est un parcours 9 trous ou l'aller d'un 18 trous
			$this->slotAller->setSlot($postresa,  EGP_GameSlot::UNIQ);
			$this->slotCurrent = &$this->slotAller;	// on met à jour le current
			
			// On positionne le trou de départ de la partie
			$this->setStartHole($this->slotAller->startTee);	// Mise à jour du trou de départ
			
			if($postresa->id_children > 0){
				// ce slot est donc l'aller d'un 18 trous
				$linkedresa->id = $postresa->id_children;
				$linkedresa->load();
				$this->slotRetour->setSlot($linkedresa,  EGP_GameSlot::RETOUR);
				$this->slotAller->gameType =  EGP_GameSlot::ALLER;	// changement de type pour l'aller
			}else{
				// C'est une partie en 9T, on a fini, on charge les parcours dans les slots
				$this->LoadParcoursToSlot();
			}
		}else{
			// c'est une resa liée, ce slot est donc un parcours retour d'un 18 trous
			$linkedresa->id = $postresa->id_parent;
			$linkedresa->load();
			$this->slotRetour->setSlot($postresa,  EGP_GameSlot::RETOUR);	//le retour c'est le slot courant
			$this->slotAller->setSlot($linkedresa,  EGP_GameSlot::ALLER);	//l'aller c'est la resa liée
			$this->slotCurrent = &$this->slotRetour;	// on met à jour le pointeur current

			// On positionne le trou de départ de la partie
			$this->setStartHole($this->slotAller->startTee);
		}

		// On recupère les joueurs et leurs nombres de trous respectifs
		if($this->slotCurrent->gameType ==  EGP_GameSlot::UNIQ){

			//cette partie est en 9 trous, donc pas de retour à chercher
			$users_has_resa = DB_SQL::select("default")
				->from("users_has_reservation")
					->where("id_reservation", "=", $this->slotAller->id)
						->query();	// tous les users ayant une resa à ce slot horaire

			// Ajout des joueurs dans le slot
			foreach($users_has_resa as $loopitem){
				$pl = DB_ORM::model('users',array($loopitem['id_users']));
				$newplayer = new EGP_GamePlayer($pl->id, 9, $pl->firstname, $pl->lastname, $loopitem['info']);
				$newplayer->userHasResa = $loopitem['id'];
				$newplayer->setCrudState("Read");
				
				$this->slotCurrent->addPlayer($newplayer);
			}
		}else{
			//cette partie est en 18 trous, on cherche quels joueurs font le retour
			$users_has_resa = DB_SQL::select("default")
				->from("users_has_reservation")
					->where("id_reservation", "=", $this->slotAller->id)
						->query();	// tous les users ayant une resa à ce slot horaire

			$users_has_retour = DB_SQL::select("default")
				->from("users_has_reservation")
					->where("id_reservation", "=", $this->slotRetour->id)
						->query();	// tous les users ayant une resa Retour

			foreach($users_has_resa as $loopitem){
				$pl = DB_ORM::model('users',array($loopitem['id_users']));
				$usernbtrous = 9;
				$userhasretour = false;
				foreach($users_has_retour as $loopretour){
					if($loopretour['id_users'] == $loopitem['id_users']){
						$userhasretour    = true;
						$usernbtrous      = 18;
						$user_resa_retour = $loopretour['id'];
						break;
					}
				}
				// Ajout du joueur dans le slot Aller
				$newplayer = new EGP_GamePlayer($pl->id, $usernbtrous, $pl->firstname, $pl->lastname, $loopitem['info']);
				$newplayer->userHasResa = $loopitem['id'];
				$newplayer->setCrudState("Read");

				$this->slotAller->addPlayer($newplayer);

				if($userhasretour){
					// Ajout du joueur dans le slot Retour
					$player_retour = new EGP_GamePlayer($pl->id, $usernbtrous, $pl->firstname, $pl->lastname, $loopitem['info']);
					$player_retour->userHasResa = $user_resa_retour;
					$player_retour->setCrudState("Read");

					$this->slotRetour->addPlayer($player_retour);
				}
			}
		}

		// Récupération des ressources demandées
		$users_has_resa = DB_SQL::select("default")
			->from("users_has_reservation")
				->where("id_reservation", "=", $this->slotAller->id)
					->query();	// tous les users ayant une resa à ce slot horaire

		$idx = 0;
		foreach($users_has_resa as $loopitem){
			$user_ressources =  DB_SQL::select("default")
					->from("user_reservation_ressources")
						->where("id_user_has_reservation", "=", $loopitem['id'])
							->query();

			$userId = $loopitem['id_users'];

			foreach($user_ressources as $res) {

				$golfres = DB_ORM::model('ressources', array($res['id_ressources']));

				$this->slotAller->players[$userId]->ressourcesIds[] = $res['id_ressources'];
				$this->slotAller->players[$userId]->ressources[] = $golfres->ressource;

				if($this->slotAller->players[$userId]->nbTrous == 18){
					$this->slotRetour->players[$userId]->ressourcesIds[] = $res['id_ressources'];
					$this->slotRetour->players[$userId]->ressources[] = $golfres->ressource;
				}
			}
			$idx++;
		}
		
		return array(
			'valid' => $this->isValid,
			'message' => $this->message
		);
	}	//InitResaByLoading

	////////////////////////////////
	////////////////////////////////
	////////////////////////////////

	/**
	 * CheckPostDateAndTime
	 *
	 * @return void
	 * @author Cesar Jacquet
	 */
	public function CheckPostDateAndTime()	// check de la cohérence de la date => après maintenant
	{
		// TODO ajouter la vérification que l'heure soit bien dans les horaires du Golf
		$this->isValid = true;
		$currentDateTime = new DateTime();	// basée sur la date actuelle

		if($this->beginDateTime < $currentDateTime) {	// TODO utiliser un parametre pour la date minimum de resa
			$this->message = "ERREUR : La date à laquelle vous souhaitez réserver est passée.";
			$this->isValid = false;
		}

		if(!$this->isValid){
			Log::instance()->add(Log::NOTICE, "GameReservation::CheckPostDateAndTime: " .$this->message);
		}
		return $this->isValid;
	}	// CheckPostDateAndTime
	
	/**
	 * CheckPostNbPlayers
	 *
	 * @return void
	 * @author Cesar Jacquet
	 */
	public function CheckPostNbPlayers()	// check du nombres de joueurs => entre 1 et 4
	{
		if(	$this->slotAller->nbPlayers() < 1 || $this->slotAller->nbPlayers() > $this->maxPlayers){
			$this->message = "ERREUR : Nombre de joueurs non valide";
			Log::instance()->add(Log::NOTICE, "GameReservation::CheckPostNbPlayers: " .$this->message);
			$this->isValid = false;
		}else{
			$this->isValid = true;
		}
		return $this->isValid;
	}	// CheckPostNbPlayers

	/**
	 * LoadParcoursToSlot
	 *
	 * @return boolean
	 * @author Cesar Jacquet
	 */
	private function LoadParcoursToSlot()
	{
		// LoadParcoursToSlot a besoin uniquement du startHole et du idTrace pour initialiser les slotAller et slotRetour
		
		// Récupération du parcours complet pour la partie
		$rq_parcours = DB_SQL::select('default')	// on s'interesse aux 2 demi-parcours
			->from('golf_courses')
				->column('golf_courses.id')
					->column('golf_courses.parcours_aller')
						->column('golf_courses.parcours_retour')
							->where("golf_courses.trou_depart", "=", $this->startHole)
								->where("golf_courses.id_trace", "=", $this->idTrace, "AND")
									->where("golf_courses.nb_trous_total", "=", 18, "AND")
										->query();
		if(count($rq_parcours) != 1){
			$this->isValid = false;
			$this->message = "ERREUR dans la récupération du parcour pour cette partie";
			return false;
		}
		
		// Le parcours est composée des 2 demi-parcours
		$parcours = $rq_parcours[0];		// TODO a changer. toujours égal à 3 et c'est faux pour un 9T

		// Récuperation des durées des parcours

		$typeparcours	= DB_ORM::model('type_parcours');

		// parcours Aller
		$typeparcours->id = $parcours['parcours_aller'];
		$typeparcours->load();
		
		if(!$this->slotAller->setParcours($typeparcours->id, $this->beginDateTime)){	// Init du parcours
			$this->isValid = false;
			$this->message = "ERREUR Incohérence de la base pour cette partie";
			return false;
		}

		// parcours Retour
		$typeparcours->id = $parcours['parcours_retour'];
		$typeparcours->load();

		$horaireduslot_retour = new Datetime($this->beginDateTime->format('Y-m-d H:i:s'));
		$horaireduslot_retour->add(new DateInterval('PT' .$this->slotAller->duration .'S'));

		if(!$this->slotRetour->setParcours($typeparcours->id, $horaireduslot_retour)){	// Init du parcours
			$this->isValid = false;
			$this->message = "ERREUR Incohérence de la base pour cette partie";
			return false;
		}

		return true;
	}	// LoadParcoursToSlot

	/**
	 * CreateDigest
	 *
	 * @return void
	 * @author Cesar Jacquet
	 */
	public function CreateDigest()
	{
		//////////////////////////////////////////////////////////////////////////
		// Concept: Verifier la cohérence des infos et conflits et faire le résumé
		//////////////////////////////////////////////////////////////////////////
		$digest = array(
			'valid'		=> true,
			'message'	=> '',
			'date'		=> '',
			// 'trou_depart'=> '',
			'sh'=> '',	//start_hole
			'nb_trous'	=> '',
			'players'	=> array(),
			// 'ressources'=> array(),
			'duree'		=> '',
			'heure_fin'	=> ''
		);
		//////////////////////////////////////////////////////////////////////////
		// 1 Vérification des collisions avec des parties commencées avant cet horaire
		//////////////////////////////////////////////////////////////////////////
		$this->setTrouDepart(1);
		
		if(!$this->isBeforeLastStart($this->slotAller->begin)){	// l'horaire est apres l'heure de fermeture
			$digest['valid']		= false;
			$digest['message']		= "ERREUR: l'horaire de départ est apres l'heure de fermeture";
			return $digest;
		}
		if(count($this->parcours) == 2){
			if(!$this->isBeforeLastStart($this->slotRetour->begin)){	// l'horaire est apres l'heure de fermeture
				$digest['valid']		= false;
				$digest['message']		= "ERREUR: l'horaire du retour est apres l'heure de fermeture";
				return $digest;
			}
		}		
		$collision_result = $this->CheckCollision();
		if(!$collision_result['valid']) {
			$this->CancelResa($this->slotAller->id);
			$this->CancelResa($this->slotRetour->id);
			$digest['valid'] = $collision_result['valid'];		// ici c'est false !
			$digest['message'] = $collision_result['message'];
			return $digest;
		}
		
		//////////////////////////////////////////////////////////////////////////
		// 2 construction du resumé
		//////////////////////////////////////////////////////////////////////////
		
		$dt = strtotime($this->parcours['aller']['slot']->format('Y-m-d H:i:s'));
		$jour = array("Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi");
		$mois = array("","Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");
		$datefr = $jour[date("w", $dt)]." ".date("d", $dt)." ".$mois[date("n", $dt)]." ".date("Y", $dt)." à ".date("H:i", $dt);
		if(count($this->parcours) == 2){
			$duree_total = $this->parcours['aller']['duree'] + $this->parcours['retour']['duree'];
			$heure_fin = $this->parcours['retour']['fin'];
		}else{
			$duree_total = $this->parcours['aller']['duree'];
			$heure_fin = $this->parcours['aller']['fin'];
		}
		// $dtfin = strtotime("+ ".$duree_total ."seconds", $dt);
		// $heure_fin = date("H:i", $dtfin);
		
		$digest['valid']		= true;
		$digest['message']		= "";
		$digest['date']			= $datefr;
		$digest['sh']			= $this->getStartHole();
		$digest['nb_trous']		= (count($this->parcours) == 2)? 18 : 9;
		// $digest['players']		= $this->players;
		$digest['players']		= $this->slotAller->players;
		// $digest['ressources']	= ;
		$digest['duree']		= gmdate("H:i", $duree_total);
		$digest['heure_fin']	= $heure_fin->format('H:i');
		
		return $digest;
	}	// CreateDigest
	
	/**
	 * MakeResaProvi
	 *
	 * @param string $troudepart 
	 * @return Array
	 * @author Cesar Jacquet
	 */
	public function MakeResaProvi($troudepart = null)
	{
		//////////////////////////////////////////////////////////////////////////
		// Concept: Faire une resa en testant l'horaire en partant du trou 1 puis 10
		// le wizard ne défini par le trou de départ alors que le planning oui.
		// si aucun depart possible pour cette equipe alors on refuse la resa.
		// Réservation de la partie: 1 ou 2 parcours en fonction du nb de trous: 9 ou 18
		// le nb de trous par joueur par parcours etant deja connu dans la resa
		//////////////////////////////////////////////////////////////////////////
		
		if($troudepart != null){
			$trou_depart_possible = array($troudepart);	// on contraint à la recherche que sur ce trou de depart
		}else{
			$trou_depart_possible = array(1, 10);		// sinon on test sur le 1 et sur le 10
		}
		foreach($trou_depart_possible as $tdepart) {
			$this->setStartHole($tdepart);

			$check_result = $this->LockParcours();

			if($check_result['valid']) {
				//////////////////////////////////////////////////////////////////////////
				// Ok la reservation provi est faite !
				// Retour d'infos sur la reservation 
				//////////////////////////////////////////////////////////////////////////
 
 				return $check_result;
			}
		}

		// Aucune dispo => on retourne l'erreur
		return $check_result;	// contient le message d'erreur de LockParcours

	}	// MakeResaProvi
	
	/**
	 * MakeReservation
	 *
	 * @param string $troudepart 
	 * @return void
	 * @author Cesar Jacquet
	 */
	public function MakeReservation($troudepart = null)
	{
		//////////////////////////////////////////////////////////////////////////
		// Concept: Faire une resa en testant l'horaire en partant du trou 1 puis 10
		// le wizard ne défini par le trou de départ alors que le planning oui.
		// si aucun depart possible pour cette equipe alors on refuse la resa.
		// Réservation de la partie: 1 ou 2 parcours en fonction du nb de trous: 9 ou 18
		// le nb de trous par joueur par parcours etant deja connu dans la resa
		//////////////////////////////////////////////////////////////////////////

		//////////////////////////////////////////////////////////
		// 1 Test de la preovenance de la resa:planning ou wizard

		if($troudepart != null){
			// Resa du planning membre
			$trou_depart_possible = array($troudepart);	// on contraint à la recherche que sur ce trou de depart
		}else{
			// Resa du WIZARD public ou membre
			$trou_depart_possible = array(1, 10);		// sinon on essaye sur le 1 puis sur le 10
		}

		//////////////////////////////////////////////////////////
		// 2 Réservation des parcours							//

		foreach($trou_depart_possible as $tdepart) {
			// on positionne le trou de départ qui est la base de tout le systeme
			// ca instancie aussi les parcours pour chaque objet GamePlayer !
			// $this->setTrouDepart($tdepart);
			$this->setStartHole($tdepart);

			// On redéfinit les parcours pour le Wizard
			$this->LoadParcoursToSlot();

			// Soit on transforme la resa provisoire soit on en crée une directement
			if ($this->slotAller->id == null){

				// Si je n'ai pas de resa provisoire.
				// on lance la réservation directement sans passer par la provisoire
				$check_result = $this->LockParcours();
				if(!$check_result['valid']) {
					if($tdepart == 10){	// si sur le trou 1 on reboucle pour essayer le trou 10
						return array(
							'valid' => $check_result['valid'],	// ici c'est false !
							'message' => $check_result['message']
						);
					}else{
						continue;
					}
				}else{	// Ok la reservation est faite on passe à la suite
					break;
				}
			}else{

				// Si j'ai une resa provisoire
				// On convertit les résa provisoires en résa finales avec les bons paramètres
				if($this->UpdateReservationsToPermanent()){
					// Ok resa transformée: nb_joueurs ajusté, on coninue ...
					break;
				}else{
					// Impossible de passer la resa provi en permanent
					$this->isValid = false;
					$this->message = "Impossible de transformer les reservations provisoire en définitive. Veuillez contacter le secrétariat.";
					return array(
						'valid' => $this->isValid,
						'message' => $this->message
					);
				}
			}
		}
		
		//////////////////////////////////////////////////////////////////////////
		// 3 Test collisions joueurs avec des parties commencées avant ou pendant
		//   Ou si Visiteur, inscription dans la table demande_reservation
		//////////////////////////////////////////////////////////////////////////
		// if(isset($this->players[0]) && ($this->players[0]->id > $this->userIdMin)){

		$elem = reset($this->slotAller->players);	// remet le pointeur au debut du tableau

		// Test si c'est une partie pour des Visiteurs
		if(isset($this->slotAller->players) && ($elem->id > $this->userIdMin)){
			// Membres, check collisions ...
			$collision_result = $this->CheckCollision();
			if(!$collision_result['valid']) {
				// Collision !!! on annule tout !
				// $this->CancelResa($this->slotAller->id);
				// $this->CancelResa($this->slotRetour->id);
				$this->CancelReservations();
				return array(
					'valid' => $collision_result['valid'],		// Collision  !
					'message' => $collision_result['message']
				);
			}
			//////////////////////////////////////////////////////////////////////////
			// 3 Ajout des joueurs et ressources à la réservation
			//////////////////////////////////////////////////////////////////////////
			foreach($this->slotAller->players as $player){
				$user_insert 					= DB_ORM::model('users_has_reservation');
				$user_insert->id_users 			= $player->id;;
				$user_insert->id_reservation	= $this->slotAller->id;
				$user_insert->save(TRUE);
				$idtmp = $user_insert->id;

				//ressources
				foreach($player->ressourcesIds as $resid){
					$res_insert								= DB_ORM::model('user_reservation_ressources');
					$res_insert->id_user_has_reservation 	= $idtmp;
					$res_insert->id_ressources			 	= $resid;
					$res_insert->save();
				}
				if($player->nbTrous == 18){
					$user_insert 					= DB_ORM::model('users_has_reservation');
					$user_insert->id_users 			= $player->id;;
					$user_insert->id_reservation	= $this->slotRetour->id;
					$user_insert->save(TRUE);
					$idtmp = $user_insert->id;

					//ressources
					foreach($player->ressourcesIds as $resid){
						$res_insert								= DB_ORM::model('user_reservation_ressources');
						$res_insert->id_user_has_reservation 	= $idtmp;
						$res_insert->id_ressources			 	= $resid;
						$res_insert->save();
					}
				}
			}
		}else{

			// Resa Visiteur: Ajout à la table des demande de resa
			$this->AddToPendingResa();
		}
		
		//////////////////////////////////////////////////////////////////////////
		// Retour d'infos sur la reservation 
		//////////////////////////////////////////////////////////////////////////
		$this->message = "OK: Réservation enregistrée";
		return array(
			'valid' => $this->isValid,
			'message' => $this->message
		);
	}	// MakeReservation

	/**
	 * UpdateReservation
	 *
	 * @param string $reqResa 
	 * @return void
	 * @author Cesar Jacquet
	 */
	public function UpdateReservation($reqResa)
	{
		//////////////////////////////////////////////////////////////////////////
		// Concept: Mises à jour possibles
		// A/ +/-	nb joueurs
		// B/ 9/18	trous pour un joueur
		// C/ +/-	ressources d'un joueur 
		//////////////////////////////////////////////////////////////////////////

		//////////////////////////////////////////////////////////////////////////
		// Boucle sur les joueurs pour trouver ceux modifiés
		foreach($reqResa->slotAller->players as $reqPlayer){

			$finded = false;

			//////////////////////////////////////////////////////////////////////////
			// A/ Nb de joueur
			// 
			//////////////////////////////////////////////////////////////////////////

			//////////////////////////////////////////////////////////////////////////
			// A-1 Ajout d'un joueur

			if($reqPlayer->getCrudState() == "Create"){
				$finded = true;

				if($reqResa->slotAller->nbPlayers() > $this->slotAller->nbPlayers()){
					// Ce nouveau joueur est dans un nouveau slot

					// On commence par verifier pour le nouveau joueur les collisions
					$collision_result = $this->CheckCollision($reqPlayer);	// uniquement pour ce joueur

					if(!$collision_result['valid']) {
						// Collision !!! on annule tout !
						return $collision_result;
					}

					// OK On ajoute le joueur à cette resa

					// Ajout du joueur dans les joueurs de la resa
					$newpl = clone($reqPlayer);
					$this->slotAller->addPlayer($newpl);

					// On commence par bloquer les nouvelles places sur le slot horaire
					$this->updateNbPlayersInResa($this->slotAller->id, $this->slotAller->nbPlayers());	// Augmente de 1 pour ce joueur
			
					// On réduit d'autant sur la resa provi Aller
					$this->updateNbPlayersInResa($reqResa->slotAller->id, $this->slotAller->nbPlayers());	// baisse de 1 pour dans la resa provi

					// Ajout du joueur à la réservation
					$builder = DB_ORM::insert('users_has_reservation')
						->column('id_users', $newpl->id)
							->column('id_reservation', $this->slotAller->id);	// dans la bonne resa: pas la provi !
					$sql = $builder->statement();
					$newpl->userHasResa = $builder->execute();

					// Ajout ressources
					if (isset($newpl->userHasResa)){
						// Boucle sur les ressources que le joueur a
						foreach($newpl->ressourcesIds as $resid){
							$builder = DB_ORM::insert('user_reservation_ressources')
								->column('id_user_has_reservation', $newpl->userHasResa)
									->column('id_ressources', $resid);
							$sql = $builder->statement();
							$builder->execute();
						}
					}

					//////////////////////////////////////////////////////////////////////////////
					// Création du Retour pour ce nouveau joueur

					// Test l'existance de la resa Retour
					if($this->slotRetour->nbPlayers() > 0){
						// Ok resa Retour existe =>Juste ajouter le joueur à la résa retour

						//////////////////////////////////////////////////////////////////////////
						// OK On ajoute le joueur à cette resa retour

						// Test de la dispo pour 1 joueur sur le slot horaire du retour
						$nb = $this->getNbPlayerInSlot($this->slotRetour);
						if( $nb + 1 > $this->maxPlayers ){
							return array(
								'isValid' => false,
								'message' => "Réservation impossible : pas assez de place disponibles pour le(s) joueur(s)"
							);
						}

						// Ajout du joueur dans le slotRetour
						$newpl = clone $reqPlayer;	// Création d'un nouveau joueur à partir de $reqPlayer pour le slot retour
						$this->slotRetour->addPlayer($newpl);

						// On bloque la place pour le retour
						if(!$this->updateNbPlayersInResa($this->slotRetour->id, $this->slotRetour->nbPlayers())){
							return array(
								'isValid' => false,
								'message' => "Erreur dans l'ajout du joueur sur le slot retour"
							);
						}

						// Ajout du joueur à la réservation
						$builder = DB_ORM::insert('users_has_reservation')
							->column('id_users', $newpl->id)
								->column('id_reservation', $this->slotRetour->id);
						$sql = $builder->statement();
						$newpl->userHasResa = $builder->execute();

						// Ajout ressources
						if (isset($newpl->userHasResa)){
							foreach($newpl->ressourcesIds as $resid){
								$builder = DB_ORM::insert('user_reservation_ressources')
									->column('id_user_has_reservation', $newpl->userHasResa)
										->column('id_ressources', $resid);
								$sql = $builder->statement();
								$builder->execute();
							}
						}

					}else{	// Aucune résa retour => il faut la créer
						

						// Test de l'horaire ///////////////////////////////////
						if(!$this->isBeforeLastStart($reqResa->slotRetour->begin)){
							$this->isValid = false;	// l'horaire est apres l'heure de fermeture
							$this->message = "Réservation impossible : l'heure de départ est après le dernier départ.";
						}

						// Test de la dispo pour 1 joueur sur le slot horaire du retour
						$nb = $this->getNbPlayerInSlot($reqResa->slotRetour);
						if( $nb + 1 > $this->maxPlayers ){
							return array(
								'isValid' => false,
								'message' => "Réservation impossible : pas assez de place disponibles pour le(s) joueur(s)"
							);
						}

						// Ajout du joueur dans le slotRetour
						$newpl = clone $reqPlayer;	// Création d'un nouveau joueur à partir de $reqPlayer pour le slot retour
						$this->slotRetour->addPlayer($newpl);

						// Creation d'une résa retour pour 1 joueur
						// Ici, il n'y a que le nouveau joueur dans le slotRetour !
						$this->slotRetour->id = $this->insertResaForParcours($this->slotRetour, null, $this->slotAller->id);
						if($this->slotRetour->id == null){
							return array(
								'isValid' => false,
								'message' => "Réservation impossible pour le parcours"
							);
						}

						// Ajout du joueur à la reservation retour
						$builder = DB_ORM::insert('users_has_reservation')
							->column('id_users', $newpl->id)
								->column('id_reservation', $this->slotRetour->id);
						$sql = $builder->statement();
						$newpl->userHasResa = $builder->execute();

						// Ajout ressources
						if (isset($newpl->userHasResa)){
							foreach($newpl->ressourcesIds as $resid){
								$builder = DB_ORM::insert('user_reservation_ressources')
									->column('id_user_has_reservation', $newpl->userHasResa)
										->column('id_ressources', $resid);
								$sql = $builder->statement();
								$builder->execute();
							}
						}

						// Mise à jour de la resa aller pour le lien vers la resa retour
						if(!$this->updateResaAllerWithIdChildren($this->slotRetour->id)){
							return array(
								'isValid' => false,
								'message' => "ERREUR dans l'incscription de la resa fille"
							);
						}
					}
		
				}else{	// Ce joueur est venu remplacer un autre joueur sur le même slot			
					
					return array(
						'isValid' => false,
						'message' => "ERREUR mise à jour non gérée !"
					);
					// TODO A FAIRE
				}

				//////////////////////////////////////////////////////////////////////////
				//
				// FIN A/ Ajout du joueur
				//
				continue;	// On passe au joueur suivant 
				// 
				//////////////////////////////////////////////////////////////////////////


			}else if($reqPlayer->getCrudState() == "Modified"){

			//////////////////////////////////////////////////////////////////////////
			//
			// DEBUT Gestion des joueurs MODIFIED (pas CREATE)
			// 
			//////////////////////////////////////////////////////////////////////////

				// Ce joueur est modifié

				foreach($this->slotAller->players as $player){
					if ($player->id != $reqPlayer->id){
						continue;
					}else{
						$finded = true;
						$ModifiedPlayer = $player;
						break;
					}
				}
				if(!$finded){
					
					return array(
						'valid' => false,
						'message' => "ERREUR: Impossible de retrouver un joueur modifié dans cette réservation"
					);
				}
			}
			
			if(!$finded){	// Si aucun modifié, next
				continue;
			}
			
			//////////////////////////////////////////////////////////////////////////
			// 
			// OK ici nous avons un joueur à modifier : $ModifiedPlayer
			// et les nouvelles valeurs pour ce joueur: $reqPlayer
			// 
			//////////////////////////////////////////////////////////////////////////


			//////////////////////////////////////////////////////////////////////////
			// A-2 Supression d'un joueur


			// Ce cas est traité en amont par la commande "Leave" sur le joueur


			//////////////////////////////////////////////////////////////////////////



			//////////////////////////////////////////////////////////////////////////
			// 
			// B/ Nb de Trous
			// 
			//////////////////////////////////////////////////////////////////////////

			//////////////////////////////////////////////////////////////////////////
			// B-1 Nb Trous: passage à 18

			if($reqPlayer->nbTrous > $ModifiedPlayer->nbTrous){

				// Test l'existance de la resa Retour
				if($this->slotRetour->nbPlayers() > 0){
					// Ok resa Retour existe =>Juste ajouter le joueur à la résa retour

					// On commence par verifier pour le nouveau joueur les collisions
					$collision_result = $this->CollisionParcours($this->slotRetour, $reqPlayer);

					if(!$collision_result['valid']) {
						// Collision !!! on annule tout !
						return $collision_result;
					}

					//////////////////////////////////////////////////////////////////////////
					// OK On ajoute le joueur à cette resa retour

					// Ajout du joueur dans le slotRetour
					$newpl = clone $reqPlayer;	// Création d'un nouveau joueur à partir de $reqPlayer pour le slot retour
					$this->slotRetour->addPlayer($newpl);

					// Test de la dispo pour 1 joueur sur le slot horaire du retour
					$nb = $this->getNbPlayerInSlot($this->slotRetour);
					if( $nb + 1 > $this->maxPlayers ){
						return array(
							'isValid' => false,
							'message' => "Réservation impossible : pas assez de place disponibles pour le(s) joueur(s)"
						);
					}

					// On bloque la place pour le retour
					if(!$this->updateResaRetourNbPlayers($this->slotRetour->nbPlayers())){
						return array(
							'isValid' => false,
							'message' => "Erreur dans l'ajout du joueur sur le slot retour"
						);
					}

					// Ajout du joueur à la réservation
					$builder = DB_ORM::insert('users_has_reservation')
						->column('id_users', $newpl->id)
							->column('id_reservation', $this->slotRetour->id);
					$sql = $builder->statement();
					$newpl->userHasResa = $builder->execute();

					// Ajout ressources
					if (isset($newpl->userHasResa)){
						foreach($newpl->ressourcesIds as $resid){
							$builder = DB_ORM::insert('user_reservation_ressources')
								->column('id_user_has_reservation', $newpl->userHasResa)
									->column('id_ressources', $resid);
							$sql = $builder->statement();
							$builder->execute();
						}
					}

					// Mise à jour de la resa aller pour le lien vers la resa retour
					if(!$this->updateResaAllerWithIdChildren($this->slotRetour->id)){
						return array(
							'isValid' => false,
							'message' => "ERREUR dans l'incscription de la resa fille"
						);
					}

					// Mise à jour du joueur pour le nb de trous
					$this->slotAller->players[$reqPlayer->id]->nbTrous = 18;

				}else{
					// Aucune résa retour => il faut la créer

					// Test de l'horaire ///////////////////////////////////
					if(!$this->isBeforeLastStart($reqResa->slotRetour->begin)){
						$this->isValid = false;	// l'horaire est apres l'heure de fermeture
						$this->message = "Réservation impossible : l'heure de départ est après le dernier départ.";
					}

					// On commence par verifier pour les collisions
					$collision_result = $this->CollisionParcours($reqResa->slotRetour, $reqPlayer);

					if(!$collision_result['valid']) {
						// Collision !!! on annule tout !
						return $collision_result;
					}

					// Test de la dispo pour 1 joueur sur le slot horaire du retour
					$nb = $this->getNbPlayerInSlot($reqResa->slotRetour);
					if( $nb + 1 > $this->maxPlayers ){
						return array(
							'isValid' => false,
							'message' => "Réservation impossible : pas assez de place disponibles pour le(s) joueur(s)"
						);
					}

					// Ajout du joueur dans le slotRetour
					$newpl = clone $reqPlayer;	// Création d'un nouveau joueur à partir de $reqPlayer pour le slot retour
					$this->slotRetour->addPlayer($newpl);

					// Creation d'une résa retour pour 1 joueur
					// Ici, il n'y a que le nouveau joueur dans le slotRetour !
					$this->slotRetour->id = $this->insertResaForParcours($this->slotRetour, null, $this->slotAller->id);
					if($this->slotRetour->id == null){
						return array(
							'isValid' => false,
							'message' => "Réservation impossible pour le parcours"
						);
					}

					// Ajout du joueur à la reservation retour
					$builder = DB_ORM::insert('users_has_reservation')
						->column('id_users', $newpl->id)
							->column('id_reservation', $this->slotRetour->id);
					$sql = $builder->statement();
					$newpl->userHasResa = $builder->execute();

					// Ajout ressources
					if (isset($newpl->userHasResa)){
						foreach($newpl->ressourcesIds as $resid){
							$builder = DB_ORM::insert('user_reservation_ressources')
								->column('id_user_has_reservation', $newpl->userHasResa)
									->column('id_ressources', $resid);
							$sql = $builder->statement();
							$builder->execute();
						}
					}

					// Mise à jour de la resa aller pour le lien vers la resa retour
					if(!$this->updateResaAllerWithIdChildren($this->slotRetour->id)){
						return array(
							'isValid' => false,
							'message' => "ERREUR dans l'incscription de la resa fille"
						);
					}

					// Mise à jour du joueur pour le nb de trous
					$this->slotAller->players[$reqPlayer->id]->nbTrous = 18;

				}
			}


			//////////////////////////////////////////////////////////////////////////
			// B-2 Nb Trous: passage à 9
			
			if($reqPlayer->nbTrous < $ModifiedPlayer->nbTrous){
				// passage en 9 trous

				// Mettre à jour les infos du slot retour
				$this->slotRetour->removePlayer($ModifiedPlayer->id);

				// MAJ nb_joueurs sur resa Retour
				$builder = DB_ORM::update('reservation')
					->set('nb_joueurs',$this->slotRetour->nbPlayers())
						->where('id', '=', $this->slotRetour->id);
				$sql = $builder->statement();
				$id = $builder->execute();

				// MAJ ou suppression resa Retour et maj id_children de la resa Aller
				if($this->slotRetour->nbPlayers() <= 0){
					// Supprimer la resa retour dans la table reservation
					$builder = DB_ORM::delete('reservation')
						->where('id', '=', $this->slotRetour->id);
					$sql = $builder->statement();
					$id = $builder->execute();

					// Supprimer sur la resa Aller le lien vers le retour et maj nb_joueurs
					$builder = DB_ORM::update('reservation')
						// ->set('nb_joueurs',$this->slotRetour->nbPlayers())
							->set('id_children', NULL)
								->where('id', '=', $this->slotAller->id);
					$sql = $builder->statement();
					$id = $builder->execute();

				}

				// Récupere l'entrée dans la table users_has_reservation pour ce joueur et cette resa
				$builder = DB_ORM::select('users_has_reservation')
					->where('id_users', '=', $ModifiedPlayer->id)
						->where('id_reservation', '=', $this->slotRetour->id);
				$sql = $builder->statement();
				$users_has_reservation = $builder->query();

				// Supprimer l'entrée dans la table users_has_reservation pour ce joueur et cette resa
				$builder = DB_ORM::delete('users_has_reservation')
					->where('id_users', '=', $ModifiedPlayer->id)
						->where('id_reservation', '=', $this->slotRetour->id);
				$sql = $builder->statement();
				$id = $builder->execute();

				// Suppression de la ressources sur la resa retour si besoin
				if(isset($users_has_reservation[0])){
					$builder = DB_ORM::delete('user_reservation_ressources')
						->where('id_user_has_reservation', '=', $users_has_reservation[0]->id);
					$sql = $builder->statement();
					$id = $builder->execute();
				}

				// Mettre a jour l'objet GamePlayer si d'autre modifs dessus comme les ressources
				$ModifiedPlayer->nbTrous = 9;
			}

			//////////////////////////////////////////////////////////////////////////



			//////////////////////////////////////////////////////////////////////////
			// 
			// C/ MAJ des Ressources
			// 
			//////////////////////////////////////////////////////////////////////////

			//////////////////////////////////////////////////////////////////////////
			// C-1 Ajout de Ressources

			if(count($reqPlayer->ressourcesIds) > count($ModifiedPlayer->ressourcesIds)){
				// Ok j'ai des ressources en plus
				if(count($reqPlayer->ressourcesIds) == 1){
					$builder = DB_ORM::select('users_has_reservation')
						->where('id_users', '=', $ModifiedPlayer->id)
							->where('id_reservation', '=', $this->slotAller->id);
					$sql = $builder->statement();
					$users_has_reservation_query = $builder->query();

					$builder = DB_ORM::insert('user_reservation_ressources')
						->column('id_user_has_reservation', $users_has_reservation_query[0]->id)
							->column('id_ressources', $reqPlayer->ressourcesIds[0]);
					$sql = $builder->statement();
					$users_has_reservation_query = $builder->execute();

					// Ajout de la ressource pour le retour pour ce joueur
					if($ModifiedPlayer->nbTrous == 18){

						$builder = DB_ORM::select('users_has_reservation')
							->where('id_users', '=', $ModifiedPlayer->id)
								->where('id_reservation', '=', $this->slotRetour->id);
						$sql = $builder->statement();
						$users_has_reservation_query = $builder->query();

						$builder = DB_ORM::insert('user_reservation_ressources')
							->column('id_user_has_reservation', $users_has_reservation_query[0]->id)
								->column('id_ressources', $reqPlayer->ressourcesIds[0]);
						$sql = $builder->statement();
						$users_has_reservation_query = $builder->execute();

					}
				}
			}
	
			//////////////////////////////////////////////////////////////////////////
			// C-2 Retrait de ressources
	
			if(count($reqPlayer->ressourcesIds) < count($ModifiedPlayer->ressourcesIds)){
				// Ok j'ai des ressources en moins
				if(count($reqPlayer->ressourcesIds) == 0){
					// Recherche et suppression de la ressource pour l'aller
					$builder = DB_ORM::select('users_has_reservation')
						->where('id_users', '=', $ModifiedPlayer->id)
							->where('id_reservation', '=', $this->slotAller->id);
					$sql = $builder->statement();
					$users_has_reservation_query = $builder->query();

					$builder = DB_ORM::delete('user_reservation_ressources')
						->where('id_user_has_reservation', '=', $users_has_reservation_query[0]->id);
					$sql = $builder->statement();
					$id = $builder->execute();

					// Recherche et suppression de la ressource pour le retour
					if($ModifiedPlayer->nbTrous == 18){
						$builder = DB_ORM::select('users_has_reservation')
							->where('id_users', '=', $ModifiedPlayer->id)
								->where('id_reservation', '=', $this->slotRetour->id);
						$sql = $builder->statement();
						$users_has_reservation_query = $builder->query();

						$builder = DB_ORM::delete('user_reservation_ressources')
							->where('id_user_has_reservation', '=', $users_has_reservation_query[0]->id);
						$sql = $builder->statement();
						$id = $builder->execute();
					}
				}
			}
		}	// boucle foreach tous les joueurs de la partie reqResa


	}	// UpdateReservation

	/**
	 * AddToPendingResa
	 *
	 * @return void
	 * @author Cesar Jacquet
	 */
	public function AddToPendingResa()
	{
		//////////////////////////////////////////////////////////////////////////
		// Concept: Lier la resa à une demande de resa pour des visiteurs public
		//////////////////////////////////////////////////////////////////////////

		// TODO: faire la gestion des ressources de façon propre
		$ressources = array();
		$ressources['Chariot'] = Arr::get($this->method, "nb_Chariots");
		
		//////////////////////////////////////////////////////////////////////////
		// Inscription dans la table des resa visiteurs à valider 
		//////////////////////////////////////////////////////////////////////////

		$demande_reservation 				= DB_ORM::model('demande_reservation');
		$demande_reservation->date 			= $this->date;
		$demande_reservation->trou_depart 	= $this->getStartHole();
		$demande_reservation->nb_trous 		= $this->nb_trousMax;		// DEPRECATED TODO a refaire
		$demande_reservation->nb_joueurs	= $this->nb_joueurs;	// DEPRECATED TODO a refaire
		$demande_reservation->prenom		= $this->method['client_firstname'];
		$demande_reservation->nom			= $this->method['client_name'];
		$demande_reservation->email			= $this->method['client_email'];
		$demande_reservation->phone			= $this->method['client_phone'];
		$demande_reservation->ressources 	= "";
		foreach($ressources as $key => $r) {
			$demande_reservation->ressources .= $key." : ".$r." / ";
		}
		$demande_reservation->id_resa_aller	= $this->slotAller->id;
		$demande_reservation->id_resa_retour= $this->slotRetour->id;
		$demande_reservation->save(TRUE);
		
	}	// AddToPendingResa

	/**
	 * LockParcours
	 *
	 * @return void
	 * @author Cesar Jacquet
	 */
	public function LockParcours()
	{

		// Reserve le parcours Aller

		$id_resa_aller = $this->lockParcoursForSlot($this->slotAller, null);

		if($id_resa_aller == null){
			return array(
				'valid' => $this->isValid,
				'message' => $this->message,
				'id_reservation_aller' => NULL,
				'id_reservation_retour' =>  NULL
			);
		}else{
			if($this->isProvisoire){
				$this->message ="Reservation provisoire Aller: " .$this->slotAller->nbPlayers() ." joueurs,";
			}else{
				$this->message ="Reservation Aller: " .$this->slotAller->nbPlayers() ." joueurs,";
			}
		}

		// Reserve le parcours Retour

		$id_resa_retour = $this->lockParcoursForSlot($this->slotRetour, $this->slotAller->id);

		if($id_resa_retour == null){
			// Si la resa retour n'est pas possible on supprime aussi l'aller
			if($id_resa_aller != null){
				$this->CancelResa($id_resa_aller);		// on libère la resa de l'aller
			}
			return array(	// Plus assez de place dans ce slot horaire pour ce trou de depart
				'valid' => $this->isValid,
				'message' => $this->message,
				'id_reservation_aller' => NULL,
				'id_reservation_retour' =>  NULL
			);
		}else{
			if($this->isProvisoire){
				$this->message = $this->message ." Retour: " .$this->slotAller->nbPlayers() ." joueurs, faite!";
			}else{
				$this->message = $this->message ." Retour: " .$this->slotAller->nbPlayers() ." joueurs, faite!";
			}
		}

		// MAJ du parcours Aller pour id_children

		if($this->slotRetour->id != null){
			$this->updateResaAllerWithIdChildren($this->slotRetour->id);
		}

		// Fin

		return array(
			'valid' => $this->isValid,
			'message' => $this->message,
			'id_reservation_aller' => $id_resa_aller,
			'id_reservation_retour' =>  $id_resa_retour
		);
	}

	/**
	 * lockParcoursForSlot
	 *
	 * @param string $gameSlot 
	 * @param string $idParent 
	 * @return void
	 * @author Cesar Jacquet
	 */
	public function lockParcoursForSlot($gameSlot, $idParent = null)
	{
		$this->isValid	= true;	// réinitialisation du flag isValid

		Helpers_Tools::PurgeExpiredResaProvi();
		
		// Test de l'horaire ///////////////////////////////////
		if(!$this->isBeforeLastStart($gameSlot->begin) && !$this->isWizard){
			$this->isValid = false;	// l'horaire est apres l'heure de fermeture
			$this->message = "Réservation impossible : l'heure de départ est après le dernier départ.";
			return null;
		}

		// Test de la dispo en nb de place sur le slot horaire
		$nb = $this->getNbPlayerInSlot($gameSlot);

		// Test si provisoire et adapte le nb de joueurs
		if($this->isProvisoire){
			// Création de la variable d'expiration de la resa provisoire
			$until_or_null	= new Datetime();
			$until_or_null->add(new DateInterval('PT' .$this->temporaryLifeSetting .'S'));	// resa temporaire
			$gameSlot->setNProviPlayers($this->maxPlayers - $nb);	// Stock le nb de place bloquées
		}else{
			$until_or_null = null;	// c'est permanent pas d'expiration
		}

		// Test s'il reste assez de place sur le slot horaire
		if( $nb + $gameSlot->nbPlayers() > $this->maxPlayers ){
			$this->isValid = false;
			$this->message = "Réservation impossible : pas assez de place disponibles pour le(s) joueur(s)";
			return null;
		}

		
		// OK parcours dispo => on reserve
		$id_resa = $this->insertResaForParcours($gameSlot, $until_or_null, $idParent);
		if($id_resa == null){
			$this->isValid = false;
			$this->message = "Réservation impossible pour le parcours";
			return null;
		}

		// Mise à jour des données de l'objet pour la resa aller
		$gameSlot->id = $id_resa;
		return $id_resa;		

	}	// lockParcoursForSlot

	/**
	 * getNbPlayerInSlot
	 *
	 * @param string $gameSlot 
	 * @return void
	 * @author Cesar Jacquet
	 */
	public function getNbPlayerInSlot($gameSlot)
	{
		$reservation_query = DB_SQL::select('default')
			->from('reservation')
				->column('reservation.id')
					->count('users_has_reservation.id')
						->join(NULL, 'users_has_reservation')
							->on('users_has_reservation.id_reservation', '=', 'reservation.id')
								->where('id_type_parcours', '=', $gameSlot->typeParcoursId)		// correspond au parcours du tracé ex: 9t retour du inout
									->where('date_reservation', '=', $gameSlot->begin->format('Y-m-d H:i:s'))
										->query();
		$result = $reservation_query[0];
		if($result){
			return $result['count'];
		}else{
			return $this->maxPlayers;
		}
	}	// getNbPlayerForSlot

	/**
	 * insertResaForParcours
	 *
	 * @param string $gameSlot 
	 * @param string $temp_until 
	 * @param string $parent 
	 * @return void
	 * @author Cesar Jacquet
	 */
	public function insertResaForParcours($gameSlot, $temp_until = null, $parent = null)
	{
		$nplayer = $gameSlot->nbPlayers();
		$until = null;
		if ($temp_until){
			$until = $temp_until->format('Y-m-d H:i:s');
			// $nplayer = $gameSlot->nbPlayers();
		}
		$end = clone($gameSlot->end);
		$end->sub(new DateInterval('PT60S'));	// on décalle de 60 secondes pour coller les resa apres
		$reservation_insert_query = DB_SQL::insert('default')
			->into('reservation')
				->column('id_type_parcours', $gameSlot->typeParcoursId)
					->column('date_reservation', $gameSlot->begin->format('Y-m-d H:i:s'))
						->column('nb_joueurs', $nplayer)
							->column('id_parent', $parent)	// parent : si resa aller id = NULL
								->column('id_children', NULL)	// fille: a ce moment on ne peux pas encore avoir son id => toujours null
									->column('date_fin', $end->format('Y-m-d H:i:s'))
										->column('temp_until', $until);
		return $reservation_insert_query->execute(TRUE);	// SQL INSERT la reservation
	}	// insertResaForParcours
	
	/**
	 * UpdateReservationsToPermanent
	 *
	 * @return void
	 * @author Cesar Jacquet
	 */
	public function UpdateReservationsToPermanent()	// passe la resa de provisoire a permanent,met à jour le nb de joueurs
	{
		if(!isset($this->slotAller->id)){
			return false;
		}

		$haveaReturn = false;
		// en 1er Update du Retour ou suppression si 9T
		if(isset($this->slotRetour->id)){
			if($this->slotRetour->nbPlayers() > 0){
			$haveaReturn = true;	// Nous avons un retour
			$reservation_update_query = DB_SQL::update('default')
				->table('reservation')
					->set('nb_joueurs', $this->slotRetour->nbPlayers())
						->set('temp_until', null)	// on supprime la date de peremption
							->where('id', '=', intval($this->slotRetour->id));
			$reservation_update_query->execute(TRUE);	// SQL UPDATE la reservation
			}else{
				// Si aucun joueur au Retour, on supprime la resa provi
				$this->CancelResa($this->slotRetour->id);
			}
		}

		// Update de l'aller et du champ id_children si 9T
		if($haveaReturn)
			$children_field = intval($this->slotRetour->id);
		else
			$children_field = null;
		$reservation_update_query = DB_SQL::update('default')
			->table('reservation')
				->set('nb_joueurs', $this->slotAller->nbPlayers())
					->set('temp_until', null)	// on supprime la date de peremption
						->set('id_children', $children_field)	// on supprime ou pas le lien vers le retour
							->where('id', '=', intval($this->slotAller->id));	
		$reservation_update_query->execute(TRUE);	// SQL UPDATE la reservation
		
		return true;
	}	// UpdateReservationsToPermanent

	/**
	 * updateResaAllerWithIdChildren
	 *
	 * @param string $id_child 
	 * @return void
	 * @author Cesar Jacquet
	 */
	public function updateResaAllerWithIdChildren($id_child)	// Update la resa Aller de l'id de sa résa retour
	{
		// if(!isset($this->parcours['aller'])){
		// 	return false;
		// }
		$reservation_update_query = DB_SQL::update('default')
			->table('reservation')
				->set('id_children', intval($id_child))	// on intègre l'id de la resa de resa pour le retour
						// ->where('id', '=', intval($this->slotAller->id));
						->where('id', '=', intval($this->slotAller->id));	
		$reservation_update_query->execute(TRUE);	// SQL UPDATE la reservation
		if(!$reservation_update_query){
			return false;
		}
		return true;
	}	// updateResaAllerWithIdChildren

	/**
	 * updateNbPlayersInResa
	 *
	 * @param string $id_resa 
	 * @param string $new_nb_joueurs 
	 * @return void
	 * @author Cesar Jacquet
	 */
	public function updateNbPlayersInResa($id_resa, $new_nb_joueurs)	// Change le nombre de joueurs dans une résa
	{

		if($new_nb_joueurs <= 0 || $new_nb_joueurs > $this->maxPlayers || !isset($id_resa))
			return false;		// protege contre une valeur impossible

		$reservation_update_query = DB_SQL::update('default')
			->table('reservation')
				->set('nb_joueurs', intval($new_nb_joueurs))
						->where('id', '=', intval($id_resa));	
		$reservation_update_query->execute(TRUE);	// SQL UPDATE la reservation
		if(!$reservation_update_query){
			return false;
		}
		return $new_nb_joueurs;
	}	// updateNbPlayersInResa

	public function updateResaAllerNbPlayers($new_nb_joueurs)	// Change le nombre de joueurs dans une résa
	{

		if($new_nb_joueurs <= 0 || $new_nb_joueurs > $this->maxPlayers)
			return false;		// protege contre une valeur impossible

		$reservation_update_query = DB_SQL::update('default')
			->table('reservation')
				->set('nb_joueurs', intval($new_nb_joueurs))
						->where('id', '=', intval($this->slotAller->id));	
		$reservation_update_query->execute(TRUE);	// SQL UPDATE la reservation
		if(!$reservation_update_query){
			return false;
		}
		return $new_nb_joueurs;
	}	// updateResaAllerNbPlayers

	public function updateResaRetourNbPlayers($new_nb_joueurs)	// Change le nombre de joueurs dans une résa
	{
		// if(!isset($this->parcours['retour'])){
		// 	return false;
		// }
		if($this->slotRetour->id <= 0){
			return false;
		}
		if($new_nb_joueurs <= 0 || $new_nb_joueurs > $this->maxPlayers)
			return false;		// protege contre une valeur impossible
		
		$reservation_update_query = DB_SQL::update('default')
			->table('reservation')
				->set('nb_joueurs', intval($new_nb_joueurs))
						->where('id', '=', intval($this->slotRetour->id));	
		$reservation_update_query->execute(TRUE);	// SQL UPDATE la reservation
		if(!$reservation_update_query){
			return false;
		}
		return $new_nb_joueurs;
	}	// updateResaRetourNbPlayers

	/**
	 * CheckCollision
	 *
	 * @param string $newplayer 
	 * @return void
	 * @author Cesar Jacquet
	 */
	public function CheckCollision($newplayer = null)
	{
		// On ne test que les resa permanentes
		if($this->isProvisoire){
			return array(
				'valid' => true,
				'message' => ""
			);
		}

		// Check Collision parcours Aller

		$returnArray = $this->CollisionParcours($this->slotAller, $newplayer);

		if(!$returnArray['valid']){
			return $returnArray;
		}

		// Check Collision parcours Retour

		$returnArray = $this->CollisionParcours($this->slotRetour, $newplayer);

		// Fin
		return $returnArray;
	}

	/**
	 * CollisionParcours
	 *
	 * @param string $gameSlot 
	 * @param string $player 
	 * @return void
	 * @author Cesar Jacquet
	 */
	public function CollisionParcours($gameSlot, $player = null)	// Test de collision des joueurs avec un parcours avant ou pendant celui ci
	{
		$nplayers = 0;

		//////////////////////////////////////////////////////////////////////////////////////////////
		// Vérification des conflits avec un parcours existant:
		// - soit pendant la durée de cette réservation
		// - soit qui n'est pas encore terminée
		/////////////////////////////////////////////////////////////////////////////////////////////
		
		// Creation de la requete /////////////////////

		$query = DB_SQL::select('default')
			->from('reservation')
				->column("reservation.id", "id")
					->column("reservation.date_reservation", "date_reservation")
						->column("reservation.date_fin", "date_fin")
							->column("users.firstname", "firstname")
								->column("users.lastname", "lastname")
									->join(NULL, 'users_has_reservation')
										->on('users_has_reservation.id_reservation', '=', 'reservation.id')
											->join(NULL, 'users')
												->on('users_has_reservation.id_users', '=', 'users.id');

		if(isset($player)){
			$query->where('users_has_reservation.id_users', '=', $player->id);
		}else{
			$query->where_block('(');

			foreach($gameSlot->players as $gsplayer) {

				if(isset($gsplayer->id) && $gsplayer->id > $this->userIdMin) {
					$nplayers++;
					$query->where('users_has_reservation.id_users', '=', $gsplayer->id, 'OR');
				}
			}

			$query->where_block(')');
		}

		// S'il n'y a pas de joueurs membres, la collision ne s'applique pas
		if($this->isProvisoire || $nplayers <= 0){
			return array(
				'valid' => true,
				'message' => ""
			);
		}

		$datedebut = clone($gameSlot->begin);
		$datedebutSQLpendant = $datedebut->format('Y-m-d H:i:s');

		$datedebut->add(new DateInterval('PT60S'));	// on décalle de 60 secondes pour coller les resa avant
		$datedebutSQLavant = $datedebut->format('Y-m-d H:i:s');
		
		$datefin = clone($gameSlot->end);
		$datefinSQLavant = $datefin->format('Y-m-d H:i:s');

		$datefin->sub(new DateInterval('PT60S'));	// on décalle de 60 secondes pour coller les resa apres
		$datefinSQLpendant = $datefin->format('Y-m-d H:i:s');

		$query->where_block('(');

		$query->where_block('(')
				// test d'une partie qui demarre pendant la nouvelle partie
				->where('reservation.date_reservation', 'BETWEEN', array($datedebutSQLpendant, $datefinSQLpendant), 'AND')
			->where_block(')');

		if($gameSlot->gameType != 2){
			$query->where_block('(', 'OR')
					// test d'une partie existante qui n'est pas encore finie au debut de la nouvelle
					->where('reservation.date_fin', 'BETWEEN', array($datedebutSQLavant, $datefinSQLavant), 'OR')
					->where_block(')');
		}

		$query->where_block(')');

		///////////////////////////////////////////////
		// On execute le test de collision

		$sql = $query->statement();
		$results = $query->query();
		
		///////////////////////////////////////////////
		// Retour

		if(count($results) > 0) {
			$this->isValid = false;
			$this->message = "ERREUR : Les joueurs suivants sont dans une autre réservation qui entre en collision avec celle-ci:\n";
			foreach($results as $row) {
				$this->message .= "\t- ".$row['firstname']." ".$row['lastname']."\n";
			}
		}else{
			$this->isValid	= true;
		}

		return array(
			'valid' => $this->isValid,
			'message' => $this->message
		);
	}	// CollisionParcours

	/**
	 * CancelReservations
	 *
	 * @return void
	 * @author Cesar Jacquet
	 */
	public function CancelReservations()
	{
		$this->CancelResa($this->slotAller->id);
		$this->CancelResa($this->slotRetour->id);
	}	// CancelReservations

	/**
	 * CancelResa
	 *
	 * @param string $idtocancel 
	 * @return void
	 * @author Cesar Jacquet
	 */
	public function CancelResa($idtocancel)
	{
		$reservation_remove_query		= DB_ORM::model('reservation');
		$reservation_remove_query->id	= $idtocancel;
		$reservation_remove_query->delete();
	}	// CancelResa

	/**
	 * isBeforeLastStart
	 *
	 * @param string $startdatetime 
	 * @return void
	 * @author Cesar Jacquet
	 */
	public function isBeforeLastStart($startdatetime)
	{
		if(!isset($startdatetime)){
			return false;
		}
		$golf = DB_ORM::model('golf', array(1));
		$golf->load();
		$compareResa	= new DateTime($startdatetime->format('Y-m-d H:i:s'));
		$lastStartTime	= new DateTime($compareResa->format('Y-m-d H:i:s'));
		
		$tmp = new DateTime($golf->heure_fermeture);
		$lastStartTime->setTime($tmp->format('H'), $tmp->format('i'), $tmp->format('s'));
		
		if($compareResa > $lastStartTime) {
			return false;
		}else{
			return true;
		}
	}	// isBeforeLastStart
	
}	// Class EGP_GameReservation

