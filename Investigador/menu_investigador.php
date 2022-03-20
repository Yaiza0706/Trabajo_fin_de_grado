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


<?php if ($_SESSION['id_tipo_usuario'] == 1) { ?>

<header id="main-header">

<div>
    <ul>
    <li><a href="">CREAR WEB</a>
      <li><a href="vista_crear_proyecto.php">Crear proyecto</a>
      <li><a href="vista_crear_grupo.php">Crear grupo</a></li>
      <li><a href="vista_crear_financiacion.php">Crear financiación</a></li>
      <li><a href="vista_crear_resultado.php">Crear resultado</a></li>
      <li><a href="">Modificar proyecto</a></li>
      <li><a href="">Asociar grupos</a></li>
      <li><a href="vista_modificar_estado_usuario.php">Cambiar estado usuario </a></li>
    </ul>
</div>

<?php }?> 

<?php if ($_SESSION['id_tipo_usuario'] == 2) { ?>
  <div>
    <ul>
      <li><a href="">CREAR WEB</a>
      <li><a href="vista_crear_proyecto.php">Crear proyecto</a>
      <li><a href="vista_crear_grupo.php">Crear grupo</a></li>
      <li><a href="vista_crear_financiacion.php">Crear financiación</a></li>
      <li><a href="vista_crear_resultado.php">Crear resultado</a></li>
      <li><a href="">Modificar proyecto</a></li>
      <li><a href="">Asociar grupos</a></li>
    </ul>
</div>

<?php }?> 

<?php if ($_SESSION['id_tipo_usuario'] == 3) { ?>


  <div>
    <ul>
      <li><a href="vista_crear_proyecto.php">Crear proyecto</a>
      <li><a href="vista_crear_resultado.php">Crear resultado</a></li>
      <li><a href="">Modificar datos personales</a></li>
      <li><a href="">Modificar resultados</a></li>
    </ul>
</div>
<?php }?> 





 </header>
    
<section class="main-page">
          <?php if ($_SESSION['valido']) { ?>


            <h1> Bienvenido <?php echo $_SESSION["nombre"]; ?> . Sesión iniciada correctamente.  </h1>
            <h1> Usuario tipo :  <?php echo $_SESSION["id_tipo_usuario"]?> </h1>

          <?php }?> 
         
    </section>
  </body>
</html>
