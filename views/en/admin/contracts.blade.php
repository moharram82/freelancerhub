@extends('admin.partials.layout')

@section('title') Contracts @endsection

@section('admin-contents')
<div class="box">
    <h2>All Contracts</h2>

    @if($contracts->count())

    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th>Title</th>
                <th>Customer</th>
                <th>Start Date</th>
                <th>Cost</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>

        @foreach($contracts as $contract)

            <tr>
                <td><a href="{{ BASEURL }}/admin/contract.php?contract_id={{ $contract->id }}">{{ $contract->proposal->title }}</a></td>
                <td>{{ $contract->proposal->customer->name }}</td>
                <td>{{ $contract->proposal->freelancer->firstname }} {{ $contract->proposal->freelancer->lastname }}</td>
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

    <p>No contracts!</p>

    @endif


</div>
@endsection