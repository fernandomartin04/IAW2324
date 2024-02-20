<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand">Menu</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="user_page.php">Incidencias</a>
      <a class="nav-item nav-link" href="create-user.php">Añadir</a>

      <?php
        session_destroy()
      ?>
      <a href="<?php echo $cierraSesion; ?>" class="nav-item nav-link"> Login </a>
      <a class="nav-item nav-link" href="login.php">Login</a>
      <a class="nav-item nav-link" href="login.php">Cerrar sesión</a>
    </div>
  </div>
</nav>
