<?php
class NumericValidator extends AbstractValidator {
	public function validate() {
		if (is_numeric ( $this->value ) == false) {
			$this->setError ( sprintf ( error_numeric, $this->name ) );
		}
	}
}