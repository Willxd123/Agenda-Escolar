<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'sexo',
        'apellido',
        'padre_id',
        'grado_id',
    ];
    
    //relacion uno a muchos inversa
    public function padre(){
        return $this->belongsTo(Padre::class);
    }
    public function grado(){
        return $this->belongsTo(Grado::class);
    }
    
}
