<?php

use Http\Forms\NoteForm;
use Http\Models\Note;
use Core\Session;

$heading = 'Selected note';

$form = new NoteForm();

if ($form->validate($_POST['body'], 1, 20)) {

	(new Note())->create($_POST['body']);

	redirect('/notes');
}

Session::flash('errors', $form->getErrors());
Session::flash('old', [
	'body' => $_POST['body']
]);
redirect('/notes/create');
