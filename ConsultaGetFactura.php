<?php
  /**
   * Clase para regresar elementos de consulta para traer informacion de la tabla motores
   */
  class ConsultaGetFactura{

    function getConsultaFacturas($consultaSql){
      include('Consultas.php');
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
                     $id    = $row['idFac'];
                     $cliente = $row['nomCliente'];
                     $factura = $row['nomFac'];
                     $importe = $row['importeSinIva'];
                     $importeT = $row['importeTotal'];
                     $fechaP = $row['fechaPago'];

                     $data[]= array(
                                    'id'    => $id,
                                    'cliente' => $cliente,
                                    'factura' => $factura,
                                    'importe' => $importe,
                                    'importeT' => $importeT,
                                    'fechaP' => $fechaP,
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
                     'message' => 'No se encontraron marcas de motor en el sistema.'
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
