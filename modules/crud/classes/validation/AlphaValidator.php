<?php
class AlphaValidator extends AbstractValidator {
	public function validate() {
		$regex = '/^\pL+$/u';
		if (preg_match ( $regex, $this->value ) == false) {
			$this->setError ( sprintf ( error_alphabetic, $this->name ) );
		}
	}
}