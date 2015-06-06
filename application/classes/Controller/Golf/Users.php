<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Golf_Users extends Controller_Golf_Admin
{
	 
	public function before()
	{
		//////////////////////////////////////////////////////////
		// Parent Creator call									//
		parent::before();		// execute before for parent Class
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
		$this->crud->required_fields('firstname','lastname','email');

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

		// $this->crud->columns('firstname','lastname','email','id_pays', 'id_status');
		$this->crud->columns('lastname','firstname', 'email', 'indgolf', 'id_status');
		$this->crud->order_by('lastname');
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

		// $this->crud->add_action('Editer', 'fa fa-pencil txt-color-green','', 'with-tip', array($this,'edit_user'));
		// $this->crud->add_action('Supprimer', 'fa fa-times txt-color-red', '', 'with-tip', array($this,'delete_user'));
	}

	public function action_index()
	{
		// $statusFilter = $this->request->param('id');
		// if (!$statusFilter){
			$statusFilter = 'enable';
		// }

		// Set active page in menu
		$this->pages["admin"]["sub"]["users"]['sub']['members']["active"] = true;
		$this->pageTitle = "Liste des usagers";
		// Set breadcrumbs links
		// $this->pageBreadcrumbs["admin"]["sub"]["users"]['sub']['members'] = "/admin/users";
		$this->pageBreadcrumbs = array(
			"Accueil" => "/",
			"Admin" => "/admin",
			"Users" => "/admin/users",
		);

		$this->make_crud();

		$this->crud->add_action('Editer', 'fa fa-pencil txt-color-seagreen fa-fw fa-1x','', 'with-tip', array($this,'get_edit_url'));
		// $this->crud->add_action('Supprimer', 'fa fa-times txt-color-red', '', 'action-delete with-tip', array($this,'delete_user'));
		$this->crud->add_action('Désactiver', 'fa fa-pause txt-color-orange fa-fw fa-1x', '', 'action-disable with-tip', array($this,'get_disable_url'));

		$this->crud->where('users.id','>','9');

		$this->crud->where('status', '=', $statusFilter);

		$data = (array)parent::action_list();
		$data['statusFilter'] = $statusFilter;

		$this->template->content= View::factory('/fragments/admin/crud/list_template',$data);
		$this->template->content->list_view = View::factory('/fragments/admin/crud/list',$data);
		// $this->template->content->list_view = null;
	}

	public function action_list()
	{
		HTTP::redirect('/admin/users/');
	}

	public function action_ajax_list()
	{
		$statusFilter = $this->request->param('id');
		// print_r($statusFilter);

		//disable auto rendering if requested using ajax
		if($this->request->is_ajax()){
			$this->auto_render = FALSE;
		}

		$this->make_crud();

		$this->crud->add_action('Editer', 'fa fa-pencil txt-color-green','', 'with-tip', array($this,'get_edit_url'));
		$this->crud->add_action('Supprimer', 'fa fa-times txt-color-red', '', 'with-tip', array($this,'get_delete_url'));

		$this->crud->where('users.id','>','9');
		// $this->crud->where('status', '=', 'enable');

		$this->crud->where('status', '=', $statusFilter);
		// print_r($statusFilter);

		$data = (array)parent::action_ajax_list();
		//print_r($data);
		echo View::factory('/fragments/admin/crud/list',$data);
		
	}
	
	public function action_ajax_list_info()
	{
		$statusFilter = $this->request->param('id');

		//disable auto rendering if requested using ajax
		if($this->request->is_ajax()){
			$this->auto_render = FALSE;
		}
		
		$this->make_crud();

		$this->crud->where('users.id','>','9');
		// $this->crud->where('status', '=', 'enable');

		// Notify::msg("lastFilter:".$lastFilter, 'warning');
		$this->crud->where('status', '=', $statusFilter);

		$data = parent::action_ajax_list_info();
		//print_r($data);
		echo json_encode($data);
		
	}

	public function action_disabled()
	{
		$statusFilter = 'disable';

		// Set active page in menu
		$this->pages["admin"]["sub"]["users"]['sub']['disabled']["active"] = true;
		$this->pageTitle = "Liste des usagers désactivés";

		$this->pageBreadcrumbs = array(
			"Accueil" => "/",
			"Admin" => "/admin",
			"Users" => "/admin/users",
		);

		$this->make_crud();
		$this->crud->unset_delete();
		$this->crud->unset_add();

		$this->crud->add_action('Activer', 'fa fa-play txt-color-blue fa-fw fa-2x','', 'action-active with-tip', array($this,'get_activate_url'));
		$this->crud->add_action('Supprimer', 'fa fa-times txt-color-red fa-fw', '', 'action-delete with-tip', array($this,'get_delete_url'));
		
		$this->crud->where('status', '=', $statusFilter);

		$data = (array)parent::action_list();
		
		$data['statusFilter'] = $statusFilter;

		$this->template->content= View::factory('/fragments/admin/crud/list_template',$data);
		$this->template->content->list_view = View::factory('/fragments/admin/crud/list',$data);
	}

	function get_activate_url($primary_key , $row)
	{
		$url = "/admin/users/active/".$primary_key;
		return $url;
	}
		
	public function action_active()
	{
		$id_user = $this->request->param('id');
		
		// get enable id status
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
			Notify::msg('Membre activé avec succès !', 'success');
		}
		
		// $data = (array)parent::action_active();

		HTTP::redirect('/admin/users/disabled/');
	}
	
	public function action_add()
	{
		$this->make_crud();

		$this->crud->fields('firstname','lastname','email','password','adresse','cp','ville','id_pays','telephone', 'indgolf', 'id_status');
		
		$data = (array)parent::action_add();
		
		$this->template->content = View::factory('/fragments/admin/crud/add-edit', $data);
	}
	
	public function action_insert()
	{
		$data = (array)parent::action_insert();
		Notify::msg('Nouveau membre ajouté avec succès !', 'success');
		
		HTTP::redirect('/admin/users/');
	}
	
	function get_edit_url($primary_key , $row)
	{
		$url = "/admin/users/edit/".$primary_key;
		return $url;
	}
	public function action_edit()
	{
		$this->make_crud();

		$this->crud->fields('firstname','lastname','email','password','adresse','cp','ville','id_pays','telephone', 'indgolf', 'id_status');

		$data = (array)parent::action_edit();

		$this->template->content = View::factory('/fragments/admin/crud/add-edit',$data);
	}
	
	public function action_update()
	{
		// if($this->request->is_ajax()){
			// echo("ajax action_update");
			$this->auto_render = FALSE;
		// }
		$data = (array)parent::action_update();
		Notify::msg('Modifications enregistrées avec succès !', 'success');
		
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
	
	function get_delete_url($primary_key , $row)
	{
		$url = "/admin/users/delete/".$primary_key;
		return $url;
	}
	public function action_delete()
	{
		$id_user = $this->request->param('id');
		
		$status = DB_SQL::select('default')
			->from('user_status')
				->where('status', '=', 'delete')
					->query();
						
		$disable_status_id = $status[0]['id'];
		
		$user = DB_ORM::model('users');
		$user->id = $id_user;
		$user->load();
	
		if($user->is_loaded()){
			$user->email 		= $user->email."_deleted_".time();
			$user->username 	= $user->username."_deleted_".time();
			$user->id_status 	= $disable_status_id;
			$user->save(true);
			Notify::msg('Membre supprimé avec succès !', 'success');
		}
		
		// $data = (array)parent::action_delete();

		HTTP::redirect('/admin/users/');
		
		// $this->template = View::factory('/fragments/admin/ajax');
		// $this->template->content = View::factory('/fragments/admin/crud/list_template',$data);
		// $this->template->content->list_view = View::factory('/fragments/admin/crud/list',$data);
	}
	
	public function action_pending()
	{
		$statusFilter = 'pending';
		
		// Set active page in menu
		$this->pages["admin"]["sub"]["users"]['sub']['pending']["active"] = true;
		$this->pageTitle = "Inscription à valider";
		// Set breadcrumbs links
		$this->pageBreadcrumbs = array(
			"Accueil" => "/",
			"Admin" => "/admin",
			"Users" => "/admin/users",
		);

		$this->make_crud();
		$this->crud->unset_add();
		
		$this->crud->add_action('Valider', 'fa fa-check-circle txt-color-green','', 'with-tip', array($this,'get_validate_url'));
		$this->crud->add_action('Refuser', 'fa fa-times-circle txt-color-red', '', 'with-tip', array($this,'get_refuse_url'));

		$this->crud->where('status', '=', $statusFilter);

		$data = (array)parent::action_list();
		
		$data['statusFilter'] = $statusFilter;

		$this->template->content= View::factory('/fragments/admin/crud/list_template',$data);
		$this->template->content->list_view = View::factory('/fragments/admin/crud/list',$data);
	}

	function get_disable_url($primary_key , $row)
	{
		$url = "/admin/users/disable/".$primary_key;
		return $url;
	}
	public function action_disable()
	{
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
			Notify::msg('Membre désactivé avec succès !', 'success');
		}

		HTTP::redirect('/admin/users/');
	}
	
	
	
	// public function action_success() {
	//
	// 	HTTP::redirect('/admin/users/');
	//
	// }

	// public function action_activate() {
	//
	// 	HTTP::redirect('/admin/users/');
	//
	// }

	public function action_confirm() {

		//recup id du statut actif
		$status = DB_SQL::select('default')
			->from('user_status')
				->where('status', '=', 'enable')
					->query();
						
		$enable_status_id = $status[0]['id'];

		// envoi mail confirmation

		// Mise à jour du nouveau membre
		$user = DB_ORM::model('users');
		$user->id = $this->request->param('id');
		$user->load();
	
		if($user->is_loaded()){
			// mise à jour du statut du membre
			$user->id_status = $enable_status_id;	// actif
			$user->save(true);
			
			// mise à jour du role du membre
			$user_role = DB_ORM::model('user_roles');
			$user_role->user_id = $user->id;
			$user_role->role_id = 15;	// membre
			$user_role->save();
		}
		
		$message = View::factory( '/emails/confirm_inscription');

		// a revoir lien en dynamique
		$message->link = URL::base('http', TRUE);
		$message->fullname = $user->firstname.' '.$user->lastname;
		$message->golfname = $this->golf->nom;
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
		
		$this->template->content = View::factory( '/fragments/admin/crud/confirm');
		$this->template->content->texte = $texte;
		
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
	
	function get_validate_url($primary_key , $row)
	{
		$url = "/admin/users/confirm/".$primary_key;
		return $url;
	}

	function get_refuse_url($primary_key , $row)
	{
		$url = "/admin/users/refuse/".$primary_key;
		return $url;
	}
	public function action_refuse()
	{
		$id_user = $this->request->param('id');
		
		$status = DB_SQL::select('default')
			->from('user_status')
				->where('status', '=', 'refuse')
					->query();
						
		$refuse_status_id = $status[0]['id'];
		
		$user = DB_ORM::model('users');
		$user->id = $id_user;
		$user->load();
	
		if($user->is_loaded()){
			$user->email 		= $user->email."_refused_".time();
			$user->username 	= $user->username."_refused_".time();
			$user->id_status 	= $refuse_status_id;
			$user->save(true);
			Notify::msg('Membre refusé !', 'warning');
		}
		
		// $data = (array)parent::action_delete();

		HTTP::redirect('/admin/users/');
		
		// $this->template = View::factory('/fragments/admin/ajax');
		// $this->template->content = View::factory('/fragments/admin/crud/list_template',$data);
		// $this->template->content->list_view = View::factory('/fragments/admin/crud/list',$data);
	}

}

