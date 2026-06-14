@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-5">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-dark text-white text-center fw-bold py-3">🔐 Registro en 1236</div>
            <div class="card-body p-4">

                <form action="{{ route('register') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-bold">Nombre Completo</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required autofocus>
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Correo Electrónico</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Contraseña</label>
                        <input type="password" name="password" class="form-control" required>
                        @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Confirmar Contraseña</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary fw-bold">🚀 Crear mi cuenta</button>
                    </div>

                    <div class="text-center mt-3">
                        <small class="text-muted">¿Ya tienes cuenta? <a href="{{ route('login') }}" class="text-decoration-none">Inicia sesión aquí</a></small>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection