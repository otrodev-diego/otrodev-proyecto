<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="kt-card-content p-10" id="check_email_form">
        <div class="flex justify-center py-10">
            <img alt="image" class="dark:hidden max-h-[130px]" src="assets/media/illustrations/30.svg" />
            <img alt="image" class="light:hidden max-h-[130px]" src="assets/media/illustrations/30-dark.svg" />
        </div>
        <h3 class="text-lg font-medium text-mono text-center mb-3">
            Check your email
        </h3>
        <div class="text-sm text-center text-secondary-foreground mb-7.5">
            Please click the link sent to your email
            <a class="text-sm text-mono font-medium hover:text-primary" href="mailto:{{ $email }}">
                {{ $email }}
            </a>
            <br />
            to verify your account. Thank you
        </div>
        <div class="flex justify-center mb-5">
            <a class="kt-btn kt-btn-primary flex justify-center" href="{{ url('/') }}">
                Back to Home
            </a>
        </div>
        <div class="flex items-center justify-center gap-1 text-2sm">
            <span class="text-secondary-foreground">
                Didn’t receive an email?
            </span>
            <a class="font-medium kt-link" href="{{ route('password.request') }}">
                Resend
            </a>
        </div>
    </div>
</x-guest-layout>
