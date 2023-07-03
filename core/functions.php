<?php

use Core\Response;

function base_path($path) {
	return BASE_PATH . $path;
}

function view_path($path) {
	return base_path("views/$path");
}

function dd($value) {
	echo '<pre>';
	var_dump($value);
	echo '</pre>';
	die();
}

function urlIs($uri) {
	return $_SERVER['REQUEST_URI'] === $uri ? true : false;
}

function abort($code = 404) {
	http_response_code($code);

	require view_path("{$code}.php");

	die();
}

function authorize($condition) {
	if ($condition) {
		return;
	}

	abort(Response::FORBIDDEN);
}

function login($key) {
	$_SESSION['email'] = $key;
	
	session_regenerate_id(true);
}

function logout() {
	$_SESSION = [];
	session_destroy();

	$params = session_get_cookie_params();
	setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);

}