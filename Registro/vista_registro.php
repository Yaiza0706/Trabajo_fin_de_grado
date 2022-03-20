<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../res/css/style.css">
    <title>Crear cuenta</title>
  </head>
  <body>
    <section class="main-page">
      <section id="form-container">
          <h1> Introduzca los datos del usuario nuevo. </h1>
          <form action="controlador_registro.php" method="post">
            <div>
            <!--
              <label for="nombre"> Nombre : </label>
              <label for="apellido"> Apellidos : </label>
              <label for="titulacion"> Titulacion : </label>
              <label for="web"> Web : </label> 
              <label for="email"> Email : </label>
              <label for="contraseña"> Contraseña : </label>
            -->
            </div>
            <div>
              <input type="text" name="nombre" placeholder="Nombre">
            </div>
             <div>
              <input type="text" name="apellido" placeholder="Apellidos">
            </div>
            <div>
              <input type="text" name="titulacion" placeholder="Titulación">
            </div>
            <div>
              <input type="text" name="web" placeholder="Web">
            </div>
            <div>
              <input type="text" name="email" placeholder="Correo electrónico">
            </div>
            <div>
              <input type="password" name="contraseña" placeholder="Contraseña">
            </div>
            <div>
              <button class="button-form" type="submit" name="submit">Crear nuevo usuario</button>
            </div>
            <?php if (isset($_GET['error'])):?>
               <div class = "error">
                 <?php if ($_GET['error'] == 'no_datos'): ?>
                 <h5> Por favor, rellene todos los campos.</h5>
                 <?php endif ?>

                 <?php if ($_GET['error'] == 'longitud_incorrecta'): ?>
                 <h5> Longitud incorrecta.</h5>
                 <?php endif ?>
               </div>
             <?php endif ?>
          </form>
      </section>
    </section>
  </body>
</html>
