@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-8 text-center">
        <div class="app-card p-5 bg-white">
            <h1 class="display-5 fw-bold text-dark mb-3" style="font-family: 'Inter', sans-serif;">¡Bienvenidos a 1236!</h1>
            <p class="lead text-muted">La plataforma oficial para registrar tus pronósticos y seguir el torneo en tiempo real.</p>
            <p class="fw-semibold text-primary mb-3" style="font-size: 1.05rem; color: #4f46e5 !important; font-family: 'Inter', sans-serif;">
                "1236: Porque sabemos 3 veces más de fútbol que 412" 😉
            </p>
            <hr class="my-4">
            
            @auth
                @if(auth()->user()->es_admin) 
                    <p class="text-secondary fw-bold">Modo Administrador: Gestiona la configuración del mundial.</p>
                    <div class="mt-4">
                        <a href="{{ route('equipos.index') }}" class="btn-indigo-tech px-4 me-2">Panel Admin</a>
                    </div>
                @else
                    <p class="text-secondary">Bienvenido, {{ auth()->user()->name }}. ¡Haz tus predicciones y compite por el primer lugar!</p>
                    <div class="mt-4">
                        <a href="{{ route('predicciones.index') }}" class="btn-indigo-tech px-4 me-2">Ir a mis Predicciones</a>
                        <a href="{{ route('partidos.usuario') }}" class="btn-secondary-app px-4" style="padding: 0.55rem 1.25rem; font-size: 1rem;">Ver Calendario</a>
                    </div>
                @endif
            @else
                <p>Regístrate o inicia sesión para comenzar a apostar.</p>
                <div class="mt-4">
                    <a href="{{ route('login') }}" class="btn-indigo-tech px-4 me-2">Iniciar Sesión</a>
                    <a href="{{ route('register') }}" class="btn-secondary-app px-4" style="padding: 0.55rem 1.25rem; font-size: 1rem;">Registrarse</a>
                </div>
            @endauth
        </div>
    </div>
</div>
@endsection