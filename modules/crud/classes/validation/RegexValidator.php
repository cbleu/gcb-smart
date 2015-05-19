<?php
class RegexValidator extends AbstractValidator {
	private $regex;
	private $msg;
	public function validate() {
		$this->regex = $this->args [2];
		$this->msg = $this->args [3];
		if (preg_match ( $this->regex, $this->value ) == false) {
			$this->setError ( sprintf ( $this->msg, $this->name ) );
		}
	}
}