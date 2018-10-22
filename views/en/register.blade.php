@extends('layouts.main')

@section('title') Register @endsection

@section('styles')

@endsection

@section('contents')
    <h1>Create Account</h1>

    <form action="" method="post" class="default-form border">


        @if(isset($errorMsg) && !empty($errorMsg))

            <div class="alert alert-danger" role="alert">
                {!! $errorMsg !!}
            </div>

        @endif

        <div class="form-group">
            <label for="username">Email</label>
            <input type="text" name="username" class="form-control" id="username" value="{{ $username }}">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <div class="form-group">
            <label for="confirm">Password Confirmation</label>
            <input type="password" name="confirm" class="form-control" id="confirm">
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="userType" id="freelancer" value="freelancer" checked>
            <label class="form-check-label" for="freelancer">
                I'm a <strong>Freelancer</strong>
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="userType" id="customer" value="customer">
            <label class="form-check-label" for="customer">
                I'm a <strong>Customer</strong>
            </label>
        </div>

        <p></p>

        {!! csrf_field() !!}

        <button type="submit" name="register" value="register" class="btn btn-primary">Create Account</button>
    </form>
@endsection

@section('scripts')

@endsection