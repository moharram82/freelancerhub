<?php

require_once '../init.php';

use App\Models\Contract;
use App\Models\Freelancer;
use App\Models\Customer;
use App\Models\User;

if(! $auth->allowOnly('ROLE_CUSTOMER')) {
    http_response_code(403);
    header('HTTP/1.1 403 Forbidden', true, 403);
    exit('You do not have permissions to visit this page.');
}

$customer = Customer::find(User::find(auth()->id())->customer->id);

if(! $request->query->get('contract_id') || ! $contract = Contract::exists($request->query->get('contract_id'))) {
    redirect(BASEURL . '/customers/contracts.php');
}

// make sure the contract belongs to the logged in customer
if (! $customer->contracts->contains('id', $contract->id)) {
    redirect(BASEURL . '/customers/contracts.php');
}

if ($contract->is_completed === 1) {
    redirect(BASEURL . '/customers/contracts.php');
}

$freelancer = Freelancer::find($contract->proposal->freelancer->id);

if($request->request->has('btnPay')) {

    $errorMsg = '';

    // do validation if any
    if( $customer->balance < $contract->proposal->price) {
        $errorMsg = 'Sorry! but you don\'t have enough balance to pay.';
    }

    if(empty($errorMsg)) {
        // do the payment

        $customer->balance = (int)$customer->balance - (int)$contract->proposal->price;
        $customer->save();
        $freelancer->balance = (int)$freelancer->balance + (int)$contract->proposal->price;
        $freelancer->save();

        // finalize the contract

        $contract->is_completed = 1;
        $contract->save();

        redirect(BASEURL . '/review.php?contract_id=' . $contract->id);

    }

    echo $view->make('checkout', [
        'errorMsg' => $errorMsg,
        'contract' => $contract
    ])->render();
}

echo $view->make('checkout', ['contract' => $contract])->render();