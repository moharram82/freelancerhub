<?php

require_once '../../init.php';

use App\Models\Contract;

if(!$auth->allowOnly('ROLE_CUSTOMER')) {
    http_response_code(403);
    header('HTTP/1.1 403 Forbidden', true, 403);
    exit('You do not have permissions to visit this page.');
}

if(! $request->query->get('contract_id') || ! $contract = Contract::exists($request->query->get('contract_id'))) {
    redirect('contracts.php');
}

echo $view->make('customer.contract', ['contract' => $contract])->render();