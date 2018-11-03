<?php

require_once '../../init.php';

if(!$auth->allowOnly('ROLE_CUSTOMER')) {
    http_response_code(403);
    header('HTTP/1.1 403 Forbidden', true, 403);
    exit('You need to <a href="/login.php">login</a> in order to contact a freelancer.');
}

echo $view->make('customer.messages')->render();