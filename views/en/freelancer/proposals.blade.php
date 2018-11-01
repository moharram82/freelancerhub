@extends('freelancer.partials.layout')

@section('freelancer-contents')
<div class="box">
    <h2>All Issued Proposals</h2>

    {{--<a class="btn btn-primary mb-4 mt-3" href="{{ BASEURL }}/freelancers/proposals.php?action=new&customer_id=1">Create Proposal</a>--}}

    @if($proposals->count())

    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th>Title</th>
                <th>Customer</th>
                <th>Delivery</th>
                <th>Cost</th>
            </tr>
        </thead>

        <tbody>

        @foreach ($proposals as $proposal)

            <tr>
                <td><a href="{{ BASEURL }}/freelancers/proposal.php?proposal_id={{ $proposal->id }}">{{ $proposal->title }}</a></td>
                <td>{{ $proposal->customer->name }}</td>
                <td>{{ $proposal->delivery }} days</td>
                <td>SDG {{ $proposal->price }}</td>
            </tr>

        @endforeach

        </tbody>
    </table>

    @else

    <p>You do not have any issued proposals!</p>

    @endif

</div>
@endsection