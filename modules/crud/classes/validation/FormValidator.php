<?php
class FormValidator {
	public  $errors = array ();
	private $validatorList = array ();
	public function validate() {
		$returnVal = true;
		foreach ( $this->getValidators () as $validator ) {
			if (! $validator->isValid ()) {
				$returnVal = false;
				while ( $error = $validator->getError () ) {
					$field = $validator->getField();
					$this->addError ($field, $error );
				}
			}
		}
		return $returnVal;
	}
	public function getErrors() {
		return $this->errors;
	}
	public function addError($field,$msg) {
		$this->errors [$field][] = $msg;
	}
	public function addValidator(& $validator) {
		$this->validatorList [] = $validator;
	}
	public function getValidators() {
		return $this->validatorList;
	}
}