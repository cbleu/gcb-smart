<?php
abstract class AbstractValidator {
	protected $name;
	protected $field;
	protected $value;
	protected $args;
	protected $errors = array ();
	public function __construct($field,$name, $value) {
		$this->field = $field;
		$this->name = $name;
		$this->value = $value;

		$this->errors = array ();
		$this->validate ();
	}
	public function init() {
		$args = func_get_args ();
		$this->args = $args;
	}
	public function validate() {
	}
	public function isValid() {
		if (! empty ( $this->errors )) {
			return false;
		} else {
			return true;
		}
	}
	public function setError($msg) {
		$this->errors [] = $msg;
	}
	public function getError() {
		return array_pop ( $this->errors );
	}
	public function getName(){
		return $this->name;
	}
	public function getField(){
		return $this->field;
	}
}