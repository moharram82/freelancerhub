@extends('customer.partials.layout')

@section('customer-contents')

    <div class="box">
        
        <h2>My Profile</h2>

        <br>

        @if(file_exists(PUBLICPATH . '/img/users/' . $customer->user->user_id . '.jpg'))
            <img style="max-width: 256px;" src="{{ BASEURL }}/img/users/{{ $customer->user->user_id }}.jpg">
        @else
            <img style="max-width: 256px;" src="{{ BASEURL }}/img/users/default.jpg">
        @endif

        <table class="data-wrapper">

            <tr>
                <td class="data-label">Name</td>
                <td>{{ $customer->name }}</td>
            </tr>

            <tr>
                <td class="data-label">Location</td>
                <td>
                    @if($customer->city)
                        {{ $customer->city->city }}
                    @else
                        -
                    @endif
                </td>
            </tr>

            <tr>
                <td class="data-label">Mobile</td>
                <td>
                    @if($customer->mobile)
                        (+249) {{ $customer->mobile }}
                    @else
                        -
                    @endif
                </td>
            </tr>

            <tr>
                <td class="data-label">Type</td>
                <td>{{ $customer->type }}</td>
            </tr>

        </table>

        <h3>Description</h3>

        <p>{{ $customer->description }}</p>

        <hr>

        <p><a class="btn btn-primary btn-lg btn-block" href="{{ BASEURL }}/customers/profile.php?action=edit">Edit Profile</a></p>

    </div>

@endsection