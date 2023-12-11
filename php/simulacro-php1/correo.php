<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Correo php</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get" enctype="multipart/form-data">
        <input type="text" name="asunto" id="asunto" placeholder="Escribe el asunto"><br><br>
        <input type="text" name="destinatario" id="destinatario" placeholder="Escribe el destinatario"><br><br>
        <input type="submit" name="submit" id="submit">
    </form>

    <?php
        //Valido que el destinatario es un correo real
        function validateEmail($destinatario) {
            return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
        }

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $asunto = htmlspecialchars($_GET["asunto"]);
            $destinatario = htmlspecialchars($_GET["destinatario"]);
            $submit = htmlspecialchars($_GET["submit"]);



        }

        
    ?>
</body>
</html>