<?php defined('SYSPATH') or die('No direct script access.');


// class Controller_Golf_Reservationajax extends Controller
class Controller_Golf_Reservationajax extends Controller_Main
{
	////////////////////////////////
	// PUBLIC FUNCS ////////////////
	////////////////////////////////
	
	public function before()
	{
		$this->template = 'ajax';		// Set the template as /views/public.php
		$this->auto_render = FALSE;
		parent::before();
	}	// function before
	

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
		Tools::PurgeExpiredResaProvi();
		
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
											->column('id_parcours')	// tricks to get return id (will be id_child)
												->from('reservation')
													->join(NULL, 'type_parcours')
														->on('type_parcours.id', '=', 'reservation.id_type_parcours');
		$builder->where('date_reservation', 'BETWEEN', array($start, $end));	//added by cesar
		$builder->where('id_evenement','IS', NULL, 'AND');
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
				
				if($usr->id > 10) {
					$users_list .= $usr->firstname." ".$usr->lastname." (".$usr->indgolf.")<br />";
				}else if($usr->id == 1) {
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
			if(intval($reservations[$res]['id_parcours']) > 0){	// Il y a un retour => c'est un 18T aller
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
				// 'c' => intval($reservations[$res]['id_parcours']),	// tweak: id de la resa du retour ou 0
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
	
	public function action_resaprovi()
	{
		$isValid = false;
		$response = array();
		//////////////////////////////////////////////////////////////////////////
		// Récupération et vérification des elements de la requete POST
		$newResa = new GameReservation();
		$isPermanent = false;
		$this->method = $_POST;		// on récupère les paramètres de la requete
		$funcresult = $newResa->IsRequestValid($_POST, $isPermanent);
		if($funcresult['valid']) {
			//////////////////////////////////////////////////////////////////////////
			// Requete valide: Création de la réservation provisoire
			// eventuellement positionnée sur un trou de départ dans le calendrier
			$response = $newResa->MakeResaProvi(Arr::get($_POST, 'trou_depart'));
		}else{
			$response = $funcresult;
		}
		//////////////////////////////////////////////////////////////////////////
		// Renvoi de la reponse
		echo json_encode($response);
	}	// action_resaprovi
	
	public function action_cancelresaprovi()
	{
		$isValid = false;
		$response = array();
		//////////////////////////////////////////////////////////////////////////
		// Récupération et vérification des elements de la requete POST
		$newResa = new GameReservation();
		$isPermanent = false;
		$funcresult = $newResa->IsRequestValid($_POST, $isPermanent);
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
		if (!$this->isLogged) {
			echo json_encode($returnArray);
			return;
		}
		$isValid = false;
		$returnArray = array();
		//////////////////////////////////////////////////////////////////////////
		$method = $_POST;
		$id_reservation = Arr::get($method, 'id_reservation');
		$start_date = Arr::get($method, 'start_date');
		$trou_depart = Arr::get($method, 'trou_depart');
		// $current_user_in_resa = Arr::get($method, 'current_user_in_resa');
		$current_user_in_resa = Arr::get($method, 'usr_in');
		
		$actual_resa = new GameReservation();
		$funcresult = $actual_resa->loadEventResa($id_reservation);
		if($funcresult['valid']) {
			//////////////////////////////////////////////////////////////////////////
			// Requete valide: Création de la réservation
			// $returnArray = $actual_resa->MakeResaProvi();
			$isValid = true;
			$returnArray[$id_reservation]['isSelected'] = true;
			// $returnArray[$id_reservation]['current_user_in_resa'] = $current_user_in_resa;
			$returnArray[$id_reservation]['usr_in'] = $current_user_in_resa;
			$returnArray[$id_reservation]['type'] = $actual_resa->slotCurrent->type;
			// $returnArray[$id_reservation]['players'] = $actual_resa->slotCurrent->players;
			$returnArray[$id_reservation]['players'] = $actual_resa->players;
			// $returnArray['players'] = $actual_resa->players;
			$returnArray[$id_reservation]['slotAller'] = $actual_resa->slotAller->id;
			$returnArray[$id_reservation]['slotRetour'] = $actual_resa->slotRetour->id;
		}else{
			$isValid = false;
			$returnArray = $funcresult;
		}
		$otherplayers= array();
		if($isValid){
			//TODO: chercher le type de parcours pris dans ce slot
			//Trouver s'il y a d'autres reservations au même slot
			$other_reservations = Tools::getOtherResaOnTheSameSlotAs($id_reservation);
			foreach($other_reservations as $otherone){
				$tmpresa = new GameReservation();
				$tmpresult = $tmpresa->loadEventResa($otherone['id']);
				if($tmpresult['valid']) {
					//////////////////////////////////////////////////////////////////////////
					// Requete valide: Création de la réservation
					// $returnArray = $actual_resa->MakeResaProvi();
					$isValid = true;
					$returnArray[$otherone['id']]['isSelected'] = false;
					$returnArray[$otherone['id']]['type'] = $tmpresa->slotCurrent->type;
					// $returnArray[$otherone['id']]['players'] = $tmpresa->slotCurrent->players;
					$returnArray[$otherone['id']]['players'] = $tmpresa->players;
				}else{
					$isValid = false;
					$returnArray = $funcresult;
				}
				
			}
			// $returnArray['other_resa'] = $otherplayers;
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
		$newResa = new GameReservation();
		$funcresult = $newResa->IsRequestValid($_POST);
		$message = $funcresult['message'];
		$valid = $funcresult['valid'];
		if($valid) {
			// Requete de reservation valide construction du resume
			$digest_return = $newResa->CreateDigest();
			$message = $digest_return['message'];
			$valid = $digest_return['valid'];
		}
		
		//////////////////////////////////////////////////////////////////////////
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
		$valid = false;
		$message = "";
		//////////////////////////////////////////////////////////////////////////
		// Récupération et vérification des elements de la requete POST
		$newResa = new GameReservation();
		// $funcresult = $newResa->initGameReservation($_POST);
		$funcresult = $newResa->IsRequestValid($_POST);
		if($funcresult['valid']) {
			//////////////////////////////////////////////////////////////////////////
			// Requete valide: Création de la réservation
			$resa_result = $newResa->MakeReservation(Arr::get($_POST, 'trou_depart'));
			if($resa_result['valid']) {
				$valid = true;
			}else{
				$message = $resa_result['message'];
				$valid = false;
			}
		}else{
			$message = $funcresult['message'];
			$valid = false;
		}
		//////////////////////////////////////////////////////////////////////////
		// Creation de la page de résultat
		echo json_encode(array(
			'valid' => $valid,
			'message' => $message,
		));
	}	// action_add

	public function action_update()
	{
		$message = "Veuillez vous identifier";
		$valid = false;
		
		if (!$this->isLogged) {
			goto end;
		}
		$message = "";
		
		// TODO : Empécher l'update si la date est déjà passé
		$logged_in_user = Auth::instance()->get_user();
		$max_joueurs = 4;
		$method = $_POST;
		
		$id_reservation = Arr::get($method, 'id_reservation');
		
		$reservation = DB_ORM::model('reservation');
		$reservation->id = $id_reservation;
		$reservation->load();
		
		$total_nb_joueur_par_slot = 0;
		
		$query 	= "SELECT SUM(nb_joueurs) AS nb_joueurs_par_slot";
		$query .= " FROM reservation WHERE date_reservation = '".$reservation->date_reservation;
		$query .= "' AND id_type_parcours = ".$reservation->id_type_parcours;
		
		$connection = DB_Connection_Pool::instance()->get_connection('default');
		$results = $connection->query($query);
		
		if ($results->is_loaded()) {
			$total_nb_joueur_par_slot = $results[0]['nb_joueurs_par_slot'];
			
			$maxReservationDay = 3;
			$maxDateTime = new DateTime();
			$maxDateTime->setTimestamp(strtotime("+3 days 4 hours"));
			$maxDateTime->setTime(23,59,59);
			$date_resa = new DateTime($reservation->date_reservation);
			
			if($date_resa > $maxDateTime && !Auth::instance()->logged_in('admin')) {
				$message = "ERREUR : Vous de pouvez pas modifier une réservation à plus de ".$maxReservationDay." jours.";
				goto end;
			}
		}
		
		$results->free();
		
		$id_joueurs = array();
		$nom_joueurs = array();
		$nb_invite_deja_present = 0;
		$nb_visiteur_deja_present = 0;
		for($i = 0; $i < 4; $i++) {
			$id_joueurs[$i] = Arr::get($method, 'id_joueur'.($i+1));
			$nom_joueurs[$i] = Arr::get($method, 'joueur'.($i+1));
			
			if($id_joueurs[$i] == 0 && $nom_joueurs[$i] === NULL) {
				$nb_invite_deja_present++;
			}
			elseif($id_joueurs[$i] == 1 && $nom_joueurs[$i] === NULL) {
				$nb_visiteur_deja_present++;
			}
		}
		
		$id_players_to_add 	= array();
		$nb_Trous_player	= array();
		
		for($i = $total_nb_joueur_par_slot + 1; $i <= $max_joueurs; $i++) {
			$id_joueur = Arr::get($method, 'id_joueur'.$i);
			$nb_trous = Arr::get($method, 'nbTrousJ'.$i);
			
			if(!($id_joueur === NULL) && $id_joueur != "" && !($nb_trous === NULL)) {
				array_push($id_players_to_add, $id_joueur);
				array_push($nb_Trous_player, $nb_trous);
			}
		}
		
		if(($total_nb_joueur_par_slot + count($id_players_to_add)) > $max_joueurs) {
			$message = "ERREUR ! Cette partie ne peux plus accueillir ".count($id_players_to_add)." joueurs";
			goto end;
		}
		
		//////////////////////////////////////////////////////////////////////////
		// Vérification des parties en cours
		//////////////////////////////////////////////////////////////////////////
		$colision_result = $this->collision_check($id_players_to_add, new DateTime($reservation->date_reservation), $reservation->id_type_parcours);
		
		if(!$colision_result['valid']) {
			$valid 		= FALSE;
			$message 	= $colision_result['message'];
			goto end;
		}
		
		$ressources_available = DB_SQL::select("default")
							->from("ressources")
							->where("id_golf", "=", 1)
							->query();
		
		$ressources = array();
		$ressources_ids = array();
		
		foreach($ressources_available as $r) {
			$ressources[$r["ressource"]] = Arr::get($method, $r["ressource"]);// checkbox avec comme value le numéro du joueur de 0 à 3.
			$ressources_ids[$r["id"]] = Arr::get($method, $r["ressource"]);
		}
		
		$user_resa = DB_SQL::select('default')
					->from('users_has_reservation')
					->where('id_reservation', '=', $id_reservation)
					->where('id_users', '=', $logged_in_user->id)
					->query();
		
		// TODO 2 : Gerer les reservations multiples ? 18 trous
		
		// Si l'utilisateur courant est dans la reservation
		// On ajoute simplement les joueurs à la reservation et on incrémente le nombre de joueurs dans la reservation
		// OU SI c'est un administrateur et qu'il ajoute un invité
		$update_or_new = "";
		$invite_i = 0;
		
		// On initialise le compteur avec le nb de visiteurs et invité déja présent dans la partie
		$visiteur_and_invite_incr = array(0 => $nb_invite_deja_present, 1 => $nb_visiteur_deja_present); // 0 - invité / 1 - visiteur
		
		if(count($user_resa) > 0 || (Auth::instance()->logged_in('admin') && Arr::get($method, "new") == 0)) {
			$update_or_new = "update";
			foreach($id_players_to_add as $id_player) {
				
				$user_reservation_to_insert 				= DB_ORM::model('users_has_reservation');
				$user_reservation_to_insert->id_users 		= $id_player;
				$user_reservation_to_insert->id_reservation = $reservation->id;
				
				if($id_player <= 1) {
					//	 On récupère les keys du tableau contenant l'id 0 pour invite OU 1 pour visiteur
					$special_user_keys = array_keys($id_joueurs, $id_player);
				
					// on recupère l'index du Nième visiteur (id_users => 1) ou invité (id_users => 0)
					$index = $visiteur_and_invite_incr[$id_player];
					// On récupère l'index joueur dans le tableau contenant les 4 joueurs de la partie
					$joueur_index = $special_user_keys[$index];
				
					// On incrément son compteur pour ne pas récupérer le même nom a chaque fois
					$visiteur_and_invite_incr[$id_player] += 1;
				
					// On stocke dans info la valeur contenu dans le champs nom lorsque visiteur ou invité est coché
					$user_reservation_to_insert->info = $nom_joueurs[$joueur_index];
				}

				$user_reservation_to_insert->save();
				
				//////////////////////////////////////////////////////////////////////////
				// Ajout des ressources aux réservations joueurs
				//////////////////////////////////////////////////////////////////////////
				
				$keys = array_keys($id_joueurs, $id_player);
				
				if(count($keys) == 1 && $keys[0] >= 0) { // Joueur normal ou un seul invite
					foreach($ressources_ids as $ressource_id => $joueurs_indexes) {
						// On vérifie dans le tableau de ressources récupéré en POST que l'index est présent.
						// Si il est présent c'est que la ressource a été coché pour ce joueur donc on ajoute cette ressource a la reservation du joueur
						
						if($joueurs_indexes != null && !(array_search($keys[0], $joueurs_indexes) === FALSE)) {
							$user_reservation_ressources							= DB_ORM::model('user_reservation_ressources');
							$user_reservation_ressources->id_user_has_reservation 	= $user_reservation_to_insert->id;
							$user_reservation_ressources->id_ressources			 	= $ressource_id;
							
							$user_reservation_ressources->save();
						}
					}
				}
				else if(count($keys) > 1 && $invite_i < count($keys) && $keys[$invite_i] >= 0) { // Joueurs invites 
					foreach($ressources_ids as $ressource_id => $joueurs_indexes) {
						// On vérifie dans le tableau de ressources récupéré en POST que l'index est présent.
						// Si il est présent c'est que la ressource a été coché pour ce joueur donc on ajoute cette ressource a la reservation du joueur
						
						if($joueurs_indexes != NULL && !(array_search($keys[$invite_i], $joueurs_indexes) === FALSE)) {
							
							$user_reservation_ressources							= DB_ORM::model('user_reservation_ressources');
							$user_reservation_ressources->id_user_has_reservation 	= $user_reservation_to_insert->id;
							$user_reservation_ressources->id_ressources			 	= $ressource_id;
							
							$user_reservation_ressources->save();
						}
					}
					$invite_i++; // TODO : Problème si un invité fait 9 trous et que le suivant fait 18 trous ses ressources ne sont pas pris en compte...
				}
			}
			
			$reservation->nb_joueurs += count($id_players_to_add);
			$reservation->save();
		}
		else { // sinon on crée une autre réservation à part
			$update_or_new = "new";
			$first_reservation_query = DB_SQL::insert('default')
											->into('reservation')
											->column('id_type_parcours', $reservation->id_type_parcours)
											->column('date_reservation', $reservation->date_reservation)
											//->column('nb_chariots', 0)
											->column('nb_joueurs', count($id_players_to_add))
											//->column('nb_voiturettes', 0)
											->column('id_parent', 0);

			$id_new_resa = $first_reservation_query->execute(TRUE);
			
			foreach($id_players_to_add as $id_player) {
				
				$user_reservation_to_insert 				= DB_ORM::model('users_has_reservation');
				$user_reservation_to_insert->id_users 		= $id_player;
				$user_reservation_to_insert->id_reservation = $id_new_resa;
				
				if($id_player <= 1) {
					//	 On récupère les keys du tableau contenant l'id 0 pour invite OU 1 pour visiteur
					$special_user_keys = array_keys($id_joueurs, $id_player);
				
					// on recupère l'index du Nième visiteur (id_users => 1) ou invité (id_users => 0)
					$index = $visiteur_and_invite_incr[$id_player];
					// On récupère l'index joueur dans le tableau contenant les 4 joueurs de la partie
					$joueur_index = $special_user_keys[$index];
				
					// On incrément son compteur pour ne pas récupérer le même nom a chaque fois
					$visiteur_and_invite_incr[$id_player] += 1;
				
					// On stocke dans info la valeur contenu dans le champs nom lorsque visiteur ou invité est coché
					$user_reservation_to_insert->info = $nom_joueurs[$joueur_index];
				}

				$user_reservation_to_insert->save();
				
				//////////////////////////////////////////////////////////////////////////
				// Ajout des ressources aux réservations joueurs
				//////////////////////////////////////////////////////////////////////////
				
				$keys = array_keys($id_joueurs, $id_player);
				
				if(count($keys) == 1 && $keys[0] >= 0) { // Joueur normal ou un seul invite
					foreach($ressources_ids as $ressource_id => $joueurs_indexes) {
						// On vérifie dans le tableau de ressources récupéré en POST que l'index est présent.
						// Si il est présent c'est que la ressource a été coché pour ce joueur donc on ajoute cette ressource a la reservation du joueur
						
						if($joueurs_indexes != NULL && !(array_search($keys[0], $joueurs_indexes) === FALSE)) {
							$user_reservation_ressources							= DB_ORM::model('user_reservation_ressources');
							$user_reservation_ressources->id_user_has_reservation 	= $user_reservation_to_insert->id;
							$user_reservation_ressources->id_ressources			 	= $ressource_id;
							
							$user_reservation_ressources->save();
						}
					}
				}
				else if(count($keys) > 1 && $invite_i < count($keys) && $keys[$invite_i] >= 0) { // Joueurs invites 
					foreach($ressources_ids as $ressource_id => $joueurs_indexes) {
						// On vérifie dans le tableau de ressources récupéré en POST que l'index est présent.
						// Si il est présent c'est que la ressource a été coché pour ce joueur donc on ajoute cette ressource a la reservation du joueur
						
						if($joueurs_indexes != NULL && !(array_search($keys[$invite_i], $joueurs_indexes) === FALSE)) {
							
							$user_reservation_ressources							= DB_ORM::model('user_reservation_ressources');
							$user_reservation_ressources->id_user_has_reservation 	= $user_reservation_to_insert->id;
							$user_reservation_ressources->id_ressources			 	= $ressource_id;
							
							$user_reservation_ressources->save();
						}
					}
					$invite_i++; // TODO : Problème si un invité fait 9 trous et que le suivant fait 18 trous ses ressources ne sont pas pris en compte...
				}
				
			}
		}
		
		// Si il y a des 18 trous
		
		$players_18_trous_index = array();
		
		for($i = 0; $i < count($nb_Trous_player); $i++) {
			if($nb_Trous_player[$i] == 18) {
				array_push($players_18_trous_index, $i);
			}
		}
		
		if(count($players_18_trous_index) > 0) {

			$tp = DB_SQL::select('default')
				->column('type_parcours.id')
				->from('parcours')
				->join(NULL, 'combinaison_parcours')
				->on("combinaison_parcours.id_parcours", "=", "parcours.id")
				->join(NULL, 'type_parcours')
				->on("combinaison_parcours.id_type_parcours", "=", "type_parcours.id")
				->where("type_parcours.trou_depart", "<>", $reservation->type_parcours->trou_depart)
				->where("parcours.nb_trous_total", "=", 18 , "AND")
				->where("combinaison_parcours.ordre", "=", 2, "AND")
				->query();

			$id_type_parcrours = $tp[0]['id'];

			$date_linked_reservation = new DateTime($reservation->date_reservation);
			$date_linked_reservation->add(new DateInterval('PT'.$reservation->type_parcours->duree.'S'));

			// On vérifi qu'il reste sufisement de place sur le slot horraire

			$query 	= "SELECT SUM(nb_joueurs) AS nb_joueurs_par_slot";
			$query .= " FROM reservation WHERE date_reservation = '".$date_linked_reservation->format('Y-m-d H:i:s');
			$query .= "' AND id_type_parcours = ".$id_type_parcrours;

			$connection = DB_Connection_Pool::instance()->get_connection('default');
			$results = $connection->query($query);

			if ($results->is_loaded()) {
				$total_nb_joueur_par_slot = $results[0]['nb_joueurs_par_slot'];
			}

			$results->free();

			if(($total_nb_joueur_par_slot + count($players_18_trous_index)) > $max_joueurs) {
				$message = "ERREUR ! la deuxième réservation ne peux plus accueillir ".count($id_players_to_add)." joueurs";
				goto end;
			}


			$user_resa = DB_SQL::select('default')
				->column('reservation.id')
				->from('users_has_reservation')
				->join(NULL, 'reservation')
				->on('users_has_reservation.id_reservation', '=', 'reservation.id')
				//->where('id_reservation', '=', $id_reservation)
				->where('reservation.date_reservation', '=', $date_linked_reservation->format('Y-m-d H:i:s'));
				
				if(!Auth::instance()->logged_in('admin')) {
					$user_resa = $user_resa->where('users_has_reservation.id_users', '=', $logged_in_user->id, "AND");
				}
				
				$user_resa = $user_resa->where('reservation.id_type_parcours', '=', $id_type_parcrours, "AND")
							->query();		

			$id_reservation_add_or_to_add = 0;

			if(count($user_resa) > 0) {
				$id_reservation_add_or_to_add = $user_resa[0]['id'];
			}
			
			

			if($update_or_new == "new" || $id_reservation_add_or_to_add == 0 || (Auth::instance()->logged_in('admin') && Arr::get($method, "new") == 1)) {
				// On ajoute directement une nouvelle réservation
				$first_reservation_query = DB_SQL::insert('default')
					->into('reservation')
					->column('id_type_parcours', $id_type_parcrours)
					->column('date_reservation', $date_linked_reservation->format('Y-m-d H:i:s'))
					//->column('nb_chariots', 0)
					->column('nb_joueurs', 0);
					//->column('nb_voiturettes', 0)
					
				if($update_or_new == "new") {
					$first_reservation_query->column('id_parent', $id_new_resa);
				}
				else {
					$first_reservation_query->column('id_parent', $reservation->id);
				}
				

				$id_reservation_add_or_to_add = $first_reservation_query->execute(TRUE);
			}

			
			// On ajoute les joueurs à la réservation ajouté ou la reservation existante
			if($id_reservation_add_or_to_add != 0) {
				
				$reservation_updated 		= DB_ORM::model('reservation');
				$reservation_updated->id 	= $id_reservation_add_or_to_add;
				$reservation_updated->load();
				
				$invite_i = 0;
				$visiteur_and_invite_incr = array(0 => $nb_invite_deja_present, 1 => $nb_visiteur_deja_present); // 0 - invité / 1 - visiteur
				foreach($players_18_trous_index as $index) {

					$id_player = $id_players_to_add[$index];

					$user_reservation_to_insert 				= DB_ORM::model('users_has_reservation');
					$user_reservation_to_insert->id_users 		= $id_player;
					$user_reservation_to_insert->id_reservation = $id_reservation_add_or_to_add;
					
					if($id_player <= 1) {
						//	 On récupère les keys du tableau contenant l'id 0 pour invite OU 1 pour visiteur
						$special_user_keys = array_keys($id_joueurs, $id_player);

						// on recupère l'index du Nième visiteur (id_users => 1) ou invité (id_users => 0)
						$index = $visiteur_and_invite_incr[$id_player];
						// On récupère l'index joueur dans le tableau contenant les 4 joueurs de la partie
						$joueur_index = $special_user_keys[$index];

						// On incrément son compteur pour ne pas récupérer le même nom a chaque fois
						$visiteur_and_invite_incr[$id_player] += 1;

						// On stocke dans info la valeur contenu dans le champs nom lorsque visiteur ou invité est coché
						$user_reservation_to_insert->info = $nom_joueurs[$joueur_index];
					}

					$user_reservation_to_insert->save();
					
					$reservation_updated->nb_joueurs++;

					//////////////////////////////////////////////////////////////////////////
					// Ajout des ressources aux réservations joueurs
					//////////////////////////////////////////////////////////////////////////

					$keys = array_keys($id_joueurs, $id_player);

					if(count($keys) == 1 && $keys[0] >= 0) { // Joueur normal ou un seul invite
						foreach($ressources_ids as $ressource_id => $joueurs_indexes) {
							// On vérifie dans le tableau de ressources récupéré en POST que l'index est présent.
							// Si il est présent c'est que la ressource a été coché pour ce joueur donc on ajoute cette ressource a la reservation du joueur

							if($joueurs_indexes != NULL && !(array_search($keys[0], $joueurs_indexes) === FALSE)) {
								$user_reservation_ressources							= DB_ORM::model('user_reservation_ressources');
								$user_reservation_ressources->id_user_has_reservation 	= $user_reservation_to_insert->id;
								$user_reservation_ressources->id_ressources			 	= $ressource_id;

								$user_reservation_ressources->save();
							}
						}
					}
					else if(count($keys) > 1 && $invite_i < count($keys) && $keys[$invite_i] >= 0) { // Joueurs invites 
						foreach($ressources_ids as $ressource_id => $joueurs_indexes) {
							// On vérifie dans le tableau de ressources récupéré en POST que l'index est présent.
							// Si il est présent c'est que la ressource a été coché pour ce joueur donc on ajoute cette ressource a la reservation du joueur

							if($joueurs_indexes != NULL && !(array_search($keys[$invite_i], $joueurs_indexes) === FALSE)) {

								$user_reservation_ressources							= DB_ORM::model('user_reservation_ressources');
								$user_reservation_ressources->id_user_has_reservation 	= $user_reservation_to_insert->id;
								$user_reservation_ressources->id_ressources			 	= $ressource_id;

								$user_reservation_ressources->save();
							}
						}

						$invite_i++; // TODO : Problème si un invité fait 9 trous et que le suivant fait 18 trous ses ressources ne sont pas pris en compte...
					}
				}
				$reservation_updated->save();
			}
		}
		
		$valid = true;
		$message = "Réservation mise à jour avec succès.";
		
		end:
		
		echo json_encode(array(
			'valid' => $valid,
			'message' => $message,
		));
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
		
		$user_to_remove = Arr::get($method, 'id_user');
		
		$users_has_reservation = DB_ORM::model('users_has_reservation');
		$users_has_reservation->id = Arr::get($method, 'id_users_has_reservation');
		$users_has_reservation->load();
		
		$resp = $this->leave_reservation(Arr::get($method, 'id_users_has_reservation'));
		
		$reservation = $resp['reservation'];
		$valid = $resp['valid'];
		$message = $resp['message'];
		
		if($reservation == null) {
			goto end;
		}
		
		// Récupère la reservation lié si il y en a une
		$reservation_linked = DB_ORM::model("reservation");
		if($reservation->id_parent > 0) {
			
			//$reservation_linked = DB_ORM::model("r");
			$reservation_linked->id = $reservation->id_parent;
			$reservation_linked->load();
			
		} else {
			
			$reservation_child = DB_SQL::select("default")
									->from('reservation')
									->where("id_parent", "=", $reservation->id)
									->query();
			
			if(count($reservation_child) > 0) {
				//$reservation_linked = DB_ORM::model("r");
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
		));
	}	// action_leave
	
	////////////////////////////////
	// PRIVATE FUNCS ///////////////
	////////////////////////////////
	
	private function leave_reservation($id_users_has_reservation)	// used in action_leavepublic
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
	
	private function collision_check($id_joueurs, $date_debut_reservation, $id_type_parcours)	// used in updatepublic, addpublic
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
	
	/*	public function action_ajouter()	// not used : present dans /views/golf/event.php
		{
		
			$dateArray = explode('/', Arr::get($_POST, 'date')); // 20/12/2012
			$id_parcours = Arr::get($_POST, 'id_parcours');
		
			$day = $dateArray[0];
			$month = $dateArray[1];
			$year = $dateArray[2];
		
			$requestDate = $year.'-'.$month.'-'.$day;
		
			//$date = Arr::get($_POST, 'date');
		
			// Récupère les trous de départ de la reservation souhaité
			$parcours = DB_SQL::select('default')
						->column('type_parcours.trou_depart', 'trou_depart')
						->from('parcours')
						->join(NULL, 'combinaison_parcours')
						->on('parcours.id', '=', 'combinaison_parcours.id_parcours')
						->join(NULL, 'type_parcours')
						->on('combinaison_parcours.id_type_parcours', '=', 'type_parcours.id')
						->where('parcours.id', '=', $id_parcours)
						->query();
		
			// Récupère les horaires de reservation en fonction des trous de départ et des horaires
			// TODO : Checker les horaires d'ouverture pour empecher de prendre une réservation si la date de fin dépasse les horaires de fermetures
			$creneaux_oqp_request = DB_SQL::select('default')
							->from('reservation')
							->join(NULL, 'type_parcours')
							->on('type_parcours.id', '=', 'reservation.id_type_parcours')
							->where('date_reservation', 'BETWEEN', array($requestDate.' 00:00:00', $requestDate.' 23:59:59'))
							->where_block('(')
							->where('type_parcours.trou_depart', '=', $parcours[0]['trou_depart'], 'AND');
		
			// On ajoute les autres trous à la requette (dans les cas d'un parcours composé)				
	 		for($i = 1; $i < count($parcours); $i++) {
				$creneaux_oqp_request->where('type_parcours.trou_depart', '=', $parcours[$i]['trou_depart'], 'OR');
			}
		
			$creneaux_oqp_request->where_block(')');
		
			$creneaux_oqp = $creneaux_oqp_request->query();	
		
			$chaine_retour = '{';
			$chaine_retour .= '"horaires_reserves":[';

			foreach($creneaux_oqp as $creneau) {
			
				// On récupère l'heure
				$reservation_date = explode(' ', $creneau['date_reservation']);
				// On découpe l'heure
				$reservation_time = explode(':', $reservation_date[1]);
				$chaine_retour .= '"'.$reservation_time[0].':'.$reservation_time[1].'",';
			}
		
			// On enlève la dernière virgule
			$chaine_retour = substr($chaine_retour,0, strlen($chaine_retour)-1);
		
			$chaine_retour .= ']}';
		
			//$chaine_retour = '{"horaires_reserves":["15:00","15:20","16:50"]}';
		
			echo $chaine_retour;
		}	// action_ajouter
	*/	
	/*	public function action_move ()	// not used
		{
			//http://golf.local:8888/reservationajax/move/4/+1/-10/false /id/daydelta/minutedelta/allday
		
			$id = $this->request->param('id');
			$jourdelta = $this->request->param('param1')*24;
			$minutedelta = $this->request->param('param2');
			$allday = $this->request->param('param3');
		
			if ($id!=null) {
				$reservation = DB_ORM::model('reservation');
				$reservation->id = $id;
			    $reservation->load();
		
				$date_reservation = $reservation->date_reservation ;
				$timestamp = strtotime("$date_reservation");
				$etime = strtotime("$jourdelta hours $minutedelta minutes", $timestamp);
				//$etime = strtotime("$minutedelta", $etime);
				$new_date_reservation = date('Y-m-d H:i:s', $etime);
			
				$event_length = 10; // a faire récupérer de la base
				$timestamp = strtotime("$new_date_reservation");
				$etime = strtotime("+$event_length minutes", $timestamp);
				$fin_reservation = date('Y-m-d H:i:s', $etime);
			
				//echo 'date_resa='.$date_reservation.' '.$jourdelta.'day '.$minutedelta.'minutes new date='.$new_date_reservation .' fin new date'.$fin_reservation ;
			
				$reservation->date_reservation =  $new_date_reservation;
				//$reservation->fin_reservation =  $fin_reservation;
				// a faire gestion du all day
				//echo 'allday'.$allday;
				if($allday=='true'){
					$reservation->allday = 1;
				}
				else{
					$reservation->allday = 0;
				}			
				$reservation->save(TRUE);
		
			
				// controle si des parcours dépendant existe et on les déplace aussi
			
				$resafille = DB_SQL::select('default')
					->from('reservation')
					->where('id_parent','=',$id)
					->query()->as_array();
				
				print_r($resafille);
			
				for ($kl=0; $kl < count($resafille); $kl++) { 
					$idk = $resafille[$kl]['id'];
					$reservation = DB_ORM::model('reservation');
					$reservation->id = $idk;
				    $reservation->load();
					if($reservation->is_loaded()){
						$date_reservation = $reservation->date_reservation ;
						$timestamp = strtotime("$date_reservation");
						$etime = strtotime("$jourdelta hours $minutedelta minutes", $timestamp);
						//$etime = strtotime("$minutedelta", $etime);
						$new_date_reservation = date('Y-m-d H:i:s', $etime);

						$event_length = 10; // a faire récupérer de la base
						$timestamp = strtotime("$new_date_reservation");
						$etime = strtotime("+$event_length minutes", $timestamp);
						$fin_reservation = date('Y-m-d H:i:s', $etime);

						//echo 'date_resa='.$date_reservation.' '.$jourdelta.'day '.$minutedelta.'minutes new date='.$new_date_reservation .' fin new date'.$fin_reservation ;

						$reservation->date_reservation =  $new_date_reservation;
						//$reservation->fin_reservation =  $fin_reservation;
						// a faire gestion du all day
						//echo 'allday'.$allday;
						if($allday=='true'){
							$reservation->allday = 1;
						}
						else{
							$reservation->allday = 0;
						}			
						$reservation->save(TRUE);
					}
				}
		
				echo json_encode(array(
					'valid' => true,
					'message' => 'Mise à jour réussie.'
				));
			}
		}	// action_move
	*/	
	/*	public function action_resize ()	// not used
		{
			if ($id!=null) {
		
			}
		}	// action_resize
	*/	

	/*	public function action_add_OLD()
		{
			// http://golf.local:8888/reservationajax/add/false/07/12/2012/07/40
			// var_dump($this->request);
			$allday = $this->request->param('id');
			$jour = $this->request->param('param1');
			$mois = $this->request->param('param2');
			$annee = $this->request->param('param3');
			$heure = $this->request->param('param4');
			$minute = $this->request->param('param5');
			$userid = $this->request->param('param6');
		
			$depart = 'Mise à jour réussie.';
		
			$dateresahide = $annee."-".$mois."-".$jour." ".$heure.":".$minute;
 		
	        //Create and save the new event in the table.
			//event{"EventID":80,"StartDate":"22-12-112 à 08:30","Joueur1":"olivier","Joueur2":"paul","Joueur3":"thierry","Joueur4":"pierre","nbChariots":"4","nbVoiturettes":"2"}
		
			// controle si créneau pas déja pris

		
			$date_reservation = $annee."-".$mois."-".$jour." ".$heure.":".$minute.":00" ;
			$event_length = 10; // a faire récupérer de la base
			$timestamp = strtotime("$date_reservation");
			$etime = strtotime("+$event_length minutes", $timestamp);
			$fin_reservation = date('Y-m-d H:i:s', $etime);
		
			//echo $fin_reservation;
		
			$connection = DB_Connection_Pool::instance()->get_connection('default');
			$requete = "SELECT * FROM `reservation` where date_reservation='".$date_reservation."';";
			//echo $requete;
		
			$events = $connection->query($requete);
			if(count($events)>0) {
				echo json_encode(array(
					'valid' => false,
					'message' => 'Une réservation existe déja',
				));
			}
			else{
				if($allday == 'true'){ // resa journée entiere
					$reservation = DB_ORM::model('reservation');
					$reservation->date_reservation = $date_reservation;
					//$reservation->fin_reservation = $fin_reservation ;
					$reservation->id_user = $userid;
					$reservation->allday = 1;
					//$reservation->parcours = $depart;
					$reservation->save(TRUE);
					echo json_encode(array(
						'valid' => true,
						'message' => 'Mise à jour réussie.',
					));
				}
				else{
					$reservation = DB_ORM::model('reservation');
					$reservation->date_reservation = $date_reservation;
					//$reservation->fin_reservation = $fin_reservation;
					$reservation->id_user = $userid;
					$reservation->allday = 0;
					//$reservation->parcours = $depart;
					$reservation->save(TRUE);
					echo json_encode(array(
						'valid' => true,
						'message' => $depart,//'Mise à jour réussie.',
					));
				}
			}
		}	// action_add_OLD
	*/	

	/*	public function action_addpublic()
		{
			$valid = false;
			$message = "";
			//////////////////////////////////////////////////////////////////////////
			// Récupération et vérification des elements de la requete POST
			$newResa = new GameReservation();
			$funcresult = $newResa->initGameReservation($_POST);
			if($funcresult['valid']) {
				//////////////////////////////////////////////////////////////////////////
				// Requete valide: Création de la réservation
				// $resa_result = $this->MakeReservation($newResa);
				$resa_result = $newResa->MakeReservation();
				if($resa_result['valid']) {
					$valid = true;
				}else{
					$message = $resa_result['message'];
					$valid = false;
				}
			}else{
				$message = $funcresult['message'];
				$valid = false;
			}
			//////////////////////////////////////////////////////////////////////////
			// Creation de la page de résultat
			echo json_encode(array(
				'valid' => $valid,
				'message' => $message,
			));
		}	// action_addpublic
	*/
	/*	public function action_update_OLD() // no more used
	{
		$valid = false;
		$message = "";
		//////////////////////////////////////////////////////////////////////////
		// Récupération et vérification des elements de la requete POST
		$newResa = new GameReservation();
		$funcresult = $newResa->initGameReservation($_POST);
		if($funcresult['valid']) {
			//////////////////////////////////////////////////////////////////////////
			// Requete valide: Création de la réservation
			$resa_result = $newResa->MakeReservation(Arr::get($_POST, 'trou_depart'));
			if($resa_result['valid']) {
				$valid = true;
			}else{
				$message = $resa_result['message'];
				$valid = false;
			}
		}else{
			$message = $funcresult['message'];
			$valid = false;
		}
		//////////////////////////////////////////////////////////////////////////
		// Creation de la page de résultat
		echo json_encode(array(
			'valid' => $valid,
			'message' => $message,
		));
	}	// action_update
	*/
	/*	public function action_addpublic_old()
		{
		
			$message = "Not logged in !";
			$valid = false;
		
			if (!Auth::instance()->logged_in()) {
				//HTTP::redirect('login');
				goto view;
			}
		
			$message = "";

			$method = $_POST;
		
			$max_joueurs = 4;
			$maxReservationDay = 3;

			$nb_joueurs = 0;
			$nbTrousJ 	= array();
			$id_joueurs = array();
			$nom_joueurs = array();
			$id_parcours_joueurs = array();
		
			$trou_depart 	= Arr::get($method, 'trou_depart');
		
			for($i = 0; $i < 4; $i++) {
				$id_joueurs[$i] = Arr::get($method, 'id_joueur'.($i+1));
				$nom_joueurs[$i] = Arr::get($method, 'joueur'.($i+1));
				$nbTrousJ[$i]	= Arr::get($method, 'nbTrousJ'.($i+1));
			
				if($id_joueurs[$i] != "" && $id_joueurs[$i] >= 0) {
					$nb_joueurs++;
				}
			}

			//Log::instance()->add(Log::NOTICE, "ajax add public : joueur1=".$joueur1." joueur2=".$joueur2." joueur3=".$joueur3." joueur4=".$joueur4."<br/>");
			//Log::instance()->add(Log::NOTICE, "ajax add public : idjoueur1=".$id_joueur1." id_joueur2=".$id_joueur2." id_joueur3=".$id_joueur3." id_joueur4=".$id_joueur4."<br/>");

			//echo "nb joueurs=".$nb_joueurs;
			//Log::instance()->add(Log::NOTICE, "ajax add public nbjoueurs= :".$nb_joueurs." strlen = ".strlen($joueur2));


			$ressources_available = DB_SQL::select("default")
								->from("ressources")
								->where("id_golf", "=", 1)
								->query();
		
			$ressources = array();
			$ressources_ids = array();
		
			foreach($ressources_available as $r) {
				$ressources[$r["ressource"]] 	= Arr::get($method, $r["ressource"]);// tableau des checkbox avec comme value le numéro du joueur de 0 à 3.
				$ressources_ids[$r["id"]] 		= Arr::get($method, $r["ressource"]);// tableau des checkbox avec comme value le numéro du joueur de 0 à 3.
			}
		
			// On crée un tableau associatif "id_joueur" => "tableu de ressource"
			//$nbVoiturettes	= count($ressources['Voiturette']);
			//$nbChariots		= count($ressources['Chariot']);
		
			$date 			= Arr::get($method, 'date_resa');
			$date 			.= ":00";
		
			//Log::instance()->add(Log::NOTICE, "ajax add public : tabdate =".implode(",", $tabdate));

			if( $id_joueurs[0] 	== NULL || $id_joueurs[0] 	== "" 	||
				$date 			== NULL || $date 			== ""	
			) {

				// On vérifie simplement que les variable attendu en POST sont bien là et son cohérentes
				$message = "ERREUR : Paramètres manquants ou inattendus lors de la réservation. Parcours NON réservé !";
				Log::instance()->add(Log::NOTICE, "ajax add public : erreur ".$message);
				goto view;
			}

			//////////////////////////////////////////////////////////////////////////
			// Vérification de la date de réservation
			//////////////////////////////////////////////////////////////////////////
		
			$golf = DB_ORM::model('golf');
			$golf->id = 1;
			$golf->load();
		
		
		
			$requestDateTime = new DateTime($date);
			$lastResaHour	 = new DateTime($date);
			$compareResa	 = new DateTime($date);
			$currentDateTime = new DateTime();

			$maxDateTime = new DateTime();
			//$maxDateTime->add(new DateInterval('P'.$maxReservationDay.'D'));
			$maxDateTime->setTimestamp(strtotime("+3 days 4 hours"));
			$maxDateTime->setTime(23,59,59);
		
			$heure_derniere_resrvation = new DateTime($golf->heure_fermeture);
			$h = $heure_derniere_resrvation->format('H');
			$m = $heure_derniere_resrvation->format('i');
			$s = $heure_derniere_resrvation->format('s');
		
			$lastResaHour->setTime($h, $m, $s);
		
			// goto view;

			if($requestDateTime > $maxDateTime && !Auth::instance()->logged_in('admin')) {
				$message = "ERREUR : Désolé vous ne pouvez pas réserver à plus de ".$maxReservationDay." jours.";
				Log::instance()->add(Log::NOTICE, "ajax add public : erreur ".$message);
				goto view;
			}

			if($requestDateTime < $currentDateTime) {
				$message = "ERREUR : La date à laquelle vous souhaitez réserver est passé.";
				Log::instance()->add(Log::NOTICE, "ajax add public : erreur ".$message);
				goto view;
			}
		
			//////////////////////////////////////////////////////////////////////////
			// Réservation des parcours
			//////////////////////////////////////////////////////////////////////////
		
			for($i = 0; $i < $nb_joueurs; $i++) {
				$p = DB_SQL::select('default')
							->column('parcours.id')
							->from('parcours')
							->join(NULL, 'combinaison_parcours')
							->on("combinaison_parcours.id_parcours", "=", "parcours.id")
							->join(NULL, 'type_parcours')
							->on("combinaison_parcours.id_type_parcours", "=", "type_parcours.id")
							->where("type_parcours.trou_depart", "=", $trou_depart)
							->where("parcours.nb_trous_total", "=", $nbTrousJ[$i], "AND")
							->where("combinaison_parcours.ordre", "=", 1, "AND") // on s'iteresse au trou de départ du parcours global pas du type_parcours
							->query();
						
				$id_parcours_joueurs[$i] = $p[0]['id'];
			}
		
			// On rassemble les joueurs par type de réservation
			$types_parcours_joueurs = array();
			$parcours_info = array(); // {nb_trous, duree} key = id_type_parcours
			$i = 0;
			$under_day_limit_hour = FALSE;
		
			foreach($id_parcours_joueurs as $ip) {
				// On récupère les types de parcours à réserver, leur durées
				$types_parcours = DB_SQL::select('default')
					->from('parcours')
					->column('combinaison_parcours.id_type_parcours', 'id_type_parcours')
					->column('type_parcours.duree', 'duree')
					->column('type_parcours.trou_depart', 'trou_depart')
					->join(NULL,'combinaison_parcours')
					->on('parcours.id', '=', 'combinaison_parcours.id_parcours')
					->join(NULL,'type_parcours')
					->on('type_parcours.id', '=', 'combinaison_parcours.id_type_parcours')
					->where('parcours.id', '=', $ip)
					->order_by('ordre')
					->query(); 
			
				foreach($types_parcours as $type) {
				
					if(array_key_exists($type['id_type_parcours'],$types_parcours_joueurs)) {
						array_push($types_parcours_joueurs[$type['id_type_parcours']], $id_joueurs[$i]);
					}
					else {
						$types_parcours_joueurs[$type['id_type_parcours']] = array($id_joueurs[$i]);
						$parcours_info[$type['id_type_parcours']] = array('trou_depart' => $type['trou_depart'], 'duree' => $type['duree']);
					}
				}
			
				$i++;
			}
		
			$first_parcours_info = reset($parcours_info);
		
			// On vérifie que les horaires n'ont pas été réservé entre temps
			$creneaux_oqp_request = DB_SQL::select('default')
									->column('reservation.id')
									->column('type_parcours.trou_depart')
									->count('users_has_reservation.id')
									->from('reservation')
									->join(NULL, 'type_parcours')
									->on('type_parcours.id', '=', 'reservation.id_type_parcours')
									->join(NULL, 'users_has_reservation')
									->on('users_has_reservation.id_reservation', '=', 'reservation.id')
									->where_block('(')
									->where('date_reservation', '=', $date)
									->where('type_parcours.trou_depart', '=', $first_parcours_info['trou_depart'], 'AND')
									->where_block(')');
		
			// On crée un timestamp avec la date pour additionner la durée du parcours dans les requetes						
			$beginTime = new DateTime($date);
			$timestamp = $beginTime->getTimestamp();
		
			// Variable qui stocke le nombre de joueurs par type de parcours dans les reservations
			$total_joueurs_counts = array();
			$total_joueurs_counts[$first_parcours_info['trou_depart']] = 0;
		
		
			$id_type_parcours = array_keys($parcours_info);
		
			for($i = 1; $i < count($id_type_parcours); $i++) {
				$total_joueurs_counts[$parcours_info[$id_type_parcours[$i]]['trou_depart']] = 0;
				// On ajoute la durée du parcours à l'heure de départ pour obtenir le départ au trou suivant
				$timestamp += $parcours_info[$id_type_parcours[$i-1]]['duree'];
			
				$di = new DateInterval('PT'.$parcours_info[$id_type_parcours[$i-1]]['duree'].'S');
				$compareResa->add($di);
				if($compareResa > $lastResaHour) {
					$under_day_limit_hour = TRUE;
				}
				$di->invert = 1;
				$compareResa->add($di);
			
				$creneaux_oqp_request->where_block('(', 'OR');
				$creneaux_oqp_request->where('date_reservation', '=', date('Y-m-d H:i:s', $timestamp));
				$creneaux_oqp_request->where('type_parcours.trou_depart', '=', $parcours_info[$id_type_parcours[$i]]['trou_depart'], 'AND');
				$creneaux_oqp_request->where_block(')');
			}
		
			$creneaux_oqp_request->group_by('reservation.id');
		
			if($under_day_limit_hour === TRUE) {
				$message = "ERREUR : La réservation dépasse l'heure limite.";
				goto view;
			}
		
			$creneaux_oqp = $creneaux_oqp_request->query();
		
			foreach($creneaux_oqp as $cren) {
				foreach($total_joueurs_counts as $trou => $nb) { // $key => $value
					//$total_joueurs_counts[$trou] = intval($nb);
					if(intval($cren['trou_depart']) == intval($trou)) {
						//echo $trou." => ".$nb." (".$cren['trou_depart']." => ".$cren["count"].")<br />";
						$total_joueurs_counts[$trou] += intval($cren["count"]);
					}
				}
			}
		
			$i = 0;
		
			foreach($total_joueurs_counts as $trou => $nb) {
				$nb_players = count($types_parcours_joueurs[$id_type_parcours[$i++]]);
				//echo $nb_players."<br />";
				if(($nb + $nb_players)  > $max_joueurs) {
					// Une réservation est déjà pleine pour un des trous au horaires définies
					$message = "ERREUR : Désolé ! Ce créneau horaire ne peut plus accueillir ".$nb_players." joueurs";
					goto view;
				}
			}
		
		
			//////////////////////////////////////////////////////////////////////////
			// Vérification des parties en cours
			//////////////////////////////////////////////////////////////////////////
		
			$colision_result = $this->collision_check($id_joueurs, $requestDateTime, $id_type_parcours[0]);
		
			if(!$colision_result['valid']) {
				$valid 		= FALSE;
				$message 	= $colision_result['message'];
				goto view;
			}
		
			for($i = 1; $i < count($id_type_parcours); $i++) {
			
				// On ajoute la durée du parcours à l'heure de départ pour obtenir le départ au trou suivant
				$timestamp += $parcours_info[$id_type_parcours[$i-1]]['duree'];
						
				$colision_result = $this->collision_check($id_joueurs, new DateTime(date('Y-m-d H:i:s', $timestamp)), $id_type_parcours[$i]);

				if(!$colision_result['valid']) {
					$valid 		= FALSE;
					$message 	= $colision_result['message'];
					goto view;
				}
			}
		
			//////////////////////////////////////////////////////////////////////////
		
			$reservations = array();
		
			// Ajout de la première réservation
			$nb_players = count($types_parcours_joueurs[$id_type_parcours[0]]);
		
			$first_reservation_query = DB_SQL::insert('default')
											->into('reservation')
											->column('id_type_parcours', $id_type_parcours[0])
											->column('date_reservation', $date)
											//->column('nb_chariots', $nbChariots)
											->column('nb_joueurs', $nb_players)
											//->column('nb_voiturettes', $nbVoiturettes)
											->column('id_parent',0);

			$id_parent = $first_reservation_query->execute(TRUE);
			array_push($reservations, $id_parent);
		
		
			// Reset le timestamp
			$timestamp = $beginTime->getTimestamp();
		
			// Dans le cas d'un parcours "composés" on ajoute les réservations suivantes
			for($i = 1; $i < count($id_type_parcours); $i++) {
				$nb_players = count($types_parcours_joueurs[$id_type_parcours[$i]]);
			
				// On ajoute la durée du parcours à l'heure de départ pour obtenir le départ au trou suivant
				$timestamp += $parcours_info[$id_type_parcours[$i-1]]['duree'];
			
				$other_reservation = DB_SQL::insert('default')
									->into('reservation')
									->column('id_type_parcours', $id_type_parcours[$i])
									->column('date_reservation', date('Y-m-d H:i:s', $timestamp))
									//->column('nb_chariots', $nbChariots)
									->column('nb_joueurs', $nb_players)
									//->column('nb_voiturettes', $nbVoiturettes)
									->column('id_parent', $id_parent);
			
				array_push($reservations, $other_reservation->execute(TRUE));
			
			}
		
		
			//////////////////////////////////////////////////////////////////////////
			// Ajout des joueurs à la réservation
			//////////////////////////////////////////////////////////////////////////
		
			// Attribution des joueurs à une réservation
			$i = 0;
		
			foreach($reservations as $id_reservation) {
				$invite_i = 0;
				$visiteur_and_invite_incr = array(0 => 0, 1 => 0); // 0 - invité / 1 - visiteur
				foreach($types_parcours_joueurs[$id_type_parcours[$i++]] as $id_users) {
				
					$user_reservation_to_insert 				= DB_ORM::model('users_has_reservation');
					$user_reservation_to_insert->id_users 		= $id_users;
					$user_reservation_to_insert->id_reservation = $id_reservation;
				
					if($id_users <= 1) {
						// On récupère les keys du tableau contenant l'id 0 pour invite OU 1 pour visiteur
						$special_user_keys = array_keys($id_joueurs, $id_users);
				
						// on recupère l'index du Nième visiteur (id_users => 1) ou invité (id_users => 0)
						$index = $visiteur_and_invite_incr[$id_users];
						// On récupère l'index joueur dans le tableau contenant les 4 joueurs de la partie
						$joueur_index = $special_user_keys[$index];
				
						// On incrément son compteur pour ne pas récupérer le même nom a chaque fois
						$visiteur_and_invite_incr[$id_users] += 1;
					
						// On stocke dans info la valeur contenu dans le champs nom lorsque visiteur ou invité est coché
						$user_reservation_to_insert->info = $nom_joueurs[$joueur_index];
					}
				
					$user_reservation_to_insert->save(TRUE);
				
				
					//////////////////////////////////////////////////////////////////////////
					// Ajout des ressources aux réservations joueurs
					//////////////////////////////////////////////////////////////////////////
				
					$keys = array_keys($id_joueurs, $id_users);
				
					if(count($keys) == 1 && $keys[0] >= 0) { // Joueur normal ou un seul invite
						foreach($ressources_ids as $ressource_id => $joueurs_indexes) {
							// On vérifie dans le tableau de ressources récupéré en POST que l'index est présent.
							// Si il est présent c'est que la ressource a été coché pour ce joueur donc on ajoute cette ressource a la reservation du joueur
						
							if($joueurs_indexes != null && !(array_search($keys[0], $joueurs_indexes) === FALSE)) {
								$user_reservation_ressources							= DB_ORM::model('user_reservation_ressources');
								$user_reservation_ressources->id_user_has_reservation 	= $user_reservation_to_insert->id;
								$user_reservation_ressources->id_ressources			 	= $ressource_id;
							
								$user_reservation_ressources->save();
							}
						}
					}
					else if(count($keys) > 1 && count($keys) > $invite_i && $keys[$invite_i] >= 0) { // Joueurs invites 
						foreach($ressources_ids as $ressource_id => $joueurs_indexes) {
							// On vérifie dans le tableau de ressources récupéré en POST que l'index est présent.
							// Si il est présent c'est que la ressource a été coché pour ce joueur donc on ajoute cette ressource a la reservation du joueur
						
							if($joueurs_indexes != null && !(array_search($keys[$invite_i], $joueurs_indexes) === FALSE)) {
							
								$user_reservation_ressources							= DB_ORM::model('user_reservation_ressources');
								$user_reservation_ressources->id_user_has_reservation 	= $user_reservation_to_insert->id;
								$user_reservation_ressources->id_ressources			 	= $ressource_id;
							
								$user_reservation_ressources->save();
							}
						}
						$invite_i++; // TODO : Problème si un invité fait 9 trous et que le suivant fait 18 trous ses ressources ne sont pas pris en compte...
					}
				
				
					// // On récupère l'index de l'id_users dans le tableau $id_joueurs
					// $joueur_index = array_search($id_users, $id_joueurs); // PROBLEME L'UTILISATEUR INVITE ETANT PLUSIEURS FOIS array_search renvoi le 1er et du coup pas d'ajout de ressources pour les invites apres
					//
					// if(!($joueur_index === FALSE) && $joueur_index >= 0) {
					// 	foreach($ressources_ids as $ressource_id => $joueurs_indexes) {
					// 		// On vérifie dans le tableau de ressources récupéré en POST que l'index est présent.
					// 		// Si il est présent c'est que la ressource a été coché pour ce joueur donc on ajoute cette ressource a la reservation du joueur
					//
					// 		if(!(array_search($joueur_index, $joueurs_indexes) === FALSE)) {
					// 			$user_reservation_ressources							= DB_ORM::model('user_reservation_ressources');
					// 			$user_reservation_ressources->id_user_has_reservation 	= $user_reservation_to_insert->id;
					// 			$user_reservation_ressources->id_ressources			 	= $ressource_id;
					//
					// 			$user_reservation_ressources->save();
					// 		}
					// 	}
					// }
				
				}
			}

			$message = "Réservation enregistrée";
			$valid = true;
			Log::instance()->add(Log::NOTICE, "ajax add public : OK ".$message);

			view:

			echo json_encode(array(
				'valid' => $valid,
				'message' => $message,
			));

		}	// action_addpublic_old
	*/	
	/*	public function action_edit_OLD()	// not used
		{
		
			$id = $this->request->param('id');
		
			$fiche = DB_SQL::select('default')
					->column('reservation.id')
					->column('id_type_parcours')
					->column('nb_voiturettes')
					->column('nb_chariots')
					->column('id_parcours')
					->column('date_reservation')
					->from('reservation')
					->join(NULL, 'type_parcours')
					->on('type_parcours.id', '=', 'reservation.id_type_parcours')
					->where('reservation.id', '=',$id)
					->query()->as_array();
				
			if(count($fiche)>0){
					$users = DB_SQL::select('default')
						->from('users_has_reservation')
						->where('id_reservation','=',$fiche[0]['id'])
						->query()->as_array();

					//print_r($users);

					$fusers = array();
					for ($i=0; $i < count($users); $i++) { 
						$user = DB_SQL::select('default')
							->from('users')
							->where('id','=',$users[$i]['id_users'])
							->query()->as_array();
						//print_r($user);
						array_push($fusers,$user);
					}

					//print_r($fiche);
					//print_r($fusers);

					echo json_encode(array(
						'valid' => true,
						'fiche' => $fiche,
						'fusers' => $fusers,
					));
					//echo json_encode($fusers);
			}
			else{
				echo json_encode(array(
					'valid' => false,
					'fiche' => array(),
					'fusers' => array(),
				));
			}
		}	// action_edit
	*/	
	/*    public function action_events2_OLD()	// not used
		{

			// modif olivier a revoir
			$redirect = isset($_REQUEST['redirect']) ? $_REQUEST['redirect'] : '/';

			//disable auto rendering if requested using ajax
	        if($this->request->is_ajax()){
	            $this->auto_render = FALSE;
	        }

				$year = date('Y');
				$month = date('m');


				//print_r($_POST);
				//1. Transform request parameters to MySQL datetime format.
				$mysqlstart =  date( 'Y-m-d H:i:s', Arr::get($_POST,'start'));
				$mysqlend = date('Y-m-d H:i:s', Arr::get($_POST,'end'));
			
				$connection = DB_Connection_Pool::instance()->get_connection('default');
				$requete = "SELECT * FROM `reservation` where date_reservation between '".$mysqlstart."' AND '".$mysqlend."';";
				// [records:protected] => Array
				// 		        (
				// 		            [0] => Array
				// 		                (
				// 		                    [id] => 1
				// 		                    [date_reservation] => 2012-12-03 13:10:00
				// 		                    [id_user] => 9
				// 		                )
				//
				// 		            [1] => Array
				// 		                (
				// 		                    [id] => 2
				// 		                    [date_reservation] => 2012-12-04 14:30:00
				// 		                    [id_user] => 9
				// 		                )
				//
				// 		            [2] => Array
				// 		                (
				// 		                    [id] => 3
				// 		                    [date_reservation] => 2012-12-06 11:50:00
				// 		                    [id_user] => 9
				// 		                )
				//
				// 		        )
				//
				// 		    [position:protected] => 0
				// 		    [size:protected] => 3
				// 		    [type:protected] => array
			
				//echo $requete;
				$events = $connection->query($requete);
			
				//print_r($events);
			
				$rows = array();
				for ($a=0; count($events)> $a; $a++) {
					//Is it an all day event?
					//$all = ($events[$a]['Event']['allday'] == 1);

				// find username
				if($events[$a]['id_users']>0){
					$user = DB_ORM::model('Users');
					$user->id = $events[$a]['id_users'];
				    $user->load();
					if($user->is_loaded()){
						$username = $user->firstname." ".$user->lastname;
					}
				}
				else{
					$username = 'anonyme';
				}

			
				// ajout automatique 10 min a fin resa
				// a revoir pour récupérer infos dans la base
				$timestamp = strtotime($events[$a]['date_reservation']);
				$event_length = 10; // a faire récupérer de la base
				$fin_reservation = date('Y-m-d H:i',strtotime("+$event_length minutes", $timestamp));
	
				//echo 'debut resa='.date('Y-m-d H:i', strtotime($events[$a]['date_reservation']))." fin resa=".$fin_reservation."<br/>";
			
				//Create an event entry
				$rows[] = array(
					'id' => $events[$a]['id'],
					'title' => $username,
					'start' => date('Y-m-d H:i', strtotime($events[$a]['date_reservation'])),
					'end' => date('Y-m-d H:i',strtotime($fin_reservation)),
					'allDay' => ($events[$a]['allday'] == 1),
					'source' => '',
					'color' => '#ff0000',
					'textColor' => 'black',
					'backgroundColor' => 'white',
					'borderColor' => '', 
					// a faire test du user pour la couleur des events
					//'color' => ''
				);
				}
				echo json_encode($rows);
				// echo json_encode(array(
				//
				// 	array(
				// 		'id' => 111,
				// 		'title' => "Event1",
				// 		'start' => "$year-$month-3",
				// 		'url' => "http://yahoo.com/"
				// 	),
				//
				// 	array(
				// 		'id' => 222,
				// 		'title' => "Event2",
				// 		'start' => "$year-$month-6",
				// 		'end' => "$year-$month-7",
				// 		'url' => "http://yahoo.com/"
				// 	)
				//
				// ));
				//echo "[{"id":111,"title":"Event1","start":"2012-12-10","url":"http:\/\/yahoo.com\/"},{"id":222,"title":"Event2","start":"2012-12-20","end":"2012-12-22","url":"http:\/\/yahoo.com\/"}]";
		}	// action_events2
	*/	
	/*	public function action_events_OLD()	// not used
		{

			$rows = array();
			 // modif olivier a revoir
			$redirect = isset($_REQUEST['redirect']) ? $_REQUEST['redirect'] : '/';

			//disable auto rendering if requested using ajax
	        if($this->request->is_ajax()){
	            $this->auto_render = FALSE;
	        }
			//1. Transform request parameters to MySQL datetime format.
			$start =  date( 'Y-m-d H:i:s', Arr::get($_POST,'start'));
			$end = date('Y-m-d H:i:s', Arr::get($_POST,'end'));
		
		
			$start = "2012-12-21 00:00:00";
			$end = "2012-12-23 23:59:59";

			// On récupère la liste des parcours du golf
			$parcours = DB_ORM::select('Parcours')
						->query();

			// construction tableau réservation
			$requestDate = date('Y-m-d');//date du jour
		    $builder = DB_SQL::select('default')
				->column('reservation.id')
				->column('id_type_parcours')
				->column('nb_voiturettes')
				->column('nb_chariots')
				->column('date_reservation')
				->column('allday')
		    	->from('reservation')
				->column('nb_joueurs')
				->column('depart')
				->join(NULL, 'type_parcours')
				->on('type_parcours.id', '=', 'reservation.id_type_parcours')
				->where('date_reservation', 'BETWEEN', array($start, $end));
			$reservations = $builder->query()->as_array();
			//print_r($reservations);

			$rouge = '#ff0000';
			$orange ='#ff6600';
			$orangeclair = '#ffcc00';
			$jaune = '#ffff00'; 
			$vert = '#99ff00';

			for ($res=0; $res < count($reservations); $res++) { 
				//echo 'resa='.$reservations[$res]['date_reservation']."<br/>";
				$reservations[$res]['resa'] = 1;
				$reservations[$res]['couleur'] = $vert;
				//echo 'test ok'."<br/>";
					switch ($reservations[$res]['nb_joueurs']) {
						case '1':
							$reservations[$res]['couleur'] = $jaune;
							break;
						case '2':
							$reservations[$res]['couleur'] = $orangeclair;
							break;
						case '3':
							$reservations[$res]['couleur'] = $orange;
							break;
						case '4':
							$reservations[$res]['couleur'] = $rouge;
							break;						
						default:
							$reservations[$res]['couleur'] = $vert;
							break;
					}
					if($reservations[$res]['depart']==2){
						$reservations[$res]['couleur'] = $rouge;
					}
			
					// ajout automatique 10 min a fin resa
					// a revoir pour récupérer infos dans la base
					$timestamp = strtotime($reservations[$res]['date_reservation']);
					$event_length = 10; // a faire récupérer de la base
					$fin_reservation = date('Y-m-d H:i',strtotime("+$event_length minutes", $timestamp));

					//echo 'debut resa='.date('Y-m-d H:i', strtotime($events[$a]['date_reservation']))." fin resa=".$fin_reservation."<br/>";
				
					// recup users
					$users = DB_SQL::select('default')
						->from('users_has_reservation')
						->where('id_reservation','=',$reservations[$res]['id'])
						->query()->as_array();

					//print_r($users);
					if (Auth::instance()->logged_in()) {
							$fusers = array();
							$title='';
							for ($i=0; $i < count($users); $i++) { 
								$user = DB_SQL::select('default')
									->from('users')
									->where('id','=',$users[$i]['id_users'])
									->query()->as_array();
								//print_r($user);
								for ($j=0; $j < count($user); $j++) { 
									$title=$title." ".$user[$j]['lastname'];//." ".$user[$j]["firstname"];
								}
							}
					}
					else{
						$title='Anonyme';
					}
			

					//print_r($fiche);
					//print_r($fusers);
					//Create an event entry
					$rows[] = array(
						'id' => $reservations[$res]['id'],
						'title' => $title,
						'start' => date('Y-m-d H:i', strtotime($reservations[$res]['date_reservation'])),
						'end' => date('Y-m-d H:i',strtotime($fin_reservation)),
						'allDay' => ($reservations[$res]['allday'] == 1),
						'source' => ' ',
						'color' => $reservations[$res]['couleur'],
						'textColor' => 'black',
						'backgroundColor' => $reservations[$res]['couleur'],
						'borderColor' => $reservations[$res]['couleur'], 
						// a faire test du user pour la couleur des events
						//'color' => ''
					);
			}

			

			echo json_encode($rows);

			//echo "[{"id":111,"title":"Event1","start":"2012-12-10","url":"http:\/\/yahoo.com\/"},{"id":222,"title":"Event2","start":"2012-12-20","end":"2012-12-22","url":"http:\/\/yahoo.com\/"}]";
		}	// action_events
	*/	

}
