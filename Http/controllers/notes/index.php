<?php

use Core\Database;
use Core\App;
use Core\Container;

$heading = 'Selected note';

$db = App::getContainer()->resolve(Database::class);

$notes = $db->query('select * from notes where user_id = 1')->findAll();

require view_path("notes/index.view.php");