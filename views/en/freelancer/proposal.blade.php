@extends('freelancer.partials.layout')

@section('freelancer-contents')
<div class="box">

    <h2>{{ $proposal->title }}</h2>

    <table class="meta-data">
        <tr>
            <td>Customer</td>
            <td class="data">{{ $proposal->customer->name }}</td>
        </tr>
        <tr>
            <td>Delivery</td>
            <td class="data">{{ $proposal->delivery }} days</td>
        </tr>
        <tr>
            <td>Cost</td>
            <td class="data">SDG{{ $proposal->price }}</td>
        </tr>
        <tr>
            <td>Date</td>
            <td class="data">{{ $proposal->created_at }}</td>
        </tr>
    </table>

    <div>
        <h3>Details</h3>

        {!! $proposal->details !!}

    </div>

</div>
@endsection