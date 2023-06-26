<?php

function routeToController($routes, $uri) {
	if (array_key_exists($uri, $routes)) {
		require $routes[$uri];
	}

	else {
		abort();
	}
}

$routes = require 'routes.php';
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

routeToController($routes, $uri);