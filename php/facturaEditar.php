<?php

$id    =($_POST['idFac']);
$numCliente =($_POST['numCliente']);
$nomCliente =($_POST['nomCliente']);
$nomFac =($_POST['nomFac']);
$importe =($_POST['importe']);
$importeT =($_POST['importeT']);
$fechaP =($_POST['fechaP']);

if ((isset( $idFac )) || (isset($numCliente)) || (isset( $nomCliente )) || (isset( $nomFac )) || (isset( $importe )) || (isset( $importeT )) || (isset( $fechaP ))) {

   include('Consultas.php');

   $Consultas = new Consultas;

   $conexion = $Consultas -> establecerConexion();

     if ($conexion) {
             $query = "UPDATE registro SET numCliente = '$numCliente', nomCliente = '$nomCliente', nomFac = '$nomFac', importeSinIVA = '$importe',
             importeTotal = '$importeT', fechaPago = '$fechaP' WHERE idFac='$id'";
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
