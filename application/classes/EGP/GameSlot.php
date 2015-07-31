<?php defined('SYSPATH') or die('No direct script access.');

class  EGP_GameSlot
{
	const UNIQ   = 0;
	const ALLER  = 1;
	const RETOUR = 2;

	public $id;					// id de la resa (table "reservation")
	public $gameType;			// O = 9 trous ou inconnu; 1 = Aller d'un 18 trous; 2 retour d'un 18 trous
	public $players = array();	// Tableau d'objet de type GamePlayer des joueurs sur ce parcours
	public $duration;			// Duree du parcours (table "type_parcours" )
	public $begin;				// Datetime du début
	public $end;				// Datetime de la fin
	public $startTee;			// Trou de départ de ce parcours (table "type_parcours")
	public $nbTee;				// Nb de trous (tee) dans ce parcours (table "type_parcours")
	public $typeParcoursId;		// id du parcours (table "type_parcours")

	public $resa;				// DEPRECATED un objet de type DB_ORM::model("reservation")
	public $typeParcours;		// DEPRECATED objet de type DB_ORM::model("type_parcours")
	// private $nbPlayers = 0;		// DEPRECATED Nb de joueurs sur ce parcours
	
	public function  EGP_GameSlot($thisresa = null, $thistype = 0){
		// $this->nbPlayers = & $this->nbPlayers();
		$this->setSlot($thisresa, $thistype);
	}
	
	public function setSlot($thisresa, $thistype = 0){
		if($thisresa != null){
			$this->resa 		= $thisresa;
			$this->id			= $this->resa->id;
			$this->typeParcours = DB_ORM::model("type_parcours", array($this->resa->id_type_parcours));
		}
		$this->gameType		= $thistype;
	}
	
	public function nbPlayers(){
		return count($this->players);
	}
	
	public function addPlayer($player){
		if (typeOf($player) == "EGP_GamePlayer"){
			$this->player[] = $player;
		}
	}
}	// Class EGP_GamePlayer

