<style media="screen">
.modal-body {
  height: 400px;
  overflow-y: scroll;
}
</style>

    <div class="col-lg-12 col-md-12 col-sm-12">
      <form id="frmSignUp" role="form">
        <div class="form-group">
        <label><b>Nombre</b></label>
        <input type="text" class="form-control" placeholder="Nombre(s)" name="nombre" required>
        </div>

        <div class="form-group">
        <label><b>Apellido Paterno</b></label>
        <input type="text" class="form-control" name="apat" required>
        </div>

        <div class="form-group">
        <label><b>Apellido Materno</b></label>
        <input type="text" class="form-control" name="amat">
        </div>

        <div class="form-group">
        <label><b>Género</b></label>
        <div class="radio">
          <label><input type="radio" name="genero" value="F">Femenino</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="genero" value="M">Masculino</label>
        </div>
        </div>

        <div class="form-group">
        <label><b>Edad</b></label>
        <input type="number" class="form-control" name="edad" min="0">
        </div>

        <div class="form-group">
        <label><b>Celular</b></label>
        <input type="tel" class="form-control" name="cel" required>
        </div>
        <button type="submit" class="form-control btn-success">Registrar</button>
      </form>
    </div>
