<?php defined('SYSPATH') or die('No direct script access.');

class Model_Leap_Depart extends DB_ORM_Model
{
	public function __construct() {
		parent::__construct();

		$this->fields = array
		(
			'id' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => FALSE,
			)),
			'id_parcours' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => TRUE,
			)),
			'id_trou_depart' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => TRUE,
			)),
			'nb_trous' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
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
			'trou' => new DB_ORM_Relation_BelongsTo($this, array(
				'child_key' => array('id_trou_depart'),
				'parent_model' => 'trou',
				'parent_key' => array('id'),
			)),
		);
	}

	public static function data_source() {
		return 'default';
	}

	public static function table() {
		return 'depart';
	}

	public static function primary_key() {
		return array('id', );
	}

}