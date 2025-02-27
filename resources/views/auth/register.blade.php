<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="register-form">
        @csrf

        <!-- Name -->
        <div class="form-group">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="form-group mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="form-group mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="form-group mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="form-actions flex items-center justify-between mt-4">
            <a class="already-registered" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="register-btn ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Custom CSS -->
    <style>
        .register-form {
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

        .already-registered {
            text-decoration: none;
            color: #ff4f7a;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .already-registered:hover {
            text-decoration: underline;
            color: #ff4f7a;
        }

        .register-btn {
            padding: 10px 20px;
            background-color: #ff758c;
            color: white;
            font-size: 16px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .register-btn:hover {
            background-color: #ff4f7a;
            transform: scale(1.05);
        }

        .register-btn:focus {
            outline: none;
            box-shadow: 0 0 5px #ff4f7a;
        }

        .ms-4 {
            margin-left: 16px;
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

        /* Responsive Design */
        @media (max-width: 480px) {
            .register-form {
                padding: 15px;
                margin: 20px auto;
            }

            .form-actions {
                flex-direction: column;
                align-items: flex-start;
            }

            .register-btn {
                width: 100%;
                padding: 12px;
            }
        }
    </style>
</x-guest-layout>
