<?php

require_once '../../init.php';

use App\Models\User;
use App\Models\Freelancer;

if(!$auth->allowOnly('ROLE_FREELANCER')) {
    http_response_code(403);
    header('HTTP/1.1 403 Forbidden', true, 403);
    exit('You do not have permissions to visit this page.');
}


if($request->query->has('action') && $request->query->get('action') == 'new') {

    $errors = [];
    $errorMsg = '';

    $title = '';
    $price = '';
    $delivery = '';
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

        // details validation
        if(empty($request->request->get('details'))) {
            $errors[] = 'Details can not be empty';
        } elseif (mb_strlen($request->request->get('details')) < 10) {
            $errors[] = 'Details is too short';
        }

        $details = $request->request->get('details');


        if(empty($errors)) {
            // add package
            $package = new \App\Models\Package;

            $package->freelancer_id = \App\Models\User::find($auth->id())->freelancer->id;
            $package->title = $title;
            $package->price = $price;
            $package->delivery = $delivery;
            $package->details = $details;

            $package->save();

            redirect(SELF);

        } else {
            $errorMsg = '<ul>';

            foreach ($errors as $error) {
                $errorMsg .= "<li>{$error}</li>";
            }

            $errorMsg .= '</ul>';
        }
    }

    echo $view->make('freelancer.package_new', [
        'errorMsg' => $errorMsg,
        'title' => $title,
        'price' => $price,
        'delivery' => $delivery,
        'details' => $details,
    ])->render();
} elseif($request->query->has('action') && $request->query->get('action') == 'edit' && $request->query->has('package_id') && $package = \App\Models\Package::exists($request->query->get('package_id'))) {

    $errors = [];
    $errorMsg = '';

    $title = $package->title;
    $price = $package->price;
    $delivery = $package->delivery;
    $details = $package->details;

    // check if a form has been submitted
    if($request->request->has('btnSave')) {

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

        // details validation
        if(empty($request->request->get('details'))) {
            $errors[] = 'Details can not be empty';
        } elseif (mb_strlen($request->request->get('details')) < 10) {
            $errors[] = 'Details is too short';
        }

        $details = $request->request->get('details');


        if(empty($errors)) {
            // update package

            $package->title = $title;
            $package->price = $price;
            $package->delivery = $delivery;
            $package->details = $details;

            $package->save();

            redirect(SELF);

        } else {
            $errorMsg = '<ul>';

            foreach ($errors as $error) {
                $errorMsg .= "<li>{$error}</li>";
            }

            $errorMsg .= '</ul>';
        }
    }

    echo $view->make('freelancer.package_edit', [
        'errorMsg' => $errorMsg,
        'package' => $package,
        'title' => $title,
        'price' => $price,
        'delivery' => $delivery,
        'details' => $details,
    ])->render();
} elseif($request->query->has('action') && $request->query->get('action') == 'delete' && $request->query->has('package_id') && $package = \App\Models\Package::exists($request->query->get('package_id'))) {
    $package->destroy($package->id);

    redirect(SELF);
} else {
    $packages = Freelancer::find(User::find($auth->id())->freelancer->id)->packages;

    echo $view->make('freelancer.packages', ['packages' => $packages])->render();
}
