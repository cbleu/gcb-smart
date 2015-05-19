<?php

/***** Container ******/

class Container extends HtmlTag {
	public function __construct() {
		parent::__construct ( 'div', array (
				'class' => 'container well'
		) );
	}
}

/******** AutoComplete *******/

class AutoComplete {
	private $options = array ();
	private $attributes = array ();
	private $label = '';
	private $type = '';
	public function __construct($options, $attributes, $label, $type = '') {
		$this->options = $options;
		$this->attributes = $attributes;
		if (! empty ( $this->attributes ['style'] )) {
			$this->attributes ['style'] .= ' width: 220px;';
		} else {
			$this->attributes ['style'] = ' width: 220px;';
		}
		$this->label = $label;
	}
	public function toString() {
		if (isset($this->attributes['readonly']) && ($this->attributes['readonly'] == 'readonly' || $this->attributes['readonly'] === true)){
			return $this->toValue();
		}
		$cg = new HtmlTag ( 'div', array (
				'class' => 'control-group'
		) );
		$c = new HtmlTag ( 'div', array (
				'class' => 'controls'
		) );
		$l = new HtmlTag ( 'label', array (
				'class' => 'control-label'
		), $this->label );
		$cg->addChildren ( $l );
		$autocomplete = new SelectBoxTag ( $this->options, $this->attributes );
		$c->addChildren ( $autocomplete );
		$script = "
		<script>
		$(document).ready(function() { $('#" . $autocomplete->getId () . "').select2(); });
		</script>
		";
		$c->addChildren ( new PlanText ( $script ) );
		$cg->addChildren ( $c );

		return $cg->toString ();
	}
	public function toValue() {
		$cg = new HtmlTag ( 'div', array (
				'class' => 'control-group'
		) );
		$c = new HtmlTag ( 'div', array (
				'class' => 'controls'
		) );
		$value = new ValueTag ( $this->attributes, $this->options );
		$value->nl2br ( true );
		$hidden = new InputHiddenTag ( $this->attributes );
		$c->addChildren ( $hidden );
		$l = new HtmlTag ( 'label', array (
				'class' => 'control-label'
		), $this->label );
		$cg->addChildren ( $l );
		$c->addChildren ( $value );
		$cg->addChildren ( $c );

		return $cg->toString ();
	}
}

/******** Editor *******/

class Editor {
	private $attributes = array ();
	private $label = '';
	private $type = '';
	private $queryString = array();
	private $actionKey;
	private $editorImageUploadPath = array();
	
	public function __construct($attributes, $label,$actionKey,$editorImageUploadPath,$queryString = array(), $type = '') {
		if (count ( $_POST ) > 0) {
			unset ( $attributes ['value'] );
		}
		$this->attributes = $attributes;
		$this->label = $label;
		$this->type = $type;
		$this->actionKey = $actionKey;
		$this->editorImageUploadPath = $editorImageUploadPath;
		$this->queryString = $queryString;
	}
	public function toString() {
		$cg = new HtmlTag ( 'div', array (
				'class' => 'control-group '.$this->type
		) );
		$c = new HtmlTag ( 'div', array (
				'class' => 'controls'
		) );
		$text = new TextAreaTag ( $this->attributes );
		$l = new HtmlTag ( 'label', array (
				'class' => 'control-label',
				'for' => $text->getId ()
		), $this->label );
		$cg->addChildren ( $l );
		$c->addChildren ( $text );
		$attr = array ();
		if (isset ( $this->attributes ['width'] )) {
			$attr [] = 'width:"' . $this->attributes ['width'] . '"';
		}
		if (isset ( $this->attributes ['height'] )) {
			$attr [] = 'height:"' . $this->attributes ['height'] . '"';
		}
		
		$queryString = $this->queryString;
		$queryString [$this->actionKey] = 'editorImageUpload';
		
		if (isset($this->editorImageUploadPath['real']) &&
			isset($this->editorImageUploadPath['public'])){
			$attr[] = 'filebrowserImageUploadUrl:"'.'?' . http_build_query ( $queryString, '', '&' ).'"';
		}

		$str = '
		<script>
		CKEDITOR.replace("' . $text->getId () . '",{' . implode ( ',', $attr ) . '});
		</script>
		';
		$script = new PlanText ( $str );
		$c->addChildren ( $script );
		$cg->addChildren ( $c );

		return $cg->toString ();
	}
	public function toValue() {
		$cg = new HtmlTag ( 'div', array (
				'class' => 'control-group'
		) );
		$c = new HtmlTag ( 'div', array (
				'class' => 'controls'
		) );
		$value = new ValueTag ( $this->attributes );
		$value->nl2br ( false );
		$value->htmlspecialchars ( false );
		$hidden = new InputHiddenTag ( $this->attributes );
		$c->addChildren ( $hidden );
		$l = new HtmlTag ( 'label', array (
				'class' => 'control-label'
		), $this->label );
		$cg->addChildren ( $l );
		$c->addChildren ( $value );
		$cg->addChildren ( $c );

		return $cg->toString ();
	}
}

