<?php

use Http\Models\Note;

$heading = 'Notes';

$notes = (new Note())->all();

require view_path("notes/index.view.php");