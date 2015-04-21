<?php defined('SYSPATH') or die('No direct script access.');

class Model_Leap_Settings extends DB_ORM_Model
{
	public function __construct() {
		parent::__construct();

		$this->fields = array
		(
			'key' => new DB_ORM_Field_String($this, array(
				'max_length' => 255,
				'nullable' => FALSE,
			)),
			'value' => new DB_ORM_Field_String($this, array(
				'max_length' => 255,
				'nullable' => TRUE,
			)),
			'default' => new DB_ORM_Field_String($this, array(
				'max_length' => 255,
				'nullable' => TRUE,
			)),
			'editable' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 1,
				'nullable' => TRUE,
			)),
			'description' => new DB_ORM_Field_Text($this, array(
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
		return 'settings';
	}

	public static function primary_key() {
		return array('key', );
	}

}