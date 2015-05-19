<?php
require_once dirname ( __FILE__ ) . '/library/functions.php';
require_once dirname ( __FILE__ ) . '/library/FileUpload.php';
require_once dirname ( __FILE__ ) . '/library/Image.php';
require_once dirname ( __FILE__ ) . '/library/html.class.php';
class Crud {
	private $table;
	private $tableAlias;
	private $primaryKeys = array ();
	private $fields = array ();
	private $attributes = array ();
	private $cols = array ();
	private $csvCols = array ();
	private $excelCols = array ();
	private $colFormats = array ();
	private $joins = array ();
	private $where = array ();
	private $elements = array ();
	private $disabled = array ();
	private $hideCol = array ();
	private $hide = array();
	private $readonly = array ();
	private $setValue = array ();
	private $types = array ();
	private $alias = array ();
	private $colAlign = array ();
	private $colWidth = array ();
	private $validates = array ();
	private $errors = array ();
	private $searchs = array ();
	private $queryString = array ();
	private $subQuery = array();
	private $autoType = false;
	private $noCol = false;
	private $callback = array ();
	private $order = array ();
	private $group = array ();
	private $limit = 20;
	private $pageKey = "page";
	private $action = '';
	private $uid = '';
	private $actionKey = 'action';
	private $editorImageUploadPath = array();
	public $insetId = '';
	
	private $themePath;
	private $theme;
	
	public function __construct() {
		$config = Kohana::$config->load('crud');
		
		$this->pageKey = $config->get('pageKey');
		$this->actionKey = $config->get('actionKey');
		$lang = $config->get('language');
		if (empty ( $lang)) {
			$lang = 'en';
		}
		
		if (! empty ( $_GET [$this->actionKey] )) {
			$this->action = $_GET [$this->actionKey];
		}

		
		if (file_exists ( dirname ( __FILE__ ) . '/language/lang.' . $lang . '.php' )) {
			require_once dirname ( __FILE__ ) . '/language/lang.' . $lang . '.php';
		} else {
			require_once dirname ( __FILE__ ) . '/language/lang.en.php';
		}
		$this->themePath = dirname(__FILE__).'/theme';
		$this->theme = 'bootstrap';
	}
	public function table($table) {
		$session = Session::instance();
		$_SESSION =& $session->as_array();
		
		$this->uid = sha1 ( $table );
		if (! isset ( $_SESSION [$this->uid] )) {
			$_SESSION [$this->uid] = array ();
		}
		$this->tableAlias = $this->table = $table;
		$this->getFields ();
	}
	public function tableAlias($alias) {
		$this->tableAlias = $alias;
	}
	private function getFields() {
		$sql = "SHOW FULL COLUMNS FROM `" . $this->table . '`';
		$query = DB::query(Database::SELECT, $sql);
		$results = $query->execute();
		
		foreach($results as $v){
			if ($v ['Key'] == 'PRI') {
				$this->primaryKeys [$this->table] [] = $v ['Field'];
			} else {
				$this->fields [$this->table] [] = $v ['Field'];
			}

			$tmpType = $v ['Type'];
			$aryType = explode ( '(', $v ['Type'] );
			$v ['Type'] = $aryType [0];

			$aryValue = array ();
			preg_match ( "/\((.*)\)/i", $tmpType, $aryValue );
			$valType = (isset ( $aryValue [1] )) ? $aryValue [1] : '';
			$v ['Value'] = $valType;

			$this->attributes [$this->table] [$v ['Field']] = $v;
		}
	}
	public function join($type, $table, $condition) {
		if (! isset ( $this->attributes [$table] )) {
			$join = array ();
			$join ['type'] = $type;
			$join ['table'] = $table;
			$join ['condition'] = $condition;

			$sql = "SHOW FULL COLUMNS FROM `" . $table . '`';
			$query = DB::query(Database::SELECT, $sql);
			$results = $query->execute();
			
			foreach($results as $v){
				if ($v ['Key'] == 'PRI') {
					$this->primaryKeys [$table] [] = $v ['Field'];
				} else {
					$this->fields [$table] [] = $v ['Field'];
				}

				$tmpType = $v ['Type'];
				$aryType = explode ( '(', $v ['Type'] );
				$v ['Type'] = $aryType [0];

				$aryValue = array ();
				preg_match ( "/\((.*)\)/i", $tmpType, $aryValue );
				$valType = (isset ( $aryValue [1] )) ? $aryValue [1] : '';
				$v ['Value'] = $valType;

				$this->attributes [$table] [$v ['Field']] = $v;
			}

			$this->joins [] = $join;
		}
	}
	public function where() {
		$args = func_get_args ();
		$num = func_num_args ();

		if ($num >= 1) {
			$this->where [] = $args;
		}

		return $this;
	}
	public function order($field, $type = 'ASC') {
		if (in_array ( $field, $this->fields [$this->table] ) || in_array ( $field, $this->primaryKeys [$this->table] )) {
			$field = $this->table . '.' . $field;
		}
		if ($this->isField ( $field ) == true) {
			if (! in_array ( strtolower ( trim ( $type ) ), array (
					'asc',
					'desc'
			) )) {
				$type = "ASC";
			}
			$order = array (
					$field,
					$type
			);
			$this->order [] = $order;
		}
	}
	public function group($fields) {
		if (! empty ( $fields )) {
			if (is_array ( $fields )) {
				foreach ( $fields as $field ) {
					if (strpos ( $field, '.' ) === false) {
						if (in_array ( $field, $this->fields [$this->table] ) || in_array ( $field, $this->primaryKeys [$this->table] )) {
							$field = '`' . $this->table . '`.`' . $field . '`';
						}
					}
					if ($this->isField ( $field )) {
						$this->group [] = $field;
					}
				}
			} else {
				if (strpos ( $fields, '.' ) === false) {
					if (in_array ( $fields, $this->fields [$this->table] ) || in_array ( $fields, $this->primaryKeys [$this->table] )) {
						$fields = $this->table . '.' . $fields;
					}
				}
				if ($this->isField ( $fields )) {
					$this->group [] = $fields;
				}
			}
		}

		return $this;
	}
	public function limit($limit) {
		if (( int ) $limit > 0) {
			$this->limit = $limit;
		}
	}
	public function search($fields) {
		if ($fields == 'all'){
			foreach ($this->fields as $table => $fields){
				foreach ($fields as $field){
					$this->searchs[$table.'.'.$field] = $table.'.'.$field;
				}
			}
		}else{
			$this->searchs = array_merge ( $this->searchs, $this->buildFields ( $fields ) );
		}

		return $this;
	}
	public function hideCol($fields) {
		$this->hideCol = array_merge ( $this->hideCol, $this->buildFields ( $fields ) );
	}
	public function readonly($fields) {
		$this->readonly = array_merge ( $this->readonly, $this->buildFields ( $fields ) );
	}
	public function cols($fields) {
		$this->cols = array_merge ( $this->cols, $this->_cols ( $fields ) );

		return $this;
	}
	public function csvCols($fields) {
		$this->csvCols = array_merge ( $this->csvCols, $this->_cols ( $fields ) );

		return $this;
	}
	public function excelCols($fields) {
		$this->excelCols = array_merge ( $this->excelCols, $this->_cols ( $fields ) );

		return $this;
	}
	public function setValue($field, $value) {
		if (strpos ( $field, '.' ) === false) {
			if (in_array ( $field, $this->fields [$this->table] ) || in_array ( $field, $this->primaryKeys [$this->table] )) {
				$this->setValue [$this->table] [$field] = $value;
			}
		} else {
			$aryField = explode ( '.', $field );
			if (count ( $aryField ) == 2) {
				$this->setValue [$aryField [0]] [$aryField [1]] = $value;
			}
		}
	}
	public function hide($arg){
		$hide = array(
				'add',
				'excel',
				'csv',
				'print',
				'copy',
				'view',
				'edit',
				'search',
				'delete'
		);
		if (is_array($arg)){
			foreach ($arg as $v){
				$v = strtolower($v);
				if (in_array($v, $hide)){
					$this->hide[$v] = $v;
				}
			}
		}else{
			$arg = strtolower($arg);
			if (in_array($arg, $hide)){
				$this->hide[$arg] = $arg;
			}
		}

		return $this;
	}

	public function subQuery($sql,$alias){
		$this->subQuery[$alias] = $sql;
	}

	public function autoType($flag){
		$this->autoType = $flag;
	}

	private function autoDetectType(){
		foreach ($this->fields as $table => $fields){
			foreach ($fields as $field){
				if (!isset($this->types[$table.'.'.$field])){
					$dataType = (isset($this->attributes[$table]) &&
							isset($this->attributes[$table][$field]) &&
							isset($this->attributes[$table][$field]['Type']))?strtolower($this->attributes[$table][$field]['Type']):'';
					switch ($dataType){
						case 'datetime':
						case 'timestamp':
							$this->type($table.'.'.$field,'datetime',array('data-format' => 'yyyy-MM-dd  H:i:s'));
							break;
						case 'date':
							$this->type($table.'.'.$field,'date',array('data-format' => 'yyyy-MM-dd'));
							break;
						case 'time':
							$this->type($table.'.'.$field,'time');
							break;
						case 'text':
						case 'mediumtext':
						case 'longtext':
							$this->type($table.'.'.$field,'textarea',array('class'=>'span4','style' => 'height:8em;'));
							break;
						case 'enum':
							$option = array();
							$option[''] = '';
							if (!empty($this->attributes[$table][$field]['Value'])){
								$ary = explode(",", $this->attributes[$table][$field]['Value']);
								foreach ($ary as $v){
									$v = str_replace("'", '', $v);
									$option[$v] =  $v;
								}
							}
							$this->type ($table.'.'.$field, 'selectbox', $option);
							break;
						case 'set':
							$option = array();
							$option[''] = '';
							if (!empty($this->attributes[$table][$field]['Value'])){
								$ary = explode(",", $this->attributes[$table][$field]['Value']);
								foreach ($ary as $v){
									$v = str_replace("'", '', $v);
									$option[$v] =  $v;
								}
							}
							$this->type ($table.'.'.$field, 'selectbox', $option,array('multiple'=>'multiple'));
							break;
						case 'tinyint':
						case 'smallint':
						case 'mediumint':
						case 'int':
						case 'bigint':
						case 'decimal':
						case 'float':
						case 'double':
						case 'real':
						case 'bit':
						case 'bool':
						case 'serial':
						case 'year':
						case 'char':
						case 'varchar':
						case 'tinytext':
						case 'binary':
						case 'varbinary':
						case 'tinyblob':
						case 'mediumblob':
						case 'longblob':
							$this->type($table.'.'.$field,'text');
							break;
								
					}
				}
			}
		}
	}

