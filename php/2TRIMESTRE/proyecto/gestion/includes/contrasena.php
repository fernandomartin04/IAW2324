<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php"); // Redirige al usuario a la página de inicio de sesión si no ha iniciado sesión
    exit();
}
include "../header.php";
?>

<div class="container mt-4">
    <div class="header-container text-white p-4 rounded shadow-sm mb-4" style="background-color: #154c79">
        <h1 class="text-center">Cambio de Contraseña</h1>
    </div>

    <form action="procesar_cambio_contrasena.php" method="post" class="col-sm-6 mx-auto border p-4 rounded shadow">
        <div class="mb-3">
            <label for="contrasena_actual" class="form-label">Contraseña Actual:</label>
            <input type="password" class="form-control" name="contrasena_actual" required>
        </div>

        <div class="mb-3">
            <label for="nueva_contrasena" class="form-label">Nueva Contraseña:</label>
            <input type="password" class="form-control" name="nueva_contrasena" required>
        </div>

        <div class="mb-3">
            <input type="submit" class="btn btn-success" value="Cambiar Contraseña">
        </div>
    </form>

    <div class="text-center mt-3">
        <a href="index.php" class="btn btn-warning">Volver</a>
    </div>
</div>

<?php include "../footer.php"; ?>

