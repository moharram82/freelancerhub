@extends('customer.partials.layout')

@section('customer-contents')
<div class="box">
    <h2>All Received Proposals</h2>

    @if($proposals->count())

    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th>Title</th>
                <th>Developer</th>
                <th>Delivery</th>
                <th>Cost</th>
                <th>Date Received</th>
            </tr>
        </thead>

        <tbody>

            @foreach($proposals as $proposal)

                <tr>
                    <td><a href="{{ BASEURL }}/customers/proposal.php?proposal_id={{ $proposal->id }}"><strong>{{ $proposal->title }}</strong></a></td>
                    <td><a href="{{ BASEURL }}/freelancers/freelancer.php?freelancer_id={{ $proposal->freelancer_id }}">{{ $proposal->freelancer->firstname }} {{ $proposal->freelancer->lastname }}</a></td>
                    <td>{{ $proposal->id }} days</td>
                    <td>SDG{{ $proposal->price }}</td>
                    <td>{{ $proposal->created_at }}</td>
                </tr>

            @endforeach

        </tbody>
    </table>

    @else

        <p>You do not have any received proposals!</p>

    @endif

</div>
@endsection