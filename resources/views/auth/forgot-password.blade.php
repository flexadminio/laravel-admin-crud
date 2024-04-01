<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
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

        <div class="d-grid mb-0 text-center">
            <x-primary-button class="btn btn-warning d-block w-100 text-white">
                <span>{{ __('Email Password Reset Link') }}</span>
                <i class="fa fa-sign-in"></i>
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
