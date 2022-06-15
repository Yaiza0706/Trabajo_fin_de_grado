<?php require_once('controlador_editar_financiacion.php'); ?>

<?php if ($no_existe): ?>
    <h1>No existe la financiación </h1>
<?php else: ?>

<section class="main-page">
  <div> ⠀ </div>
  <div> ⠀ </div>
  <section id="form-container">
    <h3> Edite los datos de la financiación seleccionada. </h3>
    <form>
      <div>
        <label for="descripcion"> Descripción : <input type="text" name="descripcion" id = "descripcion" placeholder="Descripción" value="<?= $financiacion["descripcion"] ?>" > </label>
      </div>
      <div>
        <label for="presupuesto_total"> Presupuesto total : <input type="text" name="presupuesto_total" id = "presupuesto_total" placeholder="Presupuesto total" value="<?= $financiacion["presupuesto_total"] ?>" > </label>
      </div>
      <div>
        <label for="id_proyecto"> ID proyecto : <input type="text" name="id_proyecto" id = "id_proyecto" placeholder="ID proyecto a asociar" value="<?= $financiacion["id_proyecto"] ?>" > </label>
      </div>
      <div> ⠀ </div>
      <div class = "error">
        <h5 id="error">⠀</h5>
      </div>
    </form>
    <div>
      <button class="button-form" onclick='ComprobarFinanciacion("actualizar", <?= $id_financiacion ?>)'> Actualizar financiación</button>
    </div>
  </section>
</section>
<?php endif ?>