<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<?php 
session_start(); // Inicia la sesión al principio del archivo

if (($_SESSION['rol'] != 'administrador')) {
    header("Location: login.php"); 
    exit();
}
include "../header.php"; ?>
<?php


if ($_POST && isset($_POST["boton_registrar"])) {
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

    // Consulta para verificar si ya existe un usuario con el mismo nombre de usuario
    $consultaUsuario = "SELECT usuario FROM usuarios WHERE usuario = '$usuario'";

    // Consulta para verificar si ya existe un usuario con el mismo correo electrónico
    $consultaCorreo = "SELECT correo FROM usuarios WHERE correo = '$email'";

    $validacionEmail = validateEmail($email);

    if ($usuario != "" && $contrasena != "" && $contrasena2 != "" && $email != "" ) {
        // Ejecuto la consulta para el nombre de usuario
        $resultadoUsuario = mysqli_query($conn, $consultaUsuario);

        // Ejecuto la consulta para el correo electrónico
        $resultadoCorreo = mysqli_query($conn, $consultaCorreo);

        // Verifica si ya existe un usuario con el mismo nombre de usuario
        if (mysqli_num_rows($resultadoUsuario) > 0) {
            echo "<script type='text/javascript'>alert('¡El usuario ya existe!')</script>";
        } elseif (mysqli_num_rows($resultadoCorreo) > 0) {
            echo "<script type='text/javascript'>alert('¡El correo electrónico ya está registrado!')</script>";
        } elseif (!$validacionEmail) {
            echo "<script type='text/javascript'>alert('¡No es correcto el correo!')</script>"; 
        } elseif ($contrasena != $contrasena2) {
            echo "<script type='text/javascript'>alert('¡No son iguales las contraseñas!')</script>";
        } else {
            $query = "INSERT INTO usuarios (usuario, contrasena, rol, correo) VALUES ('$usuario', '$contrasena_codificada', '$rol', '$email')";
            if (mysqli_query($conn, $query)) {
                echo "<p class='text-success'>Usuario registrado exitosamente.</p>";
            } else {
                echo "<p class='text-danger'>Error al registrar usuario: " . mysqli_error($conn) . "</p>";
            }
        }
    } else {
        echo "<script type='text/javascript'>alert('¡Debes de rellenar todos los campos!')</script>";
    } 
}
?>
<script>
    function delUser(id,usuario,cont){

        var result = window.confirm('Estás seguro de eliminar el usuario '+usuario+ '?');
        if (result == true) {

            $.ajax({
                url: 'eliminar_usuario.php',
                method: "POST",
            
            data: { id: id},
            success: function(data) {
                alert("usuario Borrado");
                    location.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error("Ajax request failed: " + textStatus, errorThrown);
            }
            });
        
        }
    }
</script>
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
                        <button type="submit" name="boton_registrar" class="btn btn-primary">Registrar</button>
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
                    <table id='userTable' class="table table-bordered rounded table-hover custom-table">
                        <thead class="text-white text-center" style="background-color: #154c79">
                            <tr>
                                <th scope="col"><a href="?ordenar=id_usuario">ID</a></th> 
                                <th scope="col"><a href="?ordenar=usuario">Usuario</a></th>
                                <th scope="col">Rol</th>
                                <th scope="col">Incidencias</th>
                                <th scope="col"><a href="?ordenar=correo">Correo</a></th>
                                <th scope="col" colspan="2" class="text-center">Operaciones</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            /////////////////////////

                            $orden = 'id_usuario'; // Orden por defecto
                            $columnasOrdenables = array('id_usuario', 'usuario', 'correo');

                            if (isset($_GET['ordenar']) && in_array($_GET['ordenar'], $columnasOrdenables)) {
                                $orden = $_GET['ordenar'];
                            }

                            ///////////////////////////
                            $miUsuario = $_SESSION['usuario'];
                            $query = "SELECT usuarios.id_usuario, usuarios.usuario, usuarios.rol, usuarios.correo, COUNT(incidencias.id) as total_incidencias
                                      FROM usuarios 
                                      LEFT JOIN incidencias ON usuarios.usuario = incidencias.user
                                      WHERE usuarios.usuario != '$miUsuario'
                                      GROUP BY usuarios.id_usuario
                                      ORDER BY {$orden}";

                                      
                            $result = mysqli_query($conn, $query);
                            $cont = 0;
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id_usuario'];
                                $usuario = $row['usuario'];
                                $rol = $row['rol'];
                                $totalIncidencias = $row['total_incidencias'];
                                $correo = $row['correo'];

                                echo "<tr id='userRow{$id}'>";
                                echo "<td>{$id}</td>";
                                echo "<td>{$usuario}</td>";
                                echo "<td>{$rol}</td>";  
                                echo "<td>{$totalIncidencias}</td>";  
                                echo "<td>{$correo}</td>";  
                                echo "<td class='text-center'><a onclick=\"delUser('{$id}','{$usuario}','{$cont}')\" class='btn btn-danger'><i class='bi bi-trash'></i> Eliminar</a></td>";
                                echo "</tr>";
                                $cont++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>  
    </div>
    <div class="container">
        <div class="header-container text-white p-4 rounded shadow-sm mb-1" style="background-color: #154c79">
            <h1 class="text-center">Aulas</h1>
        </div>
            <form method="POST" class="mt-4">
                <div class="class="form-group col-sm-12 col-md-6  mt-3"">
                    <label for="aula">Nombre de aula</label>
                    <input type="text" class="form-control" name="nombre_aula" id="nombre_aula" placeholder="Ingresa el nombre de aula" >
                </div>
                <div class="container text-center mt-5">
                    <input type="submit" class="btn btn-success" name="boton_aula" value="Añadir aula">
                </div>
            </form>
            
    </div>
</div>

<?php

        if ($_POST && isset($_POST["boton_aula"])) {
            $nombre_aula = htmlspecialchars($_POST["nombre_aula"]);

            $consultaAula = "SELECT nombre_aula FROM aulas WHERE nombre_aula = '$nombre_aula'";
            $resultadoAula = mysqli_query($conn, $consultaAula);

            if (mysqli_num_rows($resultadoAula) > 0) {
                echo "<script type='text/javascript'>alert('¡El aula ya existe!')</script>";
            }
            else {
                $insercionAula = "INSERT INTO `aulas` (`id`, `nombre_aula`) VALUES (NULL, '$nombre_aula');";
                if (mysqli_query($conn, $insercionAula)) {
                    echo "<p class='text-success'>Aula registrada exitosamente.</p>";
                } else {
                    echo "<p class='text-danger'>Error al registrar el aula: " . mysqli_error($conn) . "</p>";
                }
            }
            
        }
?>


<div class="container text-center mt-5">
    <a href="admin_page.php" class="btn btn-warning mb-5">Volver</a>
</div>
<div class="container text-center mt-4">
    <p class="mb-2">Está usted conectado como <?php echo $_SESSION["usuario"]; ?></p>
    <p>Su última conexión fue <?php echo $_SESSION["ultima_conexion"]; ?></p>
    <p>Dirección IP última de conexión: <?php echo $_SESSION["direccion_ip"]; ?></p>
</div>


<?php include "../footer.php"; ?>
