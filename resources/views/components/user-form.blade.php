<div class="kt-container-fixed">
    <div class="flex grow gap-5 lg:gap-7.5">
        <div class="flex flex-col items-stretch grow gap-5 lg:gap-7.5">
<form
    id="{{ $id ?? 'user-form' }}"
    method="POST"
    action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}"
    class="contents">
    @csrf
    @if (isset($user))
        @method('PUT')
    @endif

                {{-- Configuración Básica --}}
                <x-form.basic-settings
                    :user="$user ?? null"
                    :roles="$roles"
                />

                {{-- Sección de Contraseña --}}
                <x-form.password-section
                    :required="!isset($user)"
                />

</form>
            @if(isset($user))
                <x-form.delete-user :user="$user" />
            @endif
        </div>
    </div>
</div>


