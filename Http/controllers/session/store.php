<?php

use Core\Validator;
use Core\Authenticator;
use Http\Forms\UserForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new UserForm();

if ($form->validate($email, $password)) {
	$auth = new Authenticator();

	if ($auth->attempt($email, $password)) {
		redirect('/');
	}

	$form->setError('email', 'Wrong email or password');
}


$errors = $form->getErrors();

require view_path('session/create.view.php');