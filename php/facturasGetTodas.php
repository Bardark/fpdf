<?php
include('ConsultaGetFactura.php');
$ConsultaGetFactura = new ConsultaGetFactura;

$consulta = 'SELECT * FROM registro';
$response = $ConsultaGetFactura -> getConsultaFacturas($consulta);

$jsonFinal = json_encode($response);
echo $jsonFinal;

?>
