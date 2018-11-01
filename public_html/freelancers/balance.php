<?php

require_once '../../init.php';

use App\Models\Freelancer;
use App\Models\User;

if(!$auth->allowOnly('ROLE_FREELANCER')) {
    http_response_code(403);
    header('HTTP/1.1 403 Forbidden', true, 403);
    exit('You do not have permissions to visit this page.');
}

$freelancer = Freelancer::find(User::find(auth()->id())->freelancer->id);

echo $view->make('freelancer.balance', ['freelancer' => $freelancer])->render();