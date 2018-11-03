@extends('customer.partials.layout')

@section('title') Proposal Details @endsection

@section('customer-contents')
<div class="box">

    <h2>{{ $proposal->title }}</h2>

    <table class="meta-data">
        <tr>
            <td>Developer</td>
            <td class="data"><a href="{{ BASEURL }}/freelancer.php?freelancer_id={{ $proposal->freelancer_id }}">{{ $proposal->freelancer->firstname }} {{ $proposal->freelancer->lastname }}</a></td>
        </tr>
        <tr>
            <td>Delivery</td>
            <td class="data">{{ $proposal->delivery }} days</td>
        </tr>
        <tr>
            <td>Cost</td>
            <td class="data">SDG {{ number_format($proposal->price, 0) }}</td>
        </tr>
        <tr>
            <td>Date</td>
            <td class="data">{{ $proposal->created_at }}</td>
        </tr>
    </table>

    <hr>

    {!! $proposal->details !!}

    @if(! $proposal->contract)

    <hr>

    <form action="{{ SELF }}?proposal_id={{ $proposal->id }}" method="post" onsubmit="return confirm('Are you sure you want to sign the contract with {{ $proposal->freelancer->firstname }} {{ $proposal->freelancer->lastname }}?')">

        <input type="hidden" name="_sign" value="1">

        {!! csrf_field() !!}

        <button type="submit" name="btnSign" value="sign" class="btn btn-success btn-lg btn-block">I accept all terms and would like to sign the contract</button>
    </form>

    @else

    <hr>

    <p class="text-center">You have already signed a <a href="{{ BASEURL }}/customers/contract.php?contract_id={{ $proposal->contract->id }}">contract</a> for this proposal.</p>

    @endif

</div>
@endsection