@extends('customer.partials.layout')

@section('title') My Balance @endsection

@section('customer-contents')

    <div class="box">

        <h2>Balance</h2>

        {{--<p><a class="btn btn-primary" href="{{ SELF }}?action=add">Add Balance</a></p>--}}

        <p>Your balance is: <strong>SDG
                @if($customer->balance < 1000)
                    <span style="color: #ff0000;">{{ number_format($customer->balance, 0) }}</span>
                @else
                    <span style="color: limegreen;">{{ number_format($customer->balance, 0) }}</span>
                @endif
            </strong></p>

    </div>

@endsection
