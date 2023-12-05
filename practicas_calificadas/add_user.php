<?php
// Verifique se os dados foram submetidos via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os valores dos campos do formulário
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $type = $_POST["type"];
    $status = $_POST["status"];

    // Aqui você pode adicionar a lógica para inserir os dados na sua tabela do banco de dados
    // Isso pode ser feito usando SQL INSERT
    // Por exemplo:
    // $sql = "INSERT INTO users (name, surname, email, password, type, status) VALUES ('$name', '$surname', '$email', '$password', '$type', '$status')";
    // Execute a query SQL usando sua conexão com o banco de dados

    // Redirecione para a página de lista de usuários após a inserção
    header("Location: lista_de_usuarios.php");
    exit();
}
?>
