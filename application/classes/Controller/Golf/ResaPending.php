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
		// $this->crud->fields('Date', 'Trous', 'Nom', 'email', 'phone', 'nb_joueurs', 'ressources', 'Actions');
		// $this->crud->required_fields('date','nb_trous', 'nom', 'prenom', 'email', 'phone', 'nb_joueurs', 'ressources');

	}

	function make_crud()
	{
		//////////////////////////////////////////////////////////
		// CRUD Management										//

		$this->crud->callback_column("Date", array($this, "date_format"));
		$this->crud->callback_column("Nom", array($this, "fullname"));
		$this->crud->callback_column("Trous", array($this, "trous"));
		// $this->crud->callback_column("Actions", array($this, "actions_buttons"));
		
		// $this->crud->unset_delete();
		// $this->crud->unset_edit();
		// $this->crud->unset_add();
		// $this->crud->unset_export();
		// $this->crud->unset_print();

		$this->crud->order_by('Date');

		// $this->crud->set_subject('Membres');
		$this->crud->columns('Date','Trous', 'Nom', 'email', 'phone', 'nb_joueurs', 'ressources');
		$this->crud
			->display_as('Date','Départ demandé')
				->display_as('Trous','Parcours')
					->display_as('email','Courriel')
						->display_as('phone','Téléphone')
							->display_as('nb_joueurs','Joueurs')
								->display_as('ressources','Ressources');

	}

	public function action_index()
	{

		// Set active page in menu
		$this->pages["admin"]["sub"]["planning"]['sub']['resa-pending']["active"] = true;
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

