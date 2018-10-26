<?php

require_once '../../init.php';

use App\Models\Freelancer;

if(! $request->query->get('freelancer_id') || ! $freelancer = Freelancer::freelancerExists($request->query->get('freelancer_id'))) {
    redirect(BASEURL);
}

echo $view->make('freelancer.public', ['freelancer' => $freelancer])->render();