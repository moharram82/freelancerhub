<?php

require_once '../init.php';

use App\Models\RFQ;

$rfqs = RFQ::all();

echo $view->make('projects', ['rfqs' => $rfqs])->render();
