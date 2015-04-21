<?php defined('SYSPATH') or die('No direct script access.');

class Model_Leap_Golf_rules extends DB_ORM_Model
{
	public function __construct() {
		parent::__construct();

		$this->fields = array
		(
			'rule' => new DB_ORM_Field_String($this, array(
				'max_length' => 16,
				'nullable' => FALSE,
			)),
			'value' => new DB_ORM_Field_String($this, array(
				'max_length' => 16,
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
		return 'golf_rules';
	}

	public static function primary_key() {
		return array('rule', );
	}

}