<?php

use Core\Validator;
use Core\Registrator;
use Http\Forms\UserForm;

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

$errors = $form->getErrors();

require view_path('registration/create.view.php');