<?php
// Inclui o arquivo de conexão com o banco de dados
include '../config/database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuários</title>
    <!-- Adicione o link para o arquivo de estilo do Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="flex justify-center items-center flex-col mt-8">
    <h1 class="text-2xl font-bold mb-4">Lista de Usuários</h1>
    <a href="add_user.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Add
    </a>
    <div class="flex justify-center items-center">
        <table class="table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2">State</th>
                    <th class="px-4 py-2">User</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">User_type</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Query para selecionar os campos específicos da tabela
                $sql = "SELECT status AS State, CONCAT(first_name, ' ', last_name) AS User, email AS Email, user_type AS User_type FROM data_base";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td class='border px-4 py-2'>".$row["State"]."</td>
                                <td class='border px-4 py-2'>".$row["User"]."</td>
                                <td class='border px-4 py-2'>".$row["Email"]."</td>
                                <td class='border px-4 py-2'>".$row["User_type"]."</td>
                                <td class='border px-4 py-2'>
                                    <button class='flex items-center text-red-500'>
                                        <svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' viewBox='0 0 20 20' fill='currentColor'>
                                            <path fill-rule='evenodd' d='M13.5 3h-3l-1-1h-3l-1 1h-3v1h14v-1zM5.5 5h9l1 14h-11l1-14zm4-2h2l-1 1h-1l-1-1zm-3 3v1h8v-1h-8z' clip-rule='evenodd' />
                                        </svg>
                                    </button>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td class='border px-4 py-2' colspan='5'>0 resultados</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php
// Fecha a conexão com o banco de dados
$conn->close();
?>
</body>
</html>
