<?php
class RequiredValidator extends AbstractValidator {
	public function validate() {
		$flag = true;
		if (!is_array($this->value)){
			if ($this->value == null || "" == trim ( $this->value )) {
				$flag = false;
			}
		}else{
			if (count($this->value) <= 0){
				$flag = false;
			}
		}

		if (false == $flag){
			$this->setError ( sprintf ( error_required, $this->name ) );
		}
	}
}