	public function addNoCol($flag){
		$this->noCol = $flag;
	}
	
	public function editorImageUploadPath($path = array()){
		$this->editorImageUploadPath = $path;
	}
	
	private function editorImageUpload(){
		if (isset($_GET['CKEditorFuncNum']) &&
			isset($this->editorImageUploadPath['public']) &&
			isset($this->editorImageUploadPath['real'])){
			
			$msg = '';                                     // Will be returned empty if no problems
			$callback = ($_GET['CKEditorFuncNum']);        // Tells CKeditor which function you are executing

			$fileUpload = new FileUpload();
			$fileUpload->uploadDir = $this->editorImageUploadPath['real'].'/';
			$fileUpload->extensions = array('.bmp','.jpeg','.jpg','.png','.gif');
			$fileUpload->tmpFileName = $_FILES['upload']['tmp_name'];
			$fileUpload->fileName = $_FILES['upload']['name'];
			$fileUpload->httpError = $_FILES['upload']['error'];

			if ($fileUpload->upload()) {
				$image_url = $this->editorImageUploadPath['public']. "/".$fileUpload->newFileName;
			}

			$error = $fileUpload->getMessage();
			if (!empty($error)) {
				$msg =  'error : '. implode("\n",$error);
			}
			$output = '<script type="text/javascript">window.parent.CKEDITOR.tools.callFunction('.$callback.', "'.$image_url .'","'.$msg.'");</script>';
			echo $output;

		}
		exit;
	}
	
	public function themePath($path){
		$this->themePath = $path;
	}
	
	public function theme($theme){
		$this->theme = $theme;
	}

	public function callback() {
		$callback = array (
				'BEFORE_INSERT',
				'AFTER_INSERT',

				'BEFORE_UPDATE',
				'AFTER_UPDATE',

				'BEFORE_DELETE',
				'AFTER_DELETE'
		);
		$args = func_get_args ();
		$num = func_num_args ();
		if ($num >= 2 && in_array ( $args [0], $callback )) {
			$fnc = array ();
			$fnc [] = $args [1];
			if (isset ( $args [2] )) {
				$fnc [] = $args [2];
			}
			$this->callback [$args [0]] [] = $fnc;
		}
	}
	public function alias($alias, $value = '') {
		if (is_array ( $alias )) {
			foreach ( $alias as $field => $value ) {
				if (strpos ( $field, '.' ) === false) {
					if (in_array ( $field, $this->fields [$this->table] ) || in_array ( $field, $this->primaryKeys [$this->table] )) {
						$this->alias [$this->table . '.' . $field] = $value;
					} else {
						$this->alias [$field] = $value;
					}
				} else {
					$this->alias [$field] = $value;
				}
			}
		} else {
			if (strpos ( $alias, '.' ) === false) {
				if (in_array ( $alias, $this->fields [$this->table] ) || in_array ( $alias, $this->primaryKeys [$this->table] )) {
					$this->alias [$this->table . '.' . $alias] = $value;
				} else {
					$this->alias [$alias] = $value;
				}
			} else {
				$this->alias [$alias] = $value;
			}
		}

		return $this;
	}
	public function colWith($field, $value) {
		if (strpos ( $field, '.' ) === false) {
			if (in_array ( $field, $this->fields [$this->table] ) || in_array ( $field, $this->primaryKeys [$this->table] )) {
				$this->colWidth [$this->table . '.' . $field] = $value;
			} else {
				$this->colWidth [$field] = $value;
			}
		} else {
			$this->colWidth [$field] = $value;
		}
	}
	public function colAlign($fields, $type = 'left') {
		if (is_array ( $fields )) {
			foreach ( $fields as $field ) {
				if (strpos ( $field, '.' ) === false) {
					if (in_array ( $field, $this->fields [$this->table] ) || in_array ( $field, $this->primaryKeys [$this->table] )) {
						$this->colAlign [$this->table . '.' . $field] = $type;
					} else {
						$this->colAlign [$field] = $type;
					}
				} else {
					$this->colAlign [$field] = $type;
				}
			}
		} else {
			if (strpos ( $fields, '.' ) === false) {
				if (in_array ( $fields, $this->fields [$this->table] ) || in_array ( $fields, $this->primaryKeys [$this->table] )) {
					$this->colAlign [$this->table . '.' . $fields] = $type;
				} else {
					$this->colAlign [$fields] = $type;
				}
			} else {
				$this->colAlign [$fields] = $type;
			}
		}

		return $this;
	}
	public function colFormat($field, $format) {
		if (strpos ( $field, '.' ) === false) {
			if (in_array ( $field, $this->fields [$this->table] ) || in_array ( $field, $this->primaryKeys [$this->table] )) {
				$this->colFormats [$this->table . '.' . $field] = $format;
			} else {
				$this->colFormats [$field] = $format;
			}
		} else {
			$this->colFormats [$field] = $format;
		}
	}
	public function fields($fields) {
		$this->elements = array_merge ( $this->elements, $this->buildFields ( $fields ) );

		return $this;
	}
	public function disabled($fields) {
		$this->disabled = array_merge ( $this->disabled, $this->buildFields ( $fields ) );

		return $this;
	}
	private function _cols($fields) {
		$return = array ();
		if (is_array ( $fields )) {
			$cols = array ();
			foreach ( $fields as $field ) {
				if (strpos ( $field, '.' ) === false) {
					if (in_array ( $field, $this->fields [$this->table] ) || in_array ( $field, $this->primaryKeys [$this->table] )) {
						$return [$this->table . '.' . $field] = $this->table . '_' . $field;
					} else {
						$return [$field] = $field;
					}
				} else {
					$return [$field] = str_replace ( '.', '_', $field );
				}
			}
		} else {
			if (strpos ( $fields, '.' ) === false) {
				if (in_array ( $fields, $this->fields [$this->table] ) || in_array ( $fields, $this->primaryKeys [$this->table] )) {
					$return [$this->table . '.' . $fields] = $this->table . '_' . $fields;
				} else {
					$return [$fields] = $fields;
				}
			} else {
				$return [$fields] = str_replace ( '.', '_', $fields );
			}
		}

		return $return;
	}
	private function buildFields($fields) {
		$return = array ();
		if (is_array ( $fields )) {
			$cols = array ();
			foreach ( $fields as $field ) {
				if (strpos ( $field, '.' ) === false) {
					if (in_array ( $field, $this->fields [$this->table] ) || in_array ( $field, $this->primaryKeys [$this->table] )) {
						$return [$this->table . '.' . $field] = $this->table . '.' . $field;
					} else {
						$return [$field] = $field;
					}
				} else {
					$return [$field] = $field;
				}
			}
		} else {
			if (strpos ( $fields, '.' ) === false) {
				if (in_array ( $fields, $this->fields [$this->table] ) || in_array ( $fields, $this->primaryKeys [$this->table] )) {
					$return [$this->table . '.' . $fields] = $this->table . '.' . $fields;
				} else {
					$return [$fields] = $fields;
				}
			} else {
				$return [$fields] = $fields;
			}
		}

		return $return;
	}
	public function validate() {
		$args = func_get_args ();
		$num = func_num_args ();
		if ($num >= 2) {
			if (strpos ( $args [0], '.' ) === false) {
				if (in_array ( $args [0], $this->fields [$this->table] ) || in_array ( $args [0], $this->primaryKeys [$this->table] )) {
					$args [0] = $this->table . '.' . $args [0];
				}
			}
			if ($this->isField ( $args [0] )) {
				$this->validates [$args [0]] = $args;
			}
		}

		return $this;
	}
	public function type() {
		$args = func_get_args ();
		$num = func_num_args ();
		if ($num >= 2) {
			if (strpos ( $args [0], '.' ) === false) {
				$args [0] = $this->table . '.' . $args [0];
			}
			$args [1] = strtolower ( trim ( $args [1] ) );
			$type = array (
					'type' => $args [1]
			);
			switch ($args [1]) {
				case 'image' :
					if (isset ( $args [2] )) {
						$type ['path'] = $args [2];
					}
					if (isset ( $args [3] ) && $args [3]) {
						$type ['thumbnail'] = $args [3];
					}

					if (isset ( $args [4] ) && $args [4]) {
						$type ['width'] = $args [4];
					} else {
						$type ['width'] = null;
					}

					if (isset ( $args [5] ) && $args [5]) {
						$type ['height'] = $args [5];
					} else {
						$type ['height'] = null;
					}

					if (isset ( $args [6] ) && is_array ( $args [6] )) {
						$type ['extensions'] = $args [6];
					} else {
						$type ['extensions'] = array (
								".png",
								".jpg",
								".jpeg",
								".gif"
						);
					}
					if (isset ( $args [7] ) && is_array ( $args [7] )) {
						$type ['attr'] = $args [7];
					}

					$this->types [$args [0]] = $type;
					break;
				case 'file' :
					if (isset ( $args [2] )) {
						$type ['path'] = $args [2];
					}
					if (isset ( $args [3] ) && is_array ( $args [3] )) {
						$type ['attr'] = $args [3];
					}
					if (isset ( $args [4] ) && is_array ( $args [4] )) {
						$type ['extensions'] = $args [4];
					} else {
						$type ['extensions'] = array (
								".png",
								".jpg",
								".jpeg",
								".gif",
								".doc",
								".docx",
								".xls",
								".xlsx",
								".zip",
								".rar",
								".7z"
						);
					}
					$this->types [$args [0]] = $type;
					break;
				case 'autocomplete' :
				case 'selectbox' :
				case 'checkbox' :
				case 'radio' :
					if (isset ( $args [2] ) && is_array ( $args [2] )) {
						$type ['opts'] = $args [2];
					}
					if (isset ( $args [3] ) && is_array ( $args [3] )) {
						$type ['attr'] = $args [3];
					}
					$this->types [$args [0]] = $type;
					break;
				case 'time' :
				case 'datetime' :
				case 'date' :
				case 'editor' :
				case 'textarea' :
				case 'tag' :
				case 'text' :
					if (isset ( $args [2] ) && is_array ( $args [2] )) {
						$type ['attr'] = $args [2];
					}
					$this->types [$args [0]] = $type;
					break;
			}
		}
	}


