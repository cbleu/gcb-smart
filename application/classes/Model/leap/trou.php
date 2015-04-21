<?php defined('SYSPATH') or die('No direct script access.');

class Model_Leap_Trou extends DB_ORM_Model
{
	public function __construct() {
		parent::__construct();

		$this->fields = array
		(
			'id' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => FALSE,
			)),
			'numero' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => TRUE,
			)),
			'id_parcours' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => TRUE,
			)),
			'can_be_first' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 1,
				'nullable' => TRUE,
			)),
		);

		$this->relations = array
		(
			'parcours' => new DB_ORM_Relation_BelongsTo($this, array(
				'child_key' => array('id_parcours'),
				'parent_model' => 'parcours',
				'parent_key' => array('id'),
			)),
		);
	}

	public static function data_source() {
		return 'default';
	}

	public static function table() {
		return 'trou';
	}

	public static function primary_key() {
		return array('id', );
	}

}