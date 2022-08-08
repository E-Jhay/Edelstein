@extends('layouts.app')

@section('styles')
    <style>
        .bg-white {
            background: #fff !important;
            box-shadow: 0 3px 1rem rgba(0, 0, 0, 0.1);
        }
        .fa-bars {
            color: #122620 !important;
        }
        .product{
            background-color: #f2f2f2;
            width: auto;
            height: auto;
            padding: 5rem 9rem;
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
<div class="alert alert-success">
</div>
<div class="alert alert-danger">
</div>
    <div class="product">
        @if (session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{session('error')}}
            </div>
        @endif
        <a href="/home" class="btn btn-outline-secondary mb-3">Back</a>
        <div class="row mb-4">
            <div class="col-lg-6 order-lg-2 order-1">
                <div class="image_selected"><img src="{{url('storage/images/'.$product->image1)}}" alt=""></div>
            </div>
            <div class="col-lg-6 order-3">
                <div class="product_description">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/product">Products</a></li>
                            <li class="breadcrumb-item active">{{$product->category->category_name}}</li>
                        </ol>
                    </nav>
                    <div class="product_name">{{$product->name}}</div>
                    <div>
                        <span class="product_price">{{$product->regular_price}}</span>
                        <strike class="product_discount"> <span style='color:black'>{{$product->sale_price}}<span> </strike>
                    </div>
                    <div class="product_info">Quantity: {{$product->quantity}}</div>
                    <div class="product_info">Available: {{$product->quantity - $product->orders->sum('quantity')}}</div>
                    <hr class="singleline">
                    <div> <span class="product_info">{{$product->description}}<span><br></div>
        
                    <hr class="singleline">
                    <div class="row">
                        <div class="col-xs-6">
                            {{-- <form action="/add_to_cart" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <button class="btn btn-warning" type="submit">
                                    <i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </form> --}}
                            <a class="btn btn-warning cart_button" href="" id="{{$product->id}}"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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