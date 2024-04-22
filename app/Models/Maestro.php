<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maestro extends Model
{
    use HasFactory;
    protected $fillable = [
        'ci',
        'nombre',
        'apellido',
        'telefono',
        'correo', // Agregar campo de correo
        'contrasena', // Agregar campo de contraseña
    ];


    //relacion muchos a muchos 
    public function materias():BelongsToMany
    {
        return $this->belongsToMany(Materia::class,'materia_maestro');
    }
    //relacion uno a une
    public function user()
    {
        return $this->belongsToo(User::class);
    }
}
