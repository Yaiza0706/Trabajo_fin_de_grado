<?php require_once('controlador_editar_resultado.php'); ?>

<?php if ($no_existe): ?>
    <h1>No existe el resultado</h1>
<?php else: ?>

    <section class="main-page">
  <div> ⠀ </div>
  <div> ⠀ </div>
  <section id="form-container">
      <h3> Edite los datos del resultado seleccionado. </h3>
      <form>
        <div>
         <label for="titulo"> Título resultado: <input type="text" id="titulo" placeholder="Título resultado" value="<?= $resultados["titulo"] ?>"> </label>
        </div>
          <div>
          <label for="año_publicacion"> Año publicacion: <input type="text" id="año_publicacion" placeholder="Año publicación" value="<?= $resultados["año_publicacion"] ?>"> </label>
        </div>
        <div>
        <?php if ($resultados["id_tipo_publicacion"] == 1) {$id_tipo_publicacion = "Artículo";}
        else if ($resultados["id_tipo_publicacion"] == 2) {$id_tipo_publicacion = "Letter";} ?>

        <label for="id_tipo_publicacion"> Tipo publicación (Artículo / Letter): <input type="text" id="id_tipo_publicacion" placeholder="ID tipo publicación" value="<?= $id_tipo_publicacion ?>">  </label>
        </div>
        <div>
        <label for="revista"> Revista: <input type="text" id="revista" placeholder="Revista" value="<?= $resultados["revista"] ?>"> </label>
        </div>
        <div>
        <label for="autores"> Autores: <input type="text" id="autores" placeholder="Autores" value="<?= $resultados["autores"] ?>">  </label>
        </div>
        <div> ⠀ </div>
        <div class = "error">
          <h5 id="error">⠀</h5>
        </div>
      </form>
      <div>
          <button class="button-form"  onclick='ComprobarResultado("actualizar", <?= $id_resultado ?> )'>Actualizar resultado</button>
        </div>
  </section>
</section>
<?php endif ?>