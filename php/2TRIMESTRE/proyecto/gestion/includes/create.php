
<?php 
session_start(); // Inicia la sesión al principio del archivo

// Verifica si el usuario ha iniciado sesión
if (($_SESSION['rol'] != 'administrador' && $_SESSION['rol'] != 'direccion')) {
    header("Location: login.php"); 
    exit();
}


include "../header.php" 
?>

<?php 
if(isset($_POST['crear'])) {
    $planta = htmlspecialchars($_POST['planta']);
    $aula = htmlspecialchars($_POST['aula']);
    $descripcion = htmlspecialchars($_POST['descripcion']);
    $comentario = htmlspecialchars($_POST['comentario']);
    $alta = htmlspecialchars($_POST['alta']);
    $revision = htmlspecialchars($_POST['revision']);
    $resolucion = htmlspecialchars($_POST['resolucion']);
    
    $user = $_SESSION['usuario']; 

    $query= "INSERT INTO incidencias(id_planta, id_aula, descripcion, fecha_alta, comentarios, fecha_revision, fecha_resolucion, user) 
             VALUES('$planta','$aula','$descripcion','$alta','$comentario','$revision','$resolucion','$user')";

    $resultado = mysqli_query($conn,$query);
    
    if (!$resultado) {
        echo "Algo ha ido mal añadiendo la incidencia: ". mysqli_error($conn);
    } else {
        echo "<script type='text/javascript'>alert('¡Incidencia añadida con éxito!')</script>";
    }         
}
?>

<?php
$fechaHoy = date("Y-m-d"); //Esto me va a servir para no poder seleccionar días futuros
?>

<div class="container">
    <?php include "barra_user.php"?>
    <div class="header-container text-white p-4 rounded shadow-sm mb-4" style="background-color: #154c79">
        <h1 class="text-center">Añadir Incidencia</h1>
    </div>
    <form action="" method="post">

    <div class="row">
        <div class="form-group col-sm-12 col-md-6  mt-3">
            <label for="planta" class="form-label">Planta</label>
            <select name="planta" id="plantaSelect" class="form-control">
                <option value="1">Planta Baja</option>
                <option value="2">Planta Primera</option>
                <option value="3">Planta Segunda</option>
            </select>
        </div>
        <div class="form-group col-sm-12 col-md-6  mt-3">
            <label for="aula" class="form-label">Aula</label>
            <select name="aula" id="aulaSelect" class="form-control">
            </select>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-12 col-md-6 mt-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" name="descripcion"  class="form-control">
        </div>
        <div class="form-group  col-sm-12 col-md-6 mt-3">
            <label for="alta" class="form-label">Fecha Alta</label>
            <input type="date" name="alta"  class="form-control" value="<?php echo $fechaHoy; ?>" max="<?php echo $fechaHoy; ?>">
        </div>
    </div>
    <div class="row">
        <div class="form-group  col-sm-12 col-md-6  mt-3">
            <label for="resolucion" class="form-label">Fecha Resolucion</label>
            <input type="date" name="resolucion"  class="form-control" value="">
        </div>
        <div class="form-group  col-sm-12 col-md-6  mt-3">
            <label for="revision" class="form-label">Fecha Revision</label>
            <input type="date" name="revision"  class="form-control" value="">
        </div>
    </div>
        <div class="form-group col-sm-12 mt-3">
            <label for="comentario" class="form-label">Comentario</label>
            <input type="text" name="comentario"  class="form-control">
        </div>
        <div class="d-flex justify-content-center">
            <div class="form-group m-3">
                <input type="submit"  name="crear" class="btn btn-primary mt-2 mb-5" value="Añadir">
            </div>
            <div class="form-group m-3">
                <!-- Según la sesión del usuario lo dirijo a una página u otra -->

                <?php 
                    $volverUrl = 'user_page.php';
                    if ($_SESSION['rol'] == 'administrador'){
                        $volverUrl = 'admin_page.php';
                    } else if ($_SESSION['rol'] == 'direccion') {
                        $volverUrl = 'direcion_page.php';
                    }
                ?> 
                <a href="<?php echo $volverUrl; ?>" class="btn btn-warning mt-2 mb-5"> Volver </a>
            </div>
        </div>
    </form> 
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var plantaSelect = document.getElementById('plantaSelect');
    var aulaSelect = document.getElementById('aulaSelect');

    var opcionesAula = {
        1: [{ nombre: 'Aula 1', id: '1' }, { nombre: 'Aula 2', id: '2' }, { nombre: 'Aula 3', id: '3' }],
        2: [{ nombre: 'Aula 4', id: '4' }, { nombre: 'Aula 5', id: '5' }, { nombre: 'Aula 6', id: '6' }],
        3: [{ nombre: 'Aula 7', id: '7' }, { nombre: 'Aula 8', id: '8' }, { nombre: 'Aula 9', id: '9' }]
    };

    function actualizarOpcionesAula() {
        var plantaSeleccionada = plantaSelect.value;

        aulaSelect.innerHTML = '';

        opcionesAula[plantaSeleccionada].forEach(function (aula) {
            var option = document.createElement('option');
            option.value = aula.id;
            option.text = aula.nombre;
            aulaSelect.appendChild(option);
        });
    }

    plantaSelect.addEventListener('change', function () {
        actualizarOpcionesAula();
    });

    console.log("Inicializando opciones de Aula");
    actualizarOpcionesAula();
});
</script>
<div class="container text-center mt-4">
    <p class="mb-2">Está usted conectado como <?php echo $_SESSION["usuario"]; ?></p>
    <p>Su última conexión fue <?php echo $_SESSION["ultima_conexion"]; ?></p>
    <p>Dirección IP última de conexión: <?php echo $_SESSION["direccion_ip"]; ?></p>
</div>
<?php include "../footer.php" ?>
