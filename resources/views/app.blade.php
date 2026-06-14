<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', '1236') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">{{ config('app.name', '1236') }}</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @auth
                        @if(auth()->user()->es_admin)
                            <li class="nav-item"><a class="nav-link" href="{{ route('equipos.index') }}">Países (Admin)</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('partidos.index') }}">Partidos (Admin)</a></li>
                        @else
                            <li class="nav-item"><a class="nav-link" href="{{ route('predicciones.index') }}">Mis Predicciones</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('partidos.usuario') }}">Ver Calendario</a></li>
                        @endif
                    @endauth
                </ul>
                
                <ul class="navbar-nav ms-auto">
                    @guest
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Registrarse</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Hola, {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">Cerrar Sesión</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="container dashboard-container">
        @if(session('success'))
            <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger shadow-sm">{{ session('error') }}</div>
        @endif

        @yield('content') 
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('submit', function(e) {
            const form = e.target;
            
            if (form.getAttribute('data-submitted') === 'true') {
                e.preventDefault();
                return false;
            }
            
            form.setAttribute('data-submitted', 'true');
            
            const submitButtons = form.querySelectorAll('button[type=submit], input[type=submit]');
            submitButtons.forEach(function(btn) {
                // Disable the button after a small timeout to let the submit event finish dispatching correctly
                setTimeout(function() {
                    btn.disabled = true;
                }, 10);
                
                if (btn.tagName.toLowerCase() === 'button') {
                    btn.innerHTML = '⏱️ Procesando...';
                } else {
                    btn.value = 'Procesando...';
                }
            });
        });
    </script>
</body>
</html>