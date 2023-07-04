<?php

use Core\Database;
use Core\App;
use Core\Container;

$heading = 'Selected note';

$db = App::getContainer()->resolve(Database::class);

$id = $_GET['id'];
$note = $db->query('select * from notes where id = ?', [$id])->findOrFail();

authorize($note['user_id'] === 1);

require view_path("notes/show.view.php");