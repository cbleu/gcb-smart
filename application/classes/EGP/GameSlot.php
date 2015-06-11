<?php defined('SYSPATH') or die('No direct script access.');

class  EGP_GameSlot
{
    const UNIQ   = 0;
    const ALLER  = 1;
    const RETOUR = 2;

	public $id;
	public $resa;				// un objet de type DB_ORM::model("reservation")
	public $type;				// O = 9 trous ou inconnu; 1 = Aller d'un 18 trous; 2 retour d'un 18 trous
	public $typeParcours;		// objet de type DB_ORM::model("type_parcours")
	public $players = array();	// Tableau d'objet de type GamePlayer des joueurs sur ce parcours
	public $nbPlayers = 0;		// Nb de joueurs sur ce parcours
	
	public function  EGP_GameSlot($thisresa = null, $thistype = 0){
		$this->setSlot($thisresa, $thistype);
	}
	
	public function setSlot($thisresa, $thistype = 0){
	// public function setSlot($thisid, $thistype = 0){
		if($thisresa != null){
			// $this->resa 	= DB_ORM::model("reservation", array($thisid));
			$this->resa 		= $thisresa;
			$this->id			= $this->resa->id;
			$this->typeParcours = DB_ORM::model("type_parcours", array($this->resa->id_type_parcours));
		}
		$this->type		= $thistype;
	}
}	// Class EGP_GamePlayer

