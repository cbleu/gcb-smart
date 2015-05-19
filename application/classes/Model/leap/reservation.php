<?php defined('SYSPATH') or die('No direct script access.');

class Model_Leap_Reservation extends DB_ORM_Model
{
	public function __construct() {
		parent::__construct();

		$this->fields = array
		(
			'id' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => FALSE,
			)),
			'id_users' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'unsigned' => TRUE,
				'nullable' => TRUE,
			)),
			'id_type_parcours' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => FALSE,
			)),
			'date_reservation' => new DB_ORM_Field_DateTime($this, array(
				'nullable' => TRUE,
			)),
			'id_evenement' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => TRUE,
			)),
			'nb_voiturettes' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => TRUE,
			)),
			'nb_chariots' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => TRUE,
			)),
			'nb_joueurs' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => TRUE,
			)),
			// 'depart' => new DB_ORM_Field_Integer($this, array(
			'confirmed' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 1,
				'nullable' => TRUE,
			)),
			'id_parent' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => TRUE,
			)),
			// 'id_parcours' => new DB_ORM_Field_Integer($this, array(
			'id_children' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => TRUE,
			)),
			'id_demande_reservation' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => TRUE,
			)),
			'date_fin' => new DB_ORM_Field_DateTime($this, array(
				'nullable' => TRUE,
			)),
			'temp_until' => new DB_ORM_Field_DateTime($this, array(
				'nullable' => TRUE,
			)),
		);

		$this->relations = array
		(
			'type_parcours' => new DB_ORM_Relation_BelongsTo($this, array(
				'child_key' => array('id_type_parcours'),
				'parent_model' => 'type_parcours',
				'parent_key' => array('id'),
			)),
			'users' => new DB_ORM_Relation_BelongsTo($this, array(
				'child_key' => array('id_users'),
				'parent_model' => 'users',
				'parent_key' => array('id'),
			)),
			'evenements' => new DB_ORM_Relation_BelongsTo($this, array(
				'child_key' => array('id_evenement'),
				'parent_model' => 'evenements',
				'parent_key' => array('id'),
			)),
			'demande_reservation' => new DB_ORM_Relation_BelongsTo($this, array(
				'child_key' => array('id_demande_reservation'),
				'parent_model' => 'demande_reservation',
				'parent_key' => array('id'),
			)),
		);
	}

	public static function data_source() {
		return 'default';
	}

	public static function table() {
		return 'reservation';
	}

	public static function primary_key() {
		return array('id', );
	}

}