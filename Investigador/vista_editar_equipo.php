<?php 
session_start();
if (isset ($_SESSION['valido'])) { 
require_once('controlador_editar_equipo.php'); ?>

<?php if ($no_existe): ?>
    <h1>No existe el equipo</h1>
<?php else: ?>
  <section class="main-page">
  <div> ⠀ </div>
  <div> ⠀ </div>
  <section id="form-container">
    <h3> Introduzca los datos nuevos del usuario. </h3>
    <form>
      <div>
        <label for="nombre"> Nombre : <input type="text" name="nombre" id = "nombre" placeholder="Nombre" value="<?= $equipo["nombre"] ?>" > </label>
      </div>
      <div>
        <label for="apellido"> Apellidos : <input type="text" name="apellido" id= "apellido" placeholder="Apellidos" value="<?= $equipo["apellidos"] ?>" > </label>
      </div>
      <div>
        <label for="titulacion"> Titulación : <input type="text" name="titulacion" id="titulacion" placeholder="Titulación" value="<?= $equipo["titulacion"] ?>" > </label>
      </div>
      <div>
        <label for="web"> Web : <input type="text" name="web" id ="web" placeholder="Web" value="<?= $equipo["web"] ?>" > </label>
      </div>
      <div>
        <label for="email"> Email : <input type="text" name="email" id ="email" placeholder="Correo electrónico" value="<?= $equipo["mail"] ?>" > </label>
      </div>
      <div>
        <label for="contraseña"> Contraseña : <input type="password" name="contraseña" id="contraseña" placeholder="Escriba la contraseña" > </label>
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
<?php } else{
    header("HTTP/1.1 401 Unauthorized");
    exit;
    } ?> 