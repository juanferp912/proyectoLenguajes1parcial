@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow border-0">
            <div class="card-header bg-dark text-white fw-bold">📅 Programar Nuevo Partido</div>
            <div class="card-body p-4">

                <form action="{{ route('partidos.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-bold">Equipo Local</label>
                        <select name="equipo_local_id" class="form-select" required>
                            <option value="" disabled selected>-- Selecciona País --</option>
                            @foreach($equipos as $equipo)
                                <option value="{{ $equipo->id }}">Grupo {{ $equipo->grupo }} - {{ $equipo->nombre }}</option>
                            @endforeach
                        </select>
                        @error('equipo_local_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Equipo Visitante</label>
                        <select name="equipo_visitante_id" class="form-select" required>
                            <option value="" disabled selected>-- Selecciona País --</option>
                            @foreach($equipos as $equipo)
                                <option value="{{ $equipo->id }}">Grupo {{ $equipo->grupo }} - {{ $equipo->nombre }}</option>
                            @endforeach
                        </select>
                        @error('equipo_visitante_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Fecha y Hora del Encuentro</label>
                        <input type="datetime-local" name="fecha_partido" class="form-control" value="{{ old('fecha_partido') }}" required>
                        @error('fecha_partido') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('partidos.index') }}" class="btn btn-light border">Cancelar</a>
                        <button type="submit" class="btn btn-success px-4 fw-bold">🚀 Registrar Partido</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection