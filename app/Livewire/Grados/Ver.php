<?php

namespace App\Livewire\Grados;
use App\Models\Grado;
use App\Models\Materia;
use Livewire\Component;
use Illuminate\Http\Request;
class Ver extends Component
{
    public $open = true;
    protected $listeners = ['mostrarMaterias'];
    public function mostrarMaterias(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'materias' => 'array' // Asegúrate de validar las materias como un array
        ]);

        // Crear el grado con los datos específicos
        $grado = Grado::create([
            'nombre' => $request->nombre,
            'materia_id' => $request->materia_id, // Asegúrate de incluir el campo materia_id si es necesario
        ]);

        // Sincronizar las materias seleccionadas
        if ($request->has('materias')) {
            $grado->materias()->sync($request->materias);
        }
    }
    
    public function render()
    {
        $materias = Materia::all();
        return view('livewire.grados.ver',compact('grado', 'materias'));
    }
    
}
