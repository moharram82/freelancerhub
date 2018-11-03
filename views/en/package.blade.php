@extends('layouts.main')

@section('title') Package Details @endsection

@section('styles')

@endsection

@section('contents')

    <div class="row">
        <div class="col-lg-8 project-details">
            <div class="box">

                <h1>{{ $package->title }}</h1>

                <table class="meta-data">
                    <tr>
                        <td>Delivery</td>
                        <td class="data">{{ $package->delivery }} days</td>
                    </tr>
                    <tr>
                        <td>Start Price</td>
                        <td class="data">SDG{{ $package->price }}</td>
                    </tr>
                    <tr>
                        <td>Added on</td>
                        <td class="data">{{ \Carbon\Carbon::make($package->created_at)->format('d M Y') }}</td>
                    </tr>
                </table>

                <div>
                    <h3>Details</h3>

                    {!! $package->details !!}

                </div>

                <p><a class="btn btn-success btn-lg btn-block" href="{{ BASEURL }}">Order Package</a></p>

            </div>
        </div>
        <div class="col-lg-4 customer-info">
            <div class="box">

                <div class="clearfix">
                    @if(file_exists(PUBLICPATH . '/img/users/' . $package->freelancer->user->user_id . '.jpg'))
                        <img class="picture" src="{{ BASEURL }}/img/users/{{ $package->freelancer->user->user_id }}.jpg" alt='Profile Picture'>
                    @else
                        <img class="picture" src="{{ BASEURL }}/img/users/default.jpg">
                    @endif
                    <h3><a href="{{ BASEURL }}/freelancer.php?freelancer_id={{ $package->freelancer->id }}">{{ $package->freelancer->firstname }} {{ $package->freelancer->lastname }}</a></h3>
                    <p style="color: lightslategrey; font-size: 12px;">{{ $package->freelancer->category->job_title }}</p>
                </div>

                <p class="desc">{{ $package->freelancer->description }}</p>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

@endsection