<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Superhero;
use App\Models\SuperheroType;
use Illuminate\Http\JsonResponse;

class SuperHeroApiController extends Controller
{
    public function index(): JsonResponse
    {
        $superheroes = Superhero::with(['universe', 'gender', 'type'])->get();
        
        return response()->json([
            'status' => 'success',
            'data' => $superheroes
        ]);
    }

    public function showByTypeName($typeName): JsonResponse
    {
        // Buscar el tipo de superhéroe por nombre
        $type = SuperheroType::where('name', $typeName)->first();

        // Verificar si el tipo existe
        if (!$type) {
            return response()->json([
                'status' => 'error',
                'message' => 'Superhero type not found'
            ], 404);
        }

        // Buscar los superhéroes que pertenezcan a este tipo
        $superheroes = Superhero::where('superhero_type_id', $type->id)
            ->with(['universe', 'gender', 'type'])
            ->get();

        // Verificar si hay superhéroes
        if ($superheroes->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No superheroes found for the given type'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $superheroes->map(function($hero) {
                return [
                    'name' => $hero->name,
                    'real_name' => $hero->real_name,
                    'universe' => $hero->universe->name,
                    'type' => $hero->type->name,
                    'gender' => $hero->gender->display_name,
                    'powers' => $hero->powers,
                    'affiliation' => $hero->affiliation
                ];
            })
        ]);
    }
}