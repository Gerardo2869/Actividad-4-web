<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\UniverseController;
use App\Http\Controllers\SuperHeroController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('genders', GenderController::class);
Route::resource('universes', UniverseController::class);
Route::resource('superheroes', SuperHeroController::class);
Route::get('/superheroes/{superhero}', [SuperheroController::class, 'show'])->name('superheroes.show');
Route::get('/genders/{gender}', [GenderController::class, 'show'])->name('genders.show');
Route::delete('/genders/{id}', [GenderController::class, 'destroy'])->name('genders.destroy');
