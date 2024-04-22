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
            'ci' => 'required|digits_between:1,7',
        ]);

        $correo = strtolower($request->nombre) . '.' . strtolower($request->apellido) . '@tusitio.com';
        $contrasena = $request->ci; // Utiliza el CI como contraseña

        $maestro = Maestro::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'telefono' => $request->telefono,
            'ci' => $request->ci,
            'correo' => $correo,
            'contrasena' => $contrasena,
        ]);

        // Crea el usuario correspondiente al maestro
        $user = User::create([
            'name' => $maestro->nombre,
            'email' => $correo,
            'password' => bcrypt($contrasena), // Encripta la contraseña
        ]);

        // Asigna el rol de "Maestro" al usuario
        $user->assignRole('Maestro');

        // Guarda el usuario asociado al maestro
       

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
