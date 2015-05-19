<?php
require_once dirname ( __FILE__ ) . '/tag.class.php';
require_once dirname ( __FILE__ ) . '/SearchForm.php';
require_once dirname ( __FILE__ ) . '/Pagination.php';
class IndexTemplate {
	public $queryString;
	public $tableAlias;
	public $searchs;
	public $cols;
	public $csvCols;
	public $excelCols;
	public $order;
	public $alias;
	public $types;
	public $pageKey;
	public $totalPage;
	public $totalRecords;
	public $limit;
	public $uid;
	public $hideCol;
	public $hide;
	public $colWidth;
	public $colFormats;
	public $colAlign;
	public $primaryKeys;
	public $table;
	public $fields;
	public $actionKey;
	public $rs;
	public $pageIndex;
	public $noCol;
	public $attributes;
	public function toString() {
		$container = new HtmlTag ( 'div', array (
				'class' => 'container well'

		) );

		$queryString = $this->queryString;
		$queryString [$this->actionKey] = 'index';
		if (isset ( $queryString ['key'] )) {
			unset ( $queryString ['key'] );
		}
		if (isset ( $queryString ['order'] )) {
			unset ( $queryString ['order'] );
		}
		$script = "
		<script>
		var uid = '" . $this->uid . "';
		function order_" . $this->uid . "(field){
		var oldField = document.getElementById('" . $this->uid . "OrderField').value;
		var oldType = document.getElementById('" . $this->uid . "OrderType').value;
		var url = '?" . http_build_query ( $queryString, '', '&' ) . "';
		url += '&order[f]=' + field;
		if (field == oldField) {
		if (oldType == 'asc') {
		url += '&order[t]=desc';
	} else {
	url += '&order[t]=asc';
	}
	} else {
	url += '&order[t]=asc';
	}
	window.location = url;
	}
	</script>
	<style>
	.table-striped tbody > tr:nth-child(odd) > td{
	background-color: #FFFFFF;
	}
	.well{
	background-color:#FBFBFB;
	}
	</style>
	";
		$container->addChildren ( new PlanText ( $script ) );
		$container->addChildren ( new HtmlTag ( 'h2', array (), $this->tableAlias ) );
		$container->addChildren ( new PlanText ("<hr style='margin-top:10px;'/>") );

		/**
		 * ***** Begin Search *******
		 */
		$container->addChildren ( new SearchForm ( $this->queryString, $this->searchs, $this->alias, $this->types, $this->uid, $this->actionKey, $this->pageKey, $this->hide,$this->attributes ) );
		/**
		 * ***** End Search *******
		 */
		$pagination = new Pagination ( $this->queryString, $this->pageKey, $this->totalPage, $this->totalRecords );
		$container->addChildren ( $pagination );
		$orderField = '';
		$orderType = '';

		if (count ( $this->order ) == 1) {
			$container->addChildren ( new InputHiddenTag ( array (
					'name' => $this->uid . '.order.field',
					'value' => $this->order [0] [0]
			) ) );
			$container->addChildren ( new InputHiddenTag ( array (
					'name' => $this->uid . '.order.type',
					'value' => strtolower ( trim ( $this->order [0] [1] ) )
			) ) );
			$orderField = $this->order [0] [0];
			$orderType = strtolower ( trim ( $this->order [0] [1] ) );
		} else {
			$container->addChildren ( new InputHiddenTag ( array (
					'name' => $this->uid . '.order.field',
					'value' => ''
			) ) );
			$container->addChildren ( new InputHiddenTag ( array (
					'name' => $this->uid . '.order.type',
					'value' => ''
			) ) );
		}

		$container->addChildren ( new InputHiddenTag ( array (
				'name' => 'uid',
				'value' => $this->uid
		) ) );
		$divTable = new HtmlTag('div',array('style' => 'overflow: auto;'));
		$table = new HtmlTag ( 'table', array (
				'class' => 'table table-bordered list table-condensed table-striped',
				'style' =>'background:#f9f9f9;'
		) );
		$divTable->addChildren($table);
		$thead = new HtmlTag ( 'thead' );
		$table->addChildren ( $thead );

		$tr = new HtmlTag ( 'tr' );
		$thead->addChildren ( $tr );

		if ($this->noCol == true){
			$tr->addChildren ( new HtmlTag ( 'th', array (
					'style' => 'width:30px; text-align:center; background: #f7f7f7;
					background: -moz-linear-gradient(top,  #f7f7f7 0%, #e5e5e5 100%);
					background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#f7f7f7), color-stop(100%,#e5e5e5));
					background: -webkit-linear-gradient(top,  #f7f7f7 0%,#e5e5e5 100%);
					background: -o-linear-gradient(top,  #f7f7f7 0%,#e5e5e5 100%);
					background: -ms-linear-gradient(top,  #f7f7f7 0%,#e5e5e5 100%);
					background: linear-gradient(to bottom,  #f7f7f7 0%,#e5e5e5 100%);
					filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="#f7f7f7", endColorstr="#e5e5e5",GradientType=0 );'
			), lbl_no ) );
		}

		foreach ( $this->cols as $field => $alias ) {
			$onclickTh = "";
			if ($this->isField ( $field ) == true) {
				$onclickTh = 'order_'.$this->uid . "('" . $field . "');";
			}
			if (isset ( $this->hideCol [$field] ))
				continue;
			$style = 'text-align:center; background: #f7f7f7;
			background: -moz-linear-gradient(top,  #f7f7f7 0%, #e5e5e5 100%);
			background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#f7f7f7), color-stop(100%,#e5e5e5));
			background: -webkit-linear-gradient(top,  #f7f7f7 0%,#e5e5e5 100%);
			background: -o-linear-gradient(top,  #f7f7f7 0%,#e5e5e5 100%);
			background: -ms-linear-gradient(top,  #f7f7f7 0%,#e5e5e5 100%);
			background: linear-gradient(to bottom,  #f7f7f7 0%,#e5e5e5 100%);
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="#f7f7f7", endColorstr="#e5e5e5",GradientType=0 );';
			if (! empty ( $this->colWidth [$field] )) {
				$style .= "width:" . $this->colWidth [$field] . "px;";
			}

			if ($onclickTh != "") {
				$style .= "cursor:pointer;";
			}

			$orderIcon = '';
			if ($orderField == $field) {
				$orderIcon = '<i class="arrow ' . $orderType . '"></i>';
			}

			$oIcon = new PlanText ( $orderIcon );

			if (isset ( $this->alias [$field] )) {
				$tr->addChildren ( new HtmlTag ( 'th', array (
						'style' => $style,
						'onclick' => $onclickTh
				), $this->alias [$field] . $oIcon->toString () ) );
			} else {
				$tmp = explode ( '.', $field );
				$field = '';
				foreach ( $tmp as $t ) {
					$field .= ucfirst ( $t );
				}
				$tr->addChildren ( new HtmlTag ( 'th', array (
						'style' => $style,
						'onclick' => $onclickTh
				), $field . $oIcon->toString () ) );
			}
		}

		$actionWidth = 0;
		if (empty($this->hide) || !in_array('copy', $this->hide)){
			$actionWidth += 45;
		}
		if (empty($this->hide) || !in_array('view', $this->hide)){
			$actionWidth += 45;
		}
		if (empty($this->hide) || !in_array('edit', $this->hide)){
			$actionWidth += 45;
		}
		if (empty($this->hide) || !in_array('delete', $this->hide)){
			$actionWidth += 45;
		}
		if ($actionWidth > 0){
			$tr->addChildren ( new HtmlTag ( 'th', array (
					'style' => 'width:'.$actionWidth.'px;background: #f7f7f7;
					background: -moz-linear-gradient(top,  #f7f7f7 0%, #e5e5e5 100%);
					background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#f7f7f7), color-stop(100%,#e5e5e5));
					background: -webkit-linear-gradient(top,  #f7f7f7 0%,#e5e5e5 100%);
					background: -o-linear-gradient(top,  #f7f7f7 0%,#e5e5e5 100%);
					background: -ms-linear-gradient(top,  #f7f7f7 0%,#e5e5e5 100%);
					background: linear-gradient(to bottom,  #f7f7f7 0%,#e5e5e5 100%);
					filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="#f7f7f7", endColorstr="#e5e5e5",GradientType=0 );'
			), '&nbsp;' ) );
		}

		$tbody = new HtmlTag ( 'tbody' );
		$table->addChildren ( $tbody );
		$queryString = $this->queryString;
		$count = 0;
		if (!empty($this->rs)){
			foreach ( $this->rs as $v ) {
				$tr = new HtmlTag ( 'tr' );
				$tbody->addChildren ( $tr );
				if ($this->noCol == true){
					$count++;
					$tr->addChildren ( new HtmlTag ( 'td', array (
							'style' => 'text-align:center'
					), (($this->pageIndex -1)*$this->limit + $count) ) );
				}
				foreach ( $this->cols as $field => $alias ) {
					$keyParams = array ();

					if (! empty ( $this->primaryKeys )) {
						foreach ( $this->primaryKeys as $k3 => $v3 ) {
							foreach ( $v3 as $v4 ) {
								if ($k3 == $this->table) {
									$keyParams [] = 'key[' . $k3 . '.' . $v4 . ']=' . $v [$k3 . '_' . $v4];
								}
							}
						}
					}

					if (isset ( $this->hideCol [$field] ))
						continue;
					$v [$alias] = (! empty ( $v [$alias] )) ? $this->valueProcessing ( $keyParams, $field, $v [$alias] ) : '';
					if (isset ( $this->colFormats [$field] )) {
						$v [$alias] = $this->formatProcessing ( $field, $this->colFormats [$field], $v, $v [$alias] );
					}
					$style = '';
					if (! empty ( $this->colAlign [$field] )) {
						$style .= "text-align:" . $this->colAlign [$field] . ";";
					}
					$tr->addChildren ( new HtmlTag ( 'td', array (
							'style' => $style
					), $v [$alias] ) );
				}
				if ($actionWidth > 0){
					$htmlBtnCopy = '';
					if (empty($this->hide) || !in_array('copy', $this->hide)){
						$queryString [$this->actionKey] = 'copy';
						$btnCopy = new HtmlTag ( 'a', array (
								'class' => 'btn btn-mini btn-primary',
								'href' => '?' . http_build_query ( $queryString, '', '&' ) . '&' . implode ( '&', $keyParams )
						), 'Copy' );
						$htmlBtnCopy = $btnCopy->toString ();
					}

					$htmlBtnView = '';
					if (empty($this->hide) || !in_array('view', $this->hide)){
						$queryString [$this->actionKey] = 'view';
						$btnView = new HtmlTag ( 'a', array (
								'class' => 'btn btn-mini',
								'href' => '?' . http_build_query ( $queryString, '', '&' ) . '&' . implode ( '&', $keyParams )
						), 'View' );
						$htmlBtnView = $btnView->toString();
					}

					$htmlBtnEdit = '';
					if (empty($this->hide) || !in_array('edit', $this->hide)){
						$queryString [$this->actionKey] = 'form';
						$btnEdit = new HtmlTag ( 'a', array (
								'class' => 'btn btn-mini btn-info',
								'href' => '?' . http_build_query ( $queryString, '', '&' ) . '&' . implode ( '&', $keyParams )
						), 'Edit' );
						$htmlBtnEdit = $btnEdit->toString();
					}

					$htmlbtnDelete = '';
					if (empty($this->hide) || !in_array('delete', $this->hide)){
						$queryString [$this->actionKey] = 'delete';
						$btnDelete = new HtmlTag ( 'a', array (
								'class' => 'btn btn-mini btn-danger',
								'href' => '?' . http_build_query ( $queryString, '', '&' ) . '&' . implode ( '&', $keyParams )
						), 'Delete' );
						$htmlbtnDelete = $btnDelete->toString();
					}

					$tr->addChildren ( new HtmlTag ( 'td', array (
							'style' => 'text-align:center;'
					), $htmlBtnCopy . ' ' . $htmlBtnView . ' ' . $htmlBtnEdit . ' ' . $htmlbtnDelete ) );
				}
			}
		}else{
			$tr = new HtmlTag ( 'tr' );
			$tbody->addChildren ( $tr );
			$colspan = count($this->cols);
			if ($this->noCol == true){
				$colspan++;
			}
			if ($actionWidth > 0){
				$colspan++;
			}
			$tr->addChildren(new HtmlTag('td',array('colspan' => $colspan),'No data to display.'));
		}

		$container->addChildren ( $divTable );
		$container->addChildren ( $pagination );

		return $container->toString ();
	}
	public function printPreview() {
		$html = new HtmlTag ( 'html' );
		$head = new HtmlTag ( 'head' );
		$html->addChildren ( $head );
		$head->addChildren ( new HtmlTag ( 'title', array (), $this->tableAlias ) );
		$body = new HtmlTag ( 'body' );
		$html->addChildren ( $body );
		$container = new HtmlTag ( 'div', array (
				'class' => 'container'
		) );
		$body->addChildren ( $container );
		$script = "
		<script>
		window.onload = function(){
		window.print();
	};
	</script>
	";
		$css = "
		<style type='text/css'>
		h1{
		font-size: 22px;
	}
	table{
	border-spacing: 0;
	margin: 0;
	border-collapse: collapse;
	min-width:100%;
	table-layout:fixed;
	font-size: 12px;
	line-height: 1.5;
	border: 1px solid #eee;
	}
	table td,table th{
	border: 1px solid #eee;
	padding: 2px;
	}
	table th{
	padding: 4px;
	}
	</style>
	";
		$container->addChildren ( new PlanText ( $script ) );
		$container->addChildren ( new PlanText ( $css ) );

		$container->addChildren ( new HtmlTag ( 'h2', array (), $this->tableAlias ) );

		$table = new HtmlTag ( 'table' );

		$thead = new HtmlTag ( 'thead' );
		$table->addChildren ( $thead );

		$tr = new HtmlTag ( 'tr' );
		$thead->addChildren ( $tr );

		foreach ( $this->cols as $field => $alias ) {
			if (isset ( $this->hideCol [$field] ))
				continue;
			$style = 'text-align:center;';
			if (! empty ( $this->colWidth [$field] )) {
				$style .= "width:" . $this->colWidth [$field] . "px;";
			}
			if (isset ( $this->alias [$field] )) {
				$tr->addChildren ( new HtmlTag ( 'th', array (
						'style' => $style
				), $this->alias [$field] ) );
			} else {
				$tmp = explode ( '.', $field );
				$field = '';
				foreach ( $tmp as $t ) {
					$field .= ucfirst ( $t );
				}
				$tr->addChildren ( new HtmlTag ( 'th', array (
						'style' => $style
				), $field ) );
			}
		}

		$tbody = new HtmlTag ( 'tbody' );
		$table->addChildren ( $tbody );
		$queryString = $this->queryString;
		foreach ( $this->rs as $v ) {
			$tr = new HtmlTag ( 'tr' );
			$tbody->addChildren ( $tr );

			foreach ( $this->cols as $field => $alias ) {
				$keyParams = array ();

				if (! empty ( $this->primaryKeys )) {
					foreach ( $this->primaryKeys as $k3 => $v3 ) {
						foreach ( $v3 as $v4 ) {
							if ($k3 == $this->table) {
								$keyParams [] = 'key[' . $k3 . '.' . $v4 . ']=' . $v [$k3 . '_' . $v4];
							}
						}
					}
				}

				if (isset ( $this->hideCol [$field] ))
					continue;
				$v [$alias] = $this->valueProcessing ( $keyParams, $field, $v [$alias], 1 );
				if (isset ( $this->colFormats [$field] )) {
					$v [$alias] = $this->formatProcessing ( $field, $this->colFormats [$field], $v, $v [$alias] );
				}
				$style = '';
				if (! empty ( $this->colAlign [$field] )) {
					$style .= "text-align:" . $this->colAlign [$field] . ";";
				}
				$tr->addChildren ( new HtmlTag ( 'td', array (
						'style' => $style
				), $v [$alias] ) );
			}
		}

		$container->addChildren ( $table );
		echo "<!DOCTYPE HTML>";
		echo $html->toString ();
	}
	private function valueProcessing($keyParams, $field, $value, $print = 0) {
		if (isset ( $this->types [$field] )) {
			$type = $this->types [$field];
			switch ($type ['type']) {
				case 'datetime' :
				case 'date' :
					if (isset ( $type ['attr'] ) && isset ( $type ['attr'] ['data-format'] )) {
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
						$value = str2mysqltime ( $value, $dataFormat );
					}
					break;
				case 'tag' :
					$ary = explode ( ',', $value );
					$value = '';
					foreach ( $ary as $v ) {
						if (! empty ( $v )) {
							$span = new HtmlTag ( 'span', array (
									'class' => 'tm-tag'
							), htmlspecialchars ( $v ) );
							$value .= $span->toString () . "\n";
						}
					}
					break;
				case 'time' :
					$value = ($value == '00:00:00') ? '' : $value;
					break;
				case 'image' :
					if (file_exists ( $type ['path'] . '/' . $value ) && is_file ( $type ['path'] . '/' . $value )) {
						if (! empty ( $keyParams )) {
							$queryString = $this->queryString;
							$queryString [$this->actionKey] = 'image';
							$queryString ['thumbnail'] = '1';
							$queryString ['name'] = $this->uid . "." . $field;
							$queryString ['value'] = base64_encode ( $value );
							$image = new HtmlShortTag ( 'img', array (
									'src' => '?' . http_build_query ( $queryString, '', '&' ) . '&' . implode ( '&', $keyParams )
							) );
							if ($print == 0) {
								$aid = 'fancybox-' . time () . rand ( 1, 1000 ) . sha1 ( $value );
								$queryString ['thumbnail'] = '0';
								$a = new HtmlTag ( 'a', array (
										'id' => $aid,
										'style' => 'cursor:pointer;',
										'href' => '?' . http_build_query ( $queryString, '', '&' ) . '&file.jpg'
								) );
								$a->addChildren ( $image );
								$value = $a->toString ();
								$script = "
								<script>
								$('#" . $aid . "').fancybox({
								'overlayShow'	: false,
								'transitionIn'	: 'elastic',
								'transitionOut'	: 'elastic'
							});
							</script>
							";
								$value .= $script;
							} else if ($print == 1) {
								$value = $image->toString ();
							}
						}
					} else {
						$value = '';
					}
					break;
				case 'file' :
					if (file_exists ( $type ['path'] . '/' . $value ) && is_file ( $type ['path'] . '/' . $value )) {
						if (! empty ( $keyParams )) {
							if ($print == 0) {
								$queryString = $this->queryString;
								$queryString [$this->actionKey] = 'download';
								$queryString ['name'] = $this->uid . "." . $field;
								$queryString ['value'] = base64_encode ( $value );
								$onclickDownload = "$('#" . $this->uid . "_download').attr({src: '?" . http_build_query ( $queryString, '', '&' ) . '&' . implode ( '&', $keyParams ) . "'}); return false;";
								$downloadLink = new HtmlTag ( 'a', array (
										'href' => '?' . http_build_query ( $queryString, '', '&' ) . '&' . implode ( '&', $keyParams ),
										'onclick' => $onclickDownload
								), $value );
								$value = $downloadLink->toString ();
							}
						}
					} else {
						$value = '';
					}
					break;
				case 'textarea' :
					$value = nl2br ( htmlspecialchars($value));
					break;
				case 'radio' :
					if (isset ( $type ['opts'] ) && ! empty ( $type ['opts'] ) && isset ( $type ['opts'] [$value] )) {
						$value = $type ['opts'] [$value];
					}
					break;
				case 'autocomplete' :
				case 'selectbox' :
				case 'checkbox' :
					if (isset ( $type ['opts'] ) && ! empty ( $type ['opts'] )) {
						$value = explode ( ',', $value );
						if (! empty ( $value )) {
							$tmp = array ();
							foreach ( $value as $v ) {
								if (isset ( $type ['opts'] [$v] )) {
									$tmp [] = $type ['opts'] [$v];
								}
							}
							$value = implode ( ',', $tmp );
						} else {
							$value = '';
						}
					}
					break;
			}
			if (in_array( $type ['type'], array('text','date','datetime','time'))){
				if (!is_numeric($value)){
					$value = htmlspecialchars($value);
				}
			}
		}else{
			if (!is_numeric($value)){
				$value = htmlspecialchars($value);
			}
		}

		return $value;
	}
	private function formatProcessing($field, $format, $row, $value) {
		if (strpos ( $field, '.' ) === false) {
			if (in_array ( $field, $this->fields [$this->table] ) || in_array ( $field, $this->primaryKeys [$this->table] )) {
				$field = $this->table . '_' . $field;
			} else {
				$field = $field;
			}
		} else {
			$field = str_replace ( '.', '_', $field );
		}

		if (! is_array ( $format ) && function_exists ( $format )) {
			$value = call_user_func ( $format, $field, $value, $row);
		} else if (is_string ( $format )) {
			$matches = array ();
			preg_match_all ( "/{([^}]*)}/", $format, $matches );

			if (isset ( $matches [0] ) && count ( $matches [0] ) > 0) {
				foreach ( $matches [1] as $k => $v ) {
					$tmp = "";
					if (strpos ( $v, '.' ) === false) {
						if (in_array ( $v, $this->fields [$this->table] ) || in_array ( $v, $this->primaryKeys [$this->table] )) {
							$tmp = $this->table . '_' . $v;
						} else {
							$tmp = $v;
						}
					} else {
						$tmp = str_replace ( '.', '_', $v );
					}
					if (isset ( $row [$tmp] )) {
						$matches [1] [$k] = $row [$tmp];
					}
				}
				$format = str_replace ( $matches [0], $matches [1], $format );
			}

			$value = $format;
		} else if (is_array ( $format ) && count ( $format ) == 2) {
			if (method_exists ( $format [0], $format [1] )) {
				$value = call_user_func ( $format, $field, $value, $row);
			}
		}

		return $value;
	}
	public function csv() {
		$csv = array ();

		$aryHeader = array ();
		foreach ( $this->csvCols as $field => $alias ) {
			if (isset ( $this->alias [$field] )) {
				$aryHeader [] = $this->alias [$field];
			} else {
				$tmp = explode ( '.', $field );
				$field = '';
				foreach ( $tmp as $t ) {
					$field .= ucfirst ( $t );
				}
				$aryHeader [] = $field;
			}
		}

		$csv [] = $aryHeader;
		$keyParams = array ();
		foreach ( $this->rs as $v ) {
			$row = array ();
			foreach ( $this->csvCols as $field => $alias ) {
				$v [$alias] = $this->valueProcessing ( $keyParams, $field, $v [$alias] );
				if (isset ( $this->colFormats [$field] )) {
					$v [$alias] = $this->formatProcessing ( $field, $this->colFormats [$field], $v, $v [$alias] );
				}
				$row [] = $v [$alias];
			}
			$csv [] = $row;
		}
		$filename = preg_replace ( '/[^aA-zZ0-9\_\-]/', '', str_replace(' ', '', $this->tableAlias) . "-" . date ( "YmdHis" ));
		header ( "Content-type: text/csv" );
		header ( "Content-Disposition: attachment; filename=" . $filename. ".csv");
		header ( "Pragma: no-cache" );
		header ( "Expires: 0" );

		foreach ( $csv as $v ) {
			echo $this->arrayToCsv ( $v ) . "\n";
		}
	}
	public function excel() {
		$excelCols = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',
						'AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ',
						'BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO','BP','BQ','BR','BS','BT','BU','BV','BW','BX','BY','BZ',
						'CA','CB','CC','CD','CE','CF','CG','CH','CI','CJ','CK','CL','CM','CN','CO','CP','CQ','CR','CS','CT','CU','CV','CW','CX','CY','CZ',
						'DA','DB','DC','DD','DE','DF','DG','DH','DI','DJ','DK','DL','DM','DN','DO','DP','DQ','DR','DS','DT','DU','DV','DW','DX','DY','DZ',
						'EA','EB','EC','ED','EE','EF','EG','EH','EI','EJ','EK','EL','EM','EN','EO','EP','EQ','ER','ES','ET','EU','EV','EW','EX','EY','EZ',
					);
		require_once dirname ( dirname ( dirname ( __FILE__ ) ) ) . '/library/PHPExcel.php';
		
		// Create new PHPExcel object
		$objPHPExcel = new PHPExcel();
		
		$i = 0;
		$j = 1;
		foreach ( $this->excelCols as $field => $alias ) {
			if (isset ( $this->alias [$field] )) {
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue($excelCols[$i].$j,$this->alias [$field]);
			} else {
				$tmp = explode ( '.', $field );
				$field = '';
				foreach ( $tmp as $t ) {
					$field .= ucfirst ( $t );
				}
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue($excelCols[$i].$j,$field);
			}
			$i++;
		}
		$i = 0;
		$j++;
		$keyParams = array ();
		foreach ( $this->rs as $v ) {
			$row = array ();
			foreach ( $this->excelCols as $field => $alias ) {
				$v [$alias] = $this->valueProcessing ( $keyParams, $field, $v [$alias] );
				if (isset ( $this->colFormats [$field] )) {
					$v [$alias] = $this->formatProcessing ( $field, $this->colFormats [$field], $v, $v [$alias] );
				}
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue($excelCols[$i].$j,htmlspecialchars_decode($v [$alias]));
				$i++;
			}
			$i = 0;
			$j++;
		}
		
		// Rename worksheet
		$objPHPExcel->getActiveSheet()->setTitle($this->tableAlias);
		
		
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);
		
		
		// Redirect output to a client’s web browser (Excel5)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$this->tableAlias . "-" . date ( "YmdHis" ).'.xls"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');
		
		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0
		
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
		exit;
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
	private function arrayToCsv(array &$fields, $delimiter = ',', $enclosure = '"', $encloseAll = false, $nullToMysqlNull = false) {
		$delimiter_esc = preg_quote ( $delimiter, '/' );
		$enclosure_esc = preg_quote ( $enclosure, '/' );

		$output = array ();
		foreach ( $fields as $field ) {
			if ($field === null && $nullToMysqlNull) {
				$output [] = 'NULL';
				continue;
			}

			// Enclose fields containing $delimiter, $enclosure or whitespace
			if ($encloseAll || preg_match ( "/(?:${delimiter_esc}|${enclosure_esc}|\s)/", $field )) {
				$output [] = $enclosure . str_replace ( $enclosure, $enclosure . $enclosure, $field ) . $enclosure;
			} else {
				$output [] = $field;
			}
}

return implode ( $delimiter, $output );
}
}
