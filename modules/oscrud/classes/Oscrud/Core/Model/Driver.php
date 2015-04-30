<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Oscadi Kohana Crud Model Driver
 *
 *
 * @package    	Oscadi Kohana CRUD 
 * @author     	Olivier Sautron
 * @license     
 * @link		
 */
class Oscrud_Core_Model_Driver extends Oscrud_Core_Field_Types
{
	/**
	 * @var grocery_CRUD_Model
	 */
	public $basic_model = null;
	
	protected function set_default_Model()
	{
		/*$ci = &get_instance();*/
		/*$ci->load->model('grocery_CRUD_Model');*/
		
		/*$this->basic_model = $ci->grocery_CRUD_Model;*/
		$this->basic_model = new Model_Oscrud(); 
		//$this->basic_model = $this->crud;
	}
	
	public function get_total_results()
	{ 
		$this->basic_model->builder = DB_SQL::select('default');
		$this->basic_model->builder->from($this->basic_model->table_name);
		//echo 'debut total';
		//print_r($this);
		//echo 'fin total';
		if(!empty($this->where))
			foreach($this->where as $where)
				$this->basic_model->where($where[0],$where[1],$where[2]);

		if(!empty($this->or_where))
			foreach($this->or_where as $or_where)
				$this->basic_model->or_where($or_where[0],$or_where[1],$or_where[2]);				

		if(!empty($this->like))
			foreach($this->like as $like)
				$this->basic_model->like($like[0],$like[1],$like[2]);
				
		if(!empty($this->or_like))
			foreach($this->or_like as $or_like)
				$this->basic_model->or_like($or_like[0],$or_like[1],$or_like[2]);	

		if(!empty($this->having))
			foreach($this->having as $having)
				$this->basic_model->having($having[0],$having[1],$having[2]);		
		
		if(!empty($this->or_having))
			foreach($this->or_having as $or_having)
				$this->basic_model->or_having($or_having[0],$or_having[1],$or_having[2]);	
		
		if(!empty($this->relation))
			foreach($this->relation as $relation){
				$this->basic_model->join_relation($relation[0],$relation[1],$relation[2]);	
			}
			
		if(!empty($this->where_block))
			foreach($this->where_block as $where_block) {
				$this->basic_model->where_block($where_block[0],$where_block[1]);
			}
			
							
		
		if(!empty($this->relation_n_n))
		{
			$columns = $this->get_columns();
			foreach($columns as $column)
			{
				//Use the relation_n_n ONLY if the column is called . The set_relation_n_n are slow and it will make the table slower without any reason as we don't need those queries.
				if(isset($this->relation_n_n[$column->field_name]))
				{
					$this->basic_model->set_relation_n_n_field($this->relation_n_n[$column->field_name]);
				}
			}
				
		}		
		
		//echo 'debut debut total';
		//print_r($this);
		//echo 'fin fin total';
		
		return $this->basic_model->get_total_results();
	}
	
	public function set_model($model_name)
	{
		$ci = &get_instance();
		$ci->load->model('grocery_CRUD_Model');	
		
		$ci->load->model($model_name);
		
		$temp = explode('/',$model_name);
		krsort($temp);
		foreach($temp as $t)
		{
			$real_model_name = $t;
			break;
		} 
			
		$this->basic_model = $ci->$real_model_name;
	}	
	
