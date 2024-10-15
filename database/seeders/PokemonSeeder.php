<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PokemonSeeder extends Seeder
{
    public function run()
    {
        DB::table('pokemons')->insert([
            [
                'name' => 'Pikachu',
                'species' => 'Mouse Pokémon',
                'primary_type' => 'Electric',
                'weight' => 6.0,
                'height' => 0.4,
                'hp' => 35,
                'attack' => 55,
                'defense' => 40,
                'is_legendary' => false,
                'photo' => null,
            ],
            // Data tambahan lainnya
        ]);
    }
}
