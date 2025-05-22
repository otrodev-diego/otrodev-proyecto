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
            <div class="flex items-center gap-2.5">
                <a class="kt-btn kt-btn-primary" href="#">
                    Guardar cambios
                </a>
            </div>
        </div>
    </div>
    <!-- End of Container -->
    <!-- Container -->
    <div class="kt-container-fixed">
        <div class="flex grow gap-5 lg:gap-7.5">
            <div class="hidden lg:block w-[230px] shrink-0">
                <div class="w-[230px]" data-kt-sticky="true" data-kt-sticky-animation="true"
                    data-kt-sticky-class="fixed z-4 left-auto top-[calc(var(--header-height)+1rem)]"
                    data-kt-sticky-name="scrollspy" data-kt-sticky-offset="200" data-kt-sticky-target="body">
                    <div class="flex flex-col grow relative before:absolute before:left-[11px] before:top-0 before:bottom-0 before:border-l before:border-border"
                        data-kt-scrollspy="true" data-kt-scrollspy-offset="110px" data-kt-scrollspy-target="body">
                        <a class="flex items-center rounded-lg pl-2.5 pr-2.5 py-2.5 gap-1.5 active border border-transparent text-sm text-foreground hover:text-primary hover:font-medium kt-scrollspy-active:bg-secondary-active kt-scrollspy-active:text-primary kt-scrollspy-active:font-medium hover:rounded-lg"
                            data-kt-scrollspy-anchor="true" href="#basic_settings">
                            <span
                                class="flex w-1.5 relative before:absolute before:top-0 before:size-1.5 before:rounded-full before:-translate-x-2/4 before:-translate-y-2/4 kt-scrollspy-active:before:bg-primary">
                            </span>
                            Basic Settings
                        </a>
                        <div class="flex flex-col">
                            <div class="pl-6 pr-2.5 py-2.5 text-sm font-semibold text-mono">
                                Authentication
                            </div>
                            <div class="flex flex-col">

                                <a class="flex items-center rounded-lg pl-2.5 pr-2.5 py-2.5 gap-3.5 border border-transparent text-sm text-foreground hover:text-primary hover:font-medium kt-scrollspy-active:bg-secondary-active kt-scrollspy-active:text-primary kt-scrollspy-active:font-medium hover:rounded-lg"
                                    data-kt-scrollspy-anchor="true" href="#auth_password">
                                    <span
                                        class="flex w-1.5 relative before:absolute before:top-0 before:size-1.5 before:rounded-full before:-translate-x-2/4 before:-translate-y-2/4 kt-scrollspy-active:before:bg-primary">
                                    </span>
                                    Password
                                </a>
                            </div>
                        </div>

                        <a class="flex items-center rounded-lg pl-2.5 pr-2.5 py-2.5 gap-1.5 border border-transparent text-sm text-foreground hover:text-primary hover:font-medium kt-scrollspy-active:bg-secondary-active kt-scrollspy-active:text-primary kt-scrollspy-active:font-medium hover:rounded-lg"
                            data-kt-scrollspy-anchor="true" href="#delete_account">
                            <span
                                class="flex w-1.5 relative before:absolute before:top-0 before:size-1.5 before:rounded-full before:-translate-x-2/4 before:-translate-y-2/4 kt-scrollspy-active:before:bg-primary">
                            </span>
                            Eliminación cuenta
                        </a>
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-stretch grow gap-5 lg:gap-7.5">
                <div class="kt-card pb-2.5">
                    <div class="kt-card-header" id="basic_settings">
                        <h3 class="kt-card-title">
                            Basic Settings
                        </h3>
                    </div>
                    <div class="kt-card-content grid gap-5">
                        <form method="POST"
                            action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}"
                            class="contents">
                            @csrf
                            @if (isset($user))
                                @method('PUT')
                            @endif


                            <div class="w-full">
                                <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                    <label for="name" class="kt-form-label flex items-center gap-1 max-w-56">
                                        Name
                                    </label>
                                    <input id="name"
                                        class="kt-input w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary"
                                        type="text" name="name" placeholder="Nombre usuario"
                                        value="{{ old('name', isset($user) ? $user->name : '') }}" required />
                                        @error('password_confirmation')
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
                            <div class="w-full">
                                <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                    <label for="role" class="kt-form-label flex items-center gap-1 max-w-56">
                                        Rol
                                    </label>
                                    <select id="role" name="role" class="kt-select max-w-70">
                                        <option value="">Seleccionar rol</option>
                                        @foreach ($roles as $key => $rol)
                                            <option value="{{ $key }}"
                                                {{ isset($user) && $user->hasRole($key) ? 'selected' : '' }}>
                                                {{ $rol }}</option>
                                        @endforeach
                                    </select>
                                    @error('password_confirmation')
                                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>


                            <div class="flex justify-end pt-2.5">
                                <button type="submit" class="kt-btn kt-btn-primary">
                                    Save Changes
                                </button>
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
                                    New Password
                                </label>
                                <input name="password" class="kt-input" placeholder="New password" type="password" value="">
                                @error('password')
                                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full">
                            <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                <label class="kt-form-label max-w-56">
                                    Confirm New Password
                                </label>
                                <input name="password_confirmation" class="kt-input" placeholder="Confirm new password" type="password" value="">
                                @error('password_confirmation')
                                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
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
                                eliminados de forma irreversible. Gracias por haber formado parte de nuestra comunidad. Si
                                está seguro de continuar, confirme la eliminación a continuación. Para más información,
                                consulte nuestras Directrices de configuración.
                            </div>
                        </div>
                        <div class="flex justify-end gap-2.5">
                            
                                <button class="kt-btn kt-btn-destructive">
                                    Eliminar cuenta
                                </button>
                           
                        </div>
                    </div>
                </div>
                @endif

                
            </div>
        </div>
    </div>
@endsection
