<?php

use Core\Validator;
use Core\App;
use Core\Container;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (!Validator::string($password, 5, 20)) {
	$errors['password'] = 'password length should be between 5-20 characters';
}

if (!Validator::email($email)) {
	$errors['email'] = 'please provide correct email';
}

if (!empty($errors)) {
	require view_path('registration/create.view.php');
	die();
}

$db = App::getContainer()->resolve('Core\Database');
$user = $db->query('select * from users where email = :email', [
	'email' => $email
	])->find();

if ($user) {
	$errors['email'] = 'This email is already registered';
}

if (!empty($errors)) {
	require view_path('registration/create.view.php');
	die();
}

else {
	$db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
		'email' => $email,
		'password' => password_hash($password, PASSWORD_BCRYPT)
	]);

	login($email);
	
	header('location: /');
	die();
}