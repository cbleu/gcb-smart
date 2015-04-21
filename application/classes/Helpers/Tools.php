<?php defined('SYSPATH') or die('No direct script access.');

class Helpers_Tools
{
	////////////////////////////////
	// PUBLIC FUNCS ////////////////
	////////////////////////////////
	
	/**
	* create_time_range 
	* 
	* @param mixed $start start time, e.g., 9:30am or 9:30
	* @param mixed $end   end time, e.g., 5:30pm or 17:30
	* @param string $by   1 hour, 1 mins, 1 secs, etc.
	* @access public
	* @return void
	*/
	public function create_time_range($start, $end, $by='10 mins') {

		$start_time = strtotime($start);
		$end_time   = strtotime($end);

		$current    = time();
		$add_time   = strtotime('+'.$by, $current);
		$diff       = $add_time-$current;

		$times = array();
		while ($start_time < $end_time) {
			$times[] = $start_time;
			$start_time += $diff;
		}
		$times[] = $start_time;
		return $times;
	}

	public static function getOtherResaOnTheSameSlotAs($mainresaId){
		$returnarray = array();
		$main_reservations = DB_ORM::model("reservation", array(intval($mainresaId)));
		$leparcours = DB_ORM::model("type_parcours", array($main_reservations->id_type_parcours));

		$other_reservations = DB_SQL::select('default')
			->from('reservation')
				->where('date_reservation', '=', $main_reservations->date_reservation)
					->where('id_type_parcours', '=', $main_reservations->id_type_parcours, "AND")
						->where('id', '<>', $mainresaId, "AND")
							->query();
		foreach($other_reservations as $anotherone){
			$returnarray[] = $anotherone;
		}
		return $returnarray;
	}

