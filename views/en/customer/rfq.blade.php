@extends('customer.partials.layout')

@section('title') RFQ Details @endsection

@section('customer-contents')

    <div class="row">
        <div class="col-lg-8 project-details">
            <div class="box">

                <h1>{{ $rfq->title }}</h1>

                <p class="category">{{ $rfq->category->sub_category }}</p>

                <p class="budget">Budget <span>SDG {{ number_format($rfq->budget, 0) }}</span></p>

                <div class="desc">

                    {!! $rfq->details !!}

                </div>
            </div>
        </div>
        <div class="col-lg-4 customer-info">
            <div class="box">

                <div class="clearfix">
                    @if(file_exists(PUBLICPATH . '/img/users/' . $rfq->freelancer->user->user_id . '.jpg'))
                        <img class="picture" src="{{ BASEURL }}/img/users/{{ $rfq->freelancer->user->user_id }}.jpg" alt='Profile Picture'>
                    @else
                        <img class="picture" src="{{ BASEURL }}/img/users/default.jpg">
                    @endif
                    <h3>{{ $rfq->freelancer->firstname }} {{ $rfq->freelancer->lastname }}</h3>
                    <p class="location"><i class="fas fa-map-marker-alt"></i> &nbsp; {{ $rfq->freelancer->city->city }}</p>
                </div>

                <p class="desc">{{ $rfq->freelancer->description }}</p>
            </div>
        </div>
    </div>

@endsection