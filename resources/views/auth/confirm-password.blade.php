<x-guest-layout>
    <div class="password-confirmation-container">
        <div class="mb-4 text-sm text-gray-600">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <form method="POST" action="{{ route('password.confirm') }}" class="password-confirmation-form">
            @csrf

            <!-- Password -->
            <div class="form-group">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="form-actions flex justify-end mt-4">
                <x-primary-button class="confirm-btn">
                    {{ __('Confirm') }}
                </x-primary-button>
            </div>
        </form>
    </div>

    <!-- Custom CSS -->
    <style>
        .password-confirmation-container {
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
            justify-content: flex-end;
            align-items: center;
        }

        .confirm-btn {
            padding: 12px 20px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .confirm-btn:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .confirm-btn:focus {
            outline: none;
            box-shadow: 0 0 5px color #ff4f7a;
        }

        .mt-4 {
            margin-top: 1.5rem;
        }

        .mb-4 {
            margin-bottom: 1.5rem;
        }

        /* Responsive Design */
        @media (max-width: 480px) {
            .password-confirmation-container {
                padding: 15px;
                margin: 20px auto;
            }

            .confirm-btn {
                width: 100%;
                padding: 12px;
            }
        }
    </style>
</x-guest-layout>
