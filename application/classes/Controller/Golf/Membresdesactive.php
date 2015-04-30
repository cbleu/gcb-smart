<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Handles login/logout.
 * Notice that this is the only controller not extending Controller_Main
 * since this is the only page not requiring being logged in
 */
class Controller_Golf_Membresdesactive extends Controller_Oscrudc
{
	protected $crud = null;
	public $template = null;
	public $menu='';
	
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
	
	function enable_user($primary_key, $row)
	{
	    
		$url = "/golf/membresdesactive/active/".$primary_key;
		return $url;
	}
		
	public function before() {
		
		if (!Auth::instance()->logged_in('admin')) {
            HTTP::redirect('login');
       	}

		$this->template = 'admin';

        parent::before();
				
		$this->crud = new Oscrud();
		$this->crud->set_table('users');
		$this->crud->set_subject('Membres');
		$this->crud->columns('firstname','lastname','email','id_pays');
		
		$this->crud->fields('firstname','lastname','email','password','adresse','cp','ville','id_pays','indgolf','telephone');
		$this->crud->required_fields('firstname','lastname','email','password');
		
		$this->crud->set_relation('id_pays','pays','nom');	
				
		$this->crud->change_field_type('password','password');
		
		$this->crud
			->display_as('firstname','Prénom')
			->display_as('lastname','Nom')
			->display_as('email','Courriel')
			->display_as('password','Mot de passe')
			->display_as('id_pays','Pays')
			->display_as('activated','Activé')
			->display_as('cp','Code Postal');
		
		$this->crud->callback_before_update(array($this,'encrypt_password_callback'));
		$this->crud->callback_before_insert(array($this,'encrypt_password_callback'));
		
		$this->crud->where('users.id','>','1');
		
		$this->crud->set_relation('id_status', 'user_status', 'status');
		$this->crud->where('status', '=', 'disable');
		
		$this->crud->unset_edit();
		//$this->crud->unset_delete();
		$this->crud->unset_add();
		$this->crud->add_action('Activer', '/assets/img/fugue/plus-circle.png', '', '', array($this,'enable_user'));
    }

	public function action_active() {

        $this->template->title = 'Dashboard';

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
		
		HTTP::redirect('/golf/membresdesactive/');
	}
	
	public function action_delete() {
		
		$id_user = $this->request->param('id');
		
		$user = DB_ORM::model('users');
	    $user->id = $id_user;
		$user->load();
		
		$status = DB_SQL::select('default')
	   					->from('user_status')
						->where('status', '=', 'delete')
						->query();
						
		$delete_status_id = $status[0]['id'];
		
		$user->email = $user->email."_deleted_".time();
		$user->username = $user->username."_deleted_".time();
		
		$user->id_status = $delete_status_id;		
		$user->save();
		
		$message = array();
		$message["success"] = true;
		$message["success_message"] = "<p>L'utilisateur a bien été suprimmé<\/p>";
		
		
		//echo json_encode($message);
		
		HTTP::redirect('/golf/membresdesactive');
	}


	public function action_index() {
        $this->template->title = 'Dashboard';

		$data = (array)parent::action_list();
		//print_r($data);
		
		//echo "menu=".$this->menu;
		
		$this->template->content= View::factory('/admin/crud/list_template',$data);
		$this->template->content->list_view = View::factory('/admin/crud/list_',$data);
		$this->template->content->header_nav = View::factory( '/admin/header_nav');
		$this->template->content->header_nav->breadcrumb = $this->get_breadcrumbs();
		$this->template->content->header_nav->home			=	0;
		$this->template->content->header_nav->users			=	1;
		$this->template->content->header_nav->reservation	=	0;
		$this->template->content->header_nav->competition	=	0;
		$this->template->content->header_nav->settings		=	0;
	}
	
		
	public function action_list() {

        $this->template->title = 'Dashboard';

		$data = (array)parent::action_list();
		
		$this->template->content= View::factory('/admin/crud/list_template',$data);
		$this->template->content->list_view = View::factory('/admin/crud/list_',$data);
		$this->template->content->header_nav = View::factory( '/admin/header_nav');
		$this->template->content->header_nav->breadcrumb = $this->get_breadcrumbs();
		$this->template->content->header_nav->home			=	0;
		$this->template->content->header_nav->users			=	1;
		$this->template->content->header_nav->reservation	=	0;
		$this->template->content->header_nav->competition	=	0;
		$this->template->content->header_nav->settings		=	0;
		
	
	}
		
	public function action_ajax_list() {

		//disable auto rendering if requested using ajax
        if($this->request->is_ajax()){
            $this->auto_render = FALSE;
        }

		$data = (array)parent::action_ajax_list();
		//print_r($data);
		//echo 'toto';
		echo View::factory('/admin/crud/list_',$data);
		
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
		$data = (array)parent::action_insert();
		
		print_r($data);
		
		$this->template->content= View::factory('/admin/crud/insert',$data);
	}
	
	public function action_success() {

        $this->template->title = 'Dashboard';

		$data = (array)parent::action_list();
		
		$this->template->content= View::factory('/admin/crud/list_template',$data);
		$this->template->content->list_view = View::factory('/admin/crud/list_',$data);
		$this->template->content->header_nav = View::factory( '/admin/header_nav');
		$this->template->content->header_nav->breadcrumb = $this->get_breadcrumbs();
		$this->template->content->header_nav->home			=	0;
		$this->template->content->header_nav->users			=	1;
		$this->template->content->header_nav->reservation	=	0;
		$this->template->content->header_nav->competition	=	0;
		$this->template->content->header_nav->settings		=	0;
		
	}
	
}