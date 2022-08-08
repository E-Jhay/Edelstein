@extends('layouts.app')
@section('styles')
    <style>
        .form{
            padding: 4rem 0;
            height: auto !important;
        }
        .bg-white {
            background: #fff !important;
            box-shadow: 0 3px 1rem rgba(0, 0, 0, 0.1);
        }
        main{
            background-color: #fff;
        }
        .fa-bars {
            color: #122620 !important;
        }
        .bg-white .navbar-brand,
        .bg-white .nav-link,
        .text-light {
            color: #122620 !important;
        }
    </style>
@endsection
@section('content')
<div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-8">
            
            <a href="/home" class="btn btn-outline-secondary mt-5">Go Back</a>
            <div class="p-2">
                <h4>Shopping cart</h4>
                <div class="d-flex flex-row align-items-center pull-right"><span class="mr-1"></div>
            </div>
            @if(count($orders) > 0)
            @foreach ($orders as $order)
                <div class="d-flex flex-row justify-content-between align-items-center p-2 bg-white mt-4 px-3 rounded">
                    <div class="mr-1"><img class="rounded" src="{{url('/storage/images/'.$order->product->image1)}}" width="70"></div>
                    <div class="d-flex flex-column align-items-center order-details"><span class="font-weight-bold">{{$product_name = $order->product->name}}</span>
                    </div>
                    <div class="d-flex flex-row align-items-center qty">
                        <h5 class="text-grey mt-1 mr-1 ml-1">{{$quantity = $order->quantity}}</h5>
                    </div>
                    <div>
                        <h5 class="text-grey">{{$total = $order->product->regular_price * $order->quantity}}</h5>
                    </div>
                    <div class="d-flex align-items-center"><i class="fa fa-trash mb-1 text-danger"></i></div>
                </div>
            @endforeach
            @endif
            <div class="d-flex flex-row align-items-center mt-3 p-2 bg-white rounded">
                <button class="btn btn-warning btn-block btn-lg ml-2 pay-button" type="button">Proceed to Pay</button>
            </div>
        </div>
    </div>
</div>
@endsection