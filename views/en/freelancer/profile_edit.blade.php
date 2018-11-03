@extends('freelancer.partials.layout')

@section('title') Edit My Profile @endsection

@section('freelancer-contents')

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
                <label for="firstname">First Name</label>
                <input type="text" name="firstname" class="form-control" id="firstname" value="{{ $firstname }}">
            </div>
            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" name="lastname" class="form-control" id="lastname" value="{{ $lastname }}">
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" class="form-control" id="category_id">
                    @foreach(\App\Models\Category::all() as $category)
                        @if($category->id == $category_id)
                        <option selected value="{{ $category->id }}">{{ $category->sub_category }}</option>
                        @else
                        <option value="{{ $category->id }}">{{ $category->sub_category }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="birthdate">Birth Date (yyyy-mm-dd)</label>
                <input type="date" name="birthdate" class="form-control" id="birthdate" value="{{ $birthdate }}">
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
                <label for="languages">Languages (comma separated)</label>
                <input type="text" name="languages" class="form-control" id="languages" value="{{ $languages }}">
            </div>
            <div class="form-group">
                <label for="response_time">Response Time (in hours)</label>
                <input type="number" name="response_time" class="form-control" id="response_time" value="{{ $response_time }}">
            </div>
            <div class="form-group">
                <label for="experience">Experience (in years)</label>
                <input type="number" name="experience" class="form-control" id="experience" value="{{ $experience }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea rows="10" name="description" class="form-control" id="description">{{ $description }}</textarea>
            </div>
            <div class="form-group">
                <label for="picture">Profile Picture (jpg, 256x256)</label>
                @if(file_exists(PUBLICPATH . '/img/users/' . $freelancer->user->user_id . '.jpg'))
                    <img style="width: 48px;" src="{{ BASEURL }}/img/users/{{ $freelancer->user->user_id }}.jpg">
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