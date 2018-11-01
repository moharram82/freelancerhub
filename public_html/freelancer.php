<?php

require_once '../init.php';

use App\Models\Freelancer;

if(! $request->query->get('freelancer_id') || ! $freelancer = Freelancer::exists($request->query->get('freelancer_id'))) {
    redirect(BASEURL . '/hub.php');
}

$similars = Freelancer::all()->where('category_id', $freelancer->category->id)->take(5);

$reviews = 0;

if($freelancer->reviews->count()) {

    foreach ($freelancer->reviews as $review) {
        $reviews += ($review->price_rating + $review->quality_rating + $review->timing_rating + $review->communication_rating + $review->commitement_rating) / 5;
    }

    $reviews = round($reviews / $freelancer->reviews->count(), 1);
}

echo $view->make('profile', [
    'freelancer' => $freelancer,
    'similars' => $similars,
    'reviews' => $reviews
])->render();