@extends('layouts.app')

@section('title', 'Tambah Pokemon')

@section('header', 'Tambah Pokemon')

@section('content')
<div class="container">
    <form action="{{ route('pokemon.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required maxlength="255" placeholder="Masukkan nama Pokémon">
        </div>

        <div class="mb-3">
            <label for="species" class="form-label">Species</label>
            <input type="text" class="form-control" id="species" name="species" required maxlength="100" placeholder="Masukkan spesies Pokémon">
        </div>

        <div class="mb-3">
            <label for="primary_type" class="form-label">Primary Type</label>
            <select class="form-select" id="primary_type" name="primary_type" required>
                <option value="">Pilih Type</option>
                <option value="Grass">Grass</option>
                <option value="Fire">Fire</option>
                <option value="Water">Water</option>
                <option value="Bug">Bug</option>
                <option value="Normal">Normal</option>
                <option value="Poison">Poison</option>
                <option value="Electric">Electric</option>
                <option value="Ground">Ground</option>
                <option value="Fairy">Fairy</option>
                <option value="Fighting">Fighting</option>
                <option value="Psychic">Psychic</option>
                <option value="Rock">Rock</option>
                <option value="Ghost">Ghost</option>
                <option value="Ice">Ice</option>
                <option value="Dragon">Dragon</option>
                <option value="Dark">Dark</option>
                <option value="Steel">Steel</option>
                <option value="Flying">Flying</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="weight" class="form-label">Weight (kg)</label>
            <input type="number" step="0.01" class="form-control" id="weight" name="weight" max="99999999" value="0">
        </div>

        <div class="mb-3">
            <label for="height" class="form-label">Height (m)</label>
            <input type="number" step="0.01" class="form-control" id="height" name="height" max="99999999" value="0">
        </div>

        <div class="mb-3">
            <label for="hp" class="form-label">HP</label>
            <input type="number" class="form-control" id="hp" name="hp" max="9999" value="0">
        </div>

        <div class="mb-3">
            <label for="attack" class="form-label">Attack</label>
            <input type="number" class="form-control" id="attack" name="attack" max="9999" value="0">
        </div>

        <div class="mb-3">
            <label for="defense" class="form-label">Defense</label>
            <input type="number" class="form-control" id="defense" name="defense" max="9999" value="0">
        </div>

        <div class="mb-3">
            <label for="is_legendary" class="form-label">Is Legendary?</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="is_legendary" name="is_legendary" value="1">
                <label class="form-check-label" for="is_legendary">Ya, ini adalah Pokemon Legendary</label>
            </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
        </div>

        <div class="d-flex justify-content-start gap-2">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('pokemon.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection
