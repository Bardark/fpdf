<?php
if( !empty($_POST) )
	 {
			// Recibimos por POST los datos procedentes del formulario
			$nomCliente = ($_POST["txtNomC"]);
			$nombreFac = ($_POST["txtFactura"]);
			$importe = ($_POST["txtImporte"]);
			$importeTotal = ($_POST["txtImporteT"]);
			$fechaPago = ($_POST["txtFechaP"]);

					// Abrimos la conexion a la base de datos
					if( (isset($_POST['txtNomC']) ) && (isset($_POST['txtFactura'])) && (isset($_POST['txtImporte'])) && (isset($_POST['txtImporteT']))
					&& (isset($_POST['txtFechaP'])))
            {
							include 'conexion.php';
							mysql_query("INSERT INTO registro (nomCliente, nomFac, importeSinIVA, importeTotal, fechaPago)
							VALUES ('$nomCliente', '$nombreFac', '$importe', '$importeTotal', '$fechaPago')");
						}

					// Confirmamos que el registro ha sido insertado con exito
					/*echo "<script>
				       alert('Los datos han sido guardados con exito');
					     location.href='../index.php'
							 </script>";*/
					echo "<p>Los datos han sido guardados con exito.</p>
					 		 <p><a href='../index.php'>VOLVER ATRÁS</a></p>";
	 }
?>
