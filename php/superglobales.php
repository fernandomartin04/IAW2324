<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superglobales</title>
</head>
<body>
    <?php

        $IP = $_SERVER['REMOTE_ADDR'];
        $navegador = $_SERVER['HTTP_USER_AGENT'];
        $paginaPrevia = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "No disponible";

        echo "<p>Tu dirección IP es: $IP , el navegador que usas es $navegador y <br>
        la página previa que lo ha referido es $paginaPrevia</p>";

    ?>
</body>
</html>