<?php

namespace Database\Seeders;

use App\Models\Padre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PadreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $padres = [
            [
                'nombre' => 'Juan',
                'apellido' => 'peres',
                'direccion'=>'24 de septiembre',
                'telefono'  => '60937613',
                
            ],
            [
                'nombre' => 'diana',
                'apellido' => 'rodrigues gusman',
                'direccion'=>'24 de abril',
                'telefono'  => '73601268',
                
                
            ],
            [
                'nombre' => 'daniel',
                'apellido' => 'salvatierra carlo',
                'direccion'=>'calle 2 de abril',
                'telefono'  => '75482682',
                
                
            ],


        ]; 
        foreach ($padres as $padre) {
            Padre::create($padre);
        }
    }
}
