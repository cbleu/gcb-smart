<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Golf_Users extends Controller_Golf_Admin
{

	public function before()
	{
		//////////////////////////////////////////////////////////
		// Parent Creator call									//
		parent::before();		// execute before for parent Class
		//////////////////////////////////////////////////////////

		//////////////////////////////////////////////////////////
		// Set active page in menu
		$this->pages["admin"]["sub"]["users"]['sub']['members']["active"] = true;
		$this->pageTitle = "Liste des usagers";
		// Set breadcrumbs links
		$this->pageBreadcrumbs["admin"]["sub"]["users"]['sub']['members'] = "/admin/users";
		$this->pageBreadcrumbs = array(
			"Accueil" => "/",
			"Admin" => "/admin",
			"Users" => "/admin/users",
		);
		//////////////////////////////////////////////////////////

		$this->init_crud();
	}

	function init_crud()
	{
		//////////////////////////////////////////////////////////
		// CRUD Management										//
		$this->crud = new Oscrud();
		$this->crud->set_table('users');
		$this->crud->fields('firstname','lastname','email','password','adresse','cp','ville','id_pays','indgolf','telephone', 'id_status');
		$this->crud->required_fields('firstname','lastname','email','password');

		$this->crud->set_relation('id_pays','country','nom');
		$this->crud->set_relation('id_status', 'user_status', 'status');

		$this->crud->callback_before_update(array($this,'encrypt_password_callback'));
		$this->crud->callback_before_insert(array($this,'encrypt_password_callback'));
	}

	function make_crud()
	{
		//////////////////////////////////////////////////////////
		// CRUD Management										//

		$this->crud->change_field_type('password','password');

		$this->crud->columns('firstname','lastname','email','id_pays', 'id_status');
		$this->crud->set_subject('Membres');		
		$this->crud
			->display_as('firstname','Prénom')
				->display_as('lastname','Nom')
					->display_as('email','Courriel')
						->display_as('password','Mot de passe')
							->display_as('id_pays','Pays')
								->display_as('cp','Code Postal')
									->display_as('indgolf','Index')
										->display_as('id_status','Status');
											// ->display_as('activated','Activé');
		
		
		
		$this->crud->unset_delete();
		// $this->crud->add_action('Activer', 'fa fa-play txt-color-blue','', 'with-tip', array($this,'activate_user'));
		$this->crud->add_action('Editer', 'fa fa-pencil txt-color-green','', 'with-tip', array($this,'edit_user'));
		$this->crud->add_action('Supprimer', 'fa fa-times txt-color-red', '', 'with-tip', array($this,'delete_user'));

	}

	public function action_index() {
 
		// Set active page in menu
		$this->pages["admin"]["sub"]["users"]['sub']['members']["active"] = true;
		$this->pageTitle = "Liste des usagers";
		// Set breadcrumbs links
		$this->pageBreadcrumbs["admin"]["sub"]["users"]['sub']['members'] = "/admin/users";
		$this->pageBreadcrumbs = array(
			"Accueil" => "/",
			"Admin" => "/admin",
			"Users" => "/admin/users",
		);

		$this->make_crud();

		$this->crud->where('users.id','>','9');
		$this->crud->where('status', '=', 'enable');

		$data = (array)parent::action_list();

		$this->template->content= View::factory('/fragments/admin/crud/list_template',$data);
		$this->template->content->list_view = View::factory('/fragments/admin/crud/list',$data);
	}

	public function action_list()
	{
		HTTP::redirect('/admin/users/');
	}

	public function action_disabled()
	{
		// Set active page in menu
		$this->pages["admin"]["sub"]["users"]['sub']['disabled']["active"] = true;
		$this->pageTitle = "Liste des usagers désactivés";
		// Set breadcrumbs links
		$this->pageBreadcrumbs["admin"]["sub"]["users"]['sub']['members'] = "/admin/users";
		$this->pageBreadcrumbs = array(
			"Accueil" => "/",
			"Admin" => "/admin",
			"Users" => "/admin/users",
		);

		$this->make_crud();
		$this->crud->where('status', '=', 'disable');
		$data = (array)parent::action_list();

		$this->template->content= View::factory('/fragments/admin/crud/list_template',$data);
		$this->template->content->list_view = View::factory('/fragments/admin/crud/list',$data);
	}

	public function action_active()
	{
		$id_user = $this->request->param('id');
		
		$status = DB_SQL::select('default')
			->from('user_status')
				->where('status', '=', 'enable')
					->query();
						
		$enable_status_id = $status[0]['id'];
		
		$user = DB_ORM::model('users');
		$user->id = $id_user;
		$user->load();
	
		if($user->is_loaded()){
			$user->id_status = $enable_status_id;
			$user->save(true);
		}
		
		HTTP::redirect('/admin/users/disabled/');
	}
	
	public function action_add()
	{
		$this->make_crud();

		$this->crud->fields('firstname','lastname','email','password','adresse','cp','ville','id_pays','telephone', 'indgolf', 'id_status');
		
		$data = (array)parent::action_add();
		
		$this->template->content = View::factory('/fragments/admin/crud/add-edit', $data);
	}
	
	public function action_edit()
	{
		$this->make_crud();

		$this->crud->fields('firstname','lastname','email',				'adresse','cp','ville','id_pays','telephone', 'indgolf', 'id_status');

		$data = (array)parent::action_edit();

		$this->template->content = View::factory('/fragments/admin/crud/add-edit',$data);
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
		
		$data = (array)parent::action_delete();

		HTTP::redirect('/admin/users/');
		
		// $this->template = View::factory('/fragments/admin/ajax');
		// $this->template->content = View::factory('/fragments/admin/crud/list_template',$data);
		// $this->template->content->list_view = View::factory('/fragments/admin/crud/list',$data);
	}
	
	public function action_valide()
	{
		$data = (array)parent::action_list();

		$this->template->content = View::factory('/fragments/admin/crud/list_template',$data);
		$this->template->content->list_view = View::factory('/fragments/admin/crud/list',$data);
	}
	
	public function action_ajax_list()
	{
		//disable auto rendering if requested using ajax
		if($this->request->is_ajax()){
			$this->auto_render = FALSE;
		}

		$this->make_crud();

		$this->crud->where('users.id','>','9');
		$this->crud->where('status', '=', 'enable');

		$data = (array)parent::action_ajax_list();
		//print_r($data);
		echo View::factory('/fragments/admin/crud/list',$data);
		
	}
	
	public function action_ajax_list_info()
	{
		//disable auto rendering if requested using ajax
		if($this->request->is_ajax()){
			$this->auto_render = FALSE;
		}
		
		$this->make_crud();

		$this->crud->where('users.id','>','9');
		$this->crud->where('status', '=', 'enable');

		$data = parent::action_ajax_list_info();
		//print_r($data);
		echo json_encode($data);
		
	}
	
	public function action_update()
	{
		// if($this->request->is_ajax()){
			// echo("ajax action_update");
			$this->auto_render = FALSE;
		// }
		$data = (array)parent::action_update();
		
		// echo json_encode($data);
		// HTTP::redirect('/admin/users/');
		// $this->template->content= View::factory('/fragments/admin/crud/list_template',$data);
		// $this->template->content->list_view = View::factory('/fragments/admin/crud/list',$data);
	}
	public function action_update_validation()
	{
		// if($this->request->is_ajax()){
			// echo("ajax action_update_validation");
			$this->auto_render = FALSE;
		// }

		$data = (array)parent::action_update_validation();
		// echo json_encode($data);

		// HTTP::redirect('/admin/users/');

		// $this->crud->pre_render();
		// $validation_result = $this->crud->db_update_validation();
		// $this->crud->validation_layout($validation_result);
	}
	
	public function action_insert()
	{
		$data = (array)parent::action_insert();
		
		HTTP::redirect('/admin/users/');
	}
	
	public function action_success() {

		HTTP::redirect('/admin/users/');

	}

	public function action_activate() {

		HTTP::redirect('/admin/users/');

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
	
	// function activate_user($primary_key , $row)
	// {
	// 	$url = "/admin/users/activate/".$primary_key;
	// 	return $url;
	// }
		
	function edit_user($primary_key , $row)
	{
		$url = "/admin/users/edit/".$primary_key;
		return $url;
	}
		
	function delete_user($primary_key , $row)
	{
		$url = "/admin/users/delete/".$primary_key;
		return $url;
	}
		
	
}