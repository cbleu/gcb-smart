<?php defined('SYSPATH') or die('No direct script access.');


// class Controller_Golf_Resajax extends Controller
class Controller_Golf_ResAjax extends Controller_Golf_Main
{
	////////////////////////////////
	// PUBLIC FUNCS ////////////////
	////////////////////////////////
	
	public function before()
	{
		$this->template = null;
		$this->auto_render = FALSE;
		parent::before();
	}	// function before
	
	public function after()
	{
		// Set the response content-type here
		// $this->response->headers('Content-Type','application/json');
		parent::after();
	}

	////////////////////////////////
	// ACTION FUNCS ////////////////
	////////////////////////////////

	public function action_eventsparcours()
	{
		$rouge			= '#ff0000';
		$orange 		= '#ff6600';
		$orangeclair 	= '#ffcc00';
		$jaune 			= '#ffff00'; 
		$vert 			= '#99ff00';
		$usercolor 		= '#EE88FF';
		$usercolorfull 	= '#AA22FF';
		
		$event_type		= 2;	// event_type 1=partie, 2=provisoire, 3=evenement
		
		// Purge de toutes les résevations provisoires déjà expirées
		Helpers_Tools::PurgeExpiredResaProvi();
		
		$dateFrom = $this->request->query('from');
		$dateTo = $this->request->query('to');
		$rows = array();
		$start 	= $dateFrom	.date(' H:i:s',mktime(0, 0, 0));
		$end 	= $dateTo	.date(' H:i:s',mktime(23, 59, 59));

		// construction tableau réservation
		$builder = DB_SQL::select('default')
			->column('reservation.id')
				->column('id_type_parcours')
					// ->column('nb_voiturettes')
					// ->column('nb_chariots')
					->column('date_reservation')
						->column('trou_depart')
							->column('id_demande_reservation')
								->column('nb_joueurs')
									->column('temp_until')
										->column('id_parent')
											->column('id_children')
												->from('reservation')
													->join(NULL, 'type_parcours')
														->on('type_parcours.id', '=', 'reservation.id_type_parcours');
		$builder->where('date_reservation', 'BETWEEN', array($start, $end));
		$builder->where('id_evenement','IS', NULL, 'AND');
		$builder->where('temp_until','IS', NULL, 'AND');	// PATCH 3 pour ne plus prendre les resa provisoire
		$builder->where('nb_joueurs',">", 0, 'AND');
		
		$reservations = $builder->query()->as_array();
		
		// Crée le tableau $nb_joueurs_par_trou_par_date
		// et Calcul du nombre de joueurs par trou puis par slot
		$nb_joueurs_par_trou_par_date = array();
		foreach ($reservations as $resa) {
			if(!array_key_exists($resa['trou_depart'], $nb_joueurs_par_trou_par_date)) {
				$nb_joueurs_par_trou_par_date[$resa['trou_depart']] = array();
			}
			if(!array_key_exists($resa['date_reservation'], $nb_joueurs_par_trou_par_date[$resa['trou_depart']])) {
				$nb_joueurs_par_trou_par_date[$resa['trou_depart']][$resa['date_reservation']] = 0;
			}
			$nb_joueurs_par_trou_par_date[$resa['trou_depart']][$resa['date_reservation']] += $resa['nb_joueurs'];
		}
		for ($res=0; $res < count($reservations); $res++) { 
			$payant = 0;
			$reservations[$res]['resa'] = 1;
			// $reservations[$res]['couleur'] = $vert;
			$slot_full = 0;
			if($nb_joueurs_par_trou_par_date[$reservations[$res]['trou_depart']][$reservations[$res]['date_reservation']] >= 4) {
				// $reservations[$res]['couleur'] = $rouge;
				$slot_full = 1;
			}
			
			// ajout automatique 10 min a fin resa
			// TODO a revoir pour récupérer infos dans la base
			$timestamp = strtotime($reservations[$res]['date_reservation']);
			$event_length = 10; // TODO a faire récupérer de la base
			$fin_reservation = date('Y-m-d H:i',strtotime("+$event_length minutes", $timestamp));
			
			$current_user_in_resa = 0;
			// recup users
			$users = DB_SQL::select('default')
				->from('users_has_reservation')
				->where('id_reservation', '=', $reservations[$res]['id'])
				->query()->as_array();
			
			$users_list = "";
			
			// Gestion des resa provisoire
			// $resa_provisoire = 0;
			if($reservations[$res]['temp_until'] != NULL) {
				// $resa_provisoire = 1;
				$event_type = 2;	// resa provisoire
			}else{
				$event_type = 1;	// resa partie joueur
			}

			// PATCH 1
			// Si une réservation est buggé (pas de membre dans la résa),
			// on la supprime et on rapelle la fonction eventparcours
			if(count($users) == 0) {
			// if(count($users) == 0 && $event_type == 2) {
				$resa = DB_ORM::Model('reservation');
				$resa->id = $reservations[$res]['id'];
				$resa->delete();
				return $this->action_eventsparcours();
			}
			// PATCH 2
			// Si la valeur du nombre de joueurs dans la table reservation n'est pas synchronisé 
			// avec la vrai valeur (nb de users_has_reservation)
			// On met à jour ce nombre de réservation dans la base
			if(count($users) != $reservations[$res]['nb_joueurs'] && $event_type == 2) {
				$resa = DB_ORM::Model('reservation');
				$resa->id = $reservations[$res]['id'];
				$resa->load();
				$resa->nb_joueurs = count($users);
				$resa->save();
				$reservations[$res]['nb_joueurs'] = count($users);
			}
			
			$invites = 0;
			$visiteurs = 0;

			for ($i = 0; $i < count($users); $i++) {
				$usr = DB_ORM::Model('users');
				$usr->id = $users[$i]['id_users'];
				$usr->load();
				
				if($usr->id > 10) { // TODO use settings
					// Infos du membre
					$users_list .= $usr->firstname." ".$usr->lastname." (".$usr->indgolf.")<br />";
				}else if($usr->id == 1) {
					// Infos du Visiteur
					if($reservations[$res]['id_demande_reservation'] != NULL && $reservations[$res]['id_demande_reservation'] != 0) {
						$demande_resa = DB_ORM::Model('demande_reservation');
						$demande_resa->id = $reservations[$res]['id_demande_reservation'];
						$demande_resa->load();
						if($demande_resa->is_loaded()){
							$users_list = $demande_resa->prenom." ".$demande_resa->nom."<br />";
							if($this->isAdmin) {
								$users_list .= "Tel : ".$demande_resa->phone."<br />";
								$users_list .= "Email : <a href='mailto:".$demande_resa->email."'>".$demande_resa->email."</a><br />";
							}
						}
					}else {
						$users_list .= $users[$i]['info']." (Visiteur)<br />";
					}
					// partie payante car visiteur
					$payant++;
					$visiteurs++;
				}else if($users[$i]['id_users'] == 0) {
					//partie payante car invité
					$payant++;
					$invites++;
					$users_list .= $users[$i]['info']." (Invité)<br />";
				}
				// else if($usr->id == 2) {
				// 	$users_list .= " Provisoire <br />";
				// }
				
				// on check si c'est le user connecte
				if($this->isLogged && $users[$i]['id_users'] == $this->user->id) {
					$current_user_in_resa = 1;
				}
			}
			if ($current_user_in_resa) {
				$reservations[$res]['couleur'] = $usercolor;
				$nb_j = $reservations[$res]['nb_joueurs'] - 1;
				$title = "Vous";
				if($nb_j > 0) {
					$title.= " + ".$nb_j.' Joueur';
				}
				if($nb_j > 1) {
					$title .= "s";
				}
				if($nb_j == 3){
					$reservations[$res]['couleur'] = $usercolorfull;
				}
			}else {
				$title = $reservations[$res]['nb_joueurs'].' Joueur';
				if($reservations[$res]['nb_joueurs'] > 1) {
					$title .= "s";
				}
			}
			// $in_time = 0;
			// $dt_debut = new DateTime($reservations[$res]['date_reservation']);
			// $dt_now = new DateTime();
			// if($dt_debut > $dt_now) {
			// 	$in_time = 1;
			// }
			if ($invites == 0 && $visiteurs == 0){
				$speciaux = null;
			}else{
				$speciaux = array($invites, $visiteurs);
			}
			
			
			// if($reservations[$res]['id_parent'] == 0){
			// 	$retour = 0;
			// }else{
			// 	$retour = 1;
			// }
			
			// Test si partie en 9 trous, 18T aller ou 18T retour
			if(intval($reservations[$res]['id_children']) > 0){	// Il y a un retour => c'est un 18T aller
				$game_type = 1;	// 18T Aller
			}else if(intval($reservations[$res]['id_parent']) > 0){ // il y a un aller => c'est un 18T retour
				$game_type = 2;	// 18T retour
			}else{
				$game_type = 0;	// 9T
			}
			
			
			//Create an event entry
			$rows[] = array(
				'id'	=> intval($reservations[$res]['id']),			// Id de la partie
				'n'		=> intval($reservations[$res]['nb_joueurs']),	// Nb de joueurs:
				'sh'	=> intval($reservations[$res]['trou_depart']),	// Start Hole: trou de depart: 1 ou 10
				'evt'	=> $event_type,									// Event Type: 1=partie, 2=provisoire, 3=evenement
				'g'		=> $game_type,									// Game Type: 0=9T, 1=18Taller, 2=18T retour
				'l'		=> intval($reservations[$res]['id_parent']),	// Link: id de la resa liee:aller ou retour
				'f'		=> $slot_full,
				// 'p'	=> $resa_provisoire,
				// 'text' => $title,
				// 'r' => $retour,
				// 'usr_in' => $current_user_in_resa,
				'u'		=> $current_user_in_resa,						// User In: l'utilisateur fait partie de cette resa
				// 'trou_depart' => intval($reservations[$res]['trou_depart']),
				'pay' => $payant,
 				's' => $speciaux,
				// 'r' => intval($reservations[$res]['id_parent']),	// id de la resa de l'aller ou 0
				// 'c' => intval($reservations[$res]['id_children']),	// tweak: id de la resa du retour ou 0
				'start_date' => date('Y-m-d H:i', strtotime($reservations[$res]['date_reservation'])),
				'end_date' => date('Y-m-d H:i',strtotime($fin_reservation)),
				// 'textColor' => 'black',
				// 'color' => $reservations[$res]['couleur'],
				// 'in_time' => $in_time,
				// 'type' => ($resa_provisoire == 1)? 'provi' : 'r',
				'j' => $users_list,
			);
		}
		
		$evenements = DB_SQL::select('default')
			->from('evenements')
				->where('date_fin', '>=', $start)	// modif pour prendre en compte la nouvelle gestion des evenements récurrents
				// ->where('date_fin', 'BETWEEN', array($start, $end))
					->query()->as_array();
		
		foreach($evenements as $evenement) {
			$rows[] = array(
				'id' => $evenement['id'],
				// 'type' => '2',	// resa de type evenement
				'evt' => '3',	// resa de type evenement
				// 'joueurs' => '',
				'text' => $evenement['intitule'],
				'start_date' => date('Y-m-d H:i', strtotime($evenement['date_debut'])),
				'end_date' => date('Y-m-d H:i', strtotime($evenement['date_fin'])),
				// 'textColor' => 'black',
				'color' => '#'.$evenement['couleur'],
				// 'colour' => $evenement['couleur'],
				// 'current_user_in_resa' => FALSE,
				// 'trou_depart' => $evenement['trou_depart'],
				'sh' => $evenement['trou_depart'],
				// 'in_time' => 1,
				'rec_type' => $evenement['rec_type'],
				'event_length' => $evenement['event_length'],
				'event_pid' => $evenement['event_pid']
				// a faire test du user pour la couleur des events
				//'color' => ''
			);
		}
		echo json_encode($rows);
	}	// action_eventsparcours
	
