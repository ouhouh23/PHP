<?php

use Core\Router;

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . "core/functions.php";

spl_autoload_register (function ($class) {
	str_replace('//', DIRECTORY_SEPARATOR, $class);

	require base_path("{$class}.php");
});

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router = new Router;
require base_path('routes.php');

$router->route($uri, $method);
