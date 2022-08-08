@extends('layouts.adminLayout')
@section('content')
@section('styles')
    <link href="{{ asset('css/customer.css') }}" rel="stylesheet">
@endsection
<div class="text-center">
    <h1 class="h4 text-gray-900 mb-4">Update Category</h1>
</div>
<a href="/category" class=" btn btn-outline-secondary">Go Back</a>
<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="register-image">
                <img src="{{asset('img/register.svg')}}" alt="">
            </div>
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Update Category</h1>
                    </div>
                    <form class="user" method="POST" action="/category/{{$category->id}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="category" value="{{ $category->category_name }}" required autocomplete="category" autofocus placeholder="Category Name">
                            @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            {{ __('Update Category') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection