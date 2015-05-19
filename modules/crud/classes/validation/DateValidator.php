<?php
class DateValidator extends AbstractValidator {
	public function validate() {
		$flag = true;
		$this->value = str2mysqltime ( $this->value, 'Y-m-d' );
		if (preg_match ( "/^([0-9]{4})-([0-9]{2})-([0-9]{2})$/", $this->value, $parts )) {
			if (checkdate ( $parts [2], $parts [3], $parts [1] ) == false) {
				$flag = false;
			}
		} else {
			$flag = false;
		}

		if (false == $flag) {
			$this->setError ( sprintf ( error-date, $this->name ) );
		}
	}
}