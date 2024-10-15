<!-- resources/views/pokedex.blade.php -->
@extends('layouts.app')

@section('title', 'Pokedex')

@section('header', 'Daftar Pokémon')

@section('content')
<div class="container">
    <div class="row">
        @foreach($pokemons as $pokemon)
            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <a href="{{ route('pokemon.show', $pokemon->id) }}">
                        <img src="{{ $pokemon->photo ? asset('storage/' . $pokemon->photo) : 'https://placehold.co/200' }}" class="card-img-top" alt="{{ $pokemon->name }}">
                    </a>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ str_pad($pokemon->id, 4, '0', STR_PAD_LEFT) }} {{ $pokemon->name }}</h5>
                        <p class="card-text">
                            <span class="badge bg-success">{{ $pokemon->primary_type }}</span>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center">
        {{ $pokemons->links() }}
    </div>
</div>
@endsection
