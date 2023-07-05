<?php

use Http\Models\Note;

$heading = 'Selected note';

$note = (new Note())->show($_GET['id']);

require view_path("notes/show.view.php");