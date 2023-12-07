<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Visualizar Pedidos</title>
  <style>
    /* Estilos CSS para a tabela */
    table {
      border-collapse: collapse;
      width: 100%;
    }
    th, td {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }
    th {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>
  <h1>Lista de Pedidos</h1>
  <?php
  // Configurações da conexão com a base de dados
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "clients";

  // Cria a conexão
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Verifica a conexão
  if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
  }

  // Query SQL para recuperar os dados
  $sql = "SELECT pedidos.id AS 'ID Pedido', clientes.nombre AS 'Cliente', pedidos.descripcion AS 'Descripción', pedidos.cantidad AS 'Cantidad', pedidos.precio_unitario AS 
  'Precio Unitario', pedidos.fecha_pedido AS 'Fecha del Pedido' FROM pedidos JOIN clientes ON pedidos.cliente_id = clientes.id";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Imprime os dados na tabela HTML
    echo "<table><thead><tr><th>ID Pedido</th><th>Cliente</th><th>Descripción</th><th>Cantidad</th><th>Precio Unitario</th><th>Fecha del Pedido</th></tr></thead><tbody>";

    while($row = $result->fetch_assoc()) {
      echo "<tr><td>" . $row["ID Pedido"] . "</td><td>" . $row["Cliente"] . "</td><td>" . $row["Descripción"] . "</td><td>" . $row["Cantidad"] . "</td><td>" . $row["Precio Unitario"] . "</td><td>" . $row["Fecha del Pedido"] . "</td></tr>";
    }

    echo "</tbody></table>";
  } else {
    echo "Não foram encontrados resultados.";
  }

  // Fecha a conexão
  $conn->close();
  ?>
</body>
</html>