	private function buildCondition() {
		$session = Session::instance();
		$_SESSION =& $session->as_array();
		
		if (! isset ( $_POST ['search'] ) && isset ( $_SESSION [$this->uid] ['search'] )) {
			$_POST ['search'] = $_SESSION [$this->uid] ['search'];
		}

		if (isset ( $_POST ['search'] )) {
			$_SESSION [$this->uid] ['search'] = $_POST ['search'];
		}

		$conditions = "";
		$operators = "";
		$value = array ();

		if (! empty ( $this->where )) {
			foreach ( $this->where as $v ) {
				$conditions .= $operators . ' ' . $v [0];
				$operators = ' AND ';
				if (count ( $v ) > 1) {
					for($i = 1; $i < count ( $v ); $i ++) {
						$value [] = $v [$i];
					}
				}
			}
		}

		if (! empty ( $_POST ['search'] ) && is_array ( $_POST ['search'] )) {
			foreach ( $_POST ['search'] as $table => $flds ) {
				foreach ( $flds as $field => $v ) {
					$type = (isset ( $this->types [$table . '.' . $field] )) ? $this->types [$table . '.' . $field] : array (
							'type' => ''
					);
					switch ($type ['type']) {
						case 'tag' :
							if (isset ( $_POST ['hidden-search'] )) {
								$v = $_POST ['search'] [$table] [$field] = $_POST ['hidden-search'] [$table] [$field];
							}
							if (! empty ( $v )) {
								$v = explode ( ',', $v );
							}
							break;
						case 'date' :
							$dataFormat = str_replace ( array (
							'yyyy',
							'MM',
							'dd',
							'hh',
							'mm',
							'ss'
							), array (
							'Y',
							'm',
							'd',
							'H',
							'i',
							's'
							), $type ['attr'] ['data-format'] );
							$v = str2mysqltime ( $v, 'Y-m-d' );
							break;
						case 'datetime' :
							$dataFormat = str_replace ( array (
							'yyyy',
							'MM',
							'dd',
							'hh',
							'mm',
							'ss'
							), array (
							'Y',
							'm',
							'd',
							'H',
							'i',
							's'
							), $type ['attr'] ['data-format'] );
							$v = str2mysqltime ( $v, 'Y-m-d H:i:s' );
							break;
					}

					if (! $this->isField ( $table . '.' . $field ))
						continue;

					$type = (isset ( $this->types [$table . '.' . $field] ) && isset ( $this->types [$table . '.' . $field] ['type'] )) ? $this->types [$table . '.' . $field] ['type'] : '';
					if (! is_array ( $v )) {
						if (trim ( $v ) != '') {
							if (trim ( $type ) == 'selectbox' || trim ( $type ) == 'autocomplete') {
								$conditions .= $operators . ' `' . $table . '`.`' . $field . '` = ? ';
								$operators = ' AND ';
								$value [] = trim ( $v );
							} else {
								$conditions .= $operators . ' `' . $table . '`.`' . $field . '` like ? ';
								$operators = ' AND ';
								$value [] = '%' . trim ( $v ) . '%';
							}
						}
					} else if (count ( $v ) > 0) {
						$subConditions = "";
						$subOperators = "";
						foreach ( $v as $v1 ) {
							if (trim ( $v1 ) != '') {
								$subConditions .= $subOperators . ' `' . $table . '`.`' . $field . '` like ? ';
								$value [] = trim ( $v1 ) . ',%';
								$subOperators = ' OR ';

								$subConditions .= $subOperators . ' `' . $table . '`.`' . $field . '` like ? ';
								$value [] = '%,' . trim ( $v1 ) . ',%';

								$subConditions .= $subOperators . ' `' . $table . '`.`' . $field . '` like ? ';
								$value [] = '%,' . trim ( $v1 );

								$subConditions .= $subOperators . ' `' . $table . '`.`' . $field . '` = ? ';
								$value [] = trim ( $v1 );
							}
						}

						if ($subConditions != "") {
							$conditions .= $operators . ' ( ' . $subConditions . ' ) ';
							$operators = ' AND ';
						}
					}
				}
			}
		}

		$conditions = ($conditions != "") ? " WHERE " . $conditions : "";

		return array (
				$conditions,
				$value
		);
	}
	private function buildJoin() {
		$joins = "";

		if (! empty ( $this->joins )) {
			foreach ( $this->joins as $join ) {
				switch (strtolower ( trim ( $join ['type'] ) )) {
					case 'left' :
						$joins .= " LEFT JOIN `" . $join ['table'] . '` ON ' . $join ['condition'] . ' ';
						break;
					case 'inner' :
						$joins .= " INNER JOIN `" . $join ['table'] . '` ON ' . $join ['condition'] . ' ';
						break;
					case 'right' :
						$joins .= " RIGHT JOIN `" . $join ['table'] . '` ON ' . $join ['condition'] . ' ';
						break;
				}
			}
		}

		return $joins;
	}
	private function index() {
		$this->removeToken ();

		if (empty ( $this->cols )) {
			$cols = array ();
			foreach ( $this->primaryKeys as $table => $fields ) {
				foreach ( $fields as $field ) {
					$cols [$table . '.' . $field] = $table . '_' . $field;
				}
			}
			foreach ( $this->fields as $table => $fields ) {
				foreach ( $fields as $field ) {
					$cols [$table . '.' . $field] = $table . '_' . $field;
				}
			}
			$this->cols = $cols;
		}

		if (empty ( $this->types )) {
		}

		$fields = array ();

		foreach ( $this->fields as $table => $flds ) {
			foreach ( $flds as $field ) {
				$fields [] = '`' . $table . '`.`' . $field . '` as ' . $table . '_' . $field;
			}
		}

		if (! empty ( $this->primaryKeys )) {
			foreach ( $this->primaryKeys as $k => $v ) {
				foreach ( $v as $v1 ) {
					$fields [] = '`' . $k . '`.`' . $v1 . '` as ' . $k . '_' . $v1;
				}
			}
		}

		if (!empty($this->subQuery)){
			foreach ($this->subQuery as $alias => $sql){
				$fields[] = '('.$sql.') as '.$alias;
			}
		}


		$joins = $this->buildJoin ();

		$aryConditions = $this->buildCondition ();

		$group = "";

		if (! empty ( $this->group )) {
			$group = implode ( ',', $this->group );
		}

		$group = ($group != "") ? " GROUP BY " . $group . " " : "";

		$order = "";
		$comma = "";

		if (empty ( $_GET ['order'] )) {
			if (! empty ( $this->order )) {
				foreach ( $this->order as $v ) {
					$order .= $comma . $v [0] . " " . $v [1];
					$comma = ",";
				}
			}
		} else {
			if (isset ( $_GET ['order'] ['f'] ) && $this->isField ( $_GET ['order'] ['f'] ) == true) {
				if (! in_array ( strtolower ( trim ( $_GET ['order'] ['t'] ) ), array (
						'asc',
						'desc'
				) )) {
					$_GET ['order'] ['t'] = "ASC";
				}
				$order = $_GET ['order'] ['f'] . " " . $_GET ['order'] ['t'];
				$tmpOrder = array (
						$_GET ['order'] ['f'],
						$_GET ['order'] ['t']
				);
				$this->order = array ();
				$this->order [] = $tmpOrder;
			}
		}

		$order = ($order != "") ? "ORDER BY " . $order . " " : "";

		$conditions = $aryConditions [0];
		$value = $aryConditions [1];
		
		
		$pageIndex = (isset ( $_GET [$this->pageKey] ) && ( int ) $_GET [$this->pageKey] > 1) ? ( int ) $_GET [$this->pageKey] : 1;
		$offset = ($pageIndex - 1) * $this->limit;
		$sql = "SELECT SQL_CALC_FOUND_ROWS " . implode ( ",", $fields ) . " FROM `" . $this->table . '` ' . $joins . $conditions . $group . $order . " LIMIT " . $offset . "," . $this->limit;
		$rs = $this->querySql($sql, $value);
		
		
		$totalRecords = $this->querySql( "SELECT FOUND_ROWS() as total " );
		
		$totalRecords = $totalRecords [0]['total'];
		$totalPage = ceil ( $totalRecords / $this->limit );


		if ($totalPage < $pageIndex && $totalRecords > 0){
			$queryString = $this->queryString;
			$queryString['page'] = $totalPage;
			$this->redirect("?".http_build_query($queryString, '', '&'));
		}


		$sth = null;
		if (file_exists($this->themePath.'/'.$this->theme.'/index.php')){
			require_once $this->themePath.'/'.$this->theme.'/index.php';

			$template = new IndexTemplate ();

			$template->alias = $this->alias;
			$template->colAlign = $this->colAlign;
			$template->colFormats = $this->colFormats;
			$template->cols = $this->cols;
			$template->order = $this->order;
			$template->colWidth = $this->colWidth;
			$template->fields = $this->fields;
			$template->hideCol = $this->hideCol;
			$template->pageKey = $this->pageKey;
			$template->primaryKeys = $this->primaryKeys;
			$template->rs = $rs;
			$template->searchs = $this->searchs;
			$template->table = $this->table;
			$template->tableAlias = $this->tableAlias;
			$template->totalPage = $totalPage;
			$template->totalRecords = $totalRecords;
			$template->types = $this->types;
			$template->uid = $this->uid;
			$template->actionKey = $this->actionKey;
			$template->queryString = $this->queryString;
			$template->hide = $this->hide;
			$template->pageIndex = $pageIndex;
			$template->noCol = $this->noCol;
			$template->limit = $this->limit;
			$template->attributes = $this->attributes;

			return $template->toString ();
		}else{
				
			return '';
		}
	}
	private function csv() {
		if (!empty($this->hide) && in_array('csv', $this->hide)){
			exit;
		}
		$this->removeToken ();

		if (empty ( $this->csvCols )) {
			if (empty ( $this->cols )) {
				$cols = array ();
				foreach ( $this->primaryKeys as $table => $fields ) {
					foreach ( $fields as $field ) {
						$cols [$table . '.' . $field] = $table . '_' . $field;
					}
				}
				foreach ( $this->fields as $table => $fields ) {
					foreach ( $fields as $field ) {
						$cols [$table . '.' . $field] = $table . '_' . $field;
					}
				}
				$this->csvCols = $cols;
			} else {
				$this->csvCols = $this->cols;
			}
		}

		$fields = array ();

		foreach ( $this->fields as $table => $flds ) {
			foreach ( $flds as $field ) {
				$fields [] = '`' . $table . '`.`' . $field . '` as ' . $table . '_' . $field;
			}
		}

		if (! empty ( $this->primaryKeys )) {
			foreach ( $this->primaryKeys as $k => $v ) {
				foreach ( $v as $v1 ) {
					$fields [] = '`' . $k . '`.`' . $v1 . '` as ' . $k . '_' . $v1;
				}
			}
		}

		if (!empty($this->subQuery)){
			foreach ($this->subQuery as $alias => $sql){
				$fields[] = '('.$sql.') as '.$alias;
			}
		}

		$group = "";

		if (! empty ( $this->group )) {
			$group = implode ( ',', $this->group );
		}

		$group = ($group != "") ? " GROUP BY " . $group . " " : "";

		$order = "";
		$comma = "";

		if (empty ( $_GET ['order'] )) {
			if (! empty ( $this->order )) {
				foreach ( $this->order as $v ) {
					$order .= $comma . $v [0] . " " . $v [1];
					$comma = ",";
				}
			}
		} else {
			if (isset ( $_GET ['order'] ['f'] ) && $this->isField ( $_GET ['order'] ['f'] ) == true) {
				if (! in_array ( strtolower ( trim ( $_GET ['order'] ['t'] ) ), array (
						'asc',
						'desc'
				) )) {
					$_GET ['order'] ['t'] = "ASC";
				}
				$order = $_GET ['order'] ['f'] . " " . $_GET ['order'] ['t'];
				$tmpOrder = array (
						$_GET ['order'] ['f'],
						$_GET ['order'] ['t']
				);
				$this->order = array ();
				$this->order [] = $tmpOrder;
			}
		}

		$order = ($order != "") ? "ORDER BY " . $order . " " : "";

		$joins = $this->buildJoin ();

		$aryConditions = $this->buildCondition ();
		$conditions = $aryConditions [0];
		$value = $aryConditions [1];

		$sql = "SELECT SQL_CALC_FOUND_ROWS " . implode ( ",", $fields ) . " FROM `" . $this->table . '` ' . $joins . $conditions . $group . $order;
		$rs = $this->querySql($sql,$value);

		if (file_exists($this->themePath.'/'.$this->theme.'/index.php')){
			require_once $this->themePath.'/'.$this->theme.'/index.php';

			$template = new IndexTemplate (  );

			$template->alias = $this->alias;
			$template->colAlign = $this->colAlign;
			$template->colFormats = $this->colFormats;
			$template->cols = $this->cols;
			$template->csvCols = $this->csvCols;
			$template->colWidth = $this->colWidth;
			$template->fields = $this->fields;
			$template->hideCol = $this->hideCol;
			$template->pageKey = $this->pageKey;
			$template->primaryKeys = $this->primaryKeys;
			$template->rs = $rs;
			$template->searchs = $this->searchs;
			$template->table = $this->table;
			$template->tableAlias = $this->tableAlias;
			$template->types = $this->types;
			$template->uid = $this->uid;
			$template->queryString = $this->queryString;
			$template->actionKey = $this->actionKey;
			$template->attributes = $this->attributes;

			$template->csv ();
		}else{
			echo '';
		}
		exit ();
	}
	private function excel() {
		if (!empty($this->hide) && in_array('excel', $this->hide)){
			exit;
		}
		$this->removeToken ();

		if (empty ( $this->excelCols )) {
			if (empty ( $this->cols )) {
				$cols = array ();
				foreach ( $this->primaryKeys as $table => $fields ) {
					foreach ( $fields as $field ) {
						$cols [$table . '.' . $field] = $table . '_' . $field;
					}
				}
				foreach ( $this->fields as $table => $fields ) {
					foreach ( $fields as $field ) {
						$cols [$table . '.' . $field] = $table . '_' . $field;
					}
				}
				$this->excelCols = $cols;
			} else {
				$this->excelCols = $this->cols;
			}
		}

		$fields = array ();

		foreach ( $this->fields as $table => $flds ) {
			foreach ( $flds as $field ) {
				$fields [] = '`' . $table . '`.`' . $field . '` as ' . $table . '_' . $field;
			}
		}

		if (! empty ( $this->primaryKeys )) {
			foreach ( $this->primaryKeys as $k => $v ) {
				foreach ( $v as $v1 ) {
					$fields [] = '`' . $k . '`.`' . $v1 . '` as ' . $k . '_' . $v1;
				}
			}
		}

		if (!empty($this->subQuery)){
			foreach ($this->subQuery as $alias => $sql){
				$fields[] = '('.$sql.') as '.$alias;
			}
		}

		$group = "";

		if (! empty ( $this->group )) {
			$group = implode ( ',', $this->group );
		}

		$group = ($group != "") ? " GROUP BY " . $group . " " : "";

		$order = "";
		$comma = "";

		if (empty ( $_GET ['order'] )) {
			if (! empty ( $this->order )) {
				foreach ( $this->order as $v ) {
					$order .= $comma . $v [0] . " " . $v [1];
					$comma = ",";
				}
			}
		} else {
			if (isset ( $_GET ['order'] ['f'] ) && $this->isField ( $_GET ['order'] ['f'] ) == true) {
				if (! in_array ( strtolower ( trim ( $_GET ['order'] ['t'] ) ), array (
						'asc',
						'desc'
				) )) {
					$_GET ['order'] ['t'] = "ASC";
				}
				$order = $_GET ['order'] ['f'] . " " . $_GET ['order'] ['t'];
				$tmpOrder = array (
						$_GET ['order'] ['f'],
						$_GET ['order'] ['t']
				);
				$this->order = array ();
				$this->order [] = $tmpOrder;
			}
		}

		$order = ($order != "") ? "ORDER BY " . $order . " " : "";

		$joins = $this->buildJoin ();

		$aryConditions = $this->buildCondition ();
		$conditions = $aryConditions [0];
		$value = $aryConditions [1];

		$sql = "SELECT SQL_CALC_FOUND_ROWS " . implode ( ",", $fields ) . " FROM `" . $this->table . '` ' . $joins . $conditions . $group . $order;
		$rs = $this->querySql($sql,$value);

		if (file_exists($this->themePath.'/'.$this->theme.'/index.php')){
			require_once $this->themePath.'/'.$this->theme.'/index.php';

			$template = new IndexTemplate ( );

			$template->alias = $this->alias;
			$template->colAlign = $this->colAlign;
			$template->colFormats = $this->colFormats;
			$template->cols = $this->cols;
			$template->excelCols = $this->excelCols;
			$template->colWidth = $this->colWidth;
			$template->fields = $this->fields;
			$template->hideCol = $this->hideCol;
			$template->pageKey = $this->pageKey;
			$template->primaryKeys = $this->primaryKeys;
			$template->rs = $rs;
			$template->searchs = $this->searchs;
			$template->table = $this->table;
			$template->tableAlias = $this->tableAlias;
			$template->types = $this->types;
			$template->uid = $this->uid;
			$template->queryString = $this->queryString;
			$template->actionKey = $this->actionKey;
			$template->attributes = $this->attributes;

			$template->excel ();
		}else{
			echo '';
		}
		exit ();
	}
	private function printPreview() {
		if (!empty($this->hide) && in_array('print', $this->hide)){
			exit;
		}
		if (empty ( $this->cols )) {
			$cols = array ();
			foreach ( $this->primaryKeys as $table => $fields ) {
				foreach ( $fields as $field ) {
					$cols [$table . '.' . $field] = $table . '_' . $field;
				}
			}
			foreach ( $this->fields as $table => $fields ) {
				foreach ( $fields as $field ) {
					$cols [$table . '.' . $field] = $table . '_' . $field;
				}
			}
			$this->cols = $cols;
		}

		if (empty ( $this->types )) {
		}

		$fields = array ();

		foreach ( $this->fields as $table => $flds ) {
			foreach ( $flds as $field ) {
				$fields [] = '`' . $table . '`.`' . $field . '` as ' . $table . '_' . $field;
			}
		}

		if (! empty ( $this->primaryKeys )) {
			foreach ( $this->primaryKeys as $k => $v ) {
				foreach ( $v as $v1 ) {
					$fields [] = '`' . $k . '`.`' . $v1 . '` as ' . $k . '_' . $v1;
				}
			}
		}

		if (!empty($this->subQuery)){
			foreach ($this->subQuery as $alias => $sql){
				$fields[] = '('.$sql.') as '.$alias;
			}
		}

		$joins = $this->buildJoin ();

		$aryConditions = $this->buildCondition ();

		$group = "";

		if (! empty ( $this->group )) {
			$group = implode ( ',', $this->group );
		}

		$group = ($group != "") ? " GROUP BY " . $group . " " : "";

		$order = "";
		$comma = "";

		if (empty ( $_GET ['order'] )) {
			if (! empty ( $this->order )) {
				foreach ( $this->order as $v ) {
					$order .= $comma . $v [0] . " " . $v [1];
					$comma = ",";
				}
			}
		} else {
			if (isset ( $_GET ['order'] ['f'] ) && $this->isField ( $_GET ['order'] ['f'] ) == true) {
				if (! in_array ( strtolower ( trim ( $_GET ['order'] ['t'] ) ), array (
						'asc',
						'desc'
				) )) {
					$_GET ['order'] ['t'] = "ASC";
				}
				$order = $_GET ['order'] ['f'] . " " . $_GET ['order'] ['t'];
				$tmpOrder = array (
						$_GET ['order'] ['f'],
						$_GET ['order'] ['t']
				);
				$this->order = array ();
				$this->order [] = $tmpOrder;
			}
		}

		$order = ($order != "") ? "ORDER BY " . $order . " " : "";

		$conditions = $aryConditions [0];
		$value = $aryConditions [1];

		$sql = "SELECT SQL_CALC_FOUND_ROWS " . implode ( ",", $fields ) . " FROM `" . $this->table . '` ' . $joins . $conditions . $group . $order;
		$rs = $this->querySql($sql,$value);

		if (file_exists($this->themePath.'/'.$this->theme.'/index.php')){
			require_once $this->themePath.'/'.$this->theme.'/index.php';

			$template = new IndexTemplate ( );

			$template->alias = $this->alias;
			$template->colAlign = $this->colAlign;
			$template->colFormats = $this->colFormats;
			$template->cols = $this->cols;
			$template->order = $this->order;
			$template->colWidth = $this->colWidth;
			$template->fields = $this->fields;
			$template->hideCol = $this->hideCol;
			$template->pageKey = $this->pageKey;
			$template->primaryKeys = $this->primaryKeys;
			$template->rs = $rs;
			$template->searchs = $this->searchs;
			$template->table = $this->table;
			$template->tableAlias = $this->tableAlias;
			$template->types = $this->types;
			$template->uid = $this->uid;
			$template->queryString = $this->queryString;
			$template->actionKey = $this->actionKey;
			$template->attributes = $this->attributes;

			$template->printPreview ();
		}else{
			echo '';
		}
		exit ();
	}
	private function getData() {
		return (isset ( $_POST ['uid'] ) && $_POST ['uid'] == $this->uid && isset ( $_POST [$this->uid] )) ? $_POST [$this->uid] : array ();
	}
	private function isField($field) {
		$flag = false;
		$fields = array ();
		foreach ( $this->fields as $table => $flds ) {
			foreach ( $flds as $fld ) {
				$fields [] = $table . '.' . $fld;
			}
		}
		foreach ( $this->primaryKeys as $table => $flds ) {
			foreach ( $flds as $fld ) {
				$fields [] = $table . '.' . $fld;
			}
		}
		if (in_array ( $field, $fields )) {
			$flag = true;
		}

		return $flag;
	}
	private function form() {
		$session = Session::instance();
		$_SESSION =& $session->as_array();
		
		$errors = array ();
		$action = $this->action;
		if (empty ( $this->elements )) {
			$elements = array ();
			foreach ( $this->fields as $table => $fields ) {
				foreach ( $fields as $field ) {
					if ($table == $this->table) {
						$elements [$table . '.' . $field] = $table . '.' . $field;
					}
				}
			}
			$this->elements = $elements;
		}

		$tokenId = "";
		if (! empty ( $this->primaryKeys ) && ! empty ( $_GET ['key'] )) {
			foreach ( $this->primaryKeys as $k3 => $v3 ) {
				foreach ( $v3 as $v4 ) {
					if ($k3 == $this->table) {
						if (! empty ( $_GET ['key'] [$k3 . '.' . $v4] )) {
							$tokenId .= $k3 . '.' . $v4 . '=' . $_GET ['key'] [$k3 . '.' . $v4];
						}
					}
				}
			}
		}

		if ($tokenId == ""){
			if (!empty($this->hide) && in_array('add', $this->hide)){
				exit;
			}
		}else{
			if ($this->action == 'copy'){
				if (!empty($this->hide) && in_array('copy', $this->hide)){
					exit;
				}
			}else if ($this->action == 'form'){
				if (!empty($this->hide) && in_array('edit', $this->hide)){
					exit;
				}
			}
		}

		$tokenId = ($tokenId == "") ? "add" : "edit_" . $this->action . $tokenId;

		if (! empty ( $_POST ) && $_POST ['token'] == $_SESSION [$this->uid] [$_POST ['token_key']] && $this->uid . "_auth_token" . '_' . md5 ( $tokenId ) == $_POST ['token_key']) {
			switch ($_POST ['action_type']) {
				case 'confirm' :
					$error = $this->dataProcessing ();
					if (! empty ( $error )) {
						$errors ['data_processing'] = $error;
					}
					$action = $this->action . '_confirm';
					if (! empty ( $this->validates )) {
						if (! class_exists ( 'AbstractValidator' )) {
							require dirname ( __FILE__ ) . '/validation/AbstractValidator.php';
						}
						if (! class_exists ( 'FormValidator' )) {
							require dirname ( __FILE__ ) . '/validation/FormValidator.php';
						}

						$formValidator = new FormValidator ();
						foreach ( $this->validates as $field => $args ) {
							$type = $args [1];
							$aryType = explode ( '_', $type );
							$class = '';
							if (! empty ( $aryType )) {
								foreach ( $aryType as $t ) {
									if (! empty ( $t )) {
										$class .= ucfirst ( strtolower ( $t ) );
									}
								}
							}
							$class .= 'Validator';

							if (! class_exists ( $class )) {
								require dirname ( __FILE__ ) . '/validation/' . $class . '.php';
							}
							$hidden = new InputHiddenTag ( array (
									'name' => $this->uid . '.' . $field
							) );
							if (isset ( $this->alias [$field] )) {
								$name = $this->alias [$field];
							} else {
								$name = '';
								$tmp = explode ( '.', $field );
								foreach ( $tmp as $t ) {
									$name .= ucfirst ( $t );
								}
							}
							$validator = new $class ( $field, $name, $hidden->getValue () );
							if (method_exists ( $validator, 'init' )) {
								$validator->init ( $args );
							}
							$formValidator->addValidator ( $validator );
						}
						if (! $formValidator->validate ()) {
							$errors = array_merge ( $errors, $formValidator->errors );
							$action = $this->action;
						}
					}
					break;
				case 'save' :
					$editFlag = true;

					if (! empty ( $this->primaryKeys )) {
						foreach ( $this->primaryKeys as $k3 => $v3 ) {
							foreach ( $v3 as $v4 ) {
								if ($k3 == $this->table) {
									if (empty ( $_POST [$this->uid] [$k3] [$v4] ) || trim ( $_POST [$this->uid] [$k3] [$v4] ) == '') {
										$editFlag = false;
										break;
									}
								}
							}
							if ($editFlag == false) {
								break;
							}
						}
					}

					$queryString = $this->queryString;
					$queryString [$this->actionKey] = 'index';
					if (isset ( $queryString ['key'] )) {
						unset ( $queryString ['key'] );
					}
					$req = $this->getData ();

					if ($editFlag == false) {
						if (! empty ( $this->callback ['BEFORE_INSERT'] )) {
							foreach ( $this->callback ['BEFORE_INSERT'] as $callback ) {
								if (isset ( $callback [1] ) && file_exists ( $callback [1] )) {
									require_once $callback [1];
								}
								if (is_callable ( $callback [0] )) {
									$req = call_user_func ( $callback [0], $this, $req );
								}
							}
						}

						$this->insert ( $req, $this->table );

						if (! empty ( $this->callback ['AFTER_INSERT'] )) {
							foreach ( $this->callback ['AFTER_INSERT'] as $callback ) {
								if (isset ( $callback [1] ) && file_exists ( $callback [1] )) {
									require_once $callback [1];
								}
								if (is_callable ( $callback [0] )) {
									call_user_func ( $callback [0], $this, $req, $this->insetId );
								}
							}
						}
						$this->redirect ( "?" . http_build_query ( $queryString, '', '&' ) );
					} else {
						if (! empty ( $this->callback ['BEFORE_UPDATE'] )) {
							foreach ( $this->callback ['BEFORE_UPDATE'] as $callback ) {
								if (isset ( $callback [1] ) && file_exists ( $callback [1] )) {
									require_once $callback [1];
								}
								if (is_callable ( $callback [0] )) {
									$req = call_user_func ( $callback [0], $this, $req );
								}
							}
						}
						$this->update ( $req, $this->table );
						if (! empty ( $this->callback ['AFTER_UPDATE'] )) {
							foreach ( $this->callback ['AFTER_UPDATE'] as $callback ) {
								if (isset ( $callback [1] ) && file_exists ( $callback [1] )) {
									require_once $callback [1];
								}
								if (is_callable ( $callback [0] )) {
									call_user_func ( $callback [0], $this, $req, $this->insetId );
								}
							}
						}
						$this->redirect ( "?" . http_build_query ( $queryString, '', '&' ) );
					}
					break;
				default :
					$action = $this->action;
					break;
			}
		} else {
			$data = $this->getByPrimaryKeys ();
			$_POST = array_merge ( $_POST, $data );

			$this->removeToken ();
		}

		$token = $this->getToken ( '_' . md5 ( $tokenId ) );
		if (file_exists($this->themePath.'/'.$this->theme.'/form.php')){
			require_once $this->themePath.'/'.$this->theme.'/form.php';

			$template = new FormTemplate ();
			$template->action = $action;
			$template->uid = $this->uid;
			$template->token = $token;
			$template->primaryKeys = $this->primaryKeys;
			$template->tableAlias = $this->tableAlias;
			$template->errors = $errors;
			$template->elements = $this->elements;
			$template->disabled = $this->disabled;
			$template->alias = $this->alias;
			$template->validates = $this->validates;
			$template->types = $this->types;
			$template->readonly = $this->readonly;
			$template->queryString = $this->queryString;
			$template->actionKey = $this->actionKey;
			$template->attributes = $this->attributes;
			$template->editorImageUploadPath = $this->editorImageUploadPath;

			return $template->toString ();
		}else{
			
			return '';
		}
	}
	private function view() {
		if (!empty($this->hide) && in_array('view', $this->hide)){
			exit;
		}
		$this->removeToken ();
		$data = $this->getByPrimaryKeys ();
		$_POST = array_merge ( $_POST, $data );
		$action = $this->action;
		if (empty ( $this->elements )) {
			$elements = array ();
			foreach ( $this->fields as $table => $fields ) {
				foreach ( $fields as $field ) {
					if ($table == $this->table) {
						$elements [$table . '.' . $field] = $table . '.' . $field;
					}
				}
			}
			$this->elements = $elements;
		}

		if (file_exists($this->themePath.'/'.$this->theme.'/form.php')){
			require_once $this->themePath.'/'.$this->theme.'/form.php';

			$template = new FormTemplate ();
			$template->action = $action;
			$template->uid = $this->uid;
			$template->primaryKeys = $this->primaryKeys;
			$template->tableAlias = $this->tableAlias;
			$template->elements = $this->elements;
			$template->disabled = $this->disabled;
			$template->alias = $this->alias;
			$template->validates = $this->validates;
			$template->types = $this->types;
			$template->readonly = $this->readonly;
			$template->queryString = $this->queryString;
			$template->actionKey = $this->actionKey;
			$template->attributes = $this->attributes;
			$template->editorImageUploadPath = $this->editorImageUploadPath;

			return $template->toString ();
		}else{
			return '';
		}
	}
	private function delete() {
		$session = Session::instance();
		$_SESSION =& $session->as_array();
		
		if (!empty($this->hide) && in_array('delete', $this->hide)){
			exit;
		}
		$tokenId = "";
		if (! empty ( $this->primaryKeys )) {
			foreach ( $this->primaryKeys as $k3 => $v3 ) {
				foreach ( $v3 as $v4 ) {
					if (isset ( $_GET ['key'] [$k3 . '.' . $v4] )) {
						$tokenId .= $k3 . '.' . $v4 . '=' . $_GET ['key'] [$k3 . '.' . $v4];
					}
				}
			}
		}

		if (! empty ( $_POST )) {
			$queryString = $this->queryString;
			$queryString [$this->actionKey] = 'index';
			if (isset ( $queryString ['key'] )) {
				unset ( $queryString ['key'] );
			}
			if ($_POST ['token'] == $_SESSION [$this->uid] [$_POST ['token_key']] && $this->uid . "_auth_token" . '_' . md5 ( $tokenId ) == $_POST ['token_key']) {
				switch ($_POST ['action_type']) {
					case 'delete' :
						if (! empty ( $this->callback ['BEFORE_DELETE'] ) || ! empty ( $this->callback ['AFTER_DELETE'] )) {
							$data = $this->getByPrimaryKeys ();
						}

						if (! empty ( $this->callback ['BEFORE_DELETE'] )) {
							foreach ( $this->callback ['BEFORE_DELETE'] as $callback ) {
								if (isset ( $callback [1] ) && file_exists ( $callback [1] )) {
									require_once $callback [1];
								}
								if (is_callable ( $callback [0] )) {
									call_user_func ( $callback [0], $this, $data [$this->uid] );
								}
							}
						}
						$this->remove ( $this->table );
						if (! empty ( $this->callback ['AFTER_DELETE'] )) {
							foreach ( $this->callback ['AFTER_DELETE'] as $callback ) {
								if (isset ( $callback [1] ) && file_exists ( $callback [1] )) {
									require_once $callback [1];
								}
								if (is_callable ( $callback [0] )) {
									call_user_func ( $callback [0], $this, $data [$this->uid] );
								}
							}
						}
						$this->redirect ( "?" . http_build_query ( $queryString, '', '&' ) );
						break;
				}
			} else {
				$this->redirect ( "?" . http_build_query ( $queryString, '', '&' ) );
			}
		}

		$this->removeToken ();
		$token = $this->getToken ( '_' . md5 ( $tokenId ) );

		$data = $this->getByPrimaryKeys ();
		$_POST = array_merge ( $_POST, $data );
		$action = $this->action;
		if (empty ( $this->elements )) {
			$elements = array ();
			foreach ( $this->fields as $table => $fields ) {
				foreach ( $fields as $field ) {
					if ($table == $this->table) {
						$elements [$table . '.' . $field] = $table . '.' . $field;
					}
				}
			}
			$this->elements = $elements;
		}

		if (file_exists($this->themePath.'/'.$this->theme.'/form.php')){
			require_once $this->themePath.'/'.$this->theme.'/form.php';

			$template = new FormTemplate ();
			$template->action = $action;
			$template->uid = $this->uid;
			$template->token = $token;
			$template->primaryKeys = $this->primaryKeys;
			$template->tableAlias = $this->tableAlias;
			$template->elements = $this->elements;
			$template->disabled = $this->disabled;
			$template->alias = $this->alias;
			$template->validates = $this->validates;
			$template->types = $this->types;
			$template->readonly = $this->readonly;
			$template->queryString = $this->queryString;
			$template->actionKey = $this->actionKey;
			$template->attributes = $this->attributes;
			$template->editorImageUploadPath = $this->editorImageUploadPath;

			return $template->toString ();
		}else{
			
			return '';
		}
	}
	public function fetch() {
		$session = Session::instance();
		$_SESSION =& $session->as_array();
		
		if ($this->autoType == true){
			$this->autoDetectType();
		}

		if (! empty ( $_SERVER ['QUERY_STRING'] )) {
			parse_str ( $_SERVER ['QUERY_STRING'], $this->queryString );
		}
		$html = '';
		switch ($this->action) {
			case 'form' :
				$html = $this->form ();
				break;
			case 'copy' :
				$html = $this->form ();
				break;
			case 'edit' :
				break;
			case 'view' :
				$html = $this->view ();
				break;
			case 'delete' :
				$html = $this->delete ();
				break;
			case 'index' :
				$html = $this->index ();
				break;
			case 'download' :
				$this->download ();
				break;
			case 'image' :
				$this->image ();
				break;
			case 'delfile' :
				$this->delFile ();
				break;
			case 'csv' :
				$this->csv ();
				break;
			case 'print' :
				$this->printPreview ();
				break;
			case 'excel' :
				$this->excel ();
				break;
			case 'editorImageUpload':
				$this->editorImageUpload();
				break;
			default :
				if (isset ( $_SESSION [$this->uid] ['search'] )) {
					unset ( $_SESSION [$this->uid] ['search'] );
				}
				$html = $this->index ();
				break;
		}

		return $html;
	}
	public function insert($req, $table) {
		if (! empty ( $req [$table] )) {
			$data = $req [$table];

			foreach ( $data as $field => $value ) {
				if ((! empty ( $this->readonly ) && in_array ( $table . '.' . $field, $this->readonly )) || (! empty ( $this->disabled ) && in_array ( $table . '.' . $field, $this->disabled ))) {
					unset ( $data [$field] );
				}
			}

			$setVal = (! empty ( $this->setValue [$table] )) ? $this->setValue [$table] : array ();
			$data = array_merge ( $setVal, $data );
			$f = array ();
			$o = array ();
			$v = array ();
			foreach ( $data as $field => $value ) {
				$type = (isset ( $this->types [$table . '.' . $field] )) ? $this->types [$table . '.' . $field] : array (
						'type' => ''
				);
				switch ($type ['type']) {
					case 'date' :
						$dataFormat = str_replace ( array (
						'yyyy',
						'MM',
						'dd',
						'hh',
						'mm',
						'ss'
						), array (
						'Y',
						'm',
						'd',
						'H',
						'i',
						's'
						), $type ['attr'] ['data-format'] );
						$value = str2mysqltime ( $value, 'Y-m-d' );
						break;
					case 'datetime' :
						$dataFormat = str_replace ( array (
						'yyyy',
						'MM',
						'dd',
						'hh',
						'mm',
						'ss'
						), array (
						'Y',
						'm',
						'd',
						'H',
						'i',
						's'
						), $type ['attr'] ['data-format'] );
						$value = str2mysqltime ( $value, 'Y-m-d H:i:s' );
						break;
				}
				if (in_array ( $field, $this->fields [$table] )) {
					$f [] = $field;
					$o [] = "?";
					if (! is_array ( $value )) {
						$v [] = $value;
					} else {
						$v [] = implode ( ',', $value );
					}
				}
			}
			$sql = "INSERT INTO `" . $table . "` (`" . implode ( '`,`', $f ) . "`) VALUES (" . implode ( ',', $o ) . ")";
			$result = $this->execSql($sql,$v);
			
			$this->insetId = $result[0];
		}
	}
	public function update($req, $table) {
		if (! empty ( $req [$table] )) {
			$data = $req [$table];
			foreach ( $data as $field => $value ) {
				if ((! empty ( $this->readonly ) && in_array ( $table . '.' . $field, $this->readonly )) || (! empty ( $this->disabled ) && in_array ( $table . '.' . $field, $this->disabled ))) {
					unset ( $data [$field] );
				}
			}
			$f = array ();
			$v = array ();
			foreach ( $data as $field => $value ) {
				$type = (isset ( $this->types [$table . '.' . $field] )) ? $this->types [$table . '.' . $field] : array (
						'type' => ''
				);
				switch ($type ['type']) {
					case 'date' :
						$dataFormat = str_replace ( array (
						'yyyy',
						'MM',
						'dd',
						'hh',
						'mm',
						'ss'
						), array (
						'Y',
						'm',
						'd',
						'H',
						'i',
						's'
						), $type ['attr'] ['data-format'] );
						$value = str2mysqltime ( $value, 'Y-m-d' );
						break;
					case 'datetime' :
						$dataFormat = str_replace ( array (
						'yyyy',
						'MM',
						'dd',
						'hh',
						'mm',
						'ss'
						), array (
						'Y',
						'm',
						'd',
						'H',
						'i',
						's'
						), $type ['attr'] ['data-format'] );
						$value = str2mysqltime ( $value, 'Y-m-d H:i:s' );
						break;
				}
				if (in_array ( $field, $this->fields [$table] )) {
					$f [] = '`' . $field . "` = ?";
					if (! is_array ( $value )) {
						$v [] = $value;
					} else {
						$v [] = implode ( ',', $value );
					}
				}
			}

			$keyParams = array ();
			if (! empty ( $this->primaryKeys )) {
				foreach ( $this->primaryKeys as $k3 => $v3 ) {
					foreach ( $v3 as $v4 ) {
						if ($k3 == $table) {
							$keyParams [] = "`" . $table . '`.`' . $v4 . '`=?';
							$v [] = $req [$table] [$v4];
						}
					}
				}
			}
			if (! empty ( $keyParams )) {
				$sql = "UPDATE `" . $table . "` set " . implode ( ',', $f ) . " WHERE " . implode ( " AND ", $keyParams );
				$this->execSql($sql,$v,Database::UPDATE);
			}
		}
	}
	public function remove($table) {
		$keyParams = array ();
		$v = array ();
		if (! empty ( $this->primaryKeys )) {
			foreach ( $this->primaryKeys as $k3 => $v3 ) {
				foreach ( $v3 as $v4 ) {
					if ($k3 == $table) {
						$keyParams [] = "`" . $table . '`.`' . $v4 . '`=?';
						$v [] = $_GET ['key'] [$k3 . '.' . $v4];
					}
				}
			}
		}

		if (! empty ( $keyParams )) {
			$sql = "DELETE FROM `" . $table . "` WHERE " . implode ( " AND ", $keyParams );
			$this->execSql($sql,$v,Database::DELETE);
		}
	}
	private function download() {
		if (! empty ( $_GET ['name'] ) && ! empty ( $_GET ['value'] )) {
			$value = base64_decode ( $_GET ['value'] );
			$tmp = explode ( '.', $_GET ['name'] );
			if (count ( $tmp ) == 3 && $this->uid == $tmp [0]) {
				$type = $this->types [$tmp [1] . '.' . $tmp [2]];
				if (! empty ( $type ['path'] ) && file_exists ( $type ['path'] . '/' . $value )) {
					header ( "Pragma: public", true );
					header ( "Expires: 0" );
					header ( "Cache-Control: must-revalidate, post-check=0, pre-check=0" );
					header ( "Content-Type: application/force-download" );
					header ( "Content-Type: application/octet-stream" );
					header ( "Content-Type: application/download" );
					header ( "Content-Disposition: attachment; filename=" . urlencode ( $value ) );
					header ( "Content-Transfer-Encoding: binary" );
					header ( "Content-Length: " . filesize ( $type ['path'] . '/' . $value ) );
					die ( file_get_contents ( $type ['path'] . '/' . $value ) );
				}
			}
		}
	}
	private function image() {
		if (! empty ( $_GET ['name'] ) && ! empty ( $_GET ['value'] )) {
			$value = base64_decode ( $_GET ['value'] );
			$tmp = explode ( '.', $_GET ['name'] );
			if (count ( $tmp ) == 3 && $this->uid == $tmp [0]) {
				$type = $this->types [$tmp [1] . '.' . $tmp [2]];
				if (! empty ( $type ['path'] ) && file_exists ( $type ['path'] . '/' . $value )) {
					$thumbnail = (isset ( $_GET ['thumbnail'] ) && ( int ) $_GET ['thumbnail'] == 1) ? 'thumbnail_' : '';
					$ext = explode ( ".", $value );
					$ext = strtolower ( end ( $ext ) );
					header ( "Pragma: public", true );
					header ( "Expires: 0" );
					header ( "Content-Transfer-Encoding: binary" );
					switch ($ext) {
						case 'jpg' :
						case 'jpeg' :
							header ( 'Content-Type: image/jpg' );
							break;
						case 'gif' :
							header ( 'Content-Type: image/gif' );
							break;
						case 'png' :
							header ( 'Content-Type: image/png' );
							break;
					}
					header ( "Content-Length: " . filesize ( $type ['path'] . '/' . $thumbnail . $value ) );
					die ( file_get_contents ( $type ['path'] . '/' . $thumbnail . $value ) );
				}
			}
		}
	}
	private function delFile() {
		$flag = false;
		if (! empty ( $_GET ['name'] ) && ! empty ( $_GET ['key'] )) {
			$tmp = explode ( '.', $_GET ['name'] );
			if (count ( $tmp ) == 3 && $this->uid == $tmp [0]) {
				$rs = $this->getByPrimaryKeys ();
				if (! empty ( $rs )) {
					$type = $this->types [$tmp [1] . '.' . $tmp [2]];

					foreach ( $_GET ['key'] as $k => $v ) {
						$tmpKey = explode ( '.', $k );
						if (count ( $tmpKey ) == 2) {
							$_POST [$tmp [0]] [$tmpKey [0]] [$tmpKey [1]] = $v;
						}
					}

					$_POST ['uid'] = $tmp [0];
					$_POST [$tmp [0]] [$tmp [1]] [$tmp [2]] = '';
					$req = $this->getData ();
					$this->update ( $req, $tmp [1] );

					if (! empty ( $type ['path'] ) && file_exists ( $type ['path'] . '/' . $rs [$tmp [0]] [$tmp [1]] [$tmp [2]] )) {
						$vl = array ();
						$vl [] = $rs [$tmp [0]] [$tmp [1]] [$tmp [2]];
						$conditions = "";
						$operators = " AND ";

						if (! empty ( $this->where )) {
							foreach ( $this->where as $v ) {
								$conditions .= $operators . ' ' . $v [0];
								$operators = ' AND ';
								if (count ( $v ) > 1) {
									for($i = 1; $i < count ( $v ); $i ++) {
										$vl [] = $v [$i];
									}
								}
							}
						}
						$joins = $this->buildJoin ();
						$sql = "SELECT count(1) as count FROM " . $this->table . $joins . " WHERE `" . $tmp [1] . "`.`" . $tmp [2] . "` = ?  " . $conditions;
						
						$rsOther = $this->querySql($sql,$vl);

						if (( int ) $rsOther[0] ['count'] <= 0) {
							if (is_file ( $type ['path'] . '/' . $rs [$tmp [0]] [$tmp [1]] [$tmp [2]] )) {
								@unlink ( $type ['path'] . '/' . $rs [$tmp [0]] [$tmp [1]] [$tmp [2]] );
								if (file_exists ( $type ['path'] . '/thumbnail_' . $rs [$tmp [0]] [$tmp [1]] [$tmp [2]] ) && is_file ( $type ['path'] . '/thumbnail_' . $rs [$tmp [0]] [$tmp [1]] [$tmp [2]] )) {
									unlink ( $type ['path'] . '/thumbnail_' . $rs [$tmp [0]] [$tmp [1]] [$tmp [2]] );
								}
							}
						}
					}
				}
			}
		}

		$queryString = $this->queryString;
		$queryString [$this->actionKey] = 'form';
		if (isset ( $queryString ['name'] )) {
			unset ( $queryString ['name'] );
		}
		if (isset ( $queryString ['thumbnail'] )) {
			unset ( $queryString ['thumbnail'] );
		}
		if (isset ( $queryString ['value'] )) {
			unset ( $queryString ['value'] );
		}
		$this->redirect ( "?" . http_build_query ( $queryString, '', '&' ) );
	}
	private function getByPrimaryKeys() {
		$data = array ();
		if (isset ( $_GET ['key'] )) {
			$keyParams = array ();
			$vl = array ();
			$fields = array ();
			if (! empty ( $this->primaryKeys )) {
				foreach ( $this->primaryKeys as $k3 => $v3 ) {
					foreach ( $v3 as $v4 ) {
						if ($k3 == $this->table && trim ( $_GET ['key'] [$k3 . '.' . $v4] ) != '') {
							$keyParams [] = $k3 . '.' . $v4 . '=?';
							$vl [] = $_GET ['key'] [$k3 . '.' . $v4];
						}
					}
				}
			}
			if (! empty ( $keyParams )) {
				$conditions = "";
				$operators = " AND ";

				if (! empty ( $this->where )) {
					foreach ( $this->where as $v ) {
						$conditions .= $operators . ' ' . $v [0];
						$operators = ' AND ';
						if (count ( $v ) > 1) {
							for($i = 1; $i < count ( $v ); $i ++) {
								$vl [] = $v [$i];
							}
						}
					}
				}

				$joins = $this->buildJoin ();

				if (! empty ( $this->primaryKeys )) {
					foreach ( $this->primaryKeys as $k3 => $v3 ) {
						foreach ( $v3 as $v4 ) {
							$fields [] = '`' . $k3 . '`.' . $v4 . ' as ' . $k3 . '_' . $v4;
						}
					}
				}

				foreach ( $this->fields as $table => $v ) {
					foreach ( $v as $k1 => $v1 ) {
						$fields [] = '`' . $table . '`.' . $v1 . ' as ' . $table . '_' . $v1;
					}
				}
				$sql = "SELECT " . implode ( ',', $fields ) . " FROM " . $this->table . $joins . " WHERE " . implode ( " AND ", $keyParams ) . " " . $conditions;
				$rs = $this->querySql($sql,$vl);
				$rs = $rs[0];
				
				if (! empty ( $rs )) {
					foreach ( $this->primaryKeys as $k3 => $v3 ) {
						foreach ( $v3 as $v4 ) {
							$data [$this->uid] [$k3] [$v4] = $rs [$k3 . '_' . $v4];
						}
					}
					foreach ( $this->fields as $table => $v ) {
						foreach ( $v as $k1 => $v1 ) {
							$data [$this->uid] [$table] [$v1] = $rs [$table . '_' . $v1];
						}
					}
				}
			}
		}

		return $data;
	}
	private function dataProcessing() {
		$errors = array ();
		foreach ( $this->elements as $field ) {
			$type = array (
					'type' => 'text',
					'opts' => array ()
			);
			if (! empty ( $this->types [$field] )) {
				$type = $this->types [$field];
			}
			$aryFields = explode ( '.', $field );
			switch ($type ['type']) {
				case 'tag' :
					if (isset ( $_POST ['hidden-' . $this->uid] ) && isset ( $_POST ['hidden-' . $this->uid] [$aryFields [0]] ) && isset ( $_POST ['hidden-' . $this->uid] [$aryFields [0]] [$aryFields [1]] )) {
						$_POST [$this->uid] [$aryFields [0]] [$aryFields [1]] = $_POST ['hidden-' . $this->uid] [$aryFields [0]] [$aryFields [1]];
					} else {
						$_POST [$this->uid] [$aryFields [0]] [$aryFields [1]] = null;
					}
					break;
				case 'file' :
					if (isset ( $_FILES [$this->uid] ) && isset ( $_FILES [$this->uid] ['name'] [$aryFields [0]] ) && isset ( $_FILES [$this->uid] ['name'] [$aryFields [0]] [$aryFields [1]] ) && $_FILES [$this->uid] ['name'] [$aryFields [0]] [$aryFields [1]]) {
						$fileUpload = new FileUpload ();
						$fileUpload->uploadDir = $type ['path'] . '/';
						$fileUpload->extensions = $type ['extensions'];
						$fileUpload->tmpFileName = $_FILES [$this->uid] ['tmp_name'] [$aryFields [0]] [$aryFields [1]];
						$fileUpload->fileName = $_FILES [$this->uid] ['name'] [$aryFields [0]] [$aryFields [1]];
						$fileUpload->httpError = $_FILES [$this->uid] ['error'] [$aryFields [0]] [$aryFields [1]];

						if ($fileUpload->upload ()) {
							$_POST [$this->uid] [$aryFields [0]] [$aryFields [1]] = $fileUpload->newFileName;
						}
						$error = $fileUpload->getMessage ();
						if (! empty ( $error )) {
							if (! is_array ( $error )) {
								$errors [] = $error;
							} else {
								foreach ( $error as $e ) {
									$errors [] = $e;
								}
							}
						}
					}
					break;
				case 'image' :
					if (isset ( $_FILES [$this->uid] ) && isset ( $_FILES [$this->uid] ['name'] [$aryFields [0]] ) && isset ( $_FILES [$this->uid] ['name'] [$aryFields [0]] [$aryFields [1]] ) && $_FILES [$this->uid] ['name'] [$aryFields [0]] [$aryFields [1]]) {
						$fileUpload = new FileUpload ();
						$fileUpload->uploadDir = $type ['path'] . '/';
						$fileUpload->extensions = $type ['extensions'];
						$fileUpload->tmpFileName = $_FILES [$this->uid] ['tmp_name'] [$aryFields [0]] [$aryFields [1]];
						$fileUpload->fileName = $_FILES [$this->uid] ['name'] [$aryFields [0]] [$aryFields [1]];
						$fileUpload->httpError = $_FILES [$this->uid] ['error'] [$aryFields [0]] [$aryFields [1]];

						if ($fileUpload->upload ()) {
							$_POST [$this->uid] [$aryFields [0]] [$aryFields [1]] = $fileUpload->newFileName;
							$image = new Image ( $type ['path'] . '/' );
							if (! empty ( $type ['thumbnail'] )) {
								switch ($type ['thumbnail']) {
									case 'mini' :
										$image->miniThumbnail ( $fileUpload->newFileName );
										break;
									case 'small' :
										$image->smallThumbnail ( $fileUpload->newFileName );
										break;
									case 'medium' :
										$image->mediumThumbnail ( $fileUpload->newFileName );
										break;
									case 'large' :
										$image->largeThumbnail ( $fileUpload->newFileName );
										break;
									default :
										$image->miniThumbnail ( $fileUpload->newFileName );
										break;
								}
							} else {
								$image->miniThumbnail ( $fileUpload->newFileName );
							}
							$width = (! empty ( $type ['width'] )) ? $type ['width'] : '';
							$height = (! empty ( $type ['height'] )) ? $type ['height'] : '';
							$fix = 'width';
							if (! empty ( $width ) || ! empty ( $height )) {
								$image->newWidth = '';
								$image->newHeight = '';
								$image->pre = '';
								$image->resize ( $fileUpload->newFileName, $width, $height, $fix );
							}
						}
						$error = $fileUpload->getMessage ();
						if (! empty ( $error )) {
							if (! is_array ( $error )) {
								$errors [] = $error;
							} else {
								foreach ( $error as $e ) {
									$errors [] = $e;
								}
							}
						}
					}
					break;
			}
		}

		return $errors;
	}
	
