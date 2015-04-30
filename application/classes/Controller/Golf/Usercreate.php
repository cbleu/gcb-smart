<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Golf_Crud_Usercreate extends Controller_Crud
{	 
	protected $_index_fields = array(
		'id',
		'email'
	);

	protected $_orm_model = 'users';
}