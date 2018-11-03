<?php

require_once '../../init.php';

use App\Models\Customer;

if(!$auth->allowOnly('ROLE_ADMIN')) {
    http_response_code(403);
    header('HTTP/1.1 403 Forbidden', true, 403);
    exit('You do not have permissions to visit this page.');
}

if($request->query->has('action') && $request->query->get('action') == 'delete' && $request->query->has('customer_id') && $rfq = \App\Models\Customer::exists($request->query->get('customer_id'))) {
    $rfq->destroy($rfq->id);

    redirect(SELF);
} else {

    $rfqs = Customer::all();

    echo $view->make('admin.customers', ['rfqs' => $rfqs])->render();
}
