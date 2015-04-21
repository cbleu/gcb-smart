<?php defined('SYSPATH') or die('No direct script access.');

class Model_Leap_Ressources extends DB_ORM_Model
{
	public function __construct() {
		parent::__construct();

		$this->fields = array
		(
			'id' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => FALSE,
			)),
			'ressource' => new DB_ORM_Field_String($this, array(
				'max_length' => 45,
				'nullable' => TRUE,
			)),
			'qte_max_par_partie' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => TRUE,
			)),
			'qte_stock' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => TRUE,
			)),
			'id_golf' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => FALSE,
			)),
		);

		$this->relations = array
		(
			'golf' => new DB_ORM_Relation_BelongsTo($this, array(
				'child_key' => array('id_golf'),
				'parent_model' => 'golf',
				'parent_key' => array('id'),
			)),
		);
	}

	public static function data_source() {
		return 'default';
	}

	public static function table() {
		return 'ressources';
	}

	public static function primary_key() {
		return array('id', );
	}

}