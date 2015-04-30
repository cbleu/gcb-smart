<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Oscadi Kohana Crud
 *
 * Creates a full functional CRUD with few lines of code.
 *
 * @package    	Oscadi Kohana CRUD 
 * @author     	Olivier Sautron
 * @license     
 * @link		
 */
class Oscrud_Core_Oscrud extends Oscrud_Core_States
{
	/**
	 * Oscadi Kohana Crud
	 * 
	 * @var	string
	 */
	const	VERSION = "1.0.0";
	
	const	JQUERY 			= "jquery.min.js";
	const	JQUERY_UI_JS 	= "jquery-ui.min.js";
	const	JQUERY_UI_CSS 	= "jquery-ui.min.css";
	
	private $state_code 			= null;
	private $state_info 			= null;
	private $basic_db_table_checked = false;
	private $columns				= null;
	private $columns_checked		= false;
	private $add_fields_checked		= false;
	private $edit_fields_checked	= false;	
	
	public $default_theme		= 'flexigrid';
	protected $language				= null;
	protected $lang_strings			= array();
	protected $php_date_format		= null;
	protected $js_date_format		= null;
	protected $ui_date_format		= null;
	public $character_limiter    = null;
	protected $config    			= null;
	
	protected $add_fields			= null;
	protected $edit_fields			= null;
	protected $add_hidden_fields 	= array();
	protected $edit_hidden_fields 	= array();
	protected $field_types 			= null;	
	protected $basic_db_table 		= null;
	protected $theme_config 		= array();
	protected $subject 				= null;
	protected $subject_plural 		= null;
	protected $display_as 			= array();
	public 	  $order_by 			= null;
	protected $where 				= array();
	protected $like 				= array();
	protected $having 				= array();
	protected $or_having 			= array();
	protected $limit 				= null;
	protected $required_fields		= array();
	protected $validation_rules		= array();
	protected $relation				= array();
	protected $relation_n_n			= array();
	protected $upload_fields		= array();
	protected $actions				= array();
	
	protected $form_validation		= null;
	protected $change_field_type	= null;
	protected $primary_keys			= array();
	
	/* The unsetters */
	public $unset_texteditor		= array();
	public $unset_add				= false;
	public $unset_edit				= false;
	public $unset_delete			= false;
	public $unset_jquery			= false;
	public $unset_jquery_ui			= false;
	public $unset_list				= false;
	public $unset_export			= false;
	public $unset_print				= false;
	public $unset_back_to_list		= false;
	public $unset_columns			= null;
	public $unset_add_fields 		= null;
	public $unset_edit_fields		= null;
	
	/* Callbacks */
	protected $callback_before_insert 	= null;
	protected $callback_after_insert 	= null;
	protected $callback_insert 			= null;
	protected $callback_before_update 	= null;
	protected $callback_after_update 	= null;
	protected $callback_update 			= null;	
	protected $callback_before_delete 	= null;
	protected $callback_after_delete 	= null;
	protected $callback_delete 			= null;		
	protected $callback_column			= array();
	protected $callback_add_field		= array();
	protected $callback_edit_field		= array();
	protected $callback_upload			= null;
	protected $callback_before_upload	= null;
	protected $callback_after_upload	= null;
	
	protected $default_javascript_path				= null; //autogenerate, please do not modify
	protected $default_css_path						= null; //autogenerate, please do not modify
	protected $default_texteditor_path 				= null; //autogenerate, please do not modify
	protected $default_theme_path					= null; //autogenerate, please do not modify
	protected $default_language_path				= 'i18n';
	protected $default_config_path					= 'assets/oscrud/config';
	protected $default_assets_path					= 'modules/oscrud/assets/oscrud';
	
	/**
	 * 
	 * Constructor
	 * 
	 * @access	public
	 */
	public function __construct()
	{

	}	
	
	/**
	 * The displayed columns that user see
	 *
	 * @access	public
	 * @param	string
	 * @param	array
	 * @return	void
	 */
	public function columns()
	{
		$args = func_get_args();
		
		if(isset($args[0]) && is_array($args[0]))
		{
			$args = $args[0];
		}
		
		$this->columns = $args;
		
		return $this;
	}
	
	
	/**
	 * Set Validation Rules
	 *
	 * Important note: If the $field is an array then no automated crud fields will take apart
	 *
	 * @access	public
	 * @param	mixed
	 * @param	string
	 * @return	void
	 */
	function set_rules($field, $label = '', $rules = '')
	{
		if(is_string($field))
		{
			$this->validation_rules[$field] = array('field' => $field, 'label' => $label, 'rules' => $rules);
		}elseif(is_array($field))
		{
			foreach($field as $num_field => $field_array)
			{
				$this->validation_rules[$field_array['field']] = $field_array;	
			}
		}
		return $this;
	}
	
