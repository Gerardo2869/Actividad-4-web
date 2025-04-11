<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gender;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class GenderApiController extends Controller
{
    public function index(): JsonResponse
    {
        $genders = Gender::withCount('superheroes')->get();
        
        return response()->json([
            'status' => 'success',
            'data' => $genders
        ]);
    }

    public function show($name): JsonResponse
    {
        // Buscar el género por nombre
        $gender = Gender::where('name', 'LIKE', "%{$name}%")
            ->with(['superheroes.type', 'superheroes.universe'])
            ->first();

        // Si no se encuentra el género
        if (!$gender) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gender not found'
            ], 404);
        }

        // Verificar si tiene héroes
        $heroes = $gender->superheroes ? $gender->superheroes : collect();

        return response()->json([
            'status' => 'success',
            'data' => [
                'name' => $gender->name,
                'display_name' => $gender->display_name,
                'heroes_count' => $heroes->count(),
                'superheroes' => $heroes->map(function($hero) {
                    return [
                        'name' => $hero->name,
                        'real_name' => $hero->real_name,
                        'type' => $hero->type ? $hero->type->name : 'No Type Available',
                        'universe' => $hero->universe ? $hero->universe->name : 'No Universe Available',
                        'powers' => $hero->powers,
                        'affiliation' => $hero->affiliation
                    ];
                })
            ]
        ]);
    }
}
