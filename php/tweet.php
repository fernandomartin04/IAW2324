<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tweets</title>
    
</head>
<body>
    <?php
        // Definir la función para mostrar un tweet
        function mostrarTweet($usuario, $contenido) {
            echo "<div class='tweet'>";
            echo "<span class='usuario'>$usuario:</span>";
            echo "<p class='contenido'>$contenido</p>";
            echo "</div>";
        }

        // Array de tweets
        $tweets = array(
            array("usuario" => "Usuario1", "contenido" => "Este es el primer tweet"),
            array("usuario" => "Usuario2", "contenido" => "Este es el sgundo tweet"),
            array("usuario" => "Usuario3", "contenido" => "Este es el tercer tweet"),
        );

        // Recorrer el array de tweets y mostrar cada uno
        foreach ($tweets as $tweet) {
            mostrarTweet($tweet["usuario"], $tweet["contenido"]);
        }
    ?>
</body>
</html>