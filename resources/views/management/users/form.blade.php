<form method="POST" action="{{ isset($user) ? route('users.update', $user) : route('users.store') }}" class="contents">
    @csrf
    @if(isset($user))
        @method('PUT')
    @endif

    <div class="w-full">
        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
            <label for="name" class="kt-form-label">Name</label>
            <input id="name" type="text" name="name"
                value="{{ old('name', $user->name ?? '') }}"
                class="kt-input w-full border rounded-md px-4 py-2"
                placeholder="Nombre usuario" required>
        </div>
    </div>

    <div class="w-full">
        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
            <label for="email" class="kt-form-label">Email</label>
            <input id="email" type="email" name="email"
                value="{{ old('email', $user->email ?? '') }}"
                class="kt-input w-full border rounded-md px-4 py-2"
                placeholder="Email usuario" required>
        </div>
    </div>

    <div class="w-full">
        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
            <label for="role" class="kt-form-label">Rol</label>
            <select id="role" name="role" class="kt-select max-w-70">
                <option value="">Seleccionar rol</option>
                @foreach ($roles as $key => $rol)
                    <option value="{{ $key }}" {{ (old('role', $user->roles->first()->id ?? '') == $key) ? 'selected' : '' }}>
                        {{ $rol }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="flex justify-end pt-2.5">
        <button type="submit" class="kt-btn kt-btn-primary">
            {{ isset($user) ? 'Actualizar' : 'Crear' }}
        </button>
    </div>
</form>
