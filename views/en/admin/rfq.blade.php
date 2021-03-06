@extends('admin.partials.layout')

@section('title') RFQ Details @endsection

@section('admin-contents')

    <div class="row">
        <div class="col-lg-8 project-details">
            <div class="box">

                <h1>{{ $rfq->title }}</h1>

                <p class="category">{{ $rfq->category->sub_category }}</p>

                <p class="budget">Budget <span>SDG {{ number_format($rfq->budget, 0) }}</span></p>

                <div class="desc">

                    {!! $rfq->details !!}

                    @if(auth()->check() && auth()->isGranted('ROLE_FREELANCER') && ! $rfq->replied_to)

                        <a class="mt-5 btn btn-success btn-lg btn-block" href="{{ BASEURL }}/freelancers/proposals.php?action=new&customer_id={{ $rfq->customer_id }}">Apply!</a>

                    @elseif(! auth()->check())

                        <p class="text-center"><a href="{{ config('auth.login_path') }}">Login</a> to apply.</p>

                    @endif

                </div>
            </div>
        </div>
        <div class="col-lg-4 customer-info">
            <div class="box">

                <div class="clearfix">
                    @if(file_exists(PUBLICPATH . '/img/users/' . $rfq->customer->user->user_id . '.jpg'))
                        <img class="picture" src="{{ BASEURL }}/img/users/{{ $rfq->customer->user->user_id }}.jpg" alt='Profile Picture'>
                    @else
                        <img class="picture" src="{{ BASEURL }}/img/users/default.jpg">
                    @endif
                    <h3>{{ $rfq->customer->name }}</h3>
                    <p class="location"><i class="fas fa-map-marker-alt"></i> &nbsp; {{ $rfq->customer->city->city }}</p>
                </div>

                <p class="desc">{{ $rfq->customer->description }}</p>
            </div>
        </div>
    </div>

@endsection