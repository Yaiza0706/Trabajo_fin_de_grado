 <?php require_once('controlador_login.php'); ?>

 <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="res/css/style.css">
    <title>Login</title>
  </head>
  <body>
    <section class="main-page">
      <section id="login-container">
          <h1> Bienvenido </h1>
          <h4>Introduce el correo electrónico y la contraseña para la conexión.</h4>
          <form action="controlador_login.php" method="post">
            <div>
              <!--<label for="email"> Usuario : </label> -->
              <input type="text" name="email" placeholder="Correo electrónico">
            </div>
            <div>
              <!--<label for="contraseña"> Contraseña: </label>-->
              <input type="password" name="contraseña" placeholder="Contraseña">
            </div>
            
              <?php if (isset($_GET['error'])):?>
                <div class = "error">
                  <?php if ($_GET['error'] == 'no_datos'): ?>
                  <h5> Por favor, rellene todos los campos.</h5>
                  <?php endif ?>
                  <?php if ($_GET['error'] == 'datos_incorrectos'): ?>
                  <h5> Por favor, introduzca un usuario y contraseña correctos. </h5>
                  <?php endif ?>
                </div>
              <?php endif ?>
            <div>
              <button class="button-login" type="submit" name="login">Iniciar sesión</button>
            </div>
            <div>
                <a href="formulario.html">Crear nuevo usuario</a>
            </div>
          </form>
      </section>
    </section>
  </body>
</html>

