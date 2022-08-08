<nav class="navbar navbar-expand-md navbar-light bg-white fixed-top">
    <div class="container">
        @if ($user = Auth::user())
            <a class="navbar-brand" href="{{ route('customer.shop') }}">
                <img class="logo" src="{{ asset('img/logo_small.png') }}">
            </a>
        @else
            <a class="navbar-brand" href="{{ url('/') }}">
                <img class="logo" src="{{ asset('img/logo_small.png') }}">
            </a>
        @endif
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span><i class="fa fa-bars"></i></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                
                <!-- Authentication Links -->
                @if ($user)
                    <li class="nav-item">
                        <a class="nav-link" href="/cart_list">
                            <i class="fas fa-shopping-cart shopping-cart"></i>
                            <!-- Counter - Alerts -->
                            <span class="badge badge-danger badge-counter" id="cart_count">
                            </span>
                        </a>
                    </li>    
                    {{-- <li class="nav-item dropdown">
                        <a id="navbarDropdown1" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Categories
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown1">
                           @foreach ($categories as $category)
                            <a class="dropdown-item" id="{{$category->id}}">{{$category->category_name}}</a>   
                           @endforeach
                        </div>
                    </li> --}}
                @endif
                
                <li class="nav-item">
                    <a class="nav-link" href="/about-us">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact-us">Contacts Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/privacy-policy">Privacy Policy</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{-- {{ $user->image }} --}}
                            <img class="img-profile rounded-circle"
                        src="{{url('/storage/images/'.$user->image)}}">
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                           <a class="dropdown-item" href="{{ route('customer.shop') }}">Home</a>
                           <a class="dropdown-item" href="/profile/{{$user->id}}">Profile</a>
                           <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
