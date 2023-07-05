<?php

namespace Http\Forms;

use Core\Validator;

class NoteForm {
	protected $errors = [];

	public function validate($body, $min = 1, $max = 10) {
		if (!Validator::string($body, $min, $max)) {
			$this->errors['body'] = "Note body should be between $min and $max characters!";
		}

		return empty($this->errors);
	}

	public function getErrors() {
		return $this->errors;
	}
}