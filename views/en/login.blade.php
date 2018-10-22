@extends('layouts.main')

@section('title') Login @endsection

@section('styles')

@endsection

@section('contents')
    <h1>Login</h1>

    <form action="" method="post" class="default-form border">


        @if(isset($error_message) && !empty($error_message))

            <div class="alert alert-danger" role="alert">
                {!! $error_message !!}
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
        <div class="form-group form-check">
            <input class="form-check-input" type="checkbox" name="{{ config('auth.remember_me.field') }}" id="remember_me" value="1">
            <label class="form-check-label" for="remember_me">
                Remember me
            </label>
        </div>

        {!! csrf_field() !!}

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
@endsection

@section('scripts')

@endsection