@extends('layouts.main')

@section('content')
<section id="productos" class="py-5">
    <div class="container-fluid">
        <h2 class="title text-center mb-2">Nuestros Productos</h2>
        <div class="line-services mb-5 mx-auto">
            <div class="mini-circle"></div>
        </div>

        <div class="row">
            <!-- SIDEBAR FILTROS -->
            <div class="col-lg-2 col-md-3 mb-4">
                <div class="filtros-card p-3">
                    <h6 class="filtro-titulo">Categorías</h6>
                    <ul class="lista-filtros">
                        <li><label><input type="radio" name="categoria" value="todos" checked> Todos los productos</label></li>
                        @foreach($categorias as $categoria)
                            <li><label><input type="radio" name="categoria" value="{{ $categoria->slug }}"> {{ $categoria->nombre }}</label></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- GRILLA DE PRODUCTOS -->
            <div class="col-lg-10 col-md-9">
                <div class="row" id="grilla-productos">
                    @forelse($productos as $producto)
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4 producto-item" data-categoria="{{ $producto->categoria }}">
                        <div class="producto-card">
                            <div class="producto-badge {{ $producto->consultar ? 'consultar' : 'disponible' }}">
                                {{ $producto->consultar ? 'Consultar' : 'Disponible' }}
                            </div>
                            <div class="producto-img">
                                @if($producto->imagen)
                                    <img src="{{ asset('storage/'.$producto->imagen) }}" alt="{{ $producto->nombre }}">
                                @else
                                    <img src="{{ url('img/services/cctv/1.jpg') }}" alt="{{ $producto->nombre }}">
                                @endif
                            </div>
                            <div class="producto-info">
                                <p class="producto-nombre">{{ $producto->nombre }}</p>
                                @if($producto->descripcion)
                                    <p style="font-size:12px; color:#777; margin-bottom:8px;">{{ $producto->descripcion }}</p>
                                @endif
                                @if($producto->consultar)
                                    <p class="producto-precio consultar-precio">Precio a consultar</p>
                                    <a href="https://wa.me/51943873691?text=Hola,%20me%20interesa%20el%20producto:%20{{ urlencode($producto->nombre) }}"
                                       target="_blank" class="btn-producto">
                                        <i class="fab fa-whatsapp"></i> Consultar
                                    </a>
                                @else
                                    <p class="producto-precio">$ {{ $producto->precio }}</p>
                                    <a href="https://wa.me/51943873691?text=Hola,%20quiero%20comprar:%20{{ urlencode($producto->nombre) }}"
                                       target="_blank" class="btn-producto disponible-btn">
                                        <i class="fab fa-whatsapp"></i> Comprar
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 text-center py-5">
                        <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                        <p class="text-muted">No hay productos disponibles aún.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.querySelectorAll('input[name="categoria"]').forEach(function(radio) {
    radio.addEventListener('change', function() {
        var categoria = this.value;
        document.querySelectorAll('.producto-item').forEach(function(item) {
            if (categoria === 'todos' || item.dataset.categoria === categoria) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });
});
</script>
@endsection