/******* InputCheckbox *********/

class InputCheckbox {
	private $options = array ();
	private $attributes = array ();
	private $label = '';
	private $type = '';
	public function __construct($options, $attributes = array(), $label = '', $type = '') {
		if (count ( $_POST ) > 0) {
			unset ( $attributes ['value'] );
		} else {
			if (isset($attributes ['value']) && ! is_array ( $attributes ['value'] ) && strpos ( $attributes ['value'], ',' ) !== false) {
				$attributes ['value'] = explode ( ',', $attributes ['value'] );
			}
		}
		$this->options = $options;
		$this->attributes = $attributes;
		$this->label = $label;
		$this->type = $type;
	}
	public function toString() {
		if (isset($this->attributes['readonly']) && ($this->attributes['readonly'] == 'readonly' || $this->attributes['readonly'] === true)){
			return $this->toValue();
		}
		$cg = new HtmlTag ( 'div', array (
				'class' => 'control-group '.$this->type
		) );
		$c = new HtmlTag ( 'div', array (
				'class' => 'controls'
		) );
		$l = new HtmlTag ( 'label', array (
				'class' => 'control-label'
		), $this->label );
		$cg->addChildren ( $l );

		if (! empty ( $this->options )) {
			foreach ( $this->options as $k => $v ) {
				$attributes = $this->attributes;
				if (isset ( $attributes ['value'] ) && in_array ( $k, $attributes ['value'] )) {
					$attributes ['checked'] = 'checked';
				}
				$attributes ['value'] = $k;
				$radio = new HtmlTag ( 'label', array (
						'class' => 'checkbox inline'
				) );
				$radio->addChildren ( new InputCheckboxTag ( $attributes, true ) );
				$radio->addChildren ( new PlanText ( $v ) );
				$c->addChildren ( $radio );
			}
		}

		$cg->addChildren ( $c );

		return $cg->toString ();
	}
	public function toValue() {
		$cg = new HtmlTag ( 'div', array (
				'class' => 'control-group'
		) );
		$c = new HtmlTag ( 'div', array (
				'class' => 'controls'
		) );
		$value = new ValueTag ( $this->attributes, $this->options );
		$value->nl2br ( true );
		$hidden = new InputHiddenTag ( $this->attributes );
		$c->addChildren ( $hidden );
		$l = new HtmlTag ( 'label', array (
				'class' => 'control-label'
		), $this->label );
		$cg->addChildren ( $l );
		$c->addChildren ( $value );
		$cg->addChildren ( $c );

		return $cg->toString ();
	}
}

/******* InputDate ******/

class InputDate {
	private $attributes = array ();
	private $label = '';
	private $type = '';
	public function __construct($attributes, $label, $type = '') {
		if (count ( $_POST ) > 0) {
			unset ( $attributes ['value'] );
		}
		$this->attributes = $attributes;
		$this->label = $label;
		$this->type = $type;
	}
	public function toString() {
		if (isset($this->attributes['readonly']) && ($this->attributes['readonly'] == 'readonly' || $this->attributes['readonly'] === true)){
			return $this->toValue();
		}
		$cg = new HtmlTag ( 'div', array (
				'class' => 'control-group '.$this->type
		) );
		$c = new HtmlTag ( 'div', array (
				'class' => 'controls'
		) );
		$text_date = new InputTextTag ( $this->attributes );
		$l = new HtmlTag ( 'label', array (
				'class' => 'control-label',
				'for' => $text_date->getId ()
		), $this->label );
		$cg->addChildren ( $l );

		$date = new HtmlTag ( 'div', array (
				'class' => 'input-append',
				'id' => 'datepicker_' . $text_date->getId ()
		) );
		$icon = new HtmlTag ( 'span', array (
				'class' => 'add-on'
		) );
		$icon->addChildren ( new HtmlTag ( 'i', array (
				'data-date-icon' => 'icon-calendar',
				'data-time-icon' => 'icon-time'
		) ) );

		$date->addChildren ( $text_date );
		$date->addChildren ( $icon );

		$c->addChildren ( $date );

		$str = '

		<script>
		$(function() {
		$("#datepicker_' . $text_date->getId () . '").datetimepicker({
		pickTime: false
	});
	});
	</script>

	';
		$script = new PlanText ( $str );
		$c->addChildren ( $script );

		$cg->addChildren ( $c );

		return $cg->toString ();
	}
	public function toValue() {
		$cg = new HtmlTag ( 'div', array (
				'class' => 'control-group'
		) );
		$c = new HtmlTag ( 'div', array (
				'class' => 'controls'
		) );
		$value = new ValueTag ( $this->attributes );
		$value->nl2br ( true );
		$hidden = new InputHiddenTag ( $this->attributes );
		$c->addChildren ( $hidden );
		$l = new HtmlTag ( 'label', array (
				'class' => 'control-label'
		), $this->label );
		$cg->addChildren ( $l );
		$c->addChildren ( $value );
		$cg->addChildren ( $c );

		return $cg->toString ();
	}
}

