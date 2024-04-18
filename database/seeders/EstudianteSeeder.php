<?php

namespace Database\Seeders;

use App\Models\Estudiante;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstudianteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $estudiantes = [
            [
                'nombre' => 'wilder choque',
                'sexo' => 'hombre',
                'apellido' => 'sdasdasdasz',
                'grado_id' => rand(1,4),
                'padre_id' => rand(1,4),
            ],

        ];
        foreach ($estudiantes as $estudiante) {
            Estudiante::create($estudiante);
        }
    }
}
