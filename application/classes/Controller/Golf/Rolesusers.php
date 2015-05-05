<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Handles Roles
 *
 */
class Controller_Golf_Rolesusers extends Controller_Golf_Admin
{
	
	public function before()
	{
		//////////////////////////////////////////////////////////
		// Parent Creator call									//
		parent::before();		// execute before for parent Class
		//////////////////////////////////////////////////////////

		//////////////////////////////////////////////////////////
		// Set active page in menu								//
		$this->pages["admin"]['sub']['users']["active"] = true;
		$this->pageTitle = "Gestion des roles";

		//////////////////////////////////////////////////////////
		// Init crud object
		$this->crud = new Oscrud();
		$this->crud->set_table('user_roles');
		$this->crud->set_subject('Affectation des roles');
		$this->crud->fields('role_id','user_id');
		$this->crud->required_fields('role_id','user_id');

		$this->crud->columns('role_id','user_id');
		$this->crud
			->display_as('user_id','Utilisateur')
				->display_as('role_id','Role');
			
		$this->crud->set_relation('user_id','users','email');	
		$this->crud->set_relation('role_id','roles','description');	
		//////////////////////////////////////////////////////////
	}

	public function action_index()
	{
		// Set active page in menu
		$this->pages["admin"]['sub']['users']['sub']['roles-set']["active"] = true;
		$this->pageTitle = "Roles des usagers";
		// Set breadcrumbs links
		$this->pageBreadcrumbs = array(
			"Accueil" => "/",
			"Admin" => "/admin",
			"users" => "/admin/users",
		);

		$data = (array)parent::action_list();

		$this->template->content= View::factory('/fragments/admin/crud/list_template',$data);
		$this->template->content->list_view = View::factory('/fragments/admin/crud/list',$data);
	}
	
	public function action_list()
	{
		// Set active page in menu
		$this->pages["admin"]['sub']['Role']["active"] = true;
		$this->pageTitle = "Roles des usagers";

		$data = (array)parent::action_list();

		$this->template->content= View::factory('/fragments/admin/crud/list_template',$data);
		$this->template->content->list_view = View::factory('/fragments/admin/crud/list',$data);
	}

	public function action_ajax_list()
	{
		$this->template = View::factory('empty');

		//disable auto rendering if requested using ajax
		if($this->request->is_ajax()){
			$this->auto_render = FALSE;
		}

		$data = (array)parent::action_ajax_list();
		// echo json_encode($data);
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
	
	public function action_delete()
	{
		//disable auto rendering if requested using ajax
		if($this->request->is_ajax()){
			$this->auto_render = FALSE;
		}
		
		$data = (array)parent::action_delete();

		HTTP::redirect('/admin/rolesusers/');
		
		$data = (array)parent::action_delete();
	}
	
	public function action_add() {
		$this->template->title = 'Dashboard';
		
		$data = (array)parent::action_add();
		
		$this->template->content= View::factory('/fragments/admin/crud/add-edit',$data);
	}
	
	public function action_edit() {
		$this->template->title = 'Dashboard';
		
		$data = (array)parent::action_edit();

		$this->template->content= View::factory('/fragments/admin/crud/add-edit',$data);
	}
	
	public function action_success()
	{

		$data = (array)parent::action_list();
		//print_r($data);

		$this->template->content= View::factory('/fragments/admin/crud/list_template',$data);
		$this->template->content->list_view = View::factory('/fragments/admin/crud/list',$data);
	}
	
	public function action_update() {

		//disable auto rendering if requested using ajax
		if($this->request->is_ajax()){
			$this->auto_render = FALSE;
		}
		$data = (array)parent::action_update();
		
		$this->template->content= View::factory('/fragments/admin/crud/update',$data);
	}
	
	public function action_insert() {

		//disable auto rendering if requested using ajax
		if($this->request->is_ajax()){
			$this->auto_render = FALSE;
		}
		$data = (array)parent::action_insert();
		$this->template->content= View::factory('/fragments/admin/crud/insert',$data);
	}
	
	public function action_insert_validation() {

		//disable auto rendering if requested using ajax
		if($this->request->is_ajax()){
			$this->auto_render = FALSE;
		}
		$data = (array)parent::action_insert_validation();
		$this->template->content= View::factory('/fragments/admin/crud/insert',$data);
	}
	
}