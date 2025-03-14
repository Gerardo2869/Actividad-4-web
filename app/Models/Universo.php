<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Universo extends Model
{
    use HasFactory;

    protected $table = 'universos'; // Especificamos el nombre correcto de la tabla

    protected $fillable = ['name', 'description'];
}
