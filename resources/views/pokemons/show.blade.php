@extends('layouts.app')

@section('title', 'Detail Pokemon')

@section('header', 'Detail Pokemon')

@section('content')
<div class="card mb-3">
    <div class="card-header">
        <h5 class="card-title">{{ str_pad($pokemon->id, 4, '0', STR_PAD_LEFT) }}</h5>
    </div>
    <div class="card-body text-center">
        <h6 class="card-subtitle mb-2 text-muted">{{ $pokemon->name }}</h6>
        <p><strong>Species:</strong> {{ $pokemon->species }}</p>
        <p><strong>Primary Type:</strong> {{ $pokemon->primary_type }}</p>
        <p><strong>Weight:</strong> {{ $pokemon->weight }} kg</p>
        <p><strong>Height:</strong> {{ $pokemon->height }} m</p>
        <p><strong>HP:</strong> {{ $pokemon->hp }}</p>
        <p><strong>Attack:</strong> {{ $pokemon->attack }}</p>
        <p><strong>Defense:</strong> {{ $pokemon->defense }}</p>
        <p><strong>Legendary:</strong> {{ $pokemon->is_legendary ? 'Yes' : 'No' }}</p>

        @if ($pokemon->photo)
            <img src="{{ asset('storage/' . $pokemon->photo) }}" class="card-img-top" alt="{{ $pokemon->name }}">
        @endif
    </div>
</div>

<a href="{{ url('/') }}" class="btn btn-secondary">Kembali</a>
<a href="{{ route('pokemon.edit', $pokemon->id) }}" class="btn btn-warning">Edit</a>

<form action="{{ route('pokemon.destroy', $pokemon->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
</form>
@endsection
