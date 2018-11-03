@extends('freelancer.partials.layout')

@section('title') Edit Package @endsection

@section('freelancer-contents')
    <div class="box">

        <h2>New Package</h2>

        <br>

        <form action="{{ SELF }}?action=edit&package_id={{ $package->id }}" method="post">


            @if(isset($errorMsg) && !empty($errorMsg))

                <div class="alert alert-danger" role="alert">
                    {!! $errorMsg !!}
                </div>

            @endif

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ $title }}">
            </div>
            <div class="form-group">
                <label for="price">Start Price</label>
                <input type="number" name="price" class="form-control" id="price" value="{{ $price }}">
            </div>
            <div class="form-group">
                <label for="delivery">Delivery (in days)</label>
                <input type="number" name="delivery" class="form-control" id="delivery" value="{{ $delivery }}">
            </div>
            <div class="form-group">
                <label for="details">Details</label>
                <textarea rows="10" name="details" class="form-control" id="details">{{ $details }}</textarea>
            </div>

            <p></p>

            {!! csrf_field() !!}

            <button type="submit" name="btnSave" class="btn btn-primary btn-lg btn-block">Save Package</button>
        </form>


    </div>

@endsection

@section('scripts')

    <script src="{{ BASEURL }}/js/vendor/ckeditor/ckeditor.js" type="text/javascript"></script>

    <script type="text/javascript">
        ClassicEditor
            .create( document.querySelector( '#details' ), {
                toolbar: [ 'heading', '|', 'bold', 'italic', 'bulletedList', 'numberedList' ],
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' }
                    ]
                }
            } )
            .catch( error => {
                console.error( error );
            } );

    </script>

@endsection
