<?php defined('SYSPATH') or die('No direct script access.');

class Model_Leap_User_reservation_ressources extends DB_ORM_Model
{
	public function __construct() {
		parent::__construct();

		$this->fields = array
		(
			'id' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => FALSE,
			)),
			'id_user_has_reservation' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => FALSE,
			)),
			'id_ressources' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => FALSE,
			)),
		);

		$this->relations = array
		(
			'users_has_reservation' => new DB_ORM_Relation_BelongsTo($this, array(
				'child_key' => array('id_user_has_reservation'),
				'parent_model' => 'users_has_reservation',
				'parent_key' => array('id'),
			)),
			'ressources' => new DB_ORM_Relation_BelongsTo($this, array(
				'child_key' => array('id_ressources'),
				'parent_model' => 'ressources',
				'parent_key' => array('id'),
			)),
		);
	}

	public static function data_source() {
		return 'default';
	}

	public static function table() {
		return 'user_reservation_ressources';
	}

	public static function primary_key() {
		return array('id', );
	}

}