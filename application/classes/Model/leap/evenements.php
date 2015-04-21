<?php defined('SYSPATH') or die('No direct script access.');

class Model_Leap_Evenements extends DB_ORM_Model
{
	public function __construct() {
		parent::__construct();

		$this->fields = array
		(
			'id' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => FALSE,
			)),
			'intitule' => new DB_ORM_Field_String($this, array(
				'max_length' => 45,
				'nullable' => TRUE,
			)),
			'couleur' => new DB_ORM_Field_String($this, array(
				'max_length' => 45,
				'nullable' => TRUE,
			)),
			'date_debut' => new DB_ORM_Field_DateTime($this, array(
				'nullable' => TRUE,
			)),
			'date_fin' => new DB_ORM_Field_DateTime($this, array(
				'nullable' => TRUE,
			)),
			'trou_depart' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => TRUE,
			)),
			'golf_id' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => TRUE,
			)),
			'rec_type' => new DB_ORM_Field_String($this, array(
				'max_length' => 45,
				'nullable' => TRUE,
			)),
			'event_length' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => TRUE,
			)),
			'event_pid' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => TRUE,
			)),
		);

		$this->relations = array
		(
			'golf' => new DB_ORM_Relation_BelongsTo($this, array(
				'child_key' => array('golf_id'),
				'parent_model' => 'golf',
				'parent_key' => array('id'),
			)),
		);
	}

	public static function data_source() {
		return 'default';
	}

	public static function table() {
		return 'evenements';
	}

	public static function primary_key() {
		return array('id', );
	}

}