	/**
	 * 
	 * Changes the default field type
	 * @param string $field
	 * @param string $type
	 * @param array|string $extras
	 */
	public function change_field_type($field , $type, $extras = null)
	{
		$field_type = (object)array('type' => $type);

		$field_type->extras = $extras;
		
		$this->change_field_type[$field] = $field_type;
		
		return $this;
	}
	
	/**
	 *
	 * Just an alias to the change_field_type method
	 * @param string $field
	 * @param string $type
	 * @param array|string $extras
	 */
	public function field_type($field , $type, $extras = null)
	{
		return $this->change_field_type($field , $type, $extras);
	}	
	
	/**
	 * Change the default primary key for a specific table. 
	 * If the $table_name is NULL then the primary key is for the default table name that we added at the set_table method
	 * 
	 * @param string $primary_key_field
	 * @param string $table_name
	 */
	public function set_primary_key($primary_key_field, $table_name = null)
	{
		$this->primary_keys[] = array('field_name' => $primary_key_field, 'table_name' => $table_name);
		
		return $this;
	}
	
	/**
	 * Unsets the texteditor of the selected fields
	 *
	 * @access	public
	 * @param	string
	 * @param	array
	 * @return	void
	 */
	public function unset_texteditor()
	{
		$args = func_get_args();
		
		if(isset($args[0]) && is_array($args[0]))
		{
			$args = $args[0];
		}
		foreach($args as $arg)
		{
			$this->unset_texteditor[] = $arg;	
		}
		
		return $this;
	}
	
	/**
	 * Unsets just the jquery library from the js. This function can be used if there is already a jquery included 
	 * in the main template. This will avoid all jquery conflicts. 
	 * 
	 * @return	void
	 */
	public function unset_jquery()
	{
		$this->unset_jquery = true;
		
		return $this;
	}
	
	
	/**
	 * Unsets the jquery UI Javascript and CSS. This function is really useful 
	 * when the jquery UI JavaScript and CSS are already included in the main template. 
	 * This will avoid all jquery UI conflicts.
	 *
	 * @return	void
	 */
	public function unset_jquery_ui()
	{
		$this->unset_jquery_ui = true;
	
		return $this;
	}	
	
	/**
	 * Unsets the add operation from the list
	 * 
	 * @return	void
	 */
	public function unset_add()
	{
		$this->unset_add = true;
		
		return $this;
	}

	/**
	 * Unsets the edit operation from the list
	 * 
	 * @return	void
	 */
	public function unset_edit()
	{
		$this->unset_edit = true;
		
		return $this;
	}
	
	/**
	 * Unsets the delete operation from the list
	 * 
	 * @return	void
	 */
	public function unset_delete()
	{
		$this->unset_delete = true;
		
		return $this;
	}
	
	/**
	 * Unsets the export button and functionality from the list
	 *
	 * @return	void
	 */
	public function unset_export()
	{
		$this->unset_export = true;
	
		return $this;
	}	
	
	
	/**
	 * Unsets the print button and functionality from the list
	 *
	 * @return	void
	 */
	public function unset_print()
	{
		$this->unset_print = true;
	
		return $this;
	}	
	
	/**
	 * Unsets all the operations from the list
	 * 
	 * @return	void
	 */
	public function unset_operations()
	{
		$this->unset_add 	= true;
		$this->unset_edit 	= true;
		$this->unset_delete = true;
		$this->unset_export = true;
		$this->unset_print  = true;
		
		return $this;
	}		
	
	/**
	 * Unsets a column from the list
	 * 
	 * @return	void.
	 */
	public function unset_columns()
	{
		$args = func_get_args();
		
		//echo "args=";
		//print_r($args);
		
		if(isset($args[0]) && is_array($args[0]))
		{
			$args = $args[0];
		}
		
		$this->unset_columns = $args;
		
		return $this;
	}	
	
	public function unset_list()
	{
		$this->unset_list = true;
	
		return $this;
	}	
	
	public function unset_fields()
	{
		$args = func_get_args();
	
		if(isset($args[0]) && is_array($args[0]))
		{
			$args = $args[0];
		}
	
		$this->unset_add_fields = $args;
		$this->unset_edit_fields = $args;
	
		return $this;
	}	
	
	public function unset_add_fields()
	{
		$args = func_get_args();
	
		if(isset($args[0]) && is_array($args[0]))
		{
			$args = $args[0];
		}
	
		$this->unset_add_fields = $args;
	
		return $this;
	}	
	
	public function unset_edit_fields()
	{
		$args = func_get_args();
	
		if(isset($args[0]) && is_array($args[0]))
		{
			$args = $args[0];
		}
	
		$this->unset_edit_fields = $args;
	
		return $this;
	}	
	
	
	/**
	 * Unsets everything that has to do with buttons or links with go back to list message
	 * @access	public
	 * @return	void 
	 */
	public function unset_back_to_list()
	{
		$this->unset_back_to_list = true;
		
		return $this;
	}
	
