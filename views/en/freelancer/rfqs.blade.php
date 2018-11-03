@extends('freelancer.partials.layout')

@section('title') RFQs @endsection

@section('freelancer-contents')
<div class="box">
    <h2>All RFQs</h2>

    {{--<a class="btn btn-primary mb-4 mt-3" href="{{ BASEURL }}/freelancers/proposals.php?action=new&customer_id=1">Create Proposal</a>--}}

    @if($rfqs->count())

    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th>Title</th>
                <th>Customer</th>
                <th>Category</th>
                <th>Budget</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

        @foreach ($rfqs as $rfq)

            <tr>
                <td><a href="{{ BASEURL }}/freelancers/rfq.php?rfq_id={{ $rfq->id }}">{{ $rfq->title }}</a></td>
                <td>{{ $rfq->customer->name }}</td>
                <td>{{ $rfq->category->sub_category }}</td>
                <td>SDG {{ number_format($rfq->budget, 0) }}</td>
                <td>
                    {{--<a href="{{ BASEURL }}/freelancers/rfqs.php?action=edit&rfq_id={{ $rfq->id }}" style="color: #5c6b78;" title="Edit RFQ"><i class="far fa-edit"></i></a> |--}}
                    <a href="{{ BASEURL }}/freelancers/rfqs.php?action=delete&rfq_id={{ $rfq->id }}" style="color: #ff0000;" title="Delete RFQ" onclick="return confirm('Are you sure you want to delete the RFQ: {{ $rfq->title }}');"><i class="far fa-trash-alt"></i></a>
                </td>
            </tr>

        @endforeach

        </tbody>
    </table>

    @else

    <p>You do not have any request for proposal!</p>

    @endif

</div>
@endsection