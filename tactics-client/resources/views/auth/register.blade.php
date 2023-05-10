<form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="row">

        <div class="col d-flex justify-content-center align-items-center">
            <img src="{{ asset('img/Saly-13.png') }}" class="signin-saly" alt="">
        </div>

        <div class="col me-4">
            <div class="text-white">
                <h2>Register</h2>
                <p class="signin-subheader">Create an account...</p>
            </div>
            <div class="row mb-3">
                {{-- Name input field --}}
                <div class="input-hero register-input-hero d-flex gap-2">
                    <div class="form-floating w-50">
                        <input id="name" type="text" placeholder="Name"
                            class="form-control register-form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        <label for="name">Name</label>
                    </div>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    {{-- Surname input field --}}
                    <div class="form-floating w-50">
                        <input id="surname" type="text" placeholder="Surname"
                            class="form-control register-form-control @error('surname') is-invalid @enderror"
                            name="surname" value="{{ old('surname') }}" required autocomplete="surname">
                        <label for="surname">Surname</label>
                    </div>
                    @error('surname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
            </div>

            <div class="row mb-3">

                {{-- Email address input field --}}
                <div class="col-md-6 input-hero register-input-hero">
                    <div class="form-floating">
                        <input id="email" type="email" placeholder="Email Address"
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email">
                        <label for="email">Email</label>
                    </div>

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
                    <div class="form-floating">
                        <input id="password" type="password" placeholder="Password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password">
                        <label for="password">Password</label>

                    </div>
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
                    <div class="form-floating">
                        <input id="password-confirm" type="password" placeholder="Confirm password" class="form-control"
                            name="password_confirmation" required autocomplete="new-password">
                        <label for="password-confirm">Confirm
                            Password</label>
                    </div>
                </div>
            </div>

            <div class="row mb-0">
                <div class="">
                    <button type="submit" class="register-btn">
                        {{ __('Register') }}
                    </button>

                    <p class="subtext-color mt-2">Already have an
                        account? <a class="textlink-color" data-bs-target="#exampleModalToggle"
                            data-bs-toggle="modal">Login</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

</form>
