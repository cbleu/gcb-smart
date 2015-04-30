<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Golf_Reglages extends Controller_Main {

    public function before() {
	
	 	$this->template = 'admin';
	
        parent::before();

		
        if (!Auth::instance()->logged_in('admin')) {
            HTTP::redirect('login');
       	}

		$this->template->content = View::factory( '/admin/content');
		$this->template->content->header_nav = View::factory( '/admin/header_nav');
        $this->template->title = 'Dashboard';
		$this->template->content->header_nav->home	=	0;
		$this->template->content->header_nav->users	=	0;
		$this->template->content->header_nav->reservation	=	0;
		$this->template->content->header_nav->competition	=	0;
		$this->template->content->header_nav->settings	=	1;
    }

	public function after()
	{
		Session::instance()->set('affected_ids', array());

		parent::after();
	}
	
	public function action_index() {
 
        $this->template->title = 'Dashboard - Réglages';

		$this->template->content= View::factory( '/admin/liste');
		$this->template->content->header_nav = View::factory( '/admin/header_nav');
		$this->template->content->header_nav->home	=	0;
		$this->template->content->header_nav->users	=	0;
		$this->template->content->header_nav->reservation	=	0;
		$this->template->content->header_nav->competition	=	0;
		$this->template->content->header_nav->settings	=	1;
		
		$this->template->content->nomtable="Réglages";
		
		$colonne =array("Nom","Adresse","Code postal", "Ville","Pays","Intervalle parcours");
		
		$this->template->content->colonne = $colonne;
		
		$reglages = DB_SQL::select('default')
				->from('golf')
				->query();
		$i = 0;
		foreach ($reglages as $reglage) {
			$elements[$i]['Nom'] 		= $reglage['nom'];
			$elements[$i]['Adresse'] 	= $reglage['adresse'];
			$elements[$i]['Code postal'] 		= $reglage['cp'];
			$elements[$i]['Ville'] 		= $reglage['ville'];
			$elements[$i]['Pays'] 		= $reglage['pays'];
			$elements[$i]['Intervalle parcours'] 		= $reglage['intervalle'];
			$i++;
		}

		$lien = '/golf/reglages/';
		$this->template->content->elements = $elements;
		$this->template->content->lien = $lien;
	}
	
	public function action_edit() {
		$this->template->title = 'Dashboard - Editer';

	}
		
	public function action_add() {
 
        $this->template->title = 'Dashboard - Ajout';
		
	}

}