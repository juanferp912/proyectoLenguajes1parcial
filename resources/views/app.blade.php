<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polla Mundial 2026</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .navbar-mundial { background-color: #7A2048; } /* Color vino tipo mundial */
        .navbar-mundial .nav-link, .navbar-mundial .navbar-brand { color: white !important; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-mundial mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">🏆 Mundial 2026</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ route('equipos.index') }}">Países (Admin)</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('partidos.index') }}">Partidos (Admin)</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('predicciones.index') }}">Mis Predicciones</a></li>
                </ul>
                <span class="navbar-text text-white">
                    Hola, {{ auth()->user()->name ?? 'Invitado' }}
                </span>
            </div>
        </div>
    </nav>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @yield('content') 
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>