<?php
require_once dirname ( __FILE__ ) . '/tag.class.php';
class FormTemplate {
	public $action;
	public $uid;
	public $token;
	public $primaryKeys;
	public $tableAlias;
	public $errors;
	public $elements;
	public $disabled;
	public $alias;
	public $validates;
	public $types;
	public $readonly;
	public $queryString;
	public $actionKey;
	public $attributes;
	public $editorImageUploadPath;
	public function __construct() {
	}
	public function toString() {
		$container = new Container ();
		$script = "
		<style>
		.well{
		background-color:#FBFBFB;
	}
	</style>
	";
		$container->addChildren ( new PlanText ( $script ) );
		$container->addAction ( $this->action );
		$form = new HtmlTag ( 'form', array (
				'class' => 'form-horizontal',
				'id' => $this->uid,
				'method' => 'post',
				'enctype' => 'multipart/form-data'
		) );

		$form->addChildren ( new InputHiddenTag ( array (
				'name' => 'uid',
				'value' => $this->uid
		) ) );
		$form->addChildren ( new InputHiddenTag ( array (
				'name' => 'action_type'
		) ) );

		if (isset ( $this->token )) {
			$form->addChildren ( new InputHiddenTag ( array (
					'name' => 'token',
					'value' => $this->token ['data']
			) ) );
			$form->addChildren ( new InputHiddenTag ( array (
					'name' => 'token_key',
					'value' => $this->token ['key']
			) ) );
		}

		$form->addChildren ( new HtmlTag ( 'iframe', array (
				'id' => $this->uid . '_download',
				'style' => 'width: 0px; line-height:0px; height: 0px; border: 0px; padding: 0px; margin: 0px; display:none;'
		) ) );

		if (! empty ( $this->primaryKeys ) && (strtolower ( $this->action ) != 'copy' && strtolower ( $this->action ) != 'copy_confirm')) {
			foreach ( $this->primaryKeys as $k3 => $v3 ) {
				foreach ( $v3 as $v4 ) {
					$form->addChildren ( new InputHiddenTag ( array (
							'name' => $this->uid . '.' . $k3 . '.' . $v4
					) ) );
				}
			}
		}

		$fieldset = new HtmlTag ( 'fieldset' );
		$script = "<script>
		var uid = '" . $this->uid . "';
		</script>";
		$fieldset->addChildren ( new PlanText ( $script ) );

		$fieldset->addChildren ( new HtmlTag ( 'h2', array (), $this->tableAlias ) );
		$fieldset->addChildren ( new PlanText ("<hr style='margin-top:10px;'/>") );

		$form->addChildren ( $fieldset );
		if (! empty ( $this->errors )) {
			$divError = new HtmlTag ( 'div', array (
					'class' => 'alert alert-error'
			) );
			foreach ( $this->errors as $e ) {
				foreach ( $e as $e1 ) {
					$divError->addChildren ( new PlanText ( '<strong>'.lbl_error.'</strong> ' . $e1 . ' <br />' ) );
				}
			}
			$fieldset->addChildren ( $divError );
		}
		foreach ( $this->elements as $field ) {
			if (isset ( $this->disabled [$field] ))
				continue;
			if (isset ( $this->alias [$field] )) {
				$label = $this->alias [$field];
			} else {
				$label = '';
				$tmp = explode ( '.', $field );
				foreach ( $tmp as $t ) {
					$label .= ucfirst ( $t );
				}
			}
			$placeholder = $label;
			if (! empty ( $this->validates [$field] ) && ($this->action == 'form' || $this->action == 'copy')) {
				$label .= " <span style='color:red;'><strong>*</strong></span>";
			}
				
			$type = array (
					'type' => 'text',
					'opts' => array ()
			);
			if (! empty ( $this->types [$field] )) {
				$type = $this->types [$field];
			}
				
			if (isset ( $this->readonly [$field] )) {
				$type ['attr'] ['readonly'] = 'readonly';
				if (($this->action == 'form' || $this->action == 'form_confirm') && ! isset ( $_GET ['key'] ) || $this->action == 'copy' || $this->action == 'copy_confirm') {
					continue;
				}
			}
				
			$err = (isset ( $this->errors [$field] )) ? 'error' : '';
				
			switch ($type ['type']) {
				case 'tag' :
					$type ['attr'] = (isset ( $type ['attr'] ) && is_array ( $type ['attr'] )) ? $type ['attr'] : array ();
					$attr = array_merge ( $type ['attr'], array (
							'name' => $this->uid . '.' . $field,
							'placeholder' => $placeholder
					) );
					$inputText = new InputTag ( $attr, $label, $err );
					$fieldset->addChildren ( $inputText );
					break;
				case 'image' :
					$type ['attr'] = (isset ( $type ['attr'] ) && is_array ( $type ['attr'] )) ? $type ['attr'] : array ();
					$attr = array_merge ( $type ['attr'], array (
							'name' => $this->uid . '.' . $field,
							'placeholder' => $placeholder
					) );
					$file = new InputImage ( $attr, $this->uid, $this->queryString, $type ['path'], $type ['thumbnail'], $type ['width'], $type ['height'], $type ['extensions'], $label, $this->actionKey, $err );
					$fieldset->addChildren ( $file );
					break;
				case 'file' :
					$type ['attr'] = (isset ( $type ['attr'] ) && is_array ( $type ['attr'] )) ? $type ['attr'] : array ();
					$attr = array_merge ( $type ['attr'], array (
							'name' => $this->uid . '.' . $field,
							'placeholder' => $placeholder
					) );
					$file = new InputFile ( $attr, $this->uid, $this->queryString, $type ['path'], $type ['extensions'], $label, $this->actionKey, $err );
					$fieldset->addChildren ( $file );
					break;
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
							'name' => $this->uid . '.' . $field,
							'placeholder' => $placeholder
					) );
						
					$selectbox = new AutoComplete ( $type ['opts'], $attr, $label, $err );
					$fieldset->addChildren ( $selectbox );
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
							'name' => $this->uid . '.' . $field,
							'placeholder' => $placeholder
					) );
						
					$selectbox = new SelectBox ( $type ['opts'], $attr, $label, $err );
					$fieldset->addChildren ( $selectbox );
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
							'name' => $this->uid . '.' . $field,
							'placeholder' => $placeholder
					) );
						
					$checkbox = new InputCheckbox ( $type ['opts'], $attr, $label, $err );
					$fieldset->addChildren ( $checkbox );
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
							'name' => $this->uid . '.' . $field,
							'placeholder' => $placeholder
					) );
						
					$radio = new InputRadio ( $type ['opts'], $attr, $label, $err );
					$fieldset->addChildren ( $radio );
					break;
				case 'time' :
					$type ['attr'] = (isset ( $type ['attr'] ) && is_array ( $type ['attr'] )) ? $type ['attr'] : array ();
					$attr = array_merge ( $type ['attr'], array (
							'name' => $this->uid . '.' . $field,
							'placeholder' => $placeholder
					) );
					$attr ['data-format'] = 'hh:mm:ss';
					$time = new InputTime ( $attr, $label, $err );
					$fieldset->addChildren ( $time );
					break;
				case 'datetime' :
					$type ['attr'] = (isset ( $type ['attr'] ) && is_array ( $type ['attr'] )) ? $type ['attr'] : array ();
					$attr = array_merge ( $type ['attr'], array (
							'name' => $this->uid . '.' . $field,
							'placeholder' => $placeholder
					) );
					if (! isset ( $attr ['data-format'] )) {
						$attr ['data-format'] = 'yyyy-MM-dd hh:mm:ss';
					}
					$datetime = new InputDateTime ( $attr, $label, $err );
					$fieldset->addChildren ( $datetime );
					break;
				case 'date' :
					$type ['attr'] = (isset ( $type ['attr'] ) && is_array ( $type ['attr'] )) ? $type ['attr'] : array ();
					$attr = array_merge ( $type ['attr'], array (
							'name' => $this->uid . '.' . $field,
							'placeholder' => $placeholder
					) );
					if (! isset ( $attr ['data-format'] )) {
						$attr ['data-format'] = 'yyyy-MM-dd';
					}
					$date = new InputDate ( $attr, $label, $err );
					$fieldset->addChildren ( $date );
					break;
				case 'editor' :
					$type ['attr'] = (isset ( $type ['attr'] ) && is_array ( $type ['attr'] )) ? $type ['attr'] : array ();
					$attr = array_merge ( $type ['attr'], array (
							'name' => $this->uid . '.' . $field,
							'placeholder' => $placeholder
					) );
					$editor = new Editor ( $attr, $label,$this->actionKey,$this->editorImageUploadPath,$this->queryString, $err );
					$fieldset->addChildren ( $editor );
					break;
				case 'textarea' :
					$type ['attr'] = (isset ( $type ['attr'] ) && is_array ( $type ['attr'] )) ? $type ['attr'] : array ();
					$attr = array_merge ( $type ['attr'], array (
							'name' => $this->uid . '.' . $field,
							'placeholder' => $placeholder
					) );
					$textarea = new TextArea ( $attr, $label, $err );
					$fieldset->addChildren ( $textarea );
					break;
				case 'text' :
				default :
					$type ['attr'] = (isset ( $type ['attr'] ) && is_array ( $type ['attr'] )) ? $type ['attr'] : array ();
					$attr = array_merge ( $type ['attr'], array (
							'name' => $this->uid . '.' . $field,
							'placeholder' => $placeholder
					) );
					$inputText = new InputText ( $attr, $label, $err );
					$fieldset->addChildren ( $inputText );
					break;
			}
		}

		$controlGroup = new HtmlTag ( 'div', array (
				'class' => 'control-group'
		) );
		$controlGroup->addChildren(new HtmlTag('label',array('class' => 'control-label')));
		$fa = new HtmlTag('div',array('class' => 'controls'));
		$controlGroup->addChildren($fa);
		$queryString = $this->queryString;
		switch ($this->action) {
			case 'copy_confirm' :
			case 'form_confirm' :
				$saveOnclick = "$('#action_type').val('save'); $('#".$this->uid."').submit();";
				$fa->addChildren ( new HtmlTag ( 'a', array (
						'class' => 'btn btn-success',
						'onclick' => $saveOnclick
				), btn_save ) );
				$backOnclick = "$('#action_type').val('back'); $('#".$this->uid."').submit();";
				$fa->addChildren ( new HtmlTag ( 'a', array (
						'class' => 'btn ',
						'onclick' => $backOnclick
				), btn_back ) );
				$fieldset->addChildren ( $controlGroup );
				break;
			case 'view' :
				$queryString [$this->actionKey] = 'index';
				if (isset ( $queryString ['key'] )) {
					unset ( $queryString ['key'] );
				}
				$fa->addChildren ( new HtmlTag ( 'a', array (
						'class' => 'btn ',
						'href' => '?' . http_build_query ( $queryString, '', '&' )
				), btn_cancel ) );
				$fieldset->addChildren ( $controlGroup );
				break;
			case 'delete' :
				$deleteOnclick = "$('#action_type').val('delete'); $('#".$this->uid."').submit();";
				$fa->addChildren ( new HtmlTag ( 'a', array (
						'class' => 'btn btn-danger',
						'onclick' => $deleteOnclick
				), btn_delete ) );
				$queryString [$this->actionKey] = 'index';
				if (isset ( $queryString ['key'] )) {
					unset ( $queryString ['key'] );
				}
				$fa->addChildren ( new HtmlTag ( 'a', array (
						'class' => 'btn ',
						'href' => '?' . http_build_query ( $queryString, '', '&' )
				), btn_cancel ) );
				$fieldset->addChildren ( $controlGroup );
				break;
			case 'form' :
			default :
				$confirmOnclick = "$('#action_type').val('confirm'); $('#".$this->uid."').submit();";
				$fa->addChildren ( new HtmlTag ( 'a', array (
						'class' => 'btn btn-success',
						'onclick' => $confirmOnclick
				), btn_confirm ) );
				$queryString [$this->actionKey] = 'index';
				if (isset ( $queryString ['key'] )) {
					unset ( $queryString ['key'] );
				}
				$fa->addChildren ( new HtmlTag ( 'a', array (
						'class' => 'btn',
						'href' => '?' . http_build_query ( $queryString, '', '&' )
				), btn_cancel ) );
				$fieldset->addChildren ( $controlGroup );
				break;
		}

		$container->addChildren ( $form );

		return $container->toString ();
	}
}

