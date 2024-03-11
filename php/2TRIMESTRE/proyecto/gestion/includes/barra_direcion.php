<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand">Menu</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="admin_page.php">Incidencias</a>
      <a class="nav-item nav-link" href="create.php">Añadir</a>
      <a class="nav-item nav-link" href="login.php">Login/Logout</a>
      <a class="nav-item nav-link" href="contrasena.php">Cambiar contraseña</a>
    </div>
    <span class="navbar-text ms-auto" style="color: black; text-decoration: underline;">
    <p class="mb-2">Está usted conectado como <?php echo $_SESSION["usuario"]; ?> como "<?php echo $_SESSION["rol"]; ?>"</p>
    <p>Su última conexión fue <?php echo $_SESSION["ultima_conexion"]; ?></p>       </span>
  </div>
</nav>
