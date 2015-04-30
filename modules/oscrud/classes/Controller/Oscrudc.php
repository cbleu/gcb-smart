<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Oscrudc extends Controller_Template {
	
	/*
	 * @var $_table name
	 */
	protected $_table_model = '';
	public $template = 'admin';

	/*
	 * @var $_route_name Route to be used for actions (default: crud)
	 */
	protected $_route_name = 'oscrudc';
	
	public function before() {
		// controle si acces depuis un mobile
		// $this->is_mobile = Mobile::getInstance()->isMobile();
		// if($this->is_mobile ){
		// 	// Set a local template variable to what template the controller wants to use, by default 'template'
		// 	        $template = 'mobile';
		// 	echo 'site mobile';
		// }
		// else{
		// 	// Set a local template variable to what template the controller wants to use, by default 'template'
		// 	        $template = $this->template;
		// 	//echo 'site normal';
		// }
        // This is important and for abstraction, since we're extending a class and its functions we need to make sure we still execute its before(); function
        // This will load the view you need from /views/template.php or /views/template2.php depending on what your controller specifies into $this->template
        parent::before();

        // $this->template->header = View::factory('admin/header');  // Loads default header file from our views folder /views/admin/header.php
        // $this->template->content = View::factory('admin/content');  // Loads default index file from our views folder
        // $this->template->footer = View::factory('admin/footer');  // Loads default footer file from our views folder
	
	}
	
	public function get_breadcrumbs($pages = array()){
    	foreach($segments = explode('/', $this->request->uri()) as $key => $page){
    		$pages[] = array(
    			'title' => $page,
    			'url' => URL::site(join('/', array_slice($segments, 0, ($key + 1))))
    		);
    	}
    	return View::factory('admin/breadcrumbs')->set('pages', $pages);
    }

	public function action_index()
	{
		$this->crud->pre_render();
		
		$first_parameter = $this->request->param('id');
		$second_parameter = $this->request->param('param');
		$state_info = $this->crud->getStateInfo($first_parameter,$second_parameter);
		//echo "state_info=";
		//print_r($state_info);
		$this->crud->set_ajax_list_queries($state_info);
		$data = $this->crud->showList(true);
		//print_r($data);
		return $data;
	}
	
	public function action_ajax_list(){
		
		if($this->request->is_ajax()){
            $this->auto_render = FALSE;
        }

		$this->crud->pre_render();
		
		$first_parameter = $this->request->param('id');
		$second_parameter = $this->request->param('param');
		$state_info = $this->crud->getStateInfo($first_parameter,$second_parameter);
		//echo "state_info=";
		//print_r($state_info);
		$this->crud->set_ajax_list_queries($state_info);
		$data = $this->crud->showList(true);
		//print_r($data);
		return $data;
	}
	
	
	public function action_unknown(){
		$this->crud->pre_render();
		echo 'unknow';
	}
	
	public function action_add(){
		
		$this->crud->pre_render();
		
		if($this->crud->unset_add)
		{
			throw new Exception('You don\'t have permissions for this operation', 14);
			die();
		}
		
		
		$data = $this->crud->showAddForm();
		return $data;
	}
	
	public function action_edit(){
		//echo "first=".$first_parameter." second=".$second_parameter;
		
		$this->crud->pre_render();
		
		if($this->crud->unset_edit)
		{
			throw new Exception('You don\'t have permissions for this operation', 14);
			die();
		}
	
		$first_parameter = $this->request->param('id');
		$second_parameter = $this->request->param('param');
		$state_info = $this->crud->getStateInfo($first_parameter,$second_parameter);
		$data = $this->crud->showEditForm($state_info);
		return $data;
	}
	
	public function action_delete(){
		

		if($this->crud->unset_delete)
		{
			throw new Exception('This user is not allowed to do this operation', 14);
			die();
		}
		
		$this->crud->pre_render();
		
		$state_info = $this->crud->getStateInfo();
		$delete_result = $this->crud->db_delete($state_info);
		
		$data = $this->crud->delete_layout( $delete_result );
		//print_r($delete_result);
		return $data;
	}
	
	public function action_insert(){
		$this->crud->pre_render();
		
		if($this->crud->unset_add)
		{
			throw new Exception('This user is not allowed to do this operation', 14);
			die();
		}
		// "post=";
		//print_r($_POST);
		
		if(!empty($_POST))
		{
			$this->crud->state_info = (object)array('unwrapped_data' => $_POST);
		}
		else
		{
			throw new Exception('On the state "insert" you must have post data',8);
			die();
		}
		
		$insert_result = $this->crud->db_insert($this->crud->state_info);
		
		$this->crud->insert_layout($insert_result);
	}
	
	public function action_insert_validation(){
		$this->crud->pre_render();
		$validation_result = $this->crud->db_insert_validation();
	
		print_r($this->crud);
				
		$this->crud->validation_layout($validation_result);
	}
	
	public function action_update(){
		$this->crud->pre_render();
		
		$state_info = $this->crud->getStateInfo();
		$update_result = $this->crud->db_update($state_info);
		
		// $this->crud->update_layout( $update_result,$state_info);
	}
	
	public function action_list(){
		$this->crud->pre_render();
		
		if($this->crud->unset_list)
		{
			throw new Exception('You don\'t have permissions for this operation', 14);
			die();
		}
	
		if($this->crud->theme === null)
			$this->crud->set_theme($this->crud->default_theme);	
						
		//$this->crud->setThemeBasics();
		//$this->crud->set_basic_Layout();
		$first_parameter = $this->request->param('id');
		$second_parameter = $this->request->param('param');
		$state_info = $this->crud->getStateInfo($first_parameter,$second_parameter);
		
		$data = $this->crud->showList(false,$state_info);
		return $data;
	}
	
	public function action_ajax_list_info(){
		$this->crud->pre_render();
		
		$first_parameter = $this->request->param('id');
		$second_parameter = $this->request->param('param');
		$state_info = $this->crud->getStateInfo($first_parameter,$second_parameter);
		$this->crud->set_ajax_list_queries($state_info);				

		$data = $this->crud->showListInfo();

		return $data;
	}
	
	public function action_update_validation(){
		$this->crud->pre_render();
		
		$validation_result = $this->crud->db_update_validation();
		
		$this->crud->validation_layout($validation_result);
	}
	
	public function action_upload_file(){
		$this->crud->pre_render();
	}
	
	public function action_delete_file(){
		$this->crud->pre_render();
	}
	
	public function action_ajax_relation(){
		$this->crud->pre_render();
	}
	
	public function action_ajax_relation_n_n(){
		$this->crud->pre_render();
	}
	
	public function action_success(){
		$this->crud->pre_render();
	}
	
	public function action_export(){
		$this->crud->pre_render();

		//a big number just to ensure that the table characters will not be cutted.
		$this->crud->character_limiter = 1000000;

		if($this->crud->unset_export)
		{
			throw new Exception('You don\'t have permissions for this operation', 15);
			die();
		}

		if($this->crud->theme === null)
			$this->crud->set_theme($this->crud->default_theme);
		$this->crud->setThemeBasics();

		//$this->crud->set_basic_Layout();

		$state_info = $this->crud->getStateInfo();
		$this->crud->set_ajax_list_queries($state_info);
		$this->crud->exportToExcel($state_info);

	}
	
	public function action_print(){
		
		$this->crud->pre_render();

		//a big number just to ensure that the table characters will not be cutted.
		$this->crud->character_limiter = 1000000;

		if($this->crud->unset_print)
		{
			throw new Exception('You don\'t have permissions for this operation', 15);
			die();
		}

		if($this->crud->theme === null)
			$this->crud->set_theme($this->crud->default_theme);
		$this->crud->setThemeBasics();

		//$this->crud->set_basic_Layout();

		$state_info = $this->crud->getStateInfo();
		$this->crud->set_ajax_list_queries($state_info);
		$this->crud->print_webpage($state_info);
		//$this->crud->pre_render();
	}
}