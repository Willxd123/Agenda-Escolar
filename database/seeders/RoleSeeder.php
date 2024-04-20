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
        $role = Role::create(['name' => 'admin']);
        $admin = Role::create(['name' => 'Admin']);
        $maestro = Role::create(['name' => 'Maestro']);
        $estudiante = Role::create(['name' => 'Estudiante']);

        // Crear los permisos para las rutas
        Permission::create(['name' => 'admin.dashboard'])->syncRoles([$admin, $maestro]);

        // Permiso para Materias
        Permission::create(['name' => 'admin.materias.index'])->syncRoles([$admin, $maestro]);
        Permission::create(['name' => 'admin.materias.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.materias.show'])->syncRoles([$admin, $maestro]);
        Permission::create(['name' => 'admin.materias.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.materias.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.materias.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.materias.destroy'])->syncRoles([$admin]);

        // Permiso para Maestros
        Permission::create(['name' => 'admin.maestros.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.maestros.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.maestros.show'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.maestros.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.maestros.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.maestros.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.maestros.destroy'])->syncRoles([$admin]);

        // Permiso para Grados
        Permission::create(['name' => 'admin.grados.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.grados.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.grados.show'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.grados.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.grados.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.grados.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.grados.destroy'])->syncRoles([$admin]);

        // Permiso para Estudiantes
        Permission::create(['name' => 'admin.estudiantes.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.estudiantes.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.estudiantes.show'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.estudiantes.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.estudiantes.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.estudiantes.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.estudiantes.destroy'])->syncRoles([$admin]);

        // Permiso para Calendarios
        Permission::create(['name' => 'admin.calendarios.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.calendarios.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.calendarios.show'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.calendarios.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.calendarios.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.calendarios.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.calendarios.destroy'])->syncRoles([$admin]);

        // Permiso para Padres
        Permission::create(['name' => 'admin.padres.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.padres.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.padres.show'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.padres.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.padres.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.padres.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.padres.destroy'])->syncRoles([$admin]);

        // Permiso para Usuarios
        Permission::create(['name' => 'admin.users.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.users.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.users.show'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.users.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.users.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.users.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.users.destroy'])->syncRoles([$admin]);

        // Permiso para Roles
        Permission::create(['name' => 'admin.roles.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.roles.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.roles.show'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.roles.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.roles.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.roles.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.roles.destroy'])->syncRoles([$admin]);

        // Permiso para Permisos
        Permission::create(['name' => 'admin.permissions.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.permissions.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.permissions.show'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.permissions.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.permissions.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.permissions.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.permissions.destroy'])->syncRoles([$admin]);
    }
}
