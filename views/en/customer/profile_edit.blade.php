@extends('customer.partials.layout')

@section('title') Edit My Profile @endsection

@section('customer-contents')

    <div class="box">
        
        <h2>Edit My Profile</h2>

        <p>&nbsp;</p>

        <form action="{{ SELF }}?action=edit" method="post" enctype="multipart/form-data">

            @if(isset($errorMsg) && !empty($errorMsg))

                <div class="alert alert-danger" role="alert">
                    {!! $errorMsg !!}
                </div>

            @endif

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $name }}">
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <select name="type" class="form-control" id="type">
                    @if($type == 'individual')
                    <option selected value="individual">Individual</option>
                    @else
                    <option value="individual">Individual</option>
                    @endif

                    @if($type == 'company')
                    <option selected value="company">Company</option>
                    @else
                    <option value="company">Company</option>
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="city_id">Location</label>
                <select name="city_id" class="form-control" id="city_id">
                    @foreach(\App\Models\City::all() as $city)
                        @if($city->id == $city_id)
                        <option selected value="{{ $city->id }}">{{ $city->city }}</option>
                        @else
                        <option value="{{ $city->id }}">{{ $city->city }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="mobile">Mobile (912300000)</label>
                <input type="text" name="mobile" class="form-control" id="mobile" value="{{ $mobile }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea rows="10" name="description" class="form-control" id="description">{{ $description }}</textarea>
            </div>
            <div class="form-group">
                <label for="picture">Profile Picture (jpg, 256x256)</label>
                @if(file_exists(PUBLICPATH . '/img/users/' . $customer->user->user_id . '.jpg'))
                    <img style="width: 48px;" src="{{ BASEURL }}/img/users/{{ $customer->user->user_id }}.jpg">
                    <label><input type="checkbox" name="del-pic" id="picture"> Delete Profile Picture</label>
                @else
                    <input type="file" name="picture" class="form-control-file" id="picture">
                @endif
            </div>

            <br>

            {!! csrf_field() !!}

            <button type="submit" name="btnSave" class="btn btn-primary btn-lg btn-block">Save Profile</button>
        </form>

    </div>

@endsection