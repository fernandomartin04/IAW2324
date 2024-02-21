<?php include "../header.php" ?>

<?php


    /*************************************************************/ 
                $miUser = $_SESSION['usuario'];
                $query = "SELECT incidencias.*, plantas.nombre_planta, aulas.nombre_aula 
                          FROM incidencias 
                          INNER JOIN plantas ON incidencias.id_planta = plantas.id 
                          INNER JOIN aulas ON incidencias.id_aula = aulas.id 
                          WHERE user = '$miUser'
                          ORDER BY fecha_alta"; 
    /*************************************************************/            
                $vista_incidencias = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($vista_incidencias)) {
                    $id = $row['id'];
                    $planta = $row['nombre_planta'];
                    $aula = $row['nombre_aula'];
                    $descripcion = $row['descripcion'];
                    $alta = $row['fecha_alta'];
                    $revision = $row['fecha_revision'];
                    $resolucion = $row['fecha_resolucion'];
                    $comentario = $row['comentarios'];

                    echo "<tr>";
                    echo "<td>{$planta}</td>";
                    echo "<td>{$aula}</td>";
                    echo "<td>{$descripcion}</td>";
                    echo "<td>{$alta}</td>";
                    echo "<td>{$revision}</td>";
                    echo "<td>{$resolucion}</td>";
                    echo "<td>{$comentario}</td>";
                    echo "<td class='text-center'><a href='view.php?incidencia_id={$id}' class='btn btn-primary'><i class='bi bi-eye'></i></a></td>";
                    echo "<td class='text-center'><a href='update.php?editar&incidencia_id={$id}' class='btn btn-secondary'><i class='bi bi-pencil'></i></a></td>";
                  //  echo "<td class='text-center'><a href='delete.php?eliminar={$id}' class='btn btn-danger'><i class='bi bi-trash'></i></a></td>";
                    echo "</tr>";
                }
?>
<?php include "../footer.php" ?>