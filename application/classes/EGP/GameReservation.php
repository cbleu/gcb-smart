<?php defined('SYSPATH') or die('No direct script access.');

class EGP_GameReservation
{
	public $method;

	public $isValid			= true;
	public $message			= "";

	public $permanent		= false;	// Reservation provisoire ou permanente

	public $nb_joueurs		= 0;		// nb de joueurs present au debut de la partie: parcours aller
	public $nb_trous		= 9;		// nb de trous pour la partie
	public $date;						// Date du jour de la partie
	public $beginDateTime;				// Slot horaire de la partie
	public $players			= array();	// Tableau des EGP_GamePlayer
	public $parcours		= array();	// Tableau des parcours de la partie: 1 ou 2 parcours
	public $reservations	= array();	// Tableau des id des reservations: {id_reservation_aller, id_reservation_retour}

	public $slotCurrent;				// pointeur sur un des 2 objet de type EGP_GameSlot suivant: slotAller ou slotRetour
	public $slotAller;					// objet de type  EGP_GameSlot ou null
	public $slotRetour;					// objet de type  EGP_GameSlot ou null

	private $trouDepart;				// Pointeur vers $this->slotAller->typeParcours->trou_depart
	private $id_trace;					// Id du trace en cours pour cette resa: normal, InOut, etc... (initialisé avec l'objet)

	private $max_joueurs;				// Lu depuis Settings::get('max_players_by_game'); 
	private $id_min_user;				// Lu depuis Settings::get('id_min_user')
	private $temporaryLifeSetting;		// Lu depuis Settings::get('resa_provi_timeout_xxx')

	//donnees du formulaire initial
	private $postnbusers	= 0;
	private $postdate;
	private $postheure;

	////////////////////////////////
	// PUBLIC FUNCTIONS ////////////
	////////////////////////////////

	public function getTrouDepart(){
		return $this->trouDepart;
	}	// getter
	public function setTrouDepart($value){
		$this->trouDepart = $value;
		$this->UpdatePlayersParcours();
	}	// setter avec mise à jour des parcours joueurs
	
	public function EGP_GameReservation($current_trace = 1)
	{
		$this->max_joueurs	= Settings::get('max_players_by_game');
		$this->id_min_user	= Settings::get('id_min_user');
		$this->temporaryLifeSetting	= Settings::get('resa_provi_timeout_public');
		$this->beginDateTime = new DateTime();	// pour que ce soit bien un objet initialisé
		$this->slotAller = new  EGP_GameSlot();
		$this->slotCurrent = &$this->slotAller;
		$this->id_trace = $current_trace;
	}	// EGP_GameReservation
	
	public function loadEventResa($id_resa)
	{
		// On charge la ligne de la resa
		$postresa = DB_ORM::model("reservation", array($id_resa));

		// Récupère la reservation lié si il y en a une
		$linkedresa = DB_ORM::model("reservation");
		if($postresa->id_parent == null || $postresa->id_parent == 0) {	// id_parent est soit null soit > 0
			// ce slot est un parcours 9 trous ou l'aller d'un 18 trous
			$this->slotAller->setSlot($postresa,  EGP_GameSlot::UNIQ);
			$this->slotCurrent = &$this->slotAller;	// on met à jour le current
			//on cherche un eventuel retour
			// $childresa = DB_SQL::select("default")
			// 	->from('reservation')
			// 		->where("id_parent", "=", $postresa->id)
			// 			->query();
			// if(count($childresa) > 0) {
			if($postresa->id_children > 0){
				// ce slot est donc l'aller d'un 18 trous
				// $linkedresa->load($childresa[0]);
				$linkedresa->id = $postresa->id_children;
				$linkedresa->load();
				$this->slotRetour = new  EGP_GameSlot($linkedresa,  EGP_GameSlot::RETOUR);
				$this->slotAller->type =  EGP_GameSlot::ALLER;	// changement de type pour l'aller
			}
		}else{
			// c'est une resa liée, ce slot est donc un parcours retour d'un 18 trous
			$linkedresa->id = $postresa->id_parent;
			$linkedresa->load();
			$this->slotRetour = new  EGP_GameSlot($postresa,  EGP_GameSlot::RETOUR);	//le retour c'est le slot courant
			$this->slotAller->setSlot($linkedresa,  EGP_GameSlot::ALLER);		//l'aller c'est la resa liée
			$this->slotCurrent = &$this->slotRetour;	// on met à jour le current
		}

		////////////////////////////////////////////////////////
		// Stockage des Ids des reservations aller et retour
		
		$this->reservations['id_reservation_aller'] = &$this->slotAller->id;
		if($this->slotRetour){
			$this->reservations['id_reservation_retour'] = &$this->slotRetour->id;
		}
		////////////////////////////////////////////////////////

		// On positionne le trou de départ de l'aller
		$this->setTrouDepart($this->slotAller->typeParcours->trou_depart);

		// On recupère les joueurs et leurs nombres de trous respectifs
		if($this->slotCurrent->type ==  EGP_GameSlot::UNIQ){
			//cette partie est en 9 trous, donc pas de retour à chercher
			$users_has_resa = DB_SQL::select("default")
				->from("users_has_reservation")
					->where("id_reservation", "=", $this->slotAller->resa->id)
						->query();	// tous les users ayant une resa à ce slot horaire
			foreach($users_has_resa as $loopitem){
				$pl = DB_ORM::model('users',array($loopitem['id_users']));
				$newplayer = new EGP_GamePlayer($pl->id, 9, $pl->firstname, $pl->lastname, $loopitem['info']);
				$newplayer->userHasResa = $loopitem['id'];
				$this->slotCurrent->players[] = $newplayer;
				$this->slotCurrent->nbPlayers++;
				// $this->players[] = $newplayer;
				// $this->nb_joueurs++;
			}
		}else{
			//cette partie est en 18 trous, on cherche quels joueurs font le retour
			$users_has_resa = DB_SQL::select("default")
				->from("users_has_reservation")
					->where("id_reservation", "=", $this->slotAller->resa->id)
						->query();	// tous les users ayant une resa à ce slot horaire
			$users_has_retour = DB_SQL::select("default")
				->from("users_has_reservation")
					->where("id_reservation", "=", $this->slotRetour->resa->id)
						->query();	// tous les users ayant une resa à ce slot horaire
			foreach($users_has_resa as $loopitem){
				$pl = DB_ORM::model('users',array($loopitem['id_users']));
				$usernbtrous = 9;
				$userhasretour = false;
				foreach($users_has_retour as $loopretour){
					if($loopretour['id_users'] == $loopitem['id_users']){
						$userhasretour = true;
						$usernbtrous = 18;
						$user_resa_retour = $loopretour['id'];
						break;
					}
				}
				$newplayer = new EGP_GamePlayer($pl->id, $usernbtrous, $pl->firstname, $pl->lastname, $loopitem['info']);
				$newplayer->userHasResa = $loopitem['id'];
				// $this->players[] = $newplayer;
				// $this->nb_joueurs++;
				$this->slotAller->players[] = $newplayer;
				$this->slotAller->nbPlayers++;
				if($userhasretour){
					$player_retour = new EGP_GamePlayer($pl->id, $usernbtrous, $pl->firstname, $pl->lastname, $loopitem['info']);
					$player_retour->userHasResa = $user_resa_retour;
					$this->slotRetour->players[] = $player_retour;
					$this->slotRetour->nbPlayers++;
				}
			}
		}
		// on ajuste les pointeurs globaux (reference à l'aller)
		$this->players = &$this->slotAller->players;
		$this->nb_joueurs = &$this->slotAller->nbPlayers;
		
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
			foreach($user_ressources as $res) {
				$this->players[$idx]->ressourcesIds[] = $res['id_ressources'];
				$golfres = DB_ORM::model('ressources', array($res['id_ressources']));
				$this->players[$idx]->ressources[] = $golfres->ressource;
			}
			$idx++;
		}
		
