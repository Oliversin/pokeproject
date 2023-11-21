<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PokemonController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/pokemon/update/{id}', [PokemonController::class, 'update'])->name('pokemon.update');
Route::middleware('auth')->group(function () {
    Route::get('/pokemon', [PokemonController::class, 'list'])->name('pokemon.index');
    Route::get('/pokemon/show/{id}', [PokemonController::class, 'showView'])->name('pokemon.show');
    Route::get('/pokemon/edit/{id}', [PokemonController::class, 'edit'])->name('pokemon.edit');
    Route::get('/pokemon/create', [PokemonController::class, 'create'])->name('pokemon.create');
    Route::post('/pokemon', [PokemonController::class, 'store'])->name('pokemon.store');

    Route::delete('/pokemon/{id}', [PokemonController::class, 'destroy'])->name('pokemon.destroy');
    
    Route::get('/pokemon/{id}', [PokemonController::class, 'show']);
    Route::get('/pokemon/get', [PokemonController::class, 'index']);
    Route::get('/pruebini', function () {
        return Inertia::render('Pruebini');
    });
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
