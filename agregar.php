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
      <form class="" action="php/enviar.php" method="post">
        <div class="row">
          <div class="col-md-12">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">Nombre de cliente:</span>
              <input id="txtNomC" type="text" class="form-control" placeholder="Nombre del cliente" name="txtNomC" aria-describedby="basic-addon1" required>
            </div>
          </div>
        </div>

        <br>

        <div class="row">
          <div class="col-md-12">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">Factura:</span>
              <input id="txtFactura" type="text" class="form-control ancho" placeholder="Factura" name="txtFactura" aria-describedby="basic-addon1" required>
            </div>
          </div>
        </div>

        <br>

        <div class="row">
          <div class="col-md-12">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">Importe sin IVA:</span>
              <input id="txtImporte" type="text" class="form-control" placeholder="Importe sin IVA" name="txtImporte" aria-describedby="basic-addon1" required>
            </div>
          </div>
        </div>

        <br>

        <div class="row">
          <div class="col-md-12">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">Importe total:</span>
              <input id="txtImporteT" type="text" class="form-control" placeholder="Importe total" name="txtImporteT" aria-describedby="basic-addon1" required>
            </div>
          </div>
        </div>

        <br>

        <div class="row">
          <div class="col-md-12">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon">Fecha de pago:</span>
              <input id="txtFechaP" type="date" class="form-control" placeholder="Tu teléfono aquí" name="txtFechaP" aria-describedby="basic-addon1" required>
            </div>
          </div>
        </div>

        <br>

        <div class="row">
          <div class="col-md-12">
            <center>
              <button type="submit" class="btn btn-success">
                <i class="fa fa-floppy-o" aria-hidden="true"></i>
                <span class="glyphicons glyphicons-floppy-disk"></span>
                Guardar
              </button>
            </center>
          </div>
        </div>
      </form>
    </div>
    <hr>
    <center>&copy 2017 - Todos los derechos reservados</center>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.12.4.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
