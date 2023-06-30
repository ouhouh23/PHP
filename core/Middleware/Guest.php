<?php

namespace Core\Middleware;

class Guest {
	public static function handle() {
		if ($_SESSION['email'] ?? false) {
			header('location: /');
			die();
		}
	}
}