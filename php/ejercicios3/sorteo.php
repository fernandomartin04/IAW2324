<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorteo en php</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
        <input type="text" name="numero" placeholder="Escribe un número de participantes"><br><br>
        <input type="submit" name="submit">
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $numero = htmlspecialchars($_POST["numero"]);
            $submit = htmlspecialchars($_POST["submit"]);
            
            echo rand(1,$numero);
            
        }
    ?>
</body>
</html>