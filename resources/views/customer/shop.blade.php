@extends('layouts.app')
@section('styles')
    <link href="{{ asset('css/shop.css') }}" rel="stylesheet">
    <style>
        .bg-white {
            background: #fff !important;
            box-shadow: 0 1px 8px rgba(0, 0, 0, 0.1);
        }
        .fa-bars {
            color: #122620 !important;
        }
        .bg-white .navbar-brand,
        .bg-white .nav-link,
        .text-light {
            color: #122620 !important;
        }
        
        .alert-success, .alert-danger{
            color: black;
            z-index: 10000;
            display: none;
            font-weight: 450;
            width: 350px;
            position: fixed;
            top: 20%;
            left: 8%;
            padding: 5px 20px;
        }
    </style>
@endsection
@section('content')
<section class="shop">
    <div class="container">
    <div class="alert alert-success">
    </div>
    <div class="alert alert-danger">
    </div>
<form class="form-inline mb-3">
    <div class="input-group">
        {{-- <input type="text" name="search" wire:model="searchTerm" class="form-control bg-transparent border-1 small" placeholder="Search for..."
            aria-label="Search" aria-describedby="basic-addon2" style="border-color: #D6AD60"> --}}
        
    </div>
</form>
<h3 class="h3">Most Popular</h3>
<div class="row">
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-3 col-sm-6">
                <div class="product-grid3">
                    <div class="product-image3">
                        <a href="/show-product/{{$product->id}}">
                            <img class="pic-1" src="{{url('/storage/images/'.$product->image1)}}">
                            <img class="pic-2" src="{{url('/storage/images/'.$product->image2)}}">
                        </a>
                        <ul class="social">
                            <li><a href="/show-product/{{$product->id}}"><i class="fa fa-eye"></i></a></li>
                            <li>
                                {{-- <form id="my_form{{$product->id}}" action="/add_to_cart" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                     --}}
                                    <a class="cart_button" href="" id="{{$product->id}}"><i class="fa fa-shopping-cart"></i></a>
                                {{-- </form> --}}
                            </li>
                        </ul>
                        <span class="product-new-label">{{$product->condition}}</span>
                    </div>
                    <div class="product-content">
                        <h3 class="title"><a href="/show-product/{{$product->id}}">{{$product->name}}</a></h3>
                        <div class="price">
                            {{$product->regular_price}}
                            <span>{{$product->sale_price}}</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

    </div>
    <hr>
</section>
@endsection
@section('scripts')
{{-- <script>
    $('.add-to-cart').on('click', function () {
        var cart = $('.shopping-cart');
        var imgtodrag = $(this).parent('.product-image3').find("img").eq(0);
        if (imgtodrag) {
            var imgclone = imgtodrag.clone()
                .offset({
                top: imgtodrag.offset().top,
                left: imgtodrag.offset().left
            })
                .css({
                'opacity': '0.5',
                    'position': 'absolute',
                    'height': '150px',
                    'width': '150px',
                    'z-index': '100'
            })
                .appendTo($('body'))
                .animate({
                'top': cart.offset().top + 10,
                    'left': cart.offset().left + 10,
                    'width': 75,
                    'height': 75
            }, 1000, 'easeInOutExpo');
            
            setTimeout(function () {
                cart.effect("shake", {
                    times: 2
                }, 200);
            }, 1500);

            imgclone.animate({
                'width': 0,
                    'height': 0
            }, function () {
                $(this).detach()
            });
        }
    });
</script> --}}
<script>
    $(document).ready(function(){
        
        $('.cart_button').on('click', function(e){
            e.preventDefault();
            const id = $(this).attr('id');
            $.ajax({
                url:"/add_to_cart",
                method:'POST',
                data:{
                    "_token": "{{ csrf_token() }}",
                    id:id
                },
                dataType:'json',
                success:function(response){
                    if(response.success){
                        $('.alert-success').fadeIn();
                        $('.alert-success').text(response.success);
                        setTimeout(function() {
                            $('.alert-success').fadeOut();
                        }, 3000);
                    }
                    else if(response.error){
                        $('.alert-danger').fadeIn();
                        $('.alert-danger').text(response.error);
                        setTimeout(function() {
                            $('.alert-danger').fadeOut();
                        }, 3000);
                    }
                }
            });
        });

    });
    </script>
@endsection

