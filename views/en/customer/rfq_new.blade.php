@extends('customer.partials.layout')

@section('title') New RFQ @endsection

@section('customer-contents')
<div class="box">

    <h2>Create New RFQ</h2>

    <form action="{{ SELF }}?action=new&freelancer_id={{ $freelancer->id }}" method="post">


        @if(isset($errorMsg) && !empty($errorMsg))

            <div class="alert alert-danger" role="alert">
                {!! $errorMsg !!}
            </div>

        @endif

        <p>for <strong>{{ $freelancer->firstname }} {{ $freelancer->lastname }}</strong></p>

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ $title }}">
        </div>
        <div class="form-group">
            <label for="budget">Budget (Estimate)</label>
            <input type="number" name="budget" class="form-control" id="budget" value="{{ $budget }}">
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
            <label for="details">Details</label>
            <textarea rows="10" name="details" class="form-control" id="details">{{ $details }}</textarea>
        </div>

        <p></p>

        {!! csrf_field() !!}

        <button type="submit" name="btnAdd" class="btn btn-primary btn-lg btn-block">Send RFQ</button>
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
