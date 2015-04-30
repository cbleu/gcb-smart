<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Golf_Events extends Controller_Oscrudc {

    public function before() {
	
		if (!Auth::instance()->logged_in()) {
            HTTP::redirect('login');
       	}
		
		if (!Auth::instance()->logged_in('admin')) {
            HTTP::redirect('/');
       	}
	
	 	$this->template = 'admin';
	
        parent::before();

		$this->crud = new Oscrud();
		
		$this->crud->set_table('evenements');
		$this->crud->set_subject('Liste des évènements');
		$this->crud->columns('intitule', 'date_debut', 'date_fin', 'trou_depart');
		$this->crud->fields('intitule', 'date_debut', 'date_fin', 'trou_depart');
		
		$this->crud->unset_edit();
		$this->crud->unset_export();
		$this->crud->unset_print();
		
    }

	public function action_list() {
		$this->template->title = 'Dashboard';

		$data = (array)parent::action_list();
		//print_r($data);
		$this->template->content							= View::factory('/admin/crud/list_template',$data);
		$this->template->content->list_view 				= View::factory('/admin/crud/list',$data);
		$this->template->content->header_nav 				= View::factory( '/admin/header_nav');
		$this->template->content->header_nav->breadcrumb 	= $this->get_breadcrumbs();
		$this->template->content->header_nav->home			=	0;
		$this->template->content->header_nav->users			=	0;
		$this->template->content->header_nav->reservation	=	1;
		$this->template->content->header_nav->competition	=	0;
		$this->template->content->header_nav->settings		=	0;
		
	}
	
	public function action_ajax_list() {

		//disable auto rendering if requested using ajax
        if($this->request->is_ajax()){
            $this->auto_render = FALSE;
        }

		$data = (array)parent::action_ajax_list();

		echo View::factory('/admin/crud/list',$data);
	}
	
	public function action_ajax_list_info(){
		
		//disable auto rendering if requested using ajax
        if($this->request->is_ajax()){
            $this->auto_render = FALSE;
        }
		
		$data = parent::action_ajax_list_info();
		
		echo json_encode($data);
	}

	public function action_update_ajax() {
		$this->auto_render = FALSE;

		$method = $_POST;
		$ev = Arr::get($method, 'event');

		$success = array("success" => true,
						 "message" => "");

		if( $ev["text"] == NULL 	|| $ev["colour"] == NULL	|| $ev["start_date"] == NULL 	|| $ev["end_date"] == NULL 	||
			$ev["text"] == ""		|| $ev["colour"] == ""		|| $ev["start_date"] == ""		|| $ev["end_date"] == "") {

			$success["success"] = false;
			$success["message"] = "Erreur ! Paramètre manquant";
			goto END;
		}

		$start_date = new DateTime($ev["start_date"]);
		$end_date = new DateTime($ev["end_date"]);

		$evenement = DB_ORM::model('evenements');
		$evenement->id = $ev["id"];
		$evenement->load();

		$evenement->intitule 	 = $ev["text"];
		$evenement->couleur 	 = $ev["colour"];
		$evenement->date_debut 	 = $start_date->format('Y-m-d H:i:s');
		$evenement->date_fin 	 = $end_date->format('Y-m-d H:i:s');
		
		if($ev["rec_type"] != NULL && $ev["rec_type"] != "") {

			$evenement->event_length = $ev["event_length"];
			$evenement->rec_type 	 = $ev["rec_type"];
			$evenement->event_pid	 = $ev["event_pid"];
		}

		$evenement->save(true);

	END:

		echo json_encode($success);

	}

	public function action_insert_ajax() {
		$this->auto_render = FALSE;

		$method = $_POST;
		$ev = Arr::get($method, 'event');

		$success = array("success" => true,
						 "message" => "");

		if( $ev["text"] == NULL 	|| $ev["colour"] == NULL	|| $ev["start_date"] == NULL 	|| $ev["end_date"] == NULL 	|| $ev["trou_depart"] == NULL ||
			$ev["text"] == ""		|| $ev["colour"] == ""	|| $ev["start_date"] == ""		|| $ev["end_date"] == ""	|| $ev["trou_depart"] == "") {

			$success["success"] = false;
			$success["message"] = "Erreur ! Paramètre manquant";
			goto END;
		}

		$trous = explode(',', $ev['trou_depart']);

		$start_date = new DateTime($ev["start_date"]);
		$end_date = new DateTime($ev["end_date"]);

		$golf = DB_ORM::model('Golf');
		$golf->id = 1;
		$golf->load();

		foreach($trous as $trou) {

			$evenement 				= DB_ORM::model('evenements');

			$evenement->intitule 	 = $ev["text"];
			$evenement->couleur 	 = $ev["colour"];
			$evenement->date_debut 	 = $start_date->format('Y-m-d H:i:s');
			$evenement->date_fin 	 = $end_date->format('Y-m-d H:i:s');
			$evenement->golf_id 	 = 1;
			$evenement->trou_depart	 = $trou;

			if($ev["rec_type"] != NULL && $ev["rec_type"] != "") {
				$evenement->event_length = $ev["event_length"];
				$evenement->rec_type 	 = $ev["rec_type"];
				$evenement->event_pid	 = $ev["event_pid"];
			}

			$evenement->save(true);
		}

	END:

		echo json_encode($success);

	}

	public function action_delete() {
		$this->auto_render = FALSE;

		parent::action_delete();
	}

	/* 
	//If we remove OSCRUD in the future we can use this function to delete
	public function action_delete_ajax() {
		$this->auto_render = FALSE;

		$method = $_POST;
		$id = Arr::get($method, 'id');

		$success = array("success" => true,
						 "message" => "");

		$evenement = DB_ORM::model('evenements');
		$evenement->id = $id;
		$evenement->delete();

		echo json_encode($success);
	}
	*/
	
}