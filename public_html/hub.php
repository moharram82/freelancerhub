<?php

require_once '../init.php';

use App\Models\City;
use App\Models\Freelancer;
use App\Models\Category;
use App\Models\Skill;


if($request->query->has('filter_by') && $request->query->get('filter_by') == 'category') {
    // filter by category
    if($request->query->has('value') && $category = Category::exists($request->query->get('value'))) {
        $freelancers = $category->freelancers;
        $results_title = 'Freelancers in "' . $category->sub_category . '" category (' . $freelancers->count() . ')';
    }

} elseif($request->query->has('filter_by') && $request->query->get('filter_by') == 'location') {
    // filter by location
    if($request->query->has('value') && $location = City::exists($request->query->get('value'))) {
        $freelancers = $location->freelancers;
        $results_title = 'Freelancers in "' . $location->city . '" city (' . $freelancers->count() . ')';
    }

} elseif($request->query->has('filter_by') && $request->query->get('filter_by') == 'skill') {
    // filter by skill
    if($request->query->has('value') && $skill = Skill::exists($request->query->get('value'))) {
        $freelancers = $skill->freelancers;
        $results_title = 'Freelancers with "' . $skill->skill_name . '" skill (' . $freelancers->count() . ')';
    }

} else {
    $freelancers = Freelancer::all();
    $results_title = 'All Freelancers (' . $freelancers->count() . ')';
}


$reviews = [];

foreach ($freelancers as $freelancer) {

    if($freelancer->reviews->count()) {

        $reviews[$freelancer->id] = 0;

        foreach ($freelancer->reviews as $review) {
            $reviews[$freelancer->id] += ($review->price_rating + $review->quality_rating + $review->timing_rating + $review->communication_rating + $review->commitement_rating) / 5;
        }

        $reviews[$freelancer->id] = round($reviews[$freelancer->id] / $freelancer->reviews->count(), 1);
    } else {
        $reviews[$freelancer->id] = 0;
    }
}

echo $view->make('hub', [
    'results_title' => $results_title,
    'freelancers' => $freelancers,
    'reviews' => $reviews
])->render();
