<?php defined('SYSPATH') or die('No direct script access.');

class Model_Leap_Temps_parcours extends DB_ORM_Model
{
	public function __construct() {
		parent::__construct();

		$this->fields = array
		(
			'id' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => FALSE,
			)),
			'nb_joueurs' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => TRUE,
			)),
			'duree' => new DB_ORM_Field_DateTime($this, array(
				'nullable' => TRUE,
			)),
			'id_parcours' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => FALSE,
			)),
		);

		$this->relations = array
		(
			'golf_courses' => new DB_ORM_Relation_BelongsTo($this, array(
				'child_key' => array('id_parcours'),
				'parent_model' => 'golf_courses',
				'parent_key' => array('id'),
			)),
		);
	}

	public static function data_source() {
		return 'default';
	}

	public static function table() {
		return 'temps_parcours';
	}

	public static function primary_key() {
		return array('id', );
	}

}