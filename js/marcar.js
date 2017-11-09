var txtNumCP=$('#txtNumCP'),
    txtIdP=$('#txtIdP'),
    txtNomCP=$('#txtNomCP'),
    txtFacturaP=$('#txtFacturaP'),
    txtImporteP=$('#txtImporteP'),
    txtImporteTP=$('#txtImporteTP'),
    txtFechaPP=$('#txtFechaPP'),
    txtMarcar=$('#txtMarcar'),
    txtEstadoP=$('#txtEstadoP');

var dvAgregar=$('#dvAgregar'),
    dvEditar=$('#dvEditar'),
    dvListado=$('#dvListado'),
    dvMarcar=$('#dvMarcar');

var dvListadoEstatus=$('#dvListadoEstatus'),
    btnGuardarM=$('#btnGuardarM'),
    btnCancelarM=$('#btnCancelarM'),
    tbodyResultM=$('#tbodyResultM'),
    dvListado=$('#dvListado');

function crearPdfP() {
  window.location.href = "pdfP.php";
}

function crearPdfF() {
  window.location.href = "pdfF.php";
}

function visualizarFactura(){
  dvAgregar.addClass('hidden');
  dvListado.addClass('hidden');
  dvEditar.addClass('hidden');
  dvMarcar.removeClass('hidden');

  var id = $(this).attr('id');

  var datos = $.ajax({
  url: 'php/marcar/getMarcar.php',
  data:{
     idFacP:  id
  },
  type: 'post',
      dataType:'json',
      async:false
  })

  .done(function(res){
    if ( res.status === 'OK' ){
        $.each(res.data, function(k,o){
          txtNumCP.val(o.numCliente);
          txtIdP.val(o.idFac);
          txtNomCP.val(o.nomCliente);
          txtFacturaP.val(o.nomFac);
          txtImporteP.val(o.importeSinIVA);
          txtImporteTP.val(o.importeTotal);
          txtFechaPP.val(o.fechaPago);
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
  getEstado();
}

function getEstado(){

  $.ajax({
    url: 'php/marcar/estadoGet.php',
    type: 'post',
    dataType:'json',
    async:false
    })

    .done(function( response ) {
      txtMarcar.html('');
      txtMarcar.append(
        '<option value=0> Seleccione estado de factura </option>'
      );
      if ( response.status === 'OK' ){
        $.each(response.data, function(k,o){
          txtMarcar.append(
            '<option value='+o.idEstado+'>'+o.estadoFac+'</option>'
          );
        });
      }else{
        txtMarcar.html('');
        txtMarcar.html('<option value=0>'+ response.message +'</option>');
      }
    })

    .fail(function( jqXHR, textStatus, errorThrown ){
        alert('Ocurrio un error, intente de nuevo '+textStatus);
    });
}

function Marcar(){
  var datos = $.ajax({
  url: 'php/marcar/facturaMarcar.php',
  data:{
     idFacM: txtIdP.val(),
     idEstado : txtEstadoP.val()
  },
  type: 'post',
      dataType:'json',
      async:false
  })

  .done(function(res){
    if ( res.status === 'OK' ){
      swal({
        title: "Factura marcada correctamente.",
        text: "",
        timer: 2000,
        type: "success",
        showConfirmButton: true
      });
      cancelarM();

      }
      else{
        mensaje = res.message;
        swal({
          title: "Error al amrcar la factura.",
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

function getFacturasM (){
  dvAgregar.addClass('hidden');
  dvListado.addClass('hidden');
  dvEditar.addClass('hidden');
  dvMarcar.addClass('hidden');
  dvListadoEstatus.removeClass('hidden');

  var datos = $.ajax({
    url: 'php/marcar/facturasGetTodas.php',
    type: 'post',
    dataType:'json',
    async:false
    })

    .done( function( res ){
      tbodyResultM.html('');
      if ( res.status === 'OK' ){
        $.each(res.data, function(k,o){
            tbodyResultM.append(
              '<tr>'+
                '<td class="text-center" >'+o.numCliente+'</td>'+
                '<td class="text-center">'+o.nomCliente+'</td>'+
                '<td class="text-center">'+o.nomFac+'</td>'+
                '<td class="text-center">$'+o.importeSinIVA+'</td>'+
                '<td class="text-center">$'+o.importeTotal+'</td>'+
                '<td class="text-center">'+o.fechaPago+'</td>'+
                '<td class="text-center">'+o.estadoFac+'</td>'+
              '</tr>'
          );
        });
      }else{
        tbodyResultM.html('<tr><td colspan="8" class="center"><h3>'+ res.message +'</h3></td></tr>');
      }
    })

    .fail(function( jqXHR, textStatus, errorThrown ){
        alert('Ocurrio un error, intente de nuevo '+textStatus);
    });

}

function cancelarM(){
  dvAgregar.addClass('hidden');
  dvListado.removeClass('hidden');
  dvEditar.addClass('hidden');
  dvMarcar.addClass('hidden');
}

tbodyResult.delegate('.fa-pencil-square-o', 'click', visualizarFactura);
btnGuardarM.on('click',Marcar);
btnCancelarM.on('ckick',cancelarM);

//Con esto obtenenmos el value del select y se guarda en un input para poder manejarlo en php
$('select#txtMarcar').on('change',function(){
    var valor = $(this).val();
    document.getElementById("txtEstadoP").value = valor;
});
