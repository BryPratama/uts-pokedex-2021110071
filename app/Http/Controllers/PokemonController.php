<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    public function index()
    {
        $pokemons = Pokemon::paginate(20);
        return view('pokemons.index', compact('pokemons'));
    }

    public function create()
    {
        return view('pokemons.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:100',
            'primary_type' => 'required|in:Grass,Fire,Water,Bug,Normal,Poison,Electric,Ground,Fairy,Fighting,Psychic,Rock,Ghost,Ice,Dragon,Dark,Steel,Flying',
            'weight' => 'numeric|min:0',
            'height' => 'numeric|min:0',
            'hp' => 'integer|min:0',
            'attack' => 'integer|min:0',
            'defense' => 'integer|min:0',
            'is_legendary' => 'boolean',
            'photo' => 'nullable|image|max:2048',
        ]);

        $pokemon = new Pokemon($validated);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $pokemon->photo = $path;
        }

        $pokemon->save();
        return redirect()->route('pokemon.index')->with('success', 'Pokemon berhasil ditambahkan!');
    }

    public function show($id)
    {
        $pokemon = Pokemon::findOrFail($id);
        return view('pokemons.show', compact('pokemon'));
    }

    public function edit($id)
    {
        $pokemon = Pokemon::findOrFail($id);
        return view('pokemons.edit', compact('pokemon'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:100',
            'primary_type' => 'required|in:Grass,Fire,Water,Bug,Normal,Poison,Electric,Ground,Fairy,Fighting,Psychic,Rock,Ghost,Ice,Dragon,Dark,Steel,Flying',
            'weight' => 'numeric|min:0',
            'height' => 'numeric|min:0',
            'hp' => 'integer|min:0',
            'attack' => 'integer|min:0',
            'defense' => 'integer|min:0',
            'is_legendary' => 'boolean',
            'photo' => 'nullable|image|max:2048',
        ]);

        $pokemon = Pokemon::findOrFail($id);

        $pokemon->is_legendary = $request->has('is_legendary') ? 1 : 0;

        $pokemon->update($validated);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $pokemon->photo = $path;
        }

        $pokemon->save();

        return redirect()->route('pokemon.index')->with('success', 'Pokemon berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pokemon = Pokemon::findOrFail($id);
        $pokemon->delete();
        return redirect()->route('pokemon.index')->with('success', 'Pokemon berhasil dihapus!');
    }
}
