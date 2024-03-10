<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Porrilla</title>
</head>
<body>
    <input type="text" name="suma" id="suma" placeholder="Pon un numero de suma">
    <input type="text" name="suma2" id="suma2" placeholder="Pon otro numero de suma">
    <p id="solucion"></p>
    <?php
        if ($suma > $suma2) {
            echo"$suma+$suma2";
        }
    ?>
</body>
</html>