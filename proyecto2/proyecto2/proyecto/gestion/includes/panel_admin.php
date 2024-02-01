<?php include "../header.php"; ?>

<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    // Si no está autenticado, redirigir a la página de inicio de sesión
    header("Location: login.php");
    exit();
}

// Procesar el formulario de registro si se envía
if ($_POST) {
    // Obtener los datos del formulario
    $usuario = htmlspecialchars($_POST["usuario"]);
    $contrasena = htmlspecialchars($_POST["contrasena"]);
    $rol = htmlspecialchars($_POST["rol"]);
    $contrasena_codificada = base64_encode($contrasena);

    // Insertar el nuevo usuario en la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn) {
        $query = "INSERT INTO usuarios (usuario, contrasena, rol) VALUES ('$usuario', '$contrasena_codificada', '$rol')";
        if (mysqli_query($conn, $query)) {
            echo "<p class='text-success'>Usuario registrado exitosamente.</p>";
        } else {
            echo "<p class='text-danger'>Error al registrar usuario: " . mysqli_error($conn) . "</p>";
        }
    } else {
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
                        <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Ingresa tu usuario" required>
                    </div>
                    <div class="form-group mt-4">
                        <label for="contrasena">Contraseña</label>
                        <input type="password" class="form-control" name="contrasena" id="contrasena" placeholder="Ingresa tu contraseña" required>
                    </div>
                    <div class="form-group mt-4">
                        <label for="rol" class="form-label">Rol</label>
                        <select name="rol" id="rol" class="form-control">
                            <option value="direccion">Dirección</option>
                            <option value="profesor">Profesorado</option>
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
                                <th scope="col">Usuario</th>
                                <th scope="col">Rol</th>
                                <th scope="col" colspan="2" class="text-center">Operaciones</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            $query = "SELECT * FROM usuarios";
                            $result = mysqli_query($conn, $query);

                            while ($row = mysqli_fetch_assoc($result)) {
                                $usuario = $row['usuario'];
                                $rol = $row['rol'];

                                echo "<tr>";
                                echo "<td>{$usuario}</td>";
                                echo "<td>{$rol}</td>";
                                echo "<td class='text-center'><a href='#' class='btn btn-secondary'><i class='bi bi-pencil'></i></a></td>";
                                echo "<td class='text-center'><a href='#' class='btn btn-danger'><i class='bi bi-trash'></i></a></td>";
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
    <a href="index.php" class="btn btn-warning mb-5">Volver</a>
</div>

<?php include "../footer.php" ?>
