<!-- Header -->
<?php include "../header.php" ?>

<style>
    .header-container {
        background-color: #154c79;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .header-container h1 {
        color: white;
    }

    .custom-table {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        border-collapse: separate;
        border-spacing: 0;
        width: 100%;
        border: 1px solid #ddd;
        border-radius: 10px;
        overflow: hidden;
        margin-bottom: 20px;
    }

    .custom-table th, .custom-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
    }

    .custom-table thead {
        background-color: #154c79;
        color: white;
    }

    .custom-table tbody tr:hover {
        background-color: #f8f9fa;
    }

    .custom-table .btn {
        border-radius: 20px;
    }
</style>

<div class="container mt-4">
    <div class="header-container">
        <h1 class="text-center">Gestión de Incidencias (CRUD)</h1>
    </div>
    <a href="create-user.php" class="btn btn-success btn-lg mb-3"><i class="bi bi-plus"></i> Añadir Incidencia</a>

    <div class="table-responsive">
        <table class="table table-bordered table-hover custom-table">
            <thead class="table-primary">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Planta</th>
                    <th scope="col">Aula</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Fecha Alta</th>
                    <th scope="col">Fecha Revisión</th>
                    <th scope="col">Fecha Solución</th>
                    <th scope="col">Comentario</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM incidencia";
                $vista_incidencias = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($vista_incidencias)) {
                    $id = $row['id'];
                    $planta = $row['planta'];
                    $aula = $row['aula'];
                    $descripcion = $row['descripcion'];
                    $alta = $row['alta'];
                    $revision = $row['revision'];
                    $resolucion = $row['resolucion'];
                    $comentario = $row['comentario'];

                    echo "<tr>";
                    echo "<th scope='row'>{$id}</th>";
                    echo "<td>{$planta}</td>";
                    echo "<td>{$aula}</td>";
                    echo "<td>{$descripcion}</td>";
                    echo "<td>{$alta}</td>";
                    echo "<td>{$revision}</td>";
                    echo "<td>{$resolucion}</td>";
                    echo "<td>{$comentario}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<div class="container text-center mt-5">
    <a href="indexusuario.php" class="btn btn-warning">Volver</a>
</div>

<?php include "../footer.php" ?>
