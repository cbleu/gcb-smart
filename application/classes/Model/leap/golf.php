<?php defined('SYSPATH') or die('No direct script access.');

class Model_Leap_Golf extends DB_ORM_Model
{
	public function __construct() {
		parent::__construct();

		$this->fields = array
		(
			'id' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => FALSE,
			)),
			'nom' => new DB_ORM_Field_String($this, array(
				'max_length' => 45,
				'nullable' => TRUE,
			)),
			'adresse' => new DB_ORM_Field_String($this, array(
				'max_length' => 45,
				'nullable' => TRUE,
			)),
			'cp' => new DB_ORM_Field_String($this, array(
				'max_length' => 45,
				'nullable' => TRUE,
			)),
			'ville' => new DB_ORM_Field_String($this, array(
				'max_length' => 45,
				'nullable' => TRUE,
			)),
			'pays' => new DB_ORM_Field_String($this, array(
				'max_length' => 45,
				'nullable' => TRUE,
			)),
			'intervalle' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => TRUE,
			)),
			'heure_ouverture' => new DB_ORM_Field_DateTime($this, array(
				'nullable' => TRUE,
			)),
			'heure_fermeture' => new DB_ORM_Field_DateTime($this, array(
				'nullable' => TRUE,
			)),
			'smtp_host' => new DB_ORM_Field_String($this, array(
				'max_length' => 255,
				'nullable' => TRUE,
			)),
			'smtp_port' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => TRUE,
			)),
			'smtp_username' => new DB_ORM_Field_String($this, array(
				'max_length' => 45,
				'nullable' => TRUE,
			)),
			'smtp_password' => new DB_ORM_Field_String($this, array(
				'max_length' => 45,
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
		return 'golf';
	}

	public static function primary_key() {
		return array('id', );
	}

}