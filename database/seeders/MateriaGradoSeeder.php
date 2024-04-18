<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Grado;
use App\Models\Materia;

class MateriaGradoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener todos los grados
        $grados = Grado::all();

        // Iterar sobre cada grado
        foreach ($grados as $grado) {
            // Seleccionar un número aleatorio de materias para este grado
            $numMaterias = rand(1, 8); // Puedes ajustar el rango según tus necesidades

            // Obtener una muestra aleatoria de materias
            $materias = Materia::inRandomOrder()->limit($numMaterias)->get();

            // Asignar cada materia seleccionada a este grado
            foreach ($materias as $materia) {
                // Crear un nuevo registro en la tabla pivote
                $grado->materias()->attach($materia);
            }
        }
    }
}