	public function action_userblockedtimes()	// Récupération des slots occupés par le joueurs pour la journee
	{
		$returnArray = array();
		if (!$this->isLogged) {
			echo json_encode($returnArray);
			return;
		}

		$day_date = Arr::get($_GET,'day_date');
		if($day_date != NULL && $day_date != "") {
			$dd_array = explode('/', $day_date);
			$day_dt = mktime(0,0,0, $dd_array[1], $dd_array[0], $dd_array[2]);
			
			$resa_query_begin_dt  	= date("Y-m-d 00:00:00", $day_dt);
			if($this->isAdmin){
				$resa_query_end_dt 		= date("Y-m-d 23:59:59", $day_dt + strtotime("+1 week"));
			}else{
				$resa_query_end_dt 		= date("Y-m-d 23:59:59", $day_dt);
			}
		}else {
			$resa_query_begin_dt  	= date("Y-m-d 00:00:00");
			if($this->isAdmin){
				$resa_query_end_dt 	= date("Y-m-d H:i:s", strtotime("+1 month"));
			} else {
				$resa_query_end_dt 	= date("Y-m-d H:i:s", strtotime("+1 week"));
			}
		}
		// // // // // // // // // // // // // // // // // // // // // // // // // // // // // //
		// Vérouillage des plages qui couvrent la durée des réservation
		// // // // // // // // // // // // // // // // // // // // // // // // // // // // // //
		$user_reservations = DB_SQL::select('default')
								->from('reservation')
								->column('reservation.date_reservation', 'date_reservation')
								->column('type_parcours.duree', 'duree')
								->join(NULL, 'users_has_reservation')
								->on('users_has_reservation.id_reservation', '=', 'reservation.id')
								->join(NULL, 'type_parcours')
								->on('type_parcours.id', '=', 'reservation.id_type_parcours')
								->where('users_has_reservation.id_users', '=', $this->user->id)
								->where('reservation.date_reservation', 'BETWEEN', array($resa_query_begin_dt, $resa_query_end_dt),  'AND')
								->query();
		foreach($user_reservations as $slot) {
			$startDT = new DateTime($slot['date_reservation']);			// heure réelle de début de partie
			$endDT = new DateTime($startDT->format('Y-m-d H:i:s'));

			$startDT->sub(new DateInterval('PT'.$slot['duree'].'S'));	// début de la zone de blocage avant la partie
			$endDT->add(new DateInterval('PT'.$slot['duree'].'S'));		// fin de la zone de blocage en fin de partie
			// array_push($user_blocked_time, array($date_debut_reservation->format('F j, Y H:i:s'), $date_fin_reservation->format('F j, Y H:i:s')));
			array_push($returnArray, array($startDT->format('Y-m-d H:i'), $endDT->format('Y-m-d H:i')));
		}
		//cesar : TODO: ajouter 2h avant le début des parties
		echo json_encode($returnArray);
	}	// action_userblockedtimes
	
