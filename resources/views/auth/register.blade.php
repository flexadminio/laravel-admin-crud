<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="text-center w-75 m-auto">
              <h4 class="text-dark-50 fs-lg text-center mt-0 font-weight-bold">Register now</h4>
              <p class="text-muted mb-4">Get started absolutely free.</p>
            </div>

        <!-- Name -->
        <div>
            <div class="input-group mb-4">
                <span class="input-group-text"><i class="fa fa-user"></i></span>
                <x-text-input id="name" class="form-control" name="name" :value="old('name')"
                    placeholder="Name" aria-label="Name" required autofocus autocomplete="name" />
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <div class="input-group mb-4">
                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
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

        <!-- Confirm Password -->
        <div>
            <div class="input-group mb-4">
                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                <x-text-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password"
                    required autocomplete="new-password" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4">
            <a class="text-info" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <div class="d-grid mb-2 mt-4 text-center">
                <x-primary-button class="btn btn-warning d-block w-100 text-white">
                    <span>{{ __('Register') }}</span>
                    <i class="fa fa-sign-in"></i>
                </x-primary-button>
            </div>
        </div>
        </div>
    </form>
</x-guest-layout>
