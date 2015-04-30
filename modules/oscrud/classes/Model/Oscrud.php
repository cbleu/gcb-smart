<?php
/**
 * Oscadi Kohana Crud Model
 *
 * Creates a full functional CRUD with few lines of code.
 *
 * @package    	Oscadi Kohana CRUD 
 * @author     	Olivier Sautron
 * @license     
 * @link		
 */
class Model_Oscrud  extends Model { //DB_ORM_Model 
    
	protected $primary_key = null;
	public $table_name = null;
	protected $relation = array();
	protected $relation_n_n = array();
	protected $primary_keys = array();
	
	protected $connection = null;
	
	function __construct()
    {
        /*parent::__construct();*/
		//$this->db = Database::instance("default");
		$this->connection = DB_Connection_Pool::instance()->get_connection('default');
		
		//$this->basic_model
		//echo "construct table_name=".$this->table_name.'<br/>';
    }

    function db_table_exists($table_name = null)
    {
		//echo "table exists table_name=".$this->table_name.'<br/>';
		//echo 'table_name='.$table_name.'<br/>';
		return 1;
    	//return $this->db->table_exists($table_name);
    }
    
    
    
    function get_list()
    {
    	if($this->table_name === null)
    		return false;
    	
    	$select = "`{$this->table_name}`.*";

    	//set_relation special queries 
    	if(!empty($this->relation))
    	{
    		foreach($this->relation as $relation)
    		{
    			list($field_name , $related_table , $related_field_title) = $relation;
    			$unique_join_name = $this->_unique_join_name($field_name);
    			$unique_field_name = $this->_unique_field_name($field_name);
    			
				if(strstr($related_field_title,'{'))
				{
					//$related_field_title = str_replace(" ","&nbsp;",$related_field_title);
					$related_field_title = str_replace(array('{','}'),  '', $related_field_title);
					//echo 'unique='.$related_field_title."<br/>";
					$chars = preg_split('/ /', $related_field_title);
					//print_r($chars);
					//echo 'unique='.$related_field_title."<br/>";
					$ajoutselect = array();
					for ($iop=0; $iop < count($chars); $iop++) { 
						$ajoutselect[$iop] = "COALESCE(`{$unique_join_name}.".$chars[$iop]."`,'')";
					}
					$select .= ", CONCAT(";
					for ($iop=0; $iop < count($chars); $iop++) { 
						$select .= "".$ajoutselect[$iop].",' ',";
					}
					$select .= "'') as $unique_field_name";
					//$select .= ", CONCAT('COALESCE({$unique_join_name}.",", '');
    				//$select .= ", CONCAT('".str_replace(array('{','}'),array("',COALESCE({$unique_join_name}.",", ''),'"),str_replace("'","\\'",$related_field_title))."') as $unique_field_name";
					//echo $select; 
					$this->builder->column($select);
				}
    			else
    			{   

					$this->builder->column($select);	
					$this->builder->column($unique_join_name.".".$related_field_title,$unique_field_name);
    				//$select .= ", $unique_join_name.$related_field_title AS $unique_field_name";

    			}
    			
    			if($this->field_exists($related_field_title)){

					//echo 'related field title='.$related_field_title.'<br/>';
					
					// a revoir 
					$this->builder->column("{$this->table_name}.$related_field_title", $this->table_name.".".$related_field_title);
					//$select .= ", {$this->table_name}.$related_field_title AS '{$this->table_name}.$related_field_title'";
					//$select .= ", `{$this->table_name}`.$related_field_title AS '{$this->table_name}.$related_field_title'";
    				//echo "toto";
					//$select = $select;
					//$this->builder->column("{$this->table_name}.$related_field_title","{$this->table_name}.".$related_field_title);
				}
    		
			}
    	}

		//echo "<br/>".$select."<br/>";
    	
    	//set_relation_n_n special queries. We prefer sub queries from a simple join for the relation_n_n as it is faster and more stable on big tables.
    	if(!empty($this->relation_n_n))
    	{
			$select = $this->relation_n_n_queries($select);
    	}

		Log::instance()->add(Log::NOTICE, "get_list : select =".$select);

		//echo $select;
    	//echo 'select='.$select."<br/>";
    	//$this->db->select($select, false); 
		//$this->builder = DB_SQL::select($this->table_name);  
 		//$this->builder = DB_SQL::select($select);
		//$this->builder = DB_SQL::select('default');
		$this->builder->from($this->table_name);
		//print_r($this->builder);
		// 
		Log::instance()->add(Log::NOTICE, $this->builder->statement());
		
    	$results = $this->builder->query();
		
		//print_r($results);
		
		$tabcol = array();
		foreach ($results as $records) {
			//echo "records=<br/>";
			//print_r($records);
			//echo "fin records=<br/>";
			array_push($tabcol,(object)$records);
		}
		//$results = (object) array_map(__FUNCTION__, $tabcol);
		//print_r($results);
    	//$results = $this->db->get($this->table_name)->result();
    	
    	return $tabcol;
    }

	public function set_primary_key($field_name, $table_name = null)
    {
    	$table_name = $table_name === null ? $this->table_name : $table_name;
    	
    	$this->primary_keys[$table_name] = $field_name;
    }
    
    protected function relation_n_n_queries($select)
    {
    	$this_table_primary_key = $this->get_primary_key();
    	foreach($this->relation_n_n as $relation_n_n)
    	{
    		list($field_name, $relation_table, $selection_table, $primary_key_alias_to_this_table,
    					$primary_key_alias_to_selection_table, $title_field_selection_table, $priority_field_relation_table) = array_values((array)$relation_n_n);
    			 
    		$primary_key_selection_table = $this->get_primary_key($selection_table);
    		
	    	$field = "";
	    	$use_template = strpos($title_field_selection_table,'{') !== false;
	    	$field_name_hash = $this->_unique_field_name($title_field_selection_table);
	    	if($use_template)
	    	{
	    		$title_field_selection_table = str_replace(" ", "&nbsp;", $title_field_selection_table);
	    		$field .= "CONCAT('".str_replace(array('{','}'),array("',COALESCE(",", ''),'"),str_replace("'","\\'",$title_field_selection_table))."')";
	    	}
	    	else
	    	{
	    		$field .= "$selection_table.$title_field_selection_table";
	    	}
    			 
    		//Sorry Codeigniter but you cannot help me with the subquery!
    		$select .= ", (SELECT GROUP_CONCAT(DISTINCT $field) FROM $selection_table "
    			."LEFT JOIN $relation_table ON $relation_table.$primary_key_alias_to_selection_table = $selection_table.$primary_key_selection_table "
    			."WHERE $relation_table.$primary_key_alias_to_this_table = `{$this->table_name}`.$this_table_primary_key GROUP BY $relation_table.$primary_key_alias_to_this_table) AS $field_name";
    	}

    	return $select;
    } 
    
    function order_by($order_by , $direction ='DESC')
    {
		$this->builder->order_by($order_by,$direction);
    	//$this->db->order_by( $order_by , $direction );
    }
    
	function where_block($parenthese, $operator = 'AND')
    {
		// Modif by Damien
		if($parenthese == "(") {
			$this->builder->where_block($parenthese, $operator);
		}
		else if($parenthese == ")") {
			$this->builder->where_block($parenthese);
		}
	}

    function where($key, $operator, $value, $block = NULL)
    {
		$this->builder->where( $key, $operator, $value);
    }
    
    function or_where($key, $operator, $value, $block = NULL)
    {
		$this->builder->where( $key, $operator, $value, 'OR');
    } 

    function having($key, $value = NULL, $escape = TRUE)
    {
		$this->builder->having($key, '=', $value);
		
    	//$this->db->having( $key, $value, $escape);
    }    

    function or_having($key, $value = NULL, $escape = TRUE)
    {
		$this->builder->having($key, '=', $value);
    	//$this->db->or_having( $key, $value, $escape);
    }    
    
