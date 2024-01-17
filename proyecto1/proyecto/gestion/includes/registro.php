<!-- Header -->
<?php include "../db.php"?>
<h1>Registro de usuario</h1>
<form method="POST">
    <input type="text" name="usuario" placeholder="Escribe tu nombre de usuario">
    <input type ="password" name="contrasena">
    <input type="submit" value="Registrar">
</form>
<?php
    //Inluimos el archivo de conexion de php donde tenemos todo para conectarnos a la base de datos
    //include "header.php";
    //Realizamos un array de lo que ha escrito el usuario tanto username como paswword para ver si ha enviado algo
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
                $query="INSERT INTO usuarios (usuario, contrasena, admin) VALUES('".mysqli_real_escape_string($conn,$_POST['usuario'])."','".mysqli_real_escape_string($conn,base64_encode($_POST['contrasena']))."',0)";
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