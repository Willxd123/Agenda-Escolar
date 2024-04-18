<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Grado;
use App\Models\Maestro;
use App\Models\Materia;
use Illuminate\Http\Request;

class GradoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grados = Grado::orderBy('id', 'desc')->paginate(10);

        return view('admin.grados.index', compact('grados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grados = Grado::all();
        $materias = Materia::all();
        return view('admin.grados.create', ['materias' => $materias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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

        // Redireccionar y mostrar un mensaje de éxito
        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Grado creado con éxito.'
        ]);

        return redirect()->route('admin.grados.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Grado $grado)
    {
        
        $materias = Materia::all();
        $maestros = Maestro::all();
        return view('admin.grados.show', compact('grado', 'materias','maestros'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grado $grado)
    {
        $materias = Materia::all();
       
        // $grado->load('materias'); // Cargar las materias asociadas al grado
        return view('admin.grados.edit', compact('grado', 'materias'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grado $grado, Materia $materia)
    {
        
        $request->validate([
            'nombre' => 'required',
            'materias' => 'array',
            'maestros' => 'array'
        ]);
        $grado->update($request->only(['nombre']));
        $materia->update($request->only(['nombre']));
       // $grado->update($request->all());
    
        // Sincronizar las materias seleccionadas después de la actualización
        if ($request->has('materias')) {
            $grado->materias()->sync($request->materias);
        }
        $materia->update($request->only(['nombre']));
        if ($request->has('maestros')) {
            $materia->maestros()->sync($request->maestros);
        }
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Excelente',
            'text' => 'La materia fue actualizada',
        ]);
    
        return redirect()->route('admin.grados.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grado $grado)
    {
        $grado->materias()->detach(); 

        $grado->delete(); 
        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Grado eliminada correctamente.'
        ]);
        return redirect()->route('admin.grados.index' );
    }

}
