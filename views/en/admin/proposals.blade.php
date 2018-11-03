@extends('admin.partials.layout')

@section('title') Proposals @endsection

@section('admin-contents')
<div class="box">
    <h2>All Issued Proposals</h2>

    {{--<a class="btn btn-primary mb-4 mt-3" href="{{ BASEURL }}/freelancers/proposals.php?action=new&customer_id=1">Create Proposal</a>--}}

    @if($proposals->count())

    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th>Title</th>
                <th>Cost</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

        @foreach ($proposals as $proposal)

            <tr>
                <td><a href="{{ BASEURL }}/admin/proposal.php?proposal_id={{ $proposal->id }}">{{ $proposal->title }}</a></td>
                <td>SDG {{ number_format($proposal->price, 0) }}</td>
                <td>
                    <a href="{{ BASEURL }}/admin/proposals.php?action=delete&proposal_id={{ $proposal->id }}" style="color: #ff0000;" title="Delete RFQ" onclick="return confirm('Are you sure you want to delete the proposal: {{ $proposal->title }}');"><i class="far fa-trash-alt"></i></a>
                </td>
            </tr>

        @endforeach

        </tbody>
    </table>

    @else

    <p>No proposals!</p>

    @endif

</div>
@endsection