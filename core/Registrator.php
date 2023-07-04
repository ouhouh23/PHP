<?php

namespace Core;

use Core\App;
use Core\Container;
use Core\Database;

class Registrator {
	public function attempt($email, $password) {
		$db = App::getContainer()->resolve('Core\Database');

		$user = $db->query('select * from users where email = :email', [
			'email' => $email
		])->find();

		if ($user) {
			return false;
		}

		$db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
			'email' => $email,
			'password' => password_hash($password, PASSWORD_BCRYPT)
		]);

		return true;
	}
}