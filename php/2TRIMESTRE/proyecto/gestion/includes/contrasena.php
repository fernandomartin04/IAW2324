<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php"); // Redirige al usuario a la página de inicio de sesión si no ha iniciado sesión
    exit();
}
include "../header.php";
?>

<?php
if ($_POST && isset($_POST["boton_cambiar"])) {
    $contrasena_actual = htmlspecialchars($_POST["contrasena_actual"]);
    $contrasena_nueva = htmlspecialchars($_POST["contrasena_nueva"]);
    $boton_cambiar = htmlspecialchars($_POST["boton_cambiar"]);

    // Consulto si la contraseña actual puesta es realmente la del usuario
    $usuario = $_SESSION['usuario'];
    $query = "SELECT contrasena FROM usuarios WHERE usuario = '$usuario'";

    $conn = new mysqli($servername, $username, $password, $dbname);
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['contrasena'] = $row['contrasena'];
        $contrasena_actual_bd = base64_decode($row['contrasena']);

        // Verifico si la contraseña actual coincide
        if ($contrasena_actual != $contrasena_actual_bd) {
            echo "<script type='text/javascript'>alert('¡Esa no es la contraseña actual, HACKER!'); window.location.href='login.php';</script>";
            exit();
        } 
        else if ($contrasena_actual == $contrasena_nueva) {
            echo "<script type='text/javascript'>alert('¡No puedes poner la misma contraseña!')</script>";
        } else {
            // Actualizo la contraseña en la base de datos en base 64
            $contrasena_nueva_codificada = base64_encode($contrasena_nueva);
            $update_query = "UPDATE usuarios SET contrasena = '$contrasena_nueva_codificada' WHERE usuario = '$usuario'";

            if (mysqli_query($conn, $update_query)) {
                echo "<p class='text-success'>Contraseña actualizada exitosamente.</p>";
            } else {
                echo "<p class='text-danger'>Error al actualizar la contraseña: " . mysqli_error($conn) . "</p>";
            }
        }
    } else {
        echo "<p class='text-danger'>Error al verificar la contraseña actual: " . mysqli_error($conn) . "</p>";
    }
}
?>

<div class="container mt-4">
    <div class="header-container text-white p-4 rounded shadow-sm mb-4" style="background-color: #154c79">
        <h1 class="text-center">Cambio de Contraseña</h1>
    </div>

    <form method="post" class="col-sm-6 mx-auto border p-4 rounded shadow">
        <div class="mb-3">
            <label for="contrasena_actual" class="form-label">Contraseña Actual:</label>
            <input type="password" class="form-control" name="contrasena_actual" required>
        </div>

        <div class="mb-3">
            <label for="nueva_contrasena" class="form-label">Nueva Contraseña:</label>
            <input type="password" class="form-control" name="contrasena_nueva" required>
        </div>

        <div class="mb-3">
            <input type="submit" class="btn btn-success" name="boton_cambiar" value="Cambiar Contraseña">
        </div>
    </form>

    <div class="text-center mt-3">
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
<div class="container text-center mt-4">
    <p class="mb-2">Está usted conectado como <?php echo $_SESSION["usuario"]; ?></p>
    <p>Su última conexión fue <?php echo $_SESSION["ultima_conexion"]; ?></p>
    <p>Dirección IP última de conexión: <?php echo $_SESSION["direccion_ip"]; ?></p>
</div>
<?php include "../footer.php"; ?>

