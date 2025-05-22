@extends('layouts.main')

@section('content')
    <div class="kt-container-fixed">
        <div class="flex flex-wrap items-center lg:items-end justify-between gap-5 pb-7.5">
            <div class="flex flex-col justify-center gap-2">
                <h1 class="text-xl font-medium leading-none text-mono">
                    Usuarios
                </h1>
                <div class="flex items-center flex-wrap gap-1.5 font-medium">
                    <span class="text-base text-secondary-foreground">
                        Total usuarios:
                    </span>
                    <span class="text-base text-foreground font-medium me-2">
                        {{ number_format($users->count(), 0, ',', '.') }}
                    </span>
                </div>
            </div>
            <div class="flex items-center gap-2.5">
                <a class="kt-btn kt-btn-primary" href="{{ route('users.create') }}">
                    Agregar usuario
                </a>
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
                                        <th class="w-[60px] text-center">
                                            <input class="kt-checkbox kt-checkbox-sm" data-kt-datatable-check="true"
                                                type="checkbox" />
                                        </th>
                                        <th class="min-w-[300px]">
                                            <span class="kt-table-col">
                                                <span class="kt-table-col-label">
                                                    Usuario
                                                </span>
                                                <span class="kt-table-col-sort">
                                                </span>
                                            </span>
                                        </th>
                                        <th class="min-w-[180px]">
                                            <span class="kt-table-col">
                                                <span class="kt-table-col-label">
                                                    Role
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


                                    @foreach ($users as $user)
                                        <tr>
                                            <td class="text-center">
                                                <input class="kt-checkbox kt-checkbox-sm" data-kt-datatable-row-check="true"
                                                    type="checkbox" value="{{ $user->id }}" />
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2.5">
                                                    <img alt="{{ $user->name }}" class="rounded-full size-9 shrink-0"
                                                        src="{{ $user->avatar ?? 'assets/media/avatars/user.png' }}">
                                                    <div class="flex flex-col">
                                                        <a class="text-sm font-medium text-mono hover:text-primary mb-px"
                                                            href="#">
                                                            {{ $user->name }}
                                                        </a>
                                                        <a class="text-sm text-secondary-foreground font-normal hover:text-primary"
                                                            href="#">
                                                            {{ $user->email }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-foreground font-normal">
                                                @foreach ($user->roles as $role)
                                                    <span class="kt-badge kt-badge-outline">{{ $role->name }}</span>
                                                @endforeach
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2">
                                                    <a class="kt-btn kt-btn-icon kt-btn-ghost" href="{{ route('users.edit', $user->id) }}">
                                                        <i class="ki-filled ki-notepad-edit"></i>
                                                    </a>
                                                    <button type="button" class="kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost text-danger" onclick="confirmDelete({ formId: 'delete-user-{{ $user->id }}' })">
                                                        <i class="ki-filled ki-trash"></i>
                                                    </button>
                                                    <form id="delete-user-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
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
@endsection
