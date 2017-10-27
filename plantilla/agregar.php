<div class="container">
  <div class="elementos hidden" id="dvAgregar">
    <center><h1>Página de agregar facturas</h1></center>
    <div  role="form" name="signup_form2" novalidate>
      <div class="formgroup">
        <label>Número de cliente:</label>
        <input id="txtNumC" name="txtNumC" type="text" class="form-control" placeholder="Número de cliente">
      </div>

      <br>

      <div class="formgroup">
        <label>Nombre de cliente:</label>
        <input id="txtNomC" name="txtNomC" type="text" class="form-control" placeholder="Nombre de cliente">
      </div>

      <br>

      <div class="formgroup">
        <label>Factura:</label>
        <input id="txtFactura" name="txtFactura" type="text" class="form-control ancho" placeholder="Factura">
      </div>

      <br>

      <div class="formgroup">
        <label>Importe:</label>
        <input id="txtImporte" name="txtImporte" type="text" class="form-control ancho" placeholder="Importe">
      </div>

      <br>

      <div class="formgroup">
        <label>Importe total:</label>
        <input id="txtImporteT" name="txtImporteT" type="text" class="form-control ancho" placeholder="Importe total">
      </div>

      <br>

      <div class="formgroup">
        <label>Fecha de Pago:</label>
        <div class='input-group date' id='datetimepicker1'>
          <span class="input-group-addon">
            <!--span class="glyphicon glyphicon-calendar"></span-->
            <i class="fa fa-calendar" aria-hidden="true"></i>
          </span>
          <input id="txtFechaP" name="txtFechaP" type="text" class="form-control ancho" placeholder="aaaa/mm/dd">
        </div>
      </div>

      <br>

      <div class="formgroup hidden">
        <label>Estado:</label>
        <input id="txtEstado" name="txtEstado" type="text" class="form-control ancho" value="2">
      </div>

      <br>

      <div class="row">
        <div class="col-md-12">
          <center>
            <button id="btnGuardar" style="cursor:pointer; cursor: hand" type="submit" class="btn btn-success">
              <i class="fa fa-floppy-o" aria-hidden="true"></i>
              <span class="glyphicons glyphicons-floppy-disk"></span>
              Guardar
            </button>
          </center>
        </div>
      </div>
    </div>
  </div>
</div>
