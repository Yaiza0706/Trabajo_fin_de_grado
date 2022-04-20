<?php require_once('controlador_editar_proyecto.php'); ?>

<?php if ($no_existe): ?>
    <h1>No existe el proyecto</h1>
<?php else: ?>
    
<head>
  <script>
    $( function() {
      $( "#datepicker" ).datepicker();
    } );
  </script>
</head>

<section class="main-page">
  <div> ⠀ </div>
  <div> ⠀ </div>
  <section id="form-container">
    <h3> Edite los datos del proyecto seleccionado. </h3>
    <div> ⠀ </div>
    <form>
      <div>
        <label for="titulo_pagina"> Acrónimo: <input type="text" name="titulo_pagina" id = "titulo_pagina" placeholder="Título página" value="<?= $proyecto["titulo"] ?>"> </label>
      </div>
      <div>
        <label for="titulo_proyecto"> Nombre proyecto:<input type="text" name="titulo_proyecto" id = "titulo_proyecto" placeholder="Título proyecto" value="<?= $proyecto["titulo_proyecto"] ?>"> </label>
      </div>
      <div>
        <label for="expediente"> Número expediente: <input type="text" name="expediente" id = "expediente" placeholder="Número expediente" value="<?= $proyecto["numero_expediente"] ?>"></label>
      </div> 
      <div>
        <label for="inicio"> Fecha inicio: <input type="text" id="datepicker" placeholder="Fecha inicio" value="<?= $proyecto["fecha_inicio"] ?>"></label>
      </div>
      <div>
        <label for="cif"> CIF: <input type="text" name="cif" id = "cif" placeholder="CIF" value="<?= $proyecto["cif"] ?>"> </label>
      </div>
      <div>
        <label for="duracion">  Duración: <input type="text" name="duracion" id = "duracion" placeholder="Duración" value="<?= $proyecto["duracion"] ?>"> </label>
      </div>
      <div>
        <label for="resumen"> Resumen: </label>
        <textarea type="text" name="resumen" id = "resumen" placeholder="Resumen" rows = "4" cols = "50"><?= $proyecto["resumen"] ?></textarea>
      </div>
      <div>
        <label for="logo"> Logo: </label>
        <input type="file" id="img" name="img" accept="image/*">
      </div>
      <!--
      <h7> ⠀ </h7>
      <div>
        <label for="logo_menu"> Logo menú: </label>
        <input type="file" id="img" name="img" accept="image/*">
      </div>-->
      <div> ⠀ </div>
      <div class = "error">
        <h5 id="error">⠀</h5>
      </div>
    </form>
    <div>
        <button class="button-form" name="submit" onclick= 'ComprobarProyecto("actualizar", <?= $id_proyecto ?>)'>Actualizar proyecto</button>
     </div>
  </section>
</section>
<?php endif ?>

