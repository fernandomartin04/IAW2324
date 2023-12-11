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
        <select name="habitacion" id="habitacion">
            <option value="simple" name="simple">Simple: 65€</option>
            <option value="doble" name="doble">Doble: 80€</option>
            <option value="triple" name="triple">Triple: 140€</option>
            <option value="suite" name="suite">Suite: 180€</option>
        </select>
        <input type="submit" name="submit" id="submit">
    </form>

    <?php
        //Función que valida el dni
        function validacionDni($dni){ 
            $misletras = substr($dni, -1);
            $numerosdni = substr($dni, 0, -1);
            return (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numerosdni%23, 1) == $misletras && strlen($misletras) == 1 && strlen ($numerosdni) == 8);
        }

        //Función que valida el correo
        function validacionEmail($email) {
            return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
        }


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = htmlspecialchars($_POST["nombre"]);
            $apellido = htmlspecialchars($_POST["apellido"]);
            $email = htmlspecialchars($_POST["email"]);
            $dni = htmlspecialchars($_POST["dni"]);
            $submit = htmlspecialchars($_POST["submit"]);

            if ($habitacion != "" && $email != "" && $dni != "" && $nombre != "" && $apellido != "") {

                //Si todos los campos están rellenos, ejecuto las funciones de validacion
                $dniValido = validacionDni($dni);
                $emailValido = validacionEmail($email);

                if (!$dniValido) { //Valido si el dni es correcto
                    echo "<p>El dni no es correcto</p>";
                }
                else if (!$emailValido){
                    echo "<p>El email no es válido</p>";
                }
                else {
                    if () {
                        ;
                    }
                }
            }

            else {
                echo "<p>Todo el formulario hay que responderlo</p>"
            }
        }
        
    ?>

</body>
</html>