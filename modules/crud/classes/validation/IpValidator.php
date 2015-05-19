<?php
class IpValidator extends AbstractValidator {
	public function validate() {
		$flag = true;
		$bytes = explode ( '.', $this->value );
		if (count ( $bytes ) == 4) {
			foreach ( $bytes as $byte ) {
				if (! (is_numeric ( $byte ) && $byte >= 0 && $byte <= 255)) {
					$flag = false;
				}
			}
		} else {
			$flag = false;
		}

		if (false == $flag) {
			$this->setError ( sprintf ( error_ip, $this->name ) );
		}
	}
}