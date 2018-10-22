<?php

require_once '../init.php';

if($auth->check()) {
    redirect(config('auth.profile_path'));
}

$hasher = new \Illuminate\Hashing\BcryptHasher();
$userProvider = new \moharram82\Auth\DatabaseUserProvider($request);

$username = '';
$errors = [];
$errorMsg = '';

if($request->request->get('register')) {

    $username = $request->request->get('username');

    // username validation
    if(! $request->request->get('username')) {
        $errors[] = 'Username can\'t be empty!';
    } elseif(! filter_var($request->request->get('username'), FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email address';
    } elseif($userProvider->userExists($request->request->get('username'))) {
        $errors[] = 'User already exists';
    }

    if(! $request->request->get('password')) {
        $errors[] = 'Password can\'t be empty!';
    } elseif(! $request->request->get('confirm')) {
        $errors[] = 'Password confirmation is required!';
    } elseif($request->request->get('password') !== $request->request->get('confirm')) {
        $errors[] = 'Passwords didn\'t match!';
    }

    if(empty($errors)) {
        // register the user
        $user = new \App\Models\User;

        $user->username = $username;
        $user->password = $hasher->make($request->request->get('password'));
        if($request->request->get('userType') == 'freelancer') {
            $user->roles = 'ROLE_FREELANCER';
        } else {
            $user->roles = 'ROLE_CUSTOMER';
        }
        $user->is_activated = config('auth.account.activation') ? 0 : 1;

        if($user->save()) {
            if($request->request->get('userType') == 'freelancer') {
                // create a new freelancer entry
                $freelancer = new \App\Models\Freelancer;
                $freelancer->user_id = $user->user_id;
                $freelancer->save();
            } else {
                // create a new customer entry
                $customer = new \App\Models\Customer;
                $customer->user_id = $user->user_id;
                $customer->save();
            }
        }

        // login the new user
        if($auth->attempt($username, $request->request->get('password'))) {
            redirect(config('auth.profile_path'));
        } else {
            redirect(config('auth.login_path'));
        }
    } else {
        $errorMsg = '<ul>';

        foreach ($errors as $error) {
            $errorMsg .= "<li>{$error}</li>";
        }

        $errorMsg .= '</ul>';
    }

}

echo $view->make('register', [
    'errorMsg' => $errorMsg,
    'username' => $username
])->render();
