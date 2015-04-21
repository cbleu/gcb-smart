<?php defined('SYSPATH') or die('No direct script access.');

class Model_Leap_User_status extends DB_ORM_Model
{
	public function __construct() {
		parent::__construct();

		$this->fields = array
		(
			'id' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => FALSE,
			)),
			'status' => new DB_ORM_Field_String($this, array(
				'max_length' => 45,
				'nullable' => TRUE,
			)),
			'name' => new DB_ORM_Field_String($this, array(
				'max_length' => 45,
				'nullable' => TRUE,
			)),
			'description' => new DB_ORM_Field_String($this, array(
				'max_length' => 255,
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
		return 'user_status';
	}

	public static function primary_key() {
		return array('id', );
	}

}