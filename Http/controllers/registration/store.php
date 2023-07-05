<?php

use Core\Validator;
use Core\Registrator;
use Http\Forms\UserForm;
use Core\Session;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new UserForm();

if ($form->validate($email, $password)) {
	$registration = new Registrator();

	if ($registration->attempt($email, $password)) {
		$_SESSION['email'] = $email;

		redirect('/');
	}

	$form->setError('email', 'This email is already registered');
}

Session::flash('errors', $form->getErrors());
Session::flash('old', [
	'email' => $email
]);

redirect('/register');