@extends('layouts.app')
@section('styles')
    <link href="{{ asset('css/shop.css') }}" rel="stylesheet">
@endsection
@section('content')
<section class="intro" style="background-image: url('{{ asset('img/bg11.png')}}');">
    <div class="container">
        <div class="company-description">
            <h1>EDELSTEIN</h1>
            <p>Our Shining Jewelry that will stand you out. Feel th difference by wearing our jewelry.
            </p>
            <a class="button" href="/home">Discover</a>
        </div>
    </div>
</section>

<section class="products">
    <div class="container">
        <h3 class="h3">New</h3>
        <div class="row">
            @foreach ($new as $n)
                <div class="col-md-3 col-sm-6">
                    <div class="product-grid3">
                        <div class="product-image3">
                            <a href="#">
                                <img class="pic-1" src="{{url('/storage/images/'.$n->image1)}}">
                                <img class="pic-2" src="{{url('/storage/images/'.$n->image2)}}">
                            </a>
                            <ul class="social">
                                <li><a href="/show-product/{{$n->id}}"><i class="fa fa-eye"></i></a></li>
                                <li>
                                    <form action="/add_to_cart" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$n->id}}">
                                        
                                        <button class="btn btn-user bg-warning" type="submit"><i class="fa fa-shopping-cart"></i></button>
                                    </form>
                                </li>
                            </ul>
                            <span class="product-new-label">{{$n->condition}}</span>
                        </div>
                        <div class="product-content">
                            <h3 class="title"><a href="">{{$n->name}}</a></h3>
                            <div class="price">
                                {{$n->regular_price}}
                                <span>{{$n->sale_price}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <h3 class="h3 mt-3">Hot</h3>
        <div class="row">
            @foreach ($hot as $h)
                <div class="col-md-3 col-sm-6">
                    <div class="product-grid3">
                        <div class="product-image3">
                            <a href="#">
                                <img class="pic-1" src="{{url('/storage/images/'.$h->image1)}}">
                                <img class="pic-2" src="{{url('/storage/images/'.$h->image2)}}">
                            </a>
                            <ul class="social">
                                <li><a href="/show-product/{{$h->id}}"><i class="fa fa-eye"></i></a></li>
                                <li>
                                    <form action="/add_to_cart" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$h->id}}">
                                        
                                        <button class="btn btn-user bg-warning" type="submit"><i class="fa fa-shopping-cart"></i></button>
                                    </form>
                                </li>
                            </ul>
                            <span class="product-new-label">{{$h->condition}}</span>
                        </div>
                        <div class="product-content">
                            <h3 class="title"><a href="">{{$h->name}}</a></h3>
                            <div class="price">
                                {{$h->regular_price}}
                                <span>{{$h->sale_price}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        <h3 class="h3 mt-3">Popular</h3>
        <div class="row">
            @foreach ($default as $d)
                <div class="col-md-3 col-sm-6">
                    <div class="product-grid3">
                        <div class="product-image3">
                            <a href="#">
                                <img class="pic-1" src="{{url('/storage/images/'.$d->image1)}}">
                                <img class="pic-2" src="{{url('/storage/images/'.$d->image2)}}">
                            </a>
                            <ul class="social">
                                <li><a href="/show-product/{{$d->id}}"><i class="fa fa-eye"></i></a></li>
                                <li>
                                    <form action="/add_to_cart" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$d->id}}">
                                        
                                        <button class="btn btn-user bg-warning" type="submit"><i class="fa fa-shopping-cart"></i></button>
                                    </form>
                                </li>
                            </ul>
                            <span class="product-new-label">{{$d->condition}}</span>
                        </div>
                        <div class="product-content">
                            <h3 class="title"><a href="">{{$d->name}}</a></h3>
                            <div class="price">
                                {{$d->regular_price}}
                                <span>{{$d->sale_price}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <hr>
    <div class="text-center"><a href="/home" class="button shop-more">Discover More</a></div>
</section>
@endsection
@section('scripts')
<script>
    window.onscroll = function(){
        let nav = document.querySelector('nav');
        nav.classList.toggle("scrolled", window.scrollY > 200);
    };
    // $(window).on("load",function(){
    //     $(".loader-wrapper").fadeOut("slow");
    // });
</script>
@endsection