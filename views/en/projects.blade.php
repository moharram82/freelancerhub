@extends('layouts.main')

@section('title') Projects Hub @endsection

@section('styles')

@endsection

@section('contents')

    <h1 class="text-center">Projects Hub</h1>

    <div class="row">

        <div class="col-12 col-md-2 options">
            <div class="sidebar">

                <h3>Filter By</h3>

                <div class="sidebar-section">
                    <h4>Category</h4>
                    <ul class="section-nav">
                        @foreach(\App\Models\Category::all()->sortBy('sub_category') as $category)
                            <li><a href="{{ BASEURL }}/projects.php?filter_by=category&value={{ $category->id }}">{{ $category->sub_category }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-10 results">

            <h3 style="color: #959ea9; font-size: 24px; font-weight: 400;" class="mb-4">{{ $results_title }}</h3>

            <div class="box">

                @if($rfqs->count())

                    <div class="col-12">
                        <table class="table table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th>Title</th>
                                <th>Customer</th>
                                <th>Category</th>
                                <th>Budget</th>
                                <th>Published</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($rfqs as $rfq)

                                <tr>
                                    <td><a href="{{ BASEURL }}/rfq.php?rfq_id=1">{{ $rfq->title }}</a></td>
                                    <td>{{ $rfq->customer->name }}</td>
                                    <td>{{ $rfq->category->sub_category }}</td>
                                    <td>SDG {{ number_format($rfq->budget, 0) }}</td>
                                    <td>{{ \Carbon\Carbon::make($rfq->created_at)->diffForHumans() }}</td>
                                </tr>

                            @endforeach

                            </tbody>

                        </table>

                    </div>

                @else

                    <p>No published projects for now!</p>

                @endif

            </div>
        </div>

    </div>

    @endsection

@section('scripts')

@endsection