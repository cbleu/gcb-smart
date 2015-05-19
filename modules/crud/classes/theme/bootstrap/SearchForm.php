<?php
class SearchForm {
	private $queryString;
	private $searchs;
	private $alias;
	private $types;
	private $pageKey;
	private $uid;
	private $hide;
	private $actionKey;
	private $attributes;
	public function __construct($queryString, $searchs, $alias, $types, $uid, $actionKey,$pageKey,$hide,$attributes) {
		$this->queryString = $queryString;
		$this->searchs = $searchs;
		$this->alias = $alias;
		$this->types = $types;
		$this->uid = $uid;
		$this->actionKey = $actionKey;
		$this->pageKey = $pageKey;
		$this->hide = $hide;
		$this->attributes = $attributes;

	}
	public function toString() {
		$searchContainer = new HtmlTag ( 'div', array () );

		$queryString = $this->queryString;
		$queryString [$this->actionKey] = 'index';
		if (isset ( $queryString [$this->pageKey] )) {
			unset ( $queryString [$this->pageKey] );
		}

		$searchForm = new HtmlTag ( 'form', array (
				'class' => 'form-horizontal',
				'id' => $this->uid . '_search',
				'method' => 'post',
				'action' => '?' . http_build_query ( $queryString, '', '&' )
		) );
		$searchContainer->addChildren ( $searchForm );
		$searchContainer->addChildren ( new HtmlTag ( 'iframe', array (
				'id' => $this->uid . '_download',
				'style' => 'width: 0px; line-height:0px; height: 0px; border: 0px; padding: 0px; margin: 0px; display:none;'
		) ) );

		if (empty($this->hide) || !in_array('search', $this->hide)){
			$i = 0;
			$rowfluid = new HtmlTag ( 'div', array (
					'class' => 'row-fluid show-grid'
			) );
			foreach ( $this->searchs as $field ) {
				if (isset ( $this->alias [$field] )) {
					$label = $this->alias [$field];
				} else {
					$label = '';
					$tmp = explode ( '.', $field );
					foreach ( $tmp as $t ) {
						$label .= ucfirst ( $t );
					}
				}
				$type = array (
						'type' => 'text',
						'opts' => array ()
				);
				if (! empty ( $this->types [$field] )) {
					$type = $this->types [$field];
				}
				$element = null;
				if (isset ( $type ['attr'] ) && isset ( $type ['attr'] ['value'] )) {
					unset ( $type ['attr'] ['value'] );
				}
				switch ($type ['type']) {
					case 'autocomplete' :
						$type ['opts'] = (isset ( $type ['opts'] ) && is_array ( $type ['opts'] )) ? $type ['opts'] : array ();
						if (empty($type['opts'])){
							$aryField = explode('.', $field);
							if (count($aryField) == 2){
								if (isset($this->attributes[$aryField[0]][$aryField[1]]['Type'])){
									if(strtolower($this->attributes[$aryField[0]][$aryField[1]]['Type']) == 'enum' ||
											strtolower($this->attributes[$aryField[0]][$aryField[1]]['Type']) == 'set'){
										$option = array();
										$option[''] = '';
										if (!empty($this->attributes[$aryField[0]][$aryField[1]]['Value'])){
											$ary = explode(",", $this->attributes[$aryField[0]][$aryField[1]]['Value']);
											foreach ($ary as $v){
												$v = str_replace("'", '', $v);
												$option[$v] =  $v;
											}
											$type ['opts'] = $option;
										}
									}
								}
							}
						}
						$type ['attr'] = (isset ( $type ['attr'] ) && is_array ( $type ['attr'] )) ? $type ['attr'] : array ();
						$attr = array_merge ( $type ['attr'], array (
								'name' => 'search.' . $field,
								'placeholder' => $label
						) );

						$element = new AutoComplete ( $type ['opts'], $attr, $label );
						break;
					case 'checkbox' :
						$type ['opts'] = (isset ( $type ['opts'] ) && is_array ( $type ['opts'] )) ? $type ['opts'] : array ();
						if (empty($type['opts'])){
							$aryField = explode('.', $field);
							if (count($aryField) == 2){
								if (isset($this->attributes[$aryField[0]][$aryField[1]]['Type'])){
									if(strtolower($this->attributes[$aryField[0]][$aryField[1]]['Type']) == 'enum' ||
											strtolower($this->attributes[$aryField[0]][$aryField[1]]['Type']) == 'set'){
										$option = array();
										if (!empty($this->attributes[$aryField[0]][$aryField[1]]['Value'])){
											$ary = explode(",", $this->attributes[$aryField[0]][$aryField[1]]['Value']);
											foreach ($ary as $v){
												$v = str_replace("'", '', $v);
												$option[$v] =  $v;
											}
											$type ['opts'] = $option;
										}
									}
								}
							}
						}
						$type ['attr'] = (isset ( $type ['attr'] ) && is_array ( $type ['attr'] )) ? $type ['attr'] : array ();
						$attr = array_merge ( $type ['attr'], array (
								'name' => 'search.' . $field,
								'placeholder' => $label
						) );

						$element = new InputCheckbox ( $type ['opts'], $attr, $label );
						break;
					case 'radio' :
						$type ['opts'] = (isset ( $type ['opts'] ) && is_array ( $type ['opts'] )) ? $type ['opts'] : array ();
						if (empty($type['opts'])){
							$aryField = explode('.', $field);
							if (count($aryField) == 2){
								if (isset($this->attributes[$aryField[0]][$aryField[1]]['Type'])){
									if(strtolower($this->attributes[$aryField[0]][$aryField[1]]['Type']) == 'enum' ||
											strtolower($this->attributes[$aryField[0]][$aryField[1]]['Type']) == 'set'){
										$option = array();
										if (!empty($this->attributes[$aryField[0]][$aryField[1]]['Value'])){
											$ary = explode(",", $this->attributes[$aryField[0]][$aryField[1]]['Value']);
											foreach ($ary as $v){
												$v = str_replace("'", '', $v);
												$option[$v] =  $v;
											}
											$type ['opts'] = $option;
										}
									}
								}
							}
						}
						$type ['attr'] = (isset ( $type ['attr'] ) && is_array ( $type ['attr'] )) ? $type ['attr'] : array ();
						$attr = array_merge ( $type ['attr'], array (
								'name' => 'search.' . $field,
								'placeholder' => $label
						) );

						$element = new InputRadio ( $type ['opts'], $attr, $label );
						break;
					case 'selectbox' :
						$type ['opts'] = (isset ( $type ['opts'] ) && is_array ( $type ['opts'] )) ? $type ['opts'] : array ();
						if (empty($type['opts'])){
							$aryField = explode('.', $field);
							if (count($aryField) == 2){
								if (isset($this->attributes[$aryField[0]][$aryField[1]]['Type'])){
									if(strtolower($this->attributes[$aryField[0]][$aryField[1]]['Type']) == 'enum' ||
											strtolower($this->attributes[$aryField[0]][$aryField[1]]['Type']) == 'set'){
										$option = array();
										$option[''] = '';
										if (!empty($this->attributes[$aryField[0]][$aryField[1]]['Value'])){
											$ary = explode(",", $this->attributes[$aryField[0]][$aryField[1]]['Value']);
											foreach ($ary as $v){
												$v = str_replace("'", '', $v);
												$option[$v] =  $v;
											}
											$type ['opts'] = $option;
										}
									}
								}
								if (strtolower($this->attributes[$aryField[0]][$aryField[1]]['Type']) == 'set'){
									$type ['attr']['multiple'] = 'multiple';
								}
							}
						}
						$type ['attr'] = (isset ( $type ['attr'] ) && is_array ( $type ['attr'] )) ? $type ['attr'] : array ();
						$attr = array_merge ( $type ['attr'], array (
								'name' => 'search.' . $field,
								'placeholder' => $label
						) );

						$element = new SelectBox ( $type ['opts'], $attr, $label );
						break;
					case 'date' :
						$type ['attr'] = (isset ( $type ['attr'] ) && is_array ( $type ['attr'] )) ? $type ['attr'] : array ();
						$attr = array_merge ( $type ['attr'], array (
								'name' => 'search.' . $field,
								'placeholder' => $label
						) );
						if (! isset ( $attr ['data-format'] )) {
							$attr ['data-format'] = 'yyyy-MM-dd';
						}
						$element = new InputDate ( $attr, $label );
						break;
					case 'time' :
						$type ['attr'] = (isset ( $type ['attr'] ) && is_array ( $type ['attr'] )) ? $type ['attr'] : array ();
						$attr = array_merge ( $type ['attr'], array (
								'name' => 'search.' . $field,
								'placeholder' => $label
						) );
						$attr ['data-format'] = 'hh:mm:ss';
						$element = new InputTime ( $attr, $label );
						break;
					case 'datetime' :
						$type ['attr'] = (isset ( $type ['attr'] ) && is_array ( $type ['attr'] )) ? $type ['attr'] : array ();
						$attr = array_merge ( $type ['attr'], array (
								'name' => 'search.' . $field,
								'placeholder' => $label
						) );
						if (! isset ( $attr ['data-format'] )) {
							$attr ['data-format'] = 'yyyy-MM-dd hh:mm:ss';
						}
						$element = new InputDateTime ( $attr, $label );
						break;
					case 'tag' :
						$type ['attr'] = (isset ( $type ['attr'] ) && is_array ( $type ['attr'] )) ? $type ['attr'] : array ();
						$attr = array_merge ( $type ['attr'], array (
								'name' => ' search.' . $field,
								'placeholder' => $label
						) );
						$element = new InputTag ( $attr, $label );
						break;
					case 'editor' :
					case 'textarea' :
					case 'file' :
					case 'image':
					case 'text' :
					default :
						$element = new InputText ( array (
						'name' => 'search.' . $field,
						'placeholder' => $label
						), $label );
						break;
				}

				$rowfluid->addChildren ( new HtmlTag ( 'div', array (
						'class' => 'span6'
				), $element->toString () ) );

				if ($i % 2 == 1) {
					$searchForm->addChildren ( $rowfluid );
					$rowfluid = new HtmlTag ( 'div', array (
							'class' => 'row-fluid show-grid'
					) );
				}

				$i ++;
			}
			if ($i % 2 == 1) {
				$searchForm->addChildren ( $rowfluid );
			}
		}

		$searchButton = new HtmlTag ( 'div', array (
				'style' => 'text-align:right;'
		) );
		$searchForm->addChildren ( $searchButton );

		$buttonGroup = new HtmlTag ( 'div', array (
				'class' => 'btn-group'
		) );
		$searchButton->addChildren ( $buttonGroup );

		if ((empty($this->hide) || !in_array('search', $this->hide)) && !empty($this->searchs)){
			$searchOnclick = "$('#" . $this->uid . "_search').submit();";
			$buttonGroup->addChildren ( new HtmlTag ( 'a', array (
					'class' => 'btn',
					'onclick' => $searchOnclick
			), ' <i class="icon-search"></i> '.btn_search ) );
			$buttonGroup->addChildren ( new HtmlTag ( 'a', array (
					'class' => 'btn',
					'href' => '?'
			), '<i class="icon-remove-sign"></i>' ) );
		}

		if (empty($this->hide) || !in_array('print', $this->hide)){
			$queryString = $this->queryString;
			$queryString [$this->actionKey] = 'print';
			$searchButton->addChildren ( new HtmlTag ( 'a', array (
					'class' => 'btn',
					'id' => $this->uid . '_print'
			), ' <i class="icon-print"></i> '.btn_print ) );
			$script = "
			<script>
			$('#" . $this->uid . '_print' . "').click(function(){
			var print =	window.open( '" . '?' . http_build_query ( $queryString, '', '&' ) . "', 'Print', 'menubar=0,location=0,height=700,width=760');
		});
		</script>
		";
			$searchForm->addChildren ( new PlanText ( $script ) );
		}


		if (empty($this->hide) || !in_array('csv', $this->hide)){
			$queryString = $this->queryString;
			$queryString [$this->actionKey] = 'csv';
			$onclickCsv = "$('#" . $this->uid . "_download').attr({src: '?" . http_build_query ( $queryString, '', '&' ) . "'});";
			$searchButton->addChildren ( new HtmlTag ( 'a', array (
					'class' => 'btn',
					'onclick' => $onclickCsv
			), ' <i class="icon-download"></i> '.btn_csv ) );
		}

		if (empty($this->hide) || !in_array('excel', $this->hide)){
			$queryString = $this->queryString;
			$queryString [$this->actionKey] = 'excel';
			$onclickExcel = "$('#" . $this->uid . "_download').attr({src: '?" . http_build_query ( $queryString, '', '&' ) . "'});";
			$searchButton->addChildren ( new HtmlTag ( 'a', array (
					'class' => 'btn',
					'onclick' => $onclickExcel
			), ' <i class="icon-download"></i> '.btn_excel ) );
		}

		if (empty($this->hide) || !in_array('add', $this->hide)){
			$queryString = $this->queryString;
			$queryString [$this->actionKey] = 'form';
			$searchButton->addChildren ( new HtmlTag ( 'a', array (
					'class' => 'btn btn-info',
					'href' => '?' . http_build_query ( $queryString, '', '&' )
			), ' <i class="icon-plus icon-white"></i> '.btn_add ) );
		}

		return $searchContainer->toString ();
	}
}