    function like($field, $match = '', $side = 'both', $block = NULL)
    {
	
		if($side=='both'){
			$match ='%'.$match.'%';
		}
		else{
			$match ='%'.$match;
		}
		$this->builder->where($field,'like',$match);
    	//$this->db->like($field, $match, $side);
    }
    
    function or_like($field, $match = '', $side = 'both', $block = NULL)
    {
		if($side=='both'){
			$match ='%'.$match.'%';
		}
		else{
			$match ='%'.$match;
		}
		
		//$this->builder->where_block('(', 'OR');
		
		$this->builder->where($field,'like',$match, 'OR');
		//$this->builder->where_block(')');;
    	//$this->db->or_like($field, $match, $side);
    }    
    
    function limit($value, $offset = '')
    {
		
		//echo 'limit '.$value.','.$offset;
		$this->builder->limit($value);
		$this->builder->offset($offset);
    	//$this->db->limit( $value , $offset );
		//print_r($this->builder);
    }
    
    function get_total_results()
    {
		//echo 'get_total_results';
    	//set_relation_n_n special queries. We prefer sub queries from a simple join for the relation_n_n as it is faster and more stable on big tables.
    	if(!empty($this->relation_n_n))
    	{
			//echo 'if';
    		$select = "{$this->table_name}.*";
    		$select = $this->relation_n_n_queries($select);
    		$this->builder = DB_SQL::select($select);
    		//$this->db->select($select,false);
    		//echo "count=".$this->builder->count();
    		//return $this->db->get($this->table_name)->num_rows();
			return $this->builder->count();
    		    		
    	}
    	else 
    	{   
			//echo 'else';
			//print_r($this);
			//$this->builder = DB_SQL::select('default');
			//$this->builder->from($this->table_name);
			
			$count = $this->builder->query()->count();
			//print_r($count);
			//echo "counteur=".$count;
			return $count;
    		//return $this->db->get($this->table_name)->num_rows();
    	}
    }
    
    function set_basic_table($table_name = null)
    {
		// a revoir
    	/*if( !($this->db->table_exists($table_name)) )
    		return false;*/
    	//echo "set basic table  name=".$table_name."<br/>";
    	$this->table_name = $table_name;
		
		$this->builder = DB_SQL::select('default');
		$this->builder->from($this->table_name);
    	//$this->builder = DB_SQL::select($this->table_name);
    	return true;
    }


    function get_edit_values($primary_key_value)
    {
    	$primary_key_field = $this->get_primary_key();

		
		$this->builder->where($primary_key_field,'=',$primary_key_value);
    	//$this->db->where($primary_key_field,$primary_key_value);
    	//$result = $this->db->get($this->table_name)->row();
		
		//$this->builder = DB_SQL::select($this->table_name)
		//print_r($this->builder);
		$result = $this->builder->query();
		
		$tabcol = array();
		foreach ($result as $records) {
			//echo "records=<br/>";
			//print_r($records);
			//echo "fin records=<br/>";
			array_push($tabcol,(object)$records);
		}
		//$results = (object) array_map(__FUNCTION__, $tabcol);
		//print_r($results);
    	//$results = $this->db->get($this->table_name)->result();
    	//print_r($tabcol);
		if(count($tabcol)>0){
			return $tabcol[0];
		}
		else{
			return $tabcol;
		}
    }
    
    function join_relation($field_name , $related_table , $related_field_title)
    {
		$related_primary_key = $this->get_primary_key($related_table);
		
		if($related_primary_key !== false)
		{
			//echo "on passe Oscrud.php join_relation 1.<br/>";
			$unique_name = $this->_unique_join_name($field_name);
			
			$this->builder->join('LEFT', $related_table,$unique_name)
			//->on($related_table.".".$related_primary_key.' as '.$unique_name, '=', $field_name);
			->on($unique_name.".".$related_primary_key, '=', "{$this->table_name}.$field_name");
			
			//print_r($this->builder->statement());
			//echo "$related_table.$related_primary_key as $unique_name";
			
			//echo "requete=".$related_table.' as '.$unique_name .', '.$unique_name.$related_primary_key.' = '."{$this->table_name}.$field_name";
			
			//$this->db->join( $related_table.' as '.$unique_name , "$unique_name.$related_primary_key = {$this->table_name}.$field_name",'left');

			$this->relation[$field_name] = array($field_name , $related_table , $related_field_title);
			
			return true;
		}

    	return false;
    }
    
