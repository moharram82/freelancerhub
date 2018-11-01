<?php

require_once '../../init.php';

use App\Models\Package;

if(!$auth->allowOnly('ROLE_FREELANCER')) {
    http_response_code(403);
    header('HTTP/1.1 403 Forbidden', true, 403);
    exit('You do not have permissions to visit this page.');
}

if(! $request->query->get('package_id') || ! $package = Package::exists($request->query->get('package_id'))) {
    redirect('packages.php');
}

echo $view->make('freelancer.package', ['package' => $package])->render();