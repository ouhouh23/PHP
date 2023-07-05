<?php

use Core\Session;

$errors = Session::get('errors');

require view_path('session/create.view.php');