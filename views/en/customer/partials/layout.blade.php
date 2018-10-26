@extends('layouts.main')

@section('title') Customer Profile @endsection

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
                        <li><a href="{{ BASEURL }}/customers/index.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                        <li><a href="{{ BASEURL }}/customers/projects.php"><i class="fas fa-project-diagram"></i> Projects</a></li>
                        <li><a href="{{ BASEURL }}/customers/proposals.php"><i class="fas fa-file-invoice-dollar"></i> Proposals</a></li>
                    </ul>
                </div>
                <div class="sidebar-section">
                    <h4>Account</h4>
                    <ul class="section-nav">
                        <li><a href="{{ BASEURL }}/messages.php"><i class="fas fa-inbox"></i> Inbox</a></li>
                        <li><a href="{{ BASEURL }}/customers/profile.php"><i class="fas fa-address-card"></i> Edit Profile</a></li>
                        <li><a href="{{ config('auth.logout_path') }}"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-10">
            @yield('customer-contents')
        </div>

    </div>

@endsection

@section('scripts')

@endsection