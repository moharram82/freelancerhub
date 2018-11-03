<?php

require_once '../../init.php';

use App\Models\Contract;

if(!$auth->allowOnly('ROLE_ADMIN')) {
    http_response_code(403);
    header('HTTP/1.1 403 Forbidden', true, 403);
    exit('You do not have permissions to visit this page.');
}

$contracts = Contract::all();

echo $view->make('admin.contracts', ['contracts' => $contracts])->render();