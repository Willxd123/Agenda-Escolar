<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Estudiante;
use App\Models\Grado;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EstudianteImport;
use App\Models\Padre;
use App\Models\User;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estudiantes = Estudiante::orderBy('id', 'desc')->paginate(10);
        return view('admin.estudiantes.index', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grados = Grado::all();
        $padres = Padre::all();

        return view('admin.estudiantes.create', compact('grados', 'padres'));
    }
    public function import()
    {
        $grados = Grado::all();
        $padres = Padre::all();
        return view('admin.estudiantes.import');
    }

    public function imports(Request $request)
    {
        // Configuración de importación de archivo
        $file = $request->file('import_file');
        Excel::import(new EstudianteImport, $file);
    
        // Obtener todos los estudiantes desde la base de datos
        $estudiantes = Estudiante::all();
    
        // Recorrer los estudiantes importados
        foreach ($estudiantes as $estudiante) {
            // Crear correo y contraseña basados en los datos del estudiante
            $correo = strtolower($estudiante->nombre) . '.' . strtolower($estudiante->apellido) . '@tusitio.com';
            $contrasena = $estudiante->nombre; // Utiliza el nombre como contraseña por ejemplo
    
            // Crear usuario asociado al estudiante
            $user = User::create([
                'name' => $estudiante->nombre,
                'email' => $correo,
                'password' => bcrypt($contrasena), // Encripta la contraseña
            ]);
    
            // Asignar el rol de "Estudiante" al usuario
            $user->assignRole('Estudiante');
        }
    
        // Redireccionar a la vista de estudiantes
        return redirect()->route('admin.estudiantes.index');
    }
    


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'grado_id' => 'required|exists:grados,id',
            'padre_id' => 'required|exists:padres,id',
            'nombre' => 'required',
            'apellido' => 'required',
        ]);
        $correo = strtolower($request->nombre) . '.' . strtolower($request->apellido) . '@tusitio.com';
        $contrasena = $request->nombre; // Utiliza el CI como contraseña
        $estudiante = Estudiante::create([
            'grado_id' => $request->grado_id,
            'padre_id' => $request->padre_id,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'correo' => $correo,
            'contrasena' => $contrasena,
        ]);
        $user = User::create([
            'name' => $estudiante->nombre,
            'email' => $correo,
            'password' => bcrypt($contrasena), // Encripta la contraseña
        ]);

        // Asigna el rol de "Maestro" al usuario
        $user->assignRole('Estudiante');
        return redirect()->route('admin.estudiantes.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Estudiante $estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estudiante $estudiante)
    {
        $grados = Grado::all();
        $padres = Padre::all();
        return view('admin.estudiantes.editar', compact('estudiante', 'grados', 'padres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estudiante $estudiante)
    {
        $request->validate([
            'grado_id' => 'required|exists:grados,id',
            'padre_id' => 'required|exists:padres,id',
            'nombre' => 'required',
        ]);
        $estudiante->update($request->all());
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien Hecho',
            'text' => 'estudiante actualizado correctamente.'
        ]);
        return redirect()->route('admin.estudiantes.index', $estudiante);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estudiante $estudiante)
    {
        $estudiante->delete();
        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Estudiante eliminado correctamente.'
        ]);
        return redirect()->route('admin.estudiantes.index');
    }
}