	public function set_ajax_list_queries($state_info = null)
	{
		if(!empty($state_info->per_page))
		{
			if(empty($state_info->page) || !is_numeric($state_info->page) )
				$this->limit($state_info->per_page);
			else
			{
				$limit_page = ( ($state_info->page-1) * $state_info->per_page ); 
				$this->limit($state_info->per_page, $limit_page);
			}
		}
		
		if(!empty($state_info->order_by))
		{
			$this->order_by($state_info->order_by[0],$state_info->order_by[1]);
		}
		
		if(!empty($state_info->search))
		{
			if(!empty($this->relation))
				foreach($this->relation as $relation_name => $relation_values)
					$temp_relation[$this->_unique_field_name($relation_name)] = $this->_get_field_names_to_search($relation_values);
			
			if($state_info->search->field !== null)
			{	
				//echo $state_info->search->field."<br/>";		
				if(isset($temp_relation[$state_info->search->field]))
				{
					if(is_array($temp_relation[$state_info->search->field]))
						foreach($temp_relation[$state_info->search->field] as $search_field)
							$this->or_like($search_field , $state_info->search->text);
					else
						$this->like($temp_relation[$state_info->search->field] , $state_info->search->text);
				}
				elseif(isset($this->relation_n_n[$state_info->search->field]))
				{
					$escaped_text = $this->basic_model->escape_str($state_info->search->text);
					$this->having($state_info->search->field." LIKE '%".$escaped_text."%'");
				} 
				else
				{
					$this->like($state_info->search->field , $state_info->search->text);
				}
			}
			else 
			{
				$columns = $this->get_columns();
				
				$search_text = $state_info->search->text;
				
				if(count($columns) > 0) {
					$this->basic_model->where_block("(", 'AND');
				}
				
				foreach($columns as $column)
				{	
					
					if(isset($temp_relation[$column->field_name]))
					{
						if(is_array($temp_relation[$column->field_name]))
							foreach($temp_relation[$column->field_name] as $search_field)
								$this->basic_model->or_like($search_field, $search_text);
						else
							$this->basic_model->or_like($temp_relation[$column->field_name] , $search_text);
					}
					elseif(isset($this->relation_n_n[$column->field_name]))
					{
						$escaped_text = $this->basic_model->escape_str($search_text);
						$this->basic_model->having($column->field_name." LIKE '%".$escaped_text."%'");
					} 
					else
					{
						$this->basic_model->or_like($column->field_name , $search_text);
					}
				}
				
				if(count($columns) > 0) {
					$this->basic_model->where_block(")");
				}
			}
		}

	}
	
	protected function table_exists($table_name = null)
	{
		if($this->basic_model->db_table_exists($table_name))
			return true;
		return false;
	}	
	
	protected function get_relation_array($relation_info, $primary_key_value = null, $limit = null)
	{
		
		list($field_name , $related_table , $related_field_title, $where_clause, $order_by)  = $relation_info;

		if($primary_key_value !== null)
		{
			$primary_key = $this->basic_model->get_primary_key($related_table);
			
			//A where clause with the primary key is enough to take the selected key row
			$where_clause = array($primary_key => $primary_key_value);		
		}
		
		// appel relation array
		$relation_array = $this->basic_model->get_relation_array($field_name , $related_table , $related_field_title, $where_clause, $order_by, $limit);
		
		return $relation_array;
	}
	
	protected function get_relation_total_rows($relation_info)
	{
		list($field_name , $related_table , $related_field_title, $where_clause)  = $relation_info;
	
		$relation_array = $this->basic_model->get_relation_total_rows($field_name , $related_table , $related_field_title, $where_clause);
	
		return $relation_array;
	}	
	
	public function db_insert_validation()
	{
		$validation_result = (object)array('success'=>false);
		
		$field_types = $this->get_field_types();
		$required_fields = $this->required_fields;
		$add_fields = $this->get_add_fields();
		
		if(!empty($required_fields))
		{
			foreach($add_fields as $add_field)
			{
				$field_name = $add_field->field_name;
				if(!isset($this->validation_rules[$field_name]) && in_array( $field_name, $required_fields) ) 
				{
					$this->set_rules( $field_name, $field_types[$field_name]->display_as, 'required');
				}	
			}			
		}
		
		if(!empty($this->validation_rules))
		{		
			$form_validation = $this->form_validation();
			
			$add_fields = $this->get_add_fields();
			
			foreach($add_fields as $add_field)
			{
				$field_name = $add_field->field_name;
				if(isset($this->validation_rules[$field_name])) 
				{
					$rule = $this->validation_rules[$field_name];
					// a revoir olivier controle form validation
					//$form_validation->set_rules($rule['field'],$rule['label'],$rule['rules']);
				}	
			}	
			
			// a revoir olivier controle form validation
			$validation_result->success = true;
			/*if($form_validation->run())
			{
				$validation_result->success = true;
			}
			else
			{
				$validation_result->error_message = $form_validation->error_string();
				$validation_result->error_fields = $form_validation->_error_array;
			}*/
		}
		else
		{
			$validation_result->success = true;
		}

		return $validation_result;
	}

