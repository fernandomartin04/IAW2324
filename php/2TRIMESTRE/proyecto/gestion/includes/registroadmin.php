

<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            text-align: center;
        }

        input {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        p {
            color: red;
        }

        .success {
            color: green;
        }
    </style>
<div>
    <!-- Header -->
    
    <h1>Registro de usuario</h1>
    <form method="POST">
        <input type="text" name="usuario" placeholder="Escribe tu nombre de usuario"><br><br>
        <input type ="password" name="contrasena"><br><br>
        <input type="submit" value="Registrar"><br><br>
        <input type="button" onclick="location.href='login.php';" value="Volver al login">
    </form>
    <?php include "../header.php"?>
    <?php
        //Inluimos el archivo de conexion de php donde tenemos todo para conectarnos a la base de datos
        //include "header.php";
        
        //Realizamos un array de lo que ha escrito el usuario tanto username como password para ver si ha enviado algo
        if (array_key_exists('usuario',$_POST) OR array_key_exists('contrasena',$_POST))
        {
            //Comenzamos la conexion
            $conn = new mysqli($servername, $username, $password, $dbname);
            //Creamos la funcion por si se produce un error
            if (mysqli_connect_error()) {
                die("Hubo un error en la conexión, inténtelo más tarde");
            }
            //si todo esta correcto empezamos verificando que se haya escrito un nombre de usuario
            if ($_POST['usuario']=='')
            {
                echo "<p>El nombre de usuario es obligatorio</p>";
            }
            //verificamos que haya escrito una contraseña
            else if ($_POST['contrasena']=='')
            {
                echo "<p>La contraseña es obligatoria</p>";
            }
            //si todo es correcto pasamos al siguiente paso
            else
            {
                // El usuario ha rellenado ambos campos
                $query = "SELECT usuario FROM usuarios WHERE usuario='".mysqli_real_escape_string($conn,$_POST['usuario'])."'";
                $result = mysqli_query($conn,$query);
                if (mysqli_num_rows($result)>0)
                {
                    echo "<p>Ese nombre de usuario ya está registrado. Intenta con otro</p>";
                }
                else
                {
                    // Añadir a nuestro usuario a la BD
                    $query="INSERT INTO usuarios (usuario, contrasena, admin) VALUES('".mysqli_real_escape_string($conn,$_POST['usuario'])."','".mysqli_real_escape_string($conn,base64_encode($_POST['contrasena']))."',1)";
                    if (mysqli_query($conn,$query)){
                        echo "<p>¡Enhorabuena! Has registrado tu cuenta</p>";
                    
                    }
                    else
                    {
                        echo "<p>Hubo algún problema al registrar el usuario. Inténtelo más tarde</p>";
                    }
                }
            }
        }

    ?>

    <?php include "../footer.php" ?>
</div>