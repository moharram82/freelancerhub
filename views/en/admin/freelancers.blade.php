@extends('admin.partials.layout')

@section('title') RFQs @endsection

@section('admin-contents')
<div class="box">
    <h2>All Freelancers</h2>

    @if($rfqs->count())

    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

        @foreach ($rfqs as $rfq)

            <tr>
                <td>{{ $rfq->firstname }} {{ $rfq->lastname }}</td>
                <td>{{ $rfq->category->sub_category }}</td>
                <td>
                    <a href="{{ BASEURL }}/admin/freelancers.php?action=delete&freelancer_id={{ $rfq->id }}" style="color: #ff0000;" title="Delete RFQ" onclick="return confirm('Are you sure you want to delete: {{ $rfq->firstname }} {{ $rfq->lastname }}');"><i class="far fa-trash-alt"></i></a>
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