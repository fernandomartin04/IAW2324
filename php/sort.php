<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sort php</title>
</head>
<body>
    <?php
    $numeros = array(16, 7, 23, 13, 2);
    sort($numeros);
    
    $arrayy = count($numeros);
    for($x = 0; $x < $arrayy; $x++) {
      echo $numeros[$x];
      echo "<br>";
    }
    ?>
</body>
</html>