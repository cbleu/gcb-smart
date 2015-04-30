<?php defined('SYSPATH') or die('No direct script access.');

/**
* Dashboard controller.
* Handles posting and viewing of past posts
*/
class Controller_Golf_Admin extends Controller_Golf_Main
{
	public $template = 'egp_template';	// Default template
	////////////////////////////////
	// PUBLIC FUNCS ////////////////
	////////////////////////////////
	
	public function before()
	{		
		parent::before();	// execute before for parent Class
		
		if(!$this->isAdmin){
			Notify::msg("Vous devez être administrateur !", 'warning');
			HTTP::redirect('/');
		}

		$this->template = View::factory('egp_template');

		$this->template->konotif = Notify::render();
		 
		Helpers_Stylesheet::add('/assets/css/easygolfpack/egp_main.css');
		

	}	// before
	
	////////////////////////////////
	// ACTION FUNCS ////////////////
	////////////////////////////////
	
	public function action_index()
	{
		// Set active page in menu
		// $this->pages["resa"]["sub"]["calendrier"]["active"] = true;
		$this->pages['admin']['sub']['dashboard']["active"] = true;
		$this->pageTitle = "Dashboard";

		$this->template->content = View::factory('/fragments/admin/admin_dashboard');
	}	// action_index
	

	
}	// Class Controller_Public_Application
