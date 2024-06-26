<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            'name' => 'Administrador',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('admin');
        User::create([
            'name' => 'Prof',
            'email' => 'prof@gmail.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('Maestro');
        User::create([
            'name' => 'Estu',
            'email' => 'estu@gmail.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('Estudiante');
    }
}
