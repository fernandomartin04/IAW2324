<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>filegetcontents en php</title>
</head>
<body>
    <?php
    
        $url = "https://es.lipsum.com/";
        $contenido = file_get_contents($url);
        echo "<p>$contenido</p>";
    
    ?>
</body>
</html>