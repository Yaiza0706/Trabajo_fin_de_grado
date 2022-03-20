<?php require_once('controlador_crear_financiacion.php'); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
   <meta charset="utf-8">
   <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="../res/css/style.css">
   <title>Crear financiación</title>
 </head>
 <body>
 <body>
    <section class="main-page">
      <section id="form-container">
          <h1> Introduzca los datos de la financiación nueva. </h1>
          <form action="controlador_crear_financiacion.php" method="post">
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
              <input type="text" name="descripcion" placeholder="Descripción">
            </div>
             <div>
              <input type="text" name="presupuesto_total" placeholder="Presupuesto total">
            </div>
            <div>
              <input type="text" name="id_proyecto" placeholder="ID proyecto a asociar">
            </div>
            <div>
              <button class="button-form" type="submit" name="submit">Crear nueva financiación</button>
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
