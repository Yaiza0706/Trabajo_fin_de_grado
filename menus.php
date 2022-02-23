<?php session_start();?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="res/css/style.css">
    <title>Sesión iniciada</title>
  </head>
  <body>
    <header>

    </header>
<section class="main-page">
          <?php if ($_SESSION['valido']) { ?>
            <h1> Bienvenido <?php echo $_SESSION["usuario"]; }?>. Sesión iniciada correctamente. Aparecerá menú en función de tipo de usuario.</h1>
         
    </section>
  </body>
</html>