	public function action_getdispo()
	{
		$trou_depart_possible = array(1, 10);
		$begin_date 	= Arr::get($_POST, 'begin_date');
		$end_date 		= Arr::get($_POST, 'end_date');
		// Variable qui stocke le nombre de joueurs par créneau horaire en fonction du numéro de trou ($total_joueurs_counts[numero_de_trou][datetime] = nb_joueurs)
		$total_joueurs_counts   = array(1 => array(), 10 => array());
		$total_joueurs_counts_2 = array(1 => array(), 10 => array());
		
		foreach($trou_depart_possible as $trou_depart) {
			
			$creneaux_oqp_request = DB_SQL::select('default')
							->column('date_reservation')
							->column('type_parcours.trou_depart')
							->column('type_parcours.duree')
							->count('users_has_reservation.id')
							->from('reservation')
							->join(NULL, 'type_parcours')
							->on('type_parcours.id', '=', 'reservation.id_type_parcours')
							->join(NULL, 'users_has_reservation')
							->on("users_has_reservation.id_reservation", "=", 'reservation.id')
							->where('date_reservation', 'BETWEEN', array($begin_date, $end_date))
							->where('type_parcours.trou_depart', '=', $trou_depart, 'AND')
							->group_by('reservation.id');
			$creneaux_oqp = $creneaux_oqp_request->query();
			
			$duree = 0;
			foreach($creneaux_oqp as $cren) {
				$slot = $cren['date_reservation'];
				$duree = $cren['duree'];
				if(!array_key_exists($slot, $total_joueurs_counts[$trou_depart])) {
					$total_joueurs_counts[$trou_depart][$slot] = 0;
				}
				$total_joueurs_counts[$trou_depart][$slot] += $cren['count'];	// on stock la somme des joueurs pour ce slot
			}
		
			$creneaux_oqp_request = DB_SQL::select('default')
							->column('date_reservation')
							->column('type_parcours.trou_depart')
							->column('type_parcours.duree')
							->count('users_has_reservation.id')
							->from('reservation')
							->join(NULL, 'type_parcours')
							->on('type_parcours.id', '=', 'reservation.id_type_parcours')
							->join(NULL, 'users_has_reservation')
							->on("users_has_reservation.id_reservation", "=", 'reservation.id')
							->where('date_reservation', 'BETWEEN', array($begin_date, $end_date))
							->where('type_parcours.trou_depart', '=', ($trou_depart == 1) ? 10 : 1, 'AND')
							->group_by('reservation.id');
			$creneaux_oqp = $creneaux_oqp_request->query();
			foreach($creneaux_oqp as $cren) {
				$slotstamp = strtotime($cren['date_reservation']);
				$prevstamp = strtotime("- ".$duree." seconds", $slotstamp);
				$slot = date("Y-m-d H:i:s", $prevstamp);
				if(!array_key_exists($slot, $total_joueurs_counts_2[$trou_depart])) {
					$total_joueurs_counts_2[$trou_depart][$slot] = 0;
				}
				$total_joueurs_counts_2[$trou_depart][$slot] += intval($cren['count']);
			}
			
			foreach($total_joueurs_counts_2[$trou_depart] as $slot => $tjc) {
				if(array_key_exists($slot, $total_joueurs_counts[$trou_depart])) {
					if($total_joueurs_counts[$trou_depart][$slot] < $total_joueurs_counts_2[$trou_depart][$slot]){
						$total_joueurs_counts[$trou_depart][$slot] = $total_joueurs_counts_2[$trou_depart][$slot];
					}
				} else {
					$total_joueurs_counts[$trou_depart][$slot] = $tjc;
				}
			}
		}
		echo json_encode($total_joueurs_counts);
	}	// action_getdispo
	
	public function action_addprovi()
	{
		$isValid = false;
		$response = array();

		// $isPermanent = false;
		// $this->method = $_POST;		// on récupère les paramètres de la requete

		//////////////////////////////////////////////////////////////////////////
		// Récupération et vérification des elements de la requete POST

		$newResa = new EGP_GameReservation(Settings::get('id_trace'), true); // true: passe en mode provisoire

		$funcresult = $newResa->InitResa($_POST);

		//////////////////////////////////////////////////////////////////////////
		// Création de la réservation provisoire
		// eventuellement positionnée sur un trou de départ dans le calendrier

		if($funcresult['valid']) {
			// Requete valide: Création de la réservation provisoire
			$funcresult = $newResa->MakeResaProvi(Arr::get($_POST, 'trou_depart'));
		}

		//////////////////////////////////////////////////////////////////////////
		// Renvoi de la reponse

		echo json_encode($funcresult);

	}	// action_addprovi

