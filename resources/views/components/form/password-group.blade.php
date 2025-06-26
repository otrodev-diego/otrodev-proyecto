<div class="kt-card">
    <div class="kt-card-header" id="auth_password">
        <h3 class="kt-card-title">
            Password
        </h3>
    </div>
    <div class="kt-card-content grid gap-5">
        {{-- Campo Contraseña --}}
        <div class="w-full">
            <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                <label for="password" class="kt-form-label max-w-56">
                    Contraseña {{ $required ? '<span class="text-red-500">*</span>' : '' }}
                </label>
                <div class="w-full">
                    <input
                        id="password"
                        name="password"
                        type="password"
                        class="kt-input w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary"
                        placeholder="Contraseña"
                        {{ $required ? 'required' : '' }}
                    >
                    @error('password')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        {{-- Campo Confirmar Contraseña --}}
        <div class="w-full">
            <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                <label for="password_confirmation" class="kt-form-label max-w-56">
                    Confirmar contraseña {{ $required ? '<span class="text-red-500">*</span>' : '' }}
                </label>
                <div class="w-full">
                    <input
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        class="kt-input w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary"
                        placeholder="Confirmar contraseña"
                        {{ $required ? 'required' : '' }}
                    >
                    @error('password_confirmation')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>
