var txtMarcaMotorE=$('#txtMarcaMotorE'),
    btnGuardarE=$('#btnGuardarE'),
    btnCancelarE=$('#btnCancelarE'),
    txtIdE=$('#txtIdE');

function crearPdf() {
  window.location.href = "pdf.php";
}

function getFacturas(){
  var datos = $.ajax({
    url: '../php/facturasGetTodas.php',
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
                '<td class="text-center" >'+o.idFac+'</td>'+
                '<td class="text-center">'+o.nomCliente+'</td>'+
                '<td class="text-center">'+o.nomFac'</td>'+
                '<td class="text-center">'+o.importeSinIva+'</td>'+
                '<td class="text-center">'+o.importeTotal+'</td>'+
                '<td class="text-center">'+o.fechaPago+'</td>'+
                '<td class="text-center">'+
                  '<i class="fa fa-trash text-danger" aria-hidden="true" id="'+o.idFac+'" style="cursor:pointer"  ></i>'+
                '</td>'+
                '<td class="text-center">'+
                  '<i class="fa fa-pencil-square text-primary" aria-hidden="true" id="'+o.idFac+'" style="cursor:pointer"  ></i>'+
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

function vizualizarEdicion() {
  var id = $(this).attr('id');

  var datos = $.ajax({
  url: '../php/facturasGet.php',
  data:{
     idFactura:  id
  },
  type: 'post',
      dataType:'json',
      async:false
  })

  .done(function(res){
    if ( res.status === 'OK' ){
        $.each(res.data, function(k,o){
          txtMarcaMotorE.val(o.motMarca);
          txtIdE.val(o.motId);
        });
    }
    else{
      txtMarcaMotorE.val(res.message);
    }
  });
}
function eliminarRegistro() {
  swal("¡Eliminar registro!, ¿Seguro que desea eliminar este registro?, warning")
  .then(function() {
      window.location = 'eliminar.php';
   });
}

//btnGuardar.on('click',agregarMotor);
//tbodyResult.delegate('.fa-trash', 'click', confirmarEliminar);
//tbodyResult.delegate('.fa-pencil-square', 'click', visualizarEdicion);
//btnCancelarE.on('click',cancelarEdicion);
btnGuardarE.on('click',editarMotor);
