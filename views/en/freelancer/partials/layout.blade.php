@extends('layouts.main')

@section('title') Freelancer Profile @endsection

@section('styles')

@endsection

@section('contents')

    <h1>{{ explode('@', auth()->username())[0] }}'s Profile</h1>

    <div class="row">

        <div class="col-12 col-md-2">
            <div class="sidebar">
                <div class="sidebar-section">
                    <h4>Main</h4>
                    <ul class="section-nav">
                        <li><a href="{{ BASEURL }}/freelancers/index.php"><i class="fas fa-tachometer-alt"></i>&nbsp; Dashboard</a></li>
                        <li><a href="{{ BASEURL }}/freelancers/packages.php"><i class="fas fa-cubes"></i> &nbsp; Packages</a></li>
                        <li><a href="{{ BASEURL }}/freelancers/rfqs.php"><i class="fas fa-question"></i>&nbsp;&nbsp;&nbsp; RFQs</a></li>
                        <li><a href="{{ BASEURL }}/freelancers/proposals.php"><i class="fas fa-file-invoice-dollar"></i>&nbsp;&nbsp;&nbsp; Proposals</a></li>
                        <li><a href="{{ BASEURL }}/freelancers/contracts.php"><i class="fas fa-project-diagram"></i>&nbsp; Contracts</a></li>
                    </ul>
                </div>
                <div class="sidebar-section">
                    <h4>Account</h4>
                    <ul class="section-nav">
                        <li><a href="{{ BASEURL }}/freelancers/profile.php"><i class="fas fa-address-card"></i> Profile</a></li>
                        <li><a href="{{ BASEURL }}/freelancers/balance.php"><i class="far fa-credit-card"></i> Balance</a></li>
                        <li><a href="{{ BASEURL }}/freelancers/messages.php"><i class="fas fa-comments"></i> Messages</a></li>
                        <li><a href="{{ config('auth.logout_path') }}"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-10">
            @yield('freelancer-contents')
        </div>

    </div>

@endsection
