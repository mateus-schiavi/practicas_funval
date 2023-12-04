<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Usando Tailwind CSS</title>
    <!-- Enlace al archivo CSS de Tailwind -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class="flex justify-center items-center h-screen">
        <div class="border border-black p-6">
            <?php
            // Array de lista de compras
            $listaCompras = [
                "id" => 1,
                "nombre" => "Lista 1",
                "productos" => [
                    ["nombre" => "Manzana", "precio" => 10, "cantidad" => 4],
                    ["nombre" => "Pera", "precio" => 5, "cantidad" => 10],
                    ["nombre" => "Pan", "precio" => 2, "cantidad" => 20],
                    ["nombre" => "Plátano", "precio" => 4, "cantidad" => 14],
                    ["nombre" => "Leche", "precio" => 6, "cantidad" => 3]
                ]
            ];
            ?>
            <h1 class="text-3xl font-bold mb-4">Lista de Compras - <?php echo $listaCompras['nombre']; ?></h1>
            <p>ID: <?php echo $listaCompras['id']; ?></p>
            <h2 class="mt-4 mb-2">Productos:</h2>
            <ul>
                <?php foreach ($listaCompras['productos'] as $producto) : ?>
                    <li class="flex justify-between items-center bg-blue-200 p-2 rounded-md mb-2">
                        <div>
                            <?php echo "{$producto['nombre']}"; ?>
                        </div>
                        <div>
                            <span class="font-bold">Precio:</span> $<?php echo "{$producto['precio']}"; ?><br>
                            <span class="font-bold">Cantidad:</span> <?php echo "{$producto['cantidad']}"; ?>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
            <?php
            // Calcular el total de precios
            $totalPrecio = array_reduce(
                $listaCompras['productos'],
                function ($carry, $producto) {
                    return $carry + ($producto['precio'] * $producto['cantidad']);
                },
                0
            );
            ?>
            <p class="mt-4 text-right">Total de precios: $<?php echo $totalPrecio; ?></p>
        </div>
    </div>
</body>

</html>
