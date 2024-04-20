<?php

namespace App\Livewire\Calendario;

use App\Models\Grado;
use App\Models\Materia;
use Livewire\Attributes\Computed;
use Livewire\Component;
class CalendarioEdit extends Component
{
    public $grados;
    public $calendario;
    public $calendarioEdit;

    public function mount($calendario)
    {
        $this->grados = Materia::all();
        $this->calendarioEdit = [
            'materia_id' => $calendario->grado->materia_id,
            'grado_id' => $calendario->grado_id,
            'nombre' => $calendario->nombre,
        ];
    }
    public function updatedSubcategoriaEditFamiliaId()
    {
        $this->calendarioEdit['grado_id'] = '';
    }

    #[Computed()]
    public function categorias()
    {
        if ($this->calendarioEdit['materia_id']) {
            return Grado::where('materia_id', $this->calendarioEdit['materia_id'])->get();
        } else {
            return collect(); // Retorna una colección vacía si no se ha seleccionado una materia
        }
    }
    public function save()
    {
        $this->validate([
            'calendarioEdit.grado_id' => 'required|exists:categorias,id',
            'calendarioEdit.materia_id' => 'required|exists:familias,id',
            //'calendarioEdit.nombre' => 'required',
        ], [], [
            'calendarioEdit.grado_id' => 'grado',
            'calendarioEdit.materia_id' => 'materia',
            //'calendarioEdit.nombre' => 'nombre',
        ]);
        $this->calendario->update($this->calendarioEdit);
        session()->flash('swal',[
            'icon'=> 'success',
            'title'=>'Bien Hecho',
            'text' => 'Subcategoria actualizada correctamente.'
        ]);
        return redirect()->route('admin.subcategorias.index');
    }

    public function render()
    {
        return view('livewire.calendario.calendario-create');
    }
}
