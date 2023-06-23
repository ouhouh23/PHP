<?php

$routes = [
	'/' => 'controllers/index.php',
	'/contact' => 'controllers/contact.php',
	'/about' => 'controllers/about.php',
	'/notes' => 'controllers/notes.php',
	'/note' => 'controllers/note.php'
];

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

function routeToController($routes, $uri) {
	if (array_key_exists($uri, $routes)) {
		require $routes[$uri];
	}

	else {
		abort();
	}
}

routeToController($routes, $uri);