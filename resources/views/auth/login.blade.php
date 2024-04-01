<x-guest-layout>
    <div class="m-auto text-center">
        <h3 class="text-dark-50 font-weight-bold mt-0 text-center">Sign In</h3>
        <p class="text-muted mb-4">Enter your email address and password to access admin panel.</p>
    </div>
    <!-- Session Status -->

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <div class="input-group mb-4">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')"
                    placeholder="Email address" aria-label="Email" required autofocus autocomplete="username" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <div class="input-group mb-4">
                <span class="input-group-text" id="basic-addon2"><i class="fa fa-lock"></i></span>
                <x-text-input id="password" class="form-control" type="password" name="password" placeholder="Password"
                    required autocomplete="current-password" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="justify-content-between d-flex mb-3">
            <label class="custom-checkbox">
                <input type="checkbox" id="remember_me" name="remember"> Keep me logged in
                <span></span>
            </label>
            @if (Route::has('password.request'))
                <a class="text-info ms-1" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <div class="d-grid mb-0 text-center">
            <x-primary-button class="btn btn-warning d-block w-100 text-white">
                <span>{{ __('Sign in') }}</span>
                <i class="fa fa-sign-in"></i>
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