    function set_relation_n_n_field($field_info)
    {    
		$this->relation_n_n[$field_info->field_name] = $field_info;
    }
    
    protected function _unique_join_name($field_name)
    {
    	return 'j'.substr(md5($field_name),0,8); //This j is because is better for a string to begin with a letter and not with a number
    }

    protected function _unique_field_name($field_name)
    {
		// a revoir probleme de selection de colonne dans leap
		//return $field_name;
    	return 's'.substr(md5($field_name),0,8); //This s is because is better for a string to begin with a letter and not with a number
    }    


    function get_relation_array($field_name , $related_table , $related_field_title, $where_clause, $order_by, $limit = null, $search_like = null)
    {
		$this->builder = DB_SQL::select('default');
		$this->builder->from($related_table);
	
		//echo  "<br/>deb=".$this->builder->statement()."<br/>";
			
    	$relation_array = array();
    	$field_name_hash = $this->_unique_field_name($field_name);
    	
    	$related_primary_key = $this->get_primary_key($related_table);
    	
    	$select = "$related_table.$related_primary_key, ";
    	
    	if(strstr($related_field_title,'{'))
    	{
    		$related_field_title = str_replace(" ", "&nbsp;", $related_field_title);
    		$select .= "CONCAT('".str_replace(array('{','}'),array("',COALESCE(",", ''),'"),str_replace("'","\\'",$related_field_title))."') as $field_name_hash";
    	}
    	else
    	{
	    	$select .= "$related_table.$related_field_title as $field_name_hash";
    	}
    	
	
		//$results = $connection->query($select);
    	//$this->db->select($select,false);
		$this->builder->from($related_table);
		$this->builder->column($related_primary_key);
		$this->builder->column($related_field_title,$field_name_hash);
		

		

    	if($where_clause !== null)
    		//$this->db->where($where_clause);
			$this->builder->where($where_clause);
			
    	if($limit !== null)
    		//$this->db->limit($limit);    	
    		$this->builder->limit($limit);

    	if($search_like !== null){
			Log::instance()->add(Log::NOTICE, "having sql: array =".$this->builder->statement);
			//$this->db->having("$field_name_hash LIKE '%".$this->db->escape_like_str($search_like)."%'");
			//$this->builder->group_by($field_name_hash);
    		$this->builder->having("$field_name_hash LIKE '%".$this->db->escape_like_str($search_like)."%'");
		}


		// a revoir order by hash ?
    	$order_by !== null 
    		//? $this->db->order_by($order_by) 
    		//: $this->db->order_by($field_name_hash);
    		? $this->builder->order_by($order_by) 
			: $this->builder->order_by($field_name_hash);
			
    	//$results = $this->db->get($related_table)->result();
		//$this->builder->from($related_table);
		//echo  $this->builder->statement();
		
		$results = $this->builder->query();
    	//print_r($results);
		$records = $results->as_array();   
		//print_r($records);
    	foreach($records as $row)
    	{
			//echo $row[$related_primary_key];
			//echo $row[$field_name_hash];
    		$relation_array[$row[$related_primary_key]] = $row[$field_name_hash];	
    	}
    	
    	return $relation_array;
    }
    
    function get_ajax_relation_array($search, $field_name , $related_table , $related_field_title, $where_clause, $order_by)
    {   

    	return $this->get_relation_array($field_name , $related_table , $related_field_title, $where_clause, $order_by, 10 , $search);
    }
    
    function get_relation_total_rows($field_name , $related_table , $related_field_title, $where_clause)
    {
		$this->builder = DB_SQL::select('default');
		$this->builder->from($related_table);
		
    	if($where_clause !== null)
			$this->builder->where($where_clause);
    		//$this->db->where($where_clause);
    	
    	//return $this->db->get($related_table)->num_rows();
		$this->builder->from($related_table);
		$count = $this->builder->query()->count();
		return $count;
		
    } 
    
