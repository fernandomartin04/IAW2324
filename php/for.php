<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>For en php</title>
    <style>
        td {border:1px;}
    </style>
</head>
<body>
    <?php
        echo "<table border='1'><tr>";
        for($x = 0; $x <= 10; $x++) {
            echo "<td>$x</td>";
        }
        echo "</tr></table>";
            
    ?>
</body>
</html>