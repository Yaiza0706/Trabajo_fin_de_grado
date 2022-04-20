<?php require_once('controlador_editar_equipo.php'); ?>

<?php if ($no_existe): ?>
    <h1>No existe el equipo</h1>
<?php else: ?>



    <section id="ventana_principal">
  <div> ⠀ </div>
  <div> ⠀ </div>
  <section id="form-container">
    <h3> Introduzca los datos nuevos del usuario. </h3>
    <form>
      <div>
        <label for="nombre"> Nombre : <input type="text" name="nombre" id = "nombre" placeholder="Nombre" value="<?= $equipo["nombre"] ?>" > </label>
      </div>
      <div>
        <label for="nombre"> Apellidos : <input type="text" name="apellido" id= "apellido" placeholder="Apellidos" value="<?= $equipo["apellidos"] ?>" > </label>
      </div>
      <div>
        <label for="nombre"> Titulación : <input type="text" name="titulacion" id="titulacion" placeholder="Titulación" value="<?= $equipo["titulacion"] ?>" > </label>
      </div>
      <div>
        <label for="nombre"> Web : <input type="text" name="web" id ="web" placeholder="Web" value="<?= $equipo["web"] ?>" > </label>
      </div>
      <div>
        <label for="nombre"> Email : <input type="text" name="email" id ="email" placeholder="Correo electrónico" value="<?= $equipo["mail"] ?>" > </label>
      </div>
      <div>
        <label for="nombre"> Contraseña : <input type="password" name="contraseña" id="contraseña" placeholder="Contraseña" value="<?= $equipo["contraseña"] ?>" > </label>
      </div>
      <div> ⠀ </div>
      <div class = "error">
        <h5 id="error">⠀</h5>
      </div>
    </form>
    <div>
      <button class="button-form" onclick='ComprobarRegistro("actualizar", <?= $_SESSION["id"] ?>)'> Actualizar usuario</button>
    </div>
  </section>
</section>
<?php endif ?>