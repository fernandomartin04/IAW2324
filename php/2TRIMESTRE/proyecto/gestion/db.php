<?php
$servername = 'sql307.thsite.top';   
$username = 'thsi_35748541';   
$password = "GkIoSmUV";   
$dbname = 'thsi_35748541_proyecto';     
$conn = new mysqli($servername, $username, $password, $dbname);   
if ($conn->connect_error) {                                             
    die("Conexión fallida con base de datos: " . $conn->connect_error);     
} echo "Conectado con exito a la base de datos <br>"
?>