	public function action_cancelresaprovi()
	{
		$isValid = false;
		$response = array();
		//////////////////////////////////////////////////////////////////////////
		// Récupération et vérification des elements de la requete POST
		$newResa = new EGP_GameReservation(Settings::get('id_trace'), true);
		$isPermanent = false;
		$funcresult = $newResa->InitResa($_POST);

		if($funcresult['valid']) {
			//////////////////////////////////////////////////////////////////////////
			// Requete valide: suppression de la réservation
			$newResa->CancelReservations();
			$response = $newResa->message;
		}else{
			$response = $funcresult;
		}
		//////////////////////////////////////////////////////////////////////////
		// Renvoi de la reponse
		echo json_encode($response);
	}	// action_cancelresaprovi
	
	public function action_loaddetailsform()
	{
		$isValid = false;
		$returnArray = array();
		if (!$this->isLogged) {
			echo json_encode($returnArray);
			return;
		}
		//////////////////////////////////////////////////////////////////////////
		$method = $_POST;
		$id_reservation 		= Arr::get($method, 'id_reservation');
		$start_date 			= Arr::get($method, 'start_date');
		$trou_depart 			= Arr::get($method, 'trou_depart');
		$current_user_in_resa 	= Arr::get($method, 'usr_in');
		
		$actual_resa = new EGP_GameReservation(Settings::get('id_trace'));
		$funcresult = $actual_resa->InitResaByLoading($id_reservation);
		if($funcresult['valid']) {
			//////////////////////////////////////////////////////////////////////////
			// Requete valide: Création de la réservation
			$isValid = true;
			$returnArray[$id_reservation]['isSelected'] = true;
			$returnArray[$id_reservation]['usr_in'] = $current_user_in_resa;
			$returnArray[$id_reservation]['game_type'] = $actual_resa->slotCurrent->gameType;

			$returnArray[$id_reservation]['GameReservation'] = $actual_resa;

		}else{
			$isValid = false;
			$returnArray = $funcresult;
		}
		$otherplayers= array();
		if($isValid){
			//TODO: chercher le type de parcours pris dans ce slot
			//Trouver s'il y a d'autres reservations au même slot
			$other_reservations = Helpers_Tools::getOtherResaOnTheSameSlotAs($id_reservation);
			foreach($other_reservations as $otherone){
				$other_resa = new EGP_GameReservation(Settings::get('id_trace'));
				$tmpresult = $other_resa->InitResaByLoading($otherone['id']);
				if($tmpresult['valid']) {
					//////////////////////////////////////////////////////////////////////////
					// Requete valide: Création de la réservation
					// $returnArray = $actual_resa->MakeResaProvi();
					$isValid = true;
					$returnArray[$otherone['id']]['isSelected'] = false;
					$returnArray[$otherone['id']]['game_type'] = $other_resa->slotCurrent->gameType;

					$returnArray[$otherone['id']]['GameReservation'] = $other_resa;

				}else{
					$isValid = false;
					$returnArray = $funcresult;
				}

			}

		}
		
		//////////////////////////////////////////////////////////////////////////
		// Renvoi de la reponse
		echo json_encode($returnArray);
	}	// action_loaddetailsform
	
	public function action_retrievedate()
	{
		$max_joueurs = 4;
		$trou_depart_possible = array(1, 10);
		$nb_trous = Arr::get($_POST, 'nb_trous');
		$dateArray = explode('/', Arr::get($_POST, 'date')); // 20/12/2012
		$day = $dateArray[0];
		$month = $dateArray[1];
		$year = $dateArray[2];
		$requestDate = $year.'-'.$month.'-'.$day;
		
		// Variable qui stocke le nombre de joueurs par créneau horaire en fonction du numéro de trou ($total_joueurs_counts[numero_de_trou][heure] = nb_joueurs)
		$total_joueurs_counts = array(1 => array(), 10 => array());
		
		foreach($trou_depart_possible as $trou_depart)
		{
			$creneaux_oqp_request = DB_SQL::select('default')
							->column('date_reservation')
							->column('type_parcours.trou_depart')
							->column('type_parcours.duree')
							->count('users_has_reservation.id')
							->from('reservation')
							->join(NULL, 'type_parcours')
							->on('type_parcours.id', '=', 'reservation.id_type_parcours')
							->join(NULL, 'users_has_reservation')
							->on("users_has_reservation.id_reservation", "=", 'reservation.id')
							->where('date_reservation', 'BETWEEN', array($requestDate.' 00:00:00', $requestDate.' 23:59:59'))
							->where('type_parcours.trou_depart', '=', $trou_depart, 'AND')
							->group_by('reservation.id');
			$creneaux_oqp = $creneaux_oqp_request->query();
			
			$duree = 0;
			foreach($creneaux_oqp as $slot) {
				$duree = $slot['duree'];
				$key = $slot['date_reservation'];
				if(!array_key_exists($key, $total_joueurs_counts[$trou_depart])) {
					$total_joueurs_counts[$trou_depart][$key] = 0;
				}
				$total_joueurs_counts[$trou_depart][$key] += $slot['count'];
			}
			// Dans le cas d'un 18 trous on va chercher si il y a de la place pour la 2ème reservation
			if($nb_trous == 18) {
				$creneaux_oqp_request = DB_SQL::select('default')
								->column('date_reservation')
								->column('type_parcours.trou_depart')
								->column('type_parcours.duree')
								->count('users_has_reservation.id')
								->from('reservation')
								->join(NULL, 'type_parcours')
								->on('type_parcours.id', '=', 'reservation.id_type_parcours')
								->join(NULL, 'users_has_reservation')
								->on("users_has_reservation.id_reservation", "=", 'reservation.id')
								->where('date_reservation', 'BETWEEN', array($requestDate.' 00:00:00', $requestDate.' 23:59:59'))
								->where('type_parcours.trou_depart', '=', ($trou_depart == 1) ? 10 : 1, 'AND')
								->group_by('reservation.id');
				$creneaux_oqp = $creneaux_oqp_request->query();
				
				$total_joueurs_counts_2 = array(1 => array(), 10 => array());
				foreach($creneaux_oqp as $slot) {
					$dt = strtotime($slot['date_reservation']);
					$dtprec = strtotime("- ".$duree." seconds", $dt);
					$key = date("Y-m-d H:i:s", $dtprec);
					
					if(!array_key_exists($key, $total_joueurs_counts_2[$trou_depart])) {
						$total_joueurs_counts_2[$trou_depart][$key] = 0;
					}
					$total_joueurs_counts_2[$trou_depart][$key] += intval($slot['count']);
				}
				
				foreach($total_joueurs_counts_2[$trou_depart] as $key => $tjc) {
					if(array_key_exists($key, $total_joueurs_counts[$trou_depart])) {
						if($total_joueurs_counts[$trou_depart][$key] < $total_joueurs_counts_2[$trou_depart][$key]){
							$total_joueurs_counts[$trou_depart][$key] = $total_joueurs_counts_2[$trou_depart][$key];
						}
					} else {
						$total_joueurs_counts[$trou_depart][$key] = $tjc;
					}
				}
			}
		}
		
		$less_total_joueurs_counts = array();
		$chaine_retour = '{"horaires_reserves":[';
			// Si il y a des crénaux horaires qui contiennent déjà des réservations au niveau des 2 trous disponibles, on récupère celui qui a le moins de joueurs
		// Si il n'y a pas d'index correspondant dans les deux tableau cela signifie que pour un des trous il n'y a personne donc qu'il est complétement libre pour ce trou
		foreach($total_joueurs_counts[1] as $hour => $nb) {
			if(array_key_exists($hour, $total_joueurs_counts[10])) {
				// if($total_joueurs_counts[10][$hour] < $nb) {
				// 	// Trou 10 contient + de place disponible
				// 	$less_total_joueurs_counts[$hour] = $total_joueurs_counts[10][$hour];
				// }
				// else {
				// 	// Trou 1 contient + de place disponible
				// 	$less_total_joueurs_counts[$hour] = $nb;
				// }
				$less_total_joueurs_counts[$hour] = ($total_joueurs_counts[10][$hour] < $nb) ? $total_joueurs_counts[10][$hour] : $nb;	// max places par horaire
			}
		}
		
		foreach($less_total_joueurs_counts as $date_resa => $total_nb) {
			// On récupère l'heure
			$reservation_date = explode(' ', $date_resa);
			$reservation_time = explode(':', $reservation_date[1]);
			
			$places_dispo = $max_joueurs - $total_nb;
			$chaine_retour .= '["'.$reservation_time[0].':'.$reservation_time[1].'", '.$places_dispo.'],';
		}
		
		$chaine_retour = substr($chaine_retour,0, strlen($chaine_retour)-1);	// On enlève la dernière virgule
		$chaine_retour .= ']}';	// on ferme la structure
		//cesar: exemple $chaine_retour = {"horaires_reserves":[["06:00", 3],["08:10", 3],["14:00", 0],["16:10", 3]]}
		
		echo $chaine_retour;
	}	// action_retrievedate
	
