<div class="col-lg-12 col-md-12 col-sm-12">
  <form id="frmLogin" role="form">
    <label><b>Celular</b></label>
    <input type="tel" name="cel" class="form-control" autofocus required>
    <button type="submit" class="btn btn-primary btn-block" style="margin-top:2%; margin-bottom:3%;" >Ingresar</button>
  </form>
</div>

<script type="text/javascript">

  $("#frmLogin").on('submit',function(e){
    e.preventDefault();
    var url = $("#base_url").val() + "Usuarios/logIn";
    var data = $(this).serialize();
    $.post(url,data,function(data){
      console.log(data);
      if (data.error) {
        alertify.error(data.msg);
      }else {
        alertify.success("Bienvenido " + data.msg.nombre +" "+data.msg.ap_paterno);
        bootbox.hideAll();
      }
    },'json').fail(function(xhr, status, error) {
      console.log(error);
    });
  });
</script>
