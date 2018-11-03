@extends('freelancer.partials.layout')

@section('title') Packages @endsection

@section('freelancer-contents')
    <div class="box">

        <h2>All Packages</h2>

        <br>

        <p><a class="btn btn-primary" href="{{ SELF }}?action=new">Add Package</a></p>

        @if($packages->count())

            <table class="table table-hover">
                <thead class="thead-light">
                <tr>
                    <th>Title</th>
                    <th>Delivery</th>
                    <th>Start Price</th>
                    <th>Actions</th>
                </tr>
                </thead>

                <tbody>

                @foreach($packages as $package)

                    <tr>
                        <td><a href="{{ BASEURL }}/freelancers/package.php?package_id={{ $package->id }}"><strong>{{ $package->title }}</strong></a></td>
                        <td>{{ $package->delivery }} days</td>
                        <td>SDG {{ number_format($package->price, 0) }}</td>
                        <td>
                            <a href="{{ BASEURL }}/freelancers/packages.php?action=edit&package_id={{ $package->id }}" style="color: #5c6b78;" title="Edit Package"><i class="far fa-edit"></i></a> |
                            <a href="{{ BASEURL }}/freelancers/packages.php?action=delete&package_id={{ $package->id }}" style="color: #ff0000;" title="Delete Package" onclick="return confirm('Are you sure you want to delete the package: {{ $package->title }}');"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>

        @else

            <p>You do not have any packages yet, create one.</p>

        @endif


    </div>

@endsection
