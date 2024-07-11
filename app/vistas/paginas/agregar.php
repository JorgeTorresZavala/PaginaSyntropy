<?php require RUTA_APP . '/vistas/inc/header.php'; ?>

  <a href="<?php echo RUTA_URL; ?>paginas" class="btn-btn-ligth"><i class="fa fa-backward"></i>Volver</a>
  
  <div class="card card-body bg-ligth mt-5">
    <h2>Agregar usuarios</h2>
      <form action="<?php echo RUTA_URL; ?>/paginas/agregar" method="POST">
        <div class="form-group">
          <label for="nombre">Nombre: <sup>*</sup></label>
          <input type="text" name="nombre" class="form-control form-control-lg">
        </div>

        <div class="form-group">
          <label for="apellido1">Apellido 1: <sup>*</sup></label>
          <input type="text" name="apellido1" class="form-control form-control-lg">
        </div>

        <div class="form-group">
          <label for="apellido2">Apellido 2: <sup>*</sup></label>
          <input type="text" name="apellido2" class="form-control form-control-lg">
        </div>

        <div class="form-group">
          <label for="correo">Correo 1: <sup>*</sup></label>
          <input type="email" name="correo" class="form-control form-control-lg">
        </div>

        <div class="form-group">
          <label for="celular">Celular: <sup>*</sup></label>
          <input type="text" name="celular" class="form-control form-control-lg">
        </div>

        <input type="submit" class="btn btn-success" value="Agregar Usuario">
        
      </form>
  </div>


<?php require RUTA_APP . '/vistas/inc/footer.php'; ?>