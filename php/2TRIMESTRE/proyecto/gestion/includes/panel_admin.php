<?php 
session_start(); // Inicia la sesión al principio del archivo

if (($_SESSION['rol'] != 'administrador')) {
    header("Location: login.php"); 
    exit();
}
include "../header.php"; ?>

<?php

if ($_POST) {
    $usuario = htmlspecialchars($_POST["usuario"]);
    $contrasena = htmlspecialchars($_POST["contrasena"]);
    $contrasena2 = htmlspecialchars($_POST["contrasena2"]);
    $email = htmlspecialchars($_POST["email"]);
    $rol = htmlspecialchars($_POST["rol"]);
    $contrasena_codificada = base64_encode($contrasena);
 
    //Funcion del email de la validacion
    function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    $validacionEmail = validateEmail($email);

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn) {
        if ($usuario != "" && $contrasena != "" && $contrasena2 != "" && $email != "" ) {
            if (!$validacionEmail) {
                echo "<script type='text/javascript'>alert('¡No es correcto el correo!')</script>"; 
            }
            else if ($contrasena != $contrasena2) {
                echo "<script type='text/javascript'>alert('¡No son iguales las contraseñas!')</script>";
            }
            else {
                $query = "INSERT INTO usuarios (usuario, contrasena, rol, correo) VALUES ('$usuario', '$contrasena_codificada', '$rol', '$email')";
                if (mysqli_query($conn, $query)) {
                    echo "<p class='text-success'>Usuario registrado exitosamente.</p>";
                } else {
                    echo "<p class='text-danger'>Error al registrar usuario: " . mysqli_error($conn) . "</p>";
                }
            }
        }
        else {
            echo "<script type='text/javascript'>alert('¡Debes de rellenar todos los campos!')</script>";
        } 
            
    } 
    else {
        echo "<p class='text-danger'>Error: No se pudo conectar a MySQL.</p>";
        echo "<p class='text-danger'>Error de depuración: " . mysqli_connect_error() . "</p>";
    }
}
?>

<div class="container mt-4">
    <?php include "barra_admin.php"; ?>
    <div class="header-container text-white p-4 rounded shadow-sm mb-4" style="background-color: #154c79">
        <h1 class="text-center">Panel de administración</h1>
    </div>
    <div id="contenido" class="d-flex justify-content-around">
        <div id="registrar">
        <div class="container">
                <div class="header-container text-white p-4 rounded shadow-sm mb-1" style="background-color: #154c79">
                    <h1 class="text-center">Registrar</h1>
                </div>
                <form method="POST" class="mt-4">
                    <div class="form-group">
                        <label for="usuario">Usuario</label>
                        <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Ingresa tu usuario" >
                    </div>
                    <div class="form-group mt-4">
                        <label for="contrasena">Contraseña</label>
                        <input type="password" class="form-control" name="contrasena" id="contrasena" placeholder="Ingresa tu contraseña" >
                    </div>
                    <div class="form-group mt-4">
                        <label for="contrasena">Repetir contraseña</label>
                        <input type="password" class="form-control" name="contrasena2" id="contrasena2" placeholder="Repite tu contraseña" >
                    </div>
                    <div class="form-group mt-4">
                        <label for="usuario">Correo</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Ingresa tu correo" >
                    </div>
                    <div class="form-group mt-4">
                        <label for="rol" class="form-label">Rol</label>
                        <select name="rol" id="rol" class="form-control">
                            <option value="profesor">Profesorado</option>
                            <option value="direccion">Dirección</option>
                            <option value="administrador">Administrador</option>
                        </select>
                    </div>
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
        <div id="usuarios_existentes">
            <div class="container">
                <div class="header-container text-white p-4 rounded shadow-sm mb-1" style="background-color: #154c79">
                    <h1 class="text-center">Usuarios</h1>
                </div>
                <div class="table-responsive rounded">
                    <table class="table table-bordered rounded table-hover custom-table">
                        <thead class="text-white text-center" style="background-color: #154c79">
                            <tr>
                                <th scope="col">ID</th> 
                                <th scope="col">Usuario</th>
                                <th scope="col">Rol</th>
                                <th scope="col">Incidencias</th>
                                <th scope="col" colspan="2" class="text-center">Operaciones</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            $miUsuario = $_SESSION['usuario'];
                            $query = "SELECT usuarios.id_usuario, usuarios.usuario, usuarios.rol, COUNT(incidencias.id) as total_incidencias
                                      FROM usuarios 
                                      LEFT JOIN incidencias ON usuarios.usuario = incidencias.user
                                      WHERE usuarios.usuario != '$miUsuario'
                                      GROUP BY usuarios.id_usuario";

                                      
                            $result = mysqli_query($conn, $query);
                            
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id_usuario'];
                                $usuario = $row['usuario'];
                                $rol = $row['rol'];
                                $totalIncidencias = $row['total_incidencias'];

                                echo "<tr>";
                                echo "<td>{$id}</td>";
                                echo "<td>{$usuario}</td>";
                                echo "<td>{$rol}</td>";  
                                echo "<td>{$totalIncidencias}</td>";  
                                echo "<td class='text-center'><a href='eliminar_usuario.php?id={$id}' class='btn btn-danger'><i class='bi bi-trash'></i> Eliminar</a></td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container text-center mt-5">
    <a href="admin_page.php" class="btn btn-warning mb-5">Volver</a>
</div>
<p>Está usted conectado como <?php echo $_SESSION["usuario"]; ?></p>

<?php include "../footer.php"; ?>
