<?php

use Core\Validator;
use Core\Authenticator;
use Core\Session;
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


Session::flash('errors', $form->getErrors());
Session::flash('old', [
	'email' => $email
]);

redirect('/login');