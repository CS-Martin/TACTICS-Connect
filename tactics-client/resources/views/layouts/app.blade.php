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
                                            <div class="modal-content modalStyle">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">

                                                    <form method="POST" action="{{ route('login') }}">
                                                        @csrf

                                                        <div class="row mb-3">
                                                            <div class="col-md-6 input-icons">
                                                                <input id="email" type="email"
                                                                    placeholder="\f007"
                                                                    class="form-control @error('email') is-invalid @enderror"
                                                                    name="email" value="{{ old('email') }}" required
                                                                    autocomplete="email" autofocus>

                                                                @error('email')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">


                                                            <div class="col-md-6">
                                                                <input id="password" type="password" placeholder="Password"
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
                                                            <div class="col-md-6 offset-md-4">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="remember" id="remember"
                                                                        {{ old('remember') ? 'checked' : '' }}>

                                                                    <label class="form-check-label" for="remember">
                                                                        {{ __('Remember Me') }}
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-0">
                                                            <div class="col-md-8 offset-md-4">
                                                                <button type="submit" class="btn btn-primary">
                                                                    {{ __('Login') }}
                                                                </button>

                                                                @if (Route::has('password.request'))
                                                                    <a class="btn btn-link"
                                                                        href="{{ route('password.request') }}">
                                                                        {{ __('Forgot Your Password?') }}
                                                                    </a>
                                                                @endif
                                                                <a class="nav-link"
                                                                    href="{{ route('register') }}">{{ __('Register') }}</a>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                                {{-- Register --}}
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle2"
                                                        data-bs-toggle="modal">Open second modal</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true"
                                        aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Modal 2
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row justify-content-center">
                                                            <div class="col-md-8">
                                                                <div class="card">
                                                                    <div class="card-header">{{ __('Register') }}</div>

                                                                    <div class="card-body">
                                                                        <form method="POST"
                                                                            action="{{ route('register') }}">
                                                                            @csrf

                                                                            <div class="row mb-3">
                                                                                <label for="name"
                                                                                    class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                                                                <div class="col-md-6">
                                                                                    <input id="name" type="text"
                                                                                        class="form-control @error('name') is-invalid @enderror"
                                                                                        name="name"
                                                                                        value="{{ old('name') }}"
                                                                                        required autocomplete="name"
                                                                                        autofocus>

                                                                                    @error('name')
                                                                                        <span class="invalid-feedback"
                                                                                            role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>

                                                                            <div class="row mb-3">
                                                                                <label for="email"
                                                                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                                                                <div class="col-md-6">
                                                                                    <input id="email" type="email"
                                                                                        class="form-control @error('email') is-invalid @enderror"
                                                                                        name="email"
                                                                                        value="{{ old('email') }}"
                                                                                        required autocomplete="email">

                                                                                    @error('email')
                                                                                        <span class="invalid-feedback"
                                                                                            role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>

                                                                            <div class="row mb-3">
                                                                                <label for="password"
                                                                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                                                                <div class="col-md-6">
                                                                                    <input id="password" type="password"
                                                                                        class="form-control @error('password') is-invalid @enderror"
                                                                                        name="password" required
                                                                                        autocomplete="new-password">

                                                                                    @error('password')
                                                                                        <span class="invalid-feedback"
                                                                                            role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>

                                                                            <div class="row mb-3">
                                                                                <label for="password-confirm"
                                                                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                                                                <div class="col-md-6">
                                                                                    <input id="password-confirm"
                                                                                        type="password"
                                                                                        class="form-control"
                                                                                        name="password_confirmation"
                                                                                        required
                                                                                        autocomplete="new-password">
                                                                                </div>
                                                                            </div>

                                                                            <div class="row mb-0">
                                                                                <div class="col-md-6 offset-md-4">
                                                                                    <button type="submit"
                                                                                        class="btn btn-primary">
                                                                                        {{ __('Register') }}
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle"
                                                        data-bs-toggle="modal">Login</button>
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
    .modalStyle {
        background-color: #1c1c1c;
    }

    .modal-header {
        border-bottom: none;
    }

    .input-icons i {
        position: absolute;
    }

    .icon {
        padding: 10px;
        min-width: 40px;
    }
</style>

</html>
