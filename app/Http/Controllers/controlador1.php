<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Pedido;

class controlador1 extends Controller
{
public function productos(Request $request)
{
    $categorias = Categoria::all();

    // Iniciamos la consulta
    $query = Producto::with('categoria');

    // Filtrar por nombre (si existe)
    if ($request->filled('nombre')) {
        $query->where('nombre', 'like', '%'.$request->nombre.'%');
    }

    // Filtrar por precio mínimo
    if ($request->filled('precio_min')) {
        $query->where('precio', '>=', $request->precio_min);
    }

    // Filtrar por precio máximo
    if ($request->filled('precio_max')) {
        $query->where('precio', '<=', $request->precio_max);
    }

    // Filtrar por categoría
    if ($request->filled('categoria_id')) {
        $query->where('categoria_id', $request->categoria_id);
    }

    // Obtener los productos filtrados
    $productos = $query->get();

    return view('productos', compact('productos', 'categorias'));
}





public function index()
{
    // Obtener productos destacados (por ejemplo, los 5 más recientes)
    $productosDestacados = Producto::latest()->take(5)->get();

    // Obtener todas las categorías
    $categorias = Categoria::all();

    return view('inicio', compact('productosDestacados', 'categorias'));
}

public function mostrar()
    {
        return view('contacto');
    }

    public function enviar(Request $request)
    {
        // Validar datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email',
            'mensaje' => 'required|string',
        ]);

        // Aquí podrías enviar un email, guardar en base de datos, etc.
        // Por ejemplo:
        // Mail::to('admin@miweb.com')->send(new ContactoMail($request->all()));

        return back()->with('success', 'Tu mensaje ha sido enviado correctamente.');
    }

    public function añadir_productos()
    {
        $productos = Producto::with('categoria')->get(); // Traemos categoría de cada producto
        $categorias = Categoria::all();
        return view('añadir_productos', compact('productos','categorias'));
    }

    public function guardarPedido(Request $request)
    {
        // Validación básica
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
        ]);

        // Guardar pedido
        Pedido::create([
            'producto_id' => $request->producto_id,
            'cantidad' => $request->cantidad,
        ]);

        return back()->with('success', 'Pedido realizado correctamente.');
    }

    public function crearProducto()
{
    $categorias = Categoria::all(); // Para llenar el select
    return view('crear', compact('categorias'));
}

public function guardarProducto(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'precio' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'categoria_id' => 'required|exists:categorias,id',
        'imagen' => 'nullable|string|max:255', // solo texto URL
    ]);

    // Tomar los datos directamente
    $datos = $request->only(['nombre','descripcion','precio','stock','categoria_id','imagen']);

    // Crear el producto
    Producto::create($datos);

    return back()->with('success', 'Producto agregado correctamente.');
}

public function editarProducto(Request $request)
{
    $productos = Producto::all();
    $categorias = Categoria::all();
    $producto = null;

    // Selección del producto desde el select
    if ($request->has('producto_id') && $request->producto_id != '') {
        $producto = Producto::findOrFail($request->producto_id);
    }

    return view('editar', compact('productos', 'categorias', 'producto'));
}

public function actualizarProducto(Request $request, $id)
{
    // Validación sin stock
    $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'precio' => 'required|numeric|min:0',
        'categoria_id' => 'required|exists:categorias,id',
        'imagen' => 'nullable|string|max:255',
    ]);

    // Buscar el producto
    $producto = Producto::findOrFail($id);

    // Actualizar solo los campos que existen
    $producto->update($request->only(['nombre','descripcion','precio','categoria_id','imagen']));

    // Redirigir a la misma página de edición con mensaje
    return redirect()->route('producto.editar', ['producto_id' => $id])
                     ->with('success', 'Producto modificado correctamente.');
}



public function eliminarProducto(Request $request, $id)
{
    $producto = Producto::findOrFail($id);
    $producto->delete();

    // Redirigir explícitamente a la página de editar productos
    // Opcional: no pasar producto_id si se eliminó el que estaba seleccionado
    return redirect()->route('producto.editar')->with('success', 'Producto eliminado correctamente.');
}



}
