<?php defined('SYSPATH') or die('No direct script access.');

/**
* Dashboard controller.
* Handles posting and viewing of past posts
*/
class Controller_Golf_App extends Controller_Golf_Main
{
	// public $template = 'egp_template';	// Default template
	//////////////////////////////////////////////////////////
	// PUBLIC FUNCS											//
	//////////////////////////////////////////////////////////
	
	public function before()
	{
		//////////////////////////////////////////////////////////
		// Parent Creator call									//
		parent::before();		// execute before for parent Class
		//////////////////////////////////////////////////////////

		//////////////////////////////////////////////////////////
		// Template management									//

		$this->template = View::factory('egp_template');

		$this->template->konotif = Notify::render();

		//////////////////////////////////////////////////////////

		//////////////////////////////////////////////////////////
		// Set active page in menu								//
		$this->pages["egp"]["active"] = true;
		$this->pageTitle = "Accueil";
		// Set breadcrumbs links
		$this->pageBreadcrumbs = array(
			"Accueil" => "/",
		);
		//////////////////////////////////////////////////////////

	}	// before
	
	// public function after()
	// {
	// 	// Set the response content-type here
	// 	$this->response->headers('Content-Type: text/html; charset=UTF-8');
	//
	// 	parent::after();
	// }

	//////////////////////////////////////////////////////////
	// ACTION FUNCS											//
	//////////////////////////////////////////////////////////
	
	public function action_index()
	{
		// Set active page in menu
		$this->pages["egp"]["active"] = true;
		$this->pageTitle = "Tableau de bord";

		Helpers_Stylesheet::add('/assets/css/carousel.css');

		$this->template->content = View::factory('/fragments/GCB/home');  // Loads default index file from our views folder
	}	// action_index
	
	public function action_login()	//cesar: est utilisé
	{
		// Logged in users should not see this page
		if($this->isLogged){
			HTTP::redirect('/');
		}
		// If the login form was posted...
		$post = $this->request->post();
		if (isset($post['username'])) {
			// Try to login
			if (Auth::instance()->login($post['username'], $post['password'])) {
				
				$this->isLogged 		= Auth::instance()->logged_in();
				$this->isAdmin 			= Auth::instance()->logged_in('admin');
				$this->user 			= Auth::instance()->get_user();

				$enable_status = DB_SQL::select('default')
					->from('user_status')
						->where('status', '=', 'enable')
							->query();
					
				if($this->user->id_status != $enable_status[0]['id']) {
					Auth::instance()->logout();
					$error = 'Utilisateur désactivé.';
					Notify::msg($error, 'error');
				}
			} else {
				Notify::msg('Problème de login', 'error');
				HTTP::redirect('/');
			}
		}
		HTTP::redirect('/');		
		// $this->pages["egp"]["active"] = true;
		// $this->template->content = View::factory('account/auth/loginpublic');
		// $this->template->title = 'Vous devez vous connecter';
	}	// action_login

	public function action_logout() {
		Auth::instance()->logout();
		HTTP::redirect('/');
	}
	
	public function action_inscription()	// cesar: est utilisé
	{
		// récup liste des pays
		$pays = DB_ORM::select('Pays')
			->query();
		
		$this->template->title = 'Golf Club de Bourbon - Inscription';
		$this->template->content = View::factory( '/fragments/user/new');
		$this->template->content->pays = $pays;
	}	// action_inscription
	
