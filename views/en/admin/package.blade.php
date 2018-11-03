@extends('admin.partials.layout')

@section('title') Package Details @endsection

@section('admin-contents')

    <div class="box">

        <h2>{{ $package->title }}</h2>

        <table class="meta-data">
            <tr>
                <td>Delivery</td>
                <td class="data">{{ $package->delivery }} days</td>
            </tr>
            <tr>
                <td>Start Price</td>
                <td class="data">SDG {{ number_format($package->price, 0) }}</td>
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
