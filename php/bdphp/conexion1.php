<?php
function conexion() {
$servername = "sql307.thsite.top";
$database = "thsi_35748541_curro";
$username = "thsi_35748541";
$password = "GkIoSmUV";

  $mysqli_conexion = new mysqli("$servername", "$username", "$password", "$database");
  if ($mysqli_conexion->connect_errno) {
    echo "Error de conexión con la base de datos: " . $mysqli_conexion->connect_errno;
    exit;
  }
  return $mysqli_conexion;
}

?>