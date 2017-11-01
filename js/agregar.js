var btnGuardar=$('#btnGuardar'),
    txtNumC=$('#txtNumC'),
    txtNomC=$('#txtNomC'),
    txtFactura=$('#txtFactura'),
    txtImporte=$('#txtImporte'),
    txtImporteT=$('#txtImporteT'),
    txtFechaP=$('#txtFechaP'),
    txtEstado=$('#txtEstado'),
    tbodyResult=$('#tbodyResult');

var dvAgregar=$('#dvAgregar'),
    dvEditar=$('#dvEditar'),
    dvListado=$('#dvListado'),
    dvPago=$('#dvPago');

var txtNumCE=$('#txtNumCE'),
    txtNomCE=$('#txtNomCE'),
    txtFacturaE=$('#txtFacturaE'),
    txtImporteE=$('#txtImporteE'),
    txtImporteTE=$('#txtImporteTE'),
    txtFechaPE=$('#txtFechaPE'),
    btnGuardarE=$('#btnGuardarE'),
    btnCancelarE=$('#btnCancelarE'),
    txtIdE=$('#txtIdE');

function index() {
  dvAgregar.addClass('hidden');
  dvListado.removeClass('hidden');
  dvEditar.addClass('hidden');
  dvPago.addClass('hidden');
}

function agregar() {
  dvAgregar.removeClass('hidden');
  dvListado.addClass('hidden');
  dvEditar.addClass('hidden');
  dvPago.addClass('hidden');
}

function crearPdf() {
  window.location.href = "pdf.php";
}

function agregarFactura(){
  if (!validarIngreso()) {
    return false;
  }

  var datos = $.ajax({
  url: 'php/facturaAgregar.php',
  data:{
     NumC:     txtNumC.val(),
     NomC:     txtNomC.val(),
     Factura:     txtFactura.val(),
     Importe:     txtImporte.val(),
     ImporteT:     txtImporteT.val(),
     FechaP:     txtFechaP.val(),
     Estado:     txtEstado.val(),
  },
  type: 'post',
  dataType:'json',
  async:false
  })

  .done(function ( res ){
    if ( res.status === 'OK' ){
      swal({
        title: "Factura agregada.",
        text: "Se agregó correctamente la factura.",
        timer: 2000,
        type: "success",
        showConfirmButton: true
      });
      txtNumC.val('');
      txtNomC.val('');
      txtFactura.val('');
      txtImporte.val('');
      txtImporteT.val('');
      txtFechaP.val('');
      getFacturas();
    }
    else{
      mensaje = res.message;
      swal({
        title: "Error al agregar factura.",
        text: mensaje,
        type: "error",
        showConfirmButton: true
      });
    }
  })
  .fail(function( jqXHR, textStatus, errorThrown ){
      alert('Ocurrio un error, intente de nuevo '+textStatus);
  });
}

function getFacturas(){
  var datos = $.ajax({
    url: 'php/facturasGetTodas.php',
    type: 'post',
    dataType:'json',
    async:false
    })

    .done( function( res ){
      tbodyResult.html('');
      if ( res.status === 'OK' ){
        $.each(res.data, function(k,o){
            tbodyResult.append(
              '<tr>'+
                '<td class="text-center hidden" >'+o.idFac+'</td>'+
                '<td class="text-center" >'+o.numCliente+'</td>'+
                '<td class="text-center">'+o.nomCliente+'</td>'+
                '<td class="text-center">'+o.nomFac+'</td>'+
                '<td class="text-center">$'+o.importeSinIVA+'</td>'+
                '<td class="text-center">$'+o.importeTotal+'</td>'+
                '<td class="text-center">'+o.fechaPago+'</td>'+
                '<td class="text-center">'+
                  '<i class="fa fa-trash text-danger" aria-hidden="true" id="'+o.idFac+'" style="cursor:pointer"  ></i>'+
                '</td>'+
                '<td class="text-center">'+
                  '<i class="fa fa-pencil-square text-primary" aria-hidden="true" id="'+o.idFac+'" style="cursor:pointer"  ></i>'+
                '</td>'+
                '<td class="text-center">'+
                  '<i class="fa fa-usd text-success" aria-hidden="true" id="'+o.idFac+'" style="cursor:pointer"  ></i>'+
                '</td>'+
              '</tr>'
          );
        });
      }else{
        tbodyResult.html('<tr><td colspan="8" class="center"><h3>'+ res.message +'</h3></td></tr>');
      }
    })

    .fail(function( jqXHR, textStatus, errorThrown ){
        alert('Ocurrio un error, intente de nuevo '+textStatus);
    });

}

