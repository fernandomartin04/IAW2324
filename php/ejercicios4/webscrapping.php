<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webscraping PHP</title>
</head>
<body>
    <h1>Webscraping PHP</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="url">URL:</label>
        <input type="text" name="url" id="url" placeholder="Ingrese la URL">
        <input type="submit" value="Obtener y analizar">
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            // Obtengo la URL del formulario
            $url = $_POST["url"];

            // Utiliza file_get_contents para obtener el contenido remoto
            $contenido = file_get_contents($url);

            // Verifica si la operación fue exitosa
            if ($contenido === false) {
                echo "Error al obtener el contenido remoto.";
            } 
            else {
                // Muestra el contenido obtenido 
                echo "<pre>" . htmlentities($contenido) . "</pre>";

                // Encuentra direcciones de correo electrónico utilizando una expresión regular simple
                $patron_email = '/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/';
                preg_match_all($patron_email, $contenido, $matches);

                // Muestra las direcciones de correo electrónico encontradas
                if (!empty($matches[0])) {
                    echo "<h2>Direcciones de correo electrónico encontradas:</h2>";
                    echo "<ul>";
                    foreach (array_unique($matches[0]) as $email) {
                        echo "<li>$email</li>";
                    }
                    echo "</ul>";
                } 
                else {
                    echo "<p>No se encontraron direcciones de correo electrónico.</p>";
                }
            }
        }
    ?>

</body>
</html>
