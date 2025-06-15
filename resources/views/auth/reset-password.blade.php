<x-guest-layout>
    <form action="{{ route('password.store') }}" class="kt-card-content flex flex-col gap-5 p-10" id="reset_password_change_password_form" method="POST">
        @csrf

        <!-- Token Reset -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <input type="hidden" id="email" name="email" value="{{ old('email', $request->email) }}" />

        <div class="text-center">
            <h3 class="text-lg font-medium text-mono">
                {{ __('Reset Password') }}
            </h3>
            <span class="text-sm text-secondary-foreground">
                {{ __('Enter your new password') }}
            </span>
        </div>

        <!-- Password -->
        <div class="flex flex-col gap-1">
            <label class="kt-form-label text-mono">
                {{ __('New Password') }}
            </label>
            <label class="kt-input" data-kt-toggle-password="true">
                <input id="password" name="password" placeholder="Enter a new password" type="password" required autocomplete="new-password" />
                <div class="kt-btn kt-btn-sm kt-btn-ghost kt-btn-icon bg-transparent! -me-1.5"
                    data-kt-toggle-password-trigger="true">
                    <span class="kt-toggle-password-active:hidden">
                        <i class="ki-filled ki-eye text-muted-foreground"></i>
                    </span>
                    <span class="hidden kt-toggle-password-active:block">
                        <i class="ki-filled ki-eye-slash text-muted-foreground"></i>
                    </span>
                </div>
            </label>
            @if ($errors->has('password'))
                <span class="text-red-500 text-sm mt-1">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <!-- Confirm Password -->
        <div class="flex flex-col gap-1">
            <label class="kt-form-label text-mono">
                {{ __('Confirm Password') }}
            </label>
            <label class="kt-input" data-kt-toggle-password="true">
                <input id="password_confirmation" name="password_confirmation" placeholder="Re-enter new password" type="password" required autocomplete="new-password" />
                <div class="kt-btn kt-btn-sm kt-btn-ghost kt-btn-icon bg-transparent! -me-1.5"
                    data-kt-toggle-password-trigger="true">
                    <span class="kt-toggle-password-active:hidden">
                        <i class="ki-filled ki-eye text-muted-foreground"></i>
                    </span>
                    <span class="hidden kt-toggle-password-active:block">
                        <i class="ki-filled ki-eye-slash text-muted-foreground"></i>
                    </span>
                </div>
            </label>
            @if ($errors->has('password_confirmation'))
                <span class="text-red-500 text-sm mt-1">{{ $errors->first('password_confirmation') }}</span>
            @endif
        </div>

        <!-- Submit Button -->
        <button type="submit" class="kt-btn kt-btn-primary flex justify-center grow">
            {{ __('Reset Password') }}
        </button>
    </form>
</x-guest-layout>
