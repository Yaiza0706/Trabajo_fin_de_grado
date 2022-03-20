<?php require_once('controlador_crear_proyecto.php'); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
   <meta charset="utf-8">
   <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="../res/css/style.css">
   <title>Crear proyecto</title>
 </head>
 <body>
 <body>
    <section class="main-page">
      <section id="form-container">
          <h1> Introduzca los datos del proyecto nuevo. </h1>
          <form action="controlador_crear_proyecto.php" method="post">
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
              <input type="text" name="titulo_pagina" placeholder="Título página">
            </div>
             <div>
              <input type="text" name="titulo_proyecto" placeholder="Título proyecto">
            </div>
            <div>
              <input type="text" name="logo" placeholder="Link logo">
            </div>
            <div>
              <input type="text" name="expediente" placeholder="Número expediente">
            </div>
            <div>
              <input type="text" name="inicio" placeholder="Fecha inicio">
            </div>
            <div>
              <input type="text" name="cif" placeholder="CIF">
            </div>
            <div>
              <input type="text" name="duracion" placeholder="Duración">
            </div>
            <div>
              <input type="text" name="resumen" placeholder="Resumen">
            </div>
            <div>
              <input type="text" name="logo_menu" placeholder="Link logo menú">
            </div>
            <div>
              <button class="button-form" type="submit" name="submit">Crear nuevo proyecto</button>
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
