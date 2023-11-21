<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Pokemon;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\GenerationController;
use App\Http\Controllers\AbilityController;
use App\Http\Controllers\TypeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/pokemon', [PokemonController::class, 'store'])->name('pokemon.store');
Route::get('/pokemon/get', [PokemonController::class, 'index']);

Route::get('/abilities/get', [AbilityController::class, 'index']);

Route::get('/types/get', [TypeController::class, 'index']);

Route::get('/generation/get', [GenerationController::class, 'index']);

Route::post('/post', [PokemonController::class, 'store']);
