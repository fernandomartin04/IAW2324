<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu foto</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">

        <input type="text" name="nombre"><br><br>
        <input type="file" name="file"><br><br>
        <input type="submit" name="submit">
    </form>
    <?php
        $nombre = $archivo = $submit = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = test_input($_POST["nombre"]);
            $archivo = test_input($_FILES["file"]);
            $submit = test_input($_POST["submit"]);
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }

        if(isset($_POST["submit"])) {
            if (empty($file)) {
                echo $nombre;
            }
            else {
                echo "<br>" . $nombre . "<br>" . $archivo;
            }
        }

    ?>

    
</body>
</html>