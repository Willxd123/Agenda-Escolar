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
                'nombre' => 'Juan',
                'apellido' => 'Perez',
                'telefono'  => '1234567',
                
            ],
            [
                'nombre' => 'Antonia',
                'apellido' => 'Arandico',
                'telefono'  => '1234567',
                
            ],
            [
                'nombre' => 'Juan',
                'apellido' => 'Romero',
                'telefono'  => '1234567',
                
            ],
            [
                'nombre' => 'Valentina',
                'apellido' => 'Carlo Marca',
                'telefono'  => '1234567',
                
            ],

        ]; 
        foreach ($maestros as $maestro) {
            Maestro::create($maestro);
        }

    }
}
