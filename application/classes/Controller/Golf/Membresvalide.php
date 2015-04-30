<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Handles login/logout.
 * Notice that this is the only controller not extending Controller_Main
 * since this is the only page not requiring being logged in
 */
class Controller_Golf_Membresvalide extends Controller_Oscrudc
{
	protected $crud = null;
	public $template = null;
	public $menu='';
	
	function encrypt_password_callback($post_array, $primary_key) {

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
	
	public function get_breadcrumbs($pages = array()){
    	foreach($segments = explode('/', $this->request->uri()) as $key => $page){
    		$pages[] = array(
    			'title' => $page,
    			'url' => URL::site(join('/', array_slice($segments, 0, ($key + 1))))
    		);
    	}
    	return View::factory('admin/breadcrumbs')->set('pages', $pages);
    }

	function valide_user($primary_key , $row)
	{
	    //echo 'row=';
		//print_r($row);
		//echo " key=".$primary_key;
		//print_r(Request::current());
		// a revoir Request::current()->controller().
		//$route = Route::name(Request::current()->route());
		$url = "/golf/membresvalide/confirm/".$primary_key; //$route."/".Request::current()->controller().
		return $url;
		//return "//golf/membresvalide/confirm/".$primary_key;
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
		/*$this->crud->unset_columns('banned');
		$this->crud->unset_columns('ban_reason');
		$this->crud->unset_columns('new_password_key');
		$this->crud->unset_columns('new_password_requested');*/
		$this->crud->columns('firstname','lastname','email','username');
		$this->crud->unset_edit();
		//$this->crud->unset_delete();
		$this->crud->unset_add();
		
		$this->crud->fields('firstname','lastname','email','username','password');
		$this->crud->required_fields('firstname','lastname','email','username','password');
		
		$this->crud->callback_before_update(array($this,'encrypt_password_callback'));
		$this->crud->callback_before_insert(array($this,'encrypt_password_callback'));
		
		$this->crud->set_relation('id_status', 'user_status', 'status');
		
		$this->crud->where('status', '=', 'pending');
		
		//( $label, $image_url = '', $link_url = '', $css_class = '', $url_callback = null)
		$this->crud->add_action('Valider', '/assets/img/fugue/plus-circle.png', '','with-tip',array($this,'valide_user'));
		
		
		// a revoir génération du menu 
	/*	$attrs = array
		(
			'class' => 'nav'
		);
		
		$this->menu = Menu::factory()
		    ->add('Accueil', '/')
		    ->add('Réservation', '#', Menu::factory()
				->add('Réservation', '/public/application/reservation')
		        ->add('Modification', '/public/application/reservation/calendrier'))
			->add('Membres ', '#', Menu::factory()
				->add('A valider', '/public/application/reservation')
			    ->add('Liste', '/public/application/reservation/calendrier'))
			->render($attrs);*/
		

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
		
		$user->id_status = $delete_status_id;
		$user->save();
		
		HTTP::redirect('/golf/membresvalide/valide');
	}
	
	public function action_valide() {

        $this->template->title = 'Dashboard';

		$data = (array)parent::action_list();
		//print_r($data);

		$this->template->content= View::factory('/admin/crud/list_template',$data);
		$this->template->content->list_view = View::factory('/admin/crud/list_',$data);
		$this->template->content->list_view->unset_edit = $this->crud->unset_edit;
		
		$this->template->content->header_nav = View::factory( '/admin/header_nav');
		$this->template->content->header_nav->breadcrumb = $this->get_breadcrumbs();
		$this->template->content->header_nav->home			=	0;
		$this->template->content->header_nav->users			=	1;
		$this->template->content->header_nav->reservation	=	0;
		$this->template->content->header_nav->competition	=	0;
		$this->template->content->header_nav->settings		=	0;
		
	
	}
	
	public function action_confirm() {

        $this->template->title = 'Dashboard';

		// envoi mail confirmation
		
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
			
			$user_role = DB_ORM::model('user_roles');
			$user_role->user_id = $user->id;
			$user_role->role_id = 15;
			$user_role->save();
		}
		
		$firstname = $user->firstname;
		$lastname = $user->lastname;
		$message = View::factory( 'account/mails/confirminscription');

		// a revoir lien en dynamique
		$message->link 	   		= URL::base('http', TRUE);
		$message->username     = $firstname.' '.$lastname;
		// olivier a revoir pour nom du projet Settings::get('project_name')
		//$message->settings = $this->template->settings;
		
		$texte = 'La fiche a bien été validée';
		
		try {
			$email = Email::factory()
				->from('no-reply@'.Arr::get($_SERVER, 'SERVER_NAME'))
				->to($user->email)
				->subject(Settings::get('project_name').' GCB: '.__('confirmation de votre compte'))
				->message($message)
				->send();
			$texte .= ' et un email a été envoyé au membre.';
		}
		catch(Exception $e) {
	    	$texte .= ' mais l\'email n\'a pas pu être envoyé. Vous pouvez avertir le membre à l\'adresse <a href="mailto:'.$user->email.'">'.$user->email.'</a>.';
		}
		
		 
		
		$this->template->content = View::factory( '/admin/user/confirmation');
		$this->template->content->texte = $texte;
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
}