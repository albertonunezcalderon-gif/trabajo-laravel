@extends('layouts.catalogo')

@section('title', 'Inicio')

@section('content')

<div class="banner" style="background:#232f3e; color:#fff; padding:40px; text-align:center;">
    <h2>Bienvenido a Mi Catálogo</h2>
    <p>Encuentra los mejores productos al mejor precio</p>
</div>

<!-- Productos destacados -->
<h3>Productos destacados</h3>
<div class="products">
    @foreach($productosDestacados as $producto)
        <div class="product-card">
            <img src="{{ $producto->imagen }}" alt="{{ $producto->nombre }}">
            <h3>{{ $producto->nombre }}</h3>
            <p>{{ $producto->descripcion }}</p>
            <div class="price">{{ $producto->precio }}€</div>
        </div>
    @endforeach
</div>

<!-- Categorías -->
<h3>Categorías</h3>
<div class="categories" style="display:flex; gap:20px;">
    @foreach($categorias as $categoria)
        <div style="background:#fff; padding:20px; border-radius:8px; flex:1; text-align:center;">
            <h4>{{ $categoria->nombre }}</h4>
        </div>
    @endforeach
</div>
@endsection
