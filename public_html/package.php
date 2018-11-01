<?php

require_once '../init.php';

use App\Models\Package;

if(! $request->query->get('package_id') || ! $package = Package::exists($request->query->get('package_id'))) {
    redirect(BASEURL);
}

echo $view->make('package', ['package' => $package])->render();