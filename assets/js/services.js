$.getJSON("http://jsonip.com/?callback=?", function (data) {
    console.log(data.ip);
    $("#address").val(data.ip);
});

$(document).ready(function () {

  $("#frmBusqueda").on('submit',function(e){
    e.preventDefault();
    var url = $("#base_url").val() + "Articles/obtenerArticulos";
    var data = $(this).serialize();
    $.post(url,data,function(data){
      console.log(data);
      var modal = bootbox.dialog({
           closeButton: false,
           title: "Articulos",
           message: $(data.msg),
           buttons: {
               success:{
                   label: "Cerrar",
                   className: "btn-danger"
               }
           },
           callback: function(result){
             if (result) {
               modal.modal('hide');
             }
           }
       });
    },'json').fail(function(xhr, status, error) {
      console.log(error);
    });
  });


  $("#frmSignUp").on('submit',function(e){
    e.preventDefault();
    var url = $("#base_url").val() + "Usuarios/signUp";
    var data = $(this).serialize();
    $.post(url,data,function(data){
      console.log(data);
    }).fail(function(xhr, status, error) {
      console.log(error);
    });
  });

  $(".VerModal").on('click',function(e){
    var progreso = bootbox.dialog({message: $(progress()),closeButton: false });
    var url = $("#base_url").val() + "Usuarios/obtenerMenu";
    var menu = $(this).attr('menu');
    var titulo = "";
    if (menu == 1) {
      titulo = "Inicio de sesion";
    }else if (menu == 2) {
      titulo = "Registro de usuarios";
    }
    $.get(url,{menu: menu},function(data){
      progreso.modal('hide');
      var modal = bootbox.dialog({
           closeButton: false,
           title: titulo,
           message: $(data),
           buttons: {
               success:{
                   label: "Cerrar",
                   className: "btn-danger"
               }
           },
           callback: function(result){
             if (result) {
               modal.modal('hide');
             }
           }
       });
    }).fail(function(xhr, status, error) {
      progreso.modal('hide');
      console.log(error);
    });
  });
});

function progress(){
  var html = '<div class="progress"><div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:100%">cargando...</div>';
  return html;
}
