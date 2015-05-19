<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Handles login/logout.
 * Notice that this is the only controller not extending Controller_Main
 * since this is the only page not requiring being logged in
 */
class Controller_Golf_Resavisiteurs extends Controller_Oscrudc
{
	protected $crud = null;
	public $template = null;
	
	public function verify_if_possible($id_demande_reservation) {
		
		$max_joueurs = 4;
		
		if(!($id_demande_reservation > 0)) {
			return false;
		}
		
		$demande_reservation = DB_ORM::model('demande_reservation');
		$demande_reservation->id = $id_demande_reservation;
		$demande_reservation->load();
		
		if($demande_reservation->id > 0 && $demande_reservation->traite != 0) {
			return false;
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
				
		//////////////////////////////////////////////////////////////////////////
		// Vérification de la date de réservation
		//////////////////////////////////////////////////////////////////////////

		$requestDateTime = new DateTime($demande_reservation->date);
		$currentDateTime = new DateTime();

		if($requestDateTime < $currentDateTime) {
			return false;
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
				if($trou_depart == 1) {
					$trou_depart = 10;
					goto retry_trou_depart;
				}
				return false;
			}
		}
		
		return true;
	}

	public function fullname($value, $row) {
		return $row->prenom." ".$row->nom;
	}
	
	public function trous($value, $row) {
		return $row->nb_trous." trous";
	}
	
	public function date_format($value, $row) {
		$date = new DateTime($row->date);
		
		$english = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday',
		'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' );
		
		$french = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche',
		'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
		
