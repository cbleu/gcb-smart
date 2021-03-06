<?php defined('SYSPATH') or die('No direct script access.');

class Model_Leap_Sessions extends DB_ORM_Model
{
	public function __construct() {
		parent::__construct();

		$this->fields = array
		(
			'id' => new DB_ORM_Field_String($this, array(
				'max_length' => 24,
				'nullable' => FALSE,
			)),
			'last_active' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => FALSE,
			)),
			'contents' => new DB_ORM_Field_Text($this, array(
				'nullable' => FALSE,
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
		return 'sessions';
	}

	public static function primary_key() {
		return array('id', );
	}

}