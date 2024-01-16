<?php
<<<<<<< HEAD
$servername = 'sql307.thsite.top';   
$username = 'thsi_35748541';   
$password = "GkIoSmUV";   
$dbname = 'thsi_35748541_proyecto';     
$conn = new mysqli($servername, $username, $password, $dbname);   
if ($conn->connect_error) {                                             
    die("Conexión fallida con base de datos: " . $conn->connect_error);     
} echo "Conectado con exito a la base de datos <br>"
=======
$host = 'sdb-w.hosting.stackcp.net';   
$user = 'gestion_incidencias-323133eda3';   
$pass = "en97j64z81";   
$database = 'gestion_incidencias-323133eda3';     
$conn = mysqli_connect($host,$user,$pass,$database);   
if (!$conn) {                                             
    die("Conexión fallida con base de datos: " . mysqli_connect_error());     
  }
>>>>>>> 47c15eb7986fe494d27b90daf9de09d7f29b0fa2
?>