	public function action_informations()	// TODO a faire
	{
		if(!$this->isLogged){
			Notify::msg("Vous devez être connecté !", 'info');
			HTTP::redirect('/');
		}
		
		// récup liste des pays
		$pays = DB_ORM::select('Pays')
			->query();
			

		//////////////////////////////////////////////////////////
		// Set active page in menu								//

		$this->pages["users"]["active"] = true;
		$this->pageTitle = "Mes Informations";
		//////////////////////////////////////////////////////////

		$this->template->content = View::factory( '/fragments/user/info');
		$this->template->content->pays = $pays;
		$this->template->content->user = $this->user;
		
	}	// action_informations

/*	
	public function action_updateuser_OLD()	// cesar: est utilisé
	{
		if (!Auth::instance()->logged_in()) {
			HTTP::redirect('login');
		}
		
		$error_message = "";
		
		$logged_in_user = Auth::instance()->get_user();
		$user = DB_ORM::model('users');
		$user->id = $logged_in_user->id;
		$user->load();		
		
		$email      = Arr::get($_POST, 'email');
		$password   = Arr::get($_POST, 'password');
		$password2  = Arr::get($_POST, 'password2');
		$lastname   = Arr::get($_POST, 'lastname');
		$firstname  = Arr::get($_POST, 'firstname');
		$adresse    = Arr::get($_POST, 'adresse');
		$cp         = Arr::get($_POST, 'cp');
		$ville      = Arr::get($_POST, 'ville');
		$pays       = Arr::get($_POST, 'pays');
		$telephone  = Arr::get($_POST, 'telephone');
		$index      = Arr::get($_POST, 'index');
		
		if($password == $password2) {
			if($password != "") {
				$user->password = Auth::instance()->hash_password($password);
			}
		}
		else {
			$error_message = "Mots de passe différents";
			goto end;
		}
		
		
		$user->username 		= $email;
		$user->lastname 		= $lastname;
		$user->firstname 		= $firstname;
		$user->indgolf 			= $index;
		$user->email 			= $email;
		$user->telephone 		= $telephone;
		$user->adresse 			= $adresse;
		$user->cp 				= $cp;
		$user->ville 			= $ville;
		$user->id_pays 			= $pays;
		$user->save(TRUE);
		
		$error_message = '<br/>Vos informations ont été correctement mise à jour.';
		
		end:
		
		$this->template->title = 'Golf Club de Bourbon - Mes Informations';
		$this->template->content = View::factory( '/fragments/user/info');
		$this->template->content->texte = $error_message;
	}	// action_updateuser_OLD
*/	
	public function action_passwordforgot()
	{
		$this->template->title = 'Golf Club de Bourbon - Inscription';
		$this->template->content = View::factory( 'public/user/passwordforgot');
	}	// action_passwordforgot
	
	public function action_passwordchange()
	{
		$this->template->title = 'Golf Club de Bourbon - Inscription';
		
		$forgot = DB_SQL::select('default')
			->from('forgots')
				->where('hash', '=', $this->request->param('hash'))
					->limit(1)
						//->statement()
		->query();
		
		//print_r($forgot);
		
		if($forgot->is_loaded()){
			$id = $forgot->get('user_id','');

			$passw = Text::random();

			$user = DB_ORM::model('users');
			$user->id = $id;
			$user->load();

			if($user->is_loaded()){
				$user->password = Auth::instance()->hash_password($passw);
				$user->save(true);
			}
			
			
			$firstname = $user->firstname;
			$lastname = $user->lastname;
			$message = View::factory( 'account/mails/publicconfirmpassword');

			$message->link 	   		= $passw;
			$message->linkchange 	= URL::base('http', TRUE);
			$message->username     = $firstname.' '.$lastname;
			// olivier a revoir pour nom du projet Settings::get('project_name')
			//$message->settings = $this->template->settings;
			
			$email = Email::factory()
				->from('no-reply@'.Arr::get($_SERVER, 'SERVER_NAME'))
					->to($user->email)
						->subject(Settings::get('project_name').' GCB: '.__('changement de mot de passe'))
							->message($message)
								->send();
			
			$this->template->content = View::factory( 'public/user/passwordchange');

		}
		
		$this->template->content = View::factory( 'public/user/passwordchange');
	}	// action_passwordchange
	
	public function action_passwordclear()
	{
		$this->template->title = 'Golf Club de Bourbon - Inscription';
		
		if ($this->request->method() == Request::POST)
		{
			$connection = DB_Connection_Pool::instance()->get_connection('default');
			$user = $connection->query('SELECT * FROM `users` where email =\''.Arr::get($_POST, 'email').'\' limit 1 ;');

			//print_r($user);

			if ($user->is_loaded())
			{
				//echo "user loaded";
				$firstname = $user->get('firstname', ''); 
				$lastname = $user->get('lastname', '');
				$message = View::factory( 'account/mails/publicpasswordforgot');

				$hash = Text::random();
				$message->link 	   		= URL::base('http', TRUE).Route::get('publicpassword-change')->uri(array('hash' => $hash));
				$message->linkchange 	= URL::base('http', TRUE).'public/application/passwordforgot'; //Route::get('default')->uri();
				$message->username     = $firstname.' '.$lastname;
				// olivier a revoir pour nom du projet Settings::get('project_name')
				//$message->settings = $this->template->settings;

				$builder = DB_SQL::insert('default')
					->into('forgots')
						->column('user_id', $user->get('id', ''), 0)
							->column('hash', $hash , 0)
								->column('expired_at', date('Y-m-d H:i:s') , 0);

				$sql	= $builder->statement();
				$id		= $builder->execute();


				$email = Email::factory()
					->from('no-reply@'.Arr::get($_SERVER, 'SERVER_NAME'))
						->to($user->get('email', ''))
							->subject(Settings::get('project_name').' GCB: '.__('changement de mot de passe'))
								->message($message)
									->send();

				//Hint::set(Hint::SUCCESS, __('cms.password.link_sent'));

				//HTTP::redirect(Route::get('password-sent')->uri());
				
				$this->template->content = View::factory( 'public/user/passwordclear');
			}
			else{
				$this->template->content = View::factory( 'public/user/passwordnotclear');
			}
		}
	}	// action_passwordclear
	
