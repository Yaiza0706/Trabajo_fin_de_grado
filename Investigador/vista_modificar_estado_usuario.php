<?php session_start();?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../res/css/style.css">
    <title>Sesión iniciada</title>
  </head>
  <body>
    <header id="main-header">

        <div>
            <ul>
            <li><a href="menu_investigador.php">Atrás</a>
            </ul>
        </div>
    </header>
    
<section class="main-page">

            <h6> Bienvenido <?php echo $_SESSION["nombre"]; ?> . Sesión iniciada correctamente.  </h1>
            <h1> Usuario tipo :  <?php echo $_SESSION["id_tipo_usuario"]?> <?php echo $_SESSION["nombre2"]; ?> . <?php echo $_SESSION["nombre2"]; ?> . </h1>
         
    </section>
  </body>
</html>


