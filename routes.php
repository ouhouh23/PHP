<?php

$router->get('/', 'index.php');
$router->get('/contact', 'contact.php');
$router->get('/about', 'about.php');

$router->get('/notes', 'notes/index.php')->only('auth');
$router->get('/note', 'notes/show.php')->only('auth');
$router->get('/notes/create', 'notes/create.php')->only('auth');
$router->get('/note/edit', 'notes/edit.php')->only('auth');

$router->get('/login', 'session/create.php')->only('guest');

$router->get('/register', 'registration/create.php')->only('guest');

$router->delete('/note', 'notes/destroy.php')->only('auth');
$router->delete('/session', 'session/destroy.php')->only('auth');

$router->post('/notes', 'notes/store.php')->only('auth');
$router->post('/register', 'registration/store.php')->only('guest');
$router->post('/session', 'session/store.php')->only('guest');

$router->patch('/notes', 'notes/update.php')->only('auth');