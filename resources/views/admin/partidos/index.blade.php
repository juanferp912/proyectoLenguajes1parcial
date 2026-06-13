@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">📅 Calendario de Partidos</h2>
        <p class="text-muted mb-0">Administración de fechas y resultados del Mundial</p>
    </div>
    <a href="{{ route('partidos.create') }}" class="btn btn-success fw-bold px-4 py-2 shadow-sm">+ Programar Partido</a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm mb-4" role="alert">
        🚀 {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <table class="table table-hover mb-0 align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th class="py-3">Fecha y Hora</th>
                    <th class="text-end">Local</th>
                    <th>Marcador</th>
                    <th class="text-start">Visitante</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($partidos as $partido)
                    <tr>
                        <td class="text-muted fw-bold">
                            {{ date('d/m/Y H:i', strtotime($partido->fecha_partido)) }}
                        </td>
                        
                        <td class="text-end fw-bold text-dark">
                            {{ $partido->equipoLocal->nombre }}
                            <img src="{{ $partido->equipoLocal->bandera_url }}" width="38" class="ms-2 img-thumbnail p-0 border-0 shadow-sm" alt="Bandera">
                        </td>
                        
                        <td>
                            <span class="badge bg-dark fs-6 px-3 py-2">
                                {{ $partido->goles_local }} - {{ $partido->goles_visitante }}
                            </span>
                        </td>
                        
                        <td class="text-start fw-bold text-dark">
                            <img src="{{ $partido->equipoVisitante->bandera_url }}" width="38" class="me-2 img-thumbnail p-0 border-0 shadow-sm" alt="Bandera">
                            {{ $partido->equipoVisitante->nombre }}
                        </td>
                        
                        <td>
                            <a href="{{ route('partidos.edit', $partido->id) }}" class="btn btn-sm btn-outline-warning border-0 px-2" title="Editar">✏️</a>
                            
                            <form action="{{ route('partidos.destroy', $partido->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que deseas eliminar este partido del calendario?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger border-0 px-2" title="Eliminar">🗑️</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-5 text-muted">
                            📅 No hay partidos programados todavía. ¡Crea el primero arriba!
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection