@extends('layouts.main')

@section('content')
    <div class="kt-container-fixed">
        <div class="flex flex-wrap items-center lg:items-end justify-between gap-5 pb-7.5">
            <div class="flex flex-col justify-center gap-2">
                <h1 class="text-xl font-medium leading-none text-mono">
                    Permisos
                </h1>
            </div>
            <div class="flex items-center gap-2.5">
                <div>
                    <!-- Botón para abrir el modal -->
                    <button class="kt-btn" data-kt-modal-toggle="#createPermissionModal" id="openCreatePermissionBtn">
                        Crear Permiso
                    </button>

                    <!-- Modal -->
                    <div class="kt-modal" data-kt-modal="true" id="createPermissionModal">
                        <div class="kt-modal-content max-w-[400px] top-[10%]">
                            <div class="kt-modal-header">
                                <h3 class="kt-modal-title" id="modalTitle">Crear Permiso</h3>
                                <button type="button" class="kt-modal-close" aria-label="Cerrar modal"
                                    data-kt-modal-dismiss="#createPermissionModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"
                                        aria-hidden="true">
                                        <path d="M18 6 6 18"></path>
                                        <path d="m6 6 12 12"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="kt-modal-body">
                                <form action="{{ route('permissions.store') }}" method="POST" id="permissionForm">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="name" class="block text-sm font-medium">Nombre del Permiso</label>
                                        <input type="text" id="name" name="name"
                                            class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" required />
                                    </div>
                                    <input type="hidden" id="permissionId" name="id" />
                                    <div class="kt-modal-footer flex justify-end gap-2 mt-4">
                                        <button type="button" class="kt-btn kt-btn-secondary"
                                            data-kt-modal-dismiss="#createPermissionModal">Cancelar</button>
                                        <button type="submit" class="kt-btn kt-btn-primary">Guardar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Container -->
    <!-- Container -->
    <div class="kt-container-fixed">
        <div class="grid gap-5 lg:gap-7.5">
            <div class="kt-card kt-card-grid min-w-full">
                <div class="kt-card-header flex-wrap gap-2">
                    <h3 class="kt-card-title text-sm">
                        Showing 20 of 34 users
                    </h3>
                    <div class="flex flex-wrap gap-2 lg:gap-5">
                        <div class="flex">
                            <label class="kt-input">
                                <i class="ki-filled ki-magnifier">
                                </i>
                                <input data-kt-datatable-search="#team_crew_table" placeholder="Search users"
                                    type="text" />

                            </label>
                        </div>

                    </div>
                </div>
                <div class="kt-card-content">
                    <div data-kt-datatable="true" data-kt-datatable-state-save="false" id="team_crew_table">
                        <div class="kt-scrollable-x-auto">
                            <table class="kt-table table-auto kt-table-border" data-kt-datatable-table="true">
                                <thead>
                                    <tr>

                                        <th class="min-w-[300px]">
                                            <span class="kt-table-col">
                                                <span class="kt-table-col-label">
                                                    Permiso
                                                </span>
                                                <span class="kt-table-col-sort">
                                                </span>
                                            </span>
                                        </th>
                                        <th class="w-[60px]">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permissions as $permission)
                                        <tr>
                                            <td>
                                                {{ $permission->name }}
                                            </td>
                                            <td>
                                                <button
                                                    onclick="editPermission({{ $permission->id }}, '{{ $permission->name }}')"
                                                    class="kt-btn kt-btn-icon kt-btn-ghost">
                                                    <i class="ki-filled ki-notepad-edit"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div
                            class="kt-card-footer justify-center md:justify-between flex-col md:flex-row gap-5 text-secondary-foreground text-sm font-medium">
                            <div class="flex items-center gap-2 order-2 md:order-1">
                                Show
                                <select class="kt-select w-16" data-kt-datatable-size="true" name="perpage">
                                </select>
                                per page
                            </div>
                            <div class="flex items-center gap-4 order-1 md:order-2">
                                <span data-kt-datatable-info="true">
                                </span>
                                <div class="kt-datatable-pagination" data-kt-datatable-pagination="true">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <script>
        function editPermission(permissionId, permissionName) {
            document.getElementById('modalTitle').innerText = 'Editar Permiso';
            document.getElementById('name').value = permissionName;
            document.getElementById('permissionForm').action = "/permissions/" + permissionId;
            var methodField = document.createElement('input');
            methodField.type = 'hidden';
            methodField.name = '_method';
            methodField.value = 'PUT';
            document.getElementById('permissionForm').appendChild(methodField);
            KTModal.getInstance(document.getElementById('createPermissionModal')).show();
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('openCreatePermissionBtn').addEventListener('click', function() {
                document.getElementById('modalTitle').innerText = 'Crear Permiso';
                document.getElementById('name').value = '';
                document.getElementById('permissionForm').action = "{{ route('permissions.store') }}";
                var methodField = document.querySelector('input[name="_method"]');
                if (methodField) {
                    methodField.remove();
                }
            });
        });
    </script>
@endsection
