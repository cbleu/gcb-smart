<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Handles login/logout.
 * Notice that this is the only controller not extending Controller_Main
 * since this is the only page not requiring being logged in
 */
class Controller_Golf_Pays extends Controller_Oscrudc
{
	protected $crud = null;
	public $template = null;
	
	public function before() {
		
		if (!Auth::instance()->logged_in()) {
            HTTP::redirect('login');
       	}

		$this->template = 'admin';

        parent::before();
				
		$this->crud = new Oscrud();
		$this->crud->set_table('pays');
		$this->crud->set_subject('Pays');
		//$crud->unset_columns('productDescription');
		//$crud->callback_column('buyPrice',array($this,'valueToEuro'));
    }


	public function action_index() {
        $this->template->title = 'Dashboard';

		$data = (array)parent::action_list();
		//print_r($data);

		$this->template->content= View::factory('/admin/crud/list_template',$data);
		$this->template->content->list_view = View::factory('/admin/crud/list',$data);
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
		
		$this->template->content= View::factory('/admin/crud/add',$data);
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
		
		$this->template->content= View::factory('/admin/crud/edit',$data);
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

		$this->template->content= View::factory('/admin/crud/list_template',$data);
		$this->template->content->list_view = View::factory('/admin/crud/list',$data);
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
		echo View::factory('/admin/crud/list',$data);
		
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
	
	public function action_update() {

		//disable auto rendering if requested using ajax
        if($this->request->is_ajax()){
            $this->auto_render = FALSE;
        }
		$data = (array)parent::action_update();
		$this->template->content= View::factory('/admin/crud/update',$data);
	}
	
	public function action_insert() {

		//disable auto rendering if requested using ajax
        if($this->request->is_ajax()){
            $this->auto_render = FALSE;
        }
		$data = (array)parent::action_update();
		$this->template->content= View::factory('/admin/crud/insert',$data);
	}
}