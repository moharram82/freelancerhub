@extends('freelancer.partials.layout')

@section('freelancer-contents')

    <div class="box">

        <h2>{{ $package->title }}</h2>

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

    </div>

@endsection
