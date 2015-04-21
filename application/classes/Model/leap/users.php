<?php defined('SYSPATH') or die('No direct script access.');

class Model_Leap_Users extends DB_ORM_Model
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
			'email' => new DB_ORM_Field_String($this, array(
				'max_length' => 254,
				'nullable' => TRUE,
			)),
			'username' => new DB_ORM_Field_String($this, array(
				'max_length' => 254,
				'nullable' => FALSE,
			)),
			'password' => new DB_ORM_Field_String($this, array(
				'max_length' => 64,
				'nullable' => FALSE,
			)),
			'firstname' => new DB_ORM_Field_String($this, array(
				'max_length' => 35,
				'nullable' => TRUE,
			)),
			'lastname' => new DB_ORM_Field_String($this, array(
				'max_length' => 50,
				'nullable' => TRUE,
			)),
			'activated' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 1,
				'nullable' => FALSE,
			)),
			'banned' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 1,
				'nullable' => FALSE,
			)),
			'ban_reason' => new DB_ORM_Field_String($this, array(
				'max_length' => 255,
				'nullable' => TRUE,
			)),
			'new_password_key' => new DB_ORM_Field_String($this, array(
				'max_length' => 64,
				'nullable' => TRUE,
			)),
			'new_password_requested' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => TRUE,
			)),
			'new_email' => new DB_ORM_Field_String($this, array(
				'max_length' => 254,
				'nullable' => TRUE,
			)),
			'new_email_key' => new DB_ORM_Field_String($this, array(
				'max_length' => 64,
				'nullable' => TRUE,
			)),
			'logins' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 10,
				'unsigned' => TRUE,
				'nullable' => FALSE,
			)),
			'last_login' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 10,
				'unsigned' => TRUE,
				'nullable' => TRUE,
			)),
			'last_ip' => new DB_ORM_Field_String($this, array(
				'max_length' => 39,
				'nullable' => TRUE,
			)),
			'indgolf' => new DB_ORM_Field_String($this, array(
				'max_length' => 10,
				'nullable' => TRUE,
			)),
			'adresse' => new DB_ORM_Field_String($this, array(
				'max_length' => 200,
				'nullable' => TRUE,
			)),
			'cp' => new DB_ORM_Field_String($this, array(
				'max_length' => 10,
				'nullable' => TRUE,
			)),
			'ville' => new DB_ORM_Field_String($this, array(
				'max_length' => 100,
				'nullable' => TRUE,
			)),
			'id_pays' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => TRUE,
			)),
			'telephone' => new DB_ORM_Field_String($this, array(
				'max_length' => 25,
				'nullable' => TRUE,
			)),
			'indgolf' => new DB_ORM_Field_String($this, array(
				'max_length' => 10,
				'nullable' => TRUE,
			)),
			'id_status' => new DB_ORM_Field_Integer($this, array(
				'max_length' => 11,
				'nullable' => TRUE,
			)),
		);

		$this->relations = array
		(
			'status' => new DB_ORM_Relation_BelongsTo($this, array(
				'child_key' => array('id_status'),
				'parent_model' => 'user_status',
				'parent_key' => array('id'),
			)),
		);
	}

	public static function data_source() {
		return 'default';
	}

	public static function table() {
		return 'users';
	}

	public static function primary_key() {
		return array('id', );
	}

}