	public function action_wizarddigest()	// affichage du résumé avant validation
	{
		$valid = false;
		$message = "";
		$msg_header = "";
		$digest_return = array();
		
		if(!$this->isLogged) {
			$msg_header = "<br /><br /><h4>Votre demande de réservation est prête à être envoyée !</h4>";
			$msg_header .= "<p>Une confirmation vous sera transmise par le secrétariat. Pour toute autre information, merci de nous contacter au 0262 26 33 39</p><br /><br />";
		}
		//////////////////////////////////////////////////////////////////////////
		// Récupération et vérification des elements de la requete POST
		$newResa = new EGP_GameReservation(Settings::get('id_trace'));
		$funcresult = $newResa->IsRequestValid_OLD($_POST);
		$message = $funcresult['message'];
		$valid = $funcresult['valid'];
		if($valid) {
			// Requete de reservation valide construction du resume
			$digest_return = $newResa->CreateDigest();
			$message = $digest_return['message'];
			$valid = $digest_return['valid'];
		}
		
		//////////////////////////////////////////////////////////
		// Creation de la page de résultat
		echo json_encode($digest_return);

	}	// action_confirmation

	public function action_autocomplete()
	{
		$nameStartsWith = Arr::get($_POST, 'name_startsWith');
		$joueurs_presents = array();//Arr::get($_POST, 'joueurs_presents');
		
		if(Arr::get($_POST, 'joueurs_presents') != null){
			foreach(Arr::get($_POST, 'joueurs_presents') as $joueur_present) {
				// On ne considère pas les Visiteurs et invité pour pouvoir en ajouter
				if($joueur_present > 1) {
					array_push($joueurs_presents, $joueur_present);
				}
			}
		}
		$status = DB_SQL::select('default')
	   					->from('user_status')
						->where('status', '=', 'enable')
						->query();
						
		$enable_status_id = $status[0]['id'];
		
		// TODO : dans le filtre enlever les joueurs déjà selectionnés (filter en javascript avec l'ID)
		// TODO2 : Filtrer aussi les joueurs qui sont pas déjà en train de jouer (départ + durée de parcours)
		$users = DB_SQL::select('default')
				->from('users')
				->column('users.id', 'id')
				->column('users.firstname', 'firstname')
				->column('users.lastname', 'lastname')
				->column("users.indgolf", "indgolf")
				->join('LEFT', 'user_roles')
				->on('user_roles.user_id', '=', 'users.id')
				->join('LEFT', 'roles')
				->on('user_roles.role_id', '=', 'roles.id')
				->where_block('(')
				->where('firstname', 'LIKE', $nameStartsWith."%")
				->where('lastname', 'LIKE', $nameStartsWith."%", "OR")
				->where_block(')')
				->where_block('(')
				->where('roles.name', 'IS', NULL, 'AND')
				->where('roles.name', '<>', 'admin', 'OR')
				->where_block(')');
				
		if(count($joueurs_presents) > 0) {
			$users = $users->where('users.id', 'NOT IN', $joueurs_presents, "AND");
		}
		
		$users = $users->where('users.id_status', '=', $enable_status_id, "AND")
		->query();
		//->statement();
		//echo $users;
				
		$chaine_retour='{';
		
		foreach ($users as $user) {
			$chaine_retour = $chaine_retour.'"'.$user['id'].'": "'.$user['firstname'].' '.$user['lastname'].' ('.$user['indgolf'].')",';
		}
		
		if(strlen($chaine_retour) > 1) {
			$chaine_retour = substr($chaine_retour,0, strlen($chaine_retour)-1);
		}
		
		$chaine_retour = $chaine_retour."}";
		
		echo $chaine_retour;
	}	// action_autocomplete
	
