@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-5">
    <div>
        <h2 class="fw-bold mb-1">🏆 Distribución de Grupos</h2>
        <p class="text-muted mb-0">Mundial 2026 - Panel de Control del Administrador</p>
    </div>
    <a href="{{ route('equipos.create') }}" class="btn btn-success fw-bold px-4 py-2 shadow-sm">+ Agregar País</a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm mb-4" role="alert">
        🚀 {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if($equipos->isEmpty())
    <div class="card shadow-sm text-center py-5">
        <div class="card-body">
            <span class="display-1">😔</span>
            <h3 class="mt-3 text-muted">No hay ningún país registrado todavía.</h3>
            <p>Comienza agregando las selecciones para armar los grupos del mundial.</p>
        </div>
    </div>
@else
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mb-5">
        @foreach($equipos->groupBy('grupo') as $grupo => $equiposDelGrupo)
            <div class="col">
                <div class="card h-100 shadow-sm border-0 bg-white">
                    <div class="card-header bg-dark text-white fw-bold d-flex justify-content-between align-items-center py-3">
                        <span class="fs-5">✨ Grupo {{ $grupo }}</span>
                        <span class="badge {{ $equiposDelGrupo->count() == 4 ? 'bg-success' : 'bg-warning text-dark' }} px-2 py-1">
                            {{ $equiposDelGrupo->count() }}/4 Equipos
                        </span>
                    </div>
                    
                    <div class="card-body p-0">
                        <table class="table table-hover table-striped mb-0 align-middle">
                            <tbody>
                                @foreach($equiposDelGrupo as $equipo)
                                    <tr>
                                        <td class="ps-3" style="width: 60px;">
                                            <img src="{{ $equipo->bandera_url }}" width="38" class="img-thumbnail shadow-sm p-0 border-0" alt="Bandera">
                                        </td>
                                        <td class="fw-bold text-dark fs-6">
                                            {{ $equipo->nombre }}
                                        </td>
                                        <td class="text-end pe-3" style="width: 110px;">
                                            <a href="{{ route('equipos.edit', $equipo->id) }}" class="btn btn-sm btn-outline-warning border-0 p-1 px-2" title="Editar">✏️</a>
                                            
                                            <form action="{{ route('equipos.destroy', $equipo->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que deseas eliminar a {{ $equipo->nombre }} del Mundial?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger border-0 p-1 px-2" title="Eliminar">🗑️</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
@endsection