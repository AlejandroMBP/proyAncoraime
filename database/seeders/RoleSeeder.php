<?php

namespace Database\Seeders;

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
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Tecnico']);
        $role3 = Role::create(['name' => 'usuario']);

        Permission::create(['name' => 'usuarios.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'usuarios.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'usuarios.update'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'usuarios.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'tipoDoc.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'tipoDoc.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'tipoDoc.update'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'tipoDoc.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'documento.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'documento.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'documento.update'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'documento.destroy'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'documento.reporte'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'prestamos.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'prestamos.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'prestamos.update'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'prestamos.destroy'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'prestamos.reporte'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'impresiones.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'impresiones.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'impresiones.update'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'impresiones.destroy'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'impresiones.reporte'])->syncRoles([$role1, $role2]);
    }
}
