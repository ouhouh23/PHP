<?php

use Core\Database;
use Core\App;
use Core\Container;

$heading = 'Selected note';

$db = App::getContainer()->resolve(Database::class);

$id = $_POST['id'];
$note = $db->query('select * from notes where id = ?', [$id])->findOrFail();

authorize($note['user_id'] === 1);

$db->query('delete from notes where id = :id', [
	'id' => $_POST['id']]);

header('location: /notes');
die();
