 <?php require_once('controlador_login.php'); ?>

 <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="res/css/style.css">
    <script src="jquery.min.js"></script>
    <script src="ComprobarDatos.js"></script>
    <title>Login</title>
  </head>
  <body>
    <section class="main-page">
      <section id="login-container">
          <h1> Bienvenido </h1>
          <h4>Introduce el correo electrónico y la contraseña para la conexión.</h4>
          <form> <!-- action="controlador_login.php" method="post" -->
            <div>
              <label for="email"> Correo electrónico : </label> 
            </div>
            <div>
              <input type="text" name="email" id="email" placeholder="Correo electrónico">
            </div>

            <div>
              <label for="contraseña"> Contraseña : </label> 
            </div>
            <div>
              <input type="password" name="contraseña" id="contraseña" placeholder="Contraseña">
            </div>
            <div class = "error">
              <h5 id= "error">⠀</h5>
            </div>
          </form>
          <div>
              <button class="button-login" name="login" onclick="ComprobarLogin()">Iniciar sesión</button>
            </div>
            <div>
                <a href="../Registro/vista_registro.php">Crear nuevo usuario</a>
            </div>
      </section>
    </section>
  </body>
</html>

