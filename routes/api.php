<?php

use App\Http\Controllers\Api\UniverseController;
use App\Http\Controllers\Api\SuperHeroController;
use App\Http\Controllers\Api\GenderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GenderApiController;
use App\Http\Controllers\Api\SuperHeroApiController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Test route
Route::get('test', function () {
    return response()->json(['message' => 'API is working']);
});

// Universe routes
Route::get('universes', [UniverseController::class, 'index']);
Route::post('universes', [UniverseController::class, 'store']);
Route::get('universes/{name}', [UniverseController::class, 'show']);
Route::put('universes/{universe}', [UniverseController::class, 'update']);
Route::delete('universes/{universe}', [UniverseController::class, 'destroy']);

//Superhero routes
Route::get('superheroes', [SuperHeroApiController::class, 'index']);
Route::get('superheroes/{name}', [SuperHeroApiController::class, 'show']);
Route::get('superheroes/{type}', [SuperHeroApiController::class, 'showByTypeName']);


// Gender routes
Route::get('genders', [GenderController::class, 'index']);
Route::get('genders/{name}', [GenderController::class, 'show']);