	public function action_inscriptionvalide()
	{
		$post = $this->request->post();
		$texte='';
		
		$email      = Arr::get($_POST, 'email');
		$password   = Arr::get($_POST, 'password');
		$password2  = Arr::get($_POST, 'password2');
		$lastname   = Arr::get($_POST, 'lastname');
		$firstname  = Arr::get($_POST, 'firstname');
		$adresse    = Arr::get($_POST, 'adresse');
		$cp         = Arr::get($_POST, 'cp');
		$ville      = Arr::get($_POST, 'ville');
		$pays       = Arr::get($_POST, 'pays');
		$telephone  = Arr::get($_POST, 'telephone');
		$index      = Arr::get($_POST, 'index');
		
		if($email == NULL 	|| $password == NULL || $password2 == NULL 	|| $firstname == NULL 	|| $lastname == NULL ||
		$email == "" 	|| $password == ""	 || $password2 == ""	|| $firstname == "" 	|| $lastname == "" ) {
			$texte = '<br/><br/><br/>Paramètres invalides !';
			goto END;
		}
		
		$connection = DB_Connection_Pool::instance()->get_connection('default');
		$uservalide = $connection->query('SELECT * FROM `users` where email =\''.Arr::get($_POST, 'email').'\' limit 1 ;');
		
		
		if($uservalide->is_loaded()){
			$texte = $texte. '<br/><br/><br/>Vous avez déja un compte avec cette adresse ('.Arr::get($_POST, 'email').').<br/><a href= "/public/application/inscription">Recommencez</a>';
		}
		else {
			$user 					= DB_ORM::model('Users');
			$user->username 		= $email;
			$user->lastname 		= $lastname;
			$user->firstname 		= $firstname;
			$user->indgolf 			= $index;
			$user->email 			= $email;
			$user->telephone 		= $telephone;
			$user->adresse 			= $adresse;
			$user->cp 				= $cp;
			$user->ville 			= $ville;
			$user->id_pays 			= $pays;
			$user->password			= Auth::instance()->hash_password($password);
			
			$status = DB_SQL::select('default')
				->from('user_status')
					->where('status', '=', 'pending')
						->query();

			$user->id_status	= $status[0]['id'];
			
			//$user->activated 		= 2; // en attente de validation
			$user->save(TRUE);
			
			// creation de la fiche en membre
			// a revoir problème modele
			$user_roles = DB_ORM::model('user_roles');
			$user_roles->user_id = $user->id;
			// a revoir récupérer membre dans la base
			$user_roles->role_id = '15'; // en membre
			$user_roles->save(true);
			
			$texte= __('<br/>Votre fiche a été enregistrée. Vous recevrez un mail de confirmation lors de la validation de votre fiche.');
		}
		
		END:
		
		$this->template->title = 'Golf Club de Bourbon - Inscription';
		$this->template->content = View::factory( 'public/user/valide');
		$this->template->content->texte = $texte;
	}	// action_inscriptionvalide
	
