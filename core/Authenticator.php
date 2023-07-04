<?php

namespace Core;

use Core\App;
use Core\Container;
use Core\Database;

class Authenticator {
	public function attempt($email, $password) {
		$db = App::getContainer()->resolve('Core\Database');
		$user = $db->query('select * from users where email = :email', [
			'email' => $email
		])->find();

		if ($user && password_verify($password, $user['password'])) {
			$this->login($email);

			return true;
		}

		return false;
	}

	public function login($key) {
		$_SESSION['email'] = $key;
		
		session_regenerate_id(true);
	}

	public function logout() {
		$_SESSION = [];
		session_destroy();

		$params = session_get_cookie_params();
		setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
	}

}