function validarIngreso(){
  if ((txtNumC.val() == '') || (txtNumC.val() === null)) {
    swal("Ingrese numero de cliente", "", "warning");

    txtNumC.focus();
    return false;
  }

  if ((txtNomC.val() == '') || (txtNomC.val() === null)) {
    swal("Ingrese nombre de cliente", "", "warning");

    txtNomC.focus();
    return false;
  }

  if ((txtFactura.val() == '') || (txtFactura.val() === null)) {
    swal("Ingrese nombre de factura", "", "warning");

    txtFactura.focus();
    return false;
  }

  if ((txtImporte.val() == '') || (txtImporte.val() === null)) {
    swal("Ingrese importe de la factura", "", "warning");

    txtImporte.focus();
    return false;
  }

  if ((txtImporteT.val() == '') || (txtImporteT.val() === null)) {
    swal("Ingrese importe total de la factura", "", "warning");

    txtImporteT.focus();
    return false;
  }

  if ((txtFechaP.val() == '') || (txtFechaP.val() === null)) {
    swal("Ingrese fecha de pago de la factura", "", "warning");

    txtFechaP.focus();
    return false;
  }
  return true;
}

/*function confirmarEliminar(){
  var id = $(this).attr('id');
  swal({
    title: "Eliminar Factura",
    text: "¿Eliminar factura seleccionada?, esta acción no se podrá revertir.",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Sí, eliminar",
    cancelButtonText: "Cancelar",
    closeOnConfirm: false
  },
  function(){
    eliminarFactura(id);
  });
}*/

function eliminarFactura(idFac) {
  var id = $(this).attr('id');
  var datos = $.ajax({
  url: 'php/facturaEliminar.php',
  data:{
     idFac:  id
  },
  type: 'post',
      dataType:'json',
      async:false
  })

  .done( function(res){
    if ( res.status === 'OK' ){
      swal({
        title: "Factura eliminada correctamente.",
        text: "",
        timer: 2000,
        type: "success",
        showConfirmButton: true
      });
      getFacturas();

      }
      else{
        mensaje = res.message;
        swal({
          title: "Error al eliminar factura.",
          text: mensaje,
          type: "error",
          showConfirmButton: true
        });
      }
    })

    .fail(function( jqXHR, textStatus, errorThrown ){
        alert('Ocurrio un error, intente de nuevo '+textStatus);
    });
}

function limiparCampos(){
  txtMarcaMotor.val('');
  txtMarcaMotor.val('');
  txtMarcaMotor.val('');
  txtMarcaMotor.val('');
  txtMarcaMotor.val('');
  txtMarcaMotor.val('');
}

function visualizarEdicion(){
  dvAgregar.addClass('hidden');
  dvListado.addClass('hidden');
  dvEditar.removeClass('hidden');

  var id = $(this).attr('id');

  var datos = $.ajax({
  url: 'php/facturasGet.php',
  data:{
     idFac:  id
  },
  type: 'post',
      dataType:'json',
      async:false
  })

  .done(function(res){
    if ( res.status === 'OK' ){
        $.each(res.data, function(k,o){
          txtNumCE.val(o.numCliente);
          txtIdE.val(o.idFac);
          txtNomCE.val(o.nomCliente);
          txtFacturaE.val(o.nomFac);
          txtImporteE.val(o.importeSinIVA);
          txtImporteTE.val(o.importeTotal);
          txtFechaPE.val(o.fechaPago);
        });
    }
    else{
      txtNumC.val(res.message);
      txtIdE.val(res.message);
      txtNomCE.val(res.message);
      txtFacturaE.val(res.message);
      txtImporteE.val(res.message);
      txtImporteTE.val(res.message);
      txtFechaPE.val(res.message);
    }
  });
}

function editarFactura() {
  var datos = $.ajax({
  url: 'php/facturaEditar.php',
  data:{
     idFac:     txtIdE.val(),
     numCliente : txtNumCE.val(),
     nomCliente : txtNomCE.val(),
     nomFac : txtFacturaE.val(),
     importe : txtImporteE.val(),
     importeT : txtImporteTE.val(),
     fechaP : txtFechaPE.val()
  },
  type: 'post',
      dataType:'json',
      async:false
  })

  .done(function(res){
    if ( res.status === 'OK' ){
      swal({
        title: "Factura editado correctamente.",
        text: "",
        timer: 2000,
        type: "success",
        showConfirmButton: true
      });
      cancelarEdicion();
      getFacturas();

      }
      else{
        mensaje = res.message;
        swal({
          title: "Error al editar factura.",
          text: mensaje,
          type: "error",
          showConfirmButton: true
        });
      }

    })

    .fail(function( jqXHR, textStatus, errorThrown ){
        alert('Ocurrio un error, intente de nuevo '+textStatus);
    });
}

function cancelarEdicion(){
  dvAgregar.addClass('hidden');
  dvListado.removeClass('hidden');
  dvEditar.addClass('hidden');
  dvPago.addClass('hidden');
}

btnGuardar.on('click',agregarFactura);
tbodyResult.delegate('.fa-trash', 'click', eliminarFactura);
tbodyResult.delegate('.fa-pencil-square', 'click', visualizarEdicion);
btnCancelarE.on('click',cancelarEdicion);
btnGuardarE.on('click',editarFactura);
