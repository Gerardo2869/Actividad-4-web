<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Universo;

class UniverseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $universes = Universo::all(); // Obtiene todos los universos
        return view('universes.index', compact('universes')); // Pasa los universos a la vista
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('universes.create'); // Retorna la vista para crear un nuevo universo
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de los datos recibidos
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Crear un nuevo universo
        $universo = new Universo();
        $universo->name = $request->input('name');
        $universo->description = $request->input('description');
        $universo->save(); // Guarda el universo en la base de datos

        // Redirigir al usuario a la lista de universos con un mensaje de éxito
        return redirect()->route('universes.index')->with('success', 'Universe created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    $universe = Universo::findOrFail($id); // Busca el universo o da error 404
    return view('universes.show', compact('universe')); // Muestra la vista con los datos
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $universe = Universo::findOrFail($id); // Busca el universo o lanza un error 404
    return view('universes.edit', compact('universe')); // Retorna la vista con los datos
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar los datos ingresados
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
    
        // Buscar el universo por ID y actualizar sus datos
        $universe = Universo::findOrFail($id);
        $universe->name = $request->input('name');
        $universe->description = $request->input('description');
        $universe->save(); // Guardar cambios en la base de datos
    
        // Redirigir a la lista de universos con un mensaje de éxito
        return redirect()->route('universes.index')->with('success', 'Universo actualizado correctamente.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    // Buscar el universo por ID y eliminarlo
    $universe = Universo::findOrFail($id);
    $universe->delete();

    // Redirigir a la lista de universos con un mensaje de éxito
    return redirect()->route('universes.index')->with('success', 'Universo eliminado correctamente.');
}

}


