<?php
$servername = 'sql207.thsite.top';   
$username = 'thsi_35754745';   
$password = "nBogJY9x";   
$dbname = 'thsi_35754745_proyectofinal';     
$conn = new mysqli($servername, $username, $password, $dbname);   
if ($conn->connect_error) {                                             
    die("Conexión fallida con base de datos: " . $conn->connect_error);     
}
?>


