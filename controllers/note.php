<?php

$heading = 'Selected note';

$config = require 'config.php';
$db = new Database($config);

$id = $_GET['id'];
$note = $db->query('select * from notes where id = ?', [$id])->fetch();

if (! $note) {
	abort(Response::NOT_FOUND);
}

if ($note['user_id'] !== 1) {
	abort(Response::FORBIDDEN);
}

require "views/notes/show.view.php";