<?php defined('SYSPATH') or die('No direct script access.');

abstract class Controller_Golf_Main extends Controller_Oscrudc
{
	//////////////////////////////////////////////////////////
	// PUBLIC FUNCS 										//
	//////////////////////////////////////////////////////////
	
	public $isLogged;			// global var for all views. false if not logged
	public $isAdmin;			// global var for all views. false if not admin
	public $user;				// global var for all views. user object or null
	
	public $golf;
	public $golf_rules;
	public $ressources;
	public $parcours;
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
		$this->isAdmin 			= Auth::instance()->logged_in('admin');
		$this->user 			= Auth::instance()->get_user();
		
		$this->golf 			= DB_ORM::model('Golf', array(1));
		$this->golf_rules 		= DB_SQL::select("default")->from("golf_rules")->query();
		$this->parcours 		= DB_SQL::select("default")->from("parcours")->query();
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
		$this->pages = array(
			"egp" => array(
				"title" => "Tableau de bord",
				"url" => "/",
				"icon" => "fa-home"
			),
			"resa" => array(
				"title" => "Planning",
				// "url" => "/app/calendrier",
				"icon" => "fa-calendar txt-color-greenLight",
				"sub" => array(
					"calendrier" => array(
						"title" => "Planning des départs",
						"url" => '/app/calendrier'
					),
					"wizard" => array(
						"title" => "Assistant de réservation",
						"url" => '/app/wizard'
					),
				),
			),
		);
		
		if($this->isLogged){
			$this->pages["user"] = array(
				"title" => "Mes Informations",
				"url" => '/app/informations',
				"icon" => "fa-user txt-color-blueLight",
			);
		}
		
		if($this->isAdmin){
			$this->pages["admin"] = array(
				'title' => 'Administration',
				'icon' => 'fa-folder-open',
				'sub' => array(
					'dashboard' => array(
						'title' => 'Dashboard',
						'icon' => 'fa-tachometer',
						'url' => '/admin',
					),

					'users' => array(
						'title' => 'Gestion des usagers',
						'icon' => 'fa-users',
						'sub' => array(
							'members' => array(
								'title' => 'Listing des membres',
								// 'icon' => 'fa-users',
								'url' => '/admin/users/',
							),
							'roles-list' => array(
								'title' => 'Listing des roles',
								'url' => '/admin/roles',
							),
							'roles-set' => array(
								'title' => 'Affectation des roles',
								'url' => '/admin/rolesusers',
							),
						),//sub

					),//users

					'planning' => array(
						'title' => 'Gestion du planning',
						'icon' => 'fa-calendar',
						'sub' => array(
							'events' => array(
								'title' => 'Evenements',
							),
							'visiteurs' => array(
								'title' => 'Demande de visiteurs',
							),
							'today' => array(
								'title' => 'Départs du jour',
							),
						),// sub

					),// planning

					'golf' => array(
						'title' => 'Gestion du Golf',
						'icon' => 'fa-cog',
						'sub' => array(
							'settings' => array(
								'title' => 'Paramètres globaux',
							),
							'parcours' => array(
								'title' => 'Gestion du parcours',
							),
							'display' => array(
								'title' => 'Affichage',
							),
						),//sub

					),// golf

				),// admin
			);
		}
		//////////////////////////////////////////////////////////

		//////////////////////////////////////////////////////////
		// Make globals available to all views
		View::bind_global('isLogged', $this->isLogged);
		Helpers_InputForJs::add('isLogged', $this->isLogged);
		
		View::bind_global('isAdmin', $this->isAdmin);
		Helpers_InputForJs::add('isAdmin', $this->isAdmin);
		View::bind_global('user', $this->user);
		View::bind_global('thisUser', $this->user);
		Helpers_InputForJs::add('thisUserId', $this->user->id);
		Helpers_InputForJs::add('thisUserFullName', $this->user->firstname." ".$this->user->lastname." (".$this->user->indgolf.")" );
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