	public function action_add()
	{

		//////////////////////////////////////////////////////////
		// Récupération et vérification de la requete POST

		$newResa = new EGP_GameReservation(Settings::get('id_trace'));
		$funcresult = $newResa->InitResa($_POST);

		//////////////////////////////////////////////////////////
		// Si Requete valide: Création de la réservation
		if($funcresult['valid']) {
			$funcresult = $newResa->MakeReservation(Arr::get($_POST, 'trou_depart'));
		}
		
		//////////////////////////////////////////////////////////
		// Creation de la page de résultat

		echo json_encode($funcresult);

	}	// action_add


	public function action_update()
	{

		//////////////////////////////////////////////////////////
		// Récupération et vérification de la requete POST

		$updatedResa = new EGP_GameReservation(Settings::get('id_trace'));
		$funcresult = $updatedResa->InitResa($_POST);

		if(!$funcresult['valid']) {
			echo json_encode($funcresult);
		}
		//////////////////////////////////////////////////////////
		// Chargement de la réservation actuelle

		$id_reservation 		= Arr::get($_POST, 'id_reservation');

		$actualResa = new EGP_GameReservation(Settings::get('id_trace'));
		$funcresult = $actualResa->InitResaByLoading($id_reservation);
		
		if($funcresult['valid']) {
			$isValid = true;
			$returnArray = $funcresult;

			//////////////////////////////////////////////////////////
			// Traitement de la mise à jour
			$funcresult = $actualResa->UpdateReservation($updatedResa);

			// On supprime la resa provisoire faite pour le traitement
			$updatedResa->CancelReservations();
		}

		
		//////////////////////////////////////////////////////////
		// Envoi de l'etat de résultat
		echo json_encode($returnArray);
	}	// action_update
	

	public function action_delete()
	{
		if (!$this->isLogged) {
			echo json_encode(array(
				'valid' => false,
				'message' => "Not logged in !",
			));
			return;
		}
		$message = "";
		$valid = true;
		$method = $_POST;
		
		$id_reservation = Arr::get($method, 'id_reservation');
		$reservation = DB_ORM::model('reservation');
		$reservation->id = $id_reservation;
		$reservation->load();
		
		// Récupère la reservation liée si il y en a une
		$reservation_linked = DB_ORM::model("reservation");
		$reservation_aller = DB_ORM::model("reservation");
		$reservation_retour = DB_ORM::model("reservation");
		if($reservation->id_parent > 0) {	// c'est un retour
			$reservation_linked->id = $reservation->id_parent;
			$reservation_linked->load();
			$reservation_aller = $reservation_linked;
			$reservation_retour = $reservation;
		} else {	// c'est un aller
			$reservation_aller = $reservation;
			$reservation_child = DB_SQL::select("default")
				->from('reservation')
					->where("id_parent", "=", $reservation->id)
						->query();
			if(count($reservation_child) > 0) {	// ok il y a un retour
				$reservation_linked->load($reservation_child[0]);
				$reservation_retour = $reservation_linked;
			}
		}
		// on teste si l'utilisateur est dans la partie
		$user_in_resa = DB_SQL::select('default')
			->from('users_has_reservation')
				// ->where('id_reservation', '=', $id_reservation)
				->where('id_reservation', '=', $reservation_aller->id)
					->where('id_users', '=', $this->user->id)
						->query();
		// Si l'utilitateur est dans la réservation il peut supprimer la reservation
		// et si la date de réservation n'est pas passée.
		$date_aller = strtotime($reservation_aller->date_reservation);
		
		$date_retour = NULL;
		if($reservation_retour->id > 0) {
			$date_retour = strtotime($reservation_retour->date_reservation);
		}
		
		// if( ($date_aller < strtotime("now"))){
		if( ($date_aller < strtotime("-1 hours"))){
			$message = "Vous ne pouvez pas supprimer cette réservation: partie commencée ou finie !";
			$valid = false;
		// }elseif($date_retour < strtotime("now") && $date_retour != NULL){
		}elseif($date_retour < strtotime("-1 hours") && $date_retour != NULL){
			$message = "Vous ne pouvez pas supprimer cette réservation: partie commencée ou finie !";
			$valid = false;
		}elseif(count($user_in_resa) == 0){
			$message = "Vous ne pouvez pas supprimer cette réservation: vous n'en faites pas partie.";
			$valid = false;
		}
		if($valid || $this->isAdmin){
			$reservation_aller->delete();
			if($date_retour != NULL)
				$reservation_retour->delete();
			$message = "La réservation a bien été supprimée.";
			$valid = true;
		}
		
		echo json_encode(array(
			'valid' => $valid,
			'message' => $message,
		));
	}	// action_delete
	
	public function action_leave()
	{
		if (!$this->isLogged) {
			echo json_encode(array(
				'valid' => false,
				'message' => "Not logged in !",
			));
			return;
		}
		$message = "";
		$valid = false;
		$method = $_POST;
		
		// $user_to_remove = Arr::get($method, 'id_user');
		
		// $users_has_reservation = DB_ORM::model('users_has_reservation');
		// $users_has_reservation->id = Arr::get($method, 'id_users_has_reservation');
		// $users_has_reservation->load();
		try {
			$users_has_reservation = DB_ORM::model('users_has_reservation', array(Arr::get($method, 'id_users_has_reservation')));
		} catch (Exception $e) {
			echo json_encode(array(
				'valid' => false,
				'message' => $e->getMessage(),
				'event_id' => null
			));
			return false;
		}
		
		$event_id = $users_has_reservation->id_reservation;
		
		$resp = $this->leave_reservation(Arr::get($method, 'id_users_has_reservation'));
		
		$reservation = $resp['reservation'];
		$valid = $resp['valid'];
		$message = $resp['message'];
		
		if($reservation == null) {
			goto end;
		}
		
		// Récupère la reservation liée si il y en a une
		$reservation_linked = DB_ORM::model("reservation");
		if($reservation->id_parent > 0) {
			$reservation_linked->id = $reservation->id_parent;
			$reservation_linked->load();
		} else {
			$reservation_child = DB_SQL::select("default")
									->from('reservation')
									->where("id_parent", "=", $reservation->id)
									->query();
			
			if(count($reservation_child) > 0) {
				$reservation_linked->load($reservation_child[0]);
			}
		}
		
		// On essaie de supprimer l'utilisateur dans la réservation liée (sans vérifier si sa marche)
		if($reservation_linked->id > 0) {
			$uhr = DB_SQL::select('default')
					->from('users_has_reservation')
					->where('id_reservation', '=', $reservation_linked->id)
					->where('id_users', '=', $users_has_reservation->id_users, 'AND')
					->where('info', '=', $users_has_reservation->info, 'AND')
					->query()->as_array();
					
			if(count($uhr) > 0) {
				$this->leave_reservation($uhr[0]["id"]);
			}
		}
		
		$valid = $resp['valid'];
		$message = $resp['message'];
		
		end:
		
		echo json_encode(array(
			'valid' => $valid,
			'message' => $message,
			'event_id' => $users_has_reservation->id_reservation
		));
	}	// action_leave



