<?php

use Core\Database;
use Core\App;
use Core\Container;
use Core\Validator;

$db = App::getContainer()->resolve(Database::class);

$id = $_POST['id'];

$note = $db->query('select * from notes where id = ?', [$id])->findOrFail();

authorize($note['user_id'] === 1);

$errors = [];

if (! Validator::string($_POST['body'])) {
	$errors['body'] = 'Body should be between 1-10 characters!';
}

if(!empty($errors)) {
	return require view_path('notes/edit.view.php');
}

if(empty($errors)) {
	$db->query('update notes set body = :body where id = :id', [
		'body' => $_POST['body'],
		'id' => $_POST['id']
	]);
}

header('location: /notes');
die();

