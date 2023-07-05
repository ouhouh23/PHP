<?php

use Core\Session;

$errors = Session::get('errors');

require view_path('registration/create.view.php');