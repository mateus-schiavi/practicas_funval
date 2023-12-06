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

    // Inclua o arquivo de conexão
    require_once '../config/database.php';

    // Aqui você pode adicionar a lógica para inserir os dados na sua tabela do banco de dados
    // Isso pode ser feito usando SQL INSERT

    // Crie a instrução SQL
    $sql = "INSERT INTO data_base (first_name, last_name, email, password, user_type, status) VALUES ('$name', '$surname', '$email', '$password', '$type', '$status')";

    // Execute a query SQL
    if ($conn->query($sql) === TRUE) {
        // Redirecione para a página de lista de usuários após a inserção
        header("Location: practica_calificada_3.php");
        exit();
    } else {
        echo "Erro ao inserir os dados: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulário de Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-md mx-auto bg-white rounded p-6">
        <h1 class="text-2xl font-bold mb-4">Formulário de Registro</h1>
        <form method="post" action="add_user.php" class="grid grid-cols-2 gap-4">
            <div class="col-span-2 sm:col-span-1">
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-2">Nome:</label>
                    <input type="text" id="name" name="name" required class="border border-gray-400 p-2 rounded-md w-full">
                </div>

                <div class="mb-4">
                    <label for="surname" class="block text-gray-700 font-bold mb-2">Sobrenome:</label>
                    <input type="text" id="surname" name="surname" required class="border border-gray-400 p-2 rounded-md w-full">
                </div>
            </div>

            <div class="col-span-2 sm:col-span-1">
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
                    <input type="email" id="email" name="email" required class="border border-gray-400 p-2 rounded-md w-full">
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-bold mb-2">Senha:</label>
                    <input type="password" id="password" name="password" required class="border border-gray-400 p-2 rounded-md w-full">
                </div>
            </div>

            <div class="col-span-2">
                <div class="mb-4">
                    <label for="type" class="block text-gray-700 font-bold mb-2">Tipo:</label>
                    <select id="type" name="type" class="border border-gray-400 p-2 rounded-md w-full">
                        <option value="admin">Admin</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="status" class="block text-gray-700 font-bold mb-2">Status:</label>
                    <input type="text" id="status" name="status" class="border border-gray-400 p-2 rounded-md w-full">
                </div>
            </div>

            <div class="col-span-2">
                <input type="submit" value="Enviar" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer">
            </div>
            <div class="col-span-2">
                <a href="./practica_calificada_3.php" class="block text-center text-gray-600 mt-4 hover:text-blue-600">Volver a la lista de usuarios</a>
            </div>
        </form>
    </div>
</body>
</html>

