<?php

use Core\Database;

$heading = 'Selected note';

$config = require base_path('config.php');
$db = new Database($config);

$id = $_GET['id'];
$note = $db->query('select * from notes where id = ?', [$id])->findOrFail();

authorize($note['user_id'] === 1);

require view_path("notes/show.view.php");