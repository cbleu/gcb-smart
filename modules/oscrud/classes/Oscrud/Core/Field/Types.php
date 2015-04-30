<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Oscadi Kohana Crud Field Types
 *
 *
 * @package    	Oscadi Kohana CRUD 
 * @author     	Olivier Sautron
 * @license     
 * @link		
 */
class Oscrud_Core_Field_Types
{	
	/**	 
	 * Gets the field types of the main table.
	 * @return array
	 */
	public function get_field_types()
	{
		if($this->field_types !== null)
			return $this->field_types;
		
		$types	= array();
		foreach($this->basic_model->get_field_types_basic_table() as $field_info)
		{
			$field_info->required = !empty($this->required_fields) && in_array($field_info->name,$this->required_fields) ? true : false;
			 
			$field_info->display_as = 
				isset($this->display_as[$field_info->name]) ? 
					$this->display_as[$field_info->name] : 
					ucfirst(str_replace("_"," ",$field_info->name));
					
			if($this->change_field_type !== null && isset($this->change_field_type[$field_info->name]))
			{
				$field_type 			= $this->change_field_type[$field_info->name]; 
				
				$field_info->crud_type 	= $field_type->type;
				$field_info->extras 	=  $field_type->extras;
				
				$real_type				= $field_info->crud_type;
			}
			elseif(isset($this->relation[$field_info->name]))
			{
				$real_type				= 'relation';
				$field_info->crud_type 	= 'relation';
			}
			elseif(isset($this->upload_fields[$field_info->name]))
			{
				$real_type				= 'upload_file';
				$field_info->crud_type 	= 'upload_file';
			}						
			else
			{
				$real_type = $this->get_type($field_info);
				$field_info->crud_type = $real_type;
			}
			
			switch ($real_type) {
				case 'text':
					if(!empty($this->unset_texteditor) && in_array($field_info->name,$this->unset_texteditor))
						$field_info->extras = false;
					else
						$field_info->extras = 'text_editor';
				break;
				
				case 'relation':
					$field_info->extras 	= $this->relation[$field_info->name];
				break;			
				
				case 'upload_file':
					$field_info->extras 	= $this->upload_fields[$field_info->name];
				break;
				
				default:
					if(empty($field_info->extras))
						$field_info->extras = false;
				break;
			}
			
			$types[$field_info->name] = $field_info;
		}
		
		if(!empty($this->relation_n_n))
		{
			foreach($this->relation_n_n as $field_name => $field_extras)
			{
				$field_info = (object)array();
				$field_info->name		= $field_name;
				$field_info->crud_type 	= 'relation_n_n';
				$field_info->extras 	= $field_extras;
				$field_info->required	= !empty($this->required_fields) && in_array($field_name,$this->required_fields) ? true : false;; 
				$field_info->display_as = 
					isset($this->display_as[$field_name]) ? 
						$this->display_as[$field_name] : 
						ucfirst(str_replace("_"," ",$field_name));

				$types[$field_name] = $field_info;
			}
		}
		
		if(!empty($this->add_fields))
			foreach($this->add_fields as $field_object)
			{
				$field_name = isset($field_object->field_name) ? $field_object->field_name : $field_object;
				
				if(!isset($types[$field_name]))
				{
					$field_info = (object)array(
						'name' => $field_name, 
						'crud_type' => $this->change_field_type !== null && isset($this->change_field_type[$field_name]) ?
											$this->change_field_type[$field_name]->type :
											'string',
						'display_as' => isset($this->display_as[$field_name]) ? 
												$this->display_as[$field_name] : 
												ucfirst(str_replace("_"," ",$field_name)),
						'required'	=> in_array($field_name,$this->required_fields) ? true : false
					);
					
					$types[$field_name] = $field_info;
				}
			}
		
		if(!empty($this->edit_fields))
			foreach($this->edit_fields as $field_object)
			{
				$field_name = isset($field_object->field_name) ? $field_object->field_name : $field_object;
				
				if(!isset($types[$field_name]))
				{
					$field_info = (object)array(
						'name' => $field_name, 
						'crud_type' => $this->change_field_type !== null && isset($this->change_field_type[$field_name]) ?
											$this->change_field_type[$field_name]->type :
											'string',
						'display_as' => isset($this->display_as[$field_name]) ? 
												$this->display_as[$field_name] : 
												ucfirst(str_replace("_"," ",$field_name)),
						'required'	=> in_array($field_name,$this->required_fields) ? true : false
					);
					
					$types[$field_name] = $field_info;
				}
			}		
		
		$this->field_types = $types;
			
		return $this->field_types;
	}
	
	public function get_primary_key()
	{
		return $this->basic_model->get_primary_key();
	}
	
	/**
	 * Get the html input for the specific field with the 
	 * current value
	 * 
	 * @param object $field_info
	 * @param string $value
	 * @return object
	 */
	protected function get_field_input($field_info, $value = null)
	{
			$real_type = $field_info->crud_type;
			
			$types_array = array(
					'integer', 
					'text',
					'true_false',
					'string', 
					'date',
					'datetime',
					'enum',
					'set',
					'relation', 
					'relation_n_n',
					'upload_file',
					'hidden',
					'password', 
					'readonly',
					'dropdown',
					'multiselect'
			);
			
			if (in_array($real_type,$types_array)) {
				/* A quick way to go to an internal method of type $this->get_{type}_input . 
				 * For example if the real type is integer then we will use the method
				 * $this->get_integer_input
				 *  */
				$field_info->input = $this->{"get_".$real_type."_input"}($field_info,$value);
			}
			else
			{
				$field_info->input = $this->get_string_input($field_info,$value);
			}
		
		return $field_info;
	}
	
	protected function change_list_value($field_info, $value = null)
	{
		$real_type = $field_info->crud_type;
		
		switch ($real_type) {
			case 'hidden':
			case 'invisible':
			case 'integer':
				
			break;
			case 'true_false':
				if(isset($this->default_true_false_text[$value]))
					$value = $this->default_true_false_text[$value];
			break;
			case 'string':
				$value = $this->character_limiter($value,$this->character_limiter,"...");
			break;
			case 'text':
				$value = $this->character_limiter(strip_tags($value),$this->character_limiter,"...");
			break;
			case 'date':
				if(!empty($value) && $value != '0000-00-00' && $value != '1970-01-01')
				{
					list($year,$month,$day) = explode("-",$value);
					
					$value = date($this->php_date_format, mktime (0, 0, 0, (int)$month , (int)$day , (int)$year));
				}
				else 
				{
					$value = '';
				}
			break;
			case 'datetime':
				if(!empty($value) && $value != '0000-00-00 00:00:00' && $value != '1970-01-01 00:00:00')
				{
					list($year,$month,$day) = explode("-",$value);
					list($hours,$minutes) = explode(":",substr($value,11));
					
					$value = date($this->php_date_format." - H:i", mktime ((int)$hours , (int)$minutes , 0, (int)$month , (int)$day ,(int)$year));
				}
				else 
				{
					$value = '';
				}
			break;
			case 'enum':
				$value = $this->character_limiter($value,$this->character_limiter,"...");
			break;

			case 'multiselect':
				$value_as_array = array();
				foreach(explode(",",$value) as $row_value)
				{
					$value_as_array[] = array_key_exists($row_value,$field_info->extras) ? $field_info->extras[$row_value] : $row_value;
				}
				$value = implode(",",$value_as_array);
			break;			
			
			case 'relation_n_n':
				$value = $this->character_limiter(str_replace(',',', ',$value),$this->character_limiter,"...");
			break;						
			
			case 'password':
				$value = '******';
			break;
			
			case 'dropdown':
				$value = array_key_exists($value,$field_info->extras) ? $field_info->extras[$value] : $value; 
			break;			
			
			case 'upload_file':
				if(empty($value))
				{
					$value = "";
				}
				else
				{
					$is_image = !empty($value) &&
					( substr($value,-4) == '.jpg'
							|| substr($value,-4) == '.png'
							|| substr($value,-5) == '.jpeg'
							|| substr($value,-4) == '.gif'
							|| substr($value,-5) == '.tiff')
							? true : false;		
								
					$file_url = base_url().$field_info->extras->upload_path."/$value";
					
					$file_url_anchor = '<a href="'.$file_url.'"';
					if($is_image)
					{
						$file_url_anchor .= ' class="image-thumbnail"><img src="'.$file_url.'" height="50px">';
					}
					else
					{
						$file_url_anchor .= ' target="_blank">'.$this->character_limiter($value,$this->character_limiter,'...',true);
					}
					$file_url_anchor .= '</a>';
					
					$value = $file_url_anchor;
				}
			break;
			
			default:
				$value = $this->character_limiter($value,$this->character_limiter,"...");
			break;
		}
		
		return $value;
	}

	/**
	 * Character Limiter of codeigniter (I just don't want to load the helper )
	 *
	 * Limits the string based on the character count.  Preserves complete words
	 * so the character count may not be exactly as specified.
	 *
	 * @access	public
	 * @param	string
	 * @param	integer
	 * @param	string	the end character. Usually an ellipsis
	 * @return	string
	 */
	function character_limiter($str, $n = 500, $end_char = '&#8230;')
	{
		if (strlen($str) < $n)
		{
			return $str;
		}

		// a bit complicated, but faster than preg_replace with \s+
		$str = preg_replace('/ {2,}/', ' ', str_replace(array("\r", "\n", "\t", "\x0B", "\x0C"), ' ', $str));

		if (strlen($str) <= $n)
		{
			return $str;
		}

		$out = '';
		foreach (explode(' ', trim($str)) as $val)
		{
			$out .= $val.' ';

			if (strlen($out) >= $n)
			{
				$out = trim($out);
				return (strlen($out) === strlen($str)) ? $out : $out.$end_char;
			}
		}
	}
	
	protected function get_type($db_type)
	{
		$type = false;
		if(!empty($db_type->type))
		{
			switch ($db_type->type) {
				case '1':
				case '3':
				case 'int':
				case 'tinyint':
				case 'mediumint':
				case 'longint':					
					if( $db_type->db_type == 'tinyint' && $db_type->db_max_length ==  1)
						$type = 'true_false';
					else
						$type = 'integer';
				break;
				case '254':
				case 'string':
				case 'enum':					
					if($db_type->db_type != 'enum')
						$type = 'string';
					else
						$type = 'enum';
				break;
				case 'set':
					if($db_type->db_type != 'set')
						$type = 'string';
					else
						$type = 'set';
				break;
				case '252':
				case 'blob':
				case 'text':
				case 'mediumtext':					
				case 'longtext':
					$type = 'text';
				break;
				case '10':
				case 'date':
					$type = 'date';
				break;
				case '12':
				case 'datetime':
				case 'timestamp':
					$type = 'datetime';
				break;
			}
		}
		return $type;
	}
}
