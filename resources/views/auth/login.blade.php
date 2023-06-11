<x-guest-layout>
    <!-- Use the guest layout component to provide a consistent layout for guest pages -->
    <x-jet-authentication-card>
        <!-- Define the logo slot to display the logo image -->
        <x-slot name="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" style="width:150px; height:150px;">
        </x-slot>

        <!-- Display validation errors if any -->
        <x-jet-validation-errors class="mb-4" />

        <!-- Display a success status message if any -->
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

         <!-- Create the login form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <!-- Remember me -->
            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <!-- Forgot password -->
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <!-- Link to password reset page -->
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <!-- Submit button to initiate login -->
                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>

    <!-- Display a message and link to registration page -->
    <x-slot name="anchor">
	   Don't have an account yet. <a class="underline" href="{{ route('register') }}">Sign up</a> now.
	</x-slot>

    </x-jet-authentication-card>

</x-guest-layout>