	public static function PurgeExpiredResaProvi()
	{
		$date = new Datetime();
		$until = $date->format('Y-m-d H:i:s');
		$query = DB_SQL::delete('default')
				->from('reservation')
					->where('reservation.temp_until', '<', $until)
						->execute();
	}	// PurgeExpiredResaProvi
	
/*	public static function MakeReservation_old($gameresa)
	{
		//////////////////////////////////////////////////////////////////////////
		// 1- Réservation des parcours
		//////////////////////////////////////////////////////////////////////////
		for($i = 0; $i < $gameresa->nb_joueurs; $i++) {
			$p = DB_SQL::select('default')
				->column('parcours.id')
					->from('parcours')
						->join(NULL, 'combinaison_parcours')
							->on("combinaison_parcours.id_parcours", "=", "parcours.id")
								->join(NULL, 'type_parcours')
									->on("combinaison_parcours.id_type_parcours", "=", "type_parcours.id")
										->where("type_parcours.trou_depart", "=", $gameresa->trou_depart)
											->where("parcours.nb_trous_total", "=", $gameresa->players[$i]->nbTrous, "AND")
												->where("combinaison_parcours.ordre", "=", 1, "AND") // on s'iteresse au trou de départ du parcours global pas du type_parcours
													->query();
			$gameresa->players[$i]->parcourId = $p[0]['id'];
			// $id_parcours_joueurs[$i] = $p[0]['id'];
		}
	
		// On rassemble les joueurs par type de réservation
		$types_parcours_joueurs = array();
		$parcours_info = array(); // {nb_trous, duree} key = id_type_parcours
		$i = 0;
		// foreach($id_parcours_joueurs as $ip) {
		foreach($gameresa->players as $player) {
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
												// ->where('parcours.id', '=', $ip)
												->where('parcours.id', '=', $player->parcourId)
													->order_by('ordre')
														->query();
			foreach($types_parcours as $type) {
				if(array_key_exists($type['id_type_parcours'],$types_parcours_joueurs)) {
					// array_push($types_parcours_joueurs[$type['id_type_parcours']], $id_joueurs[$i]);
					array_push($types_parcours_joueurs[$type['id_type_parcours']], $gameresa->player[$i]->id);
				}
				else {
					// $types_parcours_joueurs[$type['id_type_parcours']] = array($id_joueurs[$i]);
					$types_parcours_joueurs[$type['id_type_parcours']] = array($gameresa->player[$i]->id);
					$parcours_info[$type['id_type_parcours']] = array('trou_depart' => $type['trou_depart'], 'duree' => $type['duree']);
				}
			}
			$i++;
		}
		$first_parcours_info = reset($parcours_info);
	
		//////////////////////////////////////////////////////////////////////////
		// 2 On vérifie que les horaires n'ont pas été réservé entre temps
		//////////////////////////////////////////////////////////////////////////
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
												// ->where('date_reservation', '=', $date)
												->where('date_reservation', '=', $gameresa->date)
													->where('type_parcours.trou_depart', '=', $first_parcours_info['trou_depart'], 'AND')
														->where_block(')');
	
		// On crée un timestamp avec la date pour additionner la durée du parcours dans les requetes
		// $timestamp = $beginTime->getTimestamp();
		$timestamp = $gameresa->beginDateTime->getTimestamp();
		// $timestamp = date_timestamp_get($gameresa->beginDateTime);
		
		// Variable qui stocke le nombre de joueurs par type de parcours dans les reservations
		$total_joueurs_counts = array();
		$total_joueurs_counts[$first_parcours_info['trou_depart']] = 0;
		$id_type_parcours = array_keys($parcours_info);
	
		for($i = 1; $i < count($id_type_parcours); $i++) {
			$total_joueurs_counts[$parcours_info[$id_type_parcours[$i]]['trou_depart']] = 0;
			$timestamp += $parcours_info[$id_type_parcours[$i-1]]['duree'];// On ajoute la durée du parcours à l'heure de départ pour obtenir le départ au trou suivant
		
			$creneaux_oqp_request->where_block('(', 'OR');
			$creneaux_oqp_request->where('date_reservation', '=', date('Y-m-d H:i:s', $timestamp));
			$creneaux_oqp_request->where('type_parcours.trou_depart', '=', $parcours_info[$id_type_parcours[$i]]['trou_depart'], 'AND');
			$creneaux_oqp_request->where_block(')');
		}
		$creneaux_oqp_request->group_by('reservation.id');
		$creneaux_oqp = $creneaux_oqp_request->query();
	
		foreach($creneaux_oqp as $cren) {
			foreach($total_joueurs_counts as $trou => $nb) { // $key => $value
				if(intval($cren['trou_depart']) == intval($trou)) {
					$total_joueurs_counts[$trou] += intval($cren["count"]);
				}
			}
		}
		$i = 0;
		foreach($total_joueurs_counts as $trou => $nb) {
			$nb_players = count($types_parcours_joueurs[$id_type_parcours[$i++]]);
			//echo $nb_players."<br />";
			if(($nb + $nb_players)  > $gameresa->max_joueurs) {
				// Une réservation est déjà pleine pour un des trous aux horaires définis
				return array(	// cesar: NOK: relancer la demande avec le trou 10
					'valid' => false,
					'message' => "ERREUR : Désolé ! Ce créneau horaire ne peut plus accueillir ".$nb_players." joueurs"
				);
				// $message = "ERREUR : Désolé ! Ce créneau horaire ne peut plus accueillir ".$nb_players." joueurs";
				// if($trou_depart == 1) {
				// 	$trou_depart = 10;
				// 	goto retry_trou_depart;
				// }
				// goto view;
			}
		}
	
		//////////////////////////////////////////////////////////////////////////
		// 3 Vérification des collisions avec des parties commencées avant cet horaire
		//////////////////////////////////////////////////////////////////////////
		// $colision_result = $this->collision_check($id_joueurs, $requestDateTime, $id_type_parcours[0]);
		$collision_result = $this->CheckCollisionAt($gameresa->date, $gameresa, $id_type_parcours[0]);
		if(!$collision_result['valid']) {
			return array(	// cesar: NOK
				'valid' => false,
				'message' => $collision_result['message']
			);
			// $valid 		= FALSE;
			// $message 	= $colision_result['message'];
			// goto view;
		}
	
		for($i = 1; $i < count($id_type_parcours); $i++) {
			// On ajoute la durée du parcours à l'heure de départ pour obtenir le départ au trou suivant
			$timestamp += $parcours_info[$id_type_parcours[$i-1]]['duree'];
			// $colision_result = $this->collision_check($id_joueurs, new DateTime(date('Y-m-d H:i:s', $timestamp)), $id_type_parcours[$i]);
			$collision_result = $this->CheckCollisionAt(new DateTime(date('Y-m-d H:i:s', $timestamp)), $gameresa, $id_type_parcours[$i]);
			if(!$collision_result['valid']) {
				return array(	// cesar: NOK
					'valid' => false,
					'message' => $collision_result['message']
				);
				// $valid 		= FALSE;
				// $message 	= $collision_result['message'];
				// goto view;
			}
		}
	
		//////////////////////////////////////////////////////////////////////////
		// 4 Création de la réservation
		//////////////////////////////////////////////////////////////////////////
		$reservations = array();
	
		// Ajout de la première réservation
		$nb_players = count($types_parcours_joueurs[$id_type_parcours[0]]);
		$first_reservation_query = DB_SQL::insert('default')
			->into('reservation')
				->column('id_type_parcours', $id_type_parcours[0])
					->column('date_reservation', $date)
						->column('nb_joueurs', $nb_players)
							->column('id_parent',0);
		$id_parent = $first_reservation_query->execute(TRUE);				//cesar: SQL INSERT
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
							->column('nb_joueurs', $nb_players)
								->column('id_parent', $id_parent);
			array_push($reservations, $other_reservation->execute(TRUE));	//cesar: SQL INSERT
		}
	
		//////////////////////////////////////////////////////////////////////////
		// 5 Ajout des joueurs à la réservation
		//////////////////////////////////////////////////////////////////////////
	
		// Attribution des joueurs à une réservation
		$i = 0;
	
		foreach($reservations as $id_reservation) {
			$invite_i = 0;
			foreach($types_parcours_joueurs[$id_type_parcours[$i++]] as $id_users) {
				$user_reservation_to_insert 				= DB_ORM::model('users_has_reservation');
				$user_reservation_to_insert->id_users 		= $id_users;
				$user_reservation_to_insert->id_reservation = $id_reservation;
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
				}else if(count($keys) > 1 && $keys[$invite_i] >= 0) { // Joueurs invites 
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
					$invite_i++; // TODO : Problème si un invité fait 9 trous et que le suivant fait 18 trous ces ressources ne sont pas prisent en compte...
				}
			}
		}
		$message = "OK: Réservation enregistrée";
		$valid = true;
		Log::instance()->add(Log::NOTICE, "Public_Application::action_add_provi:".$message);
	}	// make_reservation
*/
/*	public static function CheckCollisionAt_old($date_debut_reservation, $resa, $id_type_parcours)
	{
		$message = "";
		$valid = FALSE;
		
		$type_parcours = DB_ORM::model('type_parcours');
		$type_parcours->id = $id_type_parcours;
		$type_parcours->load();
		
		////////////////////////////////////////////////////////////
		// Vérification si une existante ne commence pas pendant la durée de cette réservation
		////////////////////////////////////////////////////////////
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
		$normal_players_count = 0;
		foreach($resa->players as $player) {
			if($player->id != "" && $player->id != 0 && $player->id != 1) {
				$normal_players_count++;
				$reservation_user_slot->where('users_has_reservation.id_users', '=', $player->id, 'OR');
			}
		}
		
		if($normal_players_count == 0) {
			$valid = TRUE;
			goto end;
		}
		$reservation_user_slot = $reservation_user_slot->where_block(')')
			->where('reservation.date_reservation', '>=', $date_debut_reservation->format('Y-m-d H:i:s') , 'AND')
				->where('reservation.date_reservation', '<=', $date_fin_reservation->format('Y-m-d H:i:s') , 'AND')
					->query()->as_array();
		if(count($reservation_user_slot) > 0) {
			$message = "ERREUR : Les joueurs suivants font partie d'une autre réservation : \n\n";
			foreach($reservation_user_slot as $slot) {
				$message .= " - ".$slot['firstname']." ".$slot['lastname']."\n";
			}
			// Log::instance()->add(Log::NOTICE, "ajax add public : erreur ".$message);
			$valid = FALSE;
			goto end;
		}
		////////////////////////////////////////////////////////////
		// Vérification si cette partie ne se trouve pas sur la plage d'une réservation existante
		////////////////////////////////////////////////////////////
		
		$query = "SELECT `users_has_reservation`.`id_users` as `id_users`,`reservation`.`date_reservation` as `date_reservation`, DATE_ADD(  `reservation`.`date_reservation`, INTERVAL `type_parcours`.`duree` SECOND ) AS `date_fin_reservation` FROM  `reservation` JOIN  `users_has_reservation` ON (  `users_has_reservation`.`id_reservation` =  `reservation`.`id` ) JOIN  `type_parcours` ON (  `type_parcours`.`id` =  `reservation`.`id_type_parcours` ) WHERE (";
		$i = 0;
		foreach($resa->players as $players) {
			if($players->id != "" && $players->id != 0 && $players->id != 1) {
				if($i != 0) $query .= " OR ";
				$query .= " `users_has_reservation`.`id_users` = ".$players->id;
			}
			$i++;
		}
		$query .= ") ";		
		$query .= " AND  `reservation`.`date_reservation` >=  '".$date_debut_reservation->format('Y-m-d')." 00:00:00'";
		$query .= " AND  `reservation`.`date_reservation` <=  '".$date_debut_reservation->format('Y-m-d')." 23:59:59'";
		
		// On récupère les réservations du jour J pour tous les joueurs présent	
		$connection = DB_Connection_Pool::instance()->get_connection('default');
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
				// Log::instance()->add(Log::NOTICE, "ajax add public : erreur ".$message);
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
	}	// CheckCollision
*/	
} //Class Tools

