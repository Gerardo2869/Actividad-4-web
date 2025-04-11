<?php

// app/Models/Universe.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Universe extends Model
{
    use HasFactory;

    protected $table = 'universes'; // Especificamos el nombre correcto de la tabla

    protected $fillable = ['name', 'description'];

    // Relación con el modelo Superhero (uno a muchos)
    // En el modelo Universe
public function superheroes()
{
    return $this->hasMany(SuperHero::class);
}

}