	////////////////////////////////
	// ACTIONS NOT FOR RESA ////////
	////////////////////////////////


	public function action_login()
	{
		/* modif olivier a revoir */
		$redirect = isset($_REQUEST['redirect']) ? $_REQUEST['redirect'] : '/';

		if ($this->isLogged) {
			echo json_encode(array(
				'valid' => true,
				'redirect' => $redirect
			));
			exit();
		}

		// If the login form was posted...
		$post = $this->request->post();

		//Arr::get($_POST, 'username');
		if (isset($post['username'])){
			// Try to login
			if (Auth::instance()->login($post['username'], $post['password'])) {
				
				$user = Auth::instance()->get_user();
				
				$enable_status = DB_SQL::select('default')
					->from('user_status')
						->where('status', '=', 'enable')
							->query();
					
				if($user->id_status != $enable_status[0]['id']) {
					Auth::instance()->logout();
					echo json_encode(array(
						'valid' => false,
						'error' => 'Utilisateur désactivé.',
					));
					exit();
				}	
				/*if (Auth::instance()->logged_in('admin'))
				{
				$redirect = Route::get('dashboard')->uri();
				}
				else{*/
				// $redirect = '/';
				//}
				echo json_encode(array(
					'valid' => true,
					'redirect' => $redirect
				));
				exit();
			} else {
				echo json_encode(array(
					'valid' => false,
					'error' => 'Utilisateur ou mot de passe invalide. Réessayez.',
				));
				exit();
			}
		}
	}

	public function action_logout()
	{
		Auth::instance()->logout();
		header('Location: '.$redirect);
		exit();
	}
	
	public function action_updatepass()
	{
		if (!$this->isLogged) {
			echo json_encode(array(
				'valid' => false,
				'message' => "Vous devez être connecté !",
			));
			return;
		}
		$message = "";
		$valid = false;
		$method = $_POST;

		$email      = Arr::get($method, 'email');
		$password   = Arr::get($method, 'password');
		$password2  = Arr::get($method, 'password2');
		
		if($password == $password2) {
			if($password != "") {
				$user->password = Auth::instance()->hash_password($password);
				// $user->email 			= $email;
				$this->user->save(TRUE);
		
				$message = '<br/>Vos informations ont été correctement mise à jour.';
				$valid = true;
			}
		}
		else {
			$message = "Mots de passe différents";
		}
		
		echo json_encode(array(
			'valid' => $valid,
			'message' => $message,
		));
	}	// action_updatpass

	public function action_updateuser()
	{
		if (!$this->isLogged) {
			echo json_encode(array(
				'valid' => false,
				'message' => "Vous devez être connecté !",
			));
			return;
		}
		$message = "";
		$valid = false;
		$method = $_POST;

		// $email      = Arr::get($method, 'email');
		// $password   = Arr::get($method, 'password');
		// $password2  = Arr::get($method, 'password2');
		$lastname   = Arr::get($method, 'lastname');
		$firstname  = Arr::get($method, 'firstname');
		$adresse    = Arr::get($method, 'adresse');
		$cp         = Arr::get($method, 'cp');
		$ville      = Arr::get($method, 'ville');
		$pays       = Arr::get($method, 'pays');
		$telephone  = Arr::get($method, 'telephone');
		$index      = Arr::get($method, 'index');
		
		// if($password == $password2) {
		// 	if($password != "") {
		// 		$user->password = Auth::instance()->hash_password($password);
		// 		$user->email 			= $email;
				// $this->user->username 		= $email;
				$this->user->lastname 		= $lastname;
				$this->user->firstname 		= $firstname;
				$this->user->indgolf 			= $index;
				$this->user->telephone 		= $telephone;
				$this->user->adresse 			= $adresse;
				$this->user->cp 				= $cp;
				$this->user->ville 			= $ville;
				$this->user->id_pays 			= $pays;
				$this->user->save(TRUE);
		
				$message = '<br/>Vos informations ont été correctement mise à jour.';
				$valid = true;
		// 	}
		// }
		// else {
		// 	$message = "Mots de passe différents";
		// }
		
		echo json_encode(array(
			'valid' => $valid,
			'message' => $message,
		));
	}	// action_updateuser

	////////////////////////////////
	// PRIVATE FUNCS ///////////////
	////////////////////////////////
	
	private function leave_reservation($id_users_has_reservation)	// used in action_leave
	{
		$valid = false;
		$message = "";
		$reservation = null;
		
		$users_has_reservation = DB_ORM::model('users_has_reservation');
		$users_has_reservation->id = $id_users_has_reservation;
		$users_has_reservation->load();
		
		if(!$this->isAdmin && $users_has_reservation->id_users != $this->user->id) {
			$users_has_reservations = DB_SQL::select('default')
				->from('users_has_reservation')
					->where('id_reservation', '=', $users_has_reservation->id_reservation)
						->query();
			$present = FALSE;
			foreach($users_has_reservations as $uhr) {
				if($uhr['id_users'] == $this->user->id) {
					$present = TRUE;
				}
			}
			if(!$present) {
				$message = "ERREUR ! Vous ne pouvez pas supprimer un membre d'une réservation où vous n'êtes pas présent.";
				goto end;
			}
		}
		
		$reservation = DB_ORM::model('reservation');
		$reservation->id = $users_has_reservation->id_reservation;
		$reservation->load();
		
		$date_reservation = strtotime($reservation->date_reservation);
		
		// if($date_reservation < strtotime("now") && !$this->isAdmin) {
		if($date_reservation < strtotime("-1 hours") && !$this->isAdmin) {
			$message = "ERREUR ! Cette réservation est en cours ou déjà passée. Impossible de supprimer un joueur.";
			goto end;
		}
		
		// Verifie si il y a encore des joueurs après la suppression
		$count_users_reservation = DB_SQL::select('default')
			->from('users_has_reservation')
				->where('id_reservation', '=', $users_has_reservation->id_reservation)
					->where('id', '<>', $users_has_reservation->id, 'AND')
						->where('id_users', '<>', 0, 'AND') // sans compter les invités
							->count('id')
								->query();
		if($count_users_reservation[0]['count'] <= 0) {
			$message = "ERREUR ! Il reste un seul membre dans cette réservation. Vous ne pouvez pas le retirer de la partie. Pour annuler la réservation, cliquez sur supprimer.";
			goto end;
		}
		
		// Supprimer l'users_has_reservation, décrémenter le nombre de joueurs
		$users_has_reservation->delete();
		$reservation->nb_joueurs--;
		$reservation->save();
		
		$valid = true;
		$message = "Joueur retiré avec succès";
		
		end:
		
		return array(
			'valid' => $valid,
			'message' => $message,
			'reservation' => $reservation
		);
	}	// leave_reservation
	
