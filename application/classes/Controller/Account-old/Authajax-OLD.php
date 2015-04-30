<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Handles login/logout.
 * Notice that this is the only controller not extending Controller_Main
 * since this is the only page not requiring being logged in
 */
class Controller_Account_Authajax extends Controller
{

    public function action_login() {

	
		/* modif olivier a revoir */
		$redirect = isset($_REQUEST['redirect']) ? $_REQUEST['redirect'] : '/';

		//disable auto rendering if requested using ajax
        if($this->request->is_ajax()){
            $this->auto_render = FALSE;
        }

        // Logged in users should not see this page
        if (Auth::instance()->logged_in()) {
           	echo json_encode(array(
				'valid' => true,
				'redirect' => $redirect
			));
			exit();
        }

        // If the login form was posted...
        $post = $this->request->post();

		//Arr::get($_POST, 'username');
        if (isset($post['username'])) {

            // Try to login
            if (Auth::instance()->login($post['username'], $post['password'])) {
				
				$user = Auth::instance()->get_user();
				
				$enable_status = DB_SQL::select('default')
					->from('user_status')
					->where('status', '=', 'enable')
					->query();
					
				if($user->id_status != $enable_status[0]['id']) {
					Auth::instance()->logout();
					$error = 'Utilisateur désactivé.';
	 				echo json_encode(array(
						'valid' => false,
						'error' => $error
					));
					exit();
				}	
	
				/*if (Auth::instance()->logged_in('admin'))
				{
					$redirect = Route::get('dashboard')->uri();
				}
				else{*/
				$redirect = '/';
				//}
 				echo json_encode(array(
					'valid' => true,
					'redirect' => $redirect
				));
				exit();
            } else {
					$error = 'Utilisateur ou mot de passe invalide. Réessayez.';
	 				echo json_encode(array(
						'valid' => false,
						'error' => $error
					));
					exit();
            }
        }
    }

    /**
     * Log the user out
     * @return void
     */
    public function action_logout() {
        Auth::instance()->logout();
        header('Location: '.$redirect);
		exit();
    }

}
