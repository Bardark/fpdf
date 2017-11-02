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

var btnGuardarM=$('#btnGuardarM'),
    btnCancelarM=$('#btnCancelarM');

function index() {
  dvAgregar.addClass('hidden');
  dvListado.removeClass('hidden');
  dvEditar.addClass('hidden');
  dvMarcar.addClass('hidden');
}

function agregar() {
  dvAgregar.removeClass('hidden');
  dvListado.addClass('hidden');
  dvEditar.addClass('hidden');
  dvMarcar.addClass('hidden');
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
     idFacM: txtIdE.val(),
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
      //getFacturas();

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
