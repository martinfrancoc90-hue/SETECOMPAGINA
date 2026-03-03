<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Categorías - Setecom</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f0f2f5; }
        .navbar { background-color: #072b83; }
        .btn-guardar { background-color: #072b83; color: white; }
        .btn-guardar:hover { background-color: #1d90f3; color: white; }
        .card { border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark px-4 py-3">
        <span class="navbar-brand fw-bold"><i class="fas fa-tags me-2"></i>Categorías</span>
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

        <div class="row">
            <!-- FORMULARIO AGREGAR -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-3"><i class="fas fa-plus me-2"></i>Nueva Categoría</h5>
                        <form action="{{ route('admin.categorias.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Nombre *</label>
                                <input type="text" name="nombre" class="form-control" required
                                       placeholder="Ej: Seguridad Electrónica">
                                @error('nombre')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-guardar w-100">
                                <i class="fas fa-save me-1"></i> Guardar
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- LISTA DE CATEGORÍAS -->
            <div class="col-md-8 mb-4">
                <div class="card">
                    <div class="card-body p-0">
                        <table class="table table-hover mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Slug</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($categorias as $categoria)
                                <tr>
                                    <td class="align-middle fw-semibold">{{ $categoria->nombre }}</td>
                                    <td class="align-middle"><span class="badge bg-secondary">{{ $categoria->slug }}</span></td>
                                    <td class="align-middle">
                                        <a href="{{ route('admin.categorias.edit', $categoria->id) }}" 
                                           class="btn btn-sm btn-warning me-1">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.categorias.destroy', $categoria->id) }}" 
                                              method="POST" class="d-inline"
                                              onsubmit="return confirm('¿Eliminar esta categoría?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center py-4 text-muted">
                                        <i class="fas fa-tags fa-2x mb-2"></i>
                                        <p>No hay categorías aún.</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>