<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fecha y Hora</title>
</head>
<body>

    <?php
        setlocale(LC_TIME, 'spanish');
        $fechaHora = strftime('%A, %d de %B de %Y %H:%M:%S');
        echo "<p>La fecha y hora actual en español es: $fechaHora</p>";
    ?>

</body>
</html>
