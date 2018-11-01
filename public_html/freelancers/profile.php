<?php

require_once '../../init.php';

if(!$auth->allowOnly('ROLE_FREELANCER')) {
    http_response_code(403);
    header('HTTP/1.1 403 Forbidden', true, 403);
    exit('You do not have permissions to visit this page.');
}

$freelancer = \App\Models\User::find(auth()->id())->freelancer;

if($request->query->has('action') && $request->query->get('action') == 'edit') {

    $errors = [];
    $errorMsg = '';

    $firstname = $freelancer->firstname;
    $lastname = $freelancer->lastname;
    $birthdate = $freelancer->birthdate;
    $mobile = $freelancer->mobile;
    $response_time = $freelancer->response_time;
    $experience = $freelancer->experience;
    $description = $freelancer->description;
    $category_id = $freelancer->category_id;
    $city_id = $freelancer->city_id;

    // check if a form has been submitted
    if($request->request->has('btnSave')) {

        // validate input data

        $firstname = $request->request->get('firstname');

        if(empty($firstname)) {
            $errors[] = 'First name can not be empty';
        } elseif(mb_strlen($firstname) < 2) {
            $errors[] = 'First name is too short';
        } elseif(mb_strlen($firstname) > 10) {
            $errors[] = 'First name is too long';
        }

        $lastname = $request->request->get('lastname');

        if(empty($lastname)) {
            $errors[] = 'Last name can not be empty';
        } elseif(mb_strlen($lastname) < 2) {
            $errors[] = 'Last name is too short';
        } elseif(mb_strlen($lastname) > 10) {
            $errors[] = 'Last name is too long';
        }

        $birthdate = $request->request->get('birthdate');

        if(empty($birthdate)) {
            $errors[] = 'Birth date can not be empty';
        } elseif(! validDate($birthdate)) {
            $errors[] = 'Birth date is not a valid date, use this format: yyyy-mm-dd';
        }

        $mobile = $request->request->get('mobile');

        if(empty($mobile)) {
            $errors[] = 'Mobile number can not be empty';
        } elseif(! is_numeric($mobile)) {
            $errors[] = 'Mobile number can only be in numbers';
        } elseif(mb_strlen($mobile) != 9) {
            $errors[] = 'Wrong mobile number';
        }

        $response_time = $request->request->get('response_time');

        if(! is_numeric($response_time)) {
            $errors[] = 'Response time can only be in numbers';
        }

        $experience = $request->request->get('experience');

        if(! is_numeric($experience)) {
            $errors[] = 'Experience can only be in numbers';
        }

        $description = $request->request->get('description');

        if(empty($description)) {
            $errors[] = 'Description can not be empty';
        } elseif(mb_strlen($description) < 10) {
            $errors[] = 'Description is too short';
        }

        $category_id = $request->request->get('category_id');
        $city_id = $request->request->get('city_id');

        // profile picture validation & upload
        if($request->files->get('picture')) {
            $fileUploader = new \moharram82\File\FileUploader(PUBLICPATH . '/img/users/', $freelancer->user->user_id . '.jpg');

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

            $freelancer->firstname = $firstname;
            $freelancer->lastname = $lastname;
            $freelancer->birthdate = $birthdate;
            $freelancer->mobile = $mobile;
            $freelancer->response_time = $response_time;
            $freelancer->experience = $experience;
            $freelancer->description = $description;
            $freelancer->category_id = $category_id;
            $freelancer->city_id = $city_id;

            $freelancer->save();

            if($request->request->has('del-pic')) {
                unlink(PUBLICPATH . '/img/users/' . $freelancer->user->user_id . '.jpg');
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

    echo $view->make('freelancer.profile_edit', [
        'errorMsg' => $errorMsg,
        'freelancer' => $freelancer,
        'firstname' => $firstname,
        'lastname' => $lastname,
        'birthdate' => $birthdate,
        'mobile' => $mobile,
        'response_time' => $response_time,
        'experience' => $experience,
        'description' => $description,
        'category_id' => $category_id,
        'city_id' => $city_id
    ])->render();
} else {

    echo $view->make('freelancer.profile', ['freelancer' => $freelancer])->render();
}
