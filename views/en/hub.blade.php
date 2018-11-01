@extends('layouts.main')

@section('title') Browse the Hub @endsection

@section('styles')

@endsection

@section('contents')

    <h1 class="text-center">Freelancers' Hub</h1>

    <div class="row">
        <div class="col-12 col-md-2 options">
            <div class="sidebar">
                
                <h3>Filter By</h3>
                
                <div class="sidebar-section">
                    <h4>Category</h4>
                    <ul class="section-nav">
                        @foreach(\App\Models\Category::all() as $category)
                        <li><a href="{{ BASEURL }}/hub.php?filter_by=category&value={{ $category->id }}">{{ $category->sub_category }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="sidebar-section">
                    <h4>Location</h4>
                    <ul class="section-nav">
                        @foreach(\App\Models\City::all() as $city)
                            <li><a href="{{ BASEURL }}/hub.php?filter_by=location&value={{ $city->id }}">{{ $city->city }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="sidebar-section">
                    <h4>Skill</h4>
                    <ul class="section-nav">
                        @foreach(\App\Models\Skill::all() as $skill)
                            <li><a href="{{ BASEURL }}/hub.php?filter_by=skill&value={{ $skill->id }}">{{ $skill->skill_name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-10 results">

            <h3 class="mb-4">{{ $results_title }}</h3>

            <div class="row freelancers">

                @foreach($freelancers as $freelancer)

                <div class="col-md-4">
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