	/**
	 * 
	 * The fields that user will see on add/edit
	 *
	 * @access	public
	 * @param	string
	 * @param	array
	 * @return	void
	 */
	public function fields()
	{
		$args = func_get_args();
		
		if(isset($args[0]) && is_array($args[0]))
		{
			$args = $args[0];
		}
		
		$this->add_fields = $args;
		$this->edit_fields = $args;
		
		return $this;
	}
	
	/**
	 * 
	 * The fields that user can see . It is only for the add form
	 */
	public function add_fields()
	{
		$args = func_get_args();
		
		if(isset($args[0]) && is_array($args[0]))
		{
			$args = $args[0];
		}
		
		$this->add_fields = $args;
		
		return $this;
	}	

	/**
	 * 
	 *  The fields that user can see . It is only for the edit form
	 */
	public function edit_fields()
	{
		$args = func_get_args();
		
		if(isset($args[0]) && is_array($args[0]))
		{
			$args = $args[0];
		}
		
		$this->edit_fields = $args;
		
		return $this;
	}	
	
	/**
	 * 
	 * Changes the displaying label of the field
	 * @param $field_name
	 * @param $display_as
	 * @return void
	 */
	public function display_as($field_name, $display_as = null)
	{
		if(is_array($field_name))
		{
			foreach($field_name as $field => $display_as)
			{
				$this->display_as[$field] = $display_as;	
			}
		}
		elseif($display_as !== null)
		{
			$this->display_as[$field_name] = $display_as;
		}
		return $this;
	}
	
	/**
	 * 
	 * Load the language strings array from the language file
	 */
	protected function _load_language()
	{
		/*if($this->language === null)
		{
			$this->language = strtolower($this->config->default_language);
		}
		include($this->default_language_path.'/'.$this->language.'.php');
		
		foreach($lang as $handle => $lang_string)
			if(!isset($this->lang_strings[$handle]))
				$this->lang_strings[$handle] = $lang_string;*/
		
		$this->default_true_false_text = array( __('form_inactive') , __('form_active'));
		$this->subject = $this->subject === null ? __('list_record') : $this->subject;		
		
	}

	protected function _load_date_format()
	{
		list($php_day, $php_month, $php_year) = array('d','m','Y');
		list($js_day, $js_month, $js_year) = array('dd','mm','yy');
		list($ui_day, $ui_month, $ui_year) = array('dd','mm','yyyy');
//@todo ui_day, ui_month, ui_year has to be lang strings
		
		$date_format = $this->config->date_format;
		switch ($date_format) {
			case 'uk-date':
				$this->php_date_format 		= "$php_day/$php_month/$php_year";
				$this->js_date_format		= "$js_day/$js_month/$js_year";
				$this->ui_date_format		= "$ui_day/$ui_month/$ui_year";
			break;
			
			case 'us-date':
				$this->php_date_format 		= "$php_month/$php_day/$php_year";
				$this->js_date_format		= "$js_month/$js_day/$js_year";
				$this->ui_date_format		= "$ui_month/$ui_day/$ui_year";
			break;
			
			case 'sql-date':
			default:
				$this->php_date_format 		= "$php_year-$php_month-$php_day";
				$this->js_date_format		= "$js_year-$js_month-$js_day";
				$this->ui_date_format		= "$ui_year-$ui_month-$ui_day";
			break;
		}
	}
	
	/**
	 * 
	 * Set a language string directly
	 * @param string $handle
	 * @param string $string
	 */
	public function set_lang_string($handle, $lang_string){
		$this->lang_strings[$handle] = $lang_string;
		
		return $this;
	}
	
	/**
	 * 
	 * Just an alias to get_lang_string method 
	 * @param string $handle
	 */
	public function l($handle)
	{
		return $this->get_lang_string($handle);
	}
	
	/**
	 * 
	 * Get the language string of the inserted string handle
	 * @param string $handle
	 */
	public function get_lang_string($handle)
	{
		/*return $this->lang_strings[$handle];*/
	}
	
	/**
	 * 
	 * Simply set the language
	 * @example english
	 * @param string $language
	 */
	public function set_language($language)
	{
		$this->language = $language;
		
		return $this;
	}
	
