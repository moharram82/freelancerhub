<?php

require_once '../init.php';

$auth->logout();

redirect(config('auth.login_path'));
