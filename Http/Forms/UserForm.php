<?php

namespace Http\Forms;

use Core\Validator;

class UserForm {
	protected $errors = [];

	public function validate($email, $password) {
		if (!Validator::string($password)) {
			$this->errors['password'] = 'please provide correct password';
		}

		if (!Validator::email($email)) {
			$this->errors['email'] = 'please provide correct email';
		}

		return empty($this->errors);
	}

	public function getErrors() {
		return $this->errors;
	}
}