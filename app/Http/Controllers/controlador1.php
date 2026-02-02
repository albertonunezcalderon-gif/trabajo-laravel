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
    $categorias = Categoria::all(); //Aunque obtengas todos los productos con las categorías esto nos sirve para luego mostrar en un select todas las categorías

    // Iniciamos la consulta
    $query = Producto::with('categoria'); //Obtener los productos añadiendo las categorias es decir todos los registros de los productos con las categorías

    // Filtrar por nombre (si existe)
    if ($request->filled('nombre')) { //Sirve para verificar si el campo nombre en la petición no esta vacío
        $query->where('nombre', 'like', '%'.$request->nombre.'%');
    }

    // Filtrar por precio mínimo
    if ($request->filled('precio_min')) {
        $query->where('precio', '>=', $request->precio_min); //Realiza una sentencia SQL con eloquend para obtener los que el precio sea menor que precio_min de la petición del formulario
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
    // Obtener productos destacados en este caso los últimos 5
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
        // Validar el pedido
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
        'imagen' => 'nullable|string|max:255',
    ]);

    // Tomar los datos solamente nombre, descripción, precio, stock, categoria_id, imagen
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
    if ($request->filled('producto_id')) {
        $producto = Producto::findOrFail($request->producto_id);
    }

    return view('editar', compact('productos', 'categorias', 'producto'));
}

public function actualizarProducto(Request $request, $id)
{
    // Validación
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

    // Redirigir a la misma página de edición con el mensaje
    return redirect()->route('producto.editar', ['producto_id' => $id])
                     ->with('success', 'Producto modificado correctamente.');
}



public function eliminarProducto(Request $request, $id)
{
    $producto = Producto::findOrFail($id);
    $producto->delete();

    // Redirigir explícitamente a la página de editar productos
    return redirect()->route('producto.editar')->with('success', 'Producto eliminado correctamente.');
}



}
