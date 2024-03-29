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

        <h4>Introduzca el correo electrónico y la contraseña para la conexión.</h4>
        <form>
          <div>
            <label for="email"> Correo electrónico : </label> 
          </div>
          <div>
            <input type="text" name="email" id="email" placeholder="Correo electrónico">
          </div>
          <div>
            <label for="contra"> Contraseña : </label> 
          </div>
          <div>
            <input type="password" name="contra" id="contra" placeholder="Contraseña">
          </div>
          <label for="image-captcha">Introduzca el texto que aparece en la imagen. </label>
          <br>
          <br>
          <div id= "image-captcha">
          <?php require_once('captcha.php'); ?>
          <img src='images/reload.svg ' onclick = "refreshcaptcha()"> </img>
          </div>
          <div>
            <input type="text" name="captcha" id="captcha" pattern="[A-Z]{6}" placeholder="Valores del captcha" >
          </div>
          </form>
        <div class = "error">
            <h5 id= "error">⠀</h5>
          </div>
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
