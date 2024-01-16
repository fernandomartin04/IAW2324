<?php
$servername = "sql207.byetcluster.com";
$username = "thsi_35754745";
$password = "nBogJY9x";
$database = "thsi_35754745_proyecto";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
else{
    echo "Conexión exitosa";
}
?>
