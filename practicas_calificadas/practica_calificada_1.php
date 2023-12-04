<!DOCTYPE html>
<html>

    <head>
        <title>Calculadora</title>
    </head>

    <body>
        <form method="post" action="./practica_calificada_1.php">
            <label for="numero1">Ingrese el primer número:</label>
            <input type="number" name="numero1" id="numero1">
            <br>
            <label for="numero2">Ingrese el segundo número:</label>
            <input type="number" name="numero2" id="numero2">
            <br>
            <input type="submit" value="Calcular">
        </form>

        <?php
    // Verificar si se enviaron los datos del formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los valores ingresados por el usuario
        $numero1 = $_POST["numero1"];
        $numero2 = $_POST["numero2"];

        // Realizar los cálculos
        $suma = $numero1 + $numero2;
        $resta = $numero1 - $numero2;
        $multiplicacion = $numero1 * $numero2;

        // Verificar si el segundo número es distinto de cero para evitar división por cero
        if ($numero2 != 0) {
            $division = $numero1 / $numero2;
            $modulo = $numero1 % $numero2;

            // Mostrar los resultados
            echo "La suma de $numero1 y $numero2 es: $suma <br>";
            echo "La resta de $numero1 y $numero2 es: $resta <br>";
            echo "La multiplicación de $numero1 y $numero2 es: $multiplicacion <br>";
            echo "La división de $numero1 entre $numero2 es: $division <br>";
            echo "El módulo de la división de $numero1 entre $numero2 es: $modulo <br>";
        } else {
            echo "No se puede dividir por cero.";
        }
    }
    ?>
    </body>

</html>