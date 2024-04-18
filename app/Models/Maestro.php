<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maestro extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'apellido',
        'telefono',
        
    ];

    //relacion muchos a muchos 
    public function materias():BelongsToMany
    {
        return $this->belongsToMany(Materia::class,'materia_maestro');
    }
}
