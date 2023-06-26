<?php

require 'Validator.php';

$heading = 'Create note';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$config = require 'config.php';
	$db = new Database($config);

	$errors = [];

	if (! Validator::string($_POST['body'])) {
		$errors['body'] = 'Body should be between 1-10 characters!';
	}
	if(empty($errors)) {
		$db->query('INSERT INTO notes(body, title, user_id) VALUES(:body, :title, :user_id)', [
			'body' => $_POST['body'],
			'title' => 'Hardcoded title',
			'user_id' => 1
		]);
	}
}

require 'views/notes/create.view.php';