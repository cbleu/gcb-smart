<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Handles login/logout.
 * Notice that this is the only controller not extending Controller_Main
 * since this is the only page not requiring being logged in
 */
class Controller_Golf_Departs extends Controller_Oscrudc
{
	protected $crud = null;
	public $template = null;
	public $menu = '';
	
		
	public function before() {
		
		if (!Auth::instance()->logged_in('admin')) {
            HTTP::redirect('login');
       	}

		$this->template = 'admin';

        parent::before();

		$this->template->content = View::factory( '/admin/content');
		$this->template->content->header_nav = View::factory( '/admin/header_nav');
		$this->template->content->header_nav->breadcrumb = $this->get_breadcrumbs();
	}
	
	public function after()
	{
		Session::instance()->set('affected_ids', array());

		parent::after();
	}


	public function action_jour() {
        $this->template->title = 'Dashboard';

		$date = $this->request->param('id');
		
		//$date = "2013-03-20";
		
		$heure_debut = Arr::get($_GET, 'heure_debut');
		$heure_fin = Arr::get($_GET, 'heure_fin');
		
		// On récupère les horaires d'ouverture et de fermeture ainsi que l'interval de réservation
		$golf = DB_ORM::model('Golf');
		$golf->id = 1;
		$golf->load();
		
		$beginTime 	= new DateTime($golf->heure_ouverture);
		$endTime 	= new DateTime($golf->heure_fermeture);
		
		$t = new DateTime($golf->heure_ouverture);

		$hours = array();
		while($t <= $endTime) {
			$timeStr = $t->format('H:i');
			array_push($hours, $timeStr);
			$t->add(new DateInterval('PT'.$golf->intervalle.'M'));
		}
		
		if($date == NULL || $date == "") {
			$date = date('Y-m-d');
		}
		
		if($heure_debut == NULL || $heure_debut == "") {
			$heure_debut = $beginTime->format("H:i");
		}
		
		if($heure_fin == NULL || $heure_fin == "") {
			$heure_fin = $endTime->format("H:i");
		}
		
		//$timeStr = substr($timeStr, 0, -1);
		
		$reservations = DB_SQL::select('default')
						->from("reservation")
						->column("reservation.date_reservation", "date_reservation")
						->column("users_has_reservation.info", "info")
						->column("users.id", "user_id")
						->column("users.firstname", "firstname")
						->column("users.lastname", "lastname")
						->column("users.indgolf", "indice")
						->column("users.username", "username")
						->column("type_parcours.trou_depart", "trou_depart")
						->column("users_has_reservation.id", "id_user_has_reservation")
						->join(NULL, 'type_parcours')
						->on('type_parcours.id', '=', 'reservation.id_type_parcours')
						->join(NULL, 'users_has_reservation')
						->on("users_has_reservation.id_reservation", "=", 'reservation.id')
						->join(NULL, 'users')
						->on("users.id", "=", 'users_has_reservation.id_users')
						->where("date_reservation", ">=", $date." ".$heure_debut.":00")
						->where("date_reservation", "<=", $date." ".$heure_fin.":00", "AND");
						
		//echo $reservations->statement();				
						
		$reservations = $reservations->query();
		
		$reservations_by_hour = array();
		
		// Remplisage du tableau hoursIntervals en fonction des horraires d'ouverture et de fermeture du golf et de l'interval
		$timeStr = "";
		
		$hm = explode(":", $heure_debut);
		$beginTime->setTime($hm[0], $hm[1]);
		
		$hm = explode(":", $heure_fin);
		$endTime->setTime($hm[0], $hm[1]);

		while($beginTime <= $endTime) {
			$timeStr = $beginTime->format($date.' H:i:s');
			//echo $timeStr;
			$reservations_by_hour[$timeStr] = array();
			$beginTime->add(new DateInterval('PT'.$golf->intervalle.'M'));
		}
		
		$evenements = DB_SQL::select('default')
			->from('evenements')
			->where('date_debut', '>=', $date." 00:00:00")
			->where('date_debut', '<=', $date." 23:59:59", 'AND')
			->query()
			->as_array();
		
		foreach($reservations as $reservation) {
			
			$key = $reservation["date_reservation"];
			
			$ressources = DB_SQL::select('default')
						->from("user_reservation_ressources")
						->join(NULL, "ressources")
						->on("user_reservation_ressources.id_ressources", "=", "ressources.id")
						->where("user_reservation_ressources.id_user_has_reservation", "=", $reservation['id_user_has_reservation'])
						->query();
			
			$reservation['ressource'] = $ressources[0]['ressource'];
			
			/*if($reservation['id_demande_reservation'] > 0) {
				$demande_reservation 		= DB_ORM::model('demande_reservation');
				$demande_reservation->id 	= $reservation['id_demande_reservation'];
				$demande_reservation->load();
				
				
			}*/
			
			
			
			// Permet de ne pas ajouter les dummy reservations (évènements)
			foreach($evenements as $evenement) {
				$event_start_date = strtotime($evenement['date_debut']);
				$event_end_date = strtotime($evenement['date_fin']);
				$resa_date = strtotime($key);
				
				if($resa_date >= $event_start_date && $resa_date < $event_end_date && $reservation["trou_depart"] == $evenement['trou_depart']) {
					
					$add = true;
					
					if(count($reservations_by_hour[$key]) != 0) {
						foreach($reservations_by_hour[$key] as $ev) {
							/*echo "<pre>";
							print_r($ev);
							echo "</pre>";*/
							if(array_key_exists('trou', $ev) && $ev['trou'] == $evenement['trou_depart']) {
								$add = false;
							}
						}
					}
					
					if($add) {
						array_push($reservations_by_hour[$key], array("intitule" => $evenement['intitule'], "trou" => $evenement['trou_depart']));
					}
					continue 2;
				}
			}
			
			
			/*if(!array_key_exists($key, $reservations_by_hour)) {
				$reservations_by_hour[$key] = array();
			}*/
			
			array_push($reservations_by_hour[$key], $reservation);
		}
		
		/*$toremove = array();
		foreach($evenements as $evenement) {
			$event_start_date = strtotime($evenement['date_debut']);
			$event_end_date = strtotime($evenement['date_fin']);
			
			foreach($reservations_by_hour as $key => $obj) {
				
				//echo $key."<br />";
				$resa_date = strtotime($key);
				//echo $event_start_date." - ".$event_end_date." - ".$resa_date."<br />";
				if($resa_date >= $event_start_date  && $resa_date <= $event_end_date) {
					array_push($toremove, $key);
					//unset($reservations_by_hour[$key]);
				}
			}
		}
		
		print_r($toremove);*/
		
		/*echo "<pre>";
		print_r($reservations_by_hour);
		echo "</pre>";*/
			
		$date_aff = substr($date,8,2).'/'.substr($date,5,2).'/'.substr($date,0,4);
		$this->template->content= View::factory( '/admin/departs/departs');
		$this->template->content->req_date	 = $date_aff;
		$this->template->content->header_nav = View::factory( '/admin/header_nav');
		$this->template->content->header_nav->breadcrumb = $this->get_breadcrumbs();
		
		$this->template->content->datepicker = View::factory('/admin/departs/depart_du_jour_datepicker');
		$this->template->content->datepicker->req_date	 = $date;
		
		$this->template->content->header_nav->home			=	0;
		$this->template->content->header_nav->users			=	0;
		$this->template->content->header_nav->reservation	=	1;
		$this->template->content->header_nav->competition	=	0;
		$this->template->content->header_nav->settings		=	0;
		
		$this->template->content->reservations_by_hour		= $reservations_by_hour;
		$this->template->content->heure_debut 				= $heure_debut;
		$this->template->content->heure_fin 				= $heure_fin;
		$this->template->content->hours						= $hours;
		
	}
		
}