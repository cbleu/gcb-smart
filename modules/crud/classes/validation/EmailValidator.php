<?php
class EmailValidator extends AbstractValidator {
	public function validate() {
		$regex = "/^[a-z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+(?:[a-z]{2,4}|museum|travel)$/i";
		if (preg_match ( $regex, $this->value ) == false) {
			$this->setError ( sprintf ( error_email, $this->name ) );
		}
	}
}