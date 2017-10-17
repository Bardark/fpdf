<?php
	include 'php/plantilla.php';
	mysql_connect("localhost", "root", "") or die(mysql_error());
	mysql_select_db("pruebas") OR DIE ("Error: No es posible establecer la conexión");

  $query = 'SELECT * FROM registro';
	$result = mysql_query($query) or die('Consulta fallida' . mysql_error());

	$pdf = new PDF('L');
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(20,6,'No.',1,0,'C',1);
	$pdf->Cell(60,6,'Cliente',1,0,'C',1);
	$pdf->Cell(60,6,'Factura',1,0,'C',1);
  $pdf->Cell(24,6,'Importe',1,0,'C',1);
  $pdf->Cell(32,6,'Importe Total',1,0,'C',1);
  $pdf->Cell(34,6,'Fecha de pago',1,1,'C',1);

	$pdf->SetFont('Arial','',10);

  	while($row=mysql_fetch_assoc($result))
  	{
  		$pdf->Cell(20,6,$row['numCliente'],1,0,'C');
  		$pdf->Cell(60,6,$row['nomCliente'],1,0,'L');
  		$pdf->Cell(60,6,$row['nomFac'],1,0,'L');
      $pdf->Cell(24,6,$row['importeSinIVA'],1,0,'C');
  		$pdf->Cell(32,6,$row['importeTotal'],1,0,'C');
  		$pdf->Cell(34,6,$row['fechaPago'],1,1,'C');
  	}
  	$pdf->Output();
?>
