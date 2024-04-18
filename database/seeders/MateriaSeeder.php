<?php

namespace Database\Seeders;

use App\Models\Materia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MateriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $materias = [
            [
                'nombre' => 'Literatura',
            ],
            [
                'nombre' => 'Matematicas',
            ],
            [
                'nombre' => 'Ciencias Sociales',
            ],
            [
                'nombre' => 'Ciencias Naturales',
            ],
            [
                'nombre' => 'Artes Plasticas',
            ],
            [
                'nombre' => 'Educacion Fisica',
            ],
            [
                'nombre' => 'Religion',
            ],
            [
                'nombre' => 'Musica',
            ],
        ]; 
        foreach ($materias as $materia) {
            Materia::create($materia);
        }
    }
}
