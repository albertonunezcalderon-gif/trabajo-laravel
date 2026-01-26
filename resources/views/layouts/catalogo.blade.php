<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Catálogo de Productos')</title>
    <!-- CSS global -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        /* Estilo básico rápido */
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background: #f5f5f5; }
        header, footer { background: #232f3e; color: #fff; padding: 20px; }
        header h1 { margin: 0; }
        nav a { color: #fff; margin-right: 15px; text-decoration: none; }
        .container { max-width: 1200px; margin: auto; padding: 20px; }
        .products { display: flex; flex-wrap: wrap; gap: 20px; }
        .product-card { background: #fff; padding: 15px; border-radius: 8px; width: 200px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .product-card img { max-width: 100%; border-radius: 5px; }
        .product-card h3 { font-size: 16px; margin: 10px 0 5px; }
        .product-card p { font-size: 14px; color: #555; }
        .price { font-weight: bold; margin-top: 5px; color: #b12704; }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <h1>MI TIENDA ONLINE</h1>
            <nav>
                <a href="/trabajo-laravel/public/">Inicio</a>
                <a href="/trabajo-laravel/public/productos">Productos</a>
                <a href="/trabajo-laravel/public/contacto">Contacto</a>
                <a href="/trabajo-laravel/public/añadir_productos">Añadir Producto</a>
                <a href="/trabajo-laravel/public/productos/crear">Crear Producto</a>
                <a href="/trabajo-laravel/public/productos/editar">Editar Producto</a>
            </nav>
            </nav>
        </div>
    </header>

    <!-- Contenido principal -->
    <div class="container">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; {{ date('Y') }} Mi Catálogo. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>