/******** InputDateTime ******/

class InputDateTime {
	private $attributes = array ();
	private $label = '';
	private $type = '';
	public function __construct($attributes, $label, $type = '') {
		if (count ( $_POST ) > 0) {
			unset ( $attributes ['value'] );
		}
		$this->attributes = $attributes;
		$this->label = $label;
		$this->type = $type;
	}
	public function toString() {
		if (isset($this->attributes['readonly']) && ($this->attributes['readonly'] == 'readonly' || $this->attributes['readonly'] === true)){
			return $this->toValue();
		}
		$cg = new HtmlTag ( 'div', array (
				'class' => 'control-group '.$this->type
		) );
		$c = new HtmlTag ( 'div', array (
				'class' => 'controls'
		) );
		$text_datetime = new InputTextTag ( $this->attributes );
		$l = new HtmlTag ( 'label', array (
				'class' => 'control-label',
				'for' => $text_datetime->getId ()
		), $this->label );
		$cg->addChildren ( $l );

		$datetime = new HtmlTag ( 'div', array (
				'class' => 'input-append',
				'id' => 'datetimepicker_' . $text_datetime->getId ()
		) );
		$icon = new HtmlTag ( 'span', array (
				'class' => 'add-on'
		) );
		$icon->addChildren ( new HtmlTag ( 'i', array (
				'data-date-icon' => 'icon-calendar',
				'data-time-icon' => 'icon-time'
		) ) );

		$datetime->addChildren ( $text_datetime );
		$datetime->addChildren ( $icon );

		$c->addChildren ( $datetime );

		$str = '

		<script>
		$(function() {
		$("#datetimepicker_' . $text_datetime->getId () . '").datetimepicker({});
	});
	</script>

	';
		$script = new PlanText ( $str );
		$c->addChildren ( $script );

		$cg->addChildren ( $c );

		return $cg->toString ();
	}
	public function toValue() {
		$cg = new HtmlTag ( 'div', array (
				'class' => 'control-group'
		) );
		$c = new HtmlTag ( 'div', array (
				'class' => 'controls'
		) );
		$value = new ValueTag ( $this->attributes );
		$value->nl2br ( true );
		$hidden = new InputHiddenTag ( $this->attributes );
		$c->addChildren ( $hidden );
		$l = new HtmlTag ( 'label', array (
				'class' => 'control-label'
		), $this->label );
		$cg->addChildren ( $l );
		$c->addChildren ( $value );
		$cg->addChildren ( $c );

		return $cg->toString ();
	}
}


/******** InputFile *******/

