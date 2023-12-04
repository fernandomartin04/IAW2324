<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuesta php</title>
</head>
<body>
    <form action="" method="post">
        Nombre: <input type="text" name="nombre"><br><br>
        Apellido: <input type="text" name="apellido"><br><br>
        Pelicula favorita: <input type="text" name="pelicula"><br><br>
        Eres mayor de edad: <input type="checkbox" name="edad"><br><br>
        Equipo favorito: <br><br>
        <input type="radio" name="futbol" value="sevilla"> Sevilla:
        <input type="radio" name="futbol" value="barsa"> Barsa:
        <input type="radio" name="futbol" value="madrid"> Madrid:
        <input type="radio" name="futbol" value="betis"> Betih
        <input type="submit" name="submit">

    </form>

    <?php

        $nombre = htmlspecialchars($_POST['nombre']);
        $apellido = htmlspecialchars($_POST['apellido']);
        $pelicula = htmlspecialchars($_POST['pelicula']);
        $edad = htmlspecialchars($_POST['edad']);
        $futbol = htmlspecialchars($_POST['futbol']);

        if(isset($_POST["submit"])) {
            if (empty($edad)) {
                echo $nombre "<br>" . $apellido "<br>" . $pelicula "<br>" . $futbol;
            }
            else {
                echo $nombre "<br>" . $apellido "<br>" . $pelicula "<br>" . $edad "<br>" . $futbol;
            }
        }

    ?>

</body>
</html>