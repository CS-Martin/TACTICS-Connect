<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/312249a238.js" crossorigin="anonymous"></script>
    {{-- JQuery, used this one to show and hide nav-logo when scrolling --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-fixed-top navbar-expand-md navbar-light fixed-top navbar-scroll  align-items-center ">
            <div class="container-fluid">
                {{-- should be visible when scrolling --}}
                <a class="navbar-brand text-white logo align-items-center" href="{{ url('/') }}">
                    <img src="{{ asset('img/tactics-logo-trans.png') }}" class="p-1" alt="">
                    TACTICS
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ms-auto gap-5 align-items-center">
                        <li class="nav-item "><a href="/" class="nav-link text-white {{ request()->is('/') ? 'active' : '' }}">Home</a></li>
                        <li class="nav-item "><a href="#" class="nav-link text-white {{ request()->is('about') ? 'active' : '' }}">About Us</a></li>
                        <li class="nav-item "><a href="#" class="nav-link text-white {{ request()->is('officers') ? 'active' : '' }}">Officers</a></li>
                        <li class="nav-item "><a href="#" class="nav-link text-white {{ request()->is('forum') ? 'active' : '' }}">Forum</a></li>

                    <!-- Right Side Of Navbar -->
                    
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}"><img src="{{ asset('') }}" alt=""><i class="fa-solid fa-user login-font"></i></a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    {{-- Comment this out for a while, still exploring :>> --}}
                                    {{-- <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a> --}}
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            @yield('content')
            
        </main>
    </div>
</body>
<script>
// Function to show nav-bar logo onscroll 
$(window).scroll(function() {
  var scroll = $(window).scrollTop();
  
  if (scroll > 50) {
    $('.navbar').addClass('navbar-scroll');
    $('.logo').css('opacity', '1');
    $('.navbar').removeClass('navbar-transparent');
  } else {
    $('.navbar').removeClass('navbar-scroll');
    $('.logo').css('opacity', '0');
    $('.navbar').addClass('navbar-transparent');
  }
});
</script>
</html>
