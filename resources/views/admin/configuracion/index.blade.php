<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Configuración - Setecom</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f0f2f5; }
        .navbar { background-color: #072b83; }
        .btn-guardar { background-color: #072b83; color: white; }
        .btn-guardar:hover { background-color: #1d90f3; color: white; }
        .form-card { border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark px-4 py-3">
        <span class="navbar-brand fw-bold"><i class="fas fa-cog me-2"></i>Configuración</span>
        <div>
            <a href="{{ route('admin.productos.index') }}" class="btn btn-outline-light btn-sm me-2">
                <i class="fas fa-box"></i> Productos
            </a>
            <a href="{{ url('/') }}" class="btn btn-outline-light btn-sm me-2">
                <i class="fas fa-home"></i> Ver página
            </a>
            <a href="{{ route('logout') }}" class="btn btn-outline-light btn-sm"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Salir
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </nav>

    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card form-card" style="max-width: 600px;">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-4"><i class="fas fa-wrench me-2"></i>Configuración general</h5>
                <form action="{{ route('admin.configuracion.update') }}" method="POST">
                    @csrf
                    @foreach($configuraciones as $config)
                    <div class="mb-4">
                        <label class="form-label fw-semibold">{{ $config->descripcion }}</label>
                        <input type="text" name="config[{{ $config->clave }}]" 
                               class="form-control" value="{{ $config->valor }}">
                        <small class="text-muted">Clave: <code>{{ $config->clave }}</code></small>
                    </div>
                    @endforeach

                    <button type="submit" class="btn btn-guardar px-4">
                        <i class="fas fa-save me-1"></i> Guardar configuración
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>