    function get_relation_n_n_selection_array($primary_key_value, $field_info)
    {
    	$select = "";    	
    	$related_field_title = $field_info->title_field_selection_table;
    	$use_template = strpos($related_field_title,'{') !== false;;
    	$field_name_hash = $this->_unique_field_name($related_field_title);
    	if($use_template)
    	{
    		$related_field_title = str_replace(" ", "&nbsp;", $related_field_title);
    		$select .= "CONCAT('".str_replace(array('{','}'),array("',COALESCE(",", ''),'"),str_replace("'","\\'",$related_field_title))."') as $field_name_hash";
    	}
    	else
    	{
    		$select .= "$related_field_title as $field_name_hash";
    	}
    	$this->db->select('*, '.$select,false);
    	
    	$selection_primary_key = $this->get_primary_key($field_info->selection_table);
    	 
    	if(empty($field_info->priority_field_relation_table))
    	{
    		if(!$use_template){
    			$this->db->order_by("{$field_info->selection_table}.{$field_info->title_field_selection_table}");
    		}
    	}
    	else
    	{
    		$this->db->order_by("{$field_info->relation_table}.{$field_info->priority_field_relation_table}");
    	}
    	$this->db->where($field_info->primary_key_alias_to_this_table, $primary_key_value);
    	$this->db->join(
    			$field_info->selection_table,
    			"{$field_info->relation_table}.{$field_info->primary_key_alias_to_selection_table} = {$field_info->selection_table}.{$selection_primary_key}"
    		);
    	$results = $this->db->get($field_info->relation_table)->result();
    	
    	$results_array = array();
    	foreach($results as $row)
    	{
    		$results_array[$row->{$field_info->primary_key_alias_to_selection_table}] = $row->{$field_name_hash};
    	}
    			 
    	return $results_array;
    }
    
    function get_relation_n_n_unselected_array($field_info, $selected_values)
    {
    	$use_where_clause = !empty($field_info->where_clause);
    	
    	$select = "";
    	$related_field_title = $field_info->title_field_selection_table;
    	$use_template = strpos($related_field_title,'{') !== false;
    	$field_name_hash = $this->_unique_field_name($related_field_title);
    	
    	if($use_template)
    	{
    		$related_field_title = str_replace(" ", "&nbsp;", $related_field_title);
    		$select .= "CONCAT('".str_replace(array('{','}'),array("',COALESCE(",", ''),'"),str_replace("'","\\'",$related_field_title))."') as $field_name_hash";
    	}
    	else
    	{
    		$select .= "$related_field_title as $field_name_hash";
    	}
    	$this->db->select('*, '.$select,false);
    	
    	if($use_where_clause){
    		$this->db->where($field_info->where_clause);	
    	}
    	
    	$selection_primary_key = $this->get_primary_key($field_info->selection_table);
        if(!$use_template)
        	$this->db->order_by("{$field_info->selection_table}.{$field_info->title_field_selection_table}");
        $results = $this->db->get($field_info->selection_table)->result();

        $results_array = array();
        foreach($results as $row)
        {
            if(!isset($selected_values[$row->$selection_primary_key]))
                $results_array[$row->$selection_primary_key] = $row->{$field_name_hash};
        }
        
        return $results_array;       
    }
    
    function db_relation_n_n_update($field_info, $post_data ,$main_primary_key)
    {
    	$this->db->where($field_info->primary_key_alias_to_this_table, $main_primary_key);
    	if(!empty($post_data))
    		$this->db->where_not_in($field_info->primary_key_alias_to_selection_table , $post_data);
    	$this->db->delete($field_info->relation_table);
    	
    	$counter = 0;
    	if(!empty($post_data))
    	{    
    		foreach($post_data as $primary_key_value)
	    	{
				$where_array = array(
	    			$field_info->primary_key_alias_to_this_table => $main_primary_key,
	    			$field_info->primary_key_alias_to_selection_table => $primary_key_value, 
	    		);
	    		
	    		$this->db->where($where_array);
				$count = $this->db->from($field_info->relation_table)->count_all_results();
				
				if($count == 0)
				{
					if(!empty($field_info->priority_field_relation_table))
						$where_array[$field_info->priority_field_relation_table] = $counter;
						
					$this->db->insert($field_info->relation_table, $where_array);
					
				}elseif($count >= 1 && !empty($field_info->priority_field_relation_table))
				{
					$this->db->update( $field_info->relation_table, array($field_info->priority_field_relation_table => $counter) , $where_array);
				}
				
				$counter++;
	    	}
    	}
    }
    
    function db_relation_n_n_delete($field_info, $main_primary_key)
    {
    	$this->db->where($field_info->primary_key_alias_to_this_table, $main_primary_key);
    	$this->db->delete($field_info->relation_table);
    }    
    
	function get_field_types_basic_table_ci()
    {
    	$db_field_types = array();
    	foreach($this->db->query("SHOW COLUMNS FROM `{$this->table_name}`")->result() as $db_field_type)
    	{
    		$type = explode("(",$db_field_type->Type);
    		$db_type = $type[0];
    		
    		if(isset($type[1]))
    		{
    			if(substr($type[1],-1) == ')')
    			{
    				$length = substr($type[1],0,-1);
    			}
    			else
    			{
    				list($length) = explode(" ",$type[1]);
    				$length = substr($length,0,-1);
    			}
    		}
    		else 
    		{
    			$length = '';
    		}
    		$db_field_types[$db_field_type->Field]['db_max_length'] = $length;
    		$db_field_types[$db_field_type->Field]['db_type'] = $db_type;
    		$db_field_types[$db_field_type->Field]['db_null'] = $db_field_type->Null == 'YES' ? true : false;
    		$db_field_types[$db_field_type->Field]['db_extra'] = $db_field_type->Extra;
    	}

    	$results = $this->db->field_data($this->table_name);
    	foreach($results as $num => $row)
    	{
    		$row = (array)$row;
    		$results[$num] = (object)( array_merge($row, $db_field_types[$row['name']])  );
    	}
    	
    	return $results;
    }

    function get_field_types_basic_table()
    {
    	$db_field_types = array();

		$columns = $this->connection->query('SHOW COLUMNS FROM `'.$this->table_name.'`;', 'object');  
		//$columns = $this->db->query("SHOW COLUMNS FROM `{$this->table_name}`")->result()
		//echo 'columns<br/>';
		//print_r($columns);
		$tabcol = array();
		$tabcol2 = array();
		if ($columns->is_loaded()) {
			foreach ($columns as $records) {
				//echo "records=<br/>";
				//print_r($records);
				//echo "fin records=<br/>";
				array_push($tabcol,$records);
			}
			//echo "tabcol=<br/>";
			//print_r($tabcol);
    		foreach( $tabcol as $db_field_type)
	    	{
	    		$type = explode("(",$db_field_type->Type);
	    		$db_type = $type[0];
    		
	    		if(isset($type[1]))
	    		{
	    			if(substr($type[1],-1) == ')')
	    			{
	    				$length = substr($type[1],0,-1);
	    			}
	    			else
	    			{
	    				list($length) = explode(" ",$type[1]);
	    				$length = substr($length,0,-1);
	    			}
	    		}
	    		else 
	    		{
	    			$length = '';
	    		}
	    		$db_field_types[$db_field_type->Field]['db_max_length'] = $length;
	    		$db_field_types[$db_field_type->Field]['db_type'] = $db_type;
	    		$db_field_types[$db_field_type->Field]['db_null'] = $db_field_type->Null == 'YES' ? true : false;
	    		$db_field_types[$db_field_type->Field]['db_extra'] = $db_field_type->Extra;
	
				$F				= new stdClass();
				$F->name		= $db_field_type->Field;	
				$F->type		= $db_type;
				$F->default		= $db_field_type->Default;
				$F->max_length	= $length;
				$F->primary_key = ( $db_field_type->Key == 'PRI' ? 1 : 0 );
				array_push($tabcol2,$F);
	    	}
		}
		
    	//$results = $this->field_data($this->table_name);
		//$results = $this->connection->query('DESCRIBE `'.$this->table_name.'`;', 'object');
		//echo 'results2<br/>';
		//print_r($tabcol2);
		//echo 'results2<br/>';
    	foreach($tabcol2 as $num => $row)
    	{
			
    		$row = (array)$row;
    		$results[$num] = (object)( array_merge($row, $db_field_types[$row['name']])  );
    	}
		//echo 'results3<br/>';
    	//print_r($results);
		//echo 'results3<br/>';
    	
    	return $results;
    }

