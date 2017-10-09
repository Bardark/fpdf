<?php
	include 'php/plantilla.php';
	require 'php/conexion.php';

  $query = 'SELECT * FROM registro';
	$result = mysql_query($query) or die('Consulta fallida' . mysql_error());

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(25,6,'No. Cliente',1,0,'C',1);
	$pdf->Cell(50,6,'Cliente',1,0,'C',1);
	$pdf->Cell(34,6,'Factura',1,0,'C',1);
  $pdf->Cell(22,6,'Importe',1,0,'C',1);
  $pdf->Cell(30,6,'Importe Total',1,0,'C',1);
  $pdf->Cell(32,6,'Fecha de pago',1,1,'C',1);

	$pdf->SetFont('Arial','',10);

  	while($row=mysql_fetch_assoc($result))
  	{
  		$pdf->Cell(25,6,$row['numCliente'],1,0,'C');
  		$pdf->Cell(50,6,$row['nomCliente'],1,0,'C');
  		$pdf->Cell(34,6,$row['nomFac'],1,0,'C');
      $pdf->Cell(22,6,$row['importeSinIVA'],1,0,'C');
  		$pdf->Cell(30,6,$row['importeTotal'],1,0,'C');
  		$pdf->Cell(32,6,$row['fechaPago'],1,1,'C');
  	}
  	$pdf->Output();
?>
