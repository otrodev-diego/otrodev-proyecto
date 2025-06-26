@extends('layouts.main')

@section('content')
    <div class="kt-container-fixed">
        <div class="flex flex-wrap items-center lg:items-end justify-between gap-5 pb-7.5">
            <div class="flex flex-col justify-center gap-2">
                <h1 class="text-xl font-medium leading-none text-mono">
                    Usuario - Editar
                </h1>
                <div class="flex items-center gap-2 text-sm font-normal text-secondary-foreground">
                    Formulario de edición de usuario
                </div>
            </div>
            <div class="flex items-center gap-2.5">
                <button type="submit" form="user-form" class="kt-btn kt-btn-primary">
                    Guardar cambios
                </button>
            </div>

        </div>

    </div>

    <x-user-form
        :user="$user"
        :roles="$roles"
        id="user-form"
    />
@endsection
