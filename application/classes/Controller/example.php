<?php

defined ( 'SYSPATH' ) or die ( 'No direct script access.' );
class Controller_Example extends Controller {
	public function action_index() {
		$view = View::factory ( 'example1' );
		
		$crud = new Crud ();
		
		$crud->table ( 'categories' );
		$crud->tableAlias ( 'Category Manager	' );
		
		$crud->addNoCol ( true );
		
		$crud->cols ( 'category_name' );
		
		$crud->alias ( 'category_name', 'Name' );
		$crud->alias ( 'category_description', 'Description' );
		
		$crud->type ( 'category_description', 'editor' );
		
		$crud->validate ( 'category_name', 'required' );
		$crud->search ( 'all' );
		
		$html = $crud->fetch ();
		
		$view->bind ( 'html', $html );
		
		$example = $view->render ();
		$this->response->body ( $example );
	}
	public function action_index2() {
		$view = View::factory ( 'example1' );
		
		$crud = new Crud ();
		
		$crud->table ( 'users' );
		$crud->tableAlias ( 'User Manager' );
		
		$crud->addNoCol ( true );
		$crud->autoType(true);

		$crud->join ( 'left', 'country', 'country.id = users.id_pays' );
		
		$crud->fields(array(
			'email',
			'firstname',
			'lastname',
			'country.nom',
		));
		$crud->cols(array(
			'email',
			'firstname',
			'lastname',
			'country.nom',
		));
		// $crud->cols ( 'category_name' );
		
		// $crud->alias ( 'category_name', 'Name' );
		// $crud->alias ( 'category_description', 'Description' );
		
		// $crud->type ( 'category_description', 'editor' );
		
		// $crud->validate ( 'category_name', 'required' );
		$crud->search ( 'all' );
		
		$html = $crud->fetch ();
		
		$view->bind ( 'html', $html );
		
		$example = $view->render ();
		$this->response->body ( $example );
	}
	
	public function action_example2() {
		$view = View::factory ( 'example2' );
		
		$crud = new Crud ();
		
		$crud->table ( 'articles' );
		$crud->tableAlias ( 'Articles manager' );
		
		$crud->autoType ( true );
		$crud->addNoCol ( true );
		
		$crud->alias ( 'id', 'Id' )
			->alias ( 'category_id', 'Category' )
			->alias ( 'article_title', 'Title' )
			->alias ( 'article_date', 'date	' )
			->alias ( 'image', 'Image' )
			->alias ( 'article_summary', 'Summary' )
			->alias ( 'article_content', 'Content' );
		
		$crud->search ( 'all' );
		$crud->cols ( array (
				'image',
				'article_title',
				'article_date',
				'article_summary' 
		) );
		
		$crud->colWith ( 'image', 150 );
		$crud->colWith ( 'article_title', 200 );
		$crud->colWith ( 'category_id', 80 );
		$crud->colWith ( 'article_date', 80 );
		
		$crud->colAlign ( 'image', 'center' );
		$crud->colAlign ( 'category_id', 'center' );
		$crud->colAlign ( 'article_date', 'center' );
		
		$crud->type ( 'article_title', 'text', array (
				'class' => 'span6' 
		) );
		
		$crud->type ( 'image', 'image', DOCROOT . '/media/images', 'large', 500, 700 );
		$crud->type ( 'article_summary', 'editor' );
		$crud->type ( 'article_content', 'editor', array (
				'height' => '400' 
		) );
		
		$options = getCategories ();
		$crud->type ( 'category_id', 'selectbox', $options );
		
		$crud->validate ( 'article_title', 'required' );
		
		$html = $crud->fetch ();
		
		$view->bind ( 'html', $html );
		
		$example = $view->render ();
		$this->response->body ( $example );
	}
	
	public function action_example3(){
		$view = View::factory ( 'example3' );
		
		$crud = new Crud ();
		
		$crud->table ( 'articles' );
		$crud->tableAlias ( 'Articles manager' );
		
		$crud->theme ( 'bootstrap01' );
		
		$crud->autoType ( true );
		$crud->addNoCol ( true );
		
		$crud->alias ( 'id', 'Id' )
			->alias ( 'category_id', 'Category' )
			->alias ( 'article_title', 'Title' )
			->alias ( 'article_date', 'date	' )
			->alias ( 'image', 'Image' )
			->alias ( 'article_summary', 'Summary' )
			->alias ( 'article_content', 'Content' );
		
		$crud->search ( 'all' );
		$crud->cols ( array (
				'article_title',
				'category_id',
				'article_date',
				'article_summary' 
		) );
		
		$crud->colWith ( 'article_title', 200 );
		$crud->colWith ( 'category_id', 80 );
		$crud->colWith ( 'article_date', 80 );
		
		$crud->colAlign ( 'category_id', 'center' );
		$crud->colAlign ( 'article_date', 'center' );
		
		$crud->type ( 'article_title', 'text', array (
				'class' => 'span6' 
		) );
		$crud->type ( 'image', 'image', DOCROOT . '/media/images', 'large', 500, 700 );
		$crud->type ( 'article_summary', 'editor' );
		$crud->type ( 'article_content', 'editor', array (
				'height' => '400' 
		) );
		
		$options = getCategories ();
		$crud->type ( 'category_id', 'selectbox', $options );
		
		$crud->validate ( 'article_title', 'required' );
		
		$crud->order ( 'article_title', 'acs' );
		
		$html = $crud->fetch ();
		
		$view->bind ( 'html', $html );
		
		$example = $view->render ();
		$this->response->body ( $example );
	}
}

function getCategories() {
	$sql = 'select id,category_name from categories';
	$query = DB::query ( Database::SELECT, $sql );
	$results = $query->execute ();
	$options = array ();
	$options [''] = '';
	foreach($results as $v){
		$options [$v ['id']] = $v ['category_name'];
	}
	
	return $options;
}
