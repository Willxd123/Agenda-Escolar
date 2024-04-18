<?php

namespace App\Imports;

use App\Models\Estudiante;
use App\Models\Grado;
use App\Models\Padre;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EstudianteImport implements ToModel, WithHeadingRow
{

    private $padres;
    private $grados;
    public function __construct()
    {

        //estudiantes
        $this->padres = Padre::select('id', Padre::raw("CONCAT(nombre, ' ', apellido) AS nombre_completo"))->pluck('id', 'nombre_completo');
        $this->grados = Grado::pluck('id','nombre');
    }
    /**
     * @param array $row
     * 
     * @return \Illuminate\Database\Eloquent\Model|null
     */
   

    public function model(array $row)
    {
        
        //estudiante
        return new Estudiante([
            'nombre' => $row['nombre'],
            'apellido' => $row['apellido'],
            'padre_id' => $this->padres[$row['padre']],
            'grado_id' => $this->grados[$row['grado']],
        ]);


    }
}