	public function action_calendrier()	 // DHTMLX clean
	{
		// DHTMLX
		$premier_depart = $this->golf->heure_ouverture;
		$premier_depart = strtotime($premier_depart);
		$premier_depart = date('H', $premier_depart);
		
		$dernier_depart = $this->golf->heure_fermeture;
		$dernier_depart = strtotime($dernier_depart);
		$dernier_depart = date('H', $dernier_depart);
		
		// parametres de blocage des dates depassées
		$block_time_before_start = date("Y-m-d H:i:s", strtotime("-10 years"));
		$minute = date('i');
		while(($minute % 10) != 0){ $minute++; };	// arrondi toutes les 10 minutes
		$hour = date('H');
		if($minute == 60){
			if($hour == 23){
				$minute = 59;
			}else{
				$hour = date('H', strtotime("+1 hour"));
				$minute = 00;
			}
		}
		$block_time_before_end = date("Y-m-d " .$hour .":" .$minute .":59");
		
		// parametres de blocage des dates trop lointaines
		$block_time_after_start = date("Y-m-d 23:59:59", 	strtotime("+3 days 4 hours"));	// Deblocage du jour suivant à 20h00
		$block_time_after_end = date("Y-m-d H:i:s", strtotime("+2 years"));
		
		// $this->template->title = 'Réservation - Golf Club de Bourbon';
		$this->template->content = View::factory('/fragments/calendrier');
		$this->template->content->ressources	= $this->ressources;
		$this->template->content->parcours		= $this->parcours;
		
		if($this->isLogged && !$this->isAdmin){
			// $this->template->content->current_user_fullname =  " ".$this->user->firstname." ".$this->user->lastname." (".$this->user->indgolf.")";
			$this->template->content->current_user_id =  $this->user->id;
		}else{
			// $this->template->content->current_user_fullname =  "";
			$this->template->content->current_user_id =  "";
		}
		// Set active page in menu
		$this->pages["resa"]["sub"]["calendrier"]["active"] = true;
		$this->pageTitle = "Calendrier";
		// $this->pageBreadcrumbs["Calendrier"] = "/app/calendrier";
		
		// Helper to add css file
		Helpers_Stylesheet::add('/assets/js/dhtmlxScheduler/codebase/dhtmlxscheduler.css');
		Helpers_Stylesheet::add('/assets/css/easygolfpack/egp_calendrier.css');	// en dernier pour les priorités CSS

		Helpers_Stylesheet::add('/assets/css/colourPicker/jquery.colourPicker.css');

		// Helper to inject vars to JS
		Helpers_InputForJs::add('thisAction', 'calendrier');
		Helpers_InputForJs::add('premier_depart', $premier_depart);
		Helpers_InputForJs::add('dernier_depart', $dernier_depart);
		Helpers_InputForJs::add('block_time_before_start', $block_time_before_start);
		Helpers_InputForJs::add('block_time_before_end', $block_time_before_end);
		Helpers_InputForJs::add('block_time_after_start', $block_time_after_start);
		Helpers_InputForJs::add('block_time_after_end', $block_time_after_end);
		// // Helper to add js file
		Helpers_Javascript::add('/assets/js/plugin/jquery-form/jquery-form.min.js');
		Helpers_Javascript::add('/assets/js/plugin/colorpicker/bootstrap-colorpicker.min.js"');
		Helpers_Javascript::add('/assets/js/dhtmlxScheduler/codebase/dhtmlxscheduler.js');
		Helpers_Javascript::add('/assets/js/dhtmlxScheduler/codebase/locale/locale_fr.js');
		Helpers_Javascript::add('/assets/js/dhtmlxScheduler/codebase/ext/dhtmlxscheduler_units.js');
		Helpers_Javascript::add('/assets/js/dhtmlxScheduler/codebase/ext/dhtmlxscheduler_limit.js');
		Helpers_Javascript::add('/assets/js/dhtmlxScheduler/codebase/ext/dhtmlxscheduler_minical.js');
		Helpers_Javascript::add('/assets/js/dhtmlxScheduler/codebase/ext/dhtmlxscheduler_tooltip.js');
		Helpers_Javascript::add('/assets/js/dhtmlxScheduler/codebase/ext/dhtmlxscheduler_multiselect.js');
		Helpers_Javascript::add('/assets/js/dhtmlxScheduler/codebase/ext/dhtmlxscheduler_recurring.js');
		Helpers_Javascript::add('/assets/js/dhtmlxScheduler/codebase/ext/dhtmlxscheduler_agenda_view.js');
		Helpers_Javascript::add('/assets/js/dhtmlxScheduler/codebase/ext/dhtmlxscheduler_grid_view.js');

		Helpers_Javascript::add('/assets/js/colourPicker/jquery.colourPicker.js');

		// load main App Module JS
		Helpers_Javascript::add('/assets/js/easygolfpack/egp.js');
	}	// action_calendrier
	
