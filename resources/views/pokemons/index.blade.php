@extends('layouts.app')

@section('title', 'Daftar Pokemon')

@section('header', 'Daftar Pokemon')

@section('content')
<div class="mb-3">
    <a href="{{ route('pokemon.create') }}" class="btn btn-primary">Tambah Data Pokemon</a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Species</th>
            <th>Primary Type</th>
            <th>Power</th>
            <th>Legendary</th>
            <th>Photo</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pokemons as $pokemon)
            <tr>
                <td>{{ str_pad($pokemon->id, 4, '0', STR_PAD_LEFT) }}</td>
                <td><a href="{{ route('pokemon.show', $pokemon->id) }}">{{ $pokemon->name }}</a></td>
                <td>{{ $pokemon->species }}</td>
                <td>{{ $pokemon->primary_type }}</td>
                <td>{{ $pokemon->hp + $pokemon->attack + $pokemon->defense }}</td>
                <td>{{ $pokemon->is_legendary ? 'Ya' : 'Tidak' }}</td>
                <td>
                    @if($pokemon->photo)
                        <a href="{{ route('pokemon.show', $pokemon->id) }}">
                            <img src="{{ asset('storage/' . $pokemon->photo) }}" alt="{{ $pokemon->name }}" style="width: 100px; height: auto;">
                        </a>
                    @else
                        <span>Tidak ada foto</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('pokemon.edit', $pokemon->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('pokemon.destroy', $pokemon->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus Pokemon ini?');">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $pokemons->links() }}
@endsection
