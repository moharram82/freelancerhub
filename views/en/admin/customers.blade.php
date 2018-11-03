@extends('admin.partials.layout')

@section('title') RFQs @endsection

@section('admin-contents')
<div class="box">
    <h2>All Customers</h2>

    @if($rfqs->count())

    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

        @foreach ($rfqs as $rfq)

            <tr>
                <td>{{ $rfq->name }}</td>
                <td>{{ $rfq->type }}</td>
                <td>
                    <a href="{{ BASEURL }}/admin/customers.php?action=delete&customer_id={{ $rfq->id }}" style="color: #ff0000;" title="Delete RFQ" onclick="return confirm('Are you sure you want to delete: {{ $rfq->name }}');"><i class="far fa-trash-alt"></i></a>
                </td>
            </tr>

        @endforeach

        </tbody>
    </table>

    @else

    <p>No freelancers</p>

    @endif

</div>
@endsection