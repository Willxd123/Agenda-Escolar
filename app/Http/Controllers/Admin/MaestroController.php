<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Maestro;
use Illuminate\Http\Request;

class MaestroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
            'nombre' => 'required'
        ]);
        Maestro::create($request->all());
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
    {
        {
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
