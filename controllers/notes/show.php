<?php

$heading = 'Selected note';

$config = require 'config.php';
$db = new Database($config);

$id = $_GET['id'];
$note = $db->query('select * from notes where id = ?', [$id])->findOrFail();

authorize($note['user_id'] === 1);

require "views/notes/show.view.php";