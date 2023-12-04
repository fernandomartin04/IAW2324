<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuesta php</title>
</head>
<body>
    <form action="" method="post">
        Nombre: <input type="text" name="nombre"><br>
        Apellido: <input type="text" name="apellido"><br>
        Pelicula favorita: <input type="text" name="pelicula"><br>
        Eres mayor de edad: <input type="checkbox" name="edad">
    </form>

    <?php

        $nombre = htmlspecialchars($_POST['nombre']);
        $apellido = htmlspecialchars($_POST['apellido']);
        $pelicula = htmlspecialchars($_POST['pelicula']);
        $edad = htmlspecialchars($_POST['edad']);


    ?>

</body>
</html>