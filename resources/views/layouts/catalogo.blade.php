<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Catálogo de Productos')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" type="image/png" href="https://upload.wikimedia.org/wikipedia/commons/f/fb/Minecraft-creeper-face.jpg">

    <style>
        /* Reset básico */
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body { 
            font-family: 'Courier New', Courier, monospace; 
            background: #a2d149; /* verde hierba estilo Minecraft */
            color: #333;
        }

        /* Header */
        header { 
            background: #5d4037; /* marrón tierra */
            color: #fff; 
            padding: 25px 0; 
            border-bottom: 5px solid #8d6e63; /* borde estilo bloque */
            text-align: center;
        }

        header h1 { 
            font-size: 28px; 
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #fff;
            text-shadow: 2px 2px #333; /* efecto pixelado */
        }

        nav { 
            margin-top: 15px; 
        }

        nav a { 
            color: #fff; 
            margin: 0 15px; 
            text-decoration: none; 
            font-weight: bold;
            padding: 5px 10px;
            border: 2px solid #fff;
            border-radius: 4px;
            transition: all 0.2s;
        }

        nav a:hover { 
            background: #ffcc00; /* amarillo bloque oro */
            color: #000;
            border-color: #ffcc00;
        }

        /* Contenedor principal */
        .container { 
            max-width: 1200px; 
            margin: auto; 
            padding: 30px 20px; 
        }

        /* Productos */
        .products { 
            display: flex; 
            flex-wrap: wrap; 
            gap: 25px; 
            justify-content: center;
        }

        .product-card { 
            background: #cfcfcf; /* gris piedra */
            padding: 20px; 
            border-radius: 6px; 
            width: 220px; 
            box-shadow: 4px 4px 0 #888; /* efecto bloque */
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            border: 2px solid #555;
        }

        .product-card:hover { 
            transform: translateY(-5px); 
            box-shadow: 6px 6px 0 #555; 
        }

        .product-card img { 
            max-width: 100%; 
            border-radius: 4px; 
            margin-bottom: 12px;
            border: 2px solid #555;
        }

        .product-card h3 { 
            font-size: 16px; 
            margin-bottom: 8px; 
            color: #222;
        }

        .product-card p { 
            font-size: 14px; 
            color: #333; 
            min-height: 40px; 
        }

        .price { 
            font-weight: bold; 
            margin-top: 10px; 
            color: #ffcc00; /* dorado estilo Minecraft */
            font-size: 16px;
            text-shadow: 1px 1px #555;
        }

        /* Footer */
        footer { 
            background: #5d4037; /* marrón tierra */
            color: #fff; 
            padding: 20px 0; 
            text-align: center;
            border-top: 5px solid #8d6e63; /* estilo bloque */
            margin-top: 40px;
        }

        footer p { 
            font-size: 14px; 
            letter-spacing: 1px;
            text-shadow: 1px 1px #333;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <h1>MI TIENDA MINECRAFT</h1>
            <nav>
                <a href="/trabajo-laravel/public/">Inicio</a>
                <a href="/trabajo-laravel/public/productos">Productos</a>
                <a href="/trabajo-laravel/public/añadir_productos">Añadir Producto</a>
                <a href="/trabajo-laravel/public/productos/crear">Crear Producto</a>
                <a href="/trabajo-laravel/public/productos/editar">Editar Producto</a>
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
            <p>&copy; {{ date('Y') }} MI TIENDA DE MINECRAFT</p>
        </div>
    </footer>
</body>
</html>


