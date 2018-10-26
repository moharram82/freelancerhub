<?php

require_once '../init.php';

if(!$auth->allowOnly(['ROLE_FREELANCER', 'ROLE_CUSTOMER'])) {
    http_response_code(403);
    header('HTTP/1.1 403 Forbidden', true, 403);
    exit('You do not have permissions to visit this page.');
}

echo $view->make('messages')->render();