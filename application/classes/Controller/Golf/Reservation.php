<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Golf_Reservation extends Controller_Main
{
	
	////////////////////////////////
	// PUBLIC FUNCS ////////////////
	////////////////////////////////
	
    public function before()
	{
		$this->template			 = 'admin';
		parent::before();
		if($this->isLogged) {										// cesar: menu membres
		// if (Auth::instance()->logged_in()) {
			$this->template->header	 = View::factory('admin/header');  // Loads default header file from our views folder /views/admin/header.php
			$this->template->content = View::factory('admin/content');  // Loads default index file from our views folder 
			$this->template->footer	 = View::factory('admin/footer');  // Loads default footer file from our views folder
			

	        // Use default view as controller/view
	        // So controller dash action index will have the view application/views/dash/index
			// 	        $view = $this->request->controller() . '/' . $this->request->action();
			// 	        $this->template->content = file_exists(APPPATH . 'views/' . $view . '.php') ? View::factory($view) : NULL;
			// 
			// $this->template->content = View::factory( '/admin/content');
			// $this->template->content->header_nav = View::factory( '/admin/header_nav');
			// $this->template->content->header_nav->breadcrumb = $this->get_breadcrumbs();
			// 	        $this->template->title = 'Dashboard';
			// $this->template->content->header_nav->home	=	0;
			// $this->template->content->header_nav->users	=	0;
			// $this->template->content->header_nav->reservation	=	1;
			// $this->template->content->header_nav->competition	=	0;
			// $this->template->content->header_nav->settings	=	0;
		}
    }	// before

	public function after()
	{
		if($this->isLogged) {										// cesar: menu membres
		// if (Auth::instance()->logged_in()) {
			Session::instance()->set('affected_ids', array());
			parent::after();
		}
	}	// after
	
	////////////////////////////////
	// ACTION FUNCS ////////////////
	////////////////////////////////
	
	public function action_calendrier()	 // DHTMLX
	{
		
        if (!Auth::instance()->logged_in()) {	//test if logged in
            HTTP::redirect('login');
       	}
		
		if (!Auth::instance()->logged_in('admin')) {
            HTTP::redirect('/');
       	}

		$user = Auth::instance()->get_user();

		$this->template->title = 'Golf Club de Bourbon - Réservation';
		
		// On récupère la liste des parcours du golf
		$parcours = DB_ORM::select('Parcours')->query();
					
		$golf = DB_ORM::model('Golf');
		$golf->id = 1;
		$golf->load();
		
		$premier_depart = $golf->heure_ouverture;
		$premier_depart = strtotime($premier_depart);
		$premier_depart = date('H', $premier_depart);
		
		$dernier_depart = $golf->heure_fermeture;
		$dernier_depart = strtotime($dernier_depart);
		$dernier_depart = date('H', $dernier_depart);
		//$dernier_depart += 1;
		
		$block_time_before_start = date("F j, Y H:i:s", strtotime("-1 year"));
		$minute = date('i');
		while(($minute % 10) != 0){
			$minute++;
		};
		$block_time_before_end   = date("F j, Y H:".$minute.":00");//"Y-m-d H:".$minute.":00");
		
		// $block_time_after_start = date("F j, Y H:i:s", strtotime("+3 days"));	//deprecated by cesar: homogeneisation avec le public 
		$block_time_after_start = date("F j, Y 23:59:59", 	strtotime("+3 days 4 hours")); // Deblocage du jour suivant à 20h00
		$block_time_after_end = date("F j, Y H:i:s", strtotime("+1 years"));
					
		$ressources = DB_SQL::select("default")
							->from("ressources")
							->where("id_golf", "=", $golf->id)
							->query();		
		// TODO : Faire une requete pour voir les reservations sur ce creneau horaire et décrémenter le nb de ressource available par rapport au nombre max par partie			
		
		// Log::instance()->add(Log::NOTICE, "resevation add : POST =");
		
		$this->template->content = View::factory('/admin/reservation/calendrier');
		$this->template->content->header_nav = View::factory( '/admin/header_nav');
		$this->template->content->header_nav->breadcrumb = $this->get_breadcrumbs();
		$this->template->content->header_nav->home	=	0;
		$this->template->content->header_nav->users	=	0;
		$this->template->content->header_nav->reservation	=	1;
		$this->template->content->header_nav->competition	=	0;
		$this->template->content->header_nav->settings	=	0;
		
		$this->template->content->parcours = $parcours;
		$this->template->content->premier_depart = $premier_depart;
		$this->template->content->dernier_depart = $dernier_depart;
		$this->template->content->block_time_before_start = $block_time_before_start;
		$this->template->content->block_time_before_end = $block_time_before_end;
		$this->template->content->block_time_after_start = $block_time_after_start;
		$this->template->content->block_time_after_end = $block_time_after_end;
		$this->template->content->ressources = $ressources;
		$this->template->content->logged_in_user = Auth::instance()->get_user();
	}	// action_calendrier
	
	public function action_liste()
	{
		// modif olivier
        if (!Auth::instance()->logged_in()) {
            HTTP::redirect('login');
       	}

		// recup user
		$user = Auth::instance()->get_user();
		
		$username = $user->firstname." ".$user->lastname;
		$userid = $user->id;
		
		// On récupère la liste des parcours du golf
		$parcours = DB_ORM::select('Parcours')
					->query();
		
        $this->template->title = 'Dashboard - Réservations';

		$this->template->content= View::factory( '/admin/reservation/calendrier');
		$this->template->content->header_nav = View::factory( '/admin/header_nav');
		$this->template->content->header_nav->breadcrumb = $this->get_breadcrumbs();
		
		$this->template->content->header_nav->home	=	0;
		$this->template->content->header_nav->users	=	0;
		$this->template->content->header_nav->reservation	=	1;
		$this->template->content->header_nav->competition	=	0;
		$this->template->content->header_nav->settings	=	0;
		$this->template->content->username = $username;
		$this->template->content->userid = $userid;
		$this->template->content->parcours = $parcours;
	}	// action_liste
	
	public function action_delete_resa_visiteur()
	{
		
		if (!Auth::instance()->logged_in('admin')) {
			HTTP::redirect('login');
		}
		
		$id_demande_reservation = $this->request->param('id');
		
		$builder = DB_ORM::delete('reservation')
		   			->where('id_demande_reservation', '=', $id_demande_reservation);
		$id = $builder->execute();
		
		$demande_reservation = DB_ORM::model('demande_reservation');
		$demande_reservation->id = $id_demande_reservation;
		$demande_reservation->delete();
		
		HTTP::redirect('/golf/resavisiteurs');
	}	// action_delete_resa_visiteur
	
	public function action_update_resa_visiteur()
	{
		
		if (!Auth::instance()->logged_in('admin')) {
			HTTP::redirect('login');
		}
		
		$method = $_POST;

		$id_demande_reservation = Arr::get($_POST, 'id_demande_reservation');
		
		$demande_reservation = DB_ORM::model('demande_reservation');
		$demande_reservation->id = $id_demande_reservation;
		$demande_reservation->load();
		
		$ressources_available = DB_SQL::select("default")
							->from("ressources")
							->where("id_golf", "=", 1)
							->query();
		
		$ressources = array();
		
		foreach($ressources_available as $r) {
			$ressources[$r["ressource"]] = Arr::get($method, "nb_".$r["ressource"]."s");
		}
		
		
		$date 				= Arr::get($method, 'date');
		$heure 				= Arr::get($method, 'heure');
		
		if($date == NULL || $date == "" || $heure == NULL || $heure == "") {
			//echo "Erreur ! Paramètre manquant !";
			HTTP::redirect("/golf/reservation/edit_resa_visiteur/".$id_demande_reservation);
		}
		
		$dateArray 			= explode('/', $date); // 20/12/2012
		$requestDate 		= $dateArray[2].'-'.$dateArray[1].'-'.$dateArray[0].' '.$heure.':00';
		
		$demande_reservation->nb_trous 		= Arr::get($method, 'nb_trous');
		$demande_reservation->date 			= $requestDate;
		$demande_reservation->nom 			= Arr::get($method, 'client_name');
		$demande_reservation->prenom		= Arr::get($method, 'client_firstname');
		$demande_reservation->email 		= Arr::get($method, 'client_email');
		$demande_reservation->phone 		= Arr::get($method, 'client_phone');
		$demande_reservation->nb_joueurs 	= Arr::get($method, 'nb_joueurs');
		
		$demande_reservation->ressources 	= "";
		
		foreach($ressources as $key => $r) {
			$demande_reservation->ressources .= $key." : ".$r." / ";
		}
		
		$demande_reservation->save();
		
		HTTP::redirect('/golf/reservation/transform/'.$id_demande_reservation);
	}	// action_update_resa_visiteur
	
	public function action_treat()	// Marque la demande de réservation comme traitée
	{
		if (!Auth::instance()->logged_in('admin')) {
			HTTP::redirect('login');
		}
		
		$valid = false;
		$message = "";
		
		$id_demande_reservation = $this->request->param('id');
		
		if(!($id_demande_reservation > 0)) {
			$message = "Erreur ! Paramètre manquant !";
			goto end;
		}
		
		$demande_reservation = DB_ORM::model('demande_reservation');
		$demande_reservation->id = $id_demande_reservation;
		$demande_reservation->load();
		
		$demande_reservation->traite = 1;
		
		$demande_reservation->save();
		
		$message = "Demande de réservation validée";
		
		end:
		
		$this->template->content = View::factory('/admin/reservation/transform');
		
		$this->template->content->header_nav = View::factory('/admin/header_nav');
		$this->template->content->header_nav->breadcrumb = $this->get_breadcrumbs();
		
		$this->template->content->header_nav->home			=	0;
		$this->template->content->header_nav->users			=	0;
		$this->template->content->header_nav->reservation	=	1;
		$this->template->content->header_nav->competition	=	0;
		$this->template->content->header_nav->settings		=	0;
				
		$this->template->content->message = $message;
		$this->template->content->success = $valid;
		
	}	// action_treat
	
	public function action_transform()	// Transforme une demande de reservation en réservation (valide la reservation visiteur)
	{
		// Maintenant demande de réservation validé automatiquement 
		/*if (!Auth::instance()->logged_in('admin')) {
			HTTP::redirect('login');
		}*/
		
		$valid = false;
		$message = "";

		//$method = $_GET;
		$max_joueurs = 4;
		
		$id_demande_reservation = $this->request->param('id');//Arr::get($method, "id_demande_reservation");
		
		
		if(!($id_demande_reservation > 0)) {
			$message = "Erreur ! Paramètre manquant !";
			goto end;
		}
		
		$demande_reservation = DB_ORM::model('demande_reservation');
		$demande_reservation->id = $id_demande_reservation;
		$demande_reservation->load();
		
		if(!($demande_reservation->id > 0) /*&& $demande_reservation->traite != 0*/) {
			$message = "Erreur ! Demande de réservation introuvable ";//ou déjà traitée.";
			goto end;
		}
		
		$ressources_available = DB_SQL::select("default")
							->from("ressources")
							->where("id_golf", "=", 1)
							->query();
		
		
							
		$ressources = array();
		$ressources_ids = array();
		
		$ressources_demandees_brut = explode('/', $demande_reservation->ressources);
		array_pop($ressources_demandees_brut);
		
		$ressources_demandees = array();
		
		$i = 0;
		
		foreach($ressources_demandees_brut as $rdb) {
			$temp = explode(":", $rdb);
			
			$key = trim($temp[0]);
			$value = trim($temp[1]);
			
			$ressources_demandees[$key] = $value;
		}
		
		
		foreach($ressources_available as $r) {
			if(array_key_exists($r['ressource'], $ressources_demandees)) {
				$ressources[$r['ressource']] = $ressources_demandees[$r['ressource']];
			}
			else {
				$ressources[$r['ressource']] = 0;
			}
			$ressources_ids[$r['ressource']] = $r['id'];
		}
		
		/*
		echo "<pre>";
		print_r($ressources);
		echo "</pre>";
		
		return;
		*/
		
		//////////////////////////////////////////////////////////////////////////
		// Vérification de la date de réservation
		//////////////////////////////////////////////////////////////////////////

		$requestDateTime = new DateTime($demande_reservation->date);
		$currentDateTime = new DateTime();

		if($requestDateTime < $currentDateTime) {
			$message = "ERREUR : La date de la demande est passée.";
			goto end;
		}
		
		
		//////////////////////////////////////////////////////////////////////////
		// Réservation des parcours
		//////////////////////////////////////////////////////////////////////////
		
		$trou_depart = 1;
		
		retry_trou_depart:
		
		$p = DB_SQL::select('default')
					->column('parcours.id')
					->from('parcours')
					->join(NULL, 'combinaison_parcours')
					->on("combinaison_parcours.id_parcours", "=", "parcours.id")
					->join(NULL, 'type_parcours')
					->on("combinaison_parcours.id_type_parcours", "=", "type_parcours.id")
					->where("type_parcours.trou_depart", "=", $trou_depart)
					->where("parcours.nb_trous_total", "=", $demande_reservation->nb_trous, "AND")
					->where("combinaison_parcours.ordre", "=", 1, "AND") // on s'iteresse au trou de départ du parcours global pas du type_parcours
					->query();
						
		$id_parcours = $p[0]['id'];
		
		$parcours_info = array(); // {trou_depart, duree} key = id_type_parcours
		
		// On récupère les types de parcours à réserver et leur durées
		$types_parcours = DB_SQL::select('default')
			->from('parcours')
			->column('combinaison_parcours.id_type_parcours', 'id_type_parcours')
			->column('type_parcours.duree', 'duree')
			->column('type_parcours.trou_depart', 'trou_depart')
			->join(NULL,'combinaison_parcours')
			->on('parcours.id', '=', 'combinaison_parcours.id_parcours')
			->join(NULL,'type_parcours')
			->on('type_parcours.id', '=', 'combinaison_parcours.id_type_parcours')
			->where('parcours.id', '=', $id_parcours)
			->order_by('ordre')
			->query(); 
			
		foreach($types_parcours as $type) {
			$parcours_info[$type['id_type_parcours']] = array('trou_depart' => $type['trou_depart'], 'duree' => $type['duree']);
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
								->where('date_reservation', '=', $demande_reservation->date)
								->where('type_parcours.trou_depart', '=', $first_parcours_info['trou_depart'], 'AND')
								->where_block(')');
		
		// On crée un timestamp avec la date pour additionner la durée du parcours dans les requetes						
		$beginTime = new DateTime($demande_reservation->date);
		$timestamp = $beginTime->getTimestamp();
		
		// Variable qui stocke le nombre de joueurs par type de parcours dans les reservations
		$total_joueurs_counts = array();
		$total_joueurs_counts[$first_parcours_info['trou_depart']] = 0;
		
		$id_type_parcours = array_keys($parcours_info);
		
		for($i = 1; $i < count($id_type_parcours); $i++) {
			$total_joueurs_counts[$parcours_info[$id_type_parcours[$i]]['trou_depart']] = 0;
			// On ajoute la durée du parcours à l'heure de départ pour obtenir le départ au trou suivant
			$timestamp += $parcours_info[$id_type_parcours[$i-1]]['duree'];
			
			$creneaux_oqp_request->where_block('(', 'OR');
			$creneaux_oqp_request->where('date_reservation', '=', date('Y-m-d H:i:s', $timestamp));
			$creneaux_oqp_request->where('type_parcours.trou_depart', '=', $parcours_info[$id_type_parcours[$i]]['trou_depart'], 'AND');
			$creneaux_oqp_request->where_block(')');
		}
		
		$creneaux_oqp_request->group_by('reservation.id');
		
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
			if(($nb + $demande_reservation->nb_joueurs)  > $max_joueurs) {
				// Une réservation est déjà pleine pour un des trous au horaires définies
				$message = "ERREUR : Désolé ! Ce créneau horaire ne peut plus accueillir ".$demande_reservation->nb_joueurs." joueurs";
				if($trou_depart == 1) {
					$trou_depart = 10;
					goto retry_trou_depart;
				}
				goto end;
			}
		}
		
		$reservations = array();
		
		$first_reservation_query = DB_SQL::insert('default')
										->into('reservation')
										->column('id_type_parcours', $id_type_parcours[0])
										->column('date_reservation', $demande_reservation->date)
										->column('nb_joueurs', $demande_reservation->nb_joueurs)
										->column('id_parent', 0)
										->column('id_demande_reservation', $id_demande_reservation);

		$id_parent = $first_reservation_query->execute(TRUE);
		array_push($reservations, $id_parent);
		
		// Reset le timestamp
		$timestamp = $beginTime->getTimestamp();
		
		// Dans le cas d'un parcours "composés" on ajoute les réservations suivantes
		for($i = 1; $i < count($id_type_parcours); $i++) {
			
			// On ajoute la durée du parcours à l'heure de départ pour obtenir le départ au trou suivant
			$timestamp += $parcours_info[$id_type_parcours[$i-1]]['duree'];
			
			$other_reservation = DB_SQL::insert('default')
								->into('reservation')
								->column('id_type_parcours', $id_type_parcours[$i])
								->column('date_reservation', date('Y-m-d H:i:s', $timestamp))
								->column('nb_joueurs', $demande_reservation->nb_joueurs)
								->column('id_parent', $id_parent)
								->column('id_demande_reservation', $id_demande_reservation);
			
			array_push($reservations, $other_reservation->execute(TRUE));
		}
		
		
		//////////////////////////////////////////////////////////////////////////
		// Ajout des joueurs à la réservation
		//////////////////////////////////////////////////////////////////////////
		
		// Attribution des joueurs à une réservation
		$i = 0;
		
		foreach($reservations as $id_reservation) {
			
			for($j = 0; $j < $demande_reservation->nb_joueurs; $j++) {
				
				$user_reservation_to_insert 				= DB_ORM::model('users_has_reservation');
				$user_reservation_to_insert->id_users 		= 1;
				$user_reservation_to_insert->id_reservation = $id_reservation;
				$user_reservation_to_insert->info			= $demande_reservation->prenom." ".$demande_reservation->nom;

				$user_reservation_to_insert->save(TRUE);
				
				foreach($ressources as $ressource => $count) {
					if($ressources[$ressource] > 0) {
						$ressources[$ressource] -= 1;
						
						$user_reservation_ressources							= DB_ORM::model('user_reservation_ressources');
						$user_reservation_ressources->id_user_has_reservation 	= $user_reservation_to_insert->id;
						$user_reservation_ressources->id_ressources			 	= $ressources_ids[$ressource];

						$user_reservation_ressources->save();
						
						break;
					}
				}
			}
		}
		
		//$demande_reservation->traite = 1;
		//$demande_reservation->save();
		
		$message = "Réservation enregistrée";
		$valid = true;

		end:
		
		echo $valid;
		//echo $message;
		
		/*$this->template->content = View::factory('/admin/reservation/transform');
		
		$this->template->content->header_nav = View::factory('/admin/header_nav');
		$this->template->content->header_nav->breadcrumb = $this->get_breadcrumbs();
		
		$this->template->content->header_nav->home			=	0;
		$this->template->content->header_nav->users			=	0;
		$this->template->content->header_nav->reservation	=	1;
		$this->template->content->header_nav->competition	=	0;
		$this->template->content->header_nav->settings		=	0;
				
		$this->template->content->message = $message;
		$this->template->content->success = $valid;*/
			
	}	// action_transform
	
	public function action_add()
	{
		
		$message = "Not logged in !";
		$valid = false;
		
		if (!Auth::instance()->logged_in()) {
			//HTTP::redirect('login');
			goto view;
		}
		
		$trou_depart = 1;//= Arr::get($method, 'trou_depart');
		
		retry_trou_depart:
		
		$message = "";

		$method = $_POST;
		
		$max_joueurs = 4;
		$maxReservationDay = 3;

		$nb_joueurs = 0;
		$nbTrousJ 	= array();
		$id_joueurs = array();
		$nom_joueurs = array();
		$id_parcours_joueurs = array();
		
		$nb_trous 		= Arr::get($method, 'nb_trous');
		
		$date 			= Arr::get($method, 'date');
		$heure 			= Arr::get($method, 'heure');
		$dateArray 		= explode('/', $date); // 20/12/2012
		$requestDate 	= $dateArray[2].'-'.$dateArray[1].'-'.$dateArray[0].' '.$heure.':00';
		
		
		for($i = 0; $i < 4; $i++) {
			$id_joueurs[$i] = Arr::get($method, 'id_joueur'.($i+1));
			$nom_joueurs[$i] = Arr::get($method, 'joueur'.($i+1));
			$nbTrousJ[$i]	= $nb_trous; // Arr::get($method, 'nbTrousJ'.($i+1));
			
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
				
		// TODO : Gerer en ressources les voiturettes et chariots dynamiquement et non en dur
		//		  Ajouter dans la table user has reservation DES id ressource par joueur (eventuellement faire une table intermédiaire)
		//$nbVoiturettes	= count($ressources['Voiturette']);
		//$nbChariots		= count($ressources['Chariot']);
		
		$date 			= $requestDate;
		
		//Log::instance()->add(Log::NOTICE, "ajax add public : tabdate =".implode(",", $tabdate));

		if( $id_joueurs[0] 	== NULL || $id_joueurs[0] 	== "" 	||
			$date 			== NULL || $date 			== ""	||
			$heure			== NULL || $heure			== ""
		) {

			// On vérifie simplement que les variable attendu en POST sont bien là et son cohérentes
			$message = "ERREUR : Paramètres manquants ou inattendus lors de la réservation. Parcours NON réservé !";
			Log::instance()->add(Log::NOTICE, "ajax add public : erreur ".$message);
			goto view;
		}

		//////////////////////////////////////////////////////////////////////////
		// Vérification de la date de réservation
		//////////////////////////////////////////////////////////////////////////

		$requestDateTime = new DateTime($date);
		$currentDateTime = new DateTime();

		/*$maxDateTime = new DateTime();
		$maxDateTime->add(new DateInterval('P'.$maxReservationDay.'D'));
		$maxDateTime->setTime(23,59,59);

		if($requestDateTime > $maxDateTime) {
			$message = "ERREUR : Désolé vous ne pouvez pas réserver à plus de ".$maxReservationDay." jours.";
			Log::instance()->add(Log::NOTICE, "ajax add public : erreur ".$message);
			goto view;
		}*/

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
			
			$creneaux_oqp_request->where_block('(', 'OR');
			$creneaux_oqp_request->where('date_reservation', '=', date('Y-m-d H:i:s', $timestamp));
			$creneaux_oqp_request->where('type_parcours.trou_depart', '=', $parcours_info[$id_type_parcours[$i]]['trou_depart'], 'AND');
			$creneaux_oqp_request->where_block(')');
		}
		
		$creneaux_oqp_request->group_by('reservation.id');
		
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
				if($trou_depart == 1) {
					$trou_depart = 10;
					goto retry_trou_depart;
				}
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
						
						if(!(array_search($keys[$invite_i], $joueurs_indexes) === FALSE)) {
							
							$user_reservation_ressources							= DB_ORM::model('user_reservation_ressources');
							$user_reservation_ressources->id_user_has_reservation 	= $user_reservation_to_insert->id;
							$user_reservation_ressources->id_ressources			 	= $ressource_id;
							
							$user_reservation_ressources->save();
						}
					}
					$invite_i++; // TODO : Problème si un invité fait 9 trous et que le suivant fait 18 trous ses ressources ne sont pas pris en compte...
				}
				
				/*
				// On récupère l'index de l'id_users dans le tableau $id_joueurs
				$joueur_index = array_search($id_users, $id_joueurs); // PROBLEME L'UTILISATEUR INVITE ETANT PLUSIEURS FOIS array_search renvoi le 1er et du coup pas d'ajout de ressources pour les invites apres
				
				if(!($joueur_index === FALSE) && $joueur_index >= 0) {
					foreach($ressources_ids as $ressource_id => $joueurs_indexes) {
						// On vérifie dans le tableau de ressources récupéré en POST que l'index est présent.
						// Si il est présent c'est que la ressource a été coché pour ce joueur donc on ajoute cette ressource a la reservation du joueur
						
						if(!(array_search($joueur_index, $joueurs_indexes) === FALSE)) {
							$user_reservation_ressources							= DB_ORM::model('user_reservation_ressources');
							$user_reservation_ressources->id_user_has_reservation 	= $user_reservation_to_insert->id;
							$user_reservation_ressources->id_ressources			 	= $ressource_id;
							
							$user_reservation_ressources->save();
						}
					}
				}*/
				
			}
		}

		$message = "Réservation enregistrée";
		$valid = true;
		Log::instance()->add(Log::NOTICE, "ajax add admin : OK ".$message);

		view:
		
		$this->template->content = View::factory('/admin/reservation/add');
		
		$this->template->content->header_nav = View::factory('/admin/header_nav');
		$this->template->content->header_nav->breadcrumb = $this->get_breadcrumbs();
		
		$this->template->content->header_nav->home			=	0;
		$this->template->content->header_nav->users			=	0;
		$this->template->content->header_nav->reservation	=	1;
		$this->template->content->header_nav->competition	=	0;
		$this->template->content->header_nav->settings		=	0;
				
		$this->template->content->message = $message;
		$this->template->content->success = $valid;

		/*echo json_encode(array(
			'valid' => $valid,
			'message' => $message,
		));*/
	}	// action_add
	
	public function action_wizard()	// cesar: a fusionner avec public/application/wizard
	{
		
		if (!Auth::instance()->logged_in('admin')) {
			HTTP::redirect('/');
		}
		// On récupère les horaires d'ouverture et de fermeture ainsi que l'interval de réservation
		$golf = DB_ORM::model('Golf');
		$golf->id = 1;
		$golf->load();
				
		// On récupère la liste des parcours du golf
		$parcours = DB_ORM::select('Parcours')
			->query();
					
		$ressources = DB_SQL::select("default")
			->from("ressources")
				->where("id_golf", "=", $golf->id)
					->query();
		
		$this->template->content = View::factory( '/admin/reservation/wizard');
		$this->template->content->header_nav = View::factory( '/admin/header_nav');
		$this->template->content->header_nav->breadcrumb = $this->get_breadcrumbs();
		$this->template->content->header_nav->home			=	0;
		$this->template->content->header_nav->users			=	0;
		$this->template->content->header_nav->reservation	=	1;
		$this->template->content->header_nav->competition	=	0;
		$this->template->content->header_nav->settings		=	0;
		
		$this->template->content->beginTime 				= new DateTime($golf->heure_ouverture);
		$this->template->content->endTime 					= new DateTime($golf->heure_fermeture);
		$this->template->content->interval 					= $golf->intervalle;
		$this->template->content->ressources 				= $ressources;
		$this->template->content->parcours 					= $parcours;
		$this->template->title = 'Assistant de réservation';
		
	}	// action_wizard
	
	////////////////////////////////
	// PRIVATE FUNCS ///////////////
	////////////////////////////////
	
	private function collision_check($id_joueurs, $date_debut_reservation, $id_type_parcours)
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
	
	/*	public function action_index()	// cesar: empty !!!
		{
		}	// action_index
	*/	
	/*	public function action_bookingdone()	// cesar: empty !!!
		{
		}	// action_bookingdone
	*/	

	/*private function insert_player_if_needed($id_joueur, $joueur)	// Insert un utilisateur dans la base de données si il n'existe pas.
	{
		// Retourne l'id_users du joueur ou NULL dans le cas ou il n'y a ni ID ni nom de joueur
		
		if($id_joueur > 0) {
			// Si c'est un nombre supérieur à 0 (un ID)
			return $id_joueur;
		}
		elseif($joueur != "") {
			// On ajoute un joueur dans la base de données
			$fullname = explode(' ', $joueur);
			
			$firstname = $fullname[0];
			$lastname = "";
			
			// Pour éviter un plantage si il n'y a qu'un prénom ou nom d'entré
			if(count($fullname) >= 2) {
				$lastname = $fullname[1];
			}
			
			$user_to_insert 			= DB_ORM::model('users');
			$user_to_insert->firstname 	= $firstname;
			$user_to_insert->lastname 	= $lastname;
			$user_to_insert->username	= str_replace(" ", "_", $joueur); // TODO : Add random part to the username or remove unique constraint in database
			
			$user_to_insert->save(TRUE);
			
			return $user_to_insert->id;
		}
		return NULL;
	}*/
	
	/*public function action_add_OLD()
	{
		
		$message = "";
		$method = $_POST;
		$maxReservationDay = 3;
		
		$max_joueurs = 4;
		$nb_joueurs= 0;
		
		// TODO : vérifier la présence de tous les paramètres. Si il en manque ERREUR !
		$id_parcours = Arr::get($_POST, 'parcours');
		
		// controle si parcours composé de plusieurs parcours
		
		//echo 'parcours='.$id_parcours;
		
		$joueur1 = Arr::get($method, 'joueur1');
		$joueur2 = Arr::get($method, 'joueur2');
		$joueur3 = Arr::get($method, 'joueur3');
		$joueur4 = Arr::get($method, 'joueur4');
		$id_joueur1 = Arr::get($method, 'id_joueur1');
		$id_joueur2 = Arr::get($method, 'id_joueur2');
		$id_joueur3 = Arr::get($method, 'id_joueur3');
		$id_joueur4 = Arr::get($method, 'id_joueur4');
		
		//echo "joueur1=".$id_joueur1." joueur2=".$id_joueur2." joueur3=".$id_joueur3." joueur4=".$id_joueur4."<br/>";
		if(strlen($joueur1)>0){
			$nb_joueurs++;
		}
		if(strlen($joueur2)>0){
			$nb_joueurs++;
		}
		if(strlen($joueur3)>0){
			$nb_joueurs++;
		}
		if(strlen($joueur4)>0){
			$nb_joueurs++;
		}
		//echo "nb joueurs=".$nb_joueurs;
		
		$nbVoiturettes = Arr::get($method, 'nbVoiturettes');
		$nbChariots = Arr::get($method, 'nbChariots');
		
		$date = Arr::get($method, 'date');
		$heure = Arr::get($method, 'heure');
		
		
		if( $id_parcours 	== NULL	|| $id_parcours 	<= 0 	|| 
			$joueur1 		== NULL || $joueur1 		== "" 	||
			$nbVoiturettes 	== NULL || $nbVoiturettes 	< 0 	||
			$nbChariots 	== NULL || $nbChariots 		< 0 	||
			$date 			== NULL || $date 			== ""	||
			$heure 			== NULL || $heure 			== ""
			) {
				
				// On vérifie simplement que les variable attendu en POST sont bien là et son cohérentes
				$message = "<strong class='error'>ERREUR : </strong> Paramètres manquants ou inattendus lors de la réservation. Parcours NON réservé !";
				goto view;
		}
		
		//////////////////////////////////////////////////////////////////////////
		// Vérification de la date de réservation
		//////////////////////////////////////////////////////////////////////////
		$dateArray = explode('/', $date); // 20/12/2012
		$requestDate = $dateArray[2].'-'.$dateArray[1].'-'.$dateArray[0].' '.$heure.':00';
		//$requestDate = "2012-12-20 16:00:00";

		$requestDateTime = new DateTime($requestDate);
		$currentDateTime = new DateTime();
		
		$maxDateTime = new DateTime();
		$maxDateTime->add(new DateInterval('P'.$maxReservationDay.'D'));
		$maxDateTime->setTime(23,59,59);
		
		if($requestDateTime > $maxDateTime) {
			$message = "<strong class='error'>ERREUR : </strong> Désolé vous ne pouvez pas réserver à plus de ".$maxReservationDay." jours.";
			goto view;
		}
		
		if($requestDateTime < $currentDateTime) {
			$message = "<strong class='error'>ERREUR : </strong> La date à laquelle vous souhaitez réserver est passé.";
			goto view;
		}
		
		
		//////////////////////////////////////////////////////////////////////////
		// Réservation des parcours
		//////////////////////////////////////////////////////////////////////////
		
		// On récupère les types de parcours à réserver, leur durée
		$parcours = DB_SQL::select('default')
					->from('parcours')
					->column('combinaison_parcours.id_type_parcours', 'id_type_parcours')
					->column('type_parcours.duree', 'duree')
					->column('type_parcours.trou_depart', 'trou_depart')
					->join(NULL,'combinaison_parcours')
					->on('parcours.id', '=', 'combinaison_parcours.id_parcours')
					->join(NULL,'type_parcours')
					->on('type_parcours.id', '=', 'combinaison_parcours.id_type_parcours')
					->where('parcours.id', '=', $id_parcours)
					->order_by('ordre')
					->query();
					
					
		// On vérifie que les horaires n'ont pas été réservé entre temps
		// TODO : Checker les horaires d'ouverture pour empecher de prendre une réservation si la date de fin dépasse les horaires de fermetures ???
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
								->where('date_reservation', '=', $requestDate)
								->where('type_parcours.trou_depart', '=', $parcours[0]['trou_depart'], 'AND')
								->where_block(')');
		
		// On crée un timestamp avec la date pour additionner la durée du parcours dans les requetes						
		$beginTime = new DateTime($requestDate);
		$timestamp = $beginTime->getTimestamp();
		
		// Variable qui stocke le nombre de joueurs par type de parcours dans les reservations
		$total_joueurs_counts = array();
		$total_joueurs_counts[$parcours[0]['trou_depart']] = 0;
			
		for($i = 1; $i < count($parcours); $i++) {
			$total_joueurs_counts[$parcours[$i]['trou_depart']] = 0;
			// On ajoute la durée du parcours à l'heure de départ pour obtenir le départ au trou suivant
			$timestamp += $parcours[$i-1]['duree'];
			
			$creneaux_oqp_request->where_block('(', 'OR');
			$creneaux_oqp_request->where('date_reservation', '=', date('Y-m-d H:i:s', $timestamp));
			$creneaux_oqp_request->where('type_parcours.trou_depart', '=', $parcours[$i]['trou_depart'], 'AND');
			$creneaux_oqp_request->where_block(')');
		}
		
		$creneaux_oqp_request->group_by('reservation.id');
		
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
		
		foreach($total_joueurs_counts as $trou => $nb) {
			if(($nb + $nb_joueurs)  > $max_joueurs) {
				// Une réservation est déjà pleine pour un des trous au horaires définies
				$message = "<strong class='error'>ERREUR : </strong> Désolé ! Ce créneau horaire ne plus accueillir ".$nb_joueurs." joueurs";
				goto view;
			}
		}
		
		$reservations = array();
		
		// Ajout de la première réservation
		$first_reservation_query = DB_SQL::insert('default')
										->into('reservation')
										->column('id_type_parcours', $parcours[0]['id_type_parcours'])
										->column('date_reservation', $requestDate)
										->column('nb_chariots', $nbChariots)
										->column('depart', 1)
										->column('nb_joueurs', $nb_joueurs)
										->column('nb_voiturettes', $nbVoiturettes)
										->column('id_parent',0);

		$id_parent = $first_reservation_query->execute(TRUE);
		array_push($reservations, $id_parent);
		
		
		// Reset le timestamp
		$timestamp = $beginTime->getTimestamp();
		
		// Dans le cas d'un parcours "composés" on ajoute les réservations suivantes
		for($i = 1; $i < count($parcours); $i++) {
				
			// On ajoute la durée du parcours à l'heure de départ pour obtenir le départ au trou suivant
			$timestamp += $parcours[$i-1]['duree'];
			
			$other_reservation = DB_SQL::insert('default')
								->into('reservation')
								->column('id_type_parcours', $parcours[$i]['id_type_parcours'])
								->column('date_reservation', date('Y-m-d H:i:s', $timestamp))
								->column('nb_chariots', $nbChariots)
								->column('depart', 2)
								->column('nb_joueurs', $nb_joueurs)
								->column('nb_voiturettes', $nbVoiturettes)
								->column('id_parent',$id_parent);
			
			array_push($reservations, $other_reservation->execute(TRUE));
		}
		
		
		//////////////////////////////////////////////////////////////////////////
		// Ajout des joueurs à la réservation
		//////////////////////////////////////////////////////////////////////////
		
		// Tableau contenant les id_users des joueurs pour la réservation (4 Maxi)
		$joueurs = array();
		
		array_push($joueurs, $this->insert_player_if_needed($id_joueur1, $joueur1));
		array_push($joueurs, $this->insert_player_if_needed($id_joueur2, $joueur2));
		array_push($joueurs, $this->insert_player_if_needed($id_joueur3, $joueur3));
		array_push($joueurs, $this->insert_player_if_needed($id_joueur4, $joueur4));
		
		// Attribution des joueurs à une réservation
		
		foreach($reservations as $id_reservation) {
			foreach($joueurs as $id_users) {
				if($id_users == NULL) {
					// On passe les id_users NULL
					continue;
				}
								
				$user_reservation_to_insert 				= DB_ORM::model('users_has_reservation');
				$user_reservation_to_insert->id_users 		= $id_users;
				$user_reservation_to_insert->id_reservation = $id_reservation;

				$user_reservation_to_insert->save();
			}
		}
		
		// TODO : Gerer la location des voiturettes
			
		//echo $nbVoiturettes."<br />";
		//echo $nbChariots."<br />";
		
		$message = "Réservation OK";
		
		view:
		
		$this->template->content = View::factory( '/admin/reservation/add');
		
		$this->template->content->header_nav = View::factory( '/admin/header_nav');
		$this->template->content->header_nav->breadcrumb = $this->get_breadcrumbs();
		
		$this->template->content->header_nav->home			=	0;
		$this->template->content->header_nav->users			=	0;
		$this->template->content->header_nav->reservation	=	1;
		$this->template->content->header_nav->competition	=	0;
		$this->template->content->header_nav->settings		=	0;
		
		$this->template->content->message = $message;
	}	// action_add*/
	
	/*	public function action_edit_resa_visiteur()	// cesar: NOT USED
		{
		
			if (!Auth::instance()->logged_in('admin')) {
				HTTP::redirect('/');
			}
		
			$id_demande_reservation = $this->request->param('id');

	        $this->template->title = 'Dashboard - Réservations';

			// On récupère les horaires d'ouverture et de fermeture ainsi que l'interval de réservation
			$golf = DB_ORM::model('Golf');
			$golf->id = 1;
			$golf->load();
				
			// On récupère la liste des parcours du golf
			$parcours = DB_ORM::select('Parcours')
						->query();
					
			$ressources = DB_SQL::select("default")
				->from("ressources")
				->where("id_golf", "=", $golf->id)
				->query();
			
			$demande_reservation = DB_ORM::model('demande_reservation');
			$demande_reservation->id = $id_demande_reservation;
			$demande_reservation->load();
		
			$ressources_tab = explode("/", $demande_reservation->ressources);
			$ressources_resa = array();
		
			//print_r($ressources_tab);
		
			//print_r(explode(":", $ressources_tab[1]));
		
		
			for($i = 0; $i < count($ressources_tab) - 1 ; $i++) {
				$res = $ressources_tab[$i];
			
				$keyval = explode(":", $res);
				$key = strtolower(trim($keyval[0]));
				$val = trim($keyval[1]);
			
				$ressources_resa[$key] = intval($val);
			}
				
			$this->template->content = View::factory( '/admin/reservation/wizard_edit_resa_visiteur');
			$this->template->content->header_nav = View::factory( '/admin/header_nav');
			$this->template->content->header_nav->breadcrumb = $this->get_breadcrumbs();
		
			$this->template->content->header_nav->home			=	0;
			$this->template->content->header_nav->users			=	0;
			$this->template->content->header_nav->reservation	=	1;
			$this->template->content->header_nav->competition	=	0;
			$this->template->content->header_nav->settings		=	0;
		
			$this->template->content->parcours 					= $parcours;
		
			$this->template->content->beginTime 				= new DateTime($golf->heure_ouverture);
			$this->template->content->endTime 					= new DateTime($golf->heure_fermeture);
			$this->template->content->interval 					= $golf->intervalle;
			$this->template->content->ressources 				= $ressources;
			$this->template->content->demande_reservation		= $demande_reservation;
			$this->template->content->ressources_resa 			= $ressources_resa;
		
		}	// action_edit_resa_visiteur
	*/	

	/*	public function action_diagramme()
		{

	        $this->template->title = 'Dashboard - Réservations';

			// create array of time ranges
			// $times = $this->create_time_range('6:00', '18:30', '10 mins');
			$times = Tools::create_time_range('6:00', '18:30', '10 mins');
		

			$jour = array("Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi");
			$mois = array("","Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");
			$datefr = $jour[date("w")]." ".date("d")." ".$mois[date("n")]." ".date("Y");
			$datefrhide = date('Y-m-d');
		
			$requestDate = date('Y-m-d');//date du jour
	
			$datefr = '21 Décembre 2012';
			$datefrhide = "2012-12-21";
		
			$requestDate = "2012-12-21";//date du jour
	
			// On récupère la liste des parcours du golf
			$parcours = DB_ORM::select('Parcours')
						->query();
					
			// construction tableau réservation
		
		    $builder = DB_SQL::select('default')
		    ->from('reservation')
			->join(NULL, 'type_parcours')
			->on('type_parcours.id', '=', 'reservation.id_type_parcours')
			->where('date_reservation', 'BETWEEN', array($requestDate.' 00:00:00', $requestDate.' 23:59:59'));
			$reservations = $builder->query()->as_array();
			//print_r($reservations);
		
			$timearr = array();
			// format the unix timestamps
			$compteur=0;
			foreach ($times as $key => $time) {
				$com=0;
			    $times[$key] = date('H:i', $time);
				// test resa pour date
				$datetime1 = new DateTime($datefrhide." ".$times[$key]);
				$timearr[$compteur]['time']=$times[$key];
				$timearr[$compteur]['reservations1']=array();
				$timearr[$compteur]['reservations10']=array();
				$timearr[$compteur]['reservations1']['couleur'] = 'vert';
				$timearr[$compteur]['reservations10']['couleur'] = 'vert';
				$timearr[$compteur]['reservations1']['trou_depart'] = 1; 
				$timearr[$compteur]['reservations10']['trou_depart'] = 10;
				$timearr[$compteur]['reservations1']['resa'] = 0;
				$timearr[$compteur]['reservations10']['resa'] = 0;
				//echo 'time='.$times[$key]."<br/>";
				for ($res=0; $res < count($reservations); $res++) { 
					//echo 'resa='.$reservations[$res]['date_reservation']."<br/>";
					$datetime2 = new DateTime($reservations[$res]['date_reservation']);
					$interval = $datetime1->diff($datetime2);
					$test = $interval->format('%Y%m%d%H%m%i'); 
					if($test==0){
						$reservations[$res]['resa'] = 1;
						//echo 'test ok'."<br/>";
						//if($reservations[$res]['trou_depart']==1){
							switch ($reservations[$res]['nb_joueurs']) {
								case '1':
									$reservations[$res]['couleur'] = 'jaune';
									break;
								case '2':
									$reservations[$res]['couleur'] = 'orangeclair';
									break;
								case '3':
									$reservations[$res]['couleur'] = 'orange';
									break;
								case '4':
									$reservations[$res]['couleur'] = 'rouge';
									break;						
								default:
									$reservations[$res]['couleur'] = 'vert';
									break;
							}
						if($reservations[$res]['depart']==2){
							$reservations[$res]['couleur'] = 'rouge';
						}
						//}
						if($reservations[$res]['trou_depart']==1){
							$timearr[$compteur]['time']=$times[$key];
							$timearr[$compteur]['reservations1']=$reservations[$res];

						}
						elseif($reservations[$res]['trou_depart']==10){
							$timearr[$compteur]['time']=$times[$key];
							$timearr[$compteur]['reservations10']=$reservations[$res];

						}
					}
					// else{
					// 	$timearr[$compteur]['time']=$times[$key];
					// 	$timearr[$compteur]['reservations']=array();
					// 	$compteur++;
					// 	$com=1;
					// }
				}

		
					$compteur++;
			}
			//print_r($reservations);
			//print_r($timearr);
			$nb_reservations=count($reservations);
		
			$this->template->content = View::factory( '/admin/reservation/diagramme');
			$this->template->content->header_nav = View::factory( '/admin/header_nav');
			$this->template->content->header_nav->breadcrumb = $this->get_breadcrumbs();
		
			$this->template->content->header_nav->home			=	0;
			$this->template->content->header_nav->users			=	0;
			$this->template->content->header_nav->reservation	=	1;
			$this->template->content->header_nav->competition	=	0;
			$this->template->content->header_nav->settings		=	0;
		
			$this->template->content->selectime = $timearr;
			$this->template->content->parcours = $parcours;
			$this->template->content->datefr = $datefr;
			$this->template->content->datefrhide = $datefrhide;
			//$this->template->content->reservations = $reservations;
			$this->template->content->nb_resa = $nb_reservations;
		}	// action_diagramme
	*/	

}