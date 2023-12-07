<!DOCTYPE html>
<html>
<head>
    <title>Formulário de Novo Pedido</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center h-screen">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <h2 class="text-xl mb-4">Registrar Novo Pedido</h2>
        <form method="post" action="../config/procesar_pedido.php">
            <div class="mb-4">
                <label for="cliente" class="block text-gray-700">Seleccionar Cliente:</label>
                <select name="cliente" class="w-full border border-gray-300 p-2 rounded mt-1">
                <?php
                    // Conexão com o banco de dados (substitua pelos seus próprios dados)
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "clients";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Falha na conexão: " . $conn->connect_error);
                    }

                    $sql = "SELECT id, nombre FROM clientes";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row["id"] . '">' . $row["nombre"] . '</option>';
                        }
                    } else {
                        echo '<option value="">Nenhum cliente encontrado</option>';
                    }

                    $conn->close();
                ?>
                </select>
            </div>
            <div class="mb-4">
                <label for="descripcion" class="block text-gray-700">Descripción:</label>
                <input type="text" name="descripcion" class="w-full border border-gray-300 p-2 rounded mt-1" required>
            </div>
            <div class="mb-4">
                <label for="cantidad" class="block text-gray-700">Cantidad:</label>
                <input type="number" name="cantidad" class="w-full border border-gray-300 p-2 rounded mt-1" required>
            </div>
            <div class="mb-4">
                <label for="precio_unitario" class="block text-gray-700">Precio Unitario:</label>
                <input type="text" name="precio_unitario" class="w-full border border-gray-300 p-2 rounded mt-1" required>
            </div>
            <div class="mb-4">
                <label for="fecha_pedido" class="block text-gray-700">Fecha del Pedido:</label>
                <input type="date" name="fecha_pedido" class="w-full border border-gray-300 p-2 rounded mt-1" required>
            </div>
            <div class="mb-4">
                <input type="submit" name="submit" value="Registrar Pedido" class="bg-blue-500 text-white px-4 py-2 rounded cursor-pointer">
            </div>
        </form>
    </div>
</body>
</html>