	public function action_wizard()
	{
		$beginTime 	= new DateTime($this->golf->heure_ouverture);
		$endTime 	= new DateTime($this->golf->heure_fermeture);
		$lastStartFor18hole = new DateTime($this->golf->heure_fermeture);
		$lastStartFor18hole->sub(new DateInterval('PT2H'));	// cesar: TODO mieux gérer le dernier depart en 18 trous.
		$success = false;
		$message = "";
		
		// Construction du tableau des slots horaires
		$timeStr = "";
		while($beginTime <= $endTime) {
			$timeStr .= ' "'.$beginTime->format('H:i').'",';
			// $beginTime->add(new DateInterval('PT10M'));	// cesar: +10Minutes)
			$beginTime->add(new DateInterval('PT' .$this->golf->intervalle .'M'));	// cesar: +10Minutes)
			//	cesar: TODO:ajouter un parametre de durée d'un slot horaire
		}
		$timeStr = substr($timeStr, 0, -1);
		
		// Initialisation de la date maximum de résa pour les membres
		$currentDateTime = new DateTime();
		$maxDateTime = new DateTime();
		if($this->isLogged){
			if($this->isAdmin){
				$maxDateTime->setTimestamp(strtotime("+90 days 4 hours"));	// Max resa date for admin
			}else{
				$maxDateTime->setTimestamp(strtotime("+3 days 4 hours"));	// Max resa date for users
			}
		}else{
			$maxDateTime->setTimestamp(strtotime("+30 days 4 hours"));		// Max resa date for visitors
		}
		$maxDateTime->setTime(23,59,59);
		$maxDate = $maxDateTime->diff($currentDateTime)->format("%a");
		
		$players = array();
		if ($this->isLogged) {
			// ajoute le joueur courant dans le 1 er slot et vide les 3 autres
			$players[1]['name'] = $this->user->firstname." ".$this->user->lastname ." (" .$this->user->indgolf .")";
			$players[1]['tags'] = "' disabled tag='locked' ";
			$players[1]['id'] = $this->user->id;
			for ($i=2 ; $i<=4; $i++){
				$players[$i]['name'] = "";
				$players[$i]['tags'] = "";
				$players[$i]['id'] = '';
			}
		}
		
		// Set active page in menu
		$this->pages["resa"]["sub"]["wizard"]["active"] = true;
		$this->pageTitle = "Assistant";

		$this->template->title = 'Assistant de réservation - Golf Club de Bourbon';
		$this->template->content = View::factory( '/fragments/wizard');
		$this->template->content->logged_in_user 		= $this->user;
		$this->template->content->parcours 				= $this->parcours;
		$this->template->content->ressources 			= $this->ressources;
		$this->template->content->maxdate				= $maxDate;
		$this->template->content->timeStr				= $timeStr;
		$this->template->content->players 				= $players;
		$this->template->content->lastStartFor18hole	= $lastStartFor18hole->format('H:i');
		$this->template->content->success 				= false;
		$this->template->content->message 				= "";

		$this->template->appscript = "";
		
		// Helper to pass vars to JS
		Helpers_InputForJs::add('thisAction', 'wizard');
		Helpers_InputForJs::add('maxDate', $maxDate);
		// Helper to add css file
		Helpers_Stylesheet::add('/assets/css/easygolfpack/egp_wizard.css');
		// Helpers_Stylesheet::add('/assets/libs/easygolfpack/css/wizard-css.css');
		// Helpers_Stylesheet::add('/assets/admin/css/wizard.css');
		// Helpers_Stylesheet::add('/assets/admin/css/form.css');
		// Helpers_Stylesheet::add('/assets/wizard/formwizard.css');
		// Helper to add js file
		// Helpers_Javascript::add('/assets/wizard/formwizard.js');
		Helpers_Javascript::add('/assets/js/plugin/jquery-form/jquery-form.min.js');
		Helpers_Javascript::add('/assets/js/plugin/knob/jquery.knob.min.js"');
		Helpers_Javascript::add('/assets/js/libs/i18n/jquery.ui.datepicker-fr.js');
		// load main App Module JS
		Helpers_Javascript::add('/assets/js/easygolfpack/egp.js');
		// Helpers_Javascript::add('/assets/libs/easygolfpack/js/egp-wizard.js');
		
	}	// action_wizard
	
}	// Class Controller_Public_Application
