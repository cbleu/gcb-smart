<?php defined('SYSPATH') or die('No direct script access.');

abstract class Controller_Golf_Main extends Controller_Oscrudc
{
	//////////////////////////////////////////////////////////
	// PUBLIC FUNCS 										//
	//////////////////////////////////////////////////////////
	
	public $isLogged;			// global var for all views. false if not logged
	public $isAdmin;			// global var for all views. false if not admin
	public $isSuperAdmin;		// global var for all views. false if not superadmin
	public $user;				// global var for all views. user object or null
	
	public $golf;
	public $golf_rules;
	public $ressources;
	public $golf_courses;
	public $type_parcours;
	
	public $pages;
	public $pageTitle;
	public $pageCSS;
	public $pageJS;
	public $pageBreadcrumbs;

	public function before()
	{
		//////////////////////////////////////////////////////////

		$this->isLogged 		= Auth::instance()->logged_in();
		// $this->isAdmin 			= Auth::instance()->logged_in('admin');
		$this->isSuperAdmin		= Auth::instance()->logged_in('superadmin');
		if(Auth::instance()->logged_in('admin') || Auth::instance()->logged_in('superadmin')){
			$this->isAdmin 			= true;
		}
		$this->user 			= Auth::instance()->get_user();
		if($this->isLogged){
			$this->userRole			= $this->user->id_status;
		}else{
			$this->userRole			= 0;
		}
		$this->golf 			= DB_ORM::model('Golf', array(1));
		$this->golf_rules 		= DB_SQL::select("default")->from("golf_rules")->query();
		$this->golf_courses 		= DB_SQL::select("default")->from("golf_courses")->query();
		$this->type_parcours 	= DB_SQL::select("default")->from("type_parcours")->query();
		$this->ressources 		= DB_SQL::select("default")->from("ressources")
			->where("id_golf", "=", $this->golf->id)
				->query();
		
		//////////////////////////////////////////////////////////
		// Parent Creator call									//
		parent::before();		// execute before for parent Class
		//////////////////////////////////////////////////////////


		//////////////////////////////////////////////////////////
		// Includes CSS											//
		Helpers_Stylesheet::add('/assets/css/easygolfpack/egp_main.css');
		//////////////////////////////////////////////////////////

		//////////////////////////////////////////////////////////
		// Main Menu											//

		$this->pages = include(APPPATH."/views/inc/menu._base_.ui.php");
		
		if($this->isLogged){
			$this->pages['users'] = include(APPPATH."/views/inc/menu.users.ui.php");
		}
		
		if($this->isAdmin){
			$this->pages['admin'] = include(APPPATH."/views/inc/menu.admin.ui.php");
		}
		if($this->isSuperAdmin){
			$this->pages['admin']['sub']['settings']['sub']['superadmin'] = array(
				'title' => 'Super Admin',
				'icon' => 'fa-wrench txt-color-red',
				'url' => '/admin/settings/superadmin',
			);
		}
		
		//////////////////////////////////////////////////////////


		//////////////////////////////////////////////////////////
		// Make globals available to all views
		View::bind_global('isLogged', $this->isLogged);
		Helpers_InputForJs::add('isLogged', $this->isLogged);
		
		View::bind_global('isAdmin', $this->isAdmin);
		View::bind_global('isSuperAdmin', $this->isSuperAdmin);
		Helpers_InputForJs::add('isAdmin', $this->isAdmin);
		View::bind_global('user', $this->user);
		View::bind_global('thisUser', $this->user);
		View::bind_global('thisRole', $this->userRole);
		if($this->isLogged){
			$userfullname = $this->user->firstname." ".$this->user->lastname; //." (".$this->user->indgolf.")" ;
			Helpers_InputForJs::add('thisUserId', $this->user->id);
			Helpers_InputForJs::add('thisUserFullName', $this->user->firstname." ".$this->user->lastname." (".$this->user->indgolf.")" );
			View::bind_global('thisUserFullName', $userfullname );
		}
		// Share pages infos
		View::bind_global('page_css', $this->pageCSS);
		View::bind_global('page_nav', $this->pages);
		View::bind_global('breadcrumbs', $this->pageBreadcrumbs);
		View::bind_global('page_title', $this->pageTitle);
		//////////////////////////////////////////////////////////
	}	// function before
	

	////////////////////////////////
	// PRIVATE FUNCS ///////////////
	////////////////////////////////
	
}	// end of Class Controller_Main