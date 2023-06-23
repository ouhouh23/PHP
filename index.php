<?php

require "functions.php";
require "router.php";
require "Database.php";

$config = require 'config.php';

$db = new Database($config);
$id = $_GET['id'];
$notes = $db->query("Select * from notes where id = ?", [$id])->fetch();
dd($notes);