class InputFile {
	private $attributes = array ();
	private $label = '';
	private $type = '';
	private $path;
	private $uid;
	private $queryString;
	private $extensions;
	private $actionKey;
	public function __construct($attributes, $uid, $queryString, $path, $extensions, $label,$actionKey, $type = '') {
		if (isset ( $attributes ['value'] )) {
			unset ( $attributes ['value'] );
		}
		$this->attributes = $attributes;
		$this->label = $label;
		$this->path = $path;
		$this->uid = $uid;
		$this->queryString = $queryString;
		$this->extensions = $extensions;
		$this->type = $type;
		$this->actionKey = $actionKey;
	}
	public function toString() {
		if (isset($this->attributes['readonly']) && ($this->attributes['readonly'] == 'readonly' || $this->attributes['readonly'] === true)){
			return $this->toValue();
		}
		$cg = new HtmlTag ( 'div', array (
				'class' => 'control-group '.$this->type
		) );
		$c = new HtmlTag ( 'div', array (
				'class' => 'controls'
		) );
		$this->attributes ['style'] = 'display:none;';
		$hidden = new InputHiddenTag ( array_merge ( $this->attributes, array (
				'id' => 'file'
		) ) );
		$file = new InputFileTag ( $this->attributes );
		$l = new HtmlTag ( 'label', array (
				'class' => 'control-label',
				'for' => $file->getId ()
		), $this->label );
		$cg->addChildren ( $l );
		$c->addChildren ( $hidden );
		if (trim ( $hidden->getValue () ) == '') {
			$c->addChildren ( $file );
			$text = new InputTextTag ( array (
					'class' => 'input disabled',
					'value' => $hidden->getValue (),
					'readonly' => 'readonly',
					'id' => 'text_file_' . $file->getId ()
			) );
			$c->addChildren ( $text );
			$btn = new InputButtonTag ( array (
					'value' => 'Choose...',
					'class' => 'btn',
					'id' => 'btn_file_' . $file->getId ()
			) );
			$c->addChildren ( $btn );
			$str = '

			<script>
			$("#btn_file_' . $file->getId () . '").click(function(){
			$("#' . $file->getId () . '").trigger("click");
		});
		$("#' . $file->getId () . '").change(function(){
		$("#text_file_' . $file->getId () . '").val($(this).val());
		});
		</script>

		';
			$script = new PlanText ( $str );
			$c->addChildren ( $script );
		} else {
			$value = new ValueTag ( $this->attributes );
			$queryString = $this->queryString;
			$queryString [$this->actionKey] = 'download';
			$queryString ['name'] = $this->attributes ['name'];
			$queryString ['value'] = base64_encode ( $hidden->getValue () );
			$onclickDownload = "$('#" . $this->uid . "_download').attr({src: '?" . http_build_query ( $queryString, '', '&' ) . "'}); return false;";
			$downloadLink = new HtmlTag ( 'a', array (
					'href' => '?' . http_build_query ( $queryString, '', '&' ),
					'onclick' => $onclickDownload
			), $value->getValue () );

			$c->addChildren ( $downloadLink );
			$queryString [$this->actionKey] = 'delfile';
			$deleteLink = new HtmlTag ( 'a', array (
					'class' => 'btn btn-danger',
					'href' => '?' . http_build_query ( $queryString, '', '&' ),
					'onclick' => 'if (!confirm("Are you sure to delete?")){ return false;};'
			), 'Delete' );
			$c->addChildren ( $deleteLink );
		}

		$cg->addChildren ( $c );

		return $cg->toString ();
	}
	public function toValue() {
		$cg = new HtmlTag ( 'div', array (
				'class' => 'control-group'
		) );
		$c = new HtmlTag ( 'div', array (
				'class' => 'controls'
		) );
		$value = new ValueTag ( $this->attributes );
		$hidden = new InputHiddenTag ( $this->attributes );
		$c->addChildren ( $hidden );
		$l = new HtmlTag ( 'label', array (
				'class' => 'control-label'
		), $this->label );
		$cg->addChildren ( $l );

		if (file_exists ( $this->path . '/' . $hidden->getValue () ) && is_file ( $this->path . '/' . $hidden->getValue () )) {
			$queryString = $this->queryString;
			$queryString [$this->actionKey] = 'download';
			$queryString ['name'] = $this->attributes ['name'];
			$queryString ['value'] = base64_encode ( $hidden->getValue () );
			$onclickDownload = "$('#" . $this->uid . "_download').attr({src: '?" . http_build_query ( $queryString, '', '&' ) . "'}); return false;";
			$linkDownload = new HtmlTag ( 'a', array (
					'href' => '?' . http_build_query ( $queryString, '', '&' ),
					'onclick' => $onclickDownload
			), $value->getValue () );
			$c->addChildren ( $linkDownload );
		}
		$cg->addChildren ( $c );

		return $cg->toString ();
	}
}

/********* InputImage **********/

