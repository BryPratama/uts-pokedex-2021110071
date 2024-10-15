<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PokedexController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::middleware('auth')->group(function () {
Route::resource('pokemon', PokemonController::class);
Route::get('pokemon/{pokemon}', [PokemonController::class, 'show'])->name('pokemon.show');
Route::get('/dashboard', function () {
return view('dashboard');
})->name('dashboard');
Route::get('/', PokedexController::class);
Route::resource('pokemon', PokemonController::class);
});
