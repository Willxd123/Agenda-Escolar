<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Maestro;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class MaestroController extends Controller 
{
 
    public function index()
    {
        $maestros = Maestro::orderBy('id', 'desc')->paginate(10);
        return view('admin.maestros.index', compact('maestros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.maestros.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'ci' => 'required|digits_between:1,7', // Validación para el campo ci
        ]);

        $nombre = strtolower($request->nombre);
        $apellido = strtolower($request->apellido);

        $correo = $nombre . '.' . $apellido . '@tusitio.com'; // Genera un correo único
        $contrasena = 'tucontraseña'; // Establece una contraseña predeterminada

        $maestro = Maestro::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'telefono' => $request->telefono,
            'ci' => $request->ci, // Asigna el valor del campo ci
            'correo' => $correo,
            'contrasena' => $contrasena,
        ]);

        return redirect()->route('admin.maestros.index');
    }



    /**
     * Display the specified resource.
     */
    public function show(Maestro $Maestro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Maestro $maestro)
    {
        return view('admin.maestros.edit', compact('maestro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Maestro $maestro)
    { {
            $request->validate([
                'nombre' => 'required'
            ]);
            $maestro->update($request->all());
            return redirect()->route('admin.maestros.index', $maestro);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Maestro $maestro)
    {
        $maestro->delete();
        return redirect()->route('admin.maestros.index');
    }
}
