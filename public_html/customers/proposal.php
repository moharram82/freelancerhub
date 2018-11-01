<?php

require_once '../../init.php';

use App\Models\Proposal;

if(!$auth->allowOnly('ROLE_CUSTOMER')) {
    http_response_code(403);
    header('HTTP/1.1 403 Forbidden', true, 403);
    exit('You do not have permissions to visit this page.');
}

if(! $request->query->get('proposal_id') || ! $proposal = Proposal::exists($request->query->get('proposal_id'))) {
    redirect('proposals.php');
}

if($request->request->has('_sign') && $request->request->get('_sign') == '1') {

    // create the contract
    $contract = new \App\Models\Contract;

    $contract->proposal_id = $proposal->id;
    $contract->is_completed = 0;

    $contract->save();

    // redirect to contract details page
    redirect(BASEURL . '/customers/contract.php?contract_id=' . $contract->id);
}

echo $view->make('customer.proposal', ['proposal' => $proposal])->render();