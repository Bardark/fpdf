<div class="container" style="height:100%">
  <div class="container-fluid">
    <div class="elementos hidden" id="dvListadoEstatus">
      <div class="card">
        <div class="card-header">
          <button id="btnCrearPdfP" name="btnCrearPdf" onclick="crearPdfP();" type="submit" class="btn btn-success">
            <i class="fa fa-floppy-o" aria-hidden="true"></i>
            Reporte pagadas
          </button>
          <button id="btnCrearPdfF" name="btnCrearPdf" onclick="crearPdfF();" type="submit" class="btn btn-success">
            <i class="fa fa-floppy-o" aria-hidden="true"></i>
            Reporte por pagar
          </button>
        </div>
        <br>
        <div class="card-body">
          <div class="table-responsive">
            <table id="tblResultM" class="table table-striped table-hover table-bordered">
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
                    Estus de<br>la factura
                  </th>
                </tr>
              </thead>
              <tbody id="tbodyResultM">

              </tbody>

            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
