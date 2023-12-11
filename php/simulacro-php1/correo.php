<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Correo php</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
        <input type="text" name="nombre" id="nombre" placeholder="Escribe tu nombre"><br><br>
        <input type="text" name="apellido" id="apellido" placeholder="Escribe tu apellido"><br><br>
        <input type="text" name="email" id="email" placeholder="Escribe tu email"><br><br>
        <input type="text" name="dni" id="dni" placeholder="Escribe tu dni"><br><br>
        <label for="habitaciones">Elige el tipo de habitación: </label>
        <select name="habitacion" id="habitacion">
            <option value="simple" name="simple">Simple: 65€</option>
            <option value="doble" name="doble">Doble: 80€</option>
            <option value="triple" name="triple">Triple: 140€</option>
            <option value="suite" name="suite">Suite: 180€</option>
        </select>
        <input type="submit" name="submit" id="submit">
    </form>

    <?php

    ?>
</body>
</html>