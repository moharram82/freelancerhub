@extends('customer.partials.layout')

@section('title') Contracts @endsection

@section('customer-contents')
<div class="box">
    <h2>All Contracts</h2>

    @if($contracts->count())

    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th>Title</th>
                <th>Developer</th>
                <th>Start Date</th>
                <th>Cost (SDG)</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>

        @foreach($contracts as $contract)

            <tr>
                <td><a href="{{ BASEURL }}/customers/contract.php?contract_id={{ $contract->id }}">{{ $contract->proposal->title }}</a></td>
                <td><a href="{{ BASEURL }}/freelancer.php?freelancer_id={{ $contract->proposal->freelancer_id }}">{{ $contract->proposal->freelancer->firstname }} {{ $contract->proposal->freelancer->lastname }}</a></td>
                <td>{{ $contract->proposal->start_date }}</td>
                <td>{{ number_format($contract->proposal->price, 0) }}</td>
                <td>
                    @if($contract->is_completed)
                        Completed
                    @else
                        Not completed
                    @endif
                </td>
            </tr>

        @endforeach

        </tbody>
    </table>

    @else

        <p>You do not have any signed contracts!</p>

    @endif

</div>
@endsection