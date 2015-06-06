<?php defined('SYSPATH') or die('No direct script access.');

/**
* Handles Settings
*
*/
class Controller_Golf_Settings extends Controller_Golf_Admin
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
		$this->pageTitle = "Gestion des paramètres";

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
		$this->crud->set_table('settings');
	}

	function make_crud()
	{
		//////////////////////////////////////////////////////////
		// CRUD Management										//

		$this->crud->fields('key','keyname','value','default','section','description');
		$this->crud->required_fields('key', 'keyname', 'value', 'section');
		$this->crud->columns('keyname','value','default','section','description');
		$this->crud->unset_add_fields('editable');
		$this->crud->unset_edit_fields('editable');

		$this->crud->unset_delete();
		$this->crud->add_action('Editer', 'fa fa-pencil txt-color-green','', 'with-tip', array($this,'edit_path'));
		$this->crud->add_action('Defaut', 'fa fa-undo txt-color-blue', '', '', array($this,'default_path'));

		// $this->crud->add_action('Editer', 'fa fa-pencil txt-color-seagreen fa-fw fa-1x','', 'with-tip', array($this,'edit_user'));
		// $this->crud->add_action('Supprimer', 'fa fa-times txt-color-red', '', 'action-delete with-tip', array($this,'delete_user'));
		// $this->crud->add_action('Désactiver', 'fa fa-pause txt-color-orange fa-fw fa-1x', '', 'action-disable with-tip', array($this,'disable_path'));
		//////////////////////////////////////////////////////////
	}

	public function action_club()
	{
		HTTP::redirect('/admin/settings/');
	}

	public function action_index()
	{
		$statusFilter = 'club';

		// Set active page in menu
		$this->pages["admin"]['sub']['settings']['sub']['club']["active"] = true;
		$this->pageTitle = "Paramètres du club";
		// Set breadcrumbs links
		// $this->pageBreadcrumbs = array(
		// 	"Accueil" => "/",
		// 	"Admin" => "/admin",
		// 	"settings" => "/admin/settings",
		// );

		$this->make_crud();
		
		$this->crud->where('section', '=', $statusFilter);

		$data = (array)parent::action_list();
		$data['statusFilter'] = $statusFilter;

		$this->template->content= View::factory('/fragments/admin/crud/list_template',$data);
		$this->template->content->list_view = View::factory('/fragments/admin/crud/list',$data);
	}
	
	public function action_parcours()
	{
		$statusFilter = 'parcours';

		// Set active page in menu
		$this->pages["admin"]['sub']['settings']['sub']['parcours']["active"] = true;
		$this->pageTitle = "Paramètres du parcours";
		// Set breadcrumbs links
		// $this->pageBreadcrumbs = array(
		// 	"Accueil" => "/",
		// 	"Admin" => "/admin",
		// 	"settings" => "/admin/settings",
		// );

		$this->make_crud();
		
		$this->crud->where('section', '=', $statusFilter);

		$data = (array)parent::action_list();
		$data['statusFilter'] = $statusFilter;

		$this->template->content= View::factory('/fragments/admin/crud/list_template',$data);
		$this->template->content->list_view = View::factory('/fragments/admin/crud/list',$data);
	}
	
	public function action_display()
	{
		$statusFilter = 'display';

		// Set active page in menu
		$this->pages["admin"]['sub']['settings']['sub']['display']["active"] = true;
		$this->pageTitle = "Paramètres de l'affichage";
		// Set breadcrumbs links
		// $this->pageBreadcrumbs = array(
		// 	"Accueil" => "/",
		// 	"Admin" => "/admin",
		// 	"settings" => "/admin/settings",
		// );

		$this->make_crud();
		
		$this->crud->where('section', '=', $statusFilter);

		$data = (array)parent::action_list();
		$data['statusFilter'] = $statusFilter;

		$this->template->content= View::factory('/fragments/admin/crud/list_template',$data);
		$this->template->content->list_view = View::factory('/fragments/admin/crud/list',$data);
	}
	
	public function action_superadmin()
	{
		if(!$this->isSuperAdmin){
			HTTP::redirect('/admin/settings/');
		}

		$statusFilter = 'app';

		// Set active page in menu
		$this->pages["admin"]['sub']['settings']['sub']['superadmin']["active"] = true;
		$this->pageTitle = "Super Admin";
		// Set breadcrumbs links
		// $this->pageBreadcrumbs = array(
		// 	"Accueil" => "/",
		// 	"Admin" => "/admin",
		// 	"settings" => "/admin/settings",
		// );

		$this->make_crud();
		
		$this->crud->where('section', '=', $statusFilter);

		$data = (array)parent::action_list();
		$data['statusFilter'] = $statusFilter;

		// $this->template->content= View::factory('/fragments/admin/crud/list_template',$data);
		// $this->template->content->list_view = View::factory('/fragments/admin/crud/list',$data);
		$this->template = View::factory('/fragments/admin/crud/list',$data);
		// $this->template->content = $data->list;
	}
	
	public function action_list()
	{
		HTTP::redirect('/admin/settings/');
	}

	public function action_ajax_list()
	{
		$statusFilter = $this->request->param('id');

		// $this->template = View::factory('empty');

		//disable auto rendering if requested using ajax
		// if($this->request->is_ajax()){
			$this->auto_render = FALSE;
		// }

		$this->make_crud();

		$this->crud->where('section', '=', $statusFilter);
		
		$data = (array)parent::action_ajax_list();
		
		echo View::factory('/fragments/admin/crud/list',$data);
	}

	public function action_ajax_list_info()
	{
		$statusFilter = $this->request->param('id');

		//disable auto rendering
		$this->auto_render = FALSE;
		
		$this->make_crud();

		$this->crud->where('section', '=', $statusFilter);
		
		$data = parent::action_ajax_list_info();

		echo json_encode($data);
	}

	public function action_add()
	{
		$this->pages['admin']['sub']['settings']['active'] = true;
		$this->pageTitle = "Paramètres du club";

		$this->make_crud();

		$data = (array)parent::action_add();
		
		$this->template->content= View::factory('/fragments/admin/crud/add-edit',$data);
	}
	public function action_insert()
	{
		$this->make_crud();

		$data = (array)parent::action_insert();

		HTTP::redirect('/admin/settings/');
	}
	
	function edit_path($primary_key , $row)
	{
		$url = "/admin/settings/edit/".$primary_key;
		return $url;
	}

	public function action_edit()
	{
		$this->make_crud();

		$data = (array)parent::action_edit();
		
		$this->template->content= View::factory('/fragments/admin/crud/add-edit',$data);
	}

	public function action_update()
	{
		$this->make_crud();

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