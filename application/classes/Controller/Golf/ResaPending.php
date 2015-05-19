<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Golf_ResaPending extends Controller_Golf_Admin
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

		$this->crud->set_table('demande_reservation');
		$this->crud->set_subject('Reservations visiteurs');
		$this->crud->fields('Date', 'Trous', 'Nom', 'email', 'phone', 'nb_joueurs', 'ressources', 'Actions');
		$this->crud->required_fields('nb_trous', 'date', 'nom', 'prenom', 'email', 'phone', 'nb_joueurs', 'ressources');

	}

	function make_crud()
	{
		//////////////////////////////////////////////////////////
		// CRUD Management										//

		// $this->crud->callback_column("Actions", array($this, "actions_buttons"));
		$this->crud->callback_column("Nom", array($this, "fullname"));
		$this->crud->callback_column("Trous", array($this, "trous"));
		$this->crud->callback_column("Date", array($this, "date_format"));
		
		$this->crud->unset_delete();
		$this->crud->unset_edit();
		$this->crud->unset_add();
		$this->crud->unset_export();
		$this->crud->unset_print();


		$this->crud->columns('Date','Trous', 'Nom', 'email', 'phone', 'nb_joueurs', 'ressources', 'Actions');
		$this->crud->order_by('Date');
		// $this->crud->set_subject('Membres');
		$this->crud
			->display_as('Date','Départ demandé')
				->display_as('Trous','Nombre de trous')
					->display_as('email','Courriel')
						->display_as('password','Mot de passe')
							->display_as('id_pays','Pays')
								->display_as('cp','Code Postal')
									->display_as('indgolf','Index')
										->display_as('id_status','Status');
											// ->display_as('activated','Activé');

		//$this->crud->add_action('Confirmer', '/assets/images/validate.png', URL::base('http', FALSE).'golf/reservation/transform/', 'with-tip');

		// $this->crud->add_action('Editer', 'fa fa-pencil txt-color-green','', 'with-tip', array($this,'edit_user'));
		// $this->crud->add_action('Supprimer', 'fa fa-times txt-color-red', '', 'with-tip', array($this,'delete_user'));
	}

	public function action_index()
	{

		// Set active page in menu
		$this->pages["admin"]["sub"]["resa"]['sub']['public']["active"] = true;
		$this->pageTitle = "Réservation à valider";

		$this->make_crud();

		$this->crud->add_action('Confirmer', 'fa fa-check txt-color-seagreen','', 'action-confirm', array($this,'confirm_path'));
		$this->crud->add_action('Supprimer', 'fa fa-times txt-color-red', '', 'action-delete', array($this,'delete_user'));
		// $this->crud->add_action('Editer', 'fa fa-pencil txt-color-seagreen fa-fw fa-1x','', 'with-tip', array($this,'edit_user'));
		// $this->crud->add_action('Désactiver', 'fa fa-pause txt-color-orange fa-fw fa-1x', '', 'action-disable with-tip', array($this,'disable_path'));

		$this->crud->where('traite', '=', '0');

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
		// $this->pageBreadcrumbs["admin"]["sub"]["users"]['sub']['disabled'] = "/admin/users/disabled";
		$this->pageBreadcrumbs = array(
			"Accueil" => "/",
			"Admin" => "/admin",
			"Users" => "/admin/users",
		);

		$this->make_crud();
		$this->crud->add_action('Activer', 'fa fa-play txt-color-blue fa-fw fa-2x','', 'action-active with-tip', array($this,'activate_user'));
		$this->crud->add_action('Supprimer', 'fa fa-times txt-color-red fa-fw', '', 'action-delete with-tip', array($this,'delete_user'));
		
		$this->crud->where('status', '=', 'disable');

		$data = (array)parent::action_list();

		$this->template->content= View::factory('/fragments/admin/crud/list_template',$data);
		$this->template->content->list_view = View::factory('/fragments/admin/crud/list',$data);
	}

	function activate_user($primary_key , $row)
	{
		$url = "/admin/users/active/".$primary_key;
		return $url;
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
	
	function delete_user($primary_key , $row)
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
		
	}
	

	// public function action_valide()
	// {
	// 	$data = (array)parent::action_list();
	// 	Notify::msg('Validation effectuée avec succès !', 'success');
	//
	// 	$this->template->content = View::factory('/fragments/admin/crud/list_template',$data);
	// 	$this->template->content->list_view = View::factory('/fragments/admin/crud/list',$data);
	// }
	
	// public function action_ajax_list()
	// {
	// 	//disable auto rendering if requested using ajax
	// 	if($this->request->is_ajax()){
	// 		$this->auto_render = FALSE;
	// 	}
	//
	// 	$this->make_crud();
	//
	// 	$this->crud->add_action('Editer', 'fa fa-pencil txt-color-green','', 'with-tip', array($this,'edit_user'));
	// 	$this->crud->add_action('Supprimer', 'fa fa-times txt-color-red', '', 'with-tip', array($this,'delete_user'));
	//
	// 	$this->crud->where('users.id','>','9');
	// 	$this->crud->where('status', '=', 'enable');
	//
	// 	$data = (array)parent::action_ajax_list();
	// 	//print_r($data);
	// 	echo View::factory('/fragments/admin/crud/list',$data);
	//
	// }
	
	// public function action_ajax_list_info()
	// {
	// 	//disable auto rendering if requested using ajax
	// 	if($this->request->is_ajax()){
	// 		$this->auto_render = FALSE;
	// 	}
	//
	// 	$this->make_crud();
	//
	// 	$this->crud->where('users.id','>','9');
	// 	$this->crud->where('status', '=', 'enable');
	//
	// 	$data = parent::action_ajax_list_info();
	// 	//print_r($data);
	// 	echo json_encode($data);
	//
	// }

	private function traitement_resa($idResa = null, $confirmFlag)	// Traite la demande de réservation en fonction du flag
	{
		$id_demande_reservation = $this->request->param('id');
		
		if(!($id_demande_reservation > 0)) {
			$message = "Erreur ! Paramètre manquant !";
		}
		
		$demande_reservation = DB_ORM::model('demande_reservation');
		$demande_reservation->id = $idresa;
		$demande_reservation->load();
		
		if($demande_reservation->is_loaded()){
			if($confirmFlag){
				$demande_reservation->traite = 1;
			}else{
				$demande_reservation->traite = -1;
			}
			$demande_reservation->save();
			$message = "Demande de réservation validée";
		}

	}	// traitement_resa


	function confirm_path($primary_key , $row)
	{
		$url = "/admin/resapending/confirm/".$primary_key;
		return $url;
	}
	public function action_confirm()
	{

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
	
	function edit_user($primary_key , $row)
	{
		$url = "/admin/users/edit/".$primary_key;
		return $url;
	}


	function refuse_user($primary_key , $row)
	{
		$url = "/admin/users/refuse/".$primary_key;
		return $url;
	}

	public function fullname($value, $row) {
		return $row->prenom." ".$row->nom;
	}
	
	public function trous($value, $row) {
		return $row->nb_trous." trous";
	}
	
	public function date_format($value, $row) {
		$date = new DateTime($row->date);
		
		$english = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday',
		'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' );
		
		$french = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche',
		'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
		
		return str_replace($english, $french, $date->format('l d F Y H:i'));
	}

}

