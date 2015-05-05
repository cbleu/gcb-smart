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