		return array(
			'valid' => $this->isValid,
			'message' => $this->message
		);
	}	//loadEventResa

	public function IsRequestValid($post, $permanent = true)
	{
		//////////////////////////////////////////////////////////
		// Récupération des données du formulaire				//
		
		$this->method = $post;		// on récupère les paramètres de la requete
		
		$this->isPermanent = $permanent;
		
		$this->postdate 	= Arr::get($this->method, 'date_resa');
		$this->postheure 	= Arr::get($this->method, 'heure_resa');
		$this->nb_trous 	= Arr::get($this->method, 'nb_trous');
		$this->postnbusers	= Arr::get($this->method, 'nb_joueurs');
		if(!$this->preCheckPostedValues()){	// Il manque une donnée obligatoire de la requete
			return array(
				'valid' => $this->isValid,
				'message' => $this->message
			);
		}
		
		//////////////////////////////////////////////////////////
		// Récupération des eventuelles reservations provisoires//
		
		$this->reservations['id_reservation_aller'] = Arr::get($this->method, 'id_resa_provi_aller');
		$this->reservations['id_reservation_retour'] = Arr::get($this->method, 'id_resa_provi_retour');
		
		//////////////////////////////////////////////////////////
		// Récuperation et vérification de la date				//
		
		$dtmp 		= explode('/', $this->postdate); // 20/12/2012
		$this->date = $dtmp[2].'-'.$dtmp[1].'-'.$dtmp[0].' '.$this->postheure.':00';	// Date et heure de la partie
		$this->beginDateTime = new DateTime();	// pour que ce soit bien un objet initialisé
		if( $this->date !== NULL){
			$this->beginDateTime = new DateTime($this->date);	// Datetime du début de partie
		}
		if(!$this->CheckPostDateAndTime()){	// probleme dans les dates
			return array(
				'valid' => $this->isValid,
				'message' => $this->message
			);
		}
		
		//////////////////////////////////////////////////////////
		// Récupération et validation des joueurs				//
		
		for($i = 0; $i < $this->max_joueurs; $i++) {
			// if((Arr::get($this->method, 'crud_J'.($i+1)) != "Create") || (Arr::get($this->method, 'crud_J'.($i+1)) != "Edit"))
			if((Arr::get($this->method, 'crud_J'.($i+1)) == "none") || (Arr::get($this->method, 'crud_J'.($i+1)) == "Read"))
				continue;
			$formplayerid = Arr::get($this->method, 'id_J'.($i+1));
			if($formplayerid != null && $formplayerid >= 0) {
				// $formplayernbtrous = Arr::get($this->method, 'nbTrousJ'.($i+1));
				$formplayernbtrous = Arr::get($this->method, 'nb_trous_J'.($i+1));	// 2015-06-22 update for new form
				if(!$formplayernbtrous) {
					$formplayernbtrous = Arr::get($this->method, 'nb_trous');	// Si resa du Wizard
				}
				$pl	= DB_ORM::model('users',array($formplayerid));
				$pl->load();
				$info = "";
				if($formplayerid == 0 || $formplayerid == 1 || $formplayerid == 2) {
					$info = Arr::get($this->method, 'joueur'.($i+1));
				}
				$newplayer = new EGP_GamePlayer($formplayerid, $formplayernbtrous, $pl->firstname, $pl->lastname, $info);
				$newplayer->setCrudState(Arr::get($this->method, 'crud_J'.($i+1)));
				
				$this->players[] = $newplayer;	// TODO faire ça sur le slotAller et pas sur le pointeur global !
				$this->nb_joueurs++;			// TODO faire ça sur le slotAller et pas sur le pointeur global !
				// TODO ici ajouter la création du pointeur player vers le slotAller
			}
		}
		if($permanent){
			if(!$this->CheckPostNbPlayers()){	// probleme dans les joueurs
				return array(
					'valid' => $this->isValid,
					'message' => $this->message
				);
			}
		}
		
		//////////////////////////////////////////////////////////
		// Récupération des ressources demandées				//
		
		$golf_ressources = DB_SQL::select("default")
			->from("ressources")
				->where("id_golf", "=", 1)
					->query();
		foreach($golf_ressources as $res) {
			$postuserhaveres = array();
			$postuserhaveres 	= Arr::get($this->method, $res["ressource"]);
			if($postuserhaveres !== null){
				foreach($postuserhaveres as $useridx){
					$this->players[$useridx]->ressources[] = $res["ressource"];
					$this->players[$useridx]->ressourcesIds[] = $res["id"];
				}
			}
		}
		
		//////////////////////////////////////////////////////////
		//Tout semble ok										//
		
		return array(
			'valid' => $this->isValid,		// ici uniquement true
			'message' => $this->message
		);

		//////////////////////////////////////////////////////////

	}	// IsRequestValid
	
	public function preCheckPostedValues()	//check date, time 
	{
		if( $this->postdate 	== NULL || $this->postdate	== ""	||
			$this->postheure	== NULL || $this->postheure	== ""){	//||
			// $this->nb_trous		== NULL || $this->nb_trous	== ""	) {
			// On vérifie simplement que les variable attendu en POST sont bien là et son cohérentes
			$this->message = "ERREUR : Paramètres manquants ou inattendus lors de la réservation. Parcours NON réservé !";
			Log::instance()->add(Log::NOTICE, "GameReservation::preCheckPostedValues: " .$this->message);
			$this->isValid = false;
		}else{
			$this->isValid = true;
		}
		return $this->isValid;
	}	// preCheckPostedValues
	
	public function CheckPostDateAndTime()	// check de la cohérence de la date => après maintenant
	{
		// TODO ajouter la vérification que l'heure soit bien dans les horaires du Golf
		$this->isValid = true;
		$currentDateTime = new DateTime();	// basée sur la date actuelle

		// $maxDateTime	 = new DateTime();	// basée sur la date actuelle
		// $maxDateTime->setTimestamp(strtotime("+3 days 4 hours"));
		// $maxDateTime->setTime(23,59,59);
		// if(	$this->beginDateTime > $maxDateTime) {
		// 	$this->message = "ERREUR : Désolé vous ne pouvez pas réserver à cette date !";
		// 	$this->isValid = false;
		// }elseif($this->beginDateTime < $currentDateTime) {
		// 	$this->message = "ERREUR : La date à laquelle vous souhaitez réserver est passée.";
		// 	$this->isValid = false;
		// }

		if($this->beginDateTime < $currentDateTime) {
			$this->message = "ERREUR : La date à laquelle vous souhaitez réserver est passée.";
			$this->isValid = false;
		}

		if(!$this->isValid){
			Log::instance()->add(Log::NOTICE, "GameReservation::CheckPostDateAndTime: " .$this->message);
		}
		return $this->isValid;
	}	// CheckPostDateAndTime
	
	public function CheckPostNbPlayers()	// check du nombres de joueurs => entre 1 et 4
	{
		if(	$this->nb_joueurs < 1 || $this->nb_joueurs > $this->max_joueurs){
			$this->message = "ERREUR : Nombre de joueurs non valide";
			Log::instance()->add(Log::NOTICE, "GameReservation::CheckPostNbPlayers: " .$this->message);
			$this->isValid = false;
		}else{
			$this->isValid = true;
		}
		return $this->isValid;
	}	// CheckPostNbPlayers
		
	private function UpdatePlayersParcours()
	{
		$nbretour = 0;
		$dureeAller;
		$dureeRetour;

		// Récupération du parcours complet pour la partie
		$rq_parcours = DB_SQL::select('default')	// on s'interesse aux 2 demi-parcours
			->from('parcours')
				->column('parcours.id')
					->column('parcours.parcour_aller')
						->column('parcours.parcour_retour')
							->where("parcours.trou_depart", "=", $this->trouDepart)
								->where("parcours.id_trace", "=", $this->id_trace, "AND")
									->where("parcours.nb_trous_total", "=", 18, "AND")
										->query();
		if(count($rq_parcours) != 1){
			$this->message = "ERREUR dans la récupération du parcour pour cette partie";
		}
		$partie = $rq_parcours[0];		// TODO a changer. toujours égal à 3 et c'est faux pour un 9T

		// Récuperation des durées des parcours

		$typeparcours	= DB_ORM::model('type_parcours');

		// parcours Aller
		$typeparcours->id = $partie['parcour_aller'];
		$typeparcours->load();
		$dureeAller = $typeparcours->duree;		// duréee Aller
		$horaireduslot_aller = $this->beginDateTime;
		$horairedefin_aller = new Datetime($horaireduslot_aller->format('Y-m-d H:i:s'));
		$horairedefin_aller->add(new DateInterval('PT' .$dureeAller .'S'));
		
		// parcours Retour
		$typeparcours->id = $partie['parcour_retour'];
		$typeparcours->load();
		$dureeRetour = $typeparcours->duree;	// Durée Retour
		$horaireduslot_retour = new DateTime($this->date);
		$horaireduslot_retour->add(new DateInterval('PT' .$dureeAller .'S'));
		$horairedefin_retour = new Datetime($horaireduslot_retour->format('Y-m-d H:i:s'));
		$horairedefin_retour->add(new DateInterval('PT' .$dureeRetour .'S'));
		
		($this->trouDepart == 1)? $trou_retour = 10 : $trou_retour = 1;
		
		// On alimente les objets joueurs
		foreach($this->players as $player) {
			// $player->parcourId = $partie['id'];	// TODO a changer car incohérent pour un 9T
			if($player->nbTrous == 18){
				$player->typeParcourIds['aller']	= [$partie['parcour_aller'], $dureeAller];
				$player->typeParcourIds['retour']	= [$partie['parcour_retour'], $dureeRetour];
				$nbretour++;
			}else{	// joueur d'une partie 9T
				$player->typeParcourIds['aller']	= [$partie['parcour_aller'], $dureeAller];
			}
		} //foreach players
		
		// Remplissage des infos de la resa
		$this->parcours['aller']['id']			= $partie['parcour_aller'];
		$this->parcours['aller']['slot']		= $horaireduslot_aller;
		$this->parcours['aller']['trou_depart']	= $this->trouDepart;
		$this->parcours['aller']['nb_players']	= $this->nb_joueurs;
		$this->parcours['aller']['duree']		= $dureeAller;
		$this->parcours['aller']['fin']			= $horairedefin_aller;
		// if ($nbretour > 0){	// on crée le parcour retour pour les resa provis
			// TODO Ameliorer les resa provi !
			$this->parcours['retour']['id']			= $partie['parcour_retour'];
			$this->parcours['retour']['slot']		= $horaireduslot_retour;
			$this->parcours['retour']['trou_depart']= $trou_retour;
			$this->parcours['retour']['nb_players']	= $nbretour;
			$this->parcours['retour']['duree']		= $dureeRetour;
			$this->parcours['retour']['fin']		= $horairedefin_retour;
		// }
	}	// UpdatePlayersParcours
	
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
		
		if(!$this->isBeforeLastStart($this->parcours['aller']['slot'])){	// l'horaire est apres l'heure de fermeture
			$digest['valid']		= false;
			$digest['message']		= "ERREUR: l'horaire de départ est apres l'heure de fermeture";
			return $digest;
		}
		if(count($this->parcours) == 2){
			if(!$this->isBeforeLastStart($this->parcours['retour']['slot'])){	// l'horaire est apres l'heure de fermeture
				$digest['valid']		= false;
				$digest['message']		= "ERREUR: l'horaire du retour est apres l'heure de fermeture";
				return $digest;
			}
		}		
		$collision_result = $this->CheckCollision();
		if(!$collision_result['valid']) {
			$this->CancelResa($this->reservations['id_reservation_aller']);
			$this->CancelResa($this->reservations['id_reservation_retour']);
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
		$digest['sh']			= $this->getTrouDepart();
		$digest['nb_trous']		= (count($this->parcours) == 2)? 18 : 9;
		$digest['players']		= $this->players;
		// $digest['ressources']	= ;
		$digest['duree']		= gmdate("H:i", $duree_total);
		$digest['heure_fin']	= $heure_fin->format('H:i');
		
		return $digest;
	}	// CreateDigest
	
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
			$this->setTrouDepart($tdepart);
			$check_result = $this->LockParcours(false);	// false: pour non permanent
			if($check_result['valid']) {
				//////////////////////////////////////////////////////////////////////////
				// Ok la reservation provi est faite !
				// Retour d'infos sur la reservation 
				//////////////////////////////////////////////////////////////////////////
				return array(
					'valid' => $this->isValid,
					'message' => "OK: Réservation enregistrée",
					'id_reservation_aller' => $this->reservations['id_reservation_aller'],
					'id_reservation_retour' =>  $this->reservations['id_reservation_retour']
				);
			}
			// if($tdepart == 10){
			// 	//////////////////////////////////////////////////////////////////////////
			// 	// Aucune dispo => on retourne une erreur
			// 	//////////////////////////////////////////////////////////////////////////
			// 	return array(
			// 		'valid' => $check_result['valid'],	// ici c'est false !
			// 		'message' => $check_result['message'],
			// 		'id_reservation_aller' => NULL,
			// 		'id_reservation_retour' =>  NULL
			// 	);
			// }
		}
		// Aucune dispo => on retourne l'erreur
		return $check_result;	// contient le message d'erreur de LockParcours
	}	// MakeResaProvi
	
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
			$this->setTrouDepart($tdepart);
			
			// Soit on transforme la resa provisoire soit on en crée une directement
			if ($this->reservations['id_reservation_aller'] == null){	// si je n'ai pas de resa provisoire.
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
		if(isset($this->players[0]) && ($this->players[0]->id > $this->id_min_user)){
			// Membres, check collisions ...
			$collision_result = $this->CheckCollision();
			if(!$collision_result['valid']) {
				// Collision !!! on annule tout !
				$this->CancelResa($this->reservations['id_reservation_aller']);
				$this->CancelResa($this->reservations['id_reservation_retour']);
				return array(
					'valid' => $collision_result['valid'],		// Collision  !
					'message' => $collision_result['message']
				);
			}
			//////////////////////////////////////////////////////////////////////////
			// 3 Ajout des joueurs et ressources à la réservation
			//////////////////////////////////////////////////////////////////////////
			foreach($this->players as $player){
				$user_insert 					= DB_ORM::model('users_has_reservation');
				$user_insert->id_users 			= $player->id;;
				$user_insert->id_reservation	= $this->reservations['id_reservation_aller'];
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
					$user_insert->id_reservation	= $this->reservations['id_reservation_retour'];
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

	public function UpdateReservation($reqResa)
	{
		//////////////////////////////////////////////////////////////////////////
		// Concept: Mises à jour possibles
		// A/ +/- nb joueurs
		// B/ Changer 9/18 trous d'un joueur
		// C/ +/- ressources d'un joueur 
		//////////////////////////////////////////////////////////////////////////

		foreach($reqResa->players as $reqPlayer){
			if($reqPlayer->getCrudState() != "Modified"){
				continue;	// Joueur non modifié, next
			}
			// Ce joueur est modifié
			$finded = false;
			$ModifiedPlayer;
			foreach($this->players as $player){
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
					'message' => "ERREUR: Impossible de retrouver le joueur modifié dans cette réservation"
				);
			}
			// OK ici nous avons un joueur à modifier: $ModifiedPlayer et les nouvelles valeurs: $reqPlayer
			//////////////////////////////////////////////////////////////////////////
			// A-1 Ajout d'un joueur
	
			// test de la dispo du nouveau nombre de place
			$savedNbUser = $this->getNbPlayerForSlot($this->slotAller->resa->date_reservation, $this->slotAller->typeParcours->id);
			$reqUsers = $this->nb_joueurs;

			//////////////////////////////////////////////////////////////////////////
			// A-2 Supression d'un joueur
	
			//////////////////////////////////////////////////////////////////////////
			// B-1 Nb Trous: passage à 18
			if($reqPlayer->nbTrous > $ModifiedPlayer->nbTrous){
				// passage en 18 trous
				
			}
	
			//////////////////////////////////////////////////////////////////////////
			// B-2 Nb Trous: passage à 9
			
			if($reqPlayer->nbTrous < $ModifiedPlayer->nbTrous){
				// passage en 9 trous

				// Baisser de 1 le nombre de joueurs dans la partie retour
				$reservation_update_query				= DB_ORM::model('reservation');
				$reservation_update_query->id			= $this->reservations['id_reservation_retour'];
				$reservation_update_query->nb_joueurs	= $this->slotRetour->nbPlayers - 1;
				$reservation_update_query->save(true);

				// Supprimer l'entrée dans la table users_has_reservation pour ce joueur et cette resa
				$builder = DB_ORM::delete('users_has_reservation')
					->where('id_users', '=', $ModifiedPlayer->id)
						->where('id_reservation', '=', $this->reservations['id_reservation_retour']);
				$sql = $builder->statement();
				$id = $builder->execute();

				// Mettre à jour les infos du slot
				$this->slotRetour->nbPlayers--;
				
				// Mettre à jour la resa Aller pour supprimer le lien vers la resa enfant si plus aucun retour
				if($this->slotRetour->nbPlayers <= 0){
					$reservation_update_query				= DB_ORM::model('reservation');
					$reservation_update_query->id			= $this->reservations['id_reservation_retour'];
					$reservation_update_query->id_children	= NULL;
					$reservation_update_query->save(true);
				}

				// Mettre a jour l'objet GamePlayer si d'autre modifs dessus comme les ressources
				$ModifiedPlayer->nbTrous = 9;
			}
			//////////////////////////////////////////////////////////////////////////
			// C-1 Ajout de Ressources

			if(count($reqPlayer->ressourcesIds) >= count($ModifiedPlayer->ressourcesIds)){
				// Ok j'ai des ressources en plus
				if(count($reqPlayer->ressourcesIds) == 1){
					// Ajout de la ressource pour l'aller pour ce joueur
					// $users_has_reservation_query 					= DB_ORM::model('users_has_reservation');
					// $users_has_reservation_query->id_users 			= $ModifiedPlayer->id;
					// $users_has_reservation_query->id_reservation	= $this->reservations['id_reservation_aller'];
					// $users_has_reservation_query->load();
					$builder = DB_ORM::select('users_has_reservation')
						->where('id_users', '=', $ModifiedPlayer->id)
							->where('id_reservation', '=', $this->reservations['id_reservation_aller']);
					$sql = $builder->statement();
					$users_has_reservation_query = $builder->query();

					$builder = DB_ORM::insert('user_reservation_ressources')
						->column('id_user_has_reservation', $users_has_reservation_query[0]->id)
							->column('id_ressources', $reqPlayer->ressourcesIds[0]);
					$sql = $builder->statement();
					$users_has_reservation_query = $builder->execute();

					// Ajout de la ressource pour le retour pour ce joueur
					if($ModifiedPlayer->nbTrous == 18){
						// $users_has_reservation_query 					= DB_ORM::model('users_has_reservation');
						// $users_has_reservation_query->id_reservation	= $this->reservations['id_reservation_retour'];
						// $users_has_reservation_query->load();
						//
						// $users_has_reservation_query							= DB_ORM::model('user_reservation_ressources');
						// $users_has_reservation_query->id_user_has_reservation	= $users_has_reservation_query->id;
						// $users_has_reservation_query->id_ressource	= $reqPlayer->ressourcesIds[0];
						// $users_has_reservation_query->save(true);

						$builder = DB_ORM::select('users_has_reservation')
							->where('id_users', '=', $ModifiedPlayer->id)
								->where('id_reservation', '=', $this->reservations['id_reservation_retour']);
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
	
			if(count($reqPlayer->ressourcesIds) <= count($ModifiedPlayer->ressourcesIds)){
				// Ok j'ai des ressources en moins
				if(count($reqPlayer->ressourcesIds) == 0){
					// Recherche et suppression de la ressource pour l'aller
					$builder = DB_ORM::select('users_has_reservation')
						->where('id_users', '=', $ModifiedPlayer->id)
							->where('id_reservation', '=', $this->reservations['id_reservation_aller']);
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
								->where('id_reservation', '=', $this->reservations['id_reservation_retour']);
						$sql = $builder->statement();
						$users_has_reservation_query = $builder->query();

						$builder = DB_ORM::delete('user_reservation_ressources')
							->where('id_user_has_reservation', '=', $users_has_reservation_query[0]->id);
						$sql = $builder->statement();
						$id = $builder->execute();
					}
				}
			}
		}

	}	// UpdateReservation
	
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
		$demande_reservation->trou_depart 	= $this->getTrouDepart();
		$demande_reservation->nb_trous 		= $this->nb_trous;
		$demande_reservation->date 			= $this->date;
		$demande_reservation->prenom		= $this->method['client_firstname'];
		$demande_reservation->nom			= $this->method['client_name'];
		$demande_reservation->email			= $this->method['client_email'];
		$demande_reservation->phone			= $this->method['client_phone'];
		$demande_reservation->nb_joueurs	= $this->nb_joueurs;
		$demande_reservation->ressources 	= "";
		foreach($ressources as $key => $r) {
			$demande_reservation->ressources .= $key." : ".$r." / ";
		}
		$demande_reservation->id_resa_aller	= $this->reservations['id_reservation_aller'];
		$demande_reservation->id_resa_retour= $this->reservations['id_reservation_retour'];
		$demande_reservation->save(TRUE);
		
	}	// AddToPendingResa
/*	
	public function MakeResaPublic_OLD()
	{
		//////////////////////////////////////////////////////////////////////////
		// Concept: Faire une resa  pour des visiteurs public
		// Réservation des slots horaires et inscription dans une tabme à valider
		//////////////////////////////////////////////////////////////////////////
		
		//////////////////////////////////////////////////////////////////////////
		// 1- Réservation des parcours: 1 ou 2 slots horaires en fonction du nb de joueurs en 9 et 18 trous
		//////////////////////////////////////////////////////////////////////////
		$trou_depart_possible = array(1, 10);
		foreach($trou_depart_possible as $tdepart) {
			$this->setTrouDepart($tdepart);
			$check_result = $this->LockParcours();
			if(!$check_result['valid']) {
				if($tdepart == 10){
					return array(
						'valid' => $check_result['valid'],	// ici c'est false !
						'message' => $check_result['message'],
						'id_reservation_aller' => NULL,
						'id_reservation_retour' =>  NULL
					);
				}
			}else{	// Ok la reservation est faite on passe à la suite
				break;
			}
		}
		
		// TODO: faire la gestion des ressources de façon propre
		$ressources = array();
		$ressources['Chariot'] = Arr::get($this->method, "nb_Chariots");
		
		//////////////////////////////////////////////////////////////////////////
		// Inscription dans la table des resa visiteurs à valider 
		//////////////////////////////////////////////////////////////////////////

		$demande_reservation 				= DB_ORM::model('demande_reservation');
		$demande_reservation->trou_depart 	= $this->getTrouDepart();
		$demande_reservation->nb_trous 		= $this->nb_trous;
		$demande_reservation->date 			= $this->date;
		$demande_reservation->prenom		= $this->method['client_firstname'];
		$demande_reservation->nom			= $this->method['client_name'];
		$demande_reservation->email			= $this->method['client_email'];
		$demande_reservation->phone			= $this->method['client_phone'];
		$demande_reservation->nb_joueurs	= $this->nb_joueurs;
		$demande_reservation->ressources 	= "";
		foreach($ressources as $key => $r) {
			$demande_reservation->ressources .= $key." : ".$r." / ";
		}
		$demande_reservation->id_resa_aller	= $this->reservations['id_reservation_aller'];
		$demande_reservation->id_resa_retour= $this->reservations['id_reservation_retour'];
		$demande_reservation->save(TRUE);
		
		//////////////////////////////////////////////////////////////////////////
		// Retour d'infos sur la reservation 
		//////////////////////////////////////////////////////////////////////////

		$answer = file_get_contents(URL::base('http', TRUE).'golf/reservation/transform/'.$demande_reservation->id);
		
		$message = "<br /><br /><p>Votre demande de réservation a bien été envoyée. Nous vous recontacterons pour confirmer votre réservation.</p>";
		$message .= "<p>Si vous n'avez pas de confirmation avant la date de votre réservation. Merci de nous contacter au 0262 26 33 39</p><br /><br />";
		
		if($answer == "1") {
			// $message .= "YES";
		} else {
			// $message .= "NO";
		}

		return array(
			'valid' => $this->isValid,
			'message' => "OK: Votre demande de réservation est enregistrée !",
			'id_reservation_aller' => $this->reservations['id_reservation_aller'],
			'id_reservation_retour' =>  $this->reservations['id_reservation_retour']
		);
	}	// MakeResaPublic_OLD
*/	
	public function getNbPlayerForSlot($slot, $id_type_parcours)
	{
		$reservation_query = DB_SQL::select('default')
			->from('reservation')
				->column('reservation.id')
					->count('users_has_reservation.id')
						->join(NULL, 'users_has_reservation')
							->on('users_has_reservation.id_reservation', '=', 'reservation.id')
								->where('id_type_parcours', '=', $id_type_parcours)		// correspond au parcours du tracé ex: 9t retour du inout
									->where('date_reservation', '=', $slot)
										->query();
		$result = $reservation_query[0];
		if($result){
			return $result['count'];
		}else{
			return 0;
		}
	}	// getNbPlayerForSlot

	public function InsertResaForParcours($parcours, $temp_until = null, $parent = null, $child = null)
	{
		$until = null;
		if ($temp_until){
			$until = $temp_until->format('Y-m-d H:i:s');
		}
		$parcours['fin']->sub(new DateInterval('PT60S'));	// on décalle de 60 secondes pour coller les resa apres
		$reservation_insert_query = DB_SQL::insert('default')
			->into('reservation')
				->column('id_type_parcours', $parcours['id'])
					->column('date_reservation', $parcours['slot']->format('Y-m-d H:i:s'))
						->column('nb_joueurs', $parcours['nb_players'])
							->column('id_parent', $parent)	// parent : si resa aller id=0
								->column('id_children', $child)	// fille: id de la resa retour si elle existe sinon 0
									->column('date_fin', $parcours['fin']->format('Y-m-d H:i:s'))
										->column('temp_until', $until);
		return $reservation_insert_query->execute(TRUE);	// SQL INSERT la reservation
	}	// InsertResaForParcours
	
	public function UpdateReservationsToPermanent()	// passe la resa de provisoire a permanent,met à jour le nb de joueurs
	{
		if(!isset($this->parcours['aller'])){
			return false;
		}

		$haveaReturn = false;
		// en 1er Update du Retour ou suppression si 9T
		if(isset($this->parcours['retour'])){
			$haveaReturn = true;	// Nous avons un retour
			$reservation_update_query = DB_SQL::update('default')
				->table('reservation')
					->set('nb_joueurs', $this->parcours['retour']['nb_players'])
						->set('temp_until', null)	// on supprime la date de peremption
							->where('id', '=', intval($this->reservations['id_reservation_retour']));
			$reservation_update_query->execute(TRUE);	// SQL UPDATE la reservation
		}else{
			$this->CancelResa($this->reservations['id_reservation_retour']);
		}

		// Update de l'aller et du champ id_children si 9T
		if($haveaReturn)
			$children_field = intval($this->reservations['id_reservation_retour']);
		else
			$children_field = null;
		$reservation_update_query = DB_SQL::update('default')
			->table('reservation')
				->set('nb_joueurs', $this->parcours['aller']['nb_players'])
					->set('temp_until', null)	// on supprime la date de peremption
						->set('id_children', $children_field)	// on supprime ou pas le lien vers le retour
							->where('id', '=', intval($this->reservations['id_reservation_aller']));	
		$reservation_update_query->execute(TRUE);	// SQL UPDATE la reservation
		
		return true;
	}	// UpdateReservationsToPermanent
	
	public function UpdateReservationsChild($id_child)	// informe une resa de l'id de sa résa retour
	{
		if(!isset($this->parcours['aller'])){
			return false;
		}
		$reservation_update_query = DB_SQL::update('default')
			->table('reservation')
				->set('id_children', intval($id_child))	// on intègre l'id de la resa de resa pour le retour
						->where('id', '=', intval($this->reservations['id_reservation_aller']));	
		$reservation_update_query->execute(TRUE);	// SQL UPDATE la reservation
		if(!$reservation_update_query){
			return false;
		}
		return true;
	}	// UpdateReservationsChild
	
	public function LockParcours($isPermanent = true)
	{
		$id_resa_parent	= null;
		$id_resa_retour	= null;
		$this->isValid	= true;	// réinitialisation du flag isValid
		// $nbforslot;
		$until_or_null	= new Datetime();
		$until_or_null->add(new DateInterval('PT' .$this->temporaryLifeSetting .'S'));	// resa temporaire

		Helpers_Tools::PurgeExpiredResaProvi();
		
		// Test de la dispo pour l'aller /////////////////////////////////////////////////////////
		if(!$this->isBeforeLastStart($this->parcours['aller']['slot'])){
			$this->isValid = false;	// l'horaire est apres l'heure de fermeture
			$this->message = "Réservation impossible : l'heure de départ est après le dernier départ.";
		}
		$nb = $this->getNbPlayerForSlot($this->parcours['aller']['slot']->format('Y-m-d H:i:s'), $this->parcours['aller']['id']);
		if($isPermanent){
			if( $nb + $this->parcours['aller']['nb_players'] > $this->max_joueurs ){
				$this->isValid = false;
				$this->message = "Réservation impossible : pas assez de place disponibles pour le(s) joueur(s)";
			}
			$until_or_null = null;	// c'est permanent
			// else{
			// 	$nbforslot = $this->parcours['aller']['nb_players'];
			// }
		}else{
			if( $nb >= $this->max_joueurs ){
				$this->isValid = false;
				$this->message = "Réservation impossible : pas assez de place disponibles pour le(s) joueur(s)";
			}else{
				// $nbforslot = $this->max_joueurs - $nb;
				$this->parcours['aller']['nb_players'] = $this->max_joueurs - $nb;
			}
		}
		//ok parcours aller dispo => on reserve
		if($this->isValid){
			// Réservation du parcour aller
			$id_resa_parent = $this->InsertResaForParcours($this->parcours['aller'],$until_or_null,0);
			if($id_resa_parent == null){
				$this->isValid = false;
				$this->message = "Réservation impossible pour le parcours aller";
			}
		}
		// Mise à jour des données de l'objet pour la resa aller
		$this->reservations['id_reservation_aller'] = $id_resa_parent;
		
		// Test de la dispo pour le retour ///////////////////////////////////////////////////////
		// if($this->isValid && count($this->parcours) == 2){	// il y a un parcour retour
		if( !$isPermanent || ($this->isValid && $this->parcours['retour']['nb_players'] > 0)){	// il y a un parcour retour
			if(!$this->isBeforeLastStart($this->parcours['retour']['slot'])){
				$this->isValid = false;	// l'horaire est apres l'heure de fermeture
				$this->message = "Réservation impossible : l'heure de départ du retour est après le dernier départ.";
			}
			$nb = $this->getNbPlayerForSlot($this->parcours['retour']['slot']->format('Y-m-d H:i:s'), $this->parcours['retour']['id']);
			if ($isPermanent){
				if( $nb + $this->parcours['retour']['nb_players'] > $this->max_joueurs ){
					$this->isValid = false;
					$this->message = "Réservation impossible : pas assez de place disponibles pour le(s) joueur(s) au retour";
				}
				$until_or_null = null;	// c'est permanent
			}else{
				if( $nb >= $this->max_joueurs ){
					$this->isValid = false;
					$this->message = "Réservation impossible : pas assez de place disponibles pour le(s) joueur(s) au retour";
				}else{
					// $nbforslot = $this->max_joueurs - $nb;
					$this->parcours['retour']['nb_players'] = $this->max_joueurs - $nb;
				}
			}
			if($this->isValid){
				// Réservation du parcour retour
				$id_resa_retour = $this->InsertResaForParcours($this->parcours['retour'],$until_or_null,$id_resa_parent);
				if($id_resa_retour == null){
					$this->isValid = false;
					$this->message = "Réservation impossible pour le parcours retour";
				}else{
					// on informe la résa aller de l'id de la resa retour
					if(!$this->UpdateReservationsChild($id_resa_retour)){
						$this->isValid = false;
						$this->message = "Problème sur la réservation, veuillez contacter le secrétariat !";
					}
				}
			}
		}
		// Mise à jour des données de l'objet pour la resa retour
		$this->reservations['id_reservation_retour'] = $id_resa_retour;
		
		// Fin et retour
		if (!$this->isValid){
			if($id_resa_parent != null){
				$this->CancelResa($id_resa_parent);		// on libère la resa de l'aller
			}
			// $this->message = "ERREUR : Impossible de bloquer le créneau horaire";
			return array(	// Plus assez de place dans ce slot horaire pour ce trou de depart
				'valid' => $this->isValid,
				'message' => $this->message,
				'id_reservation_aller' => NULL,
				'id_reservation_retour' =>  NULL
			);
		}
		// $this->reservations['id_reservation_aller'] = $id_resa_parent;
		// $this->reservations['id_reservation_retour'] = $id_resa_retour;
		return array(
			'valid' => $this->isValid,
			'message' => $this->message,
			'id_reservation_aller' => $id_resa_parent,
			'id_reservation_retour' =>  $id_resa_retour
		);
	}	// LockParcours
	
	public function CheckCollision()	// Test de collision des joueurs avec une partie avant ou pendant celle ci
	{
		//////////////////////////////////////////////////////////////////////////////////////////////
		// Vérification des conflits avec une partie existante:
		// - soit pendant la durée de cette réservation
		// - soit qui n'est pas encore terminée
		/////////////////////////////////////////////////////////////////////////////////////////////
		
		foreach($this->parcours as $tp){
			// Creation de la requete
			$query = DB_SQL::select('default')
				->column("reservation.id", "id")
					->column("reservation.date_reservation", "date_reservation")
						->column("reservation.date_fin", "date_fin")
							->column("users.firstname", "firstname")
								->column("users.lastname", "lastname")
						->from('reservation')
							->join(NULL, 'users_has_reservation')
								->on('users_has_reservation.id_reservation', '=', 'reservation.id')
									->join(NULL, 'users')
										->on('users_has_reservation.id_users', '=', 'users.id')
											->where_block('(');
			$members = 0;
			foreach($this->players as $player) {
				// if($player->id != "" && $player->id > 10) {	// TODO: gerer un id minimum pour les membres ou sortir les status speciaux
				if(isset($player->id) && $player->id > $this->id_min_user) {
					$members++;
					$query->where('users_has_reservation.id_users', '=', $player->id, 'OR');
				}
			}
			$query->where_block(')');
			if($members > 0) {
				$datedebutSQL = new DateTime($tp['slot']->format('Y-m-d H:i:s'));
				$datedebutSQLstr = $datedebutSQL->format('Y-m-d H:i:s');
				$datedebutSQL->add(new DateInterval('PT60S'));	// on décalle de 60 secondes pour coller les resa avant
				$datedebutSQLstr2 = $datedebutSQL->format('Y-m-d H:i:s');
				
				$datefinSQL = new DateTime($tp['fin']->format('Y-m-d H:i:s'));
				$datefinSQLstr = $datefinSQL->format('Y-m-d H:i:s');
				$datefinSQL->sub(new DateInterval('PT60S'));	// on décalle de 60 secondes pour coller les resa apres
				$datefinSQLstr2 = $datefinSQL->format('Y-m-d H:i:s');
				$query->where_block('(')
					->where_block('(')
						// test d'une partie qui demarre pendant la nouvelle partie
						->where('reservation.date_reservation', 'BETWEEN', array($datedebutSQLstr, $datefinSQLstr2), 'AND')
					->where_block(')')
					->where_block('(', 'OR')
						// test d'une partie existante qui n'est pas encore finie au debut de la nouvelle
						->where('reservation.date_fin', 'BETWEEN', array($datedebutSQLstr2, $datefinSQLstr), 'OR')
						->where_block(')')
				->where_block(')');
				$sql = $query->statement();
				$results = $query->query();
				// if(count($query) > 0) {
				if(count($results) > 0) {
					// $this->message = "ERREUR : Les joueurs suivants font partie d'une autre réservation qui entre en collision avec celle-ci: </p><ul class='ul_confirmation'>";
					$this->message = "ERREUR : Les joueurs suivants sont dans une autre réservation qui entre en collision avec celle-ci:\n";
					foreach($results as $row) {
						$this->message .= "\t- ".$row['firstname']." ".$row['lastname']."\n";
					}
					// $this->message .= "</ul>";
					$this->isValid = false;
					break;
				}
			}
		} // foreach parcour
		
		
		return array(
			'valid' => $this->isValid,
			'message' => $this->message
		);
	}	// CheckCollision
	
	public function CancelReservations()
	{
		$this->CancelResa($this->reservations['id_reservation_aller']);
		$this->CancelResa($this->reservations['id_reservation_retour']);
	}	// CancelReservations
	
	public function CancelResa($idtocancel)
	{
		$reservation_remove_query		= DB_ORM::model('reservation');
		$reservation_remove_query->id	= $idtocancel;
		$reservation_remove_query->delete();
	}	// CancelResa
	
	public function isBeforeLastStart($startdatetime)
	{
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
	
/*	public function PurgeExpiredResaProvi_OLD()	// deprectaed
	{
		$date = new Datetime();
		$until = $date->format('Y-m-d H:i:s');
		$query = DB_SQL::delete('default')
				->from('reservation')
					->where('reservation.temp_until', '<', $until)
						->execute();
	}	// PurgeExpiredResaProvi
*/
}	// Class EGP_GameReservation

