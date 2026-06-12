@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-5">
        <div class="card shadow">
            <div class="card-header bg-dark text-white text-center fw-bold">🔐 Iniciar Sesión - Polla 2026</div>
            <div class="card-body p-4">
                
                <form action="/login" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Correo Electrónico</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Contraseña</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Ingresar al Sistema</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection