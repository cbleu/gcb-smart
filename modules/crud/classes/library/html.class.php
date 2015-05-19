<?php
/**** PlanText ******/
class PlanText {
	private $text = '';
	public function __construct($text) {
		$this->text = $text;
	}
	public function toString() {
		return $this->text;
	}
}

/******** HtmlTag *******/
class HtmlTag {
	protected $action = '';
	protected $tag = '';
	protected $childrens = array ();
	protected $attributes = array ();
	protected $value = '';
	public function __construct($tag, $attributes = array(), $value = '') {
		$this->tag = $tag;
		$this->value = $value;
		$this->attributes = $attributes;
	}
	public function addAction($action) {
		$this->action = $action;
	}
	public function addChildren($element) {
		$this->childrens [] = $element;
	}
	public function toString() {
		$html = '<' . $this->tag . $this->attr2str () . '>' . $this->value;
		foreach ( $this->childrens as $child ) {
			if (method_exists ( $child, 'addAction' ) && $this->action != '') {
				$child->addAction ( $this->action );
			}
			switch ($this->action) {
				case 'form_confirm' :
				case 'copy_confirm' :
				case 'view' :
				case 'delete' :
					if (method_exists ( $child, 'toValue' )) {
						$childHtml = $child->toValue ();
					} else {
						$childHtml = $child->toString ();
					}
					break;
				default :
					$childHtml = $child->toString ();
					break;
			}
			$html .= $childHtml . "\n";
		}
		$html .= '</' . $this->tag . '>';
		return $html;
	}
	protected function attr2str() {
		$strAttr = '';

		if (! empty ( $this->attributes )) {
			foreach ( $this->attributes as $k => $v ) {
				$strAttr .= ' ' . htmlspecialchars ( $k ) . '="' . htmlspecialchars ( $v ) . '"';
			}
		}

		return $strAttr;
	}
}

/******* HtmlShortTag ********/

class HtmlShortTag extends HtmlTag {
	protected $name = '';
	protected $id = '';
	public function __construct($tag, $attributes = array()) {
		$this->tag = $tag;
		if (! empty ( $attributes ['name'] )) {
			$this->name = $attributes ['name'];
			$this->id = $attributes ['name'];
			unset ( $attributes ['name'] );

			$f = explode ( '.', trim ( $this->name ) );
			if (count ( $f ) == 1) {
				if (isset ( $_POST [$this->name] )) {
					$this->value = $_POST [$this->name];
				}
			} else if (count ( $f ) > 1) {
				$value = $_POST;
				$this->name = '';
				$this->id = '';
				foreach ( $f as $k => $v ) {
					if ($k == 0) {
						$this->name = $v;
						$this->id = $v;
					} else {
						$this->name .= '[' . $v . ']';
						$this->id .= ucfirst ( $v );
					}
				}
				foreach ( $f as $k => $v ) {
					if (isset ( $value [$v] )) {
						$value = $value [$v];
					} else {
						$value = '';
						break;
					}
				}
				$this->value = $value;
			}
		}
		if (! empty ( $attributes ['id'] )) {
			$this->id = $attributes ['id'];
		}

		$this->attributes = $attributes;
	}
	public function addChildren($element) {
		$this->childrens [] = array ();
	}
	public function getName() {
		return $this->name;
	}
	public function getId() {
		return $this->id;
	}
	public function getValue() {
		if (! empty ( $this->attributes ['value'] ) && $this->value == '') {
			$this->value = $this->attributes ['value'];
		}

		return (! empty ( $this->value )) ? $this->value : '';
	}
	public function toString() {
		if ($this->name != '') {
			$this->name = ' name="' . $this->name . '"';
		}

		if ($this->id != '') {
			$this->id = ' id="' . $this->id . '"';
		}

		if (! empty ( $this->attributes ['value'] ) && $this->value == '') {
			$this->value = $this->attributes ['value'];
		}

		if (! empty ( $this->attributes ['value'] )) {
			unset ( $this->attributes ['value'] );
		}

		if ($this->value != '' && ! is_array ( $this->value )) {
			$this->value = ' value="' . htmlspecialchars ( $this->value ) . '" ';
		}

		$html = '<' . $this->tag . $this->name . $this->id . $this->attr2str () . $this->value . '/>';

		return $html;
	}
}

/******** ValueTag *******/

class ValueTag extends HtmlShortTag {
	private $options = array ();
	private $nl2br = false;
	private $htmlspecialchars = true;
	public function __construct($attributes, $options = array()) {
		$this->options = $options;
		parent::__construct ( '', $attributes );
		if (isset ( $attributes ['data-format'] )) {
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
			), $attributes ['data-format'] );
			$this->value = str2mysqltime ( $this->value, $dataFormat );
		}
	}
	public function nl2br($flg = false) {
		$this->nl2br = $flg;
	}
	public function htmlspecialchars($flg = true) {
		$this->htmlspecialchars = $flg;
	}
	public function getValue() {
		if (! empty ( $this->attributes ['value'] ) && $this->value == '') {
			$this->value = $this->attributes ['value'];
		}

		if (count ( $this->options ) > 0) {
			if (! is_array ( $this->value ) && strpos ( $this->value, ',' ) !== false) {
				$this->value = explode ( ',', $this->value );
			}
		}
		if (! empty ( $this->options )) {
			if (! is_array ( $this->value ) && isset ( $this->options [$this->value] )) {
				$this->value = $this->options [$this->value];
			} else {
				if (is_array ( $this->value )) {
					foreach ( $this->value as $k => $v ) {
						if (! is_array ( $v ) && isset ( $this->options [$v] )) {
							$this->value [$k] = $this->options [$v];
						}
					}
				}
			}
		}

		if (is_array ( $this->value )) {
			$this->value = implode ( ',', $this->value );
		}

		if ($this->htmlspecialchars == true) {
			$this->value = htmlspecialchars ( $this->value );
		}

		if ($this->nl2br == true) {
			$this->value = nl2br ( $this->value );
		}

		return (! empty ( $this->value )) ? $this->value : '';
	}
	public function toString() {
		if (count ( $this->options ) > 0) {
			if (! is_array ( $this->value ) && strpos ( $this->value, ',' ) !== false) {
				$this->value = explode ( ',', $this->value );
			}
		}
		if (! empty ( $this->options )) {
			if (! is_array ( $this->value ) && isset ( $this->options [$this->value] )) {
				$this->value = $this->options [$this->value];
			} else {
				if (is_array ( $this->value )) {
					foreach ( $this->value as $k => $v ) {
						if (! is_array ( $v ) && isset ( $this->options [$v] )) {
							$this->value [$k] = $this->options [$v];
						}
					}
				}
			}
		}

		if (is_array ( $this->value )) {
			$this->value = implode ( ',', $this->value );
		}

		if ($this->htmlspecialchars == true) {
			$this->value = htmlspecialchars ( $this->value );
		}

		if ($this->nl2br == true) {
			$this->value = nl2br ( $this->value );
		}

		$lable = new HtmlTag ( 'lable', array (
				'style' => 'padding-top:5px; display:block;'
		), $this->value );

		return $lable->toString ();
	}
}

/********* TextAreaTag *******/

class TextAreaTag extends HtmlShortTag {
	public function __construct($attributes) {
		parent::__construct ( 'textarea', $attributes );
	}
	public function toString() {
		if ($this->name != '') {
			$this->name = ' name="' . $this->name . '"';
		}

		if ($this->id != '') {
			$this->id = ' id="' . $this->id . '"';
		}

		if (! empty ( $this->attributes ['value'] ) && $this->value == '') {
			$this->value = $this->attributes ['value'];
		}

		if (! empty ( $this->attributes ['value'] )) {
			unset ( $this->attributes ['value'] );
		}

		$html = '<' . $this->tag . $this->id . $this->name . $this->attr2str () . '>' . $this->value;

		foreach ( $this->childrens as $child ) {
			$childHtml = $child->toString ();
			$html .= $childHtml . "\n";
		}

		$html .= '</' . $this->tag . '>';
		return $html;
	}
}

/****** SelectboxOptionTag ********/

class SelectboxOptionTag extends HtmlTag {
	private $label;
	protected $name;
	protected $id;
	protected $default = null;
	public function __construct($key, $label, $value, $default = null) {
		if (empty($label)){
			$label = '&nbsp;';
		}
		$this->label = $label;
		$this->default = $default;
		parent::__construct ( 'option', array (
				'value' => $key
		), $value );
	}
	public function toString() {
		if ($this->name != '') {
			$this->name = ' name="' . $this->name . '"';
		}

		if ($this->id != '') {
			$this->id = ' id="' . $this->id . '"';
		}

		if (! is_array ( $this->value ) && strpos ( $this->value, ',' ) !== false) {
			$this->value = explode ( ',', $this->value );
		}

		if (empty ( $_POST )) {
			if (! empty ( $this->default )) {
				if (! is_array ( $this->default )) {
					$this->default = explode ( ',', $this->default );
				}
				if (is_array ( $this->default )) {
					if (in_array ( $this->attributes ['value'], $this->default )) {
						$this->attributes ['selected'] = 'selected';
					}
				} else {
					if ($this->attributes ['value'] == $this->default) {
						$this->attributes ['selected'] = 'selected';
					}
				}
			}
		} else {
			if (! empty ( $this->value )) {
				if (is_array ( $this->value )) {
					if (in_array ( $this->attributes ['value'], $this->value )) {
						$this->attributes ['selected'] = 'selected';
					}
				} else {
					if ($this->value == $this->attributes ['value']) {
						$this->attributes ['selected'] = 'selected';
					}
				}
			}
		}

		$html = '<' . $this->tag . $this->id . $this->attr2str () . '>' . $this->label;
		$html .= '</' . $this->tag . '>';
		return $html;
	}
}

/********* SelectBoxTag ******/

class SelectBoxTag extends HtmlShortTag {
	protected $name;
	protected $id;
	public function __construct($options, $attributes) {
		if (count ( $_POST ) > 0) {
			unset ( $attributes ['value'] );
		}
		$default = null;
		if (isset ( $attributes ['value'] )) {
			$default = $attributes ['value'];
			unset ( $attributes ['value'] );
		}
		parent::__construct ( 'select', $attributes );
		if (is_array ( $options )) {
			foreach ( $options as $k => $v ) {
				$option = new SelectboxOptionTag ( $k, $v, $this->value, $default );
				$this->addChildren ( $option );
			}
		}
	}
	public function addChildren($element) {
		$this->childrens [] = $element;
	}
	public function toString() {
		if ($this->name != '') {
			if (! empty ( $this->attributes ['multiple'] )) {
				$this->name = ' name="' . $this->name . '[]"';
			} else {
				$this->name = ' name="' . $this->name . '"';
			}
		}

		if ($this->id != '') {
			$this->id = ' id="' . $this->id . '"';
		}

		$html = '<' . $this->tag . $this->name . $this->id . $this->attr2str () . '>';

		foreach ( $this->childrens as $child ) {
			$childHtml = $child->toString ();
			$html .= $childHtml . "\n";
		}

		$html .= '</' . $this->tag . '>';
		return $html;
	}
}

/******* InputTextTag ******/

class InputTextTag extends HtmlShortTag {
	public function __construct($attributes) {
		$attributes ['type'] = 'text';
		if (isset ( $attributes ['data-format'] ) && isset ( $attributes ['value'] )) {
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
			), $attributes ['data-format'] );
			$attributes ['value'] = str2mysqltime ( $attributes ['value'], $dataFormat );
		}
		parent::__construct ( 'input', $attributes );
		if (isset ( $attributes ['data-format'] )) {
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
			), $attributes ['data-format'] );
			if (!empty($this->value)){
				$this->value = str2mysqltime ( $this->value, $dataFormat );
			}
		}
	}
}

/******* InputSubmitTag *******/

class InputSubmitTag extends HtmlShortTag {
	public function __construct($attributes) {
		$attributes ['type'] = 'submit';
		parent::__construct ( 'input', $attributes );
	}
}

/****** InputResetTag *******/

class InputResetTag extends HtmlShortTag {
	public function __construct($attributes) {
		$attributes ['type'] = 'reset';
		parent::__construct ( 'input', $attributes );
	}
}

/******* InputRadioTag *******/

class InputRadioTag extends HtmlShortTag {
	public function __construct($attributes) {
		$attributes ['type'] = 'radio';
		parent::__construct ( 'input', $attributes );
	}
	public function toString() {
		if ($this->name != '') {
			$this->name = ' name="' . $this->name . '"';
		}

		if ($this->id != '') {
			$this->id = ' id="' . $this->id . '"';
		}

		if (! empty ( $this->attributes ['checked'] ) && ! empty ( $_POST )) {
			unset ( $this->attributes ['checked'] );
		}

		if ($this->value == $this->attributes ['value'] && $this->value != null) {
			$this->attributes ['checked'] = 'checked';
		}
		if ($this->value != '') {
			$this->value = ' value="' . htmlspecialchars ( $this->value ) . '" ';
		}
		$html = '<' . $this->tag . $this->name . $this->id . $this->attr2str () . '/>';

		return $html;
	}
}

/******** InputPasswordTag ******/

class InputPasswordTag extends HtmlShortTag {
	public function __construct($attributes) {
		$attributes ['type'] = 'password';
		parent::__construct ( 'input', $attributes );
	}
}

/******* InputHiddenTag ********/

class InputHiddenTag extends HtmlShortTag {
	public function __construct($attributes) {
		$attributes ['type'] = 'hidden';
		parent::__construct ( 'input', $attributes );
	}
	public function toString() {
		if (is_array ( $this->value ) && count ( $this->value ) > 0) {
			$this->name .= "[]";
		}
		if ($this->name != '') {
			$this->name = ' name="' . $this->name . '"';
		}

		if ($this->id != '') {
			$this->id = ' id="' . $this->id . '"';
		}

		if (! empty ( $this->attributes ['value'] ) && $this->value == '') {
			$this->value = $this->attributes ['value'];
		}

		if (! empty ( $this->attributes ['value'] )) {
			unset ( $this->attributes ['value'] );
		}

		if ($this->value != '' && ! is_array ( $this->value )) {
			$this->value = ' value="' . htmlspecialchars ( $this->value ) . '" ';
			$html = '<' . $this->tag . $this->name . $this->id . $this->attr2str () . $this->value . '/>';
		} else if (is_array ( $this->value ) && count ( $this->value ) > 0) {
			$html = '';
			foreach ( $this->value as $v ) {
				$v = ' value="' . htmlspecialchars ( $v ) . '" ';
				$html .= '<' . $this->tag . $this->name . $this->id . $this->attr2str () . $v . '/>' . "\n";
			}
		} else {
			$html = '<' . $this->tag . $this->name . $this->id . $this->attr2str () . '/>';
		}

		return $html;
	}
}

/****** InputFileTag *********/

class InputFileTag extends HtmlShortTag {
	public function __construct($attributes) {
		$attributes ['type'] = 'file';
		parent::__construct ( 'input', $attributes );
	}
}

/******** InputCheckboxTag ******/

class InputCheckboxTag extends HtmlShortTag {
	private $multiple = false;
	public function __construct($attributes, $multiple = false) {
		$attributes ['type'] = 'checkbox';
		$this->multiple = $multiple;
		parent::__construct ( 'input', $attributes );
	}
	public function toString() {
		if ($this->name != '') {
			if ($this->multiple == false) {
				$this->name = ' name="' . $this->name . '"';
			} else {
				$this->name = ' name="' . $this->name . '[]"';
			}
		}

		if ($this->id != '') {
			$this->id = ' id="' . $this->id . '"';
		}

		if (! is_array ( $this->value ) && strpos ( $this->value, ',' ) !== false) {
			$this->value = explode ( ',', $this->value );
		}

		if (! empty ( $_POST )) {
			if (is_array ( $this->value )) {
				if (in_array ( $this->attributes ['value'], $this->value )) {
					$this->attributes ['checked'] = 'checked';
				}
			} else {
				if ($this->attributes ['value'] == $this->value && $this->value != null) {
					$this->attributes ['checked'] = 'checked';
				}
			}
		}

		$html = '<' . $this->tag . $this->name . $this->id . $this->attr2str () . '/>';

		return $html;
	}
}

/***** InputButtonTag ******/

class InputButtonTag extends HtmlShortTag {
	public function __construct($attributes) {
		$attributes ['type'] = 'button';
		parent::__construct ( 'input', $attributes );
	}
}