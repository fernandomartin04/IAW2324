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
        <input type="text" name="salario" placeholder="Escribe tu salario en bruto"><br><br>
        <input type="text" name="email" placeholder="Escribe tu email"><br><br>
        <input type="text" name="dni" placeholder="Escribe tu dni"><br><br>
        <input type="submit" name="submit">
    </form>

    <?php
    /*
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

        function validacionSalario ($salario) {
            if (is_numeric($salario)) { //valido si es numérico el campo del salario
                return true;
            }
            else {
                return false;
            }
        }
        */

        if ($salario != "" && $email != "" && $dni != "" && $nombre != "" && $apellido != "") {
            /*
            validateEmail($email);
            validacionSalario($salario);
            validacion_dni($dni);
            */

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
    
            function validacionSalario ($salario) {
                if (is_numeric($salario)) { //valido si es numérico el campo del salario
                    return true;
                }
                else {
                    return false;
                }
            }


            if (validacion_dni($dni) == false) { //Valido si el dni es correcto
                echo "<p>El dni no es correcto</p>";
            } 

            else if (validacionSalario($salario) == false) { //Valido si el salario es correcto
                echo "<p>El valor del salario no es numérico</p>";
            }
            
            else if (validateEmail($email) == false) { //Valido si el email es correcto
                echo "<p>El email no es correcto</p>";
            }

            else {
                if ($salario <= "10000") {
                    echo "<p>Tu impositivo es del 5%</p>";
                }

                /*else if ($salario > 10000 && $salario <= 20000) {
                    echo "<p>Tu impositivo es del 15%</p>";
                }

                else if ($salario > 20000 && $salario <= 35000) {
                    echo "<p>Tu impositivo es del 20%</p>";
                }

                else if ($salario > 35000 && $salario <= 60000) {
                    echo "<p>Tu impositivo es del 30%</p>";
                }

                else {
                    echo "<p>Tu impositivo es del 45%</p>"
                }*/

            } 
        }

        else {
            echo "<p>Todos los campos deben de estar llenos</p>"
        }

        
            
            
             

    ?>

</body>
</html>