class InputImage {
	private $attributes = array ();
	private $label = '';
	private $type = '';
	private $path;
	private $uid;
	private $queryString;
	private $extensions;
	private $thumbnail;
	private $width;
	private $height;
	private $actionKey;
	public function __construct($attributes, $uid, $queryString, $path, $thumbnail, $width, $height, $extensions, $label,$actionKey, $type = '') {
		if (isset ( $attributes ['value'] )) {
			unset ( $attributes ['value'] );
		}
		$this->attributes = $attributes;
		$this->label = $label;
		$this->path = $path;
		$this->uid = $uid;
		$this->queryString = $queryString;
		$this->extensions = $extensions;
		$this->thumbnail = $thumbnail;
		$this->width = $width;
		$this->height = $height;
		$this->type = $type;
		$this->actionKey = $actionKey;
	}
	public function toString() {
		if (isset($this->attributes['readonly']) && ($this->attributes['readonly'] == 'readonly' || $this->attributes['readonly'] === true)){
			return $this->toValue();
		}
		$cg = new HtmlTag ( 'div', array (
				'class' => 'control-group ' . $this->type
		) );
		$c = new HtmlTag ( 'div', array (
				'class' => 'controls'
		) );
		$this->attributes ['style'] = 'display:none;';
		$hidden = new InputHiddenTag ( array_merge ( $this->attributes, array (
				'id' => 'file'
		) ) );
		$file = new InputFileTag ( $this->attributes );
		$l = new HtmlTag ( 'label', array (
				'class' => 'control-label',
				'for' => $file->getId ()
		), $this->label );
		$cg->addChildren ( $l );
		$c->addChildren ( $hidden );
		if (trim ( $hidden->getValue () ) == '') {
			$c->addChildren ( $file );
			$text = new InputTextTag ( array (
					'class' => 'input disabled',
					'value' => $hidden->getValue (),
					'readonly' => 'readonly',
					'id' => 'text_file_' . $file->getId ()
			) );
			$c->addChildren ( $text );
			$btn = new InputButtonTag ( array (
					'value' => 'Choose...',
					'class' => 'btn',
					'id' => 'btn_file_' . $file->getId ()
			) );
			$c->addChildren ( $btn );
			$str = '

			<script>
			$("#btn_file_' . $file->getId () . '").click(function(){
			$("#' . $file->getId () . '").trigger("click");
		});
		$("#' . $file->getId () . '").change(function(){
		$("#text_file_' . $file->getId () . '").val($(this).val());
		});
		</script>

		';
			$script = new PlanText ( $str );
			$c->addChildren ( $script );
		} else {
			$queryString = $this->queryString;
			$queryString [$this->actionKey] = 'image';
			$queryString ['thumbnail'] = '1';
			$queryString ['name'] = $this->attributes ['name'];
			$queryString ['value'] = base64_encode ( $hidden->getValue () );
			$image = new HtmlShortTag ( 'img', array (
					'src' => '?' . http_build_query ( $queryString, '', '&' )
			) );
			$queryString ['thumbnail'] = '0';
			$a = new HtmlTag ( 'a', array (
					'id' => 'fancybox-' . $file->getId (),
					'style' => 'cursor:pointer;',
					'href' => '?' . http_build_query ( $queryString, '', '&' ).'&file.jpg'
			) );
			$a->addChildren ( $image );
			$c->addChildren ( $a );

			$queryString [$this->actionKey] = 'delfile';
			$deleteLink = new HtmlTag ( 'a', array (
					'class' => 'btn btn-danger',
					'href' => '?' . http_build_query ( $queryString, '', '&' ),
					'onclick' => 'if (!confirm("Are you sure to delete?")){ return false;};'
			), 'Delete' );
			$c->addChildren ( $deleteLink );
		}
		$script = "
		<script>
		$('#fancybox-" . $file->getId () . "').fancybox({
		'overlayShow'	: false,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic'
	});
	</script>
	";
		$c->addChildren ( new PlanText ( $script ) );
		$cg->addChildren ( $c );

		return $cg->toString ();
	}
	public function toValue() {
		$cg = new HtmlTag ( 'div', array (
				'class' => 'control-group'
		) );
		$c = new HtmlTag ( 'div', array (
				'class' => 'controls'
		) );
		$value = new ValueTag ( $this->attributes );
		$hidden = new InputHiddenTag ( $this->attributes );
		$c->addChildren ( $hidden );
		$l = new HtmlTag ( 'label', array (
				'class' => 'control-label'
		), $this->label );
		$cg->addChildren ( $l );

		if (file_exists ( $this->path . '/' . $hidden->getValue () ) && is_file ( $this->path . '/' . $hidden->getValue () )) {
			$queryString = $this->queryString;
			$queryString [$this->actionKey] = 'image';
			$queryString ['thumbnail'] = '1';
			$queryString ['name'] = $this->attributes ['name'];
			$queryString ['value'] = base64_encode ( $hidden->getValue () );
			$image = new HtmlShortTag ( 'img', array (
					'src' => '?' . http_build_query ( $queryString, '', '&' )
			) );
			$queryString ['thumbnail'] = '0';
			$a = new HtmlTag ( 'a', array (
					'id' => 'fancybox-' . $hidden->getId (),
					'style' => 'cursor:pointer;',
					'href' => '?' . http_build_query ( $queryString, '', '&' ).'&file.jpg'
			) );
			$a->addChildren ( $image );
			$c->addChildren ( $a );
		}
		$script = "
		<script>
		$('#fancybox-" . $hidden->getId () . "').fancybox({
		'overlayShow'	: false,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic'
	});
	</script>
	";
		$c->addChildren ( new PlanText ( $script ) );
		$cg->addChildren ( $c );

		return $cg->toString ();
	}
}

