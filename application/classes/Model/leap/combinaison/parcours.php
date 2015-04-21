<?php defined('SYSPATH') or die('No direct script access.');

class Model_Leap_Combinaison_parcours extends DB_ORM_Model
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
			'ordre' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => TRUE,
			)),
			'id_type_parcours' => new DB_ORM_Field_Integer($this, array(
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
			'parcours' => new DB_ORM_Relation_BelongsTo($this, array(
				'child_key' => array('id_type_parcours'),
				'parent_model' => 'type_parcours',
				'parent_key' => array('id'),
			)),
			'parcours' => new DB_ORM_Relation_BelongsTo($this, array(
				'child_key' => array('id_parcours'),
				'parent_model' => 'parcours',
				'parent_key' => array('id'),
			)),
			'parcours' => new DB_ORM_Relation_BelongsTo($this, array(
				'child_key' => array('id_type_parcours'),
				'parent_model' => 'type_parcours',
				'parent_key' => array('id'),
			)),
			'parcours' => new DB_ORM_Relation_BelongsTo($this, array(
				'child_key' => array('id_parcours'),
				'parent_model' => 'parcours',
				'parent_key' => array('id'),
			)),
			'parcours' => new DB_ORM_Relation_BelongsTo($this, array(
				'child_key' => array('id_type_parcours'),
				'parent_model' => 'type_parcours',
				'parent_key' => array('id'),
			)),
			'parcours' => new DB_ORM_Relation_BelongsTo($this, array(
				'child_key' => array('id_parcours'),
				'parent_model' => 'parcours',
				'parent_key' => array('id'),
			)),
			'parcours' => new DB_ORM_Relation_BelongsTo($this, array(
				'child_key' => array('id_type_parcours'),
				'parent_model' => 'type_parcours',
				'parent_key' => array('id'),
			)),
		);
	}

	public static function data_source() {
		return 'default';
	}

	public static function table() {
		return 'combinaison_parcours';
	}

	public static function primary_key() {
		return array('id', );
	}

}