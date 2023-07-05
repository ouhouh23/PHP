<?php

use Http\Models\Note;

(new Note())->delete($_POST['id']);

redirect('/notes');