/****** InputRadio *******/

class InputRadio {
	private $options = array ();
	private $attributes = array ();
	private $label = '';
	private $type = '';
	public function __construct($options, $attributes = array(), $label = '', $type = '') {
		if (count ( $_POST ) > 0) {
			unset ( $attributes ['value'] );
		}
		$this->options = $options;
		$this->attributes = $attributes;
		$this->label = $label;
		$this->type = $type;
	}
	public function toString() {
		if (isset($this->attributes['readonly']) && ($this->attributes['readonly'] == 'readonly' || $this->attributes['readonly'] === true)){
			return $this->toValue();
		}
		$cg = new HtmlTag ( 'div', array (
				'class' => 'control-group '.$this->type
		) );
		$c = new HtmlTag ( 'div', array (
				'class' => 'controls'
		) );
		$l = new HtmlTag ( 'label', array (
				'class' => 'control-label'
		), $this->label );
		$cg->addChildren ( $l );

		if (! empty ( $this->options )) {
			foreach ( $this->options as $k => $v ) {
				$attributes = $this->attributes;
				if (isset ( $attributes ['value'] ) && $attributes ['value'] == $k) {
					$attributes ['checked'] = 'checked';
				}
				$attributes ['value'] = $k;
				$radio = new HtmlTag ( 'label', array (
						'class' => 'radio inline'
				) );
				$radio->addChildren ( new InputRadioTag ( $attributes ) );
				$radio->addChildren ( new PlanText ( $v ) );
				$c->addChildren ( $radio );
			}
		}

		$cg->addChildren ( $c );

		return $cg->toString ();
	}
	public function toValue() {
		$cg = new HtmlTag ( 'div', array (
				'class' => 'control-group'
		) );
		$c = new HtmlTag ( 'div', array (
				'class' => 'controls'
		) );
		$value = new ValueTag ( $this->attributes, $this->options );
		$value->nl2br ( true );
		$hidden = new InputHiddenTag ( $this->attributes );
		$c->addChildren ( $hidden );
		$l = new HtmlTag ( 'label', array (
				'class' => 'control-label'
		), $this->label );
		$cg->addChildren ( $l );
		$c->addChildren ( $value );
		$cg->addChildren ( $c );

		return $cg->toString ();
	}
}

/****** InputTag *******/

