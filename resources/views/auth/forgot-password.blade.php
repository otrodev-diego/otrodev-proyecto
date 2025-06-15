<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form action="{{ route('password.email') }}" method="POST" class="kt-card-content flex flex-col gap-5 p-10" id="reset_password_enter_email_form">
        @csrf

        <div class="text-center">
            <h3 class="text-lg font-medium text-mono">
                {{ __('Your Email') }}
            </h3>
            <span class="text-sm text-secondary-foreground">
                {{ __('Enter your email to reset password') }}
            </span>
        </div>

        <!-- Email Address -->
        <div class="flex flex-col gap-1">
            <label for="email" class="kt-form-label font-normal text-mono">
                {{ __('Email') }}
            </label>
            <input
                class="kt-input"
                id="email"
                name="email"
                type="email"
                value="{{ old('email') }}"
                placeholder="email@email.com"
                required
                autofocus
            />
            @if ($errors->has('email'))
                <span class="text-red-500 text-sm mt-1">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <button type="submit" class="kt-btn kt-btn-primary flex justify-center grow">
            {{ __('Email Password Reset Link') }}
            <i class="ki-filled ki-black-right"></i>
        </button>
    </form>
</x-guest-layout>
