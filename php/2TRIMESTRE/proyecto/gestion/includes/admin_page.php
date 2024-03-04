<?php 
session_start(); // Inicia la sesión al principio del archivo

if (($_SESSION['rol'] != 'administrador')) {
    header("Location: login.php"); 
    exit();
}

include "../header.php";

?>

<div class="container mt-4">
    <?php include "barra_admin.php"?>
    <div class="header-container text-white p-4 rounded shadow-sm mb-4" style="background-color: #154c79">
        <h1 class="text-center">Gestión de Incidencias (CRUD)</h1>
    </div>
    <?php include "actualizacion_incidencia_admin.php"?>
    <a href="create.php" class="btn btn-success btn-lg mb-3"><i class="bi bi-plus"></i> Añadir Incidencia</a>

    <div class="table-responsive rounded">
        <table class="table table-bordered rounded table-hover custom-table">
            <thead class="text-white text-center" style="background-color: #154c79">
                <tr>
                    <th scope="col">Planta</th>
                    <th scope="col">Aula</th>
                    <th scope="col">Descripción</th>
                    <th scope="col"><a href="?ordenar=fecha_alta">Fecha Alta</a></th>  
                    <th scope="col">Fecha Revisión</th>
                    <th scope="col"><a href="?ordenar=fecha_resolucion">Fecha Solución</a></th>
                    <th scope="col">Comentario</th>
                    <th scope="col" colspan="3" class="text-center">Operaciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                // Establece el valor por defecto de la variable de orden
                $orden = isset($_GET['ordenar']) ? $_GET['ordenar'] : '';

                // Si no se proporciona un parámetro de orden, deja la cadena ORDER BY vacía
                $orderClause = $orden ? "ORDER BY $orden" : '';

                $query = "SELECT incidencias.*, plantas.nombre_planta, aulas.nombre_aula 
                          FROM incidencias 
                          INNER JOIN plantas ON incidencias.id_planta = plantas.id 
                          INNER JOIN aulas ON incidencias.id_aula = aulas.id
                          $orderClause";

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
                    echo "<td class='text-center'><a href='delete.php?eliminar={$id}' class='btn btn-danger'><i class='bi bi-trash'></i></a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<div class="container text-center mt-5">
    <a href="index.php" class="btn btn-warning mb-5">Volver</a>
</div>
<p>Está usted conectado como <?php echo $_SESSION["usuario"]; ?></p>

<?php include "../footer.php" ?>
