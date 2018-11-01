@extends('freelancer.partials.layout')

@section('freelancer-contents')

    <div class="box">

        <h2>Balance</h2>

        {{--<p><a class="btn btn-primary" href="{{ SELF }}?action=add">Add Balance</a></p>--}}

        <p>Your balance is: <strong>SDG {{ $freelancer->balance }}</strong></p>

    </div>

@endsection
