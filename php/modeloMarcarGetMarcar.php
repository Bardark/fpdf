<?php
$host = "localhost";
$usuario = "root";
$contrasena = "";
$bd = "pruebas";

$conexion = new mysqli($host, $usuario, $contrasena, $bd);
 if ($conexion -> connect_errno) {
   # code...
   die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion -> mysqli_connect_error());
 }

?>
