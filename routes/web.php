<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperheroController;
use App\Http\Controllers\UniverseController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\SuperheroTypeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GenderApiController;
use App\Http\Controllers\ArchivoController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas para Superhéroes
    Route::resource('superheroes', SuperheroController::class);

    // Rutas para Universos
    Route::resource('universes', UniverseController::class);

    // Rutas para Géneros
    Route::resource('genders', GenderController::class);

    // Rutas para Tipos de Superhéroes
    Route::resource('superhero-types', SuperheroTypeController::class);
});
Route::get('/subir', function () {
    return view('subir');
});

Route::post('/subir-archivo', [ArchivoController::class, 'subir'])->name('archivo.subir');

require __DIR__.'/auth.php';
// Agrega esto al final del archivo
Route::prefix('api')->group(function () {
    // Test route
    Route::get('test', function () {
        return response()->json(['message' => 'API is working']);
    });
    
    // Universe routes
    Route::get('universes', [App\Http\Controllers\Api\UniverseApiController::class, 'index']);
    Route::get('universes/{name}', [App\Http\Controllers\Api\UniverseApiController::class, 'show']);

    // Superhero routes
    Route::get('superheroes', [App\Http\Controllers\Api\SuperHeroApiController::class, 'index']);
    Route::get('superheroes/{name}', [App\Http\Controllers\Api\SuperHeroApiController::class, 'show']);

    // Gender routes
    Route::get('genders', [App\Http\Controllers\Api\GenderApiController::class, 'index']);
    Route::get('genders/{name}', [App\Http\Controllers\Api\GenderApiController::class, 'show']);
});