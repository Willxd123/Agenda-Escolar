<?php

namespace App\Livewire\Grados;

use App\Models\Grado;
use Livewire\Component;

class Index extends Component
{
    public function verMaterias($gradoId)
    {
        $this->emit('mostrarMaterias', $gradoId);
    }

    public function render()
    {
        $grados = Grado::orderBy('id', 'desc')->paginate(10);

        return view('livewire.grados.index', compact('grados'));
        $this->emit('mostrarMaterias');
    }
}
