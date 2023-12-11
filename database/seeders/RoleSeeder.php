<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // el sistema va tener 2 roles
        // administrador
        // secretaria

        $admin = Role::create(['name' => 'admin']);
        $secretaria = Role::create(['name' => 'secretaria']);

        Permission::create(['name' => 'index'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name' => 'reportes'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'pdf'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'pdf_fechas'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'home'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name' => 'miembros'])->syncRoles([$admin]);
        Permission::create(['name' => 'ministerios'])->syncRoles([$admin]);
        Permission::create(['name' => 'usuarios'])->syncRoles([$admin]);
        Permission::create(['name' => 'asistencias'])->syncRoles([$admin,$secretaria]);

        User::find(1)->assignRole($admin);
        User::find(2)->assignRole($secretaria);

    }
}
