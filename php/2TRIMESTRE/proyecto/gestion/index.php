<?php include "header.php" ?>
<div class="container mt-5 text-center" style="background-color: #f0f8ff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
    <h1 class="display-4 mb-4" style="color: #2e86de;">Gestión Simple de Incidencias</h1>
    <p class="lead mb-5" style="color: #4a4a4a;">
        Ejemplo sin uso de cookies ni sesiones para implementar un CRUD en PHP con MySQL
    </p>
    <div class="d-flex justify-content-center">
        <form action="includes/home.php" method="post" class="me-3">
            <button id="iubtn1" type="submit" class="btn btn-primary btn-lg" style="background-color: #2e86de;">¡Al lío!</button>
        </form>
        <form action="includes/login.php" method="post">
            <button id="iubtn2" type="submit" class="btn btn-secondary btn-lg" style="background-color: #6c757d;">Volver al Login</button>
        </form>
    </div>
</div>
<?php include "footer.php" ?>



