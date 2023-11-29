<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" http-equiv="refresh" content="15">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>While</title>
    <style>
    tr {border:1px;}
    </style>
</head>
<body>

    <?php
        $x = 1;

        while($x<=10) {
            echo "<tr style=><td>$x</td></tr>";
            $x++;
        }
    ?>
</body>
</html>