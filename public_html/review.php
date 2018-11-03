<?php

require_once '../init.php';

use App\Models\Contract;
use App\Models\Customer;
use App\Models\User;
use App\Models\Review;

if(! $auth->allowOnly('ROLE_CUSTOMER')) {
    http_response_code(403);
    header('HTTP/1.1 403 Forbidden', true, 403);
    exit('You do not have permissions to visit this page.');
}

$customer = Customer::find(User::find(auth()->id())->customer->id);

// make sure there is a contract
if(! $request->query->get('contract_id') || ! $contract = Contract::exists($request->query->get('contract_id'))) {
    redirect(BASEURL);
}

// make sure the contract belongs to the logged in customer
if (! $customer->contracts->contains('id', $contract->id)) {
    redirect(BASEURL);
}

// make sure the contract is complete
if ($contract->is_completed === 0) {
    redirect(BASEURL);
}

$errors = [];
$errorMsg = '';
$body = '';

if($request->request->has('btnAdd')) {

    // do validation if any
    if(empty($request->request->get('body'))) {
        $errors[] = 'Review body can not be empty!';
    }

    $body = $request->request->get('body');

    if(empty($errors)) {
        // add the review

        $review = new Review;
        $review->customer_id = $customer->id;
        $review->freelancer_id = $contract->proposal->freelancer->id;
        $review->body = $body;
        $review->price_rating = $request->request->get('price_rating');
        $review->quality_rating = $request->request->get('quality_rating');
        $review->timing_rating = $request->request->get('timing_rating');
        $review->communication_rating = $request->request->get('communication_rating');
        $review->commitement_rating = $request->request->get('commitement_rating');

        $review->save();

        redirect(BASEURL . '/customers/contracts.php?contract_id=' . $contract->id);

    } else {
        $errorMsg = '<ul>';

        foreach ($errors as $error) {
            $errorMsg .= "<li>{$error}</li>";
        }

        $errorMsg .= '</ul>';
    }
}

echo $view->make('review', [
    'errorMsg' => $errorMsg,
    'contract' => $contract,
    'body' => $body
])->render();