<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" http-equiv="refresh" content="15">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Día de la semana</title>
</head>
<body>

    <?php
       // setlocale(LC_ALL,"es_ES");
       // echo date("l") . "<br>";
        $day = date("l");
        if ($day == "Wednesday") {
            echo  "<p>$day Ya a mitad de semana!!</p>" . "<br>";
        }
        else if ($day == "Monday") {
            echo  "<p>$day Empezamos la semana con ganas!!</p>" . "<br>";
        }
        else if ($day == "Tuesday") {
            echo  "<p>$day Ya no es lunes!</p>" . "<br>";
        }
        else if ($day == "Thursday") {
            echo  "<p>$day Ya mismo es viernes!!</p>" . "<br>";
        }
        else if ($day == "Friday") {
            echo  "<p>$day Por fin es viernes!!</p>" . "<br>";
        }
        else if ($day == "Saturday") {
            echo  "<p>$day Hoy es día de descanso y disfrute!!</p>" . "<br>";
        }
        else {
            echo  "<p>$day Aprovecha el último día del fin de semana!!</p>" . "<br>";
        }
    ?>
</body>
</html>