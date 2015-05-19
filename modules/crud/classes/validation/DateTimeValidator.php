<?php
class DateTimeValidator extends AbstractValidator {
	public function validate() {
		$flag = true;
		$this->value = str2mysqltime ( $this->value );
		if (preg_match ( "/^([0-9]{4})-([0-9]{2})-([0-9]{2}) ([01][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/", $this->value, $parts )) {
			if (checkdate ( $parts [2], $parts [3], $parts [1] ) == false) {
				$flag = false;
			}
		} else {
			$flag = false;
		}

		if (false == $flag) {
			$this->setError ( sprintf ( error_datetime, $this->name ) );
		}
	}
}