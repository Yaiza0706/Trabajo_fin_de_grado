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
      <h3> Introduzca los datos del proyecto nuevo. </h3>
      <div> ⠀ </div>
      <form id = "datos" enctype = "multipart/form-data">
        <div>
          <label for="titulo_pagina"> Acrónimo: <input type="text" name="titulo_pagina" id = "titulo_pagina" placeholder="Título página"> </label>  
        </div>
        <div>
          <label for="titulo_proyecto"> Nombre proyecto:<input type="text" name="titulo_proyecto" id = "titulo_proyecto" placeholder="Título proyecto"> </label>
        </div>
        <div>
          <label for="expediente"> Número expediente: <input type="text" name="expediente" id = "expediente" placeholder="Número expediente"> </label>
        </div> 
        <div>
          <label for="datepicker"> Fecha inicio: <input type="text" id="datepicker" placeholder="Fecha inicio" ></label>
        </div>
        <div>
          <label for="cif"> CIF: <input type="text" name="cif" id = "cif" placeholder="CIF"> </label>
        </div>
        <div>
          <label for="duracion">  Duración: <input type="text" name="duracion" id = "duracion" placeholder="Duración"> </label>
        </div>
        <div>
          <label for="resumen"> Resumen: </label>
          <textarea type="text" name="resumen" id = "resumen" placeholder="Resumen" rows = "4" cols = "50"> </textarea>
        </div>
        <div>
          <label for="logo"> Logo: </label>
          <input type="file" id="img" name="img" accept="image/*">
        </div>
        <h7> ⠀ </h7>

        <!-- 
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
          <button class="button-form" onclick='ComprobarProyecto("nuevo")'>Crear nuevo proyecto</button>
        </div>
  </section>
</section>

