@extends('layouts.adminLayout')
@section('styles')
    <link href="{{ asset('css/customer.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Update Account</h1>
    </div>
<a href="/account" class=" btn btn-outline-secondary">Go Back</a>
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
                            <h1 class="h4 text-gray-900 mb-4">Update Account</h1>
                        </div>
                        <form class="user" method="POST" action="/account/{{$account->id}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <input type="hidden" name="id" value="{{$account->id}}">
                                <input id="full_name" type="text" class="form-control form-control-user @error('full_name') is-invalid @enderror" name="full_name" value="{{ $account->full_name }}" required autocomplete="full_name" autofocus placeholder="Full Name">
                                @error('full_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ $account->email }}" required autocomplete="email" placeholder="Email Address">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="phone" type="number" class="form-control form-control-user @error('phone') is-invalid @enderror" name="phone" value="{{ $account->phone }}" required autocomplete="phone" autofocus placeholder="Phone Number">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="address" type="text" class="form-control form-control-user @error('address') is-invalid @enderror" name="address" value="{{ $account->address }}" required autocomplete="phone" autofocus placeholder="Address">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="form-label" for="image">Image</label>
                                <input type="file" class="form-control-sm @error('image') is-invalid @enderror" id="image" name="image"/>
                                @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                {{ __('Update Account') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection