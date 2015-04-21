<?php defined('SYSPATH') or die('No direct script access.');

class Model_Leap_Pays extends DB_ORM_Model
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
				'max_length' => 145,
				'nullable' => TRUE,
			)),
			'code' => new DB_ORM_Field_String($this, array(
				'max_length' => 5,
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
		return 'pays';
	}

	public static function primary_key() {
		return array('id', );
	}

}