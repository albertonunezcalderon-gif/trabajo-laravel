@extends('layouts.catalogo')

@section('title', 'Editar/Borrar Producto')

@section('content')
<h1>Editar o Borrar Producto</h1>

{{-- Mensaje de éxito --}}
@if(session('success'))
    <div style="background-color: #d4edda; color: #155724; padding:10px; border-radius:5px; margin-bottom:20px;">
        {{ session('success') }}
    </div>
@endif

{{-- Selección de producto --}}
<form action="{{ route('producto.editar') }}" method="GET" style="margin-bottom:20px;">
    <label>Selecciona un producto:</label>
    <select name="producto_id" onchange="this.form.submit()">
        <option value="">--Selecciona--</option>
        @foreach($productos as $p)
            <option value="{{ $p->id }}" @if(isset($producto) && $producto->id == $p->id) selected @endif>
                {{ $p->nombre }}
            </option>
        @endforeach
    </select>
</form>

@if(isset($producto))
    {{-- Formulario de actualización --}}
    <form action="{{ route('producto.actualizar', $producto->id) }}" method="POST" style="margin-bottom:20px;">
        @csrf
        @method('PUT') {{-- Necesario para que Laravel lo interprete como PUT --}}

        <label>Nombre:</label>
        <input type="text" name="nombre" value="{{ $producto->nombre }}"><br><br>

        <label>Descripción:</label>
        <textarea name="descripcion">{{ $producto->descripcion }}</textarea><br><br>

        <label>Precio:</label>
        <input type="number" name="precio" step="0.01" value="{{ $producto->precio }}"><br><br>

        <label>Stock:</label>
        <input type="number" name="stock" value="{{ $producto->stock }}"><br><br>

        <label>Categoría:</label>
        <select name="categoria_id">
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}" @if($producto->categoria_id == $categoria->id) selected @endif>
                    {{ $categoria->nombre }}
                </option>
            @endforeach
        </select><br><br>

        <label>URL Imagen:</label>
        <input type="text" name="imagen" value="{{ $producto->imagen }}"><br><br>

        <button type="submit" style="background-color:green; color:white; padding:5px 15px;">
            Actualizar Producto
        </button>
    </form>

    {{-- Formulario para eliminar producto --}}
    <form action="{{ route('producto.eliminar', $producto->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('¿Seguro que deseas eliminar este producto?')" style="background-color:red; color:white; padding:5px 15px;">
            Eliminar Producto
        </button>
    </form>
@endif
@endsection
