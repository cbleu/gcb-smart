<?php defined('SYSPATH') or die('No direct script access.');

class Model_Leap_Parcours extends DB_ORM_Model
{
	public function __construct() {
		parent::__construct();

		$this->fields = array
		(
			'id' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => FALSE,
			)),
			'nom_parcours' => new DB_ORM_Field_String($this, array(
				'max_length' => 45,
				'nullable' => TRUE,
			)),
			'nb_trous_total' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => FALSE,
			)),
			'trou_depart' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => FALSE,
			)),
			'parcour_aller' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => TRUE,
			)),
			'parcour_retour' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => TRUE,
			)),
		);

		$this->relations = array
		(
		);
	}

	public static function data_source() {
		return 'default';
	}

	public static function table() {
		return 'parcours';
	}

	public static function primary_key() {
		return array('id', );
	}

}