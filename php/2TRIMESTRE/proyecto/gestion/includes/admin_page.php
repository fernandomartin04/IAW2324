<?php 
session_start(); // Inicia la sesión al principio del archivo

if ($_SESSION['rol'] != 'administrador') {
    header("Location: login.php"); 
    exit();
}

include "../header.php";

$orden = 'fecha_alta'; // Orden por defecto
$columnasOrdenables = array('fecha_alta', 'fecha_revision', 'fecha_resolucion', 'nombre_planta', 'nombre_aula', 'descripcion', 'comentarios', 'user');

if (isset($_GET['ordenar']) && in_array($_GET['ordenar'], $columnasOrdenables)) {
    $orden = $_GET['ordenar'];
}

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
                    <th scope="col"><a href="?ordenar=nombre_planta">Planta</a></th>
                    <th scope="col"><a href="?ordenar=nombre_aula">Aula</a></th>
                    <th scope="col"><a href="?ordenar=descripcion">Descripción</a></th>
                    <th scope="col"><a href="?ordenar=fecha_alta">Fecha Alta</a></th>  
                    <th scope="col"><a href="?ordenar=fecha_revision">Fecha Revisión</a></th>
                    <th scope="col"><a href="?ordenar=fecha_resolucion">Fecha Solución</a></th>
                    <th scope="col"><a href="?ordenar=comentarios">Comentario</a></th>
                    <th scope="col"><a href="?ordenar=user">Usuario</a></th>
                    <th scope="col" colspan="3" class="text-center">Operaciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php

                $query = "SELECT incidencias.*, plantas.nombre_planta, aulas.nombre_aula 
                          FROM incidencias 
                          INNER JOIN plantas ON incidencias.id_planta = plantas.id 
                          INNER JOIN aulas ON incidencias.id_aula = aulas.id
                          ORDER BY {$orden}";
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
                    $user = $row['user'];


                    echo "<tr>";
                    echo "<td>{$planta}</td>";
                    echo "<td>{$aula}</td>";
                    echo "<td>{$descripcion}</td>";
                    echo "<td>{$alta}</td>";
                    echo "<td>{$revision}</td>";
                    echo "<td>{$resolucion}</td>";
                    echo "<td>{$comentario}</td>";
                    echo "<td>{$user}</td>";
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
<div class="container text-center mt-4">
    <p class="mb-2">Está usted conectado como <?php echo $_SESSION["usuario"]; ?></p>
    <p>Su última conexión fue <?php echo $_SESSION["ultima_conexion"]; ?></p>
    <p>Dirección IP última de conexión: <?php echo $_SESSION["direccion_ip"]; ?></p>
</div>
<?php include "../footer.php" ?>
