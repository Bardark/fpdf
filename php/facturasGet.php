<?php
$id  =($_POST['idFactura']);
if (isset( $id )) {
  include('ConsultaGetFactura.php');
  $ConsultaGetFactura = new ConsultaGetFactura;

  $consultaSelect = 'SELECT '.
                     'r.id, '.
                     'r.cliente, '
                     'r.factura, '
                     'r.importe, '
                     'r.importeT, '
                     'r.fechaP ';

  $consultaFrom  = ' FROM registro r ';
  $consultaWhere = ' WHERE r.idFac = '.$id;

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
