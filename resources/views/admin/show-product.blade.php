@extends('layouts.adminLayout')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/show-product.css') }}">
@endsection
@section('content')
<div class="container">
    
    <a href="/product" class="btn btn-outline-secondary mb-3">Back</a>
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
                <hr class="singleline">
                <div> <span class="product_info">{{$product->description}}<span><br></div>
                    
                <hr class="singleline">
                <div class="row">
                    <div class="col-xs-6"> 
                        <a href="/product/{{$product->id}}/edit" class="btn btn-warning">Edit</a>
                        <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#deleteModal">
                            <i class="fas fa-trash-alt text-gray-400"></i>
                            Delete
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel11">Are you sure you want to delete this?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select Yes if you are sure.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    {{-- <a class="btn btn-primary" href="login.html">Logout</a> --}}
                    {{-- <a class="btn btn-primary" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Yes') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form> --}}
                    <form action="/product/{{$product->id}}" method="POST">
                        {{csrf_field()}}
                        @method('Delete')
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </form>
            </div>
        </div>
    </div>
</div>  

@endsection
@section('scripts')
<script>
    document.getElementById("delete_button").addEventListener("click", (e) => {

        if(confirm("Are you sure you want to delete this?")){
            return true;
        }else{
            e.preventDefault();
            return false;
        }
    });
</script>
@endsection