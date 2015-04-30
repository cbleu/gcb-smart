<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Oscadi Kohana Crud States
 *
 * Creates a full functional CRUD with few lines of code.
 *
 * @package    	Oscadi Kohana CRUD 
 * @author     	Olivier Sautron
 * @license     
 * @link		
 */

class Oscrud_Core_States extends Oscrud_Core_Layout
{
	protected $states = array(
		0	=> 'unknown',
		1	=> 'list',
		2	=> 'add',
		3	=> 'edit',
		4	=> 'delete',
		5	=> 'insert',
		6	=> 'update',
		7	=> 'ajax_list',
		8   => 'ajax_list_info',
		9	=> 'insert_validation',
		10	=> 'update_validation',
		11	=> 'upload_file',
		12	=> 'delete_file',
		13	=> 'ajax_relation',
		14	=> 'ajax_relation_n_n',
		15	=> 'success',
		16  => 'export',
		17  => 'print'
	);
	
	/*
	 * @var $_route_name Route to be used for actions (default: crud)
	 */
	protected $_route_name = 'oscrud';
	
	
	protected function getStateCode()
	{
		//echo 'action=';
		$state_string = Request::current()->action();
		//print_r($uri);
		//$state_string = $this->get_state_info_from_url()->operation;
		
		if( $state_string != 'unknown' && in_array( $state_string, $this->states ) ){
			$state_code =  array_search($state_string, $this->states);
		}
		else
			$state_code = 0;
		//echo "state_code=".$state_code;
		
		return $state_code;
	}
	
	protected function state_url($url = '')
	{
		//echo "url=".$url;
		/*$ci = &get_instance();*/
		
		//$segment_object = $this->get_state_info_from_url();
		//$method_name = $this->get_method_name();
		//$method_name = Request::current()->action();
		//$segment_position = $segment_object->segment_position;
		
		//$state_url_array = array();

    /*if( sizeof($ci->uri->segments) > 0 ) {
      foreach($ci->uri->segments as $num => $value)
      {
        $state_url_array[$num] = $value;
        if($num == ($segment_position - 1))
          break;
      }
          
      if( $method_name == 'index' && !in_array( 'index', $state_url_array ) ) //there is a scenario that you don't have the index to your url
        $state_url_array[$num+1] = 'index';
    }
		
		$state_url = implode('/',$state_url_array).'/'.$url;
		
		return site_url($state_url);*/
		$route = URL::base('http', FALSE);//."".Route::name(Request::current()->route());
		//print_r($route);
		//echo '<br/>';
		// modif olivier changer index.php
		$url = $route."admin/".Request::current()->controller().'/'.$url;
		//echo 'action='.Request::current()->action()." controller=".Request::current()->controller();
		//print_r($url);
		//echo '<br/>';
		return $url;
	}
	
	protected function get_state_info_from_url()
	{
		//echo 'route='.Route::get($this->_route_name)->uri(array('controller'=> Request::current()->controller()))."<br/>";
		/*$ci = &get_instance();*/
		/* a revoir */
		
	/*	$segment_position = count($ci->uri->segments) + 1;
		$operation = 'list';
		
		$segements = $ci->uri->segments;
		foreach($segements as $num => $value)
		{
			if($value != 'unknown' && in_array($value, $this->states))
			{
				$segment_position = (int)$num;
				$operation = $value; //I don't have a "break" here because I want to ensure that is the LAST segment with name that is in the array.
			}
		}
		
		$function_name = $this->get_method_name();
		
		if($function_name == 'index' && !in_array('index',$ci->uri->segments))
			$segment_position++;
		
		$first_parameter = isset($segements[$segment_position+1]) ? $segements[$segment_position+1] : null;
		$second_parameter = isset($segements[$segment_position+2]) ? $segements[$segment_position+2] : null;		*/
		
		
		//return (object)array('segment_position' => $segment_position, 'operation' => $operation, 'first_parameter' => $first_parameter, 'second_parameter' => $second_parameter);
		return (object)array('segment_position' => '', 'operation' => '', 'first_parameter' => '', 'second_parameter' => '');
	}
	
	protected function get_method_hash()
	{
		/*$ci = &get_instance();
		
		$state_info = $this->get_state_info_from_url();
		$extra_values = $ci->uri->segment($state_info->segment_position - 1) != $this->get_method_name() ? $ci->uri->segment($state_info->segment_position - 1) : '';
		// a revoir
		return md5($this->get_controller_name().$this->get_method_name().$extra_values);*/
		
		$route = Route::name(Request::current()->route());
		// modif olivier changer index.php
		$url = $route.Request::current()->controller().'/';
		
		return md5($url);
	}
	
	protected function get_method_name()
	{
		$ci = &get_instance();		
		return $ci->router->method;
	}
	
	protected function get_controller_name()
	{
		$ci = &get_instance();		
		return $ci->router->class;
	}	
	
	public function getState()
	{
		return $this->states[$this->getStateCode()];
	}
	
	protected function getListUrl()
	{
		return $this->state_url('list');
	}

	protected function getAjaxListUrl()
	{
		return $this->state_url('ajax_list');
	}

	public function getExportToExcelUrl()
	{
		return $this->state_url('export');
	}
	
	protected function getPrintUrl()
	{
		return $this->state_url('print');
	}	
	
	protected function getAjaxListInfoUrl()
	{
		return $this->state_url('ajax_list_info');
	}
	
	protected function getAddUrl()
	{
		//return 'add';
		return $this->state_url('add');
	}
	
	protected function getInsertUrl()
	{
		return $this->state_url('insert');
	}
	
	protected function getValidationInsertUrl()
	{
		return $this->state_url('insert_validation');
	}
	
	protected function getValidationUpdateUrl($primary_key = null)
	{
		if($primary_key === null)
			return $this->state_url('update_validation');
		else
			return $this->state_url('update_validation/'.$primary_key);
	}	

	protected function getEditUrl($primary_key = null)
	{
		if($primary_key === null)
			return $this->state_url('edit');
		else
			return $this->state_url('edit/'.$primary_key);
	}
	
	protected function getUpdateUrl($state_info)
	{		
		return $this->state_url('update/'.$state_info->primary_key);
	}	
	
	protected function getDeleteUrl($state_info = null)
	{
		if(empty($state_info))
			return $this->state_url('delete');
		else
			return $this->state_url('delete/'.$state_info->primary_key);
	}

	protected function getListSuccessUrl($primary_key = null)
	{
		if(empty($primary_key))
			return $this->state_url('success');
		else
			return $this->state_url('success/'.$primary_key);
	}	
	
	protected function getUploadUrl($field_name)
	{		
		return $this->state_url('upload_file/'.$field_name);
	}	

	protected function getFileDeleteUrl($field_name)
	{
		return $this->state_url('delete_file/'.$field_name);
	}	

	protected function getAjaxRelationUrl()
	{
		return $this->state_url('ajax_relation');
	}
	
	protected function getAjaxRelationManytoManyUrl()
	{
		return $this->state_url('ajax_relation_n_n');
	}	
	
	public function getStateInfo($first_parameter = null,$second_parameter = null)
	{
		
		$state_code = $this->getStateCode();
		//echo 'state_Code='.$state_code."<br/>";
		//echo "first=".$first_parameter." second=".$second_parameter;
			
		//$segment_object = $this->get_state_info_from_url();
		
		//$first_parameter = $segment_object->first_parameter;
		//$second_parameter = $segment_object->second_parameter;
	
		$first_parameter = Request::current()->param('id');
		$second_parameter = Request::current()->param('param');

		//print_r(Request::current());
		
		$state_info = (object)array();

		switch ($state_code) {
			case 1:
			case 2:
				
			break;		
			
			case 3:
				if($first_parameter !== null)
				{
					//$state_info = (object)array('primary_key' => $first_parameter);
					$state_info = (object)array('primary_key' => $first_parameter);
				}	
				else
				{
					throw new Exception('On the state "edit" the Primary key cannot be null', 6);
					die();
				}
			break;
			
			case 4:
				if($first_parameter !== null)
				{
					$state_info = (object)array('primary_key' => $first_parameter);
				}	
				else
				{
					throw new Exception('On the state "delete" the Primary key cannot be null',7);
					die();
				}
			break;
			
			case 5:
				if(!empty($_POST))
				{
					$state_info = (object)array('unwrapped_data' => $_POST);
				}
				else
				{
					throw new Exception('On the state "insert" you must have post data',8);
					die();
				}
			break;
			
			case 6:
				//print_r($_POST);
				//print_r($_GET);
				//echo "first parameter=".$first_parameter."<br/>";
				if(!empty($_POST) && $first_parameter !== null)
				{
					$state_info = (object)array('primary_key' => $first_parameter,'unwrapped_data' => $_POST);
				}
				elseif(empty($_POST))
				{
					throw new Exception('On the state "update" you must have post data',9);
					die();
				}
				else
				{
					throw new Exception('On the state "update" the Primary key cannot be null',10);
					die();
				}
			break;
			
			case 7:
			case 8:
			case 16: //export to excel
			case 17: //print
				$state_info = (object)array();
				if(!empty($_POST['per_page']))
				{
					$state_info->per_page = is_numeric($_POST['per_page']) ? $_POST['per_page'] : null;
				}
				if(!empty($_POST['page']))
				{
					$state_info->page = is_numeric($_POST['page']) ? $_POST['page'] : null;
				}
				//If we request an export or a print we don't care about what page we are
				if($state_code === 16 || $state_code === 17)
				{
					$state_info->page = 1;
					$state_info->per_page = 1000000; //a big number
				}
				if(!empty($_POST['order_by'][0]))
				{
					$state_info->order_by = $_POST['order_by'];
				}
				if(!empty($_POST['search_text']))
				{
					if(empty($_POST['search_field']))
					{
						
						$search_text = strip_tags($_POST['search_field']);
						
						$state_info->search = (object)array( 'field' => null , 'text' => $_POST['search_text'] );
						
					}
					else 
					{
						$state_info->search	= (object)array( 'field' => strip_tags($_POST['search_field']) , 'text' => $_POST['search_text'] );
					}
				}
			break;
			
			case 9:
			case 10:
				
			break;

			case 11:
				$state_info->field_name = $first_parameter;
			break;

			case 12:
				$state_info->field_name = $first_parameter;
				$state_info->file_name = $second_parameter;
			break;

			case 13:
				$state_info->field_name = $_POST['field_name'];
				$state_info->search 	= $_POST['term'];
			break;

			case 14:
				$state_info->field_name = $_POST['field_name'];
				$state_info->search 	= $_POST['term'];
			break;

			case 15:
				$state_info = (object)array(
					'primary_key' 		=> $first_parameter,
					'success_message'	=> true
				);
			break;				
		}
		
		return $state_info;
	}
}

