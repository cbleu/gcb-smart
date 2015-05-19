<?php defined('SYSPATH') or die('No direct script access.');

/**
* Handles Settings
*
*/
class Controller_Golf_GolfClub extends Controller_Golf_Admin
{
	
	public function before()
	{

		//////////////////////////////////////////////////////////
		// Parent Creator call									//
		parent::before();		// execute before for parent Class
		//////////////////////////////////////////////////////////

		//////////////////////////////////////////////////////////
		// Set active page in menu
		$this->pages["admin"]['sub']['settings']["active"] = true;
		$this->pageTitle = "Gestion du club";

		// Set breadcrumbs links
		$this->pageBreadcrumbs = array(
			"Accueil" => "/",
			"Admin" => "/admin",
			"Settings" => "/admin/settings",
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
		$this->crud->set_table('golf');
	}

	function make_crud()
	{
		//////////////////////////////////////////////////////////
		// CRUD Management										//

		$this->crud->set_subject('Golf');

		// $this->crud->fields('key','keyname','value','default','description');
		// $this->crud->required_fields('key', 'keyname', 'value');
		// $this->crud->columns('keyname','value','default','description');

		$this->crud->unset_columns('adresse', 'cp', 'ville', 'pays', 'smtp_password');

		$this->crud->unset_delete();
		$this->crud->unset_add();
		$this->crud->add_action('Editer', 'fa fa-pencil txt-color-green','', 'with-tip', array($this,'edit_path'));
		$this->crud->add_action('Defaut', 'fa fa-undo txt-color-blue', '', '', array($this,'default_path'));

		// $this->crud->add_action('Editer', 'fa fa-pencil txt-color-seagreen fa-fw fa-1x','', 'with-tip', array($this,'edit_user'));
		// $this->crud->add_action('Supprimer', 'fa fa-times txt-color-red', '', 'action-delete with-tip', array($this,'delete_user'));
		// $this->crud->add_action('Désactiver', 'fa fa-pause txt-color-orange fa-fw fa-1x', '', 'action-disable with-tip', array($this,'disable_path'));
		//////////////////////////////////////////////////////////
	}

	public function action_index()
	{
		// Set active page in menu
		$this->pages["admin"]['sub']['settings']['sub']['club']["active"] = true;
		$this->pageTitle = "Paramètres du club";

		$this->make_crud();
		
		$data = (array)parent::action_list();

		$this->template->content= View::factory('/fragments/admin/crud/list_template',$data);
		$this->template->content->list_view = View::factory('/fragments/admin/crud/list',$data);
	}
	
	public function action_list()
	{
		HTTP::redirect('/golf/');
	}

	public function action_ajax_list()
	{
		$this->template = View::factory('empty');

		//disable auto rendering if requested using ajax
		if($this->request->is_ajax()){
			$this->auto_render = FALSE;
		}

		$data = (array)parent::action_ajax_list();
		echo View::factory('/fragments/admin/crud/list',$data);
	}

	public function action_ajax_list_info()
	{
		//disable auto rendering if requested using ajax
		if($this->request->is_ajax()){
			$this->auto_render = FALSE;
		}
		
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

		HTTP::redirect('/admin/settings/');
	}
	
	function edit_path($primary_key , $row)
	{
		$url = "/golf/edit/".$primary_key;
		return $url;
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

	}

	function default_path($primary_key , $row)
	{
		$url = "/admin/settings/default/".$primary_key;
		return $url;
	}

	public function action_default()
	{
		// $data = (array)parent::action_delete();

		HTTP::redirect('/admin/settings/');
	}


}