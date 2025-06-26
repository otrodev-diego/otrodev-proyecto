<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Password;
use App\Notifications\UserInvitationNotification;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('roles')->get();
        $alert = [
            'type' => 'success',
            'message' => 'Usuarios cargados correctamente'
        ];

        return view('management.users.index', compact('users', 'alert'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();

        return view('management.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'role' => ['required'],
            'password' => [
                'nullable',
                'confirmed',
                Rules\Password::defaults(),
            ],
        ]);

        $password = $request->filled('password')
            ? Hash::make($request->password)
            : Hash::make('hola123'); // clave por defecto si no se envía ninguna

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
        ]);

        $user->assignRole($request->input('role'));
        $token = Password::createToken($user);
        $user->notify(new UserInvitationNotification($token));

        return redirect()
            ->route('users.index')
            ->with('success', 'Usuario registrado correctamente.');
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
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        return view('management.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users', 'email')->ignore($id)],
            'role' => ['required'],
        ];

        // Solo agregar validación de password si se está enviando
        if ($request->filled('password') || $request->filled('password_confirmation')) {
            $rules['password'] = ['confirmed', Rules\Password::defaults()];
        }

        $request->validate($rules);

        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;

        // Solo actualizar la contraseña si se envía
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        $user->syncRoles([$request->input('role')]);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'Usuario eliminado correctamente.')
            ->with('skip_component', true);
    }
}
