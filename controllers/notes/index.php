<?php

use Core\Database;

$heading = 'My notes';

$config = require base_path('config.php');
$db = new Database($config);

$notes = $db->query('select * from notes where user_id = 1')->findAll();

require view_path("notes/index.view.php");