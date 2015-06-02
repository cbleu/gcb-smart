<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Golf_Admin extends Controller_Golf_App
{
	public $crud = null;
	//////////////////////////////////////////////////////////
	// PUBLIC FUNCS ////////////////
	//////////////////////////////////////////////////////////
	
	public function before()
	{
		//////////////////////////////////////////////////////////
		// Parent Creator call									//
		parent::before();		// execute before for parent Class
		//////////////////////////////////////////////////////////

		//////////////////////////////////////////////////////////
		// Admin inlcudes						 				//

		Helpers_Stylesheet::add('/assets/css/flexigrid/flexigrid.css');
		Helpers_Stylesheet::add('/assets/css/flexigrid/jquery.fancybox.css');
		Helpers_Stylesheet::add('/assets/css/bootstrap-select.min.css');

		Helpers_Javascript::add('/assets/js/flexigrid/flexigrid.js');
		Helpers_Javascript::add('/assets/js/flexigrid/cookies.js');
		Helpers_Javascript::add('/assets/js/flexigrid/jquery.form.js');
		Helpers_Javascript::add('/assets/js/flexigrid/jquery.printElement.js');
		Helpers_Javascript::add('/assets/js/flexigrid/jquery.fancybox.pack.js');
		Helpers_Javascript::add('/assets/js/flexigrid/jquery.numeric.min.js');

		Helpers_Javascript::add('/assets/js/bootstrap-select/bootstrap-select.min.js');

		Helpers_Javascript::add('/assets/js/easygolfpack/egp_action_alert.js');

		//////////////////////////////////////////////////////////

		//////////////////////////////////////////////////////////
		// Admin controller only for admin users ! 				//
		if(!$this->isAdmin){
			Notify::msg("Vous devez être administrateur !", 'error');
			HTTP::redirect('/');
		}
		//////////////////////////////////////////////////////////

		//////////////////////////////////////////////////////////
		// Set active page in menu								//
		$this->pages["admin"]["active"] = true;
		$this->pageTitle = "Administration";
		// Set breadcrumbs links
		$this->pageBreadcrumbs = array(
			"Accueil" => "/",
			"Admin" => "/admin",
		);
		//////////////////////////////////////////////////////////
	}	// before
	
	//////////////////////////////////////////////////////////
	// ACTION FUNCS ////////////////
	//////////////////////////////////////////////////////////
	
	public function action_index()
	{
		// Set active page in menu
		// $this->pages["resa"]["sub"]["calendrier"]["active"] = true;
		$this->pages['admin']['sub']['dashboard']["active"] = true;
		$this->pageTitle = "Dashboard";

		$this->template->content = View::factory('/fragments/admin/admin_dashboard');
	}	// action_index
	

	
}	// Class Controller_Public_Application
