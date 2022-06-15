<?php require_once('controlador_editar_estado_usuario.php'); ?>

<?php if ($no_existe): ?>
    <h1>No existe el equipo</h1>
<?php else: ?>
  <section class="main-page">
  <div> ⠀ </div>
  <div> ⠀ </div>
  <section id="form-container">
    <h3> Modifique el estado  del usuario : <?= $equipo["nombre"] ?> <?= $equipo["apellidos"] ?>. </h3>
    <form>
      <div>
        <label for="nombre"> Estado usuario : <input type="text" name="estado" id="estado_usuario" placeholder="Estado usuario" value="<?= $equipo["id_estado_usuario"] ?>" > </label>
      </div>
      <div> ⠀ </div>
      <div class = "error">
        <h5 id="error">⠀</h5>
      </div>
    </form>
    <div>
      <button class="button-form" onclick='ComprobarEstadoUsuario(<?= $id_equipo ?>)'> Actualizar usuario</button>
    </div>
  </section>
</section>
<?php endif ?>