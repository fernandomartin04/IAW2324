<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" http-equiv="refresh" content="15">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Días restantes a la feria</title>
</head>
<body>

    <?php
        $fechaInicial = getdate();
        $fechaFinal = date('2024-04-14');
        
        $fechaInicialSegundos = strtotime($fechaInicial);
        $fechaFinalSegundos = strtotime($fechaFinal);
        
        $dias = ($fechaFinalSegundos - $fechaInicialSegundos) / 86400;
        echo "La diferencia entre la fecha : " . $fechaInicial . " y " . $fechaFinal . " es de: " . round($dias, 0, PHP_ROUND_HALF_UP)  . " dias." ;
    
    ?>
</body>
</html>