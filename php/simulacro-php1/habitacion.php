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
            <option value="simple" >Simple: 65€</option>
            <option value="doble" >Doble: 80€</option>
            <option value="triple" >Triple: 140€</option>
            <option value="suite" >Suite: 180€</option>
        </select>
        <input type="submit" name="submit" id="submit">
    </form>

    <?php
    //Funcion del dni de la validacion
        function validacion_dni($dni){ 
            $misletras = substr($dni, -1);
            $numerosdni = substr($dni, 0, -1);
            return (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numerosdni%23, 1) == $misletras && strlen($misletras) == 1 && strlen ($numerosdni) == 8);
        }

    //Funcion del email de la validacion
        function validateEmail($email) {
            return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
        }

        

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = htmlspecialchars($_POST["nombre"]);
            $apellido = htmlspecialchars($_POST["apellido"]);
            $email = htmlspecialchars($_POST["email"]);
            $dni = htmlspecialchars($_POST["dni"]);
            $submit = htmlspecialchars($_POST["submit"]);

        //Valido que todos los campos estén llenos
            if ($email != "" && $dni != "" && $nombre != "" && $apellido != "") {

                $dniValido = validacion_dni($dni);  //Ejecuto las funciones de validación, una vez sepa que todos los campos están rellenos
                $emailValido = validateEmail($email);

                if (!$dniValido) { //Valido que esté correcto el dni
                    echo "<p>El dni no es correcto</p>";
                } 

                else if (!$emailValido) { //Valido que este correcto el email
                    echo "<p>El email no es correcto</p>";
                } 

                else { //Si dni y email son correctos...
                    if (isset($_POST["habitacion"])) {
                        $opcionElegida = $_POST["habitacion"]; //Variable del SELECT
                        $imagen0 = "hab0.png"; //Variables para las imágenes, se ponen así pqq están en la misma carpeta
                        $imagen1 = "hab1.png";
                        $imagen2 = "hab2.png";
                        $imagen3 = "hab3.png";

                        switch ($opcionElegida) {
                            case "simple":
                                echo "<br><br><h2>Resumen de la compra:</h2><br><p>Nombre del comprador: $nombre</p>" . "<p>Apellido: $apellido</p>" . "<p>Dni: $dni</p>"
                                 . "<p>Su email es: $email</p>" . 
                                "<p>Tiene que pagar 65 euros y esta es la imagen de su habitación:</p><br>" . '<img src="' . $imagen0 . '" width="15%" height="10%" alt="foto">';
                                break;
                            case "doble":
                                echo "<br><br><h2>Resumen de la compra:</h2><br><p>Nombre del comprador: $nombre</p>" . "<p>Apellido: $apellido</p>" . "<p>Dni: $dni</p>"
                                . "<p>Su email es: $email</p>" . 
                               "<p>Tiene que pagar 80 euros y esta es la imagen de su habitación:</p><br>" . '<img src="' . $imagen1 . '" width="15%" height="10%" alt="foto">';                                
                               break;
                            case "triple":
                                echo "<br><br><h2>Resumen de la compra:</h2><br><p>Nombre del comprador: $nombre</p>" . "<p>Apellido: $apellido</p>" . "<p>Dni: $dni</p>"
                                . "<p>Su email es: $email</p>" . 
                               "<p>Tiene que pagar 140 euros y esta es la imagen de su habitación:</p><br>" . '<img src="' . $imagen2 . '" width="15%" height="10%" alt="foto">';                                
                               break;
                            case "suite":
                                echo "<br><br><h2>Resumen de la compra:</h2><br><p>Nombre del comprador: $nombre</p>" . "<p>Apellido: $apellido</p>" . "<p>Dni: $dni</p>"
                                . "<p>Su email es: $email</p>" . 
                               "<p>Tiene que pagar 180 euros y esta es la imagen de su habitación:</p><br>" . '<img src="' . $imagen3 . '" width="15%" height="10%" alt="foto">';                                
                               break;
                        }
                    }
                    else {
                        echo "<p>Debes de seleccionar alguna habitación</p>";
                    }
                    
                } 

            } else {
                echo "<p>Todos los campos deben estar llenos</p>";
            }
        }
    ?>

</body>
</html>