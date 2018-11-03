<?php

require_once '../../init.php';

use App\Models\User;
use App\Models\RFQ;

if(!$auth->allowOnly('ROLE_ADMIN')) {
    http_response_code(403);
    header('HTTP/1.1 403 Forbidden', true, 403);
    exit('You do not have permissions to visit this page.');
}

if($request->query->has('action') && $request->query->get('action') == 'delete' && $request->query->has('rfq_id') && $rfq = \App\Models\RFQ::exists($request->query->get('rfq_id'))) {
    $rfq->destroy($rfq->id);

    redirect(SELF);
} else {

    $rfqs = RFQ::all();

    echo $view->make('admin.rfqs', ['rfqs' => $rfqs])->render();
}
