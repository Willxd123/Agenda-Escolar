<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Padre extends Model
{
    use HasFactory;
    //asignacion masiva para los controladores
    protected $fillable = [
        'nombre',
        'apellido',
        'direccion',
        'telefono',
    ];
    //relacion uno a muchos
    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class);
    }
}
