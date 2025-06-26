<div class="kt-card">
    <div class="kt-card-header" id="auth_password">
        <h3 class="kt-card-title">
            Password
        </h3>
    </div>
    <div class="kt-card-content grid gap-5">
        <div class="w-full">
            <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                <label class="kt-form-label max-w-56">
                    Contraseña
                </label>
                <div class="w-full">
                    <input name="password"
                           class="kt-input w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary"
                           placeholder="Contraseña" type="password" value="">
                    @error('password')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="w-full">
            <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                <label class="kt-form-label max-w-56">
                    Confirmar nueva contraseña
                </label>
                <div class="w-full">
                    <input name="password_confirmation"
                           class="kt-input w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary"
                           placeholder="Confirmar nueva contraseña" type="password" value="">
                    @error('password_confirmation')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

    </div>
</div>
