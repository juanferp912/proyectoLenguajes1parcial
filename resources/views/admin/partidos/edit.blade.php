@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow border-0">
            <div class="card-header bg-warning text-dark fw-bold">✏️ Modificar Partido / Ingresar Marcador</div>
            <div class="card-body p-4">

                <form action="{{ route('partidos.update', $partido->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-bold">Equipo Local</label>
                        <select name="equipo_local_id" class="form-select" required>
                            @foreach($equipos as $equipo)
                                <option value="{{ $equipo->id }}" {{ $partido->equipo_local_id == $equipo->id ? 'selected' : '' }}>
                                    {{ $equipo->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Equipo Visitante</label>
                        <select name="equipo_visitante_id" class="form-select" required>
                            @foreach($equipos as $equipo)
                                <option value="{{ $equipo->id }}" {{ $partido->equipo_visitante_id == $equipo->id ? 'selected' : '' }}>
                                    {{ $equipo->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row mb-3 bg-light p-3 rounded shadow-sm text-center">
                        <div class="col-6">
                            <label class="form-label fw-bold text-primary">Goles Local</label>
                            <input type="number" name="goles_local" class="form-control text-center fs-4 fw-bold" min="0" value="{{ old('goles_local', $partido->goles_local) }}">
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-bold text-primary">Goles Visitante</label>
                            <input type="number" name="goles_visitante" class="form-control text-center fs-4 fw-bold" min="0" value="{{ old('goles_visitante', $partido->goles_visitante) }}">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Fecha y Hora</label>
                        <input type="datetime-local" name="fecha_partido" class="form-control" value="{{ date('Y-m-d\TH:i', strtotime($partido->fecha_partido)) }}" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('partidos.index') }}" class="btn btn-light border">Cancelar</a>
                        <button type="submit" class="btn btn-warning px-4 fw-bold">Actualizar Partido</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection