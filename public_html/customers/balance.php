<?php

require_once '../../init.php';

use App\Models\Customer;
use App\Models\User;

if(!$auth->allowOnly('ROLE_CUSTOMER')) {
    http_response_code(403);
    header('HTTP/1.1 403 Forbidden', true, 403);
    exit('You do not have permissions to visit this page.');
}

$customer = Customer::find(User::find(auth()->id())->customer->id);

echo $view->make('customer.balance', ['customer' => $customer])->render();