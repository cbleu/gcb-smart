<?php defined('SYSPATH') or die('No direct script access.');

class EGP_GamePlayer
{
	public $id				= 1;	// invité par defaut
	public $nbTrous			= 9;	// 9 trous par defaut
	public $userHasResa		= 0;	// l'id de l'entree dans la table user_has_reservation
	public $parcourId;				// l'id du parcour dans la table parcours
	public $typeParcourIds	= array();	// les ids des demis-parcours dans l'ordre aller/retour de type_parcours
	public $ressources		= array();	// tableau des noms de ressources
	public $ressourcesIds	= array();	// tableau des id des types de ressources
	public $firstname		= "";		// prenom
	public $lastname		= "";		// nom
	public $info			= "";		// pour les invités ou visiteurs: l'info saisie 
	
	public function EGP_GamePlayer($id, $nbhole, $firstname = "", $lastname = "", $info = ""){
		$this->id		= $id;
		$this->nbTrous	= $nbhole;
		$this->firstname= $firstname;
		$this->lastname = $lastname;
		$this->info		= $info;
	}
}	// Class EGP_GamePlayer

