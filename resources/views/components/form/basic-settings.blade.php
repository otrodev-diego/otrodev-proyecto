<div class="kt-card pb-2.5">
    <div class="kt-card-header" id="basic_settings">
        <h3 class="kt-card-title">
            Configuración básica
        </h3>
    </div>
    <div class="kt-card-content grid gap-5">
        {{-- Campo Nombre --}}
        <div class="w-full">
            <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                <label for="name" class="kt-form-label flex items-center gap-1 max-w-56">
                    Nombre <span class="text-red-500">*</span>
                </label>
                <input id="name"
                       class="kt-input w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary"
                       type="text"
                       name="name"
                       placeholder="Nombre usuario"
                       value="{{ old('name', $user->name ?? '') }}"
                       required />
                @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Campo Email --}}
        <div class="w-full">
            <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                <label for="email" class="kt-form-label flex items-center gap-1 max-w-56">
                    Email <span class="text-red-500">*</span>
                </label>
                <input id="email"
                       class="kt-input w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary"
                       type="email"
                       name="email"
                       placeholder="Email usuario"
                       value="{{ old('email', $user->email ?? '') }}"
                       required />
                @error('email')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Campo Rol --}}
        <div class="kt-form-item">
            <label class="kt-form-label">Rol: <span class="text-red-500">*</span></label>
            <div class="kt-form-control">
                <select id="role"
                        name="role"
                        class="kt-select w-full"
                        data-kt-select="true"
                        data-kt-select-config='{"optionsClass": "kt-scrollable overflow-auto max-h-[650px]"}'>
                    <option value="">Seleccionar rol</option>
                    @foreach ($roles as $key => $rol)
                        <option value="{{ $key }}"
                            {{ isset($user) && $user->hasRole($key) ? 'selected' : '' }}>
                            {{ $rol }}
                        </option>
                    @endforeach
                </select>
                @error('role')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>
</div>
