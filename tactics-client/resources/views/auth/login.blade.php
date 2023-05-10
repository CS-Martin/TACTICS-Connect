<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="row">
        {{-- Signin image --}}
        <div class="col d-flex justify-content-center align-items-center">
            <img src="{{ asset('img/Saly-43.png') }}" class="signin-saly" alt="">
        </div>

        <div class="col me-4">
            <div class="row mb-3">
                <div class="text-white">
                    <h2>Login</h2>
                    <p class="signin-subheader">Welcome back!</p>
                </div>

                {{-- Email input field --}}
                <div class="col-md-6 input-hero">
                    <div class="form-floating">
                        <input id="email" type="email" placeholder="Username"
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" placeholder="name@example.com" required autocomplete="email"
                            autofocus>
                        <label for="email">Email</label>
                    </div>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{-- Password input field --}}
            <div class="row mb-3">
                <div class="col-md-6 input-hero">
                    <div class="form-floating">
                        <input id="password" type="password" placeholder="Password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                            name="password" required autocomplete="current-password">
                        <label for="password">Password</label>
                    </div>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="">
                    <div class="form-check signin-subheader d-flex justify-content-between">
                        <div>
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label d-inline-block" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        <div class="d-inline-block ">
                            @if (Route::has('password.request'))
                                <a class="" href="{{ route('password.request') }}">
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
                        account yet? <a class="textlink-color" data-bs-target="#exampleModalToggle2"
                            data-bs-toggle="modal">Register</a>
                    </p>

                </div>
            </div>
        </div>

    </div>
</form>