	/**
	 * 
	 * Enter description here ...
	 */
	public function get_columns()
	{
		if($this->columns_checked === false)
		{
			$field_types = $this->get_field_types();
			if(empty($this->columns))
			{
				$this->columns = array();
				foreach($field_types as $field)
				{
					if( !isset($field->db_extra) || $field->db_extra != 'auto_increment' )
						$this->columns[] = $field->name;
				}
			}
			
			foreach($this->columns as $col_num => $column)
			{				
			
				if(isset($this->relation[$column]))
				{
					
					$new_column = $this->_unique_field_name($this->relation[$column][0]);
					$this->columns[$col_num] = $new_column;
					
					if(isset($this->display_as[$column]))
					{
						$display_as = $this->display_as[$column];
						unset($this->display_as[$column]);
						$this->display_as[$new_column] = $display_as;
					}
					else
					{
						$this->display_as[$new_column] = ucfirst(str_replace('_',' ',$column));
					}
					
					$column = $new_column;
					$this->columns[$col_num] = $new_column;
				}
				else
				{	
					if(!empty($this->relation))
					{
						$table_name  = $this->get_table();
						foreach($this->relation as $relation)
						{
							if( $relation[2] == $column )
							{
								$new_column = $table_name.'.'.$column;
								if(isset($this->display_as[$column]))
								{
									$display_as = $this->display_as[$column];
									unset($this->display_as[$column]);
									$this->display_as[$new_column] = $display_as;
								}
								else
								{
									$this->display_as[$new_column] = ucfirst(str_replace('_',' ',$column));
								}
								
								$column = $new_column;
								$this->columns[$col_num] = $new_column;
							}
						}
					}
						
				}
				
				if(isset($this->display_as[$column]))
					$this->columns[$col_num] = (object)array('field_name' => $column, 'display_as' => $this->display_as[$column]);
				elseif(isset($field_types[$column]))
					$this->columns[$col_num] = (object)array('field_name' => $column, 'display_as' => $field_types[$column]->display_as);
				else
					$this->columns[$col_num] = (object)array('field_name' => $column, 'display_as' => 
						ucfirst(str_replace('_',' ',$column)));
					
				if(!empty($this->unset_columns) && in_array($column,$this->unset_columns))
				{
					unset($this->columns[$col_num]);
				}
			}			
			
			$this->columns_checked = true;
			
		}
		
		return $this->columns;
	}
	
	/**
	 * 
	 * Enter description here ...
	 */
	protected function get_add_fields()
	{
		if($this->add_fields_checked === false)
		{
			$field_types = $this->get_field_types();
			if(!empty($this->add_fields))
			{
				foreach($this->add_fields as $field_num => $field)
				{
					if(isset($this->display_as[$field]))
						$this->add_fields[$field_num] = (object)array('field_name' => $field, 'display_as' => $this->display_as[$field]);
					elseif(isset($field_types[$field]->display_as))
						$this->add_fields[$field_num] = (object)array('field_name' => $field, 'display_as' => $field_types[$field]->display_as);
					else
						$this->add_fields[$field_num] = (object)array('field_name' => $field, 'display_as' => ucfirst(str_replace('_',' ',$field)));
				}
			}
			else 
			{
				$this->add_fields = array();
				foreach($field_types as $field)
				{
					//Check if an unset_add_field is initialize for this field name
					if($this->unset_add_fields !== null && is_array($this->unset_add_fields) && in_array($field->name,$this->unset_add_fields))
						continue;
					
					if( (!isset($field->db_extra) || $field->db_extra != 'auto_increment') )
					{
						if(isset($this->display_as[$field->name]))
							$this->add_fields[] = (object)array('field_name' => $field->name, 'display_as' => $this->display_as[$field->name]);
						else
							$this->add_fields[] = (object)array('field_name' => $field->name, 'display_as' => $field->display_as);
					}
				}
			}
			
			$this->add_fields_checked = true;
		}
		return $this->add_fields;
	}	
	
	/**
	 * 
	 * Enter description here ...
	 */
	protected function get_edit_fields()
	{
		if($this->edit_fields_checked === false)
		{
			//echo 'edit field checked<br/>';
			$field_types = $this->get_field_types();
			if(!empty($this->edit_fields))
			{
				foreach($this->edit_fields as $field_num => $field)
				{
					if(isset($this->display_as[$field]))
						$this->edit_fields[$field_num] = (object)array('field_name' => $field, 'display_as' => $this->display_as[$field]);
					else
						$this->edit_fields[$field_num] = (object)array('field_name' => $field, 'display_as' => $field_types[$field]->display_as);
				}
			}
			else 
			{
				//echo 'edit field not checked<br/>';
				$this->edit_fields = array();
				foreach($field_types as $field)
				{
					//Check if an unset_edit_field is initialize for this field name
					if($this->unset_edit_fields !== null && is_array($this->unset_edit_fields) && in_array($field->name,$this->unset_edit_fields))
						continue;
					
					if(!isset($field->db_extra) || $field->db_extra != 'auto_increment')
					{
						if(isset($this->display_as[$field->name]))
							$this->edit_fields[] = (object)array('field_name' => $field->name, 'display_as' => $this->display_as[$field->name]);
						else
							$this->edit_fields[] = (object)array('field_name' => $field->name, 'display_as' => $field->display_as);
					}
				}
			}
			
			$this->edit_fields_checked = true;
		}
		//print_r($this->edit_fields);
		return $this->edit_fields;
	}		
	
	public function order_by($order_by, $direction = 'asc')
	{
		$this->order_by = array($order_by,$direction);

		return $this;
	}
	
	public function where($key, $value = NULL, $escape = TRUE)
	{
		$this->where[] = array($key,$value,$escape);

		return $this;
	}
	
	public function or_where($key, $value = NULL, $escape = TRUE)
	{
		$this->or_where[] = array($key,$value,$escape);

		return $this;
	}	
	
	public function like($field, $match = '', $side = 'both')
	{
		$this->like[] = array($field, $match, $side);

		return $this;
	}

	protected function having($key, $value = '', $escape = TRUE)
	{
		$this->having[] = array($key, $value, $escape);

		return $this;
	}
	
	protected function or_having($key, $value = '', $escape = TRUE)
	{
		$this->or_having[] = array($key, $value, $escape);

		return $this;
	}	
	
	public function or_like($field, $match = '', $side = 'both')
	{
		$this->or_like[] = array($field, $match, $side);

		return $this;
	}	

	public function limit($limit, $offset = '')
	{
		$this->limit = array($limit,$offset);

		return $this;
	}
	
	protected function _initialize_helpers()
	{
		/*$ci = &get_instance();
		
		$ci->load->helper('url');
		$ci->load->helper('form');*/
	}
	
	/*   ajout 2012-12-08*/
	
	public static function config($config_item, $file = 'oscrud')
	{		
		// Finally, result to the Config file
		return Kohana::$config->load($file.'.'.$config_item);
	}
	
	/* fin ajout*/
	
	protected function _initialize_variables()
	{
		/*$ci = &get_instance();
		$ci->load->config('oscrud');*/
		
		$this->config = (object)array();
		
		
		
		//$closetag = (Formo::config($this->_field, 'close_single_html_tags') === TRUE)
		
		/** Initialize all the config variables into this object */
		$this->config->default_language 			= Oscrud::config('oscrud_default_language');
		$this->config->date_format 					= Oscrud::config('oscrud_date_format');
		$this->config->default_per_page 			= Oscrud::config('oscrud_default_per_page');
		$this->config->file_upload_allow_file_types = Oscrud::config('oscrud_file_upload_allow_file_types');
		$this->config->file_upload_max_file_size	= Oscrud::config('oscrud_file_upload_max_file_size');
		$this->config->default_text_editor 			= Oscrud::config('oscrud_default_text_editor');
		$this->config->text_editor_type 			= Oscrud::config('oscrud_text_editor_type');
		$this->config->character_limiter 			= Oscrud::config('oscrud_character_limiter');
		
		// arevoir
		/** Initialize default paths */
		/*$this->default_javascript_path				= $this->default_assets_path.'/js';
		$this->default_css_path						= $this->default_assets_path.'/css';
		$this->default_texteditor_path 				= $this->default_assets_path.'/texteditor';
		$this->default_theme_path					= $this->default_assets_path.'/themes';*/
	
		
		$this->character_limiter = $this->config->character_limiter;
		
		if($this->character_limiter === 0 || $this->character_limiter === '0')
		{
			$this->character_limiter = 1000000; //a big number
		}
		elseif($this->character_limiter === null || $this->character_limiter === false)
		{
			$this->character_limiter = 30; //is better to have the number 30 rather than the 0 value
		}
	}
	
	protected function _set_primary_keys_to_model()
	{
		if(!empty($this->primary_keys))
		{
			foreach($this->primary_keys as $primary_key)
			{
				$this->basic_model->set_primary_key($primary_key['field_name'],$primary_key['table_name']);
			}
		}
	}
	
	/**
	 * Initialize all the required libraries and variables before rendering
	 */
	public function pre_render()
	{
		$this->_initialize_variables();
		$this->_initialize_helpers();
		$this->_load_language();
		
		$this->state_code = $this->getStateCode();
		
		if($this->basic_model === null)
			$this->set_default_Model();
		
		$this->set_basic_db_table($this->get_table());	

		$this->_load_date_format();
		
		$this->_set_primary_keys_to_model();
	}
	
	/**
	 * 
	 * Or else ... make it work! The web application takes decision of what to do and show it to the final user.
	 * Without this function nothing works. Here is the core of grocery CRUD project.
	 * 
	 * @access	public
	 */
	public function render()
	{
		$this->pre_render();
		
		if( $this->state_code != 0 )
		{
			$this->state_info = $this->getStateInfo();
		}
		else
		{
			throw new Exception('The state is unknown , I don\'t know what I will do with your data!', 4);
			die();
		}
		
		switch ($this->state_code) {
			case 15://success
			case 1://list
				if($this->unset_list)
				{
					throw new Exception('You don\'t have permissions for this operation', 14);
					die();
				}
				
				if($this->theme === null)
					$this->set_theme($this->default_theme);				
				$this->setThemeBasics();
					
				$this->set_basic_Layout();
					
				$state_info = $this->getStateInfo();
				
				$this->showList(false,$state_info);

			break;
			
			case 2://add
				if($this->unset_add)
				{
					throw new Exception('You don\'t have permissions for this operation', 14);
					die();
				}
				
				if($this->theme === null)
					$this->set_theme($this->default_theme);				
				$this->setThemeBasics();
				
				$this->set_basic_Layout();
				
				$this->showAddForm();
				
			break;
			
			case 3://edit
				if($this->unset_edit)
				{
					throw new Exception('You don\'t have permissions for this operation', 14);
					die();
				}
				
				if($this->theme === null)
					$this->set_theme($this->default_theme);				
				$this->setThemeBasics();
				
				$this->set_basic_Layout();
				
				$state_info = $this->getStateInfo();
				
				$this->showEditForm($state_info);
				
			break;

			case 4://delete
				if($this->unset_delete)
				{
					throw new Exception('This user is not allowed to do this operation', 14);
					die();
				}
				
				$state_info = $this->getStateInfo();
				$delete_result = $this->db_delete($state_info);
				
				$this->delete_layout( $delete_result );
			break;				
			
			case 5://insert
				if($this->unset_add)
				{
					throw new Exception('This user is not allowed to do this operation', 14);
					die();
				}
				
				$state_info = $this->getStateInfo();
				$insert_result = $this->db_insert($state_info);
				
				$this->insert_layout($insert_result);
			break;

			case 6://update
				if($this->unset_edit)
				{
					throw new Exception('This user is not allowed to do this operation', 14);
					die();
				}
				
				$state_info = $this->getStateInfo();
				$update_result = $this->db_update($state_info);
				
				$this->update_layout( $update_result,$state_info);
			break;	

			case 7://ajax_list
				
				if($this->unset_list)
				{
					throw new Exception('You don\'t have permissions for this operation', 14);
					die();
				}
				
				if($this->theme === null)
					$this->set_theme($this->default_theme);				
				$this->setThemeBasics();
				
				$this->set_basic_Layout();
				
				$state_info = $this->getStateInfo();
				$this->set_ajax_list_queries($state_info);				
					
				$this->showList(true);
				
			break;

			case 8://ajax_list_info

				if($this->theme === null)
					$this->set_theme($this->default_theme);				
				$this->setThemeBasics();
				
				$this->set_basic_Layout();
				
				$state_info = $this->getStateInfo();
				$this->set_ajax_list_queries($state_info);				
					
				$this->showListInfo();
			break;
			
			case 9://insert_validation
				
				$validation_result = $this->db_insert_validation();
				
				$this->validation_layout($validation_result);
			break;
			
			case 10://update_validation
				
				$validation_result = $this->db_update_validation();
				
				$this->validation_layout($validation_result);
			break;

			case 11://upload_file
				
				$state_info = $this->getStateInfo();
				
				$upload_result = $this->upload_file($state_info);

				$this->upload_layout($upload_result, $state_info->field_name);
			break;

			case 12://delete_file
				$state_info = $this->getStateInfo();
				
				$delete_file_result = $this->delete_file($state_info);
				
				$this->delete_file_layout($delete_file_result);
			break;
			/*
			case 13: //ajax_relation
				$state_info = $this->getStateInfo();
				
				$ajax_relation_result = $this->ajax_relation($state_info);
				
				$ajax_relation_result[""] = "";
				
				echo json_encode($ajax_relation_result);
				die();				
			break;
			
			case 14: //ajax_relation_n_n
				echo json_encode(array("34" => 'Johnny' , "78" => "Test"));
				die();
			break;
			*/		
			case 16: //export to excel
				//a big number just to ensure that the table characters will not be cutted.
				$this->character_limiter = 1000000;
				
				if($this->unset_export)
				{
					throw new Exception('You don\'t have permissions for this operation', 15);
					die();
				}
				
				if($this->theme === null)
					$this->set_theme($this->default_theme);
				$this->setThemeBasics();
				
				$this->set_basic_Layout();
				
				$state_info = $this->getStateInfo();
				$this->set_ajax_list_queries($state_info);
				$this->exportToExcel($state_info);
			break;
			
			case 17: //print
				//a big number just to ensure that the table characters will not be cutted.
				$this->character_limiter = 1000000;
			
				if($this->unset_print)
				{
					throw new Exception('You don\'t have permissions for this operation', 15);
					die();
				}
			
				if($this->theme === null)
					$this->set_theme($this->default_theme);
				$this->setThemeBasics();
			
				$this->set_basic_Layout();
			
				$state_info = $this->getStateInfo();
				$this->set_ajax_list_queries($state_info);
				$this->print_webpage($state_info);
			break;			
			
		}
		
		return $this->get_layout();
	}
	
	public function get_common_data()
	{
		$data = (object)array();
		
		$data->subject 				= $this->subject;
		$data->subject_plural 		= $this->subject_plural;
		
		return $data;
	}
	
	/**
	 * 
	 * Enter description here ...
	 */
	public function callback_before_insert($callback = null)
	{
		$this->callback_before_insert = $callback;
		
		return $this;
	}

	/**
	 * 
	 * Enter description here ...
	 */
	public function callback_after_insert($callback = null)
	{
		$this->callback_after_insert = $callback;
		
		return $this;
	}

	/**
	 * 
	 * Enter description here ...
	 */
	public function callback_insert($callback = null)
	{
		$this->callback_insert = $callback;
		
		return $this;
	}

	
	/**
	 * 
	 * Enter description here ...
	 */
	public function callback_before_update($callback = null)
	{
		$this->callback_before_update = $callback;
		
		return $this;
	}

	/**
	 * 
	 * Enter description here ...
	 */
	public function callback_after_update($callback = null)
	{
		$this->callback_after_update = $callback;
		
		return $this;
	}


	/**
	 * 
	 * Enter description here ...
	 * @param mixed $callback
	 */
	public function callback_update($callback = null)
	{
		$this->callback_update = $callback;
		
		return $this;
	}	
	
	/**
	 * 
	 * Enter description here ...
	 */
	public function callback_before_delete($callback = null)
	{
		$this->callback_before_delete = $callback;
		
		return $this;
	}

	/**
	 * 
	 * Enter description here ...
	 */
	public function callback_after_delete($callback = null)
	{
		$this->callback_after_delete = $callback;
		
		return $this;
	}

	/**
	 * 
	 * Enter description here ...
	 */
	public function callback_delete($callback = null)
	{
		$this->callback_delete = $callback;
		
		return $this;
	}		
	
	/**
	 * 
	 * Enter description here ...
	 * @param string $column
	 * @param mixed $callback
	 */
	public function callback_column($column ,$callback = null)
	{
		$this->callback_column[$column] = $callback;
		
		return $this;
	}
	
	/**
	 * 
	 * Enter description here ...
	 * @param string $field
	 * @param mixed $callback
	 */
	public function callback_field($field, $callback = null)
	{
		$this->callback_add_field[$field] = $callback;
		$this->callback_edit_field[$field] = $callback;
		
		return $this;
	}
	
	/**
	 * 
	 * Enter description here ...
	 * @param string $field
	 * @param mixed $callback
	 */
	public function callback_add_field($field, $callback = null)
	{
		$this->callback_add_field[$field] = $callback;
		
		return $this;
	}	

	/**
	 * 
	 * Enter description here ...
	 * @param string $field
	 * @param mixed $callback
	 */
	public function callback_edit_field($field, $callback = null)
	{
		$this->callback_edit_field[$field] = $callback;
		
		return $this;
	}
		
	/**
	 * 
	 * Callback that replace the default auto uploader
	 * 
	 * @param mixed $callback
	 * @return grocery_CRUD
	 */
	public function callback_upload($callback = null)
	{
		$this->callback_upload = $callback;
		
		return $this;
	}
	
	/**
	 * 
	 * A callback that triggered before the upload functionality. This callback is suggested for validation checks
	 * @param mixed $callback
	 * @return grocery_CRUD
	 */
	public function callback_before_upload($callback = null)
	{
		$this->callback_before_upload = $callback;
		
		return $this;
	}	

	/**
	 * 
	 * A callback that triggered after the upload functionality
	 * @param mixed $callback
	 * @return grocery_CRUD
	 */
	public function callback_after_upload($callback = null)
	{
		$this->callback_after_upload = $callback;
		
		return $this;		
		
	}		
	
	/**
	 * 
	 * Gets the basic database table of our crud. 
	 * @return string
	 */	
	public function get_table()
	{
		if($this->basic_db_table_checked)
		{
			return $this->basic_db_table;
		}
		elseif( $this->basic_db_table !== null )
		{
			if(!$this->table_exists($this->basic_db_table))
			{
				throw new Exception('The table name does not exist. Please check you database and try again.',11);
				die();
			}
			//echo "basic_db_table=".$this->basic_db_table."<br/>";
			$this->basic_db_table_checked = true;
			return $this->basic_db_table;
		}
		else 
		{
			//Last try , try to find the table from your view / function name!!! Not suggested but it works .
			$last_chance_table_name = $this->get_method_name();
			if($this->table_exists($last_chance_table_name))
			{
				$this->set_table($last_chance_table_name);
			}
			$this->basic_db_table_checked = true;
			return $this->basic_db_table;			
			
		}			
			
		return false;
	}
	
	/**
	 * 
	 * The field names of the required fields
	 */
	public function required_fields()
	{
		$args = func_get_args();
		
		if(isset($args[0]) && is_array($args[0]))
		{
			$args = $args[0];
		}
		
		$this->required_fields = $args;
		
		return $this;
	}
	
	/**
	 * 
	 * Sets the basic database table that we will get our data. 
	 * @param string $table_name
	 * @return grocery_CRUD
	 */
	public function set_table($table_name)
	{
		
		if(!empty($table_name) && $this->basic_db_table === null)
		{
			$this->basic_db_table = $table_name;
		}
		elseif(!empty($table_name))
		{
			throw new Exception('You have already insert a table name once...', 1);
		}
		else 
		{
			throw new Exception('The table name cannot be empty.', 2);
			die();
		}
			
		return $this;
	}
	
	/**
	 * 
	 * Set a subject to understand what type of CRUD you use.
	 * @example In this CRUD we work with the table db_categories. The $subject will be the 'Category'
	 * @param string $subject
	 * @param bool $has_plural
	 * @return grocery_CRUD
	 */
	public function set_subject( $subject )
	{		
		$this->subject 			= $subject;
		$this->subject_plural 	= $subject;
			
		return $this;
	}

	/**
	 * 
	 * Enter description here ...
	 * @param $title
	 * @param $image_url
	 * @param $url
	 * @param $css_class
	 * @param $url_callback
	 */
	public function add_action( $label, $image_url = '', $link_url = '', $css_class = '', $url_callback = null)
	{
		$unique_id = substr($label,0,1).substr(md5($label.$link_url),-8); //The unique id is used for class name so it must begin with a string
		
		$this->actions[$unique_id]  = (object)array(
			'label' 		=> $label, 
			'image_url' 	=> $image_url,
			'link_url'		=> $link_url,
			'css_class' 	=> $css_class,
			'url_callback' 	=> $url_callback,
			'url_has_http'	=> substr($link_url,0,7) == 'http://' ? true : false
		);
		
		return $this;
	}
	
	/**
	 * 
	 * Set a simple 1-n foreign key relation 
	 * @param string $field_name
	 * @param string $related_table
	 * @param string $related_title_field
	 * @param mixed $where_clause
	 * @param string $order_by
	 */
	public function set_relation($field_name , $related_table, $related_title_field, $where_clause = null, $order_by = null)
	{
		$this->relation[$field_name] = array($field_name, $related_table,$related_title_field, $where_clause, $order_by);
		return $this;
	}
	
	/**
	 * 
	 * Sets a relation with n-n relationship.
	 * @param string $field_name
	 * @param string $relation_table
	 * @param string $selection_table
	 * @param string $primary_key_alias_to_this_table
	 * @param string $primary_key_alias_to_selection_table
	 * @param string $title_field_selection_table
	 * @param string $priority_field_relation_table
	 * @param mixed $where_clause
	 */
	public function set_relation_n_n($field_name, $relation_table, $selection_table, $primary_key_alias_to_this_table, $primary_key_alias_to_selection_table , $title_field_selection_table , $priority_field_relation_table = null, $where_clause = null)
	{
		$this->relation_n_n[$field_name] = 
			(object)array( 
				'field_name' => $field_name, 
				'relation_table' => $relation_table, 
				'selection_table' => $selection_table, 
				'primary_key_alias_to_this_table' => $primary_key_alias_to_this_table, 
				'primary_key_alias_to_selection_table' => $primary_key_alias_to_selection_table , 
				'title_field_selection_table' => $title_field_selection_table , 
				'priority_field_relation_table' => $priority_field_relation_table,
				'where_clause' => $where_clause
			);
			
		return $this;
	}
	
	/**
	 * 
	 * Transform a field to an upload field
	 * 
	 * @param string $field_name
	 * @param string $upload_path
	 */
	public function set_field_upload($field_name, $upload_dir = null)
	{
		$upload_dir = substr($upload_dir,-1,1) == '/' ? substr($upload_dir,0,-1) : $upload_dir;
		$this->upload_fields[$field_name] = (object)array( 'field_name' => $field_name , 'upload_path' => $upload_dir, 'encrypted_field_name' =>  $this->_unique_field_name($field_name));		

		return $this;
	}
	
}

if(defined('CI_VERSION'))
{
	$ci = &get_instance();
	// a revoir olivier ajouter une lib de validation 
	//$ci->load->library('Form_validation');
	
	class oscrud_CRUD_Form_validation extends CI_Form_validation{
	
		public $CI;
		public $_field_data			= array();
		public $_config_rules		= array();
		public $_error_array		= array();
		public $_error_messages		= array();
		public $_error_prefix		= '<p>';
		public $_error_suffix		= '</p>';
		public $error_string		= '';
		public $_safe_form_data		= FALSE;
	}
	

}