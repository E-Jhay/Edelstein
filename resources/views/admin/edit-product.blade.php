@extends('layouts.adminLayout')
@section('styles')
    <link href="{{ asset('css/customer.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Update Product</h1>
    </div>
<a href="/product" class=" btn btn-outline-secondary">Go Back</a>
<div class="card o-hidden border-0 shadow-lg my-4">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="register-image">
                <img src="{{asset('img/register.svg')}}" alt="">
            </div>
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Update Product</h1>
                    </div>
                    <form method="POST" action="/product/{{$product->id}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="name" value="{{$product->name }}" required autocomplete="productName" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea class="form-control form-control-user" name="description" placeholder="Product Description" rows="3">{{$product->description}}</textarea>
                            @error('description')
                                <span class="text-danger">{{$message}}</span class="text-danger">
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control form-control-user" name="regular_price" value="{{ $product->regular_price }}" required autocomplete="phone" autofocus placeholder="Price">
                            @error('regular_price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control form-control-user" name="quantity" value="{{ $product->quantity }}" required autocomplete="phone" autofocus placeholder="Product Quantiity">
                            @error('quantity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <select class="form-select" name="category" required>
                                    <option value="">Select Category</option>
                                    @if (empty($categories))
                                        <option value="">No Categories</option>
                                    @else
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->id. " - " .$category->category_name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('category')
                                    <span class="text-danger" class="text-danger">{{$message}}</span class="text-danger">
                                @enderror
                            </div>

                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <select class="form-select" name="condition" required>
                                    <option value="">Product Condition</option>
                                    <option value="default">Default</option>
                                    <option value="hot">Hot</option>
                                    <option value="new">New</option>
                                </select>
                                @error('condition')
                                    <span class="text-danger" class="text-danger">{{$message}}</span class="text-danger">
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="form-group col-sm-6">
                                <label class="form-label" for="image1">First Image</label>
                                <input type="file" class="form-control-sm @error('image1') is-invalid @enderror" id="image1" name="image1"/>
                                @error('image1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="image2">Second Image</label>
                                <input type="file" class="form-control-sm @error('image2') is-invalid @enderror" id="image2" name="image2"/>
                                @error('image2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            {{ __('Update Product') }}
                        </button>
                    </form>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection