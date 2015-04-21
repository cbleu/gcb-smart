<?php defined('SYSPATH') or die('No direct script access.');

/**
* Handles login/logout.
* Notice that this is the only controller not extending Controller_Main
* since this is the only page not requiring being logged in
*/
class Controller_Account_Login extends Controller
{
	public function action_login() {
		$post = $this->request->post();
		if (isset($post['username'])) {
				
			if(Auth::instance()->login($post['username'], $post['password'])) {
				$user = Auth::instance()->get_user();
				
				$enable_status = DB_SQL::select('default')
					->from('user_status')
						->where('status', '=', 'enable')
							->query();

				if($user->id_status != $enable_status[0]['id']) {
					Auth::instance()->logout();
					$error = 'Utilisateur désactivé.';
				}
			}
		}
		HTTP::redirect('/');
	}
}