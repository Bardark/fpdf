<?php
  require 'php/editar.php';
?>
<!DOCTYPE html>
<html>
  <?php
    include 'plantilla/header.php';
  ?>
  <body>
    <?php
      include 'plantilla/menu.php';
    ?>
    <center><h1>Página de agregar facturas</h1></center>
    <br>
    <div class="container">
      <div role="form" name="signup_form2" novalidate >
          <div class="form-group">
              <label>Número de cliente</label>
              <input type="text" placeholder="Número de cliente" class="form-control" name="txtNumC" id="txtNumC" >
              <input type="text" class="hidden" id="txtIdE">
          </div>
          <div class="form-group">
              <label>Cliente</label>
              <input type="text" placeholder="Marca de motor" class="form-control" name="txtCliente" id="txtCliente" >
          </div>
          <div class="form-group">
              <label>Factura</label>
              <input type="text" placeholder="Marca de motor" class="form-control" name="txtFactura" id="txtFactura" >
          </div>
          <div class="form-group">
              <label>Importe</label>
              <input type="text" placeholder="Marca de motor" class="form-control" name="txtImporte" id="txtImporte" >
          </div>
          <div class="form-group">
              <label>Importe total</label>
              <input type="text" placeholder="Marca de motor" class="form-control" name="txtImporteT" id="txtImporteT" >
          </div>
          <div class="form-group">
              <label>Fecha de pago</label>
              <input type="text" placeholder="Marca de motor" class="form-control" name="txtFechaP" id="txtFechaP" >
          </div>

          <div class="form-group">
              <button class="btn btn-sm btn-primary" type="submit" id="btnGuardarE" style="cursor:pointer; cursor: hand"><strong>
                <i class="fa fa-floppy-o" aria-hidden="true"></i>
                Guardar</strong>
              </button>
              <button class="btn btn-sm btn-danger" type="submit" id="btnCancelarE" style="cursor:pointer; cursor: hand"><strong>
                  <i class="fa fa-floppy-o" aria-hidden="true"></i>
                  Cancelar</strong>
              </button>
          </div>
      </div>
    </div>
    <hr>
    <center>&copy 2017 - Todos los derechos reservados</center>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.12.4.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
