@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow border-0">
            <div class="card-header bg-primary text-white fw-bold">🎯 Registrar Nueva Predicción</div>
            <div class="card-body p-4">

                @if ($errors->any())
                    <div class="alert alert-danger shadow-sm mb-4">
                        <ul class="mb-0 fw-bold">
                            @foreach ($errors->all() as $error)
                                <li>❌ {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('predicciones.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="form-label fw-bold">Selecciona el Partido</label>
                        <select name="partido_id" class="form-select fs-6 text-dark" required>
                            <option value="" disabled selected>-- Elige un enfrentamiento --</option>
                            @foreach($partidos as $partido)
                                <option value="{{ $partido->id }}" {{ old('partido_id') == $partido->id ? 'selected' : '' }}>
                                    ⚽ {{ $partido->equipoLocal->nombre }} VS {{ $partido->equipoVisitante->nombre }} 
                                    ({{ date('d/m H:i', strtotime($partido->fecha_partido)) }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row mb-4 bg-light p-3 rounded shadow-sm text-center">
                        <h6 class="fw-bold text-secondary mb-3">¿Cuál será el resultado final?</h6>
                        
                        <div class="col-6">
                            <label class="form-label small fw-bold text-dark">Goles Local</label>
                            <input type="number" name="goles_local_prediccion" class="form-control text-center fs-4 fw-bold" min="0" placeholder="0" value="{{ old('goles_local_prediccion') }}" required>
                        </div>
                        
                        <div class="col-6">
                            <label class="form-label small fw-bold text-dark">Goles Visitante</label>
                            <input type="number" name="goles_visitante_prediccion" class="form-control text-center fs-4 fw-bold" min="0" placeholder="0" value="{{ old('goles_visitante_prediccion') }}" required>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('predicciones.index') }}" class="btn btn-light border">Cancelar</a>
                        <button type="submit" class="btn btn-primary px-4 fw-bold">🎯 Guardar Mi Apuesta</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection