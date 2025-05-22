@extends('layouts.main')

@section('content')
    <div class="kt-container-fixed">
        <div class="flex flex-wrap items-center lg:items-end justify-between gap-5 pb-7.5">
            <div class="flex flex-col justify-center gap-2">
                <h1 class="text-xl font-medium leading-none text-mono">
                    Crear Rol
                </h1>
                <div class="flex items-center gap-2 text-sm font-normal text-secondary-foreground">
                    Creación y actualización de roles y permisos
                </div>
            </div>
        </div>
    </div>

    <div class="kt-container-fixed">
        <!-- begin: grid -->
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-5 lg:gap-7.5">
            <div class="col-span-2">
                <div class="flex flex-col gap-5 lg:gap-7.5">
                    <form method="POST" action="{{ $isEdit ? route('roles.update', $role->id) : route('roles.store') }}">
                        @csrf
                        @if ($isEdit)
                            @method('PUT')
                        @endif

                        <div class="kt-card">
                            <div class="kt-card-header">
                                <h3 class="kt-card-title">Nuevo Rol</h3>
                            </div>

                            <div class="kt-card-content grid gap-5">
                                {{-- Nombre del Rol --}}
                                <div class="flex items-center flex-wrap lg:flex-nowrap gap-2.5">
                                    <label for="role-name" class="kt-form-label max-w-32 w-full">
                                        Nombre del Rol
                                    </label>
                                    <div class="grow min-w-48">
                                        <input type="text" id="role-name" name="name"
                                            class="kt-input w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary @error('name') border-red-500 @enderror"
                                            placeholder="Nombre del rol..."
                                            value="{{ old('name', $isEdit ? $role->name : '') }}" />
                                        @error('name')
                                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Descripción --}}
                                <div class="flex items-center flex-wrap lg:flex-nowrap gap-2.5">
                                    <label for="role-description" class="kt-form-label max-w-32 w-full">
                                        Descripción
                                    </label>
                                    <div class="grow min-w-48">
                                        <textarea id="role-description" name="description"
                                            class="kt-textarea w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary"
                                            placeholder="Descripción del rol..." rows="4" required>{{ old('description', $isEdit ? $role->description : '') }}</textarea>
                                    </div>
                                </div>



                                {{-- Permisos (Descomentar si los necesitas) --}}
                                {{-- 
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Permisos</label>
                                <div class="space-y-2">
                                    {{-- 
                                    @foreach ($permissions as $permission)
                                        <label class="flex items-center gap-2">
                                            <input
                                                type="checkbox"
                                                name="permission[{{ $permission->id }}]"
                                                value="{{ $permission->id }}"
                                                class="form-checkbox text-primary"
                                            />
                                            <span>{{ $permission->name }}</span>
                                        </label>
                                    @endforeach 
                                    
                                </div>
                            </div>
                            --}}
                            </div>

                        </div>
                        <br>

                        <div class="kt-card">
                            <div class="kt-card-header gap-2">
                                <h3 class="kt-card-title">
                                    Permisos
                                </h3>
                            </div>
                            <div class="kt-card-table kt-scrollable-x-auto">

                                <table class="kt-table">
                                    <thead>
                                        <tr>
                                            <th class="text-left text-muted-foreground font-normal min-w-[300px]">
                                                Entidad
                                            </th>
                                            @foreach ($allActions as $action)
                                                <th class="min-w-24 text-secondary-foreground font-normal text-center">
                                                    {{ ucfirst($action) }}
                                                </th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody class="text-mono font-medium">
                                        @foreach ($groupedPermissions as $entity => $actions)
                                            <tr>
                                                <td class="py-5.5!">
                                                    {{ ucfirst($entity) }}
                                                </td>
                                                @foreach ($allActions as $action)
                                                    <td class="py-5.5! text-center">
                                                        @if (isset($actions[$action]))
                                                            <input type="checkbox" name="permissions[]"
                                                                value="{{ $actions[$action]->id }}"
                                                                class="kt-checkbox kt-checkbox-sm"
                                                                {{ in_array($actions[$action]->id, $assignedPermissions) ? 'checked' : '' }} />
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>


                            </div>
                            <div class="kt-card-footer justify-end py-7.5 gap-2.5">
                                <button type="submit" class="kt-btn kt-btn-primary">
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
            <div class="col-span-1">
               <div class="flex flex-col gap-5 lg:gap-7.5">
                   <div class="kt-card">
                       <div class="kt-card-content py-10 flex flex-col gap-5 lg:gap-7.5">
                           <div class="flex flex-col items-start gap-2.5">
                               <div class="mb-2.5">
                                   <div class="relative size-[50px] shrink-0">
                                       <svg class="w-full h-full stroke-primary/10 fill-primary-soft" fill="none"
                                           height="48" viewbox="0 0 44 48" width="44"
                                           xmlns="http://www.w3.org/2000/svg">
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
                                           <i class="ki-filled ki-users text-xl ps-px text-primary">
                                           </i>
                                       </div>
                                   </div>
                               </div>
                               <a class="text-base font-semibold text-mono hover:text-primary" href="#">
                                   Define permisos claros
                               </a>
                               <p class="text-sm text-secondary-foreground">
                                   Asigna permisos específicos a cada rol para controlar el acceso a funcionalidades sin confusión.
                               </p>
                           </div>
                           <span class="hidden not-last:block not-last:border-b border-b-border">
                           </span>
                           <div class="flex flex-col items-start gap-2.5">
                               <div class="mb-2.5">
                                   <div class="relative size-[50px] shrink-0">
                                       <svg class="w-full h-full stroke-primary/10 fill-primary-soft" fill="none"
                                           height="48" viewbox="0 0 44 48" width="44"
                                           xmlns="http://www.w3.org/2000/svg">
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
                                           <i class="ki-filled ki-lock text-xl ps-px text-primary">
                                           </i>
                                       </div>
                                   </div>
                               </div>
                               <a class="text-base font-semibold text-mono hover:text-primary" href="#">
                                   Aplica el principio de menor privilegio
                               </a>
                               <p class="text-sm text-secondary-foreground">
                                   Otorga solo los permisos necesarios para cada rol, evitando accesos innecesarios que puedan comprometer la seguridad.
                               </p>
                           </div>
                           <span class="hidden not-last:block not-last:border-b border-b-border">
                           </span>
                           <div class="flex flex-col items-start gap-2.5">
                               <div class="mb-2.5">
                                   <div class="relative size-[50px] shrink-0">
                                        <svg class="w-full h-full" fill="none"
                                        height="48" viewBox="0 0 44 48" width="44"
                                        xmlns="http://www.w3.org/2000/svg">
                                     <path
                                       d="M16 2.4641C19.7128 0.320509 24.2872 0.320508 28 2.4641L37.6506 8.0359C41.3634 10.1795 43.6506 14.141 43.6506
                                          18.4282V29.5718C43.6506 33.859 41.3634 37.8205 37.6506 39.9641L28 45.5359C24.2872 47.6795 19.7128 47.6795 16 45.5359L6.34937
                                          39.9641C2.63655 37.8205 0.349365 33.859 0.349365 29.5718V18.4282C0.349365 14.141 2.63655 10.1795 6.34937 8.0359L16 2.4641Z"
                                       fill="#3b82f6" /> <!-- azul sólido -->
                                   
                                     <path
                                       d="M16.25 2.89711C19.8081 0.842838 24.1919 0.842837 27.75 2.89711L37.4006 8.46891C40.9587 10.5232 43.1506 14.3196 43.1506
                                          18.4282V29.5718C43.1506 33.6804 40.9587 37.4768 37.4006 39.5311L27.75 45.1029C24.1919 47.1572 19.8081 47.1572 16.25 45.1029L6.59937
                                          39.5311C3.04125 37.4768 0.849365 33.6803 0.849365 29.5718V18.4282C0.849365 14.3196 3.04125 10.5232 6.59937 8.46891L16.25 2.89711Z"
                                       stroke="#2563eb" stroke-width="2" /> <!-- azul más oscuro para borde -->
                                   </svg>
                                   
                                       <div
                                           class="absolute leading-none start-2/4 top-2/4 -translate-y-2/4 -translate-x-2/4 rtl:translate-x-2/4">
                                           <i class="ki-filled ki-settings-2 text-xl ps-px text-primary">
                                           </i>
                                       </div>
                                   </div>
                               </div>
                               <a class="text-base font-semibold text-mono hover:text-primary" href="#">
                                   Revisa y actualiza roles periódicamente
                               </a>
                               <p class="text-sm text-secondary-foreground">
                                   Evalúa regularmente los roles y permisos para ajustarlos según cambios en el equipo o en las responsabilidades.
                               </p>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           
        </div>
        <!-- end: grid -->
    </div>
@endsection