		return str_replace($english, $french, $date->format('l d F Y H:i'));
	}
	

	public function actions_buttons($value, $row) {
		$link = "";
				
		//if($this->verify_if_possible($row->id)){
			$link  = '<center><a title="Confirmer" class="with-tip" href="';
			$link .= URL::base('http', FALSE).'golf/reservation/treat/'.$row->id.'">';
			$link .= '<img alt="Confirmer" src="/assets/images/validate.png"></a>';
			$link .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		//}
		//else {
		//	$link .= '<center>';
		//}
		
		//$link .= '<a class="with-tip" title="Editer" href="';
		//$link .= URL::base('http', FALSE).'golf/reservation/edit_resa_visiteur/'.$row->id.'">';
		//$link .= '<img alt="Modifier" src="/assets/img/fugue/pencil.png"></a>';
		//$link .= '&nbsp;&nbsp;&nbsp;&nbsp;';
		
		$link .= '<a class="with-tip delete_object" title="Effacer" href="';
		$link .= URL::base('http', FALSE).'golf/reservation/delete_resa_visiteur/'.$row->id.'">';
		$link .= '<img width="16" height="16" src="/assets/img/fugue/cross-circle.png"></a>';
		
		$link .= '</center>';
		return $link;
	}
	
	public function before() {
		
		if (!Auth::instance()->logged_in()) {
			HTTP::redirect('login');
       	}

		$this->template = 'admin';

        parent::before();
				
		$this->crud = new Oscrud();
		
		$this->crud->set_table('demande_reservation');
		$this->crud->set_subject('Reservations visiteurs');
		$this->crud->columns('Date','Trous', 'Nom', 'email', 'phone', 'nb_joueurs', 'ressources', 'Actions');
		$this->crud->fields('Date', 'Trous', 'Nom', 'email', 'phone', 'nb_joueurs', 'ressources', 'Actions');
		$this->crud->required_fields('nb_trous', 'date', 'nom', 'prenom', 'email', 'phone', 'nb_joueurs', 'ressources');
		$this->crud->where('traite', '=', '0');
		
		$this->crud->callback_column("Actions", array($this, "actions_buttons"));
		$this->crud->callback_column("Nom", array($this, "fullname"));
		$this->crud->callback_column("Trous", array($this, "trous"));
		$this->crud->callback_column("Date", array($this, "date_format"));
		
		//$this->crud->add_action('Confirmer', '/assets/images/validate.png', URL::base('http', FALSE).'golf/reservation/transform/', 'with-tip');
		
		$this->crud->unset_delete();
		$this->crud->unset_edit();
		$this->crud->unset_add();
		$this->crud->unset_export();
		$this->crud->unset_print();
		
		/*$this->crud	
			->display_as('trou_depart', '');
			->display_as('nb_trous',  '');
			->display_as('date', ''); 
			->display_as('nom',  '');
			->display_as('prenom',  '');
			->display_as('email',  '');
			->display_as('phone',  '');
			->display_as('nb_joueurs',  '');
			->display_as('ressources',  '');
			->display_as('traite',  '');*/
    }

	public function action_index() {
        $this->template->title = 'Dashboard';

		$data = (array)parent::action_list();
		//print_r($data);
		$this->template->content= View::factory('/fragments/admin/crud/list_template',$data);
		$this->template->content->list_view = View::factory('/fragments/admin/crud/list',$data);
		$this->template->content->header_nav = View::factory( '/admin/header_nav');
		$this->template->content->header_nav->breadcrumb = $this->get_breadcrumbs();
		$this->template->content->header_nav->home			=	0;
		$this->template->content->header_nav->users			=	0;
		$this->template->content->header_nav->reservation	=	1;
		$this->template->content->header_nav->competition	=	0;
		$this->template->content->header_nav->settings		=	0;
	}
	
	public function action_add() {
		$this->template->title = 'Dashboard';
		
		$data = (array)parent::action_add();
		
		$this->template->content= View::factory('/fragments/admin/crud/add',$data);
		$this->template->content->header_nav = View::factory( '/admin/header_nav');
		$this->template->content->header_nav->breadcrumb = $this->get_breadcrumbs();
		$this->template->content->header_nav->home			=	0;
		$this->template->content->header_nav->users			=	0;
		$this->template->content->header_nav->reservation	=	0;
		$this->template->content->header_nav->competition	=	0;
		$this->template->content->header_nav->settings		=	1;
	}


	public function action_delete() {
		$this->template->title = 'Dashboard';
		
		$data = (array)parent::action_delete();

		$this->template->content= View::factory('/fragments/admin/crud/delete',$data);
		$this->template->content->header_nav = View::factory( '/admin/header_nav');
		$this->template->content->header_nav->breadcrumb = $this->get_breadcrumbs();
		$this->template->content->header_nav->home			=	0;
		$this->template->content->header_nav->users			=	0;
		$this->template->content->header_nav->reservation	=	0;
		$this->template->content->header_nav->competition	=	0;
		$this->template->content->header_nav->settings		=	1;
	}
	
	public function action_edit() {
		$this->template->title = 'Dashboard';
		
		$data = (array)parent::action_edit();

		$this->template->content= View::factory('/fragments/admin/crud/edit',$data);
		$this->template->content->header_nav = View::factory( '/admin/header_nav');
		$this->template->content->header_nav->breadcrumb = $this->get_breadcrumbs();
		$this->template->content->header_nav->home			=	0;
		$this->template->content->header_nav->users			=	0;
		$this->template->content->header_nav->reservation	=	0;
		$this->template->content->header_nav->competition	=	0;
		$this->template->content->header_nav->settings		=	1;
	}
	
	public function action_list() {

        $this->template->title = 'Dashboard';

		$data = (array)parent::action_list();
		//print_r($data);

		$this->template->content= View::factory('/fragments/admin/crud/list_template',$data);
		$this->template->content->list_view = View::factory('/fragments/admin/crud/list',$data);
		$this->template->content->header_nav = View::factory( '/admin/header_nav');
		$this->template->content->header_nav->breadcrumb = $this->get_breadcrumbs();
		$this->template->content->header_nav->home			=	0;
		$this->template->content->header_nav->users			=	0;
		$this->template->content->header_nav->reservation	=	0;
		$this->template->content->header_nav->competition	=	0;
		$this->template->content->header_nav->settings		=	1;
	
	}
	
	public function action_ajax_list() {

		//disable auto rendering if requested using ajax
        if($this->request->is_ajax()){
            $this->auto_render = FALSE;
        }

		$data = (array)parent::action_ajax_list();
		//print_r($data);
		//echo 'toto';
		echo View::factory('/fragments/admin/crud/list',$data);
		
	}
	
	public function action_ajax_list_info(){
		//echo 'ajax_list_info';
		//print_r($_POST);
		//disable auto rendering if requested using ajax
        if($this->request->is_ajax()){
            $this->auto_render = FALSE;
        }
		
		$data = parent::action_ajax_list_info();
		//print_r($data);
		echo json_encode($data);
		
	}
	
	
	public function action_insert() {

		//disable auto rendering if requested using ajax
        if($this->request->is_ajax()){
            $this->auto_render = FALSE;
        }
		$data = (array)parent::action_insert();
		$this->template->content= View::factory('/fragments/admin/crud/insert',$data);
	}
	
}