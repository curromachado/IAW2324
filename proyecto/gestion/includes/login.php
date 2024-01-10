<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página de Inicio</title>
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

    .container {
      text-align: center;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Bienvenido</h1>
    <br>
    <button onclick="(window.location.href = `user_page.php`)">Entrar como Usuario</button>
    <button onclick="verificarAdmin()">Entrar como Admin</button>
    <br><br><br><br>
    <?php include "../footer.php"?>
  </div>

  <script>
    function redirigir(tipo) {
      window.location.href = `login${tipo}.php`;
    }

    function verificarAdmin() {
      var contraseña = prompt('Introduce la contraseña para entrar como Admin:');
      
      // Verifica si la contraseña es 'admin'
      if (contraseña === 'admin') {
        redirigir('admin');
      } else {
        alert('Contraseña incorrecta. Acceso denegado.');
      }
    }
  </script>
  
</body>
</html>
