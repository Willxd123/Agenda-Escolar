<?php

namespace Database\Seeders;

use App\Models\Estudiante;
use App\Models\Grado;
use App\Models\Materia;
use App\Models\Maestro;
use App\Models\Tutor;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //User::factory(10)->create();
        // $role = Role::create(['name' => 'admin']);


        //$this->call([MaestroSeeder::class]);
        $this->call([MateriaSeeder::class]);
        $this->call([GradoSeeder::class]);
        $this->call([CalendarioSeeder::class]);
        $this->call([MateriaGradoSeeder::class]);
        $this->call([PadreSeeder::class]);
        $this->call([RoleSeeder::class]);
        //$this->call([UserSeeder::class]);

        //Estudiante::factory(11)->create();

        //$role = Role::create(['name' => 'admin']);
        // Permisos para el recurso 'maestros'
        User::factory()->create([
            'name' => 'Administradorl',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('admin');
         /*User::create([
            'name' => 'Will',
            'email' => 'will@gmail.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('Maestro');
        User::create([
            'name' => 'Willder',
            'email' => 'will234@gmail.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('Estudiante'); */
    }
}
