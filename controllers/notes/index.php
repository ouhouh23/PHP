<?php

$heading = 'My notes';

$config = require 'config.php';
$db = new Database($config);

$notes = $db->query('select * from notes where user_id = 1')->findAll();

require "views/notes/index.view.php";