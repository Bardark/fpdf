<?php
  include('ConsultaGetEstado.php');
  $ConsultaGetMotor = new ConsultaGetEstado;

  $consultaSelect = 'SELECT '.
                     'idEstado, '.
                     'estadoFac ';

  $consultaFrom = ' FROM estado';

  $consulta = $consultaSelect.$consultaFrom;
  $response = $ConsultaGetMotor -> getConsultaEstados($consulta);

  $jsonFinal = json_encode($response);
  echo $jsonFinal;
?>
