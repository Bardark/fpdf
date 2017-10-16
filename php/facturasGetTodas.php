<?php
include('ConsultaGetFactura.php');
$ConsultaGetMotor = new ConsultaGetFactura;

$consultaSelect = 'SELECT '.
                  'r.id, '.
                  'r.cliente, '
                  'r.factura, '
                  'r.importe, '
                  'r.importeT, '
                  'r.fechaP ';

$consultaFrom = ' FROM registro r';
$consulta = $consultaSelect.$consultaFrom;
$response = $ConsultaGetFactura -> getConsultaFacturas($consulta);

$jsonFinal = json_encode($response);
echo $jsonFinal;

?>
