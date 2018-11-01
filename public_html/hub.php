<?php

require_once '../init.php';

use App\Models\Freelancer;

$freelancers = Freelancer::all();

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
    'freelancers' => $freelancers,
    'reviews' => $reviews
])->render();
