<?php

require_once '../init.php';

use App\Models\Package;

if(! $request->query->get('package_id') || ! $package = Package::packageExists($request->query->get('package_id'))) {
    //redirect(BASEURL);
}

echo $view->make('freelancer.package')->render();