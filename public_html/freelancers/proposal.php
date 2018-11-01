<?php

require_once '../../init.php';

use App\Models\Proposal;

if(!$auth->allowOnly('ROLE_FREELANCER')) {
    http_response_code(403);
    header('HTTP/1.1 403 Forbidden', true, 403);
    exit('You do not have permissions to visit this page.');
}

if(! $request->query->get('proposal_id') || ! $proposal = Proposal::exists($request->query->get('proposal_id'))) {
    redirect('proposals.php');
}

echo $view->make('freelancer.proposal', ['proposal' => $proposal])->render();