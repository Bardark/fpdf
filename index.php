<!DOCTYPE html>
<html lang="es">
<?php
  include 'plantilla/header.php';
  include 'php/mostrar.php';
?>
<body>
  <?php
    include 'plantilla/menu.php';
  ?>
  <hr>
  <center><h1>Página principal del registro de facturas</h1></center>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-4">
          <button id="btnCrearPdf" name="btnCrearPdf" onclick="crearPdf();" type="submit" class="btn btn-success">
            <i class="fa fa-floppy-o" aria-hidden="true"></i>
            <span class="glyphicons glyphicons-floppy-disk"></span>
            Generar Reportes
          </button>
        </div>
        <!--div class="col-md-8">
          <div class="col-md-12">
            <span class="input-group-addon"><b>Seleccione preiodo:</b>
              <button type="button" name="button">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button></span>
          </div>
          <div class="col-md-6">
            <input id="txtFechaI" type="date" class="form-control" name="txtFechaI"
            aria-describedby="basic-addon1" required>
          </div>
          <div class="col-md-6">
            <input id="txtFechaT" type="date" class="form-control" name="txtFechaT"
            aria-describedby="basic-addon1" required>
          </div>
        </div-->

         <table id="tablaGen" class="col-md-12 table table-striped Estilo2" style="">
             <thead>
     		        <tr>
 			           <th>No. cliente</th>
 			           <th>Cliente</th>
                  <th>Factura</th>
                  <th>Importe sin IVA</th>
                  <th>Importe total</th>
                  <th>Fecha de pago</th>
                  <th>Pagar/Eliminar</th>
     		        </tr>
     		    </thead>
             <?php while ($row = mysql_fetch_array($result)){ // aca puedes hacer la consulta e iterarla con each. ?>
               <tr>
                 <td class="hidden" id="idFac" name="idFac"><?php echo $row['idFac'] ?></td>
             	   <td><?php echo $row['idFac'] ?></td>
                 <td><?php echo utf8_encode($row['nomCliente']) ?></td>
                 <td><?php echo utf8_encode($row['nomFac']) ?></td>
                 <td>$<?php echo $row['importeSinIVA'] ?></td>
                 <td>$<?php echo $row['importeTotal'] ?></td>
                 <td><?php echo $row['fechaPago'] ?></td>
                 <td>
                   <button id="btnPagar" name="btnPagar" type="submit" onclick="editarRegistro();" class="btn btn-small btn-primary">
                     <i class="fa fa-usd" aria-hidden="true"></i>
                   </button>
                   /
                   <button id="btnEliminar" name="btnEliminar" type="submit" onclick="eliminarRegistro();" class="btn btn-small btn-danger">
                     <i class="fa fa-times" aria-hidden="true"></i>
                   </button>
                 </td>
               </tr>
             <?php }
             ?>
         </table>
      </div>
    </div>
  </div>
  <hr>
  <center>&copy 2017 - Todos los derechos reservados</center>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery-1.12.4.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <!-- JS para editar o eliminar registro -->
  <script src="js/funciones.js"></script>
</body>
</html>
