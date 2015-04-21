<?php defined('SYSPATH') or die('No direct script access.');

class Model_Leap_Paiement_reservation extends DB_ORM_Model
{
	public function __construct() {
		parent::__construct();

		$this->fields = array
		(
			'id' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => FALSE,
			)),
			'id_reservation' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => FALSE,
			)),
			'id_users' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'unsigned' => TRUE,
				'nullable' => FALSE,
			)),
			'regle' => new DB_ORM_Field_String($this, array(
				'max_length' => 45,
				'nullable' => TRUE,
			)),
			'montant' => new DB_ORM_Field_Float($this, array(
				'max_length' => 5,
				'nullable' => TRUE,
			)),
			'date_reglement' => new DB_ORM_Field_DateTime($this, array(
				'nullable' => TRUE,
			)),
		);

		$this->relations = array
		(
			'reservation' => new DB_ORM_Relation_BelongsTo($this, array(
				'child_key' => array('id_reservation'),
				'parent_model' => 'reservation',
				'parent_key' => array('id'),
			)),
			'users' => new DB_ORM_Relation_BelongsTo($this, array(
				'child_key' => array('id_users'),
				'parent_model' => 'users',
				'parent_key' => array('id'),
			)),
			'reservation' => new DB_ORM_Relation_BelongsTo($this, array(
				'child_key' => array('id_reservation'),
				'parent_model' => 'reservation',
				'parent_key' => array('id'),
			)),
			'users' => new DB_ORM_Relation_BelongsTo($this, array(
				'child_key' => array('id_users'),
				'parent_model' => 'users',
				'parent_key' => array('id'),
			)),
			'reservation' => new DB_ORM_Relation_BelongsTo($this, array(
				'child_key' => array('id_reservation'),
				'parent_model' => 'reservation',
				'parent_key' => array('id'),
			)),
			'users' => new DB_ORM_Relation_BelongsTo($this, array(
				'child_key' => array('id_users'),
				'parent_model' => 'users',
				'parent_key' => array('id'),
			)),
			'reservation' => new DB_ORM_Relation_BelongsTo($this, array(
				'child_key' => array('id_reservation'),
				'parent_model' => 'reservation',
				'parent_key' => array('id'),
			)),
			'users' => new DB_ORM_Relation_BelongsTo($this, array(
				'child_key' => array('id_users'),
				'parent_model' => 'users',
				'parent_key' => array('id'),
			)),
		);
	}

	public static function data_source() {
		return 'default';
	}

	public static function table() {
		return 'paiement_reservation';
	}

	public static function primary_key() {
		return array('id', 'id_reservation', 'id_users', );
	}

}