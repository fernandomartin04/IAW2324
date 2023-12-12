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
        <textarea name="mensaje" id="mensaje" cols="30" rows="10"></textarea><br><br>
        <input type="submit" name="submit" id="submit">
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $asunto = htmlspecialchars($_GET["asunto"]);
            $mensaje = htmlspecialchars($_GET["mensaje"]);
            $destinatario = htmlspecialchars($_GET["destinatario"]);
            $submit = htmlspecialchars($_GET["submit"]);
            
            if (isset($_GET["submit"])){
                $asunto = $_GET['asunto'];
                $destinatario = $_GET['destinatario'];
                $mensaje = $_GET['mensaje'];
                $cabeceras = 'From: fernandomartin04@iesamachado.org';

                mail($destinatario, $asunto, $mensaje, $cabeceras);
                echo "<p>El mensaje ha sido enviado con éxito</p>";
            }

        }

    ?>
</body>
</html>