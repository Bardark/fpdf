<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!-- SWET ALERT -->
    <script src="../js/sweetalert.min.js"></script>
  </head>
  <body>

  </body>
</html>
<?php
// Recibimos por POST los datos procedentes del formulario
$id = ($_POST["txtNumC"]);
$nomCliente = ($_POST["txtNomC"]);
$nombreFac = ($_POST["txtFactura"]);
$importe = ($_POST["txtImporte"]);
$importeTotal = ($_POST["txtImporteT"]);
$fechaPago = ($_POST["txtFechaP"]);

		// Abrimos la conexion a la base de datos
				include 'conexion.php';
				$query = mysql_query("DELETE FROM registro WHERE idFac='$id'");
        $result = mysql_query($query);
         echo "
           <script>
             swal('¡Eliminado!', 'Registro eliminado con éxito', 'success')
             .then(function() {
                 window.location = '../index.php';
              });
           </script>
           ";
?>
