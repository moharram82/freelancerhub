<?php

require_once '../../init.php';

use App\Models\Contract;

if(!$auth->allowOnly('ROLE_ADMIN')) {
    http_response_code(403);
    header('HTTP/1.1 403 Forbidden', true, 403);
    exit('You do not have permissions to visit this page.');
}

if($request->query->has('action') && $request->query->get('action') == 'delete' && $request->query->has('contract_id') && $contract = \App\Models\Contract::exists($request->query->get('contract_id'))) {
    $contract->destroy($contract->id);

    redirect(SELF);
}


$contracts = Contract::has('proposal')->get();

echo $view->make('admin.contracts', ['contracts' => $contracts])->render();
