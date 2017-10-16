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
      <?php if ($row = mysql_fetch_array($result)){?>
      <form class="" action="php/borrar.php" method="post">
        <div class="row">
          <div class="col-md-12">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">Número de cliente:</span>
              <input id="txtNumC" type="text" class="form-control" value="<?php echo $row['idFac'] ?>" name="txtNumC" aria-describedby="basic-addon1" required>
            </div>
          </div>
        </div>

        <br>

        <div class="row">
          <div class="col-md-12">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">Nombre de cliente:</span>
              <input id="txtNomC" type="text" class="form-control" value="<?php echo $row['nomCliente'] ?>" name="txtNomC" aria-describedby="basic-addon1" required>
            </div>
          </div>
        </div>

        <br>

        <div class="row">
          <div class="col-md-12">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">Factura:</span>
              <input id="txtFactura" type="text" class="form-control ancho" value="<?php echo $row['nomFac'] ?>" name="txtFactura" aria-describedby="basic-addon1" required>
            </div>
          </div>
        </div>

        <br>

        <div class="row">
          <div class="col-md-12">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">Importe sin IVA:</span>
              <input id="txtImporte" type="text" class="form-control" value="<?php echo $row['importeSinIVA'] ?>" name="txtImporte" aria-describedby="basic-addon1" required>
            </div>
          </div>
        </div>

        <br>

        <div class="row">
          <div class="col-md-12">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">Importe total:</span>
              <input id="txtImporteT" type="text" class="form-control" value="<?php echo $row['importeTotal'] ?>" name="txtImporteT" aria-describedby="basic-addon1" required>
            </div>
          </div>
        </div>

        <br>

        <div class="row">
          <div class="col-md-12">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon">Fecha de pago:</span>
              <input id="txtFechaP" type="date" class="form-control" value="<?php echo $row['fechaPago'] ?>" name="txtFechaP" aria-describedby="basic-addon1" required>
            </div>
          </div>
        </div>

        <br>

        <div class="row">
          <div class="col-md-12">
            <center>
              <button type="submit" class="btn btn-danger">
                <i class="fa fa-trash-o" aria-hidden="true"></i>
                <span class="glyphicons glyphicons-floppy-disk"></span>
                Eliminar
              </button>
            </center>
          </div>
        </div>
      </form>
      <?php }
      ?>
    </div>
    <hr>
    <center>&copy 2017 - Todos los derechos reservados</center>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.12.4.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
