<x-guest-layout>
    <div class="password-reset-form-container">
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}" class="password-reset-form">
            @csrf

            <!-- Email Address -->
            <div class="form-group">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="form-actions flex items-center justify-between mt-4">
                <x-primary-button class="password-reset-btn">
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div>
        </form>
    </div>

    <!-- Custom CSS -->
    <style>
        .password-reset-form-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            font-weight: 600;
            color: #333;
        }

        .form-group .form-control {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 16px;
            box-sizing: border-box;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-group .form-control:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
        }

        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .password-reset-btn {
            padding: 12px 20px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .password-reset-btn:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .password-reset-btn:focus {
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .mt-4 {
            margin-top: 1.5rem;
        }

        .mb-4 {
            margin-bottom: 1.5rem;
        }

        /* Responsive Design */
        @media (max-width: 480px) {
            .password-reset-form-container {
                padding: 15px;
                margin: 20px auto;
            }

            .password-reset-btn {
                width: 100%;
                padding: 12px;
            }
        }
    </style>
</x-guest-layout>
