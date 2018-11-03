<?php

require_once '../../init.php';

use App\Models\RFQ;

if(!$auth->allowOnly('ROLE_FREELANCER')) {
    http_response_code(403);
    header('HTTP/1.1 403 Forbidden', true, 403);
    exit('You do not have permissions to visit this page.');
}

if(! $request->query->get('rfq_id') || ! $rfq = RFQ::exists($request->query->get('rfq_id'))) {
    redirect('rfqs.php');
}

echo $view->make('freelancer.rfq', ['rfq' => $rfq])->render();