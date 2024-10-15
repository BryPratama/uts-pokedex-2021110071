@extends('layouts.app')

@section('title', 'Edit Pokemon')

@section('header', 'Edit Pokemon')

@section('content')
<form action="{{ route('pokemon.update', $pokemon->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $pokemon->name) }}" required maxlength="255">
    </div>

    <div class="mb-3">
        <label for="species" class="form-label">Species</label>
        <input type="text" class="form-control" id="species" name="species" value="{{ old('species', $pokemon->species) }}" required maxlength="100">
    </div>

    <div class="mb-3">
        <label for="primary_type" class="form-label">Primary Type</label>
        <select class="form-select" id="primary_type" name="primary_type" required>
            <option value="{{ $pokemon->primary_type }}" selected>{{ $pokemon->primary_type }}</option>
            <option value="Grass">Grass</option>
            <option value="Fire">Fire</option>
            <option value="Water">Water</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="weight" class="form-label">Weight</label>
        <input type="number" step="0.01" class="form-control" id="weight" name="weight" value="{{ old('weight', $pokemon->weight) }}" max="99999999">
    </div>

    <div class="mb-3">
        <label for="height" class="form-label">Height</label>
        <input type="number" step="0.01" class="form-control" id="height" name="height" value="{{ old('height', $pokemon->height) }}" max="99999999">
    </div>

    <div class="mb-3">
        <label for="hp" class="form-label">HP</label>
        <input type="number" class="form-control" id="hp" name="hp" value="{{ old('hp', $pokemon->hp) }}" max="9999">
    </div>

    <div class="mb-3">
        <label for="attack" class="form-label">Attack</label>
        <input type="number" class="form-control" id="attack" name="attack" value="{{ old('attack', $pokemon->attack) }}" max="9999">
    </div>

    <div class="mb-3">
        <label for="defense" class="form-label">Defense</label>
        <input type="number" class="form-control" id="defense" name="defense" value="{{ old('defense', $pokemon->defense) }}" max="9999">
    </div>

    <div class="mb-3 form-check">
        <input type="hidden" name="is_legendary" value="0">
        <input type="checkbox" class="form-check-input" id="is_legendary" name="is_legendary" value="1" {{ old('is_legendary', $pokemon->is_legendary) ? 'checked' : '' }}>
        <label class="form-check-label" for="is_legendary">Legendary</label>
    </div>

    <div class="mb-3">
        <label for="photo" class="form-label">Photo</label>
        <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('pokemon.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
