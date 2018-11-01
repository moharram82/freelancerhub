<?php

require_once '../../init.php';

use App\Models\User;
use App\Models\Customer;

if(!$auth->allowOnly('ROLE_CUSTOMER')) {
    http_response_code(403);
    header('HTTP/1.1 403 Forbidden', true, 403);
    exit('You do not have permissions to visit this page.');
}

$contracts = Customer::find(User::find($auth->id())->customer->id)->contracts;

echo $view->make('customer.contracts', ['contracts' => $contracts])->render();