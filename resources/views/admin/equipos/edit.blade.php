@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow border-0">
            <div class="card-header bg-warning text-dark fw-bold">✏️ Editar Selección: {{ $equipo->nombre }}</div>
            <div class="card-body p-4">

                <form action="{{ route('equipos.update', $equipo->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- OBLIGATORIO para que Laravel reconozca tu función update -->

                    <div class="mb-3">
                        <label class="form-label fw-bold">Nombre del País</label>
                        <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $equipo->nombre) }}" required>
                        @error('nombre') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Enlace de la Bandera (URL del CDN)</label>
                        <input type="url" name="bandera_url" class="form-control" value="{{ old('bandera_url', $equipo->bandera_url) }}" required>
                        @error('bandera_url') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('equipos.index') }}" class="btn btn-light border">Cancelar</a>
                        <button type="submit" class="btn btn-warning px-4 fw-bold">Actualizar Cambios</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection