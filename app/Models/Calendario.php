<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendario extends Model
{
    use HasFactory;
    //asignacion masiva para los controladores
    protected $fillable = [
        'evento',
        'fecha_inicio',
        'fecha_fin',
        'estado',
    ];

}
