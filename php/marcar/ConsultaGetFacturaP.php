<?php
  /**
   * Clase para regresar elementos de consulta para traer informacion de la tabla motores
   */
  class ConsultaGetFacturaP{

    function getConsultaFacturasP($consultaSql){
      include('../Consultas.php');
          $Consultas = new Consultas;

            $Consultas -> establecerConexion();
            $database = $Consultas-> ConexionBD->conectarBD();

            if($database->connect_errno) {
              $response = array(
                  'status' => 'ERROR',
                  'message' => 'No se pudo establecer conexión a la base de datos.'
                );
             }
             else{

               if ( $result = $database->query($consultaSql) ) {


                 if( $result->num_rows > 0 ) {

                   while($row = mysqli_fetch_array($result, MYSQL_BOTH)) {
                     $numCliente = $row['numCliente'];
                     $cliente = $row['nomCliente'];
                     $factura = $row['nomFac'];
                     $importe = $row['importeSinIVA'];
                     $importeT = $row['importeTotal'];
                     $fechaP = $row['fechaPago'];
                     $estadoFac = $row['estadoFac'];

                     $data[]= array(
                                    'numCliente' => $numCliente,
                                    'nomCliente' => $cliente,
                                    'nomFac' => $factura,
                                    'importeSinIVA' => $importe,
                                    'importeTotal' => $importeT,
                                    'fechaPago' => $fechaP,
                                    'estadoFac' => $estadoFac,
                                  );
                   }
                   mysqli_free_result($result);

                   $response = array(
                     'status' => 'OK',
                     'data' => $data,
                   );

                 } else {
                   $response = array(
                     'status' => 'ERROR',
                     'message' => 'No se encontraron facturas en el sistema.'
                   );
                 }

               }
               else {
                 $response = array(
                     'status' => 'ERROR',
                     'message' => $database->error
                   );
                }
                $Consultas-> ConexionBD->desconectarDB($database);

             }

          return $response;
       }

  }

 ?>
