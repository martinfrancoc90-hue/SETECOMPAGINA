<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Categoría - Setecom</title>
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
        <span class="navbar-brand fw-bold"><i class="fas fa-edit me-2"></i>Editar Categoría</span>
        <a href="{{ route('admin.categorias.index') }}" class="btn btn-outline-light btn-sm">
            <i class="fas fa-arrow-left"></i> Volver
        </a>
    </nav>

    <div class="container mt-4">
        <div class="card form-card" style="max-width: 500px; margin: auto;">
            <div class="card-body p-4">
                <form action="{{ route('admin.categorias.update', $categoria->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nombre *</label>
                        <input type="text" name="nombre" class="form-control" required
                               value="{{ old('nombre', $categoria->nombre) }}">
                        @error('nombre')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Slug actual</label>
                        <input type="text" class="form-control" value="{{ $categoria->slug }}" disabled>
                        <small class="text-muted">El slug se actualiza automáticamente</small>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-guardar px-4">
                            <i class="fas fa-save me-1"></i> Guardar cambios
                        </button>
                        <a href="{{ route('admin.categorias.index') }}" class="btn btn-secondary px-4">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>