	public function form_validation()
	{
		// modif olivier a revoir
		/*if($this->form_validation === null)
		{
			$this->form_validation = new grocery_CRUD_Form_validation();
			$ci = &get_instance();
			$ci->load->library('form_validation');
			$ci->form_validation = $this->form_validation;
		}
		return $this->form_validation;*/
		return true;
	}
	
	public function db_update_validation()
	{
		$validation_result = (object)array('success'=>false);
		
		$field_types = $this->get_field_types();
		$required_fields = $this->required_fields;
		$edit_fields = $this->get_edit_fields();
		
		if(!empty($required_fields))
		{
			foreach($edit_fields as $edit_field)
			{
				$field_name = $edit_field->field_name;
				if(!isset($this->validation_rules[$field_name]) && in_array( $field_name, $required_fields) ) 
				{
					$this->set_rules( $field_name, $field_types[$field_name]->display_as, 'required');
				}	
			}			
		}
		
		// a revoir modif olivier
		/*if(!empty($this->validation_rules))
		{
			
			
			$form_validation = $this->form_validation();
			
			$edit_fields = $this->get_edit_fields();
			
			foreach($edit_fields as $edit_field)
			{
				$field_name = $edit_field->field_name;
				if(isset($this->validation_rules[$field_name])) 
				{
					$rule = $this->validation_rules[$field_name];
					$form_validation->set_rules($rule['field'],$rule['label'],$rule['rules']);
				}	
			}	
			
			if($form_validation->run())
			{
				$validation_result->success = true;
			}
			else
			{
				$validation_result->error_message = $form_validation->error_string();
				$validation_result->error_fields = $form_validation->_error_array;
			}
		}
		else
		{
			$validation_result->success = true;
		}*/
		
		$validation_result->success = true;
		
		return $validation_result;
	}

	public function db_insert($state_info)
	{
		$validation_result = $this->db_insert_validation();
		
		if($validation_result->success)
		{
			$post_data = $state_info->unwrapped_data;
			
			$add_fields = $this->get_add_fields();

			if($this->callback_insert === null)
			{
				if($this->callback_before_insert !== null)
				{
					$callback_return = call_user_func($this->callback_before_insert, $post_data);
					
					if(!empty($callback_return) && is_array($callback_return))
						$post_data = $callback_return;
					elseif($callback_return === false) 
						return false;
				}
				
				$insert_data = array();
				$types = $this->get_field_types();
				foreach($add_fields as $num_row => $field)
				{
					/* If the multiselect or the set is empty then the browser doesn't send an empty array. Instead it sends nothing */
					if(isset($types[$field->field_name]->crud_type) && ($types[$field->field_name]->crud_type == 'set' || $types[$field->field_name]->crud_type == 'multiselect') && !isset($post_data[$field->field_name]))
					{
						$post_data[$field->field_name] = array();
					}
					
					if(isset($post_data[$field->field_name]) && !isset($this->relation_n_n[$field->field_name]))
					{
						if(isset($types[$field->field_name]->db_null) && $types[$field->field_name]->db_null && is_array($post_data[$field->field_name]) && empty($post_data[$field->field_name]))
						{
							$insert_data[$field->field_name] = null;
						}
						elseif(isset($types[$field->field_name]->db_null) && $types[$field->field_name]->db_null && $post_data[$field->field_name] === '')
						{
							$insert_data[$field->field_name] = null;
						}
						elseif(isset($types[$field->field_name]->crud_type) && $types[$field->field_name]->crud_type == 'date')
						{
							$insert_data[$field->field_name] = $this->_convert_date_to_sql_date($post_data[$field->field_name]);
						}
						elseif(isset($types[$field->field_name]->crud_type) && $types[$field->field_name]->crud_type == 'readonly')
						{
							//This empty if statement is to make sure that a readonly field will never inserted/updated
						}	
						elseif(isset($types[$field->field_name]->crud_type) && ($types[$field->field_name]->crud_type == 'set' || $types[$field->field_name]->crud_type == 'multiselect'))
						{
							$insert_data[$field->field_name] = !empty($post_data[$field->field_name]) ? implode(',',$post_data[$field->field_name]) : '';
						}											
						elseif(isset($types[$field->field_name]->crud_type) && $types[$field->field_name]->crud_type == 'datetime'){
							$insert_data[$field->field_name] = $this->_convert_date_to_sql_date(substr($post_data[$field->field_name],0,10)).
																		substr($post_data[$field->field_name],10);
						}
						else
						{
							$insert_data[$field->field_name] = $post_data[$field->field_name];	
						}						
					}
				}
	
				$insert_result =  $this->basic_model->db_insert($insert_data);
					
				if($insert_result !== false)
				{
					$insert_primary_key = $insert_result;
				}
				else 
				{
					return false;
				}
				
				if(!empty($this->relation_n_n))
				{
					foreach($this->relation_n_n as $field_name => $field_info)
					{
						$relation_data = isset( $post_data[$field_name] ) ? $post_data[$field_name] : array() ; 
						$this->db_relation_n_n_update($field_info, $relation_data  ,$insert_primary_key);
					}
				}
				
				if($this->callback_after_insert !== null)
				{
					$callback_return = call_user_func($this->callback_after_insert, $post_data, $insert_primary_key);
					
					if($callback_return === false) 
					{
						return false;
					}
					
				}
			}else
			{
					$callback_return = call_user_func($this->callback_insert, $post_data);
					
					if($callback_return === false) 
					{
						return false;
					}
			}
			
			if(isset($insert_primary_key))
				return $insert_primary_key;
			else
				return true;
		}
		
		return false;
		
	}
	
	public function db_update($state_info)
	{	
		$validation_result = $this->db_update_validation();
		
		$edit_fields = $this->get_edit_fields();
		
		if($validation_result->success)
		{
			$post_data 		= $state_info->unwrapped_data;
			$primary_key 	= $state_info->primary_key;
			
			if($this->callback_update === null)
			{
				if($this->callback_before_update !== null)
				{
					$callback_return = call_user_func($this->callback_before_update, $post_data, $primary_key);
					
					if(!empty($callback_return) && is_array($callback_return))
					{
						$post_data = $callback_return;
					}
					elseif($callback_return === false) 
					{
						return false;
					}
					
				}
				
				$update_data = array();
				$types = $this->get_field_types();
				foreach($edit_fields as $num_row => $field)
				{
					/* If the multiselect or the set is empty then the browser doesn't send an empty array. Instead it sends nothing */
					if(isset($types[$field->field_name]->crud_type) && ($types[$field->field_name]->crud_type == 'set' || $types[$field->field_name]->crud_type == 'multiselect') && !isset($post_data[$field->field_name]))
					{
						$post_data[$field->field_name] = array();
					}					
					
					if(isset($post_data[$field->field_name]) && !isset($this->relation_n_n[$field->field_name]))
					{
						if(isset($types[$field->field_name]->db_null) && $types[$field->field_name]->db_null && is_array($post_data[$field->field_name]) && empty($post_data[$field->field_name]))
						{
							$update_data[$field->field_name] = null;
						}
						elseif(isset($types[$field->field_name]->db_null) && $types[$field->field_name]->db_null && $post_data[$field->field_name] === '')
						{
							$update_data[$field->field_name] = null;
						}
						elseif(isset($types[$field->field_name]->crud_type) && $types[$field->field_name]->crud_type == 'date')
						{
							$update_data[$field->field_name] = $this->_convert_date_to_sql_date($post_data[$field->field_name]);
						}
						elseif(isset($types[$field->field_name]->crud_type) && $types[$field->field_name]->crud_type == 'readonly')
						{
							//This empty if statement is to make sure that a readonly field will never inserted/updated 
						}
						elseif(isset($types[$field->field_name]->crud_type) && ($types[$field->field_name]->crud_type == 'set' || $types[$field->field_name]->crud_type == 'multiselect'))
						{
							$update_data[$field->field_name] = !empty($post_data[$field->field_name]) ? implode(',',$post_data[$field->field_name]) : '';
						}										
						elseif(isset($types[$field->field_name]->crud_type) && $types[$field->field_name]->crud_type == 'datetime'){
							$update_data[$field->field_name] = $this->_convert_date_to_sql_date(substr($post_data[$field->field_name],0,10)).
																		substr($post_data[$field->field_name],10);
						}						
						else
						{
							$update_data[$field->field_name] = $post_data[$field->field_name];
						}
					}
				}				
				
				if($this->basic_model->db_update($update_data, $primary_key) === false)
				{
					return false;
				}
				
				if(!empty($this->relation_n_n))
				{
					foreach($this->relation_n_n as $field_name => $field_info)
					{
						if (   $this->unset_edit_fields !== null 
							&& is_array($this->unset_edit_fields) 
							&& in_array($field_name,$this->unset_edit_fields)
						) {
								continue;
						}
						
						$relation_data = isset( $post_data[$field_name] ) ? $post_data[$field_name] : array() ; 
						$this->db_relation_n_n_update($field_info, $relation_data ,$primary_key);
					}
				}				
				
				if($this->callback_after_update !== null)
				{
					$callback_return = call_user_func($this->callback_after_update, $post_data, $primary_key);
					
					if($callback_return === false) 
					{
						return false;
					}
					
				}				
			}
			else
			{
				$callback_return = call_user_func($this->callback_update, $post_data, $primary_key);
					
				if($callback_return === false) 
				{
					return false;
				}
			}
			
			return true;
		}
		else
		{
			return false;	
		}		
	}	
	
	protected function _convert_date_to_sql_date($date)
	{
		$date = substr($date,0,10);
		if(preg_match('/\d{4}-\d{2}-\d{2}/',$date))
		{
			//If it's already a sql-date don't convert it!
			return $date;
		}elseif(empty($date))
		{
			return '';
		}
		
		$date_array = preg_split( '/[-\.\/ ]/', $date);
		if($this->php_date_format == 'd/m/Y')
		{
			$sql_date = date('Y-m-d',mktime(0,0,0,$date_array[1],$date_array[0],$date_array[2]));
		}
		elseif($this->php_date_format == 'm/d/Y')
		{
			$sql_date = date('Y-m-d',mktime(0,0,0,$date_array[0],$date_array[1],$date_array[2]));
		}
		else
		{
			$sql_date = $date;
		}
		
		return $sql_date;
	}
	
	protected function _get_field_names_to_search(array $relation_values)
	{		
		if(!strstr($relation_values[2],'{'))
			return $this->_unique_join_name($relation_values[0]).'.'.$relation_values[2];
		else
		{
			$relation_values[2] = ' '.$relation_values[2].' ';
			$temp1 = explode('{',$relation_values[2]);
			unset($temp1[0]);
			
			$field_names_array = array();
			foreach($temp1 as $field)
				list($field_names_array[]) = explode('}',$field);
			
			return $field_names_array;
		}
	}
	
    protected function _unique_join_name($field_name)
    {
    	return 'j'.substr(md5($field_name),0,8); //This j is because is better for a string to begin with a letter and not a number
    }	

    protected function _unique_field_name($field_name)
    {
		// a revoir probleme de selection de colonne dans leap
		//echo "field_name = ".$field_name;
		//return $field_name;
    	return 's'.substr(md5($field_name),0,8); //This s is because is better for a string to begin with a letter and not a number
    }    
    
	public function db_delete($state_info)
	{
		$primary_key 	= $state_info->primary_key;
		
		if($this->callback_delete === null)
		{
			if($this->callback_before_delete !== null)
			{
				$callback_return = call_user_func($this->callback_before_delete, $primary_key);
				
				if($callback_return === false) 
				{
					return false;
				}
				
			}
			
			if(!empty($this->relation_n_n))
			{
				foreach($this->relation_n_n as $field_name => $field_info)
				{
					$this->db_relation_n_n_delete( $field_info, $primary_key );
				}
			}					
			
			$delete_result = $this->basic_model->db_delete($primary_key);
			
			if($delete_result === false)
			{
				return false;
			}
			
			if($this->callback_after_delete !== null)
			{
				$callback_return = call_user_func($this->callback_after_delete, $primary_key);
				
				if($callback_return === false) 
				{
					return false;
				}
				
			}				
		}
		else
		{
			$callback_return = call_user_func($this->callback_delete, $primary_key);
				
			if($callback_return === false) 
			{
				return false;
			}
		}
		
		return true;
	}	
	
	protected function db_relation_n_n_update($field_info, $post_data , $primary_key_value)
	{
		$this->basic_model->db_relation_n_n_update($field_info, $post_data , $primary_key_value);
	}

	protected function db_relation_n_n_delete($field_info, $primary_key_value)
	{
		$this->basic_model->db_relation_n_n_delete($field_info, $primary_key_value);
	}		
	
	public function get_list()
	{	
		if(!empty($this->order_by))
			$this->basic_model->order_by($this->order_by[0],$this->order_by[1]);
		
		if(!empty($this->where))
			foreach($this->where as $where)
				$this->basic_model->where($where[0],$where[1],$where[2]);

		if(!empty($this->or_where))
			foreach($this->or_where as $or_where)
				$this->basic_model->or_where($or_where[0],$or_where[1],$or_where[2]);				

		if(!empty($this->like))
			foreach($this->like as $like)
				$this->basic_model->like($like[0],$like[1],$like[2]);
				
		if(!empty($this->or_like))
			foreach($this->or_like as $or_like)
				$this->basic_model->or_like($or_like[0],$or_like[1],$or_like[2]);				
			
		if(!empty($this->having))
			foreach($this->having as $having)
				$this->basic_model->having($having[0],$having[1],$having[2]);		
		
		if(!empty($this->or_having))
			foreach($this->or_having as $or_having)
				$this->basic_model->or_having($or_having[0],$or_having[1],$or_having[2]);		
		
		if(!empty($this->relation))
			foreach($this->relation as $relation){
				$this->basic_model->join_relation($relation[0],$relation[1],$relation[2]);
			}
				
				
		if(!empty($this->relation_n_n))
		{
			$columns = $this->get_columns();
			foreach($columns as $column)
			{
				//Use the relation_n_n ONLY if the column is called . The set_relation_n_n are slow and it will make the table slower without any reason as we don't need those queries.
				if(isset($this->relation_n_n[$column->field_name]))
				{
					$this->basic_model->set_relation_n_n_field($this->relation_n_n[$column->field_name]);
				}
			}
				
		}	
		
		// a revoir
		$this->theme_config['crud_paging'] = true;
		
		if($this->theme_config['crud_paging'] === true)
		{
			if($this->limit === null)
			{	
				$default_per_page = $this->config->default_per_page;
				if(is_numeric($default_per_page) && $default_per_page >1)
				{
					$this->basic_model->limit($default_per_page);
				}
				else
				{
					$this->basic_model->limit(10);
				}
			}
			else
			{
				$this->basic_model->limit($this->limit[0],$this->limit[1]);
			}
		}
		
		$results = $this->basic_model->get_list();
		
		return $results;
	}
	
	protected function get_edit_values($primary_key_value)
	{
		$values = $this->basic_model->get_edit_values($primary_key_value);
		
		if(!empty($this->relation_n_n))
		{			
			foreach($this->relation_n_n as $field_name => $field_info)
			{
				$values->$field_name = $this->get_relation_n_n_selection_array($primary_key_value, $field_info);
			}
		}
		
		return $values;
	}
	
	protected function get_relation_n_n_selection_array($primary_key_value, $field_info)
	{
		return $this->basic_model->get_relation_n_n_selection_array($primary_key_value, $field_info);
	}
	
	protected function get_relation_n_n_unselected_array($field_info, $selected_values)
	{
		return $this->basic_model->get_relation_n_n_unselected_array($field_info, $selected_values);
	}	
	
	protected function set_basic_db_table($table_name = null)
	{
		$this->basic_model->set_basic_table($table_name);
		
	}
	
	protected function upload_file($state_info)
	{
		if(isset($this->upload_fields[$state_info->field_name]) )
		{
			if($this->callback_upload === null)
			{
				if($this->callback_before_upload !== null)
				{
					$callback_before_upload_response = call_user_func($this->callback_before_upload, $_FILES,  $this->upload_fields[$state_info->field_name]);
					
					if($callback_before_upload_response === false)
						return false;
					elseif(is_string($callback_before_upload_response))
						return $callback_before_upload_response;
				}
				
				$upload_info = $this->upload_fields[$state_info->field_name];
				
				header('Pragma: no-cache');
				header('Cache-Control: private, no-cache');
				header('Content-Disposition: inline; filename="files.json"');
				header('X-Content-Type-Options: nosniff');
				header('Access-Control-Allow-Origin: *');
				header('Access-Control-Allow-Methods: OPTIONS, HEAD, GET, POST, PUT, DELETE');
				header('Access-Control-Allow-Headers: X-File-Name, X-File-Type, X-File-Size');
				
				$allowed_files = $this->config->file_upload_allow_file_types;
				$reg_exp = '/(\\.|\\/)('.$allowed_files.')$/i';		

				$max_file_size_ui = $this->config->file_upload_max_file_size;
				$max_file_size_bytes = $this->_convert_bytes_ui_to_bytes($max_file_size_ui);
			
				$options = array(
					'upload_dir' 		=> $upload_info->upload_path.'/',
					'param_name'		=> $this->_unique_field_name($state_info->field_name),
					'upload_url'		=> base_url().$upload_info->upload_path.'/',
					'accept_file_types' => $reg_exp,
					'max_file_size'		=> $max_file_size_bytes
				);
				$upload_handler = new UploadHandler($options);
				$upload_handler->default_config_path = $this->default_config_path;
				$uploader_response = $upload_handler->post();
				
				if(is_array($uploader_response))
				{
					foreach($uploader_response as &$response)
					{
						unset($response->delete_url);
						unset($response->delete_type);
					}
				}
				
				if($this->callback_after_upload !== null)
				{
					$callback_after_upload_response = call_user_func($this->callback_after_upload, $uploader_response ,  $this->upload_fields[$state_info->field_name] , $_FILES );
					
					if($callback_after_upload_response === false)
						return false;
					elseif(is_string($callback_after_upload_response))
						return $callback_after_upload_response;
					elseif(is_array($callback_after_upload_response))
						$uploader_response = $callback_after_upload_response;
				}				
				
				return $uploader_response;
			}
			else 
			{
				$upload_response = call_user_func($this->callback_upload, $_FILES, $this->upload_fields[$state_info->field_name] );

				if($upload_response === false)
				{
					return false;
				}
				else 
				{
					return $upload_response;
				}
			}
		}
		else
		{
			return false;
		} 	
	}
	
	protected function delete_file($state_info)
	{
		
		if(isset($state_info->field_name) && isset($this->upload_fields[$state_info->field_name]))
		{
			$upload_info = $this->upload_fields[$state_info->field_name];
			
			if(file_exists("{$upload_info->upload_path}/{$state_info->file_name}"))
			{
				if( unlink("{$upload_info->upload_path}/{$state_info->file_name}") )
				{
					$this->basic_model->db_file_delete($state_info->field_name, $state_info->file_name);
					
					return true;
				}
				else 
				{
					return false;
				}
			}
			else 
			{
				$this->basic_model->db_file_delete($state_info->field_name, $state_info->file_name);
				return true;
			}
		}
		else
		{
			return false;
		} 	
	}

	protected function ajax_relation($state_info)
	{
		if(!isset($this->relation[$state_info->field_name]))
			return false;
		
		list($field_name, $related_table, $related_field_title, $where_clause, $order_by)  = $this->relation[$state_info->field_name];
		
		return $this->basic_model->get_ajax_relation_array($state_info->search, $field_name, $related_table, $related_field_title, $where_clause, $order_by);
	}
}
