@extends('layouts.main')

@section('title') Admin Profile @endsection

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
                        <li><a href="{{ BASEURL }}/admin/index.php"><i class="fas fa-tachometer-alt"></i>&nbsp; Dashboard</a></li>
                        <li><a href="{{ BASEURL }}/admin/freelancers.php"><i class="fas fa-user-secret"></i>&nbsp;&nbsp;&nbsp; Freelancers</a></li>
                        <li><a href="{{ BASEURL }}/admin/customers.php"><i class="fas fa-user-tie"></i>&nbsp;&nbsp;&nbsp; Customers</a></li>
                        <li><a href="{{ BASEURL }}/admin/rfqs.php"><i class="fas fa-question"></i>&nbsp;&nbsp;&nbsp; RFQs</a></li>
                        <li><a href="{{ BASEURL }}/admin/proposals.php"><i class="fas fa-file-invoice-dollar"></i>&nbsp;&nbsp;&nbsp; Proposals</a></li>
                        <li><a href="{{ BASEURL }}/admin/contracts.php"><i class="fas fa-project-diagram"></i>&nbsp; Contracts</a></li>
                    </ul>
                </div>
                <div class="sidebar-section">
                    <h4>Account</h4>
                    <ul class="section-nav">
                        <li><a href="{{ config('auth.logout_path') }}"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-10">
            @yield('admin-contents')
        </div>

    </div>

@endsection
