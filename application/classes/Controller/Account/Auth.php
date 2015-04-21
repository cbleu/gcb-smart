<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Account_Auth extends Controller_EGP_Main
{

	public function before() 
	{
		$this->template = 'EGP/egp_template';
		parent::before();
	}

	/**
	* Shows the login page and handles login
	* @return void
	*/
	public function action_login() {
		// Logged in users should not see this page
		if (Auth::instance()->logged_in()) {
			HTTP::redirect('/');
		}
		// If the login form was posted...
		$post = $this->request->post();
		// if (isset($post['login'])) {
		// 	// Try to login
			if (Auth::instance()->login($post['username'], $post['password'])) {
				
				$user = Auth::instance()->get_user();
				
				$enable_status = DB_SQL::select('default')
					->from('user_status')
						->where('status', '=', 'enable')
							->query();
					
				if($user->id_status != $enable_status[0]['id']) {
					Auth::instance()->logout();
					$error = 'Utilisateur désactivé.';
					Notify::msg($error, 'error');
				} else {
					HTTP::redirect('/');
				}
			} else {
				$error = 'Problème de login.';
				Notify::msg($error, 'error');
			}
		// }
		// $this->template->content = View::factory('account/auth/login');
		// $this->template->title = 'Authentification requise';
		HTTP::redirect('/');
	}

	/**
	* Log the user out
	* @return void
	*/
	public function action_logout() {
		Auth::instance()->logout();
		HTTP::redirect('/');
	}

	/**
	* Log the user out public site
	* @return void
	*/
	public function action_logoutpublic() {
		$this->action_logout();
	}

}
