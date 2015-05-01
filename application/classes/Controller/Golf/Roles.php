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
		$this->template = View::factory('egp_template');
		$this->template->konotif = Notify::render();
		 
		Helpers_Stylesheet::add('/assets/css/easygolfpack/egp_main.css');

		//////////////////////////////////////////////////////////
		// Set active page in menu
		$this->pages["admin"]['sub']['users']["active"] = true;
		$this->pageTitle = "Gestion des roles";

		//////////////////////////////////////////////////////////
		// Init crud object
		//////////////////////////////////////////////////////////
		$this->crud = new Oscrud();
		$this->crud->set_table('roles');
		$this->crud->set_subject('Roles');
		//$crud->unset_columns('productDescription');
		//$crud->callback_column('buyPrice',array($this,'valueToEuro'));
		//////////////////////////////////////////////////////////
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
		$this->template->content->header_nav->reservation	=	0;
		$this->template->content->header_nav->competition	=	0;
		$this->template->content->header_nav->settings		=	1;
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
	
	public function action_edit() {
		$this->template->title = 'Dashboard';
		
		$data = (array)parent::action_edit();
		//print_r($data);
		
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
}