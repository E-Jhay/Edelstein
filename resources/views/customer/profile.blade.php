@extends('layouts.app')
@section('styles')
    <style>
        .form{
            margin-top: 2rem;
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
<div class="form">
    <div class="container">
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
            <a href="/home" class="btn btn-outline-secondary">Go Back</a>
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
                                    <h1 class="h4 text-gray-900 mb-4">My Account</h1>
                                </div>
                                <form class="user">
                                    <div class="form-group">
                                        <img src="{{url('/storage/images/'.$account->image)}}" alt="" class="rounded" width="60" height="60">
                                    </div>
                                    <div class="form-group">
                                        <input id="full_name" type="text" class="form-control form-control-user @error('full_name') is-invalid @enderror" name="full_name" value="{{ $account->full_name }}" required autocomplete="full_name" disabled>
                                    </div>
                                    <div class="form-group">
                                        <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ $account->email }}" required autocomplete="email" disabled>
                                    </div>
                                    <div class="form-group">
                                        <input id="phone" type="number" class="form-control form-control-user @error('phone') is-invalid @enderror" name="phone" value="{{ $account->phone }}" required autocomplete="phone" disabled>
                                    </div>
                                    <div class="form-group">
                                        <input id="address" type="text" class="form-control form-control-user @error('address') is-invalid @enderror" name="address" value="{{ $account->address }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <a href="/profile/{{$account->id}}/edit" class="btn btn-warning">Edit</a>
                                        </div>
                                    </div>
                                </form>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection