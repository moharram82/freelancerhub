<?php

require_once '../../init.php';

use App\Models\Freelancer;

if(!$auth->allowOnly('ROLE_ADMIN')) {
    http_response_code(403);
    header('HTTP/1.1 403 Forbidden', true, 403);
    exit('You do not have permissions to visit this page.');
}

if($request->query->has('action') && $request->query->get('action') == 'delete' && $request->query->has('freelancer_id') && $rfq = \App\Models\Freelancer::exists($request->query->get('freelancer_id'))) {
    $rfq->destroy($rfq->id);

    redirect(SELF);
} else {

    $rfqs = Freelancer::all();

    echo $view->make('admin.freelancers', ['rfqs' => $rfqs])->render();
}
