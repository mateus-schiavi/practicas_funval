<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $cliente_id = $_POST["cliente"];
    $descripcion = $_POST["descripcion"];
    $cantidad = $_POST["cantidad"];
    $precio_unitario = $_POST["precio_unitario"];
    $fecha_pedido = $_POST["fecha_pedido"];

    // Conexão com o banco de dados (substitua pelos seus próprios dados)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "clients";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    $sql = "INSERT INTO pedidos (cliente_id, descripcion, cantidad, precio_unitario, fecha_pedido)
            VALUES ('$cliente_id', '$descripcion', '$cantidad', '$precio_unitario', '$fecha_pedido')";

    if ($conn->query($sql) === TRUE) {
        echo "Pedido registrado com sucesso!";
    } else {
        echo "Erro ao registrar pedido: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Erro no envio do formulário.";
}
?>
