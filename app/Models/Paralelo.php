<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paralelo extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
    ];
    //relacion uno a muchos inversa
    public function grado(){
        return $this->belongsTo(Grado::class);
    }
}
