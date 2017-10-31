<?php
$id  =($_POST['idFacP']);
if (isset( $id )) {
  include('ConsultaGetFactura.php');
  $ConsultaGetFactura = new ConsultaGetFactura;

  $consultaSelect = 'SELECT '.
                     'idFac, '.
                     'numCliente, '.
                     'nomCliente, '.
                     'nomFac, '.
                     'importeSinIVA, '.
                     'importeTotal, '.
                     'fechaPago ';

  $consultaFrom  = ' FROM registro ';
  $consultaWhere = ' WHERE idFac = '.$id;

  $consulta = $consultaSelect.$consultaFrom.$consultaWhere;
  $response = $ConsultaGetFactura -> getConsultaFacturas($consulta);

}
else {
  $response = array(
            'status'  => 'ERROR',
            'message' => "Faltan parámetros al enviar petición."
          );
}
$jsonFinal = json_encode($response, JSON_UNESCAPED_UNICODE);
echo $jsonFinal;

?>
