<?php defined('SYSPATH') or die('No direct script access.');

class Helpers_Tools
{
	////////////////////////////////
	// PUBLIC FUNCS ////////////////
	////////////////////////////////
	
	/**
	* create_time_range 
	* 
	* @param mixed $start start time, e.g., 9:30am or 9:30
	* @param mixed $end   end time, e.g., 5:30pm or 17:30
	* @param string $by   1 hour, 1 mins, 1 secs, etc.
	* @access public
	* @return void
	*/
	public function create_time_range($start, $end, $by='10 mins') {

		$start_time = strtotime($start);
		$end_time   = strtotime($end);

		$current    = time();
		$add_time   = strtotime('+'.$by, $current);
		$diff       = $add_time-$current;

		$times = array();
		while ($start_time < $end_time) {
			$times[] = $start_time;
			$start_time += $diff;
		}
		$times[] = $start_time;
		return $times;
	}

	public static function getOtherResaOnTheSameSlotAs($mainresaId){
		$returnarray = array();
		$main_reservations = DB_ORM::model("reservation", array(intval($mainresaId)));
		$leparcours = DB_ORM::model("type_parcours", array($main_reservations->id_type_parcours));

		$other_reservations = DB_SQL::select('default')
			->from('reservation')
				->where('date_reservation', '=', $main_reservations->date_reservation)
					->where('id_type_parcours', '=', $main_reservations->id_type_parcours, "AND")
						->where('id', '<>', $mainresaId, "AND")
							->query();
		foreach($other_reservations as $anotherone){
			$returnarray[] = $anotherone;
		}
		return $returnarray;
	}

	public static function PurgeExpiredResaProvi()
	{
		$date = new Datetime();
		$until = $date->format('Y-m-d H:i:s');
		$query = DB_SQL::delete('default')
				->from('reservation')
					->where('reservation.temp_until', '<', $until)
						->execute();
	}	// PurgeExpiredResaProvi
	
} //Class Tools

