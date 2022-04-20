<?php require_once('controlador_editar_grupo.php'); ?>

<?php if ($no_existe): ?>
    <h1>No existe el grupo</h1>
<?php else: ?>

<section class="main-page">
  <div> ⠀ </div>
  <div> ⠀ </div>
  <section id="form-container">
    <h3> Edite los datos del grupo seleccionado. </h3>
    <form >
      <div>
        <label for="titulo_grupo"> Título grupo : <input type="text" name="titulo_grupo" id = "titulo_grupo"placeholder="Título grupo" value="<?= $grupos["titulo"] ?>"> </label>
      </div>
      <div>
        <label for="logo_grupo"> Link logo grupo : <input type="text" name="logo_grupo" id = "logo_grupo" placeholder="Logo grupo" value="<?= $grupos["logo_grupo"] ?>">  </label>    
      </div>
      <div>
        <label for="descripcion"> Descripción: <input type="text" name="descripcion" id = "descripcion" placeholder="Descripción" value="<?= $grupos["descripcion"] ?>"> </label>
      </div>
      <div> ⠀ </div>
      <div class = "error">
        <h5 id="error">⠀</h5>
      </div>
    </form>
    <div>
       <button class="button-form" onclick='ComprobarGrupo("actualizar",<?= $id_grupo ?>)'>Actualizar grupo </button>
    </div>
  </section>
</section>

<?php endif ?>