<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Estudiante;
use App\Models\Padre;
use Illuminate\Http\Request;

class PadreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $padres = Padre::orderBy('id', 'desc')->paginate(5);
        return view('admin.padres.index', compact('padres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.padres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
        ]);
        Padre::create($request->all());
        return redirect()->route('admin.padres.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Padre $padre)
    {
        $estudiantes = $padre->estudiantes; // Obtener los estudiantes asociados a este padre
        return view('admin.padres.show', compact('padre', 'estudiantes'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Padre $padre)
    {
        $estudiantes = $padre->estudiantes;
        $grados = $padre->estudiantes;
        return view('admin.padres.edit', compact('padre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Padre $padre)
    {
        $request->validate([
            'nombre' => 'required',
            'estudiantes' => 'array',
        ]);
        $padre->update($request->all());
        session()->flash('swal',[
            'icon'=> 'success',
            'title'=>'Bien Hecho',
            'text' => 'Padre actualizada correctamente.'
        ]);
        if ($request->has('estudiantes')) {
            $padre->estudiantes()->sync($request->estudiantes);
        }
        
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Excelente',
            'text' => 'La materia fue actualizada',
        ]);
    
        return redirect()->route('admin.padres.index', $padre);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Padre $padre)
    {
        $padre->delete();
        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Padre eliminada correctamente.'
        ]);
        return redirect()->route('admin.padres.index');
    }
}
