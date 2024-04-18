<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Materia;
use App\Models\Maestro;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materias= Materia::orderBy('id', 'desc')->paginate(10);
        return view('admin.materias.index', compact('materias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $materias = Materia::all();
        $maestros = Maestro::all();
        return view('admin.materias.create',['maestros' => $maestros]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'maestros' => 'array',
        ]);
        $materia = Materia::create([
            'nombre' => $request->nombre,
            'maestro_id' => $request->maestro_id, // Asegúrate de incluir el campo materia_id si es necesario
        ]);
        // Sincronizar las aestros seleccionadas
        if ($request->has('maestros')) {
            $materia->maestros()->sync($request->maestros);
        }
        session()->flash('swal',[
            'icon' => 'success',
            'title'=>'bien hecho',
            'text'=> 'materia creada con exito.'
        ]);

        return redirect()->route('admin.materias.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Materia $materia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materia $materia)
    {
        $maestros = Maestro::all();
        return view('admin.materias.edit', compact('materia','maestros'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Materia $materia)
    {
        $request->validate([
            'nombre' => 'required',
            'maestros' => 'array'
        ]);
        $materia->update($request->only(['nombre']));
        if ($request->has('maestros')) {
            $materia->maestros()->sync($request->maestros);
        }
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Excelente',
            'text' => 'La materia fue actualizada',
        ]);
    
        return redirect()->route('admin.materias.index');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materia $materia)
    {
        $materia->maestros()->detach(); 
        $materia->delete();
        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Materia eliminada correctamente.'
        ]);
        return redirect()->route('admin.materias.index');
    }
}
