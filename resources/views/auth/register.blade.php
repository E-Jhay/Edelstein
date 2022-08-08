@extends('layouts.app')
@section('styles')
    <style>
        .form{
            padding: 4rem 0;
            background-image: linear-gradient(to top right, #122620, #D6AD60);
            height: auto !important;
        }
        main{
            margin: 0 !important;
        }
    </style>
@endsection

@section('content')
    <div class="form">
        <div class="container">

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
                                    <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                </div>
                                <form class="user" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <input id="full_name" type="text" class="form-control form-control-user @error('full_name') is-invalid @enderror" name="full_name" value="{{ old('full_name') }}" required autocomplete="full_name" autofocus placeholder="Full Name">
                                        @error('full_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input id="phone" type="number" class="form-control form-control-user @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus placeholder="Phone Number">
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input id="address" type="text" class="form-control form-control-user @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="phone" autofocus placeholder="Address">
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <input id="password-confirm" type="password" class="form-control form-control-user" name="password_confirmation" required autocomplete="new-password" placeholder="Repeat Password">
                                        </div>
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
                                        {{ __('Register') }}
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    @if (Route::has('password.request'))
                                        <a class="small" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                                    @endif
                                </div>
                                <div class="text-center">
                                    @if (Route::has('login'))
                                        <a class="small" href="{{ route('login') }}">Already have an account? Login</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
        </div>
    </div>
@endsection
@section('scripts')
<script>
    window.onscroll = function(){
        let nav = document.querySelector('nav');
        nav.classList.toggle("scrolled", window.scrollY > 150);
    };
    // $(window).on("load",function(){
    //     $(".loader-wrapper").fadeOut("slow");
    // });
</script>
@endsection