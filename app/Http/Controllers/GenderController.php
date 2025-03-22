<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gender;

class GenderController extends Controller
{
    public function index()
    {
        $genders = Gender::all();
        return view('genders.index', compact('genders'));
    }

    public function create()
    {
        return view('genders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Gender::create($request->all());

        return redirect()->route('genders.index')->with('success', 'Gender created successfully.');
    }
    public function show(Gender $gender)
    {
        return view('genders.show', compact('gender'));
    }
    public function edit($id)
    {
    $gender = Gender::findOrFail($id);
    return view('genders.edit', compact('gender'));
    }
    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $gender = Gender::findOrFail($id);
    $gender->update($request->all());

    return redirect()->route('genders.index')->with('success', 'Género actualizado correctamente.');
}
public function destroy($id)
{
    $gender = Gender::findOrFail($id);
    $gender->delete();

    return redirect()->route('genders.index')->with('success', 'Género eliminado correctamente.');
}

}

