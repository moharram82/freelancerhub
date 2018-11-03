<?php

require_once '../../init.php';

use App\Models\User;
use App\Models\Freelancer;
use App\Models\Customer;

if(!$auth->allowOnly('ROLE_FREELANCER')) {
    http_response_code(403);
    header('HTTP/1.1 403 Forbidden', true, 403);
    exit('You do not have permissions to visit this page.');
}

if($request->query->has('action') && $request->query->get('action') == 'new' && $request->query->has('customer_id') && $customer = Customer::exists($request->query->get('customer_id'))) {

    $errors = [];
    $errorMsg = '';

    $title = '';
    $price = '';
    $delivery = '';
    $validity = '';
    $details = '';

    // check if a form has been submitted
    if($request->request->has('btnAdd')) {

        // validate input data

        // title validation
        if(empty($request->request->get('title'))) {
            $errors[] = 'Title can not be empty';
        } elseif (mb_strlen($request->request->get('title')) < 5) {
            $errors[] = 'Title is too short';
        } elseif (mb_strlen($request->request->get('title')) > 255) {
            $errors[] = 'Title is too long';
        }

        $title = $request->request->get('title');

        // price validation
        if(empty($request->request->get('price'))) {
            $errors[] = 'Price can not be empty';
        } elseif (! is_numeric($request->request->get('price'))) {
            $errors[] = 'Price must be a number';
        }

        $price = $request->request->get('price');

        // delivery validation
        if(empty($request->request->get('delivery'))) {
            $errors[] = 'Delivery period can not be empty';
        } elseif (! is_numeric($request->request->get('delivery'))) {
            $errors[] = 'Delivery period must be a number';
        }

        $delivery = $request->request->get('delivery');

        // validity validation
        if(empty($request->request->get('validity'))) {
            $errors[] = 'Validity period can not be empty';
        } elseif (! is_numeric($request->request->get('validity'))) {
            $errors[] = 'Validity period must be a number';
        }

        $validity = $request->request->get('validity');

        // details validation
        if(empty($request->request->get('details'))) {
            $errors[] = 'Details can not be empty';
        } elseif (mb_strlen($request->request->get('details')) < 10) {
            $errors[] = 'Details is too short';
        }

        $details = $request->request->get('details');


        if(empty($errors)) {
            // add proposal
            $proposal = new \App\Models\Proposal;

            $proposal->freelancer_id = User::find($auth->id())->freelancer->id;
            $proposal->customer_id = $customer->id;
            $proposal->title = $title;
            $proposal->price = $price;
            $proposal->delivery = $delivery;
            $proposal->validity = $validity;
            $proposal->details = $details;

            $proposal->save();

            redirect(SELF);

        } else {
            $errorMsg = '<ul>';

            foreach ($errors as $error) {
                $errorMsg .= "<li>{$error}</li>";
            }

            $errorMsg .= '</ul>';
        }
    }

    echo $view->make('freelancer.proposal_new', [
        'errorMsg' => $errorMsg,
        'customer' => $customer,
        'title' => $title,
        'price' => $price,
        'delivery' => $delivery,
        'validity' => $validity,
        'details' => $details,
    ])->render();
} else {

    $proposals = Freelancer::find(User::find($auth->id())->freelancer->id)->proposals;

    echo $view->make('freelancer.proposals', ['proposals' => $proposals])->render();
}
