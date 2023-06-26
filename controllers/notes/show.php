<?php

use Core\Database;

$heading = 'Selected note';

$config = require base_path('config.php');
$db = new Database($config);

$id = $_GET['id'];
$note = $db->query('select * from notes where id = ?', [$id])->findOrFail();

authorize($note['user_id'] === 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$db->query('delete from notes where id = :id', [
		'id' => $_POST['id']]);
	
	header('location: /notes');
	die();
}

require view_path("notes/show.view.php");