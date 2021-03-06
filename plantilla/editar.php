<div class="container" style="height:100%">
  <div class="container-fluid">
    <div class="elementos hidden" id="dvEditar">
      <center><h1>Página para editar facturas</h1></center>
      <div class="card">
        <div class="card-body">
          <div role="form" name="signup_form2" novalidate >
            <div class="form-group hidden">
                <label>ID</label>
                <input type="text" class="" id="txtIdE">
            </div>

            <div class="form-group">
                <label>Número de cliente</label>
                <input id="txtNumCE" name="txtNumCE" type="text" class="form-control" placeholder="Número de cliente">
            </div>

            <div class="formgroup">
              <label>Nombre de cliente:</label>
              <input id="txtNomCE" name="txtNomC" type="text" class="form-control" placeholder="Nombre de cliente">
            </div>

            <br>

            <div class="formgroup">
              <label>Factura:</label>
              <input id="txtFacturaE" name="txtFactura" type="text" class="form-control ancho" placeholder="Factura">
            </div>

            <br>

            <div class="formgroup">
              <label>Importe:</label>
              <input id="txtImporteE" name="txtImporte" type="text" class="form-control ancho" placeholder="Importe">
            </div>

            <br>

            <div class="formgroup">
              <label>Importe total:</label>
              <input id="txtImporteTE" name="txtImporteT" type="text" class="form-control ancho" placeholder="Importe total">
            </div>

            <br>

            <div class="formgroup">
              <label>Fecha de Pago:</label>
              <div class='input-group date' id='datetimepicker1'>
                <span class="input-group-addon">
                  <i class="fa fa-calendar" aria-hidden="true"></i>
                </span>
                <input id="txtFechaPE" name="txtFechaP" type="text" class="form-control ancho" placeholder="aaaa/mm/dd" required>
              </div>
            </div>

            <br>

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
      </div>
    </div>

    <div class="elementos hidden" id="dvListado">
      <div class="card">
        <div class="card-header">
          <button id="btnCrearPdf" name="btnCrearPdf" onclick="crearPdf();" type="submit" class="btn btn-success">
            <i class="fa fa-floppy-o" aria-hidden="true"></i>
            Reporte general
          </button>
        </div>
        <br>
        <div class="card-body">
          <div class="table-responsive">
            <table id="tblResult" class="table table-striped table-hover table-bordered">
              <thead>
                <tr>
                  <th class="text-center">
                    Número
                  </th>
                  <th class="text-center">
                    Cliente
                  </th>
                  <th class="text-center">
                    Factura
                  </th>
                  <th class="text-center">
                    Importe<br>sin IVA
                  </th>
                  <th class="text-center">
                  Importe<br>total
                  </th>
                  <th class="text-center">
                    Fecha<br>de pago
                  </th>
                  <th class="text-center">
                    Eliminar
                  </th>
                  <th class="text-center">
                    Editar
                  </th>
                  <th class="text-center">
                    Actualizar <br> estatus
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
