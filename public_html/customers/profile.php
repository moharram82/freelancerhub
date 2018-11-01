<?php

require_once '../../init.php';

if(!$auth->allowOnly('ROLE_CUSTOMER')) {
    http_response_code(403);
    header('HTTP/1.1 403 Forbidden', true, 403);
    exit('You do not have permissions to visit this page.');
}

$customer = \App\Models\User::find(auth()->id())->customer;

if($request->query->has('action') && $request->query->get('action') == 'edit') {

    $errors = [];
    $errorMsg = '';

    $name = $customer->name;
    $mobile = $customer->mobile;
    $city_id = $customer->city_id;
    $type = $customer->type;
    $description = $customer->description;

    // check if a form has been submitted
    if($request->request->has('btnSave')) {

        // validate input data

        $name = $request->request->get('name');

        if(empty($name)) {
            $errors[] = 'Name can not be empty';
        } elseif(mb_strlen($name) < 5) {
            $errors[] = 'Name is too short';
        } elseif(mb_strlen($name) > 30) {
            $errors[] = 'Name is too long';
        }

        $mobile = $request->request->get('mobile');

        if(empty($mobile)) {
            $errors[] = 'Mobile number can not be empty';
        } elseif(! is_numeric($mobile)) {
            $errors[] = 'Mobile number can only be in numbers';
        } elseif(mb_strlen($mobile) != 9) {
            $errors[] = 'Wrong mobile number';
        }

        $description = $request->request->get('description');

        if(empty($description)) {
            $errors[] = 'Description can not be empty';
        } elseif(mb_strlen($description) < 10) {
            $errors[] = 'Description is too short';
        }

        $type = $request->request->get('type');
        $city_id = $request->request->get('city_id');

        // profile picture validation & upload
        if($request->files->get('picture')) {
            $fileUploader = new \moharram82\File\FileUploader(PUBLICPATH . '/img/users/', $customer->user->user_id . '.jpg');

            if($request->files->get('picture')->getClientMimeType() != 'image/jpeg') {
                $errors[] = 'Profile picture must be of type jpg only.';
            }

            if(empty($errors)) {
                if (!$profilePicture = $fileUploader->upload($request->files->get('picture'))) {
                    $errors[] = $fileUploader->getErrors();
                }
            }
        }

        if(empty($errors)) {
            // update profile

            $customer->name = $name;
            $customer->mobile = $mobile;
            $customer->type = $type;
            $customer->city_id = $city_id;
            $customer->description = $description;

            $customer->save();

            if($request->request->has('del-pic')) {
                unlink(PUBLICPATH . '/img/users/' . $customer->user->user_id . '.jpg');
            }

            redirect(SELF);

        } else {
            $errorMsg = '<ul>';

            foreach ($errors as $error) {
                $errorMsg .= "<li>{$error}</li>";
            }

            $errorMsg .= '</ul>';
        }
    }

    echo $view->make('customer.profile_edit', [
        'errorMsg' => $errorMsg,
        'customer' => $customer,
        'name' => $name,
        'mobile' => $mobile,
        'type' => $type,
        'city_id' => $city_id,
        'description' => $description
    ])->render();
} else {

    echo $view->make('customer.profile', ['customer' => $customer])->render();
}
