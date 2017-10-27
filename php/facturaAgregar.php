<?php

$numC   =($_POST['NumC']);
$nomC   =($_POST['NomC']);
$factura   =($_POST['Factura']);
$importe   =($_POST['Importe']);
$importeT   =($_POST['ImporteT']);
$fechaP   =($_POST['FechaP']);
$estado   =($_POST['Estado']);

if (isset( $numC, $nomC, $factura, $importe, $importeT, $fechaP, $estado )) {

   include('Consultas.php');

   $Consultas = new Consultas;

   $consultaExistente = 'SELECT idFac FROM registro WHERE nomFac = "'.$factura.'";';
                          //al validar cambia valor de atributo para toda la clase

   $conexion = $Consultas -> establecerConexion();

     if ($conexion) {
       $nExistente = $Consultas -> contarExistentes($consultaExistente);                                     //si existe un RFC igual dentro del sistema

       if ($nExistente == 0) {
             $sqlInsert = 'INSERT INTO registro (numCliente, nomCliente, nomFac, importeSinIVA, importeTotal, fechaPago, estado) values (';
             $sqlValues = '"'.$numC.'", "'.$nomC.'", "'.$factura.'", "'.$importe.'", "'.$importeT.'", "'.$fechaP.'", "'.$estado.'");';
             $consulta = $sqlInsert.$sqlValues;
             $response = $Consultas -> consultaInsertEditEliminar($consulta);
           }
           else {
             $response =  array('status'   => 'ERROR',
                                'message'  => "Ya existe una factura con el mismo nombre verifique."
                               );
           }

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
