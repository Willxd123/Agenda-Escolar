<?php

namespace Database\Seeders;

use App\Models\Maestro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaestroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $maestros = [
            [
                'ci' => $this->generateUniqueCi(), // Genera un número de CI único
                'nombre' => 'Juan',
                'apellido' => 'Perez',
                'telefono'  => '1234567',
                'correo' => 'juan.perez@tusitio.com', // Correo único
                'contrasena' => 'password', // Contraseña en texto plano
            ],
            [
                'ci' => $this->generateUniqueCi(), // Genera un número de CI único
                'nombre' => 'Antonia',
                'apellido' => 'Arandico',
                'telefono'  => '1234567',
                'correo' => 'antonia.arandico@tusitio.com', // Correo único
                'contrasena' => 'password', // Contraseña en texto plano
            ],
            [
                'ci' => $this->generateUniqueCi(), // Genera un número de CI único
                'nombre' => 'Juan',
                'apellido' => 'Romero',
                'telefono'  => '1234567',
                'correo' => 'juan.romero@tusitio.com', // Correo único
                'contrasena' => 'password', // Contraseña en texto plano
            ],
            [
                'ci' => $this->generateUniqueCi(), // Genera un número de CI único
                'nombre' => 'Valentina',
                'apellido' => 'Carlo Marca',
                'telefono'  => '1234567',
                'correo' => 'valentina.carlomarca@tusitio.com', // Correo único
                'contrasena' => 'password', // Contraseña en texto plano
            ],
        ];

        foreach ($maestros as $maestro) {
            Maestro::create($maestro);
        }
    }

    /**
     * Genera un número de CI único.
     *
     * @return int
     */
    private function generateUniqueCi(): int
    {
        $ci = rand(1000000, 9999999); // Genera un número aleatorio de 7 dígitos

        // Verifica si el CI ya existe en la base de datos
        while (Maestro::where('ci', $ci)->exists()) {
            $ci = rand(1000000, 9999999); // Genera otro número si ya existe en la base de datos
        }

        return $ci;
    }
}
