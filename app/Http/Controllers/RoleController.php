<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('management.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();

        $groupedPermissions = [];
        $allActions = [];

        foreach ($permissions as $permission) {
            $pos = strpos($permission->name, ' ');

            if ($pos === false) {
                continue; // ignorar permisos sin estructura "acción entidad"
            }

            $action = substr($permission->name, 0, $pos);
            $entity = substr($permission->name, $pos + 1);

            // Guardar la acción única
            $allActions[$action] = true;

            // Agrupar por entidad y acción
            $groupedPermissions[$entity][$action] = $permission;
        }

        $allActions = array_keys($allActions); // Lista de acciones únicas
        $assignedPermissions = []; // Vacío por ahora

        $isEdit = false;

        return view('management.roles.create', compact('groupedPermissions', 'allActions', 'assignedPermissions','isEdit'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
            'description' => 'nullable|string',
            'permissions' => 'array' // Asegura que los permisos lleguen como array
        ]);

        // Crear el rol
        $role = Role::create([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);

        // Asignar permisos
        if ($request->filled('permissions')) {
            $permissions = Permission::whereIn('id', $request->input('permissions'))->get();
            $role->syncPermissions($permissions);
        }

        return redirect()->route('roles.index')
            ->with('success', 'Rol creado exitosamente');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();

        $groupedPermissions = [];
        $allActions = [];

        foreach ($permissions as $permission) {
            $pos = strpos($permission->name, ' ');

            if ($pos === false) {
                continue;
            }

            $action = substr($permission->name, 0, $pos);
            $entity = substr($permission->name, $pos + 1);

            $allActions[$action] = true;
            $groupedPermissions[$entity][$action] = $permission;
        }

        $allActions = array_keys($allActions);

        // Obtener permisos asignados al rol
        $assignedPermissions = $role->permissions->pluck('id')->toArray();

        $isEdit = true;

        return view('management.roles.create', compact('groupedPermissions', 'allActions', 'assignedPermissions', 'role', 'isEdit'));
    }


    public function update(Request $request, string $id)
{
    $role = Role::findOrFail($id);

    $request->validate([
        'name' => 'required|unique:roles,name,' . $role->id,
        'description' => 'nullable|string',
        'permissions' => 'array'
    ]);

    $role->update([
        'name' => $request->input('name'),
        'description' => $request->input('description')
    ]);

    // Actualizar permisos
    if ($request->filled('permissions')) {
        $permissions = Permission::whereIn('id', $request->input('permissions'))->get();
        $role->syncPermissions($permissions);
    } else {
        $role->syncPermissions([]); // Quitar todos los permisos si no se seleccionó ninguno
    }

    return redirect()->route('roles.index')
        ->with('success', 'Rol actualizado exitosamente');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
