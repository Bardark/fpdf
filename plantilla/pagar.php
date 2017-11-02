<div class="container">
  <div class="elementos hidden" id="dvMarcar">
    <center><h1>Página para cambiar el estadode las facturas</h1></center>
    <div class="card">
      <div class="card-body">
        <div role="form" name="signup_form2" novalidate >
          <div class="form-group hidden">
              <label>ID</label>
              <input type="text" class="" id="txtIdP">
          </div>

          <div class="form-group">
              <label>Número de cliente</label>
              <input id="txtNumCP" name="txtNumCP" class="caja" type="text" style="border:none" placeholder="Número de cliente" readonly>
          </div>

          <div class="formgroup">
            <label>Nombre de cliente:</label>
            <input id="txtNomCP" name="txtNomCP" class="caja" type="text" style="border:none" placeholder="Nombre de cliente" readonly>
          </div>

          <br>

          <div class="formgroup">
            <label>Factura:</label>
            <input id="txtFacturaP" name="txtFacturaP" class="caja" type="text" style="border:none" placeholder="Factura" readonly>
          </div>

          <br>

          <div class="formgroup">
            <label>Importe:</label>
            <input id="txtImporteP" name="txtImporteP" class="caja" type="text" style="border:none" placeholder="Importe" readonly>
          </div>

          <br>

          <div class="formgroup">
            <label>Importe total:</label>
            <input id="txtImporteTP" name="txtImporteTP" class="caja" type="text" style="border:none" placeholder="Importe total" readonly>
          </div>

          <br>

          <div class="formgroup">
            <label>Fecha de Pago:</label>
            <input id="txtFechaPP" name="txtFechaPP" class="caja" type="text" style="border:none" placeholder="aaaa/mm/dd" readonly>
          </div>

          <br>

          <div class="form-group">
            <label for="slctNombreRev" class="control-label"> Marcar factura como:</label>
            <div class="">
              <select name="txtMarcar" id="txtMarcar" class="form-control input-sm">
              </select>
            </div>
          </div>

          <br>

          <div class="formgroup hidden">
            <label>Estado:</label>
            <input id="txtEstadoP" name="txtEstadoP" class="caja" type="text" style="border:none">
          </div>

          <br>

          <div class="form-group">
              <button class="btn btn-sm btn-primary" type="submit" id="btnGuardarM" style="cursor:pointer; cursor: hand"><strong>
                <i class="fa fa-floppy-o" aria-hidden="true"></i>
                Guardar</strong>
              </button>
              <button class="btn btn-sm btn-danger" type="submit" id="btnCancelarM" style="cursor:pointer; cursor: hand"><strong>
                  <i class="fa fa-times-circle" aria-hidden="true"></i>
                  Cancelar</strong>
              </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
