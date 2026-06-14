<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\PartidoController;
use App\Http\Controllers\PrediccionController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegister'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::middleware(['auth'])->group(function () {

    Route::resource('predicciones', PrediccionController::class);

    Route::get('/calendario', [PartidoController::class, 'calendarioPublico'])->name('partidos.usuario');

    Route::middleware(['admin'])->prefix('admin')->group(function () {
        Route::resource('equipos', EquipoController::class);
        Route::resource('partidos', PartidoController::class);
    });
});