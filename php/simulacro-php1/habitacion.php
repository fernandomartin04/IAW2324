<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Habitación en php</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
        <input type="text" name="nombre" id="nombre" placeholder="Escribe tu nombre"><br><br>
        <input type="text" name="apellido" id="apellido" placeholder="Escribe tu apellido"><br><br>
        <input type="text" name="email" id="email" placeholder="Escribe tu email"><br><br>
        <input type="text" name="dni" id="dni" placeholder="Escribe tu dni"><br><br>
        <label for="habitaciones">Elige el tipo de habitación: </label>
        <select name="cars" id="cars">
            <option value="simple">Simple: 65€</option>
            <option value="doble">Doble: 80€</option>
            <option value="triple">Triple: 140€</option>
            <option value="suite">Suite: 180€</option>
        </select>
        <input type="submit" name="submit" id="submit">
    </form>

    <?php
        //Función que valida el dni
        function validacion_dni($dni){ 
            $misletras = substr($dni, -1);
            $numerosdni = substr($dni, 0, -1);
            return (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numerosdni%23, 1) == $misletras && strlen($misletras) == 1 && strlen ($numerosdni) == 8);
        }

        //Función que valida el correo
        function validateEmail($email) {
            return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
        }

        
    ?>

</body>
</html>