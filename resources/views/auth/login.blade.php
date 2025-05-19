<x-guest-layout>
    <!-- Mensaje de estado de sesión -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="kt-card-content flex flex-col gap-5 p-10" id="sign_in_form">
        @csrf

        <!-- Email -->
        <div class="flex flex-col gap-1">
            <label for="email" class="kt-form-label font-normal text-mono">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                   class="kt-input @error('email') border-red-500 @enderror" placeholder="email@email.com" />

            @error('email')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div class="flex flex-col gap-1">
            <div class="flex items-center justify-between gap-1">
                <label for="password" class="kt-form-label font-normal text-mono">Password</label>
                @if (Route::has('password.request'))
                    <a class="text-sm kt-link shrink-0" href="{{ route('password.request') }}">
                        Forgot Password?
                    </a>
                @endif
            </div>

            <div class="kt-input relative" data-kt-toggle-password="true">
                <input id="password" name="password" type="password" required autocomplete="current-password"
                       class="w-full pr-10 @error('password') border-red-500 @enderror" placeholder="Enter Password" />

                <!-- Botón mostrar/ocultar contraseña (requiere JS adicional si quieres funcionalidad real) -->
                <button class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-600" type="button">
                    <i class="ki-filled ki-eye text-muted-foreground"></i>
                </button>
            </div>

            @error('password')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Remember Me -->
        <label class="kt-label flex items-center gap-2">
            <input id="remember_me" type="checkbox" name="remember" class="kt-checkbox kt-checkbox-sm" />
            <span class="kt-checkbox-label">Remember me</span>
        </label>

        <!-- Botón Login -->
        <button type="submit" class="kt-btn kt-btn-primary flex justify-center grow">
            Sign In
        </button>
    </form>
</x-guest-layout>
