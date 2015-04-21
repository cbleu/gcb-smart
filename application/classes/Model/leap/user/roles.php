<?php defined('SYSPATH') or die('No direct script access.');

class Model_Leap_User_roles extends DB_ORM_Model
{
	public function __construct() {
		parent::__construct();

		$this->fields = array
		(
			'id' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'unsigned' => TRUE,
				'nullable' => FALSE,
			)),
			'user_id' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 10,
				'unsigned' => TRUE,
				'nullable' => FALSE,
			)),
			'role_id' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 10,
				'unsigned' => TRUE,
				'nullable' => FALSE,
			)),
		);

		$this->relations = array
		(
			'roles' => new DB_ORM_Relation_BelongsTo($this, array(
				'child_key' => array('role_id'),
				'parent_model' => 'roles',
				'parent_key' => array('id'),
			)),
			'users' => new DB_ORM_Relation_BelongsTo($this, array(
				'child_key' => array('user_id'),
				'parent_model' => 'users',
				'parent_key' => array('id'),
			)),
			'roles' => new DB_ORM_Relation_BelongsTo($this, array(
				'child_key' => array('role_id'),
				'parent_model' => 'roles',
				'parent_key' => array('id'),
			)),
			'users' => new DB_ORM_Relation_BelongsTo($this, array(
				'child_key' => array('user_id'),
				'parent_model' => 'users',
				'parent_key' => array('id'),
			)),
			'roles' => new DB_ORM_Relation_BelongsTo($this, array(
				'child_key' => array('role_id'),
				'parent_model' => 'roles',
				'parent_key' => array('id'),
			)),
			'users' => new DB_ORM_Relation_BelongsTo($this, array(
				'child_key' => array('user_id'),
				'parent_model' => 'users',
				'parent_key' => array('id'),
			)),
			'roles' => new DB_ORM_Relation_BelongsTo($this, array(
				'child_key' => array('role_id'),
				'parent_model' => 'roles',
				'parent_key' => array('id'),
			)),
			'users' => new DB_ORM_Relation_BelongsTo($this, array(
				'child_key' => array('user_id'),
				'parent_model' => 'users',
				'parent_key' => array('id'),
			)),
			'roles' => new DB_ORM_Relation_BelongsTo($this, array(
				'child_key' => array('role_id'),
				'parent_model' => 'roles',
				'parent_key' => array('id'),
			)),
			'users' => new DB_ORM_Relation_BelongsTo($this, array(
				'child_key' => array('user_id'),
				'parent_model' => 'users',
				'parent_key' => array('id'),
			)),
		);
	}

	public static function data_source() {
		return 'default';
	}

	public static function table() {
		return 'user_roles';
	}

	public static function primary_key() {
		return array('id', );
	}

}