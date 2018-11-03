<?php

require_once '../init.php';

if($auth->check()) {
    switch ($auth->roles()[0]) {
        case 'ROLE_ADMIN':
            redirect(BASEURL . '/admin/messages.php');
            break;

        case 'ROLE_FREELANCER':
            redirect(BASEURL . '/freelancers/messages.php');
            break;

        case 'ROLE_CUSTOMER':
            redirect(BASEURL . '/customers/messages.php');
            break;

        default:
            redirect(BASEURL . '/index.php');
    }
}

redirect(config('auth.login_path'));
