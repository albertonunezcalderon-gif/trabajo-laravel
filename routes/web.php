<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controlador1;


Route::get('/', [controlador1::class, 'index']);

Route::get('/productos', [controlador1::class, 'productos'])->name('productos');;

// Mostrar productos con categorías
Route::get('/añadir_productos', [controlador1::class, 'añadir_productos'])->name('productos');
// Guardar pedidos
Route::post('/pedidos', [controlador1::class, 'guardarPedido'])->name('pedidos.guardar');

// Mostrar formulario para crear producto
Route::get('/productos/crear', [controlador1::class, 'crearProducto'])->name('producto.crear');

// Guardar el producto en la base de datos
Route::post('/productos/guardar', [controlador1::class, 'guardarProducto'])->name('producto.guardar');

// Mostrar formulario con producto seleccionado
Route::get('/productos/editar', [controlador1::class, 'editarProducto'])->name('producto.editar');
// Actualizar producto
Route::put('/productos/actualizar/{id}', [controlador1::class, 'actualizarProducto'])->name('producto.actualizar');
// Eliminar producto
Route::delete('/productos/eliminar/{id}', [controlador1::class, 'eliminarProducto'])->name('producto.eliminar');
