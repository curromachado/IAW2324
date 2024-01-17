<?php
include "../header.php";

session_start();

if ($_POST) {
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

            // Iniciar sesión y almacenar información del usuario
            $_SESSION['usuario'] = $row['usuario'];
            $_SESSION['rol'] = ($row['admin'] == 1) ? 'admin' : 'usuario';

            // Redirige a la página correspondiente
            if ($row['admin'] == 1) {
                header("Location: admin_page.php");
                exit();
            } else {
                header("Location: user_page.php");
                exit();
            }
        } else {
            echo "<p class='text-danger'>Acceso denegado</p>";
        }
    } else {
        // Muestra un error si la conexión a MySQL falla
        echo "<p class='text-danger'>Error: No se pudo conectar a MySQL.</p>";
        echo "<p class='text-danger'>error de depuración: " . mysqli_connect_errno() . "</p>";
        echo "<p class='text-danger'>error de depuración: " . mysqli_connect_error() . "</p>";
    }
}
?>

<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <form class="col-sm-6 border p-4 rounded shadow" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <h2 class="text-center mb-4">Autenticación Admin</h2>
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person" viewBox="0 0 16 16">
                            <path
                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z">
                            </path>
                        </svg>
                    </span>
                    <input type="text" class="form-control" name="usuario" placeholder="Introduzca su Usuario">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-key" viewBox="0 0 16 16">
                            <path
                                d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8m4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5"></path>
                            <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0"></path>
                        </svg>
                    </span>
                    <input type="password" class="form-control" name="contrasena" placeholder="Introduzca su Contraseña">
                </div>
                <div id="botones" class="d-flex justify-content-between">
                    <div class="form-group">
                        <input type="submit" class="btn btn-success btn-block" value="Iniciar Sesión">
                    </div>
                    <div class="form-group">
                        <input type="button" class="btn btn-secondary btn-block" onclick="location.href='login.php';" value="Volver al login">
                    </div>
                </div>
               

                
            </form>
            
        </div>
    </div>
<?php include "../footer.php"?>


