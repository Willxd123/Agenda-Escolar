<?php

namespace App\Livewire;

use App\Models\Materia;
use App\Models\Grado;
use Livewire\Component;

class GradoMateria extends Component
{
    public $open = false;
    public $gradoId;

    public function render()
    {
        $grado = Grado::findOrFail($this->gradoId);
        $materias = $grado->materias;

        return view('livewire.grado-materia', compact('materias'));
    }
}
