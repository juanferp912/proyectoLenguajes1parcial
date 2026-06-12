<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\PartidoController;
use App\Http\Controllers\PrediccionController;

// Página de inicio pública
Route::get('/', function () {
    return view('welcome');
});

// Todas estas rutas requieren que el usuario esté logueado
Route::middleware(['auth'])->group(function () {

    // ==========================================
    // VISTA DEL USUARIO (PREDICCIONES)
    // ==========================================
    // Genera automáticamente el CRUD completo: index, create, store, edit, update, destroy
    Route::resource('predicciones', PrediccionController::class);

    // ==========================================
    // VISTA DEL ADMIN (EQUIPOS Y PARTIDOS)
    // ==========================================
    // Protegido por el middleware 'admin' que tú programaste
    Route::middleware(['admin'])->prefix('admin')->group(function () {
        
        // CRUD de Equipos (Crear, editar, borrar países del mundial 2026)
        Route::resource('equipos', EquipoController::class);
        
        // CRUD de Partidos (Crear partidos manualmente)
        Route::resource('partidos', PartidoController::class);
        
    });

});