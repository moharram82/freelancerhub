<?php

require_once '../init.php';

if($auth->check()) {
    redirect(config('auth.profile_path'));
}

$errorMsg = '';

$username = '';

if(isset($_POST['username'])) {
    $username = $request->request->get('username');
    $password = $request->request->get('password');

    if($auth->attempt($username, $password)) {
        redirect(config('auth.profile_path'));
    } else {
        http_response_code(401);
        header('HTTP/1.1 401 Unauthorized', true, 401);
        $errorMsg = $auth->getErrors('attempt');
    }
}

echo $view->make('login', [
    'error_message' => $errorMsg,
    'username' => $username
])->render();
