<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
    //relacion muchos a muchos 
    public function grados(): BelongsToMany
    {
        return $this->belongsToMany(Grado::class, 'calendario_grado');
    }
}
