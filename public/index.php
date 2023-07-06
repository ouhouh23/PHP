<?php

use Core\Router;
use Core\Session;

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . "vendor/autoload.php";

session_start();

require BASE_PATH . "core/functions.php";

require base_path('bootstrap.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router = new Router;
require base_path('routes.php');

$router->route($uri, $method);

Session::unflash();

