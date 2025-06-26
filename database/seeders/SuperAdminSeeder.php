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
        // Crear la empresa
        $company = \App\Models\Company::create([
            'name' => 'Empresa Principal',
            'rut' => '76.XXXX.XXX-X',
            'address' => 'Dirección de ejemplo',
            'phone' => '123456789',
            'email' => 'info@empresa.com',
            'logo' => 'ruta/al/logo.png',
            'description' => 'Descripción de la empresa',
            'active' => true,
        ]);

        // Crear el usuario
        $user = User::firstOrCreate(
            ['email' => 'superadmin@otrodev.cl'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('test.123'),
                'company_id' => $company->id, // Asignar la empresa creada
            ]
        );

        // Crear o recuperar el rol y asignarlo
        $role = Role::firstOrCreate(
            ['name' => 'Super Admin', 'guard_name' => 'web'],
            ['company_id' => $company->id]
        );

        if (!$user->hasRole('Super Admin')) {
            $user->assignRole($role);
        }
    }
}
