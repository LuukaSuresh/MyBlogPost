<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="login-form">
        @csrf

        <!-- Email Address -->
        <div class="form-group">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="form-group mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <input id="remember_me" type="checkbox" class="remember-checkbox rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
        <label for="remember_me" class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</label>

        <div class="form-actions flex items-center justify-between mt-4">
            @if (Route::has('password.request'))
                <a class="forgot-password text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="login-btn ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <style>
        /* Background Gradient */
        body {
            background: linear-gradient(to right, #ffedea, #ffe8f3);
            font-family: 'Arial', sans-serif;
            color: #333; 
            margin: 0;
            padding: 0;
        }

        .login-form {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            font-weight: 600;
            color: #ff4f7a;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            border-radius: 6px;
            border: 1px solid #ff4f7a;
            font-size: 16px;
            box-sizing: border-box;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-group input:focus {
            border-color: #ff4f7a;
            outline: none;
            box-shadow: 0 0 8px #ff4f7a;
        }

        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .forgot-password {
            text-decoration: none;
            color: #ff4f7a;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .login-btn {
            padding: 10px 20px;
            background-color: #ff758c;
            color: white;
            font-size: 16px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .login-btn:hover {
            background-color: #ff4f7a;
            transform: scale(1.05);
        }

        .login-btn:focus {
            outline: none;
            box-shadow: 0 0 5px #ff4f7a;
        }

        .ms-2 {
            margin-left: 8px;
        }

        .mt-4 {
            margin-top: 1.5rem;
        }

        .mt-1 {
            margin-top: 0.25rem;
        }

        .mb-4 {
            margin-bottom: 1.5rem;
        }

        /* Custom CSS for smaller checkbox */
        .remember-checkbox {
            width: 18px;
            height: 18px;
            margin-top: 0.25rem;
            transition: transform 0.2s ease;
        }

        .remember-checkbox:checked {
            transform: scale(1.1);
        }
    </style>
</x-guest-layout>
