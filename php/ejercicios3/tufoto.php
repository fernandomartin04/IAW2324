<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu foto</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">

        <input type="text" name="nombre"><br><br>
        <input type="file" name="file"><br><br>
        <input type="submit" name="submit">
    </form>
    <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = htmlspecialchars($_POST["nombre"]);
            $archivo = htmlspecialchars($_POST["file"]);
            $submit = htmlspecialchars($_POST["submit"]);

            $imagenNombre = $_FILES["file"]["name"];
            $imagenTipo = $_FILES["file"]["type"];
            $imagenTmpName = $_FILES["file"]["tmp_name"];

            $carpetaDestino = "imagenes/";
            $rutaDestino = $carpetaDestino . $imagenNombre;
            move_uploaded_file($imagenTmpName, $rutaDestino);

            echo '<p>Nombre: ' . $nombre . '</p>';
            echo '<img src="' . $rutaDestino . '" alt="foto">';

        }

        

        

    ?>

    
</body>
</html>