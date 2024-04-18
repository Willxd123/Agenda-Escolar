<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
    ];
    //relacion uno a muchos inversa
    public function calendario(){
        return $this->belongsTo(Calendario::class);
    }

    //relacion muchos a muchos 
    public function grados():BelongsToMany
    {
        return $this->belongsToMany(Grado::class, 'materia_grado');
    }
    //relacion muchos a muchos 
    public function maestros():BelongsToMany
    {
        return $this->belongsToMany(Maestro::class, 'materia_maestro');
    }
}

