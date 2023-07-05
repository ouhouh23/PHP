<?php

use Core\Session;

$heading = 'Create note';

$errors = Session::get('errors');

require view_path('notes/create.view.php');