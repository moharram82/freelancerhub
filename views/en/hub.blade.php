@extends('layouts.main')

@section('title') Browse the Hub @endsection

@section('styles')

@endsection

@section('contents')

    <h1>FreelancerHub</h1>

    <div class="row">
        <div class="col-lg-2 options">
            options
        </div>

        <div class="col-lg-10 results">
            <div class="row freelancers">

                @foreach($freelancers as $freelancer)

                <div class="col-lg-4">
                    <div class="box freelancer-card">
                        @if(file_exists(PUBLICPATH . '/img/users/' . $freelancer->user->user_id . '.jpg'))
                        <img src="{{ BASEURL }}/img/users/{{ $freelancer->user->user_id }}.jpg">
                        @else
                        <img src="{{ BASEURL }}/img/users/default.jpg">
                        @endif
                        <h3><a href="{{ BASEURL }}/freelancer.php?freelancer_id={{ $freelancer->id }}">{{ $freelancer->firstname }} {{ $freelancer->lastname }}</a></h3>
                        <p class="category">{{ $freelancer->category->job_title }}</p>
                        <p class="location"><i class="fas fa-map-marker-alt"></i> &nbsp; {{ $freelancer->city->city }}</p>
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            @if($reviews[$freelancer->id] !== 0)
                                <span>{{ $reviews[$freelancer->id] }}</span>
                            @else
                                <span>N/A</span>
                            @endif
                        </div>
                    </div>
                </div>

                @endforeach

            </div>
        </div>
    </div>

@endsection

@section('scripts')

@endsection