@extends('layouts.main')

@section('content')
    <div class="kt-container-fixed">
        <div class="flex flex-wrap items-center lg:items-end justify-between gap-5 pb-7.5">
            <div class="flex flex-col justify-center gap-2">
                <h1 class="text-xl font-medium leading-none text-mono">
                    Usuario - Crear/Editar
                </h1>
                <div class="flex items-center gap-2 text-sm font-normal text-secondary-foreground">
                    Formularios de creación y edición de usuarios.
                </div>
            </div>
            <form method="POST" action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}"
                class="contents">
                @csrf
                @if (isset($user))
                    @method('PUT')
                @endif

                <div class="flex items-center gap-2.5">
                    <button type="submit" class="kt-btn kt-btn-primary">
                        Guardar cambios
                    </button>
                </div>
        </div>
    </div>
    <!-- End of Container -->
    <!-- Container -->
    <div class="kt-container-fixed">
        <div class="flex grow gap-5 lg:gap-7.5">

            <div class="flex flex-col items-stretch grow gap-5 lg:gap-7.5">
                <div class="kt-card pb-2.5">
                    <div class="kt-card-header" id="basic_settings">
                        <h3 class="kt-card-title">
                            Basic Settings
                        </h3>
                    </div>
                    <div class="kt-card-content grid gap-5">
                        <div class="w-full">
                            <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                <label for="name" class="kt-form-label flex items-center gap-1 max-w-56">
                                    Name <span class="text-red-500">*</span>
                                </label>
                                <input id="name"
                                    class="kt-input w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary"
                                    type="text"
                                    name="name"
                                    placeholder="Nombre usuario"
                                    value="{{ old('name', isset($user) ? $user->name : '') }}"
                                    aria-required="true"
                                    required />
                                @error('name')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="w-full">
                            <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                <label for="email" class="kt-form-label flex items-center gap-1 max-w-56">
                                    Email
                                </label>
                                <input id="email"
                                    class="kt-input w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary"
                                    type="email" name="email" placeholder="Email usuario"
                                    value="{{ old('email', isset($user) ? $user->email : '') }}" required />
                                @error('password_confirmation')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="kt-form-item">
                            <label class="kt-form-label">Rol:</label>
                            <div class="kt-form-control">
                                <select id="role" name="role" class="kt-select w-full" data-kt-select="true"
                                data-kt-select-config='{"optionsClass": "kt-scrollable overflow-auto max-h-[650px]"}'>
                                <option value="">Seleccionar rol</option>
                                @foreach ($roles as $key => $rol)
                                    <option value="{{ $key }}"
                                        {{ isset($user) && $user->hasRole($key) ? 'selected' : '' }}>
                                        {{ $rol }}
                                    </option>
                                @endforeach
                            </select>
                            </div>
                          </div>

                    </div>
                </div>
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

                </form>

                @if (isset($user))
                    <div class="kt-card">
                        <div class="kt-card-header" id="delete_account">
                            <h3 class="kt-card-title">
                                Eliminación cuenta
                            </h3>
                        </div>
                        <div class="kt-card-content flex flex-col lg:py-7.5 lg:gap-7.5 gap-3">
                            <div class="flex flex-col gap-5">
                                <div class="text-sm text-foreground">
                                    Esta acción eliminará permanentemente la cuenta del usuario. Todos sus datos serán
                                    eliminados de forma irreversible. Gracias por haber formado parte de nuestra comunidad.
                                    Si
                                    está seguro de continuar, confirme la eliminación a continuación. Para más información,
                                    consulte nuestras Directrices de configuración.
                                </div>
                            </div>
                            <div class="flex justify-end gap-2.5">

                                <form id="delete-user-form" method="POST"
                                    action="{{ route('users.destroy', $user->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="kt-btn kt-btn-destructive" id="delete-user-button">
                                        Eliminar cuenta
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                @endif


            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('delete-user-button').addEventListener('click', function(e) {
            e.preventDefault();

            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡Esta acción eliminará permanentemente al usuario!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e3342f',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-user-form').submit();
                }
            });
        });
    </script>
@endsection
