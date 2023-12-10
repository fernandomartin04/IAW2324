<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header php</title>
</head>
<body>
    
    <p>Haz click para irte a la página de hola.php</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <input type="submit" value="voy a holaphp">
    </form>
    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            header("Location: hola.php");
            exit();
        }
            
    ?>

</body>
</html>