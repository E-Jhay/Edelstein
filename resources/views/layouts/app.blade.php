<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Edelstein') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('customAuth/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/customer.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
    <div id="app">
        @include('inc.navbar')
        <main style="background-color: #f7f7f7">
            @yield('content')
        </main>
        @include('inc.footer')
    </div>

    <!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    {{-- <a class="btn btn-primary" href="login.html">Logout</a> --}}
                    <a class="btn btn-primary" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
            </div>
        </div>
    </div>
</div>    

<script src="{{asset('js/app.js')}}"></script>

<script>
    $(document).ready(function () {
    ajax_call = function() {
        $.ajax({ //create an ajax request to load_page.php
            type: "GET",
            url: "{{route('cart_count')}}",
            dataType: "html", //expect html to be returned                
            success: function (response) {
                $("#cart_count").html(response);
            }
        });
    };
    var interval = 1000;
    setInterval(ajax_call, interval);
});
</script>
</script>
@yield('scripts')
</body>
</html>
