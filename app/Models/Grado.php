<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
    ];
    //relacion uno a muchos inversa
    public function calendario()
    {
        return $this->belongsTo(Calendario::class);
    }


    //relacion uno a muchos
    public function paralelos()
    {
        return $this->hasMany(Paralelo::class);
    }
    //relacion uno a muchos
    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class);
    }

    //relacion muchos a muchos 
    public function materias(): BelongsToMany
    {
        return $this->belongsToMany(Materia::class,'materia_grado');
    }
}
