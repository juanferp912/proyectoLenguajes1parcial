@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">📅 Calendario de Partidos</h2>
        <p class="text-muted mb-0">Administración de fechas y resultados del Mundial</p>
    </div>
    <a href="{{ route('partidos.create') }}" class="btn btn-success fw-bold px-4 py-2 shadow-sm">+ Programar Partido</a>
</div>

<!-- Alerta de éxito si existe -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm mb-4" role="alert">
        🚀 {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if($partidos->isEmpty())
    <div class="card shadow-sm text-center py-5">
        <div class="card-body">
            <span class="display-1">📅</span>
            <h4 class="mt-3 text-muted">No hay partidos programados todavía. ¡Crea el primero arriba!</h4>
        </div>
    </div>
@else
    <!-- Agrupamos los partidos dinámicamente por el día (formato día/mes/año) -->
    @foreach($partidos->groupBy(function($p) { return date('d/m/Y', strtotime($p->fecha_partido)); }) as $fechaDia => $partidosDelDia)
        
        <!-- Título del separador por Día -->
        <div class="fw-bold text-dark fs-5 mb-2 mt-4 px-1">
            🗓️ Jornada: {{ $fechaDia }}
        </div>

        <!-- Tabla del Día (Conserva el ancho completo del contenedor) -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body p-0">
                <table class="table table-hover mb-0 align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th class="py-3" style="width: 15%;">Hora</th>
                            <th class="text-end" style="width: 30%;">Local</th>
                            <th style="width: 10%;">Marcador</th>
                            <th class="text-start" style="width: 30%;">Visitante</th>
                            <th style="width: 15%;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($partidosDelDia as $partido)
                            <tr>
                                <!-- Solo mostramos la hora porque el día ya encabeza este bloque -->
                                <td class="text-muted fw-bold">
                                    🕒 {{ date('H:i', strtotime($partido->fecha_partido)) }}
                                </td>
                                
                                <!-- Equipo Local -->
                                <td class="text-end fw-bold text-dark">
                                    {{ $partido->equipoLocal->nombre }}
                                    <img src="{{ $partido->equipoLocal->bandera_url }}" width="38" class="ms-2 img-thumbnail p-0 border-0 shadow-sm" alt="Bandera">
                                </td>
                                
                                <!-- Marcador en vivo -->
                                <td>
                                    <span class="badge bg-dark fs-6 px-3 py-2">
                                        {{ $partido->goles_local }} - {{ $partido->goles_visitante }}
                                    </span>
                                </td>
                                
                                <!-- Equipo Visitante -->
                                <td class="text-start fw-bold text-dark">
                                    <img src="{{ $partido->equipoVisitante->bandera_url }}" width="38" class="me-2 img-thumbnail p-0 border-0 shadow-sm" alt="Bandera">
                                    {{ $partido->equipoVisitante->nombre }}
                                </td>
                                
                                <!-- Acciones -->
                                <td>
                                    <a href="{{ route('partidos.edit', $partido->id) }}" class="btn btn-sm btn-outline-warning border-0 px-2" title="Editar">✏️</a>
                                    
                                    <form action="{{ route('partidos.destroy', $partido->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que deseas eliminar este partido del calendario?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger border-0 px-2" title="Eliminar">🗑️</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
@endif
@endsection