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
        <nav
            class="navbar navbar-default navbar-fixed-top navbar-expand-md navbar-light fixed-top navbar-scroll align-items-center ">
            <div class="container-fluid">
                {{-- should be visible when scrolling --}}
                <a class="navbar-brand text-white logo align-items-center" href="{{ url('/') }}">
                    <img src="{{ asset('img/tactics-logo-trans.png') }}" class="p-1" alt="">
                    TACTICS
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ms-auto gap-5 align-items-center">
                        <li class="nav-item "><a href="/"
                                class="nav-link text-white {{ request()->is('/') ? 'active' : '' }}">Home</a>
                        </li>
                        <li class="nav-item "><a href="#"
                                class="nav-link text-white {{ request()->is('about') ? 'active' : '' }}">About Us</a>
                        </li>
                        <li class="nav-item "><a href="#"
                                class="nav-link text-white {{ request()->is('officers') ? 'active' : '' }}">Officers</a>
                        </li>
                        <li class="nav-item "><a href="#"
                                class="nav-link text-white {{ request()->is('forum') ? 'active' : '' }}">Forum</a>
                        </li>

                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <div class="modal fade" id="exampleModalToggle" aria-hidden="true"
                                        aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content modal-color">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body container">
                                                    <form method="POST" action="{{ route('login') }}">
                                                        @csrf

                                                        <div class="row">
                                                            {{-- Signin image --}}
                                                            <div
                                                                class="col d-flex justify-content-center align-items-center">
                                                                <img src="{{ asset('img/Saly-43.png') }}"
                                                                    class="signin-saly" alt="">
                                                            </div>

                                                            <div class="col me-4">
                                                                <div class="row mb-3">
                                                                    <div class="text-white">
                                                                        <h2>Login</h2>
                                                                        <p class="signin-subheader">Welcome back!</p>
                                                                    </div>
                                                                    <div class="col-md-6 input-hero">
                                                                        <input id="email" type="email"
                                                                            placeholder="Username"
                                                                            class="form-control @error('email') is-invalid @enderror"
                                                                            name="email" value="{{ old('email') }}"
                                                                            required autocomplete="email" autofocus>

                                                                        @error('email')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <div class="col-md-6 input-hero">
                                                                        <input id="password" type="password"
                                                                            placeholder="Password"
                                                                            class="form-control @error('password') is-invalid @enderror"
                                                                            name="password" required
                                                                            autocomplete="current-password">

                                                                        @error('password')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <div class="">
                                                                        <div
                                                                            class="form-check signin-subheader d-flex justify-content-between">
                                                                            <div>
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" name="remember"
                                                                                    id="remember"
                                                                                    {{ old('remember') ? 'checked' : '' }}>

                                                                                <label
                                                                                    class="form-check-label d-inline-block"
                                                                                    for="remember">
                                                                                    {{ __('Remember Me') }}
                                                                                </label>
                                                                            </div>

                                                                            <div class="d-inline-block ">
                                                                                @if (Route::has('password.request'))
                                                                                    <a class=""
                                                                                        href="{{ route('password.request') }}">
                                                                                        {{ __('Forgot Your Password?') }}
                                                                                    </a>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-0">
                                                                    <div class="">
                                                                        <button type="submit" class="login-btn">
                                                                            {{ __('Login') }}
                                                                        </button>

                                                                        <p class="subtext-color mt-2">Doesn't have an
                                                                            account yet? <a class="textlink-color"
                                                                                data-bs-target="#exampleModalToggle2"
                                                                                data-bs-toggle="modal">Register</a>
                                                                        </p>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Register modal overlay --}}
                                    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true"
                                        aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered modal-lg ">
                                            <div class="modal-content modal-color">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body container">
                                                    <form method="POST" action="{{ route('register') }}">
                                                        @csrf

                                                        <div class="row">

                                                            <div
                                                                class="col d-flex justify-content-center align-items-center">
                                                                <img src="{{ asset('img/Saly-13.png') }}"
                                                                    class="signin-saly" alt="">
                                                            </div>

                                                            <div class="col me-4">
                                                                <div class="text-white">
                                                                    <h2>Register</h2>
                                                                    <p class="signin-subheader">Create an account...</p>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    {{-- Name input field --}}
                                                                    <div class="col-md-6 input-hero register-input-hero">
                                                                        <input id="name" type="text"
                                                                            placeholder="Name"
                                                                            class="form-control @error('name') is-invalid @enderror"
                                                                            name="name" value="{{ old('name') }}"
                                                                            required autocomplete="name" autofocus>

                                                                        @error('name')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">

                                                                    {{-- Email address input field --}}
                                                                    <div class="col-md-6 input-hero register-input-hero">
                                                                        <input id="email" type="email"
                                                                            placeholder="Email Address"
                                                                            class="form-control @error('email') is-invalid @enderror"
                                                                            name="email" value="{{ old('email') }}"
                                                                            required autocomplete="email">

                                                                        @error('email')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">

                                                                    {{-- Password input field --}}
                                                                    <div class="col-md-6 input-hero register-input-hero">
                                                                        <input id="password" type="password"
                                                                            placeholder="Password"
                                                                            class="form-control @error('password') is-invalid @enderror"
                                                                            name="password" required
                                                                            autocomplete="new-password">

                                                                        @error('password')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3 ">

                                                                    {{-- Password confirm input field --}}
                                                                    <div class="col-md-6 input-hero register-input-hero">
                                                                        <input id="password-confirm" type="password"
                                                                            placeholder="Confirm password"
                                                                            class="form-control"
                                                                            name="password_confirmation" required
                                                                            autocomplete="new-password">
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-0">
                                                                    <div class="">
                                                                        <button type="submit" class="register-btn">
                                                                            {{ __('Register') }}
                                                                        </button>

                                                                        <p class="subtext-color mt-2">Already have an account? <a class="textlink-color"
                                                                                data-bs-target="#exampleModalToggle"
                                                                                data-bs-toggle="modal">Login</a>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Nav signin icon --}}
                                    <button class="btn" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">
                                        <i class="fa-solid fa-user"></i>
                                    </button>
                                </li>
                            @endif

                            {{-- Nav logout --}}
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    {{-- Comment this out for a while, still exploring :>> --}}
                                    {{-- <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a> --}}
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
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
<style scoped>
    .modal-color {
        background-color: #1c1c1c;
    }

    .modal-header {
        border-bottom: none;
    }

    .signin-subheader {
        color: #868686;
    }

    .register-saly,
    .signin-saly {
        width: 90%;
        height: auto;
    }

    .input-hero {
        width: 100%;
    }

    .input-hero>.form-control {
        padding: 15px;
    }

    .register-input-hero>.form-control {
        padding: 10px;
    }

    .modal-lg {
        --bs-modal-width: 920px;
    }

    .login-btn {
        background-color: #4BA4A8;
        width: 100%;
        padding: 15px;
        border-radius: 5px;
    }

    .register-btn {
        background-color: #4BA4A8;
        width: 100%;
        padding: 10px;
        border-radius: 5px;
    }

    .textlink-color:hover {
        color: #4BA4A8;
        cursor: pointer;
    }
</style>

</html>
