<?php defined('SYSPATH') or die('No direct script access.');

/**
 * EGP_GameSlot
 *
 * @package default
 * @author Cesar Jacquet
 */
class  EGP_GameSlot
{
	const UNIQ   = 0;
	const ALLER  = 1;
	const RETOUR = 2;

	public $id;					// id de la resa (table "reservation")
	public $gameType;			// O = 9 trous ou inconnu; 1 = Aller d'un 18 trous; 2 retour d'un 18 trous
	public $players = array();	// Tableau d'objet de type GamePlayer des joueurs sur ce parcours
	public $typeParcoursId;		// id du parcours (table "type_parcours")
	public $duration;			// Duree du parcours (table "type_parcours" )
	public $begin;				// Datetime du début
	public $end;				// Datetime de la fin
	public $startTee;			// Trou de départ de ce parcours (table "type_parcours")
	public $nbTee;				// Nb de trous (tee) dans ce parcours (table "type_parcours")

	private $isProvisoire = true;// Slot provisoire ou pas
	private $nbProvisoire = 0;	// Nb de places provisoires bloquees

	// public $resa;				// DEPRECATED un objet de type DB_ORM::model("reservation")
	// public $typeParcours;		// DEPRECATED objet de type DB_ORM::model("type_parcours")
	// private $nbPlayers = 0;		// DEPRECATED Nb de joueurs sur ce parcours
	
	public function  EGP_GameSlot($thisresa = null, $isProvisoire = false, $thistype = 0){
		$this->setSlot($thisresa, $thistype);
		if($isProvisoire){
			$this->isProvisoire = true;
		}else{
			$this->isProvisoire = false;
		}
	}
	
	public function setSlot($thisresa, $thistype = 0){

		$this->gameType				= $thistype;

		if($thisresa != null){
			$this->id				= $thisresa->id;

			$this->setParcours($thisresa->id_type_parcours, $thisresa->date_reservation);

			// $this->resa 			= $thisresa;	// DEPRECATED
			// $this->typeParcours 	= DB_ORM::model("type_parcours", array($this->resa->id_type_parcours)); 	// DEPRECATED
		}
	}

	public function setParcours($id_type_parcours, $begin_date){

		// Récupération des infos du parcours
		if(isset($id_type_parcours)){
			$typeParcours = DB_ORM::model("type_parcours", array($id_type_parcours));
		}else{
			return false;
		}
		if ($begin_date instanceof Datetime){
			$begin_datetime = clone($begin_date);
		}else{
			$begin_datetime = new Datetime($begin_date);
		}
		$this->typeParcoursId 	= $typeParcours->id;
		$this->duration 		= $typeParcours->duree;
		$this->startTee 		= $typeParcours->trou_depart;
		$this->nbTee 			= $typeParcours->nb_trous;

		// $end_datetime = new Datetime($begin_datetime->format('Y-m-d H:i:s'));
		$end_datetime = new Datetime($begin_datetime->format('Y-m-d H:i:s'));
		$end_datetime->add(new DateInterval('PT' .$typeParcours->duree .'S'));

		$this->begin 			= $begin_datetime;
		$this->end 				= $end_datetime;
		
		return true;
	}
	
	public function nbPlayers(){
		if($this->isProvisoire){
			return $this->nbProvisoire;
		}else{
			return count($this->players);
		}
	}

	public function addPlayer($player){
		if ($player instanceof EGP_GamePlayer){
			$this->players[$player->id] = $player;
			return $player->id;
		}
		return false;
	}

	public function addPlayers($players){
		if (is_array($players)){
			$this->players = $players;
			return true;
		}
		return false;
	}

	public function setNProviPlayers($nb){
		$this->nbProvisoire = $nb;
		// $proviPlayer = new EGP_GamePlayer(0, 18, "", "", "provisoire");
		// for ($i = 0; i < $nb; $i++){
		// 	$this->players.push($proviPlayer);
		// 	// $this->addPlayer($proviPlayer);
		// }
	}

	public function removePlayer($playerId){
		// for($i = 0; $i < count($this->players); $i++){
		// 	if($this->players[$i]->id == $playerId){
		if(isset($this->players[$playerId])){
			unset($this->players[$playerId]);
			return $playerId;
		}
		return null;
	}

}	// Class EGP_GamePlayer