	/**
	 * Field data
	 *
	 * Generates an array of objects containing field meta-data
	 *
	 * @access	public
	 * @return	array
	 */
	function field_data()
	{
		$retval = array();
		while ($field = mysql_fetch_object($this->result_id))
		{
			preg_match('/([a-zA-Z]+)(\(\d+\))?/', $field->Type, $matches);

			$type = (array_key_exists(1, $matches)) ? $matches[1] : NULL;
			$length = (array_key_exists(2, $matches)) ? preg_replace('/[^\d]/', '', $matches[2]) : NULL;

			$F				= new stdClass();
			$F->name		= $field->Field;
			$F->type		= $type;
			$F->default		= $field->Default;
			$F->max_length	= $length;
			$F->primary_key = ( $field->Key == 'PRI' ? 1 : 0 );

			$retval[] = $F;
		}

		return $retval;
	}
    
    function get_field_types($table_name)
    {
    	//$results = $this->db->field_data($table_name);
    	
    	//return $results;

		// debuf modif
		$db_field_types = array();

		$columns = $this->connection->query('SHOW COLUMNS FROM `'.$table_name.'`;', 'object');  
		//$columns = $this->db->query("SHOW COLUMNS FROM `{$this->table_name}`")->result()
		//echo 'columns<br/>';
		//print_r($columns);
		$tabcol = array();
		$tabcol2 = array();
		if ($columns->is_loaded()) {
			foreach ($columns as $records) {
				//echo "records=<br/>";
				//print_r($records);
				//echo "fin records=<br/>";
				array_push($tabcol,$records);
			}
			//echo "tabcol=<br/>";
			//print_r($tabcol);
    		foreach( $tabcol as $db_field_type)
	    	{
	    		$type = explode("(",$db_field_type->Type);
	    		$db_type = $type[0];
    		
	    		if(isset($type[1]))
	    		{
	    			if(substr($type[1],-1) == ')')
	    			{
	    				$length = substr($type[1],0,-1);
	    			}
	    			else
	    			{
	    				list($length) = explode(" ",$type[1]);
	    				$length = substr($length,0,-1);
	    			}
	    		}
	    		else 
	    		{
	    			$length = '';
	    		}
	    		$db_field_types[$db_field_type->Field]['db_max_length'] = $length;
	    		$db_field_types[$db_field_type->Field]['db_type'] = $db_type;
	    		$db_field_types[$db_field_type->Field]['db_null'] = $db_field_type->Null == 'YES' ? true : false;
	    		$db_field_types[$db_field_type->Field]['db_extra'] = $db_field_type->Extra;
	
				$F				= new stdClass();
				$F->name		= $db_field_type->Field;	
				$F->type		= $db_type;
				$F->default		= $db_field_type->Default;
				$F->max_length	= $length;
				$F->primary_key = ( $db_field_type->Key == 'PRI' ? 1 : 0 );
				array_push($tabcol2,$F);
	    	}
		}
		
    	//$results = $this->field_data($this->table_name);
		//$results = $this->connection->query('DESCRIBE `'.$this->table_name.'`;', 'object');
		//echo 'results2<br/>';
		//print_r($tabcol2);
		//echo 'results2<br/>';
    	foreach($tabcol2 as $num => $row)
    	{
			
    		$row = (array)$row;
    		$results[$num] = (object)( array_merge($row, $db_field_types[$row['name']])  );
    	}
		//echo 'results3<br/>';
    	//print_r($results);
		//echo 'results3<br/>';
    	
    	return $results; 
		// fin modif

    }
    
