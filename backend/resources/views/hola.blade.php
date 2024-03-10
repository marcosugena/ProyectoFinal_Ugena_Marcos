<!-- hola.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hola</title>
</head>
<body>
    <h1>Lista de productos</h1>

    <ul>
        @foreach($productos as $producto)
            <li>
                {{ $producto->nombre }}
                <!-- hola.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hola</title>
</head>
<body>
    <h1>Lista de productos</h1>

    <ul>
        @foreach($productos as $producto)
            <li>
                {{ $producto->nombre }}
                <img src="data:image/png;base64,{{ base64_encode($producto->ImagenProducto) }}" alt="Imagen del producto">
            </li>
        @endforeach
    </ul>
</body>
</html>

            </li>
        @endforeach
    </ul>
</body>
</html>
