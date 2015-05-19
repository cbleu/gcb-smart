<?php
class AlphaNumericValidator extends AbstractValidator {
	public function validate() {
		$regex = '/^[\p{Ll}\p{Lm}\p{Lo}\p{Lt}\p{Lu}\p{Nd}]+$/mu';
		if (preg_match ( $regex, $this->value ) == false) {
			$this->setError ( sprintf ( error_alpha_numeric, $this->name ) );
		}
	}
}