<?php

require_once '../init.php';

use App\Models\Category;
use App\Models\RFQ;

if($request->query->has('filter_by') && $request->query->get('filter_by') == 'category') {
    // filter by category
    if($request->query->has('value') && $category = Category::exists($request->query->get('value'))) {
        $rfqs = $category->rfqs;
        $results_title = 'All Projects in "' . $category->sub_category . '" category (' . $rfqs->count() . ')';
    }

} else {
    $rfqs = RFQ::where('freelancer_id', null)->get();
    $results_title = 'All Projects (' . $rfqs->count() . ')';
}

echo $view->make('projects', [
    'rfqs' => $rfqs,
    'results_title' => $results_title
])->render();
