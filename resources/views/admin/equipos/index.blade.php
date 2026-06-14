@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1" style="color: #0f172a;">🏆 Distribución de Grupos</h2>
        <p class="text-muted mb-0">
            Mundial 2026 - Panel de Control del Administrador 
            <span class="d-block d-md-inline ms-md-2 fw-semibold" style="font-size: 0.85rem; color: #4f46e5;">(Sabemos 3 veces más de fútbol que 412)</span>
        </p>
    </div>
    <a href="{{ route('equipos.create') }}" class="btn-indigo-tech">+ Agregar País</a>
</div>

<div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach(['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I'] as $letraGrupo)
        @php
            $equiposGrupo = $equipos->where('grupo', $letraGrupo);
        @endphp
        <div class="col">
            <div class="app-card h-100">
                <div class="d-flex justify-content-between align-items-center py-3 px-4" style="border-bottom: 1px solid #f1f5f9; border-top-left-radius: 12px; border-top-right-radius: 12px;">
                    <h5 class="mb-0 fw-bold" style="color: #1e293b; font-size: 1rem;">✨ Grupo {{ $letraGrupo }}</h5>
                    <span class="badge-status-app">{{ $equiposGrupo->count() }}/4 Equipos</span>
                </div>
                <ul class="list-group list-group-flush" style="border-bottom-left-radius: 12px; border-bottom-right-radius: 12px;">
                    @forelse($equiposGrupo as $equipo)
                        <li class="list-group-item d-flex justify-content-between align-items-center py-3 px-4" style="border: none; background: transparent;">
                            <div class="d-flex align-items-center">
                                <img src="{{ $equipo->bandera_url }}" width="24" class="me-2 rounded shadow-sm" alt="Bandera">
                                <span class="fw-semibold" style="color: #334155; font-size: 0.95rem;">{{ $equipo->nombre }}</span>
                            </div>
                            <div class="d-flex gap-2">
                                <a href="{{ route('equipos.edit', $equipo->id) }}" class="btn-secondary-app py-1 px-2" title="Editar">✏️</a>
                                <form action="{{ route('equipos.destroy', $equipo->id) }}" method="POST" onsubmit="return confirm('¿Seguro de eliminar este país?');" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-secondary-app py-1 px-2" title="Eliminar">🗑️</button>
                                </form>
                            </div>
                        </li>
                    @empty
                        <li class="list-group-item text-muted text-center py-4" style="border: none; background: transparent;">No hay equipos en este grupo</li>
                    @endforelse
                </ul>
            </div>
        </div>
    @endforeach
</div>
@endsection