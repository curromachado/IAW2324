<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Autenticación</title>
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

        label {
            display: block;
            margin: 10px 0;
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

        .error {
            color: red;
        }
    </style>
</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
    <label for="usuario">Usuario:</label><input type="text" name="usuario"><br>
    <label for="contrasena">Contraseña:</label><input type="password" name="contrasena"><br><br><br>
    <input type="submit" value="Login"><br><br>
    <input type="button" onclick="location.href='login.php';" value="Volver al login">
    
    <?php include "../header.php"; ?>
    <?php
    if ($_POST){
        $usuario = htmlspecialchars($_POST["usuario"]);
        $contrasena = htmlspecialchars($_POST["contrasena"]);
        $contrasena_codificada = base64_encode($contrasena);
        
        $conn = new mysqli($servername, $username, $password, $dbname);   
            
        if ($conn) {
            // Construye y ejecuta la consulta SQL
            $query = "SELECT * FROM usuarios WHERE usuario='" . mysqli_real_escape_string($conn, $usuario) . "' AND contrasena='" . mysqli_real_escape_string($conn, $contrasena_codificada) . "'";
            $result = mysqli_query($conn, $query);
    
            // Verifica si se encuentra un usuario coincidente
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
    
                // Verifica si el usuario es administrador o no
                if ($row['admin'] == 1) {
                    // Redirige a la página para administradores
                    header("Location: admin_page.php");
                    exit(); // Asegura que el script se detenga después de la redirección
                } else {
                    // Redirige a la página para usuarios regulares
                    header("Location: user_page.php");
                    exit(); // Asegura que el script se detenga después de la redirección
                }
            } else {
                echo "<p>Acceso denegado</p>";
            }
        } else {
            // Muestra un error si la conexión a MySQL falla
            echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
            echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
            echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
        }
    }
    ?>
<?php include "../footer.php"?>
</form>


</body>

</html>