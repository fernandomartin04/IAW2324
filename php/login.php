<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login php</title>
</head>
<body>
    <form action="" method="post">
        Usuario: <input type="password" name="contraseña">
    </form>

    <?php

        $usuario = htmlspecialchars($_POST['usuario']);
        $contrasena = htmlspecialchars($_POST['contrasena']);

        if(isset($_POST["submit"])) {
            if ($usuario=='admin' && $contrasena=='H4CK3R4$1R') {
                echo "<script>alert('Acceso Aceptado');</script>";
            }
            else {
                echo "<script>alert('Acceso Denegado');</script>";
            }
        }

    ?>
</body>
</html>