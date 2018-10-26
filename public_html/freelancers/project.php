<?php

require_once '../../init.php';

use App\Models\Project;

if(!$auth->allowOnly('ROLE_FREELANCER')) {
    http_response_code(403);
    header('HTTP/1.1 403 Forbidden', true, 403);
    exit('You do not have permissions to visit this page.');
}

if(! $request->query->get('project_id') || ! $project = Project::projectExists($request->query->get('project_id'))) {
    //redirect('projects.php');
}

echo $view->make('freelancer.project', ['project' => $project])->render();