class InputTag {
	protected $attributes = array ();
	protected $label = '';
	protected $type = '';
	public function __construct($attributes, $label, $type = '') {
		if (count ( $_POST ) > 0) {
			unset ( $attributes ['value'] );
		}
		$this->attributes = $attributes;
		$this->label = $label;
		$this->type = $type;
	}
	public function toString() {
		if (isset($this->attributes['readonly']) && ($this->attributes['readonly'] == 'readonly' || $this->attributes['readonly'] === true)){
			return $this->toValue();
		}
		$cg = new HtmlTag ( 'div', array (
				'class' => 'control-group ' . $this->type
		) );
		$c = new HtmlTag ( 'div', array (
				'class' => 'controls'
		) );
		$text = new InputTextTag ( $this->attributes );
		$l = new HtmlTag ( 'label', array (
				'class' => 'control-label',
				'for' => $text->getId ()
		), $this->label );
		$cg->addChildren ( $l );
		$c->addChildren ( $text );
		$script = "<script>
		$('#" . $text->getId () . "').tagsManager({
		prefilled: ['" . str_replace ( ',', "','", str_replace ( "'", "\'", $text->getValue () ) ) . "']
	});
	</script>";
		$c->addChildren ( new PlanText ( $script ) );
		$cg->addChildren ( $c );

		return $cg->toString ();
	}
	public function toValue() {
		$cg = new HtmlTag ( 'div', array (
				'class' => 'control-group'
		) );
		$c = new HtmlTag ( 'div', array (
				'class' => 'controls'
		) );

		$hidden = new InputHiddenTag ( $this->attributes );
		$c->addChildren ( $hidden );
		$hidden = new InputHiddenTag (array('name' => 'hidden-'.$this->attributes['name'],'value' => $hidden->getValue()) );
		$c->addChildren ( $hidden );

		$l = new HtmlTag ( 'label', array (
				'class' => 'control-label'
		), $this->label );
		$cg->addChildren ( $l );
		$ary = explode ( ',', $hidden->getValue () );
		foreach ( $ary as $v ) {
			if (! empty ( $v )) {
				$c->addChildren ( new HtmlTag ( 'span', array (
						'class' => 'tm-tag'
				), htmlspecialchars ( $v ) ) );
			}
		}

		$cg->addChildren ( $c );

		return $cg->toString ();
	}
}

/****** InputText *******/

class InputText {
	protected $attributes = array ();
	protected $label = '';
	protected $type = '';
	public function __construct($attributes, $label, $type = '') {
		if (count ( $_POST ) > 0) {
			unset ( $attributes ['value'] );
		}
		$this->attributes = $attributes;
		$this->label = $label;
		$this->type = $type;
	}
	public function toString() {
		if (isset($this->attributes['readonly']) && ($this->attributes['readonly'] == 'readonly' || $this->attributes['readonly'] === true)){
			return $this->toValue();
		}
		$cg = new HtmlTag ( 'div', array (
				'class' => 'control-group '.$this->type
		) );
		$c = new HtmlTag ( 'div', array (
				'class' => 'controls'
		) );
		$text = new InputTextTag ( $this->attributes );
		$l = new HtmlTag ( 'label', array (
				'class' => 'control-label',
				'for' => $text->getId ()
		), $this->label );
		$cg->addChildren ( $l );
		$c->addChildren ( $text );
		$cg->addChildren ( $c );

		return $cg->toString ();
	}
	public function toValue() {
		$cg = new HtmlTag ( 'div', array (
				'class' => 'control-group'
		) );
		$c = new HtmlTag ( 'div', array (
				'class' => 'controls'
		) );
		$value = new ValueTag ( $this->attributes );
		$hidden = new InputHiddenTag ( $this->attributes );
		$c->addChildren ( $hidden );
		$l = new HtmlTag ( 'label', array (
				'class' => 'control-label'
		), $this->label );
		$cg->addChildren ( $l );
		$c->addChildren ( $value );
		$cg->addChildren ( $c );

		return $cg->toString ();
	}
}

/******* InputTime ******/

class InputTime {
	private $attributes = array ();
	private $label = '';
	private $type = '';
	public function __construct($attributes, $label, $type = '') {
		if (count ( $_POST ) > 0) {
			unset ( $attributes ['value'] );
		}
		$this->attributes = $attributes;
		$this->label = $label;
		$this->type = $type;
	}
	public function toString() {
		if (isset($this->attributes['readonly']) && ($this->attributes['readonly'] == 'readonly' || $this->attributes['readonly'] === true)){
			return $this->toValue();
		}
		$cg = new HtmlTag ( 'div', array (
				'class' => 'control-group '. $this->type
		) );
		$c = new HtmlTag ( 'div', array (
				'class' => 'controls'
		) );
		$text_time = new InputTextTag ( $this->attributes );
		$l = new HtmlTag ( 'label', array (
				'class' => 'control-label',
				'for' => $text_time->getId ()
		), $this->label );
		$cg->addChildren ( $l );

		$time = new HtmlTag ( 'div', array (
				'class' => 'input-append',
				'id' => 'datepicker_' . $text_time->getId ()
		) );
		$icon = new HtmlTag ( 'span', array (
				'class' => 'add-on'
		) );
		$icon->addChildren ( new HtmlTag ( 'i', array (
				'data-date-icon' => 'icon-calendar',
				'data-time-icon' => 'icon-time'
		) ) );

		$time->addChildren ( $text_time );
		$time->addChildren ( $icon );

		$c->addChildren ( $time );

		$str = '

		<script>
		$(function() {
		$("#datepicker_' . $text_time->getId () . '").datetimepicker({
		pickDate: false
	});
	});
	</script>

	';
		$script = new PlanText ( $str );
		$c->addChildren ( $script );

		$cg->addChildren ( $c );

		return $cg->toString ();
	}
	public function toValue() {
		$cg = new HtmlTag ( 'div', array (
				'class' => 'control-group'
		) );
		$c = new HtmlTag ( 'div', array (
				'class' => 'controls'
		) );
		$value = new ValueTag ( $this->attributes );
		$value->nl2br ( true );
		$hidden = new InputHiddenTag ( $this->attributes );
		$c->addChildren ( $hidden );
		$l = new HtmlTag ( 'label', array (
				'class' => 'control-label'
		), $this->label );
		$cg->addChildren ( $l );
		$c->addChildren ( $value );
		$cg->addChildren ( $c );

		return $cg->toString ();
	}
}

