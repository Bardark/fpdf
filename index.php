<!DOCTYPE html>
<html lang="es">
<?php
  include 'plantilla/header.php';
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
      </div>
      <div class="elementos" id="dvListado">
        <div class="card">
          <div class="card-header">
            <h5>
              <i class="fa fa-pencil text-primary" aria-hidden="true"></i>
              Ver / editar factura
            </h5>
          </div>
          <div class="card-body">

            <div class="table-responsive">
              <table id="tblResult" class="table table-striped table-hover table-bordered">
                <thead>
                  <tr>
                    <th class="text-center">
                      Id
                    </th>
                    <th class="text-center">
                      Marca de motor
                    </th>
                    <th class="text-center">
                      Eliminar
                    </th>
                    <th class="text-center">
                      Editar
                    </th>
                  </tr>
                </thead>
                <tbody id="tbodyResult">

                </tbody>

              </table>
            </div>

          </div>
        </div>
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
