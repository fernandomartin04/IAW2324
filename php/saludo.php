<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saludo php</title>
</head>
<body>

    <form action="" method="post">
        Nombre: <input type="submit" value="Enviarme!">
    </form>

    <?php
    
        if(isset($_POST["submit"])) {
            $fecha = date("d/m/y");
            echo "Hola" . $_POST['nombre'] . "hoy es $fecha";
        }
    
    ?>
</body>
</html>