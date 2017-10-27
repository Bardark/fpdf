var txtNumCP=$('#txtNumCP'),
    txtIdP=$('#txtIdP'),
    txtNomCP=$('#txtNomCP'),
    txtFacturaP=$('#txtFacturaP'),
    txtImporteP=$('#txtImporteP'),
    txtImporteTP=$('#txtImporteTP'),
    txtFechaPP=$('#txtFechaPP'),
    txtEstado=$('#txtEstado'),
    tbodyResult=$('#tbodyResult');

var dvAgregar=$('#dvAgregar'),
    dvEditar=$('#dvEditar'),
    dvListado=$('#dvListado'),
    dvPago=$('#dvPago');

//var btnGuardarM=$('#btnGuardarM');

function visualizarFactura(){
  dvAgregar.addClass('hidden');
  dvListado.addClass('hidden');
  dvEditar.addClass('hidden');
  dvPago.removeClass('hidden');

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
      txtEstado.html('');
      txtEstado.append(
        '<option value=0> Seleccione estado de factura </option>'
      );
      if ( response.status === 'OK' ){
        $.each(response.data, function(k,o){
          txtEstado.append(
            '<option value='+o.idEstado+'>'+o.estadoFac+'</option>'
          );
        });
      }else{
        txtEstado.html('');
        txtEstado.html('<option value=0>'+ response.message +'</option>');
      }
    })

    .fail(function( jqXHR, textStatus, errorThrown ){
        alert('Ocurrio un error, intente de nuevo '+textStatus);
    });

}

tbodyResult.delegate('.fa-usd', 'click', visualizarFactura);
//btnGuardarM.on('click',marcar);
