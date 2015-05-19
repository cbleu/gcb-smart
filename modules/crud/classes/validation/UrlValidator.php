<?php
class UrlValidator extends AbstractValidator {
	public function validate() {
		$regex = '/^(?:(?:https?|ftps?|file|news|gopher):\\/\\/)?(?:(?:(?:25[0-5]|2[0-4]\d|(?:(?:1\d)?|[1-9]?)\d)\.){3}(?:25[0-5]|2[0-4]\d|(?:(?:1\d)?|[1-9]?)\d)' . '|(?:[0-9a-z]{1}[0-9a-z\\-]*\\.)*(?:[0-9a-z]{1}[0-9a-z\\-]{0,62})\\.(?:[a-z]{2,6}|[a-z]{2}\\.[a-z]{2,6})' . '(?::[0-9]{1,4})?)(?:\\/?|\\/[\\w\\-\\.,\'@?^=%&:;\/~\\+#]*[\\w\\-\\@?^=%&\/~\\+#])$/i';
		if (preg_match ( $regex, $this->value ) == false) {
			$this->setError ( sprintf ( error_url, $this->name ) );
		}
	}
}