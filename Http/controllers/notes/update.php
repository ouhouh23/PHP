<?php

use Core\Session;
use Http\Forms\NoteForm;
use Http\Models\Note;

$form = new NoteForm;

if ($form->validate($_POST['body'])) {
	(new Note())->update($_POST['id'], $_POST['body']);

	redirect('/notes');
}

Session::flash('errors', $form->getErrors());

redirect("/note/edit?id={$_POST['id']}");
