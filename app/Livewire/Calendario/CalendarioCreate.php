<?php

namespace App\Livewire\Calendario;

use App\Models\Calendario;
use App\Models\Grado;
use App\Models\Materia;
use Livewire\Attributes\Computed;
use Livewire\Component;

class CalendarioCreate extends Component
{
    public $materias;
    public $calendario = [
        'materia_id' => '',
        'grado_id' => '',
        'evento' => '',
        'fecha_inicio' => '',
        'fecha_fin' => '',
    ];


    public function mount()
    {
        $this->materias = Materia::all();
    }
    public function updatedSubcategoriaFamiliaId()
    {
        $this->calendario['grado_id'] = '';
    }
    public function save()
    {
        $this->validate([
            'calendario.calendario_id' => 'required|exists:categorias,id',
            'calendario.materia_id' => 'required|exists:materias,id',
            'calendario.evento' => 'required',
        ], [], [
            'calendario.grado_id' => 'grado',
            'calendario.materia_id' => 'materia',
           'calendario.evento' => 'nombre',
        ]);
        Calendario::create($this->calendario);
        session()->flash('swal',[
            'icon'=> 'success',
            'title'=>'Bien Hecho',
            'text' => 'Calendario creada correctamente.'
        ]);
        return redirect()->route('admin.calendarios.index');
    }

    #[Computed()]
    public function categorias()
    {
        if ($this->calendario['materia_id']) {
            return Grado::where('materia_id', $this->calendario['materia_id'])->get();
        } else {
            return collect(); // Retorna una colección vacía si no se ha seleccionado una materia
        }
    }
    public function render()
    {
        return view('livewire.calendario.calendario-create');
    }
}
