<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Calendario;
use Illuminate\Http\Request;

class CalendarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_calendarios = Calendario::all();
        $calendarios = [];

        foreach ($all_calendarios as $calendario) {
            $calendarios[] = [
                'title' => $calendario->evento,
                'start' => $calendario->fecha_inicio,
                'end' => $calendario->fecha_fin,
            ];
        }

        return view('admin.calendarios.index', compact('calendarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.calendarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
   /**
 * Store a newly created resource in storage.
 */
public function actividad(Request $request)
{
    //Validar los datos del formulario
    $request->validate([
        'evento' => 'required|string',
        'fecha_inicio' => 'required|date',
        'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
    ]);

    // Crear un nuevo evento en la base de datos
    $calendario = Calendario::create([
        'evento' => $request->evento,
        'fecha_inicio' => $request->fecha_inicio,
        'fecha_fin' => $request->fecha_fin,
    ]);

    // Verificar si se ha enviado una solicitud para eliminar el evento
    if ($request->has('eliminar_evento')) {
        $calendario->delete();
        return response()->json(['message' => 'Evento eliminado correctamente'], 200);
    }

    return response()->json(['message' => 'Evento agregado correctamente'], 200);
}

    
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'evento' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'descripcion' => 'nullable|string',
            'archivo' => 'nullable|file|mimes:jpeg,png,mp4,pdf,doc,docx|max:2048', // Tipos de archivo permitidos y tamaño máximo en kilobytes
        ]);

        // Crear un nuevo evento en la base de datos
        $evento = Calendario::create([
            'evento' => $request->evento,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'descripcion' => $request->descripcion,
        ]);

        // Manejar la carga de archivo, si se proporcionó
        if ($request->hasFile('archivo')) {
            $archivo = $request->file('archivo');
            $nombreArchivo = $archivo->getClientOriginalName(); // Obtener el nombre del archivo
            $rutaArchivo = $archivo->store('archivos'); // Guardar el archivo en el almacenamiento

            // Actualizar el evento con el nombre del archivo y la ruta
            $evento->update([
                'archivo' => $nombreArchivo,
                'ruta_archivo' => $rutaArchivo,
            ]);
        }

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien Hecho',
            'text' => 'Evento creado correctamente.'
        ]);

        // Redirigir a la página de índice del calendario con un mensaje de éxito
        return redirect()->route('admin.calendarios.index')->with('success', 'Evento agregado exitosamente.');


        // Validar los datos del formulario
        //  $request->validate([
        //      'evento' => 'required|string',
        //      'fecha_inicio' => 'required|date',
        //      'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        //  ]);
        //  
        //  Crear un nuevo evento en la base de datos
        //  Calendario::create($request->all());
        //  session()->flash('swal',[
        //      'icon'=> 'success',
        //     'text' => 'Familia creada correctamente.'
        // ]);

        // Redirigir a la página de índice del calendario con un mensaje de éxito
        // return redirect()->route('admin.calendarios.index')->with('success', 'Evento agregado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Calendario $calendario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Calendario $calendario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Calendario $calendario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Calendario $calendario)
    {
        //
    }
}