	private function collision_check($id_joueurs, $date_debut_reservation, $id_type_parcours)	// used in update only
	{
		$message = "";
		$valid = FALSE;
		
		$type_parcours = DB_ORM::model('type_parcours');
		$type_parcours->id = $id_type_parcours;
		$type_parcours->load();
		
		// // // // // // // // // // // // // // // // // // // // // // // // // // // // // //
		// Vérification si une existante ne commence pas pendant la durée de cette réservation
		// // // // // // // // // // // // // // // // // // // // // // // // // // // // // //
		$date_fin_reservation = new DateTime($date_debut_reservation->format('Y-m-d H:i:s'));
		$date_fin_reservation->add(new DateInterval('PT'.$type_parcours->duree.'S'));

		$reservation_user_slot = DB_SQL::select('default')
								->column("users.firstname", "firstname")
								->column("users.lastname", "lastname")
								->from('reservation')
								->join(NULL, 'users_has_reservation')
								->on('users_has_reservation.id_reservation', '=', 'reservation.id')
								->join(NULL, 'users')
								->on('users_has_reservation.id_users', '=', 'users.id')
								->where_block('(');
							
		$normal_playeurs_count = 0;
		foreach($id_joueurs as $id_j) {
			if($id_j != "" && $id_j != 0 && $id_j != 1) {
				$normal_playeurs_count++;
				$reservation_user_slot->where('users_has_reservation.id_users', '=', $id_j, 'OR');
			}
		}
		
		if($normal_playeurs_count == 0) {
			$valid = TRUE;
			goto end;
		}

		$reservation_user_slot = $reservation_user_slot->where_block(')')
								->where('reservation.date_reservation', '>=', $date_debut_reservation->format('Y-m-d H:i:s') , 'AND')
								->where('reservation.date_reservation', '<=', $date_fin_reservation->format('Y-m-d H:i:s') , 'AND')
								->query()->as_array();

		if(count($reservation_user_slot) > 0) {
			$message = "ERREUR : Les joueurs suivants font partie d'une autre réservation : \n\n";
			//print_r($reservation_user_slot);
			foreach($reservation_user_slot as $slot) {
				$message .= " - ".$slot['firstname']." ".$slot['lastname']."\n";
			}
			
			Log::instance()->add(Log::NOTICE, "ajax add public : erreur ".$message);
			$valid = FALSE;
			goto end;
		}
		
		
		// // // // // // // // // // // // // // // // // // // // // // // // // // // // // //
		// Vérification si cette partie ne se trouve pas sur la plage d'une réservation existante
		// // // // // // // // // // // // // // // // // // // // // // // // // // // // // //
		
		$query = "SELECT `users_has_reservation`.`id_users` as `id_users`,
						 `reservation`.`date_reservation` as `date_reservation`,
						  DATE_ADD(  `reservation`.`date_reservation` , INTERVAL  `type_parcours`.`duree` SECOND ) AS `date_fin_reservation` 
						  FROM  `reservation`
						  JOIN  `users_has_reservation` ON (  `users_has_reservation`.`id_reservation` =  `reservation`.`id` )
						  JOIN  `type_parcours` ON (  `type_parcours`.`id` =  `reservation`.`id_type_parcours` )
						  WHERE (";
		$i = 0;
		foreach($id_joueurs as $id_j) {
			
			if($id_j != "" && $id_j != 0 && $id_j != 1) {
				if($i != 0) $query .= " OR ";
				$query .= " `users_has_reservation`.`id_users` = ".$id_j;
				$i++;
			}
			
		}
		
		$query .= ") ";
		
		$query .= " AND  `reservation`.`date_reservation` >=  '".$date_debut_reservation->format('Y-m-d')." 00:00:00'";
		$query .= " AND  `reservation`.`date_reservation` <=  '".$date_debut_reservation->format('Y-m-d')." 23:59:59'";
		
		// On récupère les réservations du jour J pour tous les joueurs présent
		
		$connection = DB_Connection_Pool::instance()->get_connection('default');
		//echo $query;
		$results = $connection->query($query);
		
		if ($results->is_loaded()) {
			$id_joueurs_deja_present = array();
			foreach($results as $resa) {	
				$dt_reservation = new DateTime($resa['date_reservation']);
				$dt_fin_reservation = new DateTime($resa['date_fin_reservation']);
										
				if($date_debut_reservation >= $dt_reservation && $date_debut_reservation <= $dt_fin_reservation) { // Comparer les dates !!!!!
					array_push($id_joueurs_deja_present, $resa['id_users']);
				}
			}
			
			if(count($id_joueurs_deja_present) > 0) {
				$message = "ERREUR : Les joueurs suivants se trouvent déjà dans une partie au moment de votre réservation : \n\n";
				
				foreach($id_joueurs_deja_present as $id_u) {
					
					$usr = DB_ORM::model('users');
					$usr->id = $id_u;
					$usr->load();
					
					$message .= " - ".$usr->firstname." ".$usr->lastname."\n";
				}
				
				Log::instance()->add(Log::NOTICE, "ajax add public : erreur ".$message);
				$valid = FALSE;
				goto end;
			}
		}
		
		$results->free();
		
		$valid = TRUE;
		
		end :
		
		return array(
			'valid' => $valid,
			'message' => $message
		);
	}	// collision_check
	
}
