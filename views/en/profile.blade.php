@extends('layouts.main')

@section('title') {{ $freelancer->firstname }} {{ $freelancer->lastname }} @endsection

@section('styles')

@endsection

@section('contents')

    <div class="row box freelancer-profile-header">

        <div class="col-lg-2 text-center text-lg-left">
            @if(file_exists(PUBLICPATH . '/img/users/' . $freelancer->user->user_id . '.jpg'))
                <img class="picture" src="{{ BASEURL }}/img/users/{{ $freelancer->user->user_id }}.jpg" alt='Profile Picture'>
            @else
                <img class="picture" src="{{ BASEURL }}/img/users/default.jpg">
            @endif
        </div>

        <div class="col-lg-6 text-center text-lg-left">
            <div class="primary-info">
                <h1>{{ $freelancer->firstname }} {{ $freelancer->lastname }}</h1>
                <p class="subtitle">{{ $freelancer->category->job_title }}</p>
                <p class="location"><i class="fas fa-map-marker-alt"></i> &nbsp; {{ $freelancer->city->city }}</p>
                <a href="{{ BASEURL }}/messages.php" class="btn btn-success btn-lg btn-block">Contact Me now!</a>
            </div>
        </div>

        <div class="col-lg-4 text-center text-lg-left">
            <div class="secondary-info">
                <div class="rating">

                    <i class="fas fa-star"></i>

                    @if($freelancer->reviews->count())
                    <span>{{ $reviews }}</span>
                    @else
                    <span>N/A</span>
                    @endif

                </div>
                
                <table>
                    <tr>
                        <td><strong>Age</strong></td>
                        <td class="pl-5">
                            {{ \Carbon\Carbon::createFromFormat('Y-m-d', $freelancer->birthdate)->age }}
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Response Time</strong></td>
                        <td class="pl-5">{{ $freelancer->response_time }} hours</td>
                    </tr>
                    <tr>
                        <td><strong>Experience</strong></td>
                        <td class="pl-5">{{ $freelancer->experience }} years</td>
                    </tr>
                </table>

                <ul class="social-media">
                    <li><a href="{{ $freelancer->facebook }}" class="fb"><i class="fab fa-facebook-square"></i></a></li>
                    <li><a href="{{ $freelancer->twitter }}" class="tw"><i class="fab fa-twitter-square"></i></a></li>
                    <li><a href="{{ $freelancer->github }}" class="gh"><i class="fab fa-github-square"></i></a></li>
                    <li><a href="{{ $freelancer->dribbble }}" class="dr"><i class="fab fa-dribbble-square"></i></a></li>
                    <li><a href="{{ $freelancer->linkedin }}" class="li"><i class="fab fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row freelancer-profile-body">
        <div class="col-lg-3">
            <div class="left">

                <h3>Packages</h3>
                
                <hr>

                @if($freelancer->packages->count())

                    @foreach($freelancer->packages as $package)

                        <div class="box package">
                            <h4>{{ $package->title }}</h4>
                            <table>
                                <tr>
                                    <td>Delivery</td>
                                    <td class="bold">{{ $package->delivery }} Days</td>
                                </tr>
                                <tr>
                                    <td>Starting at</td>
                                    <td class="bold">SDG{{ $package->price }}</td>
                                </tr>
                            </table>
                            <a class="btn btn-outline-secondary btn-block" href="{{ BASEURL }}/package.php?package_id={{ $package->id }}">Details</a>
                        </div>

                    @endforeach

                @else

                    <p>{{ $freelancer->firstname }} has no packages</p>

                @endif

            </div>
        </div>
        <div class="col-lg-6">
            <div class="middle">
                <div class="box">

                    <h3>About</h3>

                    <p>{{ $freelancer->description }}</p>

                    <hr>

                    <h3>Skills</h3>
                    <ul class="skills">
                        @foreach($freelancer->skills as $skill)
                            <li><a href="{{ BASEURL }}/hub.php?filter_by=skill&value={{ $skill->id }}">{{ $skill->skill_name }}</a></li>
                        @endforeach
                    </ul>

                    <hr>

                    <h3>Languages</h3>
                    <ul class="px-4">
                        @foreach(explode(',', $freelancer->languages) as $language)
                            <li>{{ $language }}</li>
                        @endforeach
                    </ul>
                </div>

                <div class="box">

                    <h3>Reviews ({{ $freelancer->reviews->count() }})</h3>

                    @if($freelancer->reviews->count())

                    @foreach($freelancer->reviews as $review)

                    <div class="review">
                        <div class="review-header clearfix">
                            <img src=''>
                            <h4>{{ $review->customer->name }}</h4>
                            <p>{{ \Carbon\Carbon::make($review->created_at)->diffForHumans() }}</p>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <span>{{ ($review->price_rating + $review->quality_rating + $review->timing_rating + $review->communication_rating + $review->commitement_rating) / 5 }}</span>
                            </div>
                        </div>
                        <p class="review-body">
                            {{ $review->body }}
                        </p>
                    </div>

                    <hr>

                    @endforeach

                    <a class="btn btn-outline-secondary btn-lg btn-block" href="{{ BASEURL }}/reviews.php?freelancer_id=2">View all</a>

                    @else

                    <p>No reviews</p>

                    @endif

                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="right">
                <h3>Similar Profiles</h3>

                <hr>

                @foreach($similars as $similar_freelancer)
                    <div class="similar-profile">
                        <a href="{{ BASEURL }}/freelancer.php?freelancer_id={{ $similar_freelancer->id }}">
                            @if(file_exists(PUBLICPATH . '/img/users/' . $similar_freelancer->user->user_id . '.jpg'))
                                <img src="{{ BASEURL }}/img/users/{{ $similar_freelancer->user->user_id }}.jpg">
                            @else
                                <img src="{{ BASEURL }}/img/users/default.jpg">
                            @endif
                            <h4>{{ $similar_freelancer->firstname }} {{ $similar_freelancer->lastname }}</h4>
                            <p>{{ $similar_freelancer->category->job_title }}</p>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

@endsection

@section('scripts')

@endsection