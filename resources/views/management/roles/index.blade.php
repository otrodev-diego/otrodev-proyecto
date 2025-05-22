@extends('layouts.main')

@section('content')
    <div class="kt-container-fixed">
        <div class="flex flex-wrap items-center lg:items-end justify-between gap-5 pb-7.5">
            <div class="flex flex-col justify-center gap-2">
                <h1 class="text-xl font-medium leading-none text-mono">
                    Roles
                </h1>
                <div class="flex items-center gap-2 text-sm font-normal text-secondary-foreground">
                    Visión general de todos los miembros y funciones del equipo.
                </div>
            </div>
            <div class="flex items-center gap-2.5">
                <a class="kt-btn kt-btn-outline" href="{{ route('roles.create') }}">
                    Nuevo Rol
                   </a>
            </div>
        </div>
    </div>

    <!-- End of Container -->
    <!-- Container -->
    <div class="kt-container-fixed">
        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-5 lg:gap-7.5">
            @foreach ($roles as $rol)
                <div class="kt-card flex flex-col gap-5 p-5 lg:p-7.5">
                <div class="flex items-center flex-wrap justify-between gap-1">
                    <div class="flex items-center gap-2.5">
                        <div class="relative size-[44px] shrink-0">
                            <svg class="w-full h-full stroke-primary/10 fill-primary/5" fill="none" height="48"
                                viewbox="0 0 44 48" width="44" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16 2.4641C19.7128 0.320509 24.2872 0.320508 28 2.4641L37.6506 8.0359C41.3634 10.1795 43.6506 14.141 43.6506
                      18.4282V29.5718C43.6506 33.859 41.3634 37.8205 37.6506 39.9641L28 45.5359C24.2872 47.6795 19.7128 47.6795 16 45.5359L6.34937
                      39.9641C2.63655 37.8205 0.349365 33.859 0.349365 29.5718V18.4282C0.349365 14.141 2.63655 10.1795 6.34937 8.0359L16 2.4641Z"
                                    fill="">
                                </path>
                                <path
                                    d="M16.25 2.89711C19.8081 0.842838 24.1919 0.842837 27.75 2.89711L37.4006 8.46891C40.9587 10.5232 43.1506 14.3196 43.1506
                      18.4282V29.5718C43.1506 33.6804 40.9587 37.4768 37.4006 39.5311L27.75 45.1029C24.1919 47.1572 19.8081 47.1572 16.25 45.1029L6.59937
                      39.5311C3.04125 37.4768 0.849365 33.6803 0.849365 29.5718V18.4282C0.849365 14.3196 3.04125 10.5232 6.59937 8.46891L16.25 2.89711Z"
                                    stroke="">
                                </path>
                            </svg>
                            <div
                                class="absolute leading-none start-2/4 top-2/4 -translate-y-2/4 -translate-x-2/4 rtl:translate-x-2/4">
                                <i class="ki-filled ki-setting text-xl text-primary">
                                </i>
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <a class="text-base font-medium text-mono hover:text-primary mb-px"
                                href="html/demo1/public-profile/profiles/creator.html">
                                {{$rol->name}}
                            </a>
                        </div>
                    </div>
                    <div class="kt-menu inline-flex" data-kt-menu="true">
                        <div class="kt-menu-item" data-kt-menu-item-offset="0, 10px"
                            data-kt-menu-item-placement="bottom-end" data-kt-menu-item-placement-rtl="bottom-start"
                            data-kt-menu-item-toggle="dropdown" data-kt-menu-item-trigger="click">
                            <button class="kt-menu-toggle kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost">
                                <i class="ki-filled ki-dots-vertical text-lg">
                                </i>
                            </button>
                            <div class="kt-menu-dropdown kt-menu-default w-full max-w-[175px]" data-kt-menu-dismiss="true">
                                <div class="kt-menu-item">
                                    <a class="kt-menu-link" href="{{ route('roles.edit', $rol->id) }}">
                                        <span class="kt-menu-icon">
                                            <i class="ki-filled ki-document">
                                            </i>
                                        </span>
                                        <span class="kt-menu-title">
                                            Editar
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-sm text-secondary-foreground">
                    {{ $rol->description ?? 'sin descripción' }}
                </p>
            </div>
            @endforeach
            
        </div>
    </div>


    <div class="kt-modal" data-kt-modal="true" id="modal">
        <div class="kt-modal-content max-w-[600px] top-[5%]">
            <form method="POST" action="{{ route('roles.store') }}">
                @csrf
                <div class="kt-modal-header">
                    <h3 class="kt-modal-title">Nuevo Rol</h3>
                    <button type="button" class="kt-modal-close" aria-label="Close modal"
                        data-kt-modal-dismiss="#modal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-x" aria-hidden="true">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>

                <div class="kt-modal-body space-y-4">
                    <div>
                        <label for="role-name" class="block text-sm font-medium text-gray-700 mb-1">
                            Nombre del Rol
                        </label>
                        <input type="text" id="role-name" name="name"
                            class="kt-input w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary"
                            placeholder="Nombre del rol..." required />
                    </div>
                    <div>
                        <label for="role-description" class="block text-sm font-medium text-gray-700 mb-1">
                            Descripción
                        </label>
                        <input type="text" id="role-description" name="description"
                            class="kt-input w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary"
                            value="{{ old('description', $role->description ?? '') }}"
                            placeholder="Descripción..." required />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Permisos</label>
                        <div class="space-y-2">
                            {{-- @foreach ($permission as $value)
                                <label class="flex items-center gap-2">
                                    <input type="checkbox" name="permission[{{ $value->id }}]"
                                           value="{{ $value->id }}" class="form-checkbox text-primary">
                                    <span>{{ $value->name }}</span>
                                </label>
                            @endforeach --}}
                        </div>
                    </div>
                </div>

                <div class="kt-modal-footer flex justify-end gap-4">
                    <button type="button" class="kt-btn kt-btn-secondary" data-kt-modal-dismiss="#modal">
                        Cancelar
                    </button>
                    <button type="submit" class="kt-btn btn-primary">
                        <i class="fa-solid fa-floppy-disk mr-1"></i> Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
