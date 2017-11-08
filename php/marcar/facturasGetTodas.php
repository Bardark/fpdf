<?php
include('ConsultaGetFacturaP.php');
$ConsultaGetFactura = new ConsultaGetFacturaP;

$consultaSelect = 'SELECT '.
                   'r.numCliente, '.
                   'r.nomCliente, '.
                   'r.nomFac, '.
                   'r.importeSinIVA, '.
                   'r.importeTotal, '.
                   'r.fechaPago, '.
                   'r.estado, '.
                   'e.idEstado, '.
                   'e.estadoFac ';

$consultaFrom  = ' FROM registro r, estado e ';
$consultaWhere = ' WHERE r.estado = e.idEstado';

$consulta = $consultaSelect.$consultaFrom.$consultaWhere;
$response = $ConsultaGetFactura -> getConsultaFacturasP($consulta);

$jsonFinal = json_encode($response);
echo $jsonFinal;

?>
