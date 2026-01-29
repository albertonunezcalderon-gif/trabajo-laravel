@extends('layouts.catalogo')

@section('title', 'Lista de Productos') {{-- Cambiado de Contacto a Lista de Productos --}}

@section('content')

@if(session('success'))
    <div style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div style="background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
        {{ session('error') }}
    </div>
@endif

    <h1>Lista de productos</h1>

    @foreach($productos as $producto)
        <div class="producto" style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
            <h3>{{ $producto->nombre }}</h3>
            <p>{{ $producto->descripcion }}</p>
            <p>Precio: {{ $producto->precio }}€</p>
            <p>Categoría: {{ $producto->categoria ? $producto->categoria->nombre : 'Sin categoría' }}</p>

            @if($producto->imagen)
                <img src="{{ $producto->imagen }}" alt="{{ $producto->nombre }}" width="150">
            @endif

            {{-- Formulario de compra --}}
            <form action="{{ route('pedidos.guardar') }}" method="POST">
                @csrf
                <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                <input type="number" name="cantidad" value="1" min="1">
                <button type="submit">Comprar</button>
            </form>
        </div>
    @endforeach
@endsection

