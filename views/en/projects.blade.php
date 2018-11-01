@extends('layouts.main')

@section('title') Projects Hub @endsection

@section('styles')

@endsection

@section('contents')

    <div class="box">

        <h1>Projects Hub</h1>

        <p style="color: #859399;font-size: 20px; font-style: italic;">Here you can find all project requests published by customers, feel free to browse the list and apply to any project you find interesting to you!</p>

        <div class="row">

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
                            <td>SDG{{ $rfq->budget }}</td>
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

    @endsection

@section('scripts')

@endsection