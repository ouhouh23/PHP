<?php

namespace Core\Middleware;

class Auth {
	public static function handle() {
		if (! $_SESSION['email'] ?? false) {
			header('location: /');
			die();
		}
	}
}