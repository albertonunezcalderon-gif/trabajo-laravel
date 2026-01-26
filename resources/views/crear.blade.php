@extends('layouts.catalogo')

@section('title', 'Añadir Producto')

@section('content')
    <h1>Añadir Producto</h1>

    @if(session('success'))
        <div style="background-color: #d4edda; color: #155724; padding:10px; border-radius:5px;">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('producto.guardar') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Nombre:</label>
        <input type="text" name="nombre" value="{{ old('nombre') }}" required><br><br>

        <label>Descripción:</label>
        <textarea name="descripcion" required>{{ old('descripcion') }}</textarea><br><br>

        <label>Precio:</label>
        <input type="number" name="precio" value="{{ old('precio') }}" step="0.01" min="0" required><br><br>

        <label>Stock:</label>
        <input type="number" name="stock" value="{{ old('stock') }}" min="0" required><br><br>

        <label>Categoría:</label>
        <select name="categoria_id" required>
            <option value="">Selecciona una categoría</option>
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                    {{ $categoria->nombre }}
                </option>
            @endforeach
        </select><br><br>

        <label>Imagen: </label>
        <input type="text" name="imagen"><br><br>

        <button type="submit">Crear Producto</button>
    </form>
@endsection
