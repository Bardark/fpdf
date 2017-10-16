<?php
  // Conectando, seleccionando la base de datos
  include 'Conexion.php';
  $id = ($_POST["txtIdFac"]);
  // Realizar una consulta MySQL
  $query = mysql_query("SELECT * FROM registro WHERE idFac=$id");
  $result = $query or die('Consulta fallida: ' . mysql_error());
?>
