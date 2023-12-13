<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
        <input type="text" name="usuario" placeholder="Introduzca su usuario"> 
        <input type="text" name="contraseña" placeholder="Introduzca su contraseña">
        <input type="submit" name="submit">
    </form>

    <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $usuario = htmlspecialchars($_POST["usuario"]);
            $contraseña = htmlspecialchars($_POST["contraseña"]);
            $submit = htmlspecialchars($_POST["submit"]);


            if(isset($_GET["https://myblog-bb9atfhl8i.live-website.com/php/examen1php_fernando/config.php"])) {
                if ($usuario == $_GET["usuario"] && $contraseña == $_GET["contraseña"]) {
                    echo "<p>Acceso permitido</p>";
                }
                else {
                    echo "<p>Nop</p>";
                }
            }
        }

    ?>

</body>
</html>