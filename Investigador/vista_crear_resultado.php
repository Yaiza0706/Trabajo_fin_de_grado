<?php require_once('controlador_crear_resultado.php'); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
   <meta charset="utf-8">
   <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="../res/css/style.css">
   <title>Crear resultado</title>
 </head>
 <body>
 <body>
    <section class="main-page">
      <section id="form-container">
          <h1> Introduzca los datos del resultado nuevo. </h1>
          <form action="controlador_crear_resultado.php" method="post">
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
              <input type="text" name="titulo" placeholder="Título resultado">
            </div>
             <div>
              <input type="text" name="año_publicacion" placeholder="Año publicación">
            </div>
            <div>
              <input type="text" name="id_tipo_publicacion" placeholder="ID tipo publicación">
            </div>
            <div>
              <input type="text" name="revista" placeholder="Revista">
            </div>
            <div>
              <input type="text" name="autores" placeholder="Autores">
            </div>
            <div>
              <button class="button-form" type="submit" name="submit">Crear nuevo resultado</button>
            </div>
            <?php if (isset($_GET['error'])):?>
               <div class = "error">
                 <?php if ($_GET['error'] == 'no_datos'): ?>
                 <h5> Por favor, rellene todos los campos.</h5>
                 <?php endif ?>
                 
               </div>
             <?php endif ?>
          </form>
      </section>
    </section>
  </body>
            
  
</html>
