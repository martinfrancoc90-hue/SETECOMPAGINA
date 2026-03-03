<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel Admin - Setecom</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f0f2f5; }
        .navbar { background-color: #072b83; }
        .btn-agregar { background-color: #072b83; color: white; }
        .btn-agregar:hover { background-color: #1d90f3; color: white; }
        .tabla-card { border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .badge-consultar { background-color: #6c757d; }
        .badge-disponible { background-color: #28a745; }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark px-4 py-3">
        <span class="navbar-brand fw-bold"><i class="fas fa-cog me-2"></i>Panel Admin - Setecom</span>
        <a href="{{ route('admin.categorias.index') }}" class="btn btn-outline-light btn-sm me-2">
            <i class="fas fa-tags"></i> Categorías
        </a>
        <a href="{{ route('logout') }}" class="btn btn-outline-light btn-sm"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i> Salir
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </nav>

    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold mb-0">Productos <span class="badge bg-secondary">{{ $productos->count() }}</span></h4>
            <a href="{{ route('admin.productos.create') }}" class="btn btn-agregar">
                <i class="fas fa-plus me-1"></i> Agregar Producto
            </a>
        </div>

        <div class="card tabla-card">
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>Precio</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($productos as $producto)
                        <tr>
                            <td>
                                @if($producto->imagen)
                                    <img src="{{ asset('storage/'.$producto->imagen) }}" width="60" height="60" style="object-fit:cover; border-radius:6px;">
                                @else
                                    <div style="width:60px;height:60px;background:#e0e0e0;border-radius:6px;display:flex;align-items:center;justify-content:center;">
                                        <i class="fas fa-image text-muted"></i>
                                    </div>
                                @endif
                            </td>
                            <td class="align-middle fw-semibold">{{ $producto->nombre }}</td>
                            <td class="align-middle">{{ $producto->categoria }}</td>
                            <td class="align-middle">
                                @if($producto->consultar)
                                    <span class="badge badge-consultar">Consultar</span>
                                @else
                                    <strong>$ {{ $producto->precio }}</strong>
                                @endif
                            </td>
                            <td class="align-middle">
                                @if($producto->disponible)
                                    <span class="badge badge-disponible">Disponible</span>
                                @else
                                    <span class="badge bg-danger">No disponible</span>
                                @endif
                            </td>
                            <td class="align-middle">
                                <a href="{{ route('admin.productos.edit', $producto->id) }}" class="btn btn-sm btn-warning me-1">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.productos.destroy', $producto->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('¿Eliminar este producto?')">
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
                            <td colspan="6" class="text-center py-4 text-muted">
                                <i class="fas fa-box-open fa-2x mb-2"></i>
                                <p>No hay productos aún. ¡Agrega el primero!</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>