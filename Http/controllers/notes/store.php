<?php

use Core\Database;
use Core\App;
use Core\Container;
use Core\Validator;

$heading = 'Selected note';

$db = App::getContainer()->resolve(Database::class);

$errors = [];

if (! Validator::string($_POST['body'])) {
	$errors['body'] = 'Body should be between 1-10 characters!';
}

if(!empty($errors)) {
	return require view_path('notes/create.view.php');
}

if(empty($errors)) {
	$db->query('INSERT INTO notes(body, title, user_id) VALUES(:body, :title, :user_id)', [
		'body' => $_POST['body'],
		'title' => 'Hardcoded title',
		'user_id' => 1
	]);
}

header('location: /notes');
die();