<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Superhero;
use App\Models\Universe;
use App\Models\Gender;
use App\Models\SuperheroType;

class SuperheroSeeder extends Seeder
{
    public function run(): void
    {
        $universes = Universe::all();
        $genders = Gender::all();
        $types = SuperheroType::all();

        $superheroes = [
            [
                'name' => 'Spider-Man',
                'real_name' => 'Peter Parker',
                'powers' => 'Agilidad sobrehumana, trepar paredes, sentido arácnido',
                'affiliation' => 'Vengadores',
                'universe_id' => $universes->where('name', 'Marvel')->first()->id,
                'gender_id' => $genders->where('name', 'Masculino')->first()->id,
                'superhero_type_id' => $types->where('name', 'Mutante')->first()->id,
            ],
            [
                'name' => 'Wonder Woman',
                'real_name' => 'Diana Prince',
                'powers' => 'Super fuerza, vuelo, inmortalidad',
                'affiliation' => 'Liga de la Justicia',
                'universe_id' => $universes->where('name', 'DC')->first()->id,
                'gender_id' => $genders->where('name', 'Femenino')->first()->id,
                'superhero_type_id' => $types->where('name', 'Dios')->first()->id,
            ],
            [
                'name' => 'Iron Man',
                'real_name' => 'Tony Stark',
                'powers' => 'Genio, riqueza, armadura tecnológica',
                'affiliation' => 'Vengadores',
                'universe_id' => $universes->where('name', 'Marvel')->first()->id,
                'gender_id' => $genders->where('name', 'Masculino')->first()->id,
                'superhero_type_id' => $types->where('name', 'Tecnológico')->first()->id,
            ],
            [
                'name' => 'Batman',
                'real_name' => 'Bruce Wayne',
                'powers' => 'Inteligencia, riqueza, habilidades de combate',
                'affiliation' => 'Liga de la Justicia',
                'universe_id' => $universes->where('name', 'DC')->first()->id,
                'gender_id' => $genders->where('name', 'Masculino')->first()->id,
                'superhero_type_id' => $types->where('name', 'Humano')->first()->id,
            ],
            [
                'name' => 'Black Widow',
                'real_name' => 'Natasha Romanoff',
                'powers' => 'Habilidades de espionaje, combate cuerpo a cuerpo',
                'affiliation' => 'Vengadores',
                'universe_id' => $universes->where('name', 'Marvel')->first()->id,
                'gender_id' => $genders->where('name', 'Femenino')->first()->id,
                'superhero_type_id' => $types->where('name', 'Humano')->first()->id,
            ],
            [
                'name' => 'Superman',
                'real_name' => 'Clark Kent',
                'powers' => 'Super fuerza, vuelo, visión de rayos X',
                'affiliation' => 'Liga de la Justicia',
                'universe_id' => $universes->where('name', 'DC')->first()->id,
                'gender_id' => $genders->where('name', 'Masculino')->first()->id,
                'superhero_type_id' => $types->where('name', 'Alienígena')->first()->id,
            ],
            [
                'name' => 'Captain Marvel',
                'real_name' => 'Carol Danvers',
                'powers' => 'Vuelo, super fuerza, energía cósmica',
                'affiliation' => 'Vengadores',
                'universe_id' => $universes->where('name', 'Marvel')->first()->id,
                'gender_id' => $genders->where('name', 'Femenino')->first()->id,
                'superhero_type_id' => $types->where('name', 'Alienígena')->first()->id,
            ],
            [
                'name' => 'The Flash',
                'real_name' => 'Barry Allen',
                'powers' => 'Super velocidad, viaje en el tiempo',
                'affiliation' => 'Liga de la Justicia',
                'universe_id' => $universes->where('name', 'DC')->first()->id,
                'gender_id' => $genders->where('name', 'Masculino')->first()->id,
                'superhero_type_id' => $types->where('name', 'Metahumano')->first()->id,
            ],
            [
                'name' => 'Storm',
                'real_name' => 'Ororo Munroe',
                'powers' => 'Control del clima, vuelo',
                'affiliation' => 'X-Men',
                'universe_id' => $universes->where('name', 'Marvel')->first()->id,
                'gender_id' => $genders->where('name', 'Femenino')->first()->id,
                'superhero_type_id' => $types->where('name', 'Mutante')->first()->id,
            ],
            [
                'name' => 'Green Lantern',
                'real_name' => 'Hal Jordan',
                'powers' => 'Anillo de poder, creación de constructos',
                'affiliation' => 'Liga de la Justicia',
                'universe_id' => $universes->where('name', 'DC')->first()->id,
                'gender_id' => $genders->where('name', 'Masculino')->first()->id,
                'superhero_type_id' => $types->where('name', 'Alienígena')->first()->id,
            ],
        ];

        foreach ($superheroes as $superhero) {
            Superhero::create($superhero);
        }
    }
} 