<?php defined('SYSPATH') or die('No direct script access.');

/**
* Handles login/logout.
* Notice that this is the only controller not extending Controller_Main
* since this is the only page not requiring being logged in
*/
// class Controller_Golf_Membres extends Controller_Oscrudc
class Controller_Golf_Membres extends Controller_EGP_Main
{
	protected $crud = null;
	public $template = null;
	

	public function before()
	{
	
		parent::before();

		if(!$this->isAdmin){
			Notify::msg("Vous devez être administrateur !", 'warning');
			HTTP::redirect('/');
		}
		
		// ------------------------------------------------------------------------------
		// ------------------------------------------------------------------------------
		// ------------------------------------------------------------------------------

		$this->template = View::factory('EGP/egp_template');		// Set the template as /views/public.php

		$this->template->konotif = Notify::render();
		 
		Helpers_Stylesheet::add('/assets/css/easygolfpack/egp_main.css');

				
		$this->crud = new Oscrud();
		$this->crud->set_table('users');
		$this->crud->set_subject('Membres');

		$this->crud->columns('firstname','lastname','email','id_pays', 'id_status');
		
		$this->crud->fields('firstname','lastname','email','password','adresse','cp','ville','id_pays','indgolf','telephone', 'id_status');
		$this->crud->required_fields('firstname','lastname','email','password');
		
		$this->crud->set_relation('id_pays','pays','nom');
		
		$this->crud->change_field_type('password','password');
		
		
		$this->crud
			->display_as('firstname','Prénom')
				->display_as('lastname','Nom')
					->display_as('email','Courriel')
						->display_as('password','Mot de passe')
							->display_as('id_pays','Pays')
								->display_as('id_status','Status')
									->display_as('activated','Activé')
										->display_as('cp','Code Postal');
		
		$this->crud->callback_before_update(array($this,'encrypt_password_callback'));
		$this->crud->callback_before_insert(array($this,'encrypt_password_callback'));
		
		$this->crud->where('users.id','>','1');
		
		$this->crud->set_relation('id_status', 'user_status', 'status');
		$this->crud->where('status', '=', 'enable');
		
		$this->crud->unset_delete();
		// $this->crud->add_action('Supprimer', '/assets/img/fugue/cross-circle.png', '', 'with-tip', array($this,'delete_user'));
		$this->crud->add_action('Editer', 'fa fa-pencil txt-color-green','', 'with-tip', array($this,'edit_user'));
		$this->crud->add_action('Supprimer', 'fa fa-times txt-color-red', '', 'with-tip', array($this,'delete_user'));
		
	}


	public function action_index() {
 
		$data = (array)parent::action_list();
				
		$this->template->content= View::factory('/fragments/admin/crud/list_template',$data);
		$this->template->content->list_view = View::factory('/fragments/admin/crud/list',$data);
	}
	
	public function action_add() {
		
		$this->crud->set_relation('id_pays','pays','nom');
		$this->crud->set_relation('id_status', 'user_status', 'name');

		$this->crud->fields('firstname','lastname','email','password','adresse','cp','ville','id_pays','indgolf', 'id_status');

		$this->crud->display_as('id_pays','Pays');
		$this->crud->display_as('cp','Code Postal');
		$this->crud->display_as('indgolf','Index');
		
		
		$data = (array)parent::action_add();
		
		$this->template->content = View::factory('/fragments/admin/crud/add-edit', $data);
	}
	
	public function action_edit() {
		
		$this->crud->set_relation('id_pays','pays','nom');	

		$this->crud->fields('firstname','lastname','email','indgolf','adresse','cp','ville','id_pays','telephone');

		$this->crud->display_as('id_pays','Pays');
		$this->crud->display_as('cp','Code Postal');
		$this->crud->display_as('indgolf','Index');

		$data = (array)parent::action_edit();

		$this->template->content = View::factory('/fragments/admin/crud/add-edit',$data);
	}
	
	public function action_list()
	{

		$data = (array)parent::action_list();

		$this->template->content= View::factory('/fragments/admin/crud/list_template',$data);
		$this->template->content->list_view = View::factory('/fragments/admin/crud/list',$data);
	
	}
	
	public function action_delete() {
		
		$id_user = $this->request->param('id');
		
		$status = DB_SQL::select('default')
			->from('user_status')
				->where('status', '=', 'disable')
					->query();
						
		$disable_status_id = $status[0]['id'];
		
		$user = DB_ORM::model('users');
		$user->id = $id_user;
		$user->load();
	
		if($user->is_loaded()){
			$user->id_status = $disable_status_id;
			$user->save(true);
		}
		
		HTTP::redirect('/golf/membres/');
		
		$data = (array)parent::action_delete();
		
		$this->template = View::factory('admin/ajax');
		$this->template->content = View::factory('/fragments/admin/crud/list_template',$data);
		$this->template->content->list_view = View::factory('/fragments/admin/crud/list',$data);
	}
	
	public function action_valide() {

		$this->template->title = 'Dashboard';

		$data = (array)parent::action_list();

		$this->template->content = View::factory('/fragments/admin/crud/list_template',$data);
		$this->template->content->list_view = View::factory('/fragments/admin/crud/list',$data);
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
	
	public function action_update()
	{
		$data = (array)parent::action_update();
		
		HTTP::redirect('/golf/Membres/list');
	}
	
	public function action_insert()
	{
		$data = (array)parent::action_insert();
		
		HTTP::redirect('/golf/Membres/list');
	}
	
	public function action_success() {

		HTTP::redirect('/golf/Membres/list');

		// $data = (array)parent::action_list();
		//
		// $this->template->content= View::factory('/fragments/admin/crud/list_template',$data);
		// $this->template->content->list_view = View::factory('/fragments/admin/crud/list',$data);
	}

	function encrypt_password_callback($post_array, $primary_key = null) {

		//Encrypt password only if is not empty. Else don't change the password to an empty field
		if(!empty($post_array['password']))
		{
			$post_array['password'] = Auth::instance()->hash_password($post_array['password']);
		}
		else
		{
			unset($post_array['password']);
		}

		return $post_array;
	}
	
	function edit_user($primary_key , $row)
	{
		$url = "/golf/membres/edit/".$primary_key;
		return $url;
	}
		
	function delete_user($primary_key , $row)
	{
		$url = "/golf/membres/delete/".$primary_key;
		return $url;
	}
		
	
}