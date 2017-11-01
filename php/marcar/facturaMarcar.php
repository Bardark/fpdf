<?php

$id  =($_POST['idFacM']);
$idE =($_POST['idEstado']);

if ((isset( $id )) || (isset($idE))) {

   include('../Consultas.php');

   $Consultas = new Consultas;

   $conexion = $Consultas -> establecerConexion();

     if ($conexion) {
       $query = "UPDATE registro SET estado = '$idE' WHERE idFac='$id'";
       //$result = mysql_query($query);
       $response = $Consultas -> consultaInsertEditEliminar($query);

     }
     else {
       $response =  array('status'  => 'ERROR',
                          'message' => "Problemas al conectarse a la base de datos.");
     }


  } else {
    $response = array(
              'status'  => 'ERROR',
              'message' => "Faltan parámetros al enviar petición."
            );
  }
  $jsonFinal = json_encode($response, JSON_UNESCAPED_UNICODE);
  echo $jsonFinal;
?>
