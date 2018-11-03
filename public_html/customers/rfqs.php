<?php

require_once '../../init.php';

use App\Models\User;
use App\Models\Customer;
use App\Models\Freelancer;

if(!$auth->allowOnly('ROLE_CUSTOMER')) {
    http_response_code(403);
    header('HTTP/1.1 403 Forbidden', true, 403);
    exit('You do not have permissions to visit this page.');
}

if($request->query->has('action') && $request->query->get('action') == 'new' && $request->query->has('freelancer_id') && $freelancer = Freelancer::exists($request->query->get('freelancer_id'))) {

    $errors = [];
    $errorMsg = '';

    $title = '';
    $budget = 0;
    $category_id = 1;
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

        // budget validation
        if(empty($request->request->get('budget'))) {
            $errors[] = 'Budget can not be empty';
        } elseif (! is_numeric($request->request->get('budget'))) {
            $errors[] = 'Budget must be a number';
        }

        $budget = $request->request->get('budget');

        // details validation
        if(empty($request->request->get('details'))) {
            $errors[] = 'Details can not be empty';
        } elseif (mb_strlen($request->request->get('details')) < 10) {
            $errors[] = 'Details is too short';
        }

        $details = $request->request->get('details');

        $category_id = $request->request->get('category_id');


        if(empty($errors)) {
            // add package
            $rfq = new \App\Models\RFQ;

            $rfq->freelancer_id = $freelancer->id;
            $rfq->customer_id = User::find(auth()->id())->customer->id;
            $rfq->title = $title;
            $rfq->budget = $budget;
            $rfq->category_id = $category_id;
            $rfq->details = $details;

            $rfq->save();

            redirect(SELF);

        } else {
            $errorMsg = '<ul>';

            foreach ($errors as $error) {
                $errorMsg .= "<li>{$error}</li>";
            }

            $errorMsg .= '</ul>';
        }
    }

    echo $view->make('customer.rfq_new', [
        'errorMsg' => $errorMsg,
        'title' => $title,
        'budget' => $budget,
        'category_id' => $category_id,
        'details' => $details,
        'freelancer' => $freelancer,
    ])->render();
} elseif($request->query->has('action') && $request->query->get('action') == 'new') {

    $errors = [];
    $errorMsg = '';

    $title = '';
    $budget = 0;
    $category_id = 1;
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

        // budget validation
        if(empty($request->request->get('budget'))) {
            $errors[] = 'Budget can not be empty';
        } elseif (! is_numeric($request->request->get('budget'))) {
            $errors[] = 'Budget must be a number';
        }

        $budget = $request->request->get('budget');

        // details validation
        if(empty($request->request->get('details'))) {
            $errors[] = 'Details can not be empty';
        } elseif (mb_strlen($request->request->get('details')) < 10) {
            $errors[] = 'Details is too short';
        }

        $details = $request->request->get('details');

        $category_id = $request->request->get('category_id');


        if(empty($errors)) {
            // add package
            $rfq = new \App\Models\RFQ;

            $rfq->customer_id = User::find(auth()->id())->customer->id;
            $rfq->title = $title;
            $rfq->budget = $budget;
            $rfq->category_id = $category_id;
            $rfq->details = $details;

            $rfq->save();

            redirect(SELF);

        } else {
            $errorMsg = '<ul>';

            foreach ($errors as $error) {
                $errorMsg .= "<li>{$error}</li>";
            }

            $errorMsg .= '</ul>';
        }
    }

    echo $view->make('customer.rfq_new_public', [
        'errorMsg' => $errorMsg,
        'title' => $title,
        'budget' => $budget,
        'category_id' => $category_id,
        'details' => $details
    ])->render();
} elseif($request->query->has('action') && $request->query->get('action') == 'delete' && $request->query->has('rfq_id') && $rfq = \App\Models\RFQ::exists($request->query->get('rfq_id'))) {
    $rfq->destroy($rfq->id);

    redirect(SELF);
} else {

    $rfqs = Customer::find(User::find($auth->id())->customer->id)->rfqs;

    echo $view->make('customer.rfqs', ['rfqs' => $rfqs])->render();
}
