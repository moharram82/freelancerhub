@extends('layouts.main')

@section('title') Package Title @endsection

@section('styles')

@endsection

@section('contents')

    <div class="row package-details">
        <div class="col-lg-8 package-desc">
            <div class="box">
                <div class="clearfix">
                    <h1>Package Title</h1>
                    <div class="specs">
                        <p>Starts at <span>SDG 10,000</span></p>
                        <p>Delivery <span>7 Days</span></p>
                    </div>
                </div>
                <div class="desc">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem molestiae voluptatum quis dolores maiores placeat necessitatibus cumque corporis veniam suscipit omnis ipsum, doloribus quibusdam maxime repellendus perferendis numquam voluptate nam.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem molestiae voluptatum quis dolores maiores placeat necessitatibus cumque corporis veniam suscipit omnis ipsum, doloribus quibusdam maxime repellendus perferendis numquam voluptate nam.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem molestiae voluptatum quis dolores maiores placeat necessitatibus cumque corporis veniam suscipit omnis ipsum, doloribus quibusdam maxime repellendus perferendis numquam voluptate nam.</p>
                </div>
                <a class="btn btn-success btn-lg btn-block" href="{{ BASEURL }}/checkout.php?package_id=1&customer_id=1">Order</a>
            </div>
        </div>
        <div class="col-lg-4 freelancer-info">
            <div class="box clearfix">
                <a href="{{ BASEURL }}/freelancers/freelancer.php?freelancer_id=2">
                    <img src=''>
                    <h3>Freelancer Name</h3>
                    <p>UI/UX Designer</p>
                </a>
                
                <a class="btn btn-outline-secondary btn-block" href="{{ BASEURL }}/messages.php">Contact</a>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

@endsection