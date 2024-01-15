<?php
    include "conexion.php";
    // include "header.php";

    $result = $conn->query("SELECT * FROM usuarios LIMIT 1"); //usuarios es el nombre de la tabla
    if ($result->num_rows > 0) { //Si tiene filas 1 o más...
        echo "<table><tr><th>id</th><th>username</th></tr>";

        while($row = $result->fetch()) {
            echo "<tr><td>" .$row['password']. "</td><td>".$row['username']. "</td></tr>";
        }

        echo "</table>";
    } else {
        echo "<p>0 results</p>";
    }
    $conn->close();
?>