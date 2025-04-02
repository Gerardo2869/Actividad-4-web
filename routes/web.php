<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperheroController;
use App\Http\Controllers\UniverseController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\SuperheroTypeController;
use Illuminate\Support\Facades\Route;

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

require __DIR__.'/auth.php';
