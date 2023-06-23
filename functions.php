<?php

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

	require "views/{$code}.php";

	die();
}