/****** SelectBox ******/

class SelectBox {
	private $options = array ();
	private $attributes = array ();
	private $label = '';
	private $type = '';
	public function __construct($options, $attributes, $label, $type = '') {
		$this->options = $options;
		$this->attributes = $attributes;
		$this->label = $label;
		$this->type = $type;
	}
	public function toString() {
		if (isset($this->attributes['readonly']) && ($this->attributes['readonly'] == 'readonly' || $this->attributes['readonly'] === true)){
			return $this->toValue();
		}
		$cg = new HtmlTag ( 'div', array (
				'class' => 'control-group '.$this->type
		) );
		$c = new HtmlTag ( 'div', array (
				'class' => 'controls'
		) );
		$sb = new SelectBoxTag ( $this->options, $this->attributes );
		$c->addChildren ( $sb );
		$l = new HtmlTag ( 'label', array (
				'class' => 'control-label',
				'for' => $sb->getId ()
		), $this->label );
		$cg->addChildren ( $l );
		$cg->addChildren ( $c );

		return $cg->toString ();
	}
	public function toValue() {
		$cg = new HtmlTag ( 'div', array (
				'class' => 'control-group'
		) );
		$c = new HtmlTag ( 'div', array (
				'class' => 'controls'
		) );
		$value = new ValueTag ( $this->attributes, $this->options );
		$value->nl2br ( true );
		$hidden = new InputHiddenTag ( $this->attributes );
		$c->addChildren ( $hidden );
		$l = new HtmlTag ( 'label', array (
				'class' => 'control-label'
		), $this->label );
		$cg->addChildren ( $l );
		$c->addChildren ( $value );
		$cg->addChildren ( $c );

		return $cg->toString ();
	}
}

/******* TextArea *******/

class TextArea {
	private $attributes = array ();
	private $label = '';
	private $type = '';
	public function __construct($attributes, $label, $type = '') {
		if (count ( $_POST ) > 0) {
			unset ( $attributes ['value'] );
		}
		$this->attributes = $attributes;
		$this->label = $label;
		$this->type = $type;
	}
	public function toString() {
		if (isset($this->attributes['readonly']) && ($this->attributes['readonly'] == 'readonly' || $this->attributes['readonly'] === true)){
			return $this->toValue();
		}
		$cg = new HtmlTag ( 'div', array (
				'class' => 'control-group '.$this->type
		) );
		$c = new HtmlTag ( 'div', array (
				'class' => 'controls'
		) );
		$text = new TextAreaTag ( $this->attributes );
		$l = new HtmlTag ( 'label', array (
				'class' => 'control-label',
				'for' => $text->getId ()
		), $this->label );
		$cg->addChildren ( $l );
		$c->addChildren ( $text );
		$cg->addChildren ( $c );

		return $cg->toString ();
	}
	public function toValue() {
		$cg = new HtmlTag ( 'div', array (
				'class' => 'control-group'
		) );
		$c = new HtmlTag ( 'div', array (
				'class' => 'controls'
		) );
		$value = new ValueTag ( $this->attributes );
		$value->nl2br ( true );
		$hidden = new InputHiddenTag ( $this->attributes );
		$c->addChildren ( $hidden );
		$l = new HtmlTag ( 'label', array (
				'class' => 'control-label'
		), $this->label );
		$cg->addChildren ( $l );
		$c->addChildren ( $value );
		$cg->addChildren ( $c );

		return $cg->toString ();
	}
}