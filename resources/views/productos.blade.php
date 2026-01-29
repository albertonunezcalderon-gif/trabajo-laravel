@extends('layouts.catalogo')

@section('title', 'Productos')

@section('content')
<h2>Catálogo de Productos</h2>

{{-- Formulario de filtros --}}
<form action="{{ route('productos') }}" method="GET" style="margin-bottom:20px;">
    <label>Nombre:</label>
    <input type="text" name="nombre" value="{{ request('nombre') }}" placeholder="Buscar por nombre">

    <label>Precio mínimo:</label>
    <input type="number" step="0.01" name="precio_min" value="{{ request('precio_min') }}">

    <label>Precio máximo:</label>
    <input type="number" step="0.01" name="precio_max" value="{{ request('precio_max') }}">

    <label>Categoría:</label>
    <select name="categoria_id">
        <option value="">-- Todas --</option>
        @foreach($categorias as $categoria)
            <option value="{{ $categoria->id }}" @if(request('categoria_id') == $categoria->id) selected @endif>
                {{ $categoria->nombre }}
            </option>
        @endforeach
    </select>

    <button type="submit">Filtrar</button>
</form>

{{-- Listado de productos --}}
<div class="products">
    @forelse($productos as $producto)
        <div class="product-card">
            <img src="{{ $producto->imagen }}" alt="{{ $producto->nombre }}">
            <h3>{{ $producto->nombre }}</h3>
            <p>{{ $producto->descripcion }}</p>
            <p>Categoría: {{ $producto->categoria->nombre }}</p>
            <div class="price">{{ $producto->precio }}€</div>
        </div>
    @empty
        <p>No se encontraron productos con esos criterios.</p>
    @endforelse
</div>
@endsection