    function db_update($post_array, $primary_key_value)
    {
    	$primary_key_field = $this->get_primary_key();
		print_r($primary_key_field);
		print_r($primary_key_value);
		print_r($this->table_name);
		$model = DB_ORM::model($this->table_name, array($primary_key_value));
	    $model->load($post_array);
		$model->save(TRUE);
		
		return true;
    	//return $this->db->update($this->table_name,$post_array, array( $primary_key_field => $primary_key_value));
    }    
    
    function db_insert($post_array)
    {
		//echo "tableau mise à jour=.<br/>";
		//print_r($post_array);

		/*$this->builder = DB_SQL::insert('default');
		$this->builder->into($this->table_name);
		$this->builder->row($post_array);
    	$results = $this->builder->execute();

		print_r($results);*/
		
		$model = DB_ORM::model($this->table_name);
		$model->load($post_array);
		$model->save(TRUE);
		//echo "id=".$model->id;
		
		return $model->id;
		
    	/*$insert = $this->db->insert($this->table_name,$post_array);
    	if($insert)
    	{
    		return $this->db->insert_id();
    	}
    	return false;*/
    }
    
    function db_delete($primary_key_value)
    {
    	$primary_key_field = $this->get_primary_key();
    	
    	if($primary_key_field === false)
    		return false;
    	
		$this->builder = DB_SQL::delete('default')
		->from($this->table_name)
		->where($primary_key_field ,'=', $primary_key_value);
		//$sql = $this->builder->statement();
		//echo $sql;
		$id = $this->builder->execute();
		
		// a faire récupérer message d'erreur et le retourner
		
		//$this->builder->limit(1);
    	//$this->db->limit(1);
    	//$this->db->delete($this->table_name,array( $primary_key_field => $primary_key_value));
    	//if( $this->db->affected_rows() != 1)
    	//	return false;
    	//else
    	return true;
    }

    function db_file_delete($field_name, $filename)
    {
    	if( $this->db->update($this->table_name,array($field_name => ''),array($field_name => $filename)) )
    	{
    		return true;
    	}
    	else
    	{
    		return false;
    	}
    }
    
    function field_exists($field,$table_name = null)
    {
    	if(empty($table_name))
    	{
    		$table_name = $this->table_name;
    	}

	    $connection = DB_Connection_Pool::instance()->get_connection('default');
	    $results = $connection->query('describe `'.$table_name.'`;');
	
		if ($results->is_loaded()) {
			foreach ($results as $record) {
				if($record['Field']==$field){
					return true;
				}
			}
		}
		$results->free(); 
		
		return false;

    	//return $this->db->field_exists($field,$table_name);
		
    }    
    
    function get_primary_key($table_name = null)
    {
    	if($table_name == null)
    	{
    		if(isset($this->primary_keys[$this->table_name]))
    		{
    			return $this->primary_keys[$this->table_name];
    		}
    		
	    	if(empty($this->primary_key))
	    	{
		    	$fields = $this->get_field_types_basic_table();
		    	
		    	foreach($fields as $field)
		    	{
		    		if($field->primary_key == 1)
		    		{
		    			return $field->name;
		    		}	
		    	}
		    	
		    	return false;
	    	}
	    	else
	    	{
	    		return $this->primary_key; 
	    	}
    	}
    	else
    	{
    		if(isset($this->primary_keys[$table_name]))
    		{
    			return $this->primary_keys[$table_name];
    		}
    		
	    	$fields = $this->get_field_types($table_name);
	    	
	    	foreach($fields as $field)
	    	{
	    		if($field->primary_key == 1)
	    		{
	    			return $field->name;
	    		}	
	    	}
	    	
	    	return false;
    	}
    	
    }
    
    function escape_str($value)
    {
    	return $this->db->escape_str($value);
    }
		
}