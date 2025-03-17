<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Superhero;
use App\Models\Universo;
use App\Models\SuperheroType;
use App\Models\Gender;

class SuperheroController extends Controller
{
    /**
     * Muestra una lista de superhéroes.
     */
    public function index()
    {
        $superheroes = Superhero::all();
        return view('superheroes.index', compact('superheroes'));
    }

    /**
     * Muestra el formulario para crear un nuevo superhéroe.
     */
    public function create()
    {
        $universes = Universo::all();
        $types = SuperheroType::all();
        $genders = Gender::all();

        return view('superheroes.create', compact('universes', 'types', 'genders'));
    }

    /**
     * Guarda un nuevo superhéroe en la base de datos.
     */
    public function store(Request $request)
    {
        // Validar los campos del formulario
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'powers' => 'required|string|max:255',
            'origin' => 'nullable|string|max:255',
            'universe_id' => 'required|exists:universos,id',
            'type_id' => 'required|exists:superhero_types,id',
            'gender_id' => 'required|exists:genders,id',
        ]);

        // Crear el superhéroe con los datos validados
        Superhero::create($validatedData);

        return redirect()->route('superheroes.index')->with('success', 'Superhéroe creado exitosamente.');
    }

    /**
     * Muestra el formulario para editar un superhéroe.
     */
    public function edit(Superhero $superhero)
    {
        $universes = Universo::all();
        $types = SuperheroType::all();
        $genders = Gender::all();

        return view('superheroes.edit', compact('superhero', 'universes', 'types', 'genders'));
    }

    /**
     * Actualiza la información de un superhéroe.
     */
    public function update(Request $request, Superhero $superhero)
    {
        // Validación de los datos
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'powers' => 'nullable|string|max:255',
            'origin' => 'nullable|string|max:255',
            'universe_id' => 'required|exists:universos,id',
            'type_id' => 'required|exists:superhero_types,id',
            'gender_id' => 'required|exists:genders,id',

        ]);

        // Actualizar el superhéroe
        $superhero->update($validatedData);

        return redirect()->route('superheroes.index')->with('success', 'Superhéroe actualizado correctamente.');
    }

    /**
     * Elimina un superhéroe.
     */
    public function destroy(Superhero $superhero)
    {
        $superhero->delete();
        return redirect()->route('superheroes.index')->with('success', 'Superhéroe eliminado.');
    }

    public function show(Superhero $superhero)
{
    return view('superheroes.show', compact('superhero'));
}

}