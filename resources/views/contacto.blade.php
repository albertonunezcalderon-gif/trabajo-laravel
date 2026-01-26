@extends('layouts.catalogo')

@section('title', 'Contacto')

@section('content')
<h2>Contacto</h2>

<p>Si tienes alguna duda o consulta, rellena el siguiente formulario y nos pondremos en contacto contigo:</p>

<form action="{{ route('contacto.enviar') }}" method="POST" style="max-width:600px; background:#fff; padding:20px; border-radius:8px; box-shadow:0 2px 5px rgba(0,0,0,0.1);">
    @csrf <!-- Token de seguridad -->
    
    <div style="margin-bottom:15px;">
        <label for="nombre">Nombre:</label><br>
        <input type="text" name="nombre" id="nombre" required style="width:100%; padding:8px; border-radius:4px; border:1px solid #ccc;">
    </div>

    <div style="margin-bottom:15px;">
        <label for="email">Correo electrónico:</label><br>
        <input type="email" name="email" id="email" required style="width:100%; padding:8px; border-radius:4px; border:1px solid #ccc;">
    </div>

    <div style="margin-bottom:15px;">
        <label for="mensaje">Mensaje:</label><br>
        <textarea name="mensaje" id="mensaje" rows="5" required style="width:100%; padding:8px; border-radius:4px; border:1px solid #ccc;"></textarea>
    </div>

    <button type="submit" style="background:#232f3e; color:#fff; padding:10px 20px; border:none; border-radius:4px; cursor:pointer;">Enviar</button>
</form>
@endsection
