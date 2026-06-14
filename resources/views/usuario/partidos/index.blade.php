@extends('layouts.app')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold mb-1" style="color: #0f172a;">📅 Calendario del Mundial</h2>
    <p class="text-muted mb-0">
        Revisa las fechas, horarios y resultados en tiempo real. 
        <span class="d-block d-md-inline ms-md-2 fw-semibold" style="font-size: 0.85rem; color: #4f46e5;">(Sabemos 3 veces más de fútbol que 412)</span>
    </p>
</div>

@if($partidos->isEmpty())
    <div class="app-card text-center py-5">
        <div class="card-body">
            <span class="display-1">📅</span>
            <h4 class="mt-3 text-muted">No hay partidos programados todavía.</h4>
        </div>
    </div>
@else
    @foreach($partidos->groupBy(function($p) { return date('d/m/Y', strtotime($p->fecha_partido)); }) as $fechaDia => $partidosDelDia)
        <div class="fw-bold text-dark fs-5 mb-3 mt-4 px-1" style="font-family: 'Inter', sans-serif;">
            🗓️ Jornada: {{ $fechaDia }}
        </div>

        <div class="d-flex flex-column gap-3 mb-4">
            @foreach($partidosDelDia as $partido)
                @php
                    $isFinished = !is_null($partido->goles_local) && !is_null($partido->goles_visitante);
                @endphp
                <div class="match-dashboard-box d-flex align-items-center justify-content-between p-3 px-4">
                    <!-- Left: Status and Time -->
                    <div class="d-flex flex-column align-items-start" style="width: 20%;">
                        <span class="badge-status-app mb-1">
                            {{ $isFinished ? 'Finalizado' : 'Por Jugar' }}
                        </span>
                        <span class="fw-bold text-secondary" style="font-size: 0.95rem;">
                            🕒 {{ date('H:i', strtotime($partido->fecha_partido)) }}
                        </span>
                    </div>

                    <!-- Center: Teams and Score -->
                    <div class="d-flex align-items-center justify-content-center flex-grow-1" style="width: 80%;">
                        <!-- Local Team -->
                        <div class="d-flex align-items-center justify-content-end text-end" style="width: 40%;">
                            <span class="fw-semibold me-2" style="font-size: 1rem; color: #1e293b;">{{ $partido->equipoLocal->nombre }}</span>
                            <img src="{{ $partido->equipoLocal->bandera_url }}" width="36" class="rounded shadow-sm" alt="Bandera">
                        </div>

                        <!-- Score Capsule -->
                        <div class="d-flex justify-content-center mx-4" style="width: 20%; min-width: 100px;">
                            @if($isFinished)
                                <span class="score-pill">
                                    {{ $partido->goles_local }} - {{ $partido->goles_visitante }}
                                </span>
                            @else
                                <span class="vs-pill">VS</span>
                            @endif
                        </div>

                        <!-- Visitor Team -->
                        <div class="d-flex align-items-center justify-content-start text-start" style="width: 40%;">
                            <img src="{{ $partido->equipoVisitante->bandera_url }}" width="36" class="rounded shadow-sm me-2" alt="Bandera">
                            <span class="fw-semibold" style="font-size: 1rem; color: #1e293b;">{{ $partido->equipoVisitante->nombre }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
@endif
@endsection