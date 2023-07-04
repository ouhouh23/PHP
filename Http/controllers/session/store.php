<?php

use Core\Validator;
use Core\App;
use Core\Container;
use Http\Forms\UserForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new UserForm();

if (! $form->validate($email, $password)) {
	$errors = $form->getErrors();
	require view_path('session/create.view.php');

	die();
}

$db = App::getContainer()->resolve('Core\Database');
$user = $db->query('select * from users where email = :email', [
	'email' => $email
	])->find();

if ($user && password_verify($password, $user['password'])) {
	login($email);

	header('location: /');
	die();
}

$errors['email'] = 'Wrong email or password';

require view_path('session/create.view.php');