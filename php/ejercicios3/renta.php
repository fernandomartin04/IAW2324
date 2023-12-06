<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Renta php</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">

        <input type="text" name="nombre" placeholder="Escribe tu nombre"><br><br>
        <input type="text" name="apellido" placeholder="Escribe tu apellido"><br><br>
        <input type="text" name="email" placeholder="Escribe tu email"><br><br>
        <input type="text" name="dni" placeholder="Escribe tu dni"><br><br>
        <input type="submit" name="submit">
    </form>

    <?php

        function validacion_dni($dni){ //función de validación del dni
            $misletras = substr($dni, -1);
            $numerosdni = substr($dni, 0, -1);
            if ( substr("TRWAGMYFPDXBNJZSQVHLCKE", $numerosdni%23, 1) == $misletras && strlen($misletras) == 1 && strlen ($numerosdni) == 8 ){
                return true;
            }else{
                return false;
            }
        }

        function validateEmail($email) {
            if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return true;
            }
            else {
                return false;
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = htmlspecialchars($_POST["nombre"]);
            $apellido = htmlspecialchars($_POST["apellido"]);
            $email = htmlspecialchars($_POST["email"]);
            $dni = htmlspecialchars($_POST["dni"]);

            $dni_valido = validacion_dni($dni);
            
            if ($dni_valido == true && validateEmail($email) == true) { 
                echo "<p>Este DNI es válido y correos son válidos</p>";

            } 
            else {
                echo "<p>Uno de los dos no es verdadero</p>";

            }
            
            
                
        } 

    ?>

</body>
</html>