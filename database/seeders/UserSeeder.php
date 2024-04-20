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
            'name' => 'Administrador1',
            'email' => 'admin1@gmail.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('Admin');
        User::create([
            'name' => 'Will',
            'email' => 'will@gmail.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('Maestro');
        User::create([
            'name' => 'Willder',
            'email' => 'pepi@gmail.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('Estudiante');
    }
}
