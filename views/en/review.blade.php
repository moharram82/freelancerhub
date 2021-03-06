@extends('layouts.main')

@section('title') Review @endsection

@section('styles')

@endsection

@section('contents')

    <h1>Freelancer Review</h1>

    <form action="{{ SELF }}?contract_id={{ $contract->id }}" method="post" class="default-form border">

        <p class="alert alert-secondary"><i>Please make sure you read our <a href="{{ BASEURL }}/terms.php">TERMS OF SERVICE</a> before you write the review.</i></p>


        @if(isset($errorMsg) && !empty($errorMsg))

            <div class="alert alert-danger" role="alert">
                {!! $errorMsg !!}
            </div>

        @endif

        <div class="form-group">
            <label for="price_rating">Price Rating</label>
            <select name="price_rating" class="form-control" id="price_rating">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <div class="form-group">
            <label for="quality_rating">Quality Rating</label>
            <select name="quality_rating" class="form-control" id="quality_rating">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <div class="form-group">
            <label for="timing_rating">Timing Rating</label>
            <select name="timing_rating" class="form-control" id="timing_rating">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <div class="form-group">
            <label for="communication_rating">Communication Rating</label>
            <select name="communication_rating" class="form-control" id="communication_rating">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <div class="form-group">
            <label for="commitement_rating">Commitment Rating</label>
            <select name="commitement_rating" class="form-control" id="commitement_rating">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea rows="10" name="body" class="form-control" id="body">{{ $body }}</textarea>
        </div>

        {!! csrf_field() !!}

        <button type="submit" name="btnAdd" value="Add" class="btn btn-primary btn-lg btn-block">Add Review</button>

    </form>
    
@endsection

@section('scripts')

@endsection