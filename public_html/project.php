<?php

require_once '../init.php';

use App\Models\Project;

if(! $request->query->get('project_id') || ! $project = Project::projectExists($request->query->get('project_id'))) {
    //redirect('projects.php);
}

echo $view->make('project')->render();
