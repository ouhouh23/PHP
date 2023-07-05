<?php

use Http\Models\Note;
use Core\Session;

$heading = 'Edit note';

$note = (new Note())->show($_GET['id']);

$errors = Session::get('errors');

require view_path('notes/edit.view.php');