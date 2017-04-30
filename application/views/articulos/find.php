<div class="" style="margin-top:5%">
  <div class="col-lg-12 col-md-12 col-sm-12">
    <form id="frmBusqueda" role="form">
      <input type="hidden" name="address" id="address" value="">
      <div class="col-lg-3 col-md-3 col-sm-3">
        <select type="combobox" name="categoria" value="" class="form-control">
          <option selected disabled>Categorías</option>
          <?php foreach ($categorias as $categoria): ?>
              <option value="<?php echo $categoria->id ?>"><?php echo $categoria->nombre ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3" >
        <input type="text" name="palabra" value="" class="form-control" placeholder="Buscar">
      </div>

      <div class="col-lg-3 col-md-3 col-sm-3">
        <input type="date" name="fechainicial" value="" class="form-control" placeholder="Buscar">
      </div>

      <div class="col-lg-3 col-md-3 col-sm-3">
        <input type="date" name="fechafinal" value="" class="form-control" placeholder="Buscar">
      </div>


      <div class="col-lg-10 col-md-10 col-sm-10">

      </div>
      <div class="col-lg-2 col-md-2 col-sm-2">
        <input type="submit" class="btn btn-success btn-md" name="" value="Buscar" style="margin-top:5%; margin-bottom:10%; float:right">
      </div>
      </form>
  </div>
</div>
