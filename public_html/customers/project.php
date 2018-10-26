<?php

require_once '../../init.php';

use App\Models\Project;

if(!$auth->allowOnly('ROLE_CUSTOMER')) {
    http_response_code(403);
    header('HTTP/1.1 403 Forbidden', true, 403);
    exit('You do not have permissions to visit this page.');
}

if(! $request->query->get('project_id') || ! $project = Project::projectExists($request->query->get('project_id'))) {
    //redirect('projects.php');
}

echo $view->make('customer.project', ['project' => $project])->render();