<?php

require_once '../init.php';

use App\Models\Package;
use App\Models\Customer;

// if(!$auth->allowOnly(['ROLE_CUSTOMER'])) {
//     http_response_code(403);
//     header('HTTP/1.1 403 Forbidden', true, 403);
//     exit('You need to <a href="/login.php">login</a> in order to complete the order.');
// }

if(! $request->query->get('package_id') || ! $package = Package::packageExists($request->query->get('package_id'))) {
    //redirect('BASEURL.php);
}

if(! $request->query->get('customer_id') || ! $customer = Customer::customerExists($request->query->get('customer_id'))) {
    //redirect('BASEURL.php);
}

echo $view->make('checkout')->render();