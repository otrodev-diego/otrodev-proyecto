<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::firstOrCreate(
            ['name' => 'Super Admin', 'guard_name' => 'web']
        );

        // Crear usuario si no existe
        $user = User::firstOrCreate(
            ['email' => 'superadmin@otrodev.cl'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('test.123'),
            ]
        );

        // Asignar rol
        if (!$user->hasRole('Super Admin')) {
            $user->assignRole($role);
        }
    }
}
