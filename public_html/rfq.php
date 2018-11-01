<?php

require_once '../init.php';

use App\Models\RFQ;

if(! $request->query->get('rfq_id') || ! $rfq = RFQ::exists($request->query->get('rfq_id'))) {
    redirect('projects.php');
}

echo $view->make('rfq', ['rfq' => $rfq])->render();
