@extends('freelancer.partials.layout')

@section('freelancer-contents')

    <div class="box">
        
        <h2>My Profile</h2>

        <br>

        @if(file_exists(PUBLICPATH . '/img/users/' . $freelancer->user->user_id . '.jpg'))
            <img class="float-right mt-5 rounded-circle" style="max-width: 256px;" src="{{ BASEURL }}/img/users/{{ $freelancer->user->user_id }}.jpg">
        @else
            <img class="float-right mt-5 rounded-circle" style="max-width: 256px;" src="{{ BASEURL }}/img/users/default.jpg">
        @endif

        <table class="data-wrapper">

            <tr>
                <td class="data-label">First Name</td>
                <td>{{ $freelancer->firstname }}</td>
            </tr>

            <tr>
                <td class="data-label">Last Name</td>
                <td>{{ $freelancer->lastname }}</td>
            </tr>

            <tr>
                <td class="data-label">Birth Date</td>
                <td>
                    @if($freelancer->birthdate)
                    {{ \Carbon\Carbon::make($freelancer->birthdate)->format('d M Y') }}
                    @else
                    -
                    @endif
                </td>
            </tr>

            <tr>
                <td class="data-label">Location</td>
                <td>
                    @if($freelancer->city)
                        {{ $freelancer->city->city }}
                    @else
                        -
                    @endif
                </td>
            </tr>

            <tr>
                <td class="data-label">Languages</td>
                <td>
                    @if($freelancer->languages)
                        {{ $freelancer->languages }}
                    @else
                        -
                    @endif
                </td>
            </tr>

            <tr>
                <td class="data-label">Mobile</td>
                <td>
                    @if($freelancer->mobile)
                    (+249) {{ $freelancer->mobile }}
                    @else
                    -
                    @endif
                </td>
            </tr>

            <tr>
                <td class="data-label">Experience</td>
                <td>
                    @if($freelancer->experience)
                        {{ $freelancer->experience }} years
                    @else
                        -
                    @endif
                </td>
            </tr>

            <tr>
                <td class="data-label">Response Time</td>
                <td>
                    @if($freelancer->response_time)
                        {{ $freelancer->response_time }} hours
                    @else
                        -
                    @endif
                </td>
            </tr>

            <tr>
                <td class="data-label">Category</td>
                <td>
                    @if($freelancer->category)
                        {{ $freelancer->category->job_title }}
                    @else
                        -
                    @endif
                </td>
            </tr>

        </table>

        <h3>Description</h3>

        <p>{{ $freelancer->description }}</p>

        <hr>

        <p><a class="btn btn-primary btn-lg btn-block" href="{{ BASEURL }}/freelancers/profile.php?action=edit">Edit Profile</a></p>

    </div>

@endsection