<!DOCTYPE html>
<html lang="es">
<head>
  <title>Seleccionar</title>
</head>
<body>
  <h1>
    Lectura de la tabla
  </h1>

  <?php
  //Conexion con la base
  include 'conexion.php';
  $conexion = conexion();

  // Componemos la sentencia SQL
  $ssql = "select * from usuarios";

  // Ejecutamos la sentencia SQL
  $result = $conexion->query($ssql);
  ?>
  <table>
    <tr>
      <th>Nombre</th>
      <th>Teléfono</th>
    </tr>
    <?php
      //Mostramos los registros
      while ($row = $result->fetch_array()) {
        echo '<tr><td>' . $row["nombre"] . '</td>';
        echo '<td>' . $row["telefono"] . '</td></tr>';
      }
      $result->free_result();
      $conexion->close();
    ?>
  </table>

  <p>
    <a href="insertar.php">Añadir un nuevo registro</a>
  </p>

</body>
</html>