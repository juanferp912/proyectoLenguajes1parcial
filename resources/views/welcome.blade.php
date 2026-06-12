@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-8 text-center">
        <div class="card shadow-sm p-5 bg-white rounded">
            <h1 class="display-4 fw-bold text-dark mb-3">⚽ ¡Bienvenidos a la Polla Mundial 2026!</h1>
            <p class="lead text-muted">El sistema de predicciones oficial de nuestro proyecto de Lenguajes de Programación.</p>
            <hr class="my-4">
            <p>Comienza gestionando los equipos, partidos o ingresa tus predicciones en el menú de arriba.</p>
            
            <div class="mt-4">
                <a href="{{ route('predicciones.index') }}" class="btn btn-primary btn-lg px-4 me-2">🎯 Mis Predicciones</a>
                <a href="/admin/equipos" class="btn btn-outline-secondary btn-lg px-4">🛠️ Panel Admin</a>
            </div>
        </div>
    </div>
</div>
@endsection