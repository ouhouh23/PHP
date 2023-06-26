<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config);

$id = $_GET['id'];
$note = $db->query('select * from notes where id = ?', [$id])->findOrFail();

authorize($note['user_id'] === 1);

$db->query('delete from notes where id = :id', [
	'id' => $_POST['id']]);

header('location: /notes');
die();
