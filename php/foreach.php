<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foreach php</title>
</head>
<body>
    <?php
        $colors = array("A lo hecho pecho", 
        "Más vale pájaro en mano que ciento volando", 
        "No hay dos sin tres", 
        "Tiempo de rojo hambre, peste y piojo"); 

        foreach ($colors as $value) {
          echo "<p>$value</p><br>";
        }

    ?>
</body>
</html>