	private function debug($sql = null,$params = array()) {
		$config = Kohana::$config->load('crud');
		if ($config->get('pageKey') == true){
			if (!empty($this->errors)){
				echo "<p>".implode("<br />", $this->errors)."</p>";
			}
			if (!empty($sql)){
				echo interpolateQuery($sql,$params);
			}
		}
	}
	
	private function getToken($id = '') {
		$session = Session::instance();
		$_SESSION =& $session->as_array();
		
		$token = array ();
		$token ['key'] = $this->uid . "_auth_token" . $id;
		if (! isset ( $_SESSION [$this->uid] [$token ['key']] )) {
			$string = 'HTTP_USER_AGENT=' . $_SERVER ['HTTP_USER_AGENT'];
			$string .= 'time=' . time () . 'uid=' . $this->uid;
			if ($id != '') {
				$string .= 'id=' . $id;
			}
			$auth = md5 ( $string );
			$_SESSION [$this->uid] [$token ['key']] = $auth;
		}

		$token ['data'] = $_SESSION [$this->uid] [$token ['key']];

		return $token;
	}
	public function redirect($url) {
		if (! headers_sent ())
			header ( 'Location: ' . $url );
		else {
			echo '<script type="text/javascript">';
			echo 'window.location.href="' . $url . '";';
			echo '</script>';
			echo '<noscript>';
			echo '<meta http-equiv="refresh" content="0;url=' . $url . '" />';
			echo '</noscript>';
		}
		exit ();
	}
	private function execSql($sql, $params = array(),$type = Database::INSERT){
		$arySql = explode('?', $sql);
		$sql = "";
		
		$parameters = array();
		foreach ($arySql as $k => $v) {
			if (isset($params[$k])){
				$v .= ":param".$k;
				$parameters[":param".$k] = $params[$k];
			}
			$sql .= $v;
		}
		
		$query = DB::query($type, $sql);
		if (count($parameters) > 0){
			$query->parameters($parameters);
		}
		
		$results = $query->execute();
		
		return  $results;
	}
	private function querySql($sql, $params = array()){
		$arySql = explode('?', $sql);
		$sql = "";
		
		$parameters = array();
		foreach ($arySql as $k => $v) {
			if (isset($params[$k])){
				$v .= ":param".$k;
				$parameters[":param".$k] = $params[$k];
			}
			$sql .= $v;
		}
		
		$query = DB::query(Database::SELECT, $sql);
		if (count($parameters) > 0){
			$query->parameters($parameters);
		}
		
		$results = $query->execute();
		
		return  $results;
	}
	
	private function refValues($arr){
		if (strnatcmp(phpversion(),'5.3') >= 0) //Reference is required for PHP 5.3+
		{
			$refs = array();
			foreach($arr as $key => $value)
				$refs[$key] = &$arr[$key];
			return $refs;
		}
		return $arr;
	}
	
	private function removeToken() {
		$session = Session::instance();
		$_SESSION =& $session->as_array();
		
		foreach ( $_SESSION [$this->uid] as $k => $v ) {
			if (strpos ( $k, $this->uid . "_auth_token" ) !== false) {
				unset ( $_SESSION [$this->uid] [$k] );
			}
		}
	}
}