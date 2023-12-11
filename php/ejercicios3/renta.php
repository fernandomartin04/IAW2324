<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Renta php</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">

        <input type="text" name="nombre" id="nombre" placeholder="Escribe tu nombre"><br><br>
        <input type="text" name="apellido" id="apellido" placeholder="Escribe tu apellido"><br><br>
        <input type="text" name="salario" id="salario" placeholder="Escribe tu salario en bruto"><br><br>
        <input type="text" name="email" id="email" placeholder="Escribe tu email"><br><br>
        <input type="text" name="dni" id="dni" placeholder="Escribe tu dni"><br><br>
        <input type="submit" name="submit" id="submit">
    </form>

    <?php
        function validacion_dni($dni){ 
            $misletras = substr($dni, -1);
            $numerosdni = substr($dni, 0, -1);
            return (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numerosdni%23, 1) == $misletras && strlen($misletras) == 1 && strlen ($numerosdni) == 8);
        }

        function validateEmail($email) {
            return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
        }

        function validacionSalario($salario) {
            return is_numeric($salario);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = htmlspecialchars($_POST["nombre"]);
            $apellido = htmlspecialchars($_POST["apellido"]);
            $salario = htmlspecialchars($_POST["salario"]);
            $email = htmlspecialchars($_POST["email"]);
            $dni = htmlspecialchars($_POST["dni"]);
            $submit = htmlspecialchars($_POST["submit"]);

            if ($salario != "" && $email != "" && $dni != "" && $nombre != "" && $apellido != "") {

                $dniValido = validacion_dni($dni);
                $emailValido = validateEmail($email);
                $salarioValido = validacionSalario($salario);

                if (!$dniValido) {
                    echo "<p>El dni no es correcto</p>";
                } else if (!$salarioValido) {
                    echo "<p>El valor del salario tiene que ser numérico</p>";
                } else if (!$emailValido) {
                    echo "<p>El email no es correcto</p>";
                } else {
                    if ($salario <= 10000) {
                        echo "<p>Tu impositivo es del 5%</p>";
                    } else if ($salario > 10000 && $salario <= 20000) {
                        echo "<p>Tu impositivo es del 15%</p>";
                    } else if ($salario > 20000 && $salario <= 35000) {
                        echo "<p>Tu impositivo es del 20%</p>";
                    } else if ($salario > 35000 && $salario <= 60000) {
                        echo "<p>Tu impositivo es del 30%</p>";
                    } else {
                        echo "<p>Tu impositivo es del 45%</p>";
                    }
                }
            } else {
                echo "<p>Todos los campos deben estar llenos</p>";
            }
        }
    ?>
</body>
</html>
