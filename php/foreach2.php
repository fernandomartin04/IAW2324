<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foreach 2 arrays asociativos</title>
</head>
<body>
    <?php
        

        foreach ($palabras as $value) {
          echo "<p>$value</p><br>";
        }

        $palabras = array("Parque"=>"Park", 
        "Puerta"=>"door", 
        "Mesa"=>"Table", 
        "Pantalón"=>"Trousers");

        foreach($palabras as $x => $x_value) {
        echo $x . ", es en inglés=" . $x_value;
        echo "<br>";
        }
    ?>
</body>
</html>