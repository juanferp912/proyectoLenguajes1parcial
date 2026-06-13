@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">🎯 Mis Predicciones</h2>
        <p class="text-muted mb-0">Gestiona tus apuestas y consulta tus puntos en vivo</p>
    </div>
    <a href="{{ route('predicciones.create') }}" class="btn btn-primary fw-bold px-4 py-2 shadow-sm">🎯 Ingresar Apuesta</a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm mb-4" role="alert">
        🚀 {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="row">
    @forelse($predicciones as $prediccion)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-header bg-light text-muted text-center small fw-bold py-2">
                    📅 {{ date('d/m/Y H:i', strtotime($prediccion->partido->fecha_partido)) }}
                </div>
                
                <div class="card-body py-4">
                    <div class="d-flex justify-content-around align-items-center text-center">
                        
                        <div style="width: 35%;">
                            <img src="{{ $prediccion->partido->equipoLocal->bandera_url }}" width="45" class="img-thumbnail p-0 border-0 shadow-sm mb-2" alt="Bandera">
                            <h6 class="fw-bold mb-0 text-truncate">{{ $prediccion->partido->equipoLocal->nombre }}</h6>
                        </div>

                        <div style="width: 30%;">
                            <span class="text-muted d-block small mb-1 fw-bold">TU APUESTA</span>
                            <div class="bg-dark text-white rounded px-2 py-1 fs-5 fw-bold shadow-sm">
                                {{ $prediccion->goles_local_prediccion }} - {{ $prediccion->goles_visitante_prediccion }}
                            </div>
                        </div>

                        <div style="width: 35%;">
                            <img src="{{ $prediccion->partido->equipoVisitante->bandera_url }}" width="45" class="img-thumbnail p-0 border-0 shadow-sm mb-2" alt="Bandera">
                            <h6 class="fw-bold mb-0 text-truncate">{{ $prediccion->partido->equipoVisitante->nombre }}</h6>
                        </div>

                    </div>
                </div>

                <div class="card-footer bg-white text-center border-top-0 pb-3">
                    <hr class="my-2">
                    <div class="small">
                        <span class="text-secondary fw-bold">Resultado Real:</span>
                        <span class="badge bg-secondary">
                            {{ $prediccion->partido->goles_local }} - {{ $prediccion->partido->goles_visitante }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="card shadow-sm text-center py-5">
                <div class="card-body">
                    <span class="display-1">🎯</span>
                    <h4 class="mt-3 text-muted">Aún no has ingresado ninguna predicción.</h4>
                    <p>¡Arriésgate con un marcador y empieza a ganar puntos en el Mundial!</p>
                    <a href="{{ route('predicciones.create') }}" class="btn btn-primary fw-bold mt-2">Crear mi primera apuesta</a>
                </div>
            </div>
        </div>
    @endforelse
</div>
@endsection