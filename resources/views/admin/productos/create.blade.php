<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar Producto - Setecom</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f0f2f5; }
        .navbar { background-color: #072b83; }
        .btn-guardar { background-color: #072b83; color: white; }
        .btn-guardar:hover { background-color: #1d90f3; color: white; }
        .form-card { border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        #preview-imagen { max-width: 200px; border-radius: 8px; display:none; margin-top:10px; }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark px-4 py-3">
        <span class="navbar-brand fw-bold"><i class="fas fa-plus me-2"></i>Agregar Producto</span>
        <a href="{{ route('admin.productos.index') }}" class="btn btn-outline-light btn-sm">
            <i class="fas fa-arrow-left"></i> Volver
        </a>
    </nav>

    <div class="container mt-4">
        <div class="card form-card">
            <div class="card-body p-4">
                <form action="{{ route('admin.productos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nombre del producto *</label>
                        <input type="text" name="nombre" class="form-control" required
                               value="{{ old('nombre') }}" placeholder="Ej: Cámara CCTV Domo 4K">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Categoría *</label>
                        <select name="categoria" class="form-select" required>
                            <option value="">-- Seleccionar --</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->slug }}" {{ old('categoria') == $categoria->slug ? 'selected' : '' }}>
                                    {{ $categoria->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Imagen del producto</label>
                        <input type="file" name="imagen" class="form-control" accept="image/*"
                               onchange="previewImagen(this)">
                        <img id="preview-imagen" src="" alt="Preview">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Descripción</label>
                        <textarea name="descripcion" class="form-control" rows="3"
                                  placeholder="Descripción breve del producto">{{ old('descripcion') }}</textarea>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" name="consultar" id="consultar"
                                       {{ old('consultar') ? 'checked' : '' }}
                                       onchange="togglePrecio(this)">
                                <label class="form-check-label fw-semibold" for="consultar">
                                    Precio a consultar
                                </label>
                            </div>
                            <div id="campo-precio">
                                <label class="form-label fw-semibold">Precio (USD)</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" name="precio" class="form-control"
                                           step="0.01" min="0" placeholder="0.00"
                                           value="{{ old('precio') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check form-switch mt-4">
                                <input class="form-check-input" type="checkbox" name="disponible" id="disponible" checked>
                                <label class="form-check-label fw-semibold" for="disponible">
                                    Disponible
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-guardar px-4">
                            <i class="fas fa-save me-1"></i> Guardar producto
                        </button>
                        <a href="{{ route('admin.productos.index') }}" class="btn btn-secondary px-4">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function previewImagen(input) {
            var preview = document.getElementById('preview-imagen');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function togglePrecio(checkbox) {
            var campo = document.getElementById('campo-precio');
            campo.style.display = checkbox.checked ? 'none' : 'block';
        }
    </script>
</body>
</html>