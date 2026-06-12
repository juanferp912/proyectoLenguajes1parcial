<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\PartidoController;
use App\Http\Controllers\PrediccionController;
use App\Http\Controllers\LoginController;

// Página de inicio pública
Route::get('/', function () {
    return view('welcome');
});

// RUTAS DE AUTENTICACIÓN (PÚBLICAS)
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// RUTAS PROTEGIDAS (Requieren estar logueado)
Route::middleware(['auth'])->group(function () {

    Route::resource('predicciones', PrediccionController::class);

    Route::middleware(['admin'])->prefix('admin')->group(function () {
        Route::resource('equipos', EquipoController::class);
        Route::resource('partidos', PartidoController::class);
    });
});