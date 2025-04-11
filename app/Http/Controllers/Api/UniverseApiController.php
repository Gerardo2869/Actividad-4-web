<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Universe;
use Illuminate\Http\JsonResponse;

class UniverseApiController extends Controller
{
    public function index(): JsonResponse
    {
        $universes = Universe::withCount('superheroes')->get();
        
        return response()->json([
            'status' => 'success',
            'data' => $universes
        ]);
    }

    public function show($name): JsonResponse
    {
        // Buscar el universo por su nombre
        $universe = Universe::where('name', 'LIKE', "%{$name}%")
            ->with(['superheroes.type', 'superheroes.gender'])
            ->first();

        // Si no se encuentra el universo
        if (!$universe) {
            return response()->json([
                'status' => 'error',
                'message' => 'Universe not found'
            ], 404);
        }

        // Obtener los superhéroes del universo
        $heroes = $universe->superheroes ? $universe->superheroes : collect();

        // Validar las relaciones de tipo y género de cada héroe
        $superheroesData = $heroes->map(function($hero) {
            return [
                'name' => $hero->name,
                'real_name' => $hero->real_name,
                'type' => $hero->type ? $hero->type->name : 'Unknown', // Verifica si tiene tipo
                'gender' => $hero->gender ? $hero->gender->display_name : 'Unknown', // Verifica si tiene género
                'powers' => $hero->powers,
                'affiliation' => $hero->affiliation
            ];
        });

        return response()->json([
            'status' => 'success',
            'data' => [
                'name' => $universe->name,
                'heroes_count' => $heroes->count(),
                'superheroes' => $superheroesData
            ]
        ]);
    }
}
