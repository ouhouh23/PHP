<?php

function routeToController($routes, $uri) {
	if (array_key_exists($uri, $routes)) {
		require base_path($routes[$uri]);
	}

	else {
		abort();
	}
}

$routes = require base_path('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

routeToController($routes, $uri);