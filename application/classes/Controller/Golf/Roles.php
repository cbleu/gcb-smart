<?php defined('SYSPATH') or die('No direct script access.');

/**
* Handles Roles
*
*/
class Controller_Golf_Roles extends Controller_Golf_Admin
{
	
	public function before()
	{

		//////////////////////////////////////////////////////////
		// Parent Creator call									//
		parent::before();		// execute before for parent Class
		//////////////////////////////////////////////////////////

		//////////////////////////////////////////////////////////
		// Set active page in menu
		$this->pages["admin"]['sub']['users']["active"] = true;
		$this->pageTitle = "Gestion des roles";

		// Set breadcrumbs links
		$this->pageBreadcrumbs = array(
			"Accueil" => "/",
			"Admin" => "/admin",
			"Users" => "/admin/users",
		);
		//////////////////////////////////////////////////////////

		//////////////////////////////////////////////////////////
		// Init crud object										//
		$this->init_crud();
		//////////////////////////////////////////////////////////

	}

	function init_crud()
	{
		//////////////////////////////////////////////////////////
		// CRUD Management										//
		$this->crud = new Oscrud();
		$this->crud->set_table('roles');
	}

	function make_crud()
	{
		//////////////////////////////////////////////////////////
		// CRUD Management										//

		$this->crud->change_field_type('password','password');

		// $this->crud->columns('firstname','lastname','email','id_pays', 'id_status');
		$this->crud->set_subject('Roles');
		
		$this->crud->unset_delete();
		$this->crud->add_action('Editer', 'fa fa-pencil txt-color-green','', 'with-tip', array($this,'edit_path'));
		$this->crud->add_action('Supprimer', 'fa fa-times txt-color-red', '', 'with-tip', array($this,'delete_path'));
		//////////////////////////////////////////////////////////
	}

	public function action_index()
	{
		// Set active page in menu
		$this->pages["admin"]['sub']['users']['sub']['roles-list']["active"] = true;
		$this->pageTitle = "Listing des roles";
		// Set breadcrumbs links
		$this->pageBreadcrumbs = array(
			"Accueil" => "/",
			"Admin" => "/admin",
			"users" => "/admin/users",
		);

		$this->make_crud();

		$data = (array)parent::action_list();
		$data['statusFilter'] = null;

		$this->template->content= View::factory('/fragments/admin/crud/list_template',$data);
		$this->template->content->list_view = View::factory('/fragments/admin/crud/list',$data);
	}
	
	public function action_list()
	{
		HTTP::redirect('/admin/roles/');
	}

	public function action_ajax_list()
	{
		// $this->template = View::factory('empty');

		//disable auto rendering if requested using ajax
		// if($this->request->is_ajax()){
			$this->auto_render = FALSE;
		// }

		$data = (array)parent::action_ajax_list();

		echo View::factory('/fragments/admin/crud/list',$data);
	}

	public function action_ajax_list_info()
	{
		//disable auto rendering if requested using ajax
		// if($this->request->is_ajax()){
			$this->auto_render = FALSE;
		// }
		
		$data = parent::action_ajax_list_info();

		echo json_encode($data);
	}

	public function action_add()
	{
		$data = (array)parent::action_add();
		
		$this->template->content= View::factory('/fragments/admin/crud/add-edit',$data);
	}
	public function action_insert()
	{
		$data = (array)parent::action_insert();

		HTTP::redirect('/admin/roles/');
	}
	
	public function action_edit()
	{
		$data = (array)parent::action_edit();
		
		$this->template->content= View::factory('/fragments/admin/crud/add-edit',$data);
	}

	public function action_update()
	{
		$this->auto_render = FALSE;

		$data = (array)parent::action_update();

		// HTTP::redirect('/admin/roles/');
	}

	public function action_delete()
	{
		$data = (array)parent::action_delete();

		HTTP::redirect('/admin/roles/');
	}

	function edit_path($primary_key , $row)
	{
		$url = "/admin/roles/edit/".$primary_key;
		return $url;
	}
		
	function delete_path($primary_key , $row)
	{
		$url = "/admin/roles/delete/".$primary_key;
		return $url;
	}

}