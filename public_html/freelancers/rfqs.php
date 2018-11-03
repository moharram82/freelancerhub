<?php

require_once '../../init.php';

use App\Models\User;
use App\Models\Freelancer;

if(!$auth->allowOnly('ROLE_FREELANCER')) {
    http_response_code(403);
    header('HTTP/1.1 403 Forbidden', true, 403);
    exit('You do not have permissions to visit this page.');
}

if($request->query->has('action') && $request->query->get('action') == 'delete' && $request->query->has('rfq_id') && $rfq = \App\Models\RFQ::exists($request->query->get('rfq_id'))) {
    $rfq->destroy($rfq->id);

    redirect(SELF);
} else {

    $rfqs = Freelancer::find(User::find($auth->id())->freelancer->id)->rfqs;

    echo $view->make('freelancer.rfqs', ['rfqs' => $rfqs])->render();
}
