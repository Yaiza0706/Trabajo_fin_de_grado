<?php 
session_start();
if (isset ($_SESSION['valido'])) { 
require_once('controlador_crear_proyecto.php'); ?>

<head>
  <script>
    var array_anyos = [];
    var array_presupuestos = [];
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
          <label for="objetivos"> Objetivos: </label>
          <textarea type="text" name="objetivos" id = "objetivos" placeholder="Objetivos" rows = "4" cols = "50"> </textarea>
        </div>
        <div>
          <label for="descripcion_financiacion"> Descripción financiación: </label>
          <textarea type="text" name="descripcion_financiacion" id = "descripcion_financiacion" placeholder="Descripcion Financiacion" rows = "4" cols = "50"> </textarea>
        </div>
        <div>
          <label for="tabla"> Datos de los periodos: </label>
          <table id = "tabla">
            <thead>
              <tr>
                  <th> <label for="periodo_anyo"> Año : <input type="text" name="periodo_anyo" id = "periodo_anyo" placeholder="Año"> </label> </th>
                  <th><label for="periodo_presupuesto"> Presupuesto: <input type="text" name="periodo_presupuesto" id = "periodo_presupuesto" placeholder="Presupuesto"> </label> </th>
                  <th> <input type="button" class = "button small" value="Añadir" onclick="anadir_elemento_tabla('tabla')"> </th>
                  <th> <input type="button" class = "button small" value="Eliminar" onclick="eliminar_elemento_tabla('tabla')"> </th>
              </tr>
            </thead>
          </table>
        </div>  
        <div>
          <label for="presupuesto"> Presupuesto total: <input type="text" name="presupuesto" id = "presupuesto" placeholder="Presupuesto"> </label>
        </div>
        <div>
          <label for="logo_financiacion"> Selecciona los logos de las financiaciones asociados a este proyecto: </label>
          <?php if($no_hay_logo_fin) { ?>
            <h6> No hay logos para mostrar.Cree uno primero </h6>
           <?php } else { ?>
          <select id="logo_financiacion" style="height:100px" multiple name= 'logo_financiacion'>
            <?php
                foreach ($result4 as $logo_financiacion)
                {
                    echo "<option id=". 'logo_financiacion'. $logo_financiacion['id']." >" .$logo_financiacion['id'].'. '.$logo_financiacion['nombre']. "</option>";
                } 
              }
          ?>
          </select>
        </div>
        <div>
          <label for="logo"> Logo: </label>
          <input type="file" id="img-logo" name="img" accept="image/*">
        </div>
        <h7> ⠀ </h7>
        <div>
          <label for="logo_menu"> Logo menú: </label>
          <input type="file" id="img-logo-menu" name="img" accept="image/*">
        </div>
        <div> ⠀ </div>
        <div>
          <label for="equipo"> Selecciona los usuarios asociados a este proyecto: </label>
          <?php if($no_hay_equipo) { ?>
            <h6> No hay usuarios para mostrar.Cree uno primero </h6>
          <?php } else { ?>
            <select id="equipo" style="height:100px" multiple name= 'equipo'>
          <?php
              foreach ($result as $equipo)
              {
                  echo "<option id=". 'equipo'. $equipo['id']." >" .$equipo['id'].'. '.$equipo['nombre'].' '.$equipo['apellidos']. "</option>";
              } 
            }
          ?>
            </select>
        </div>
        <h7> ⠀ </h7>
        <div>
          <label for="resultados"> Selecciona los resultados asociados a este proyecto: </label>
            <?php if($no_hay_resultado) { ?>
            <h6> No hay resultados para mostrar. Cree uno primero </h6>
            <?php } else { ?>
              <select id="resultados" style="height:100px" multiple  name= 'resultados'>
            <?php
                foreach ($result2 as $resultados)
                {
                    echo "<option id=". 'resultados'. $resultados['id'].">" .$resultados['id'].'. '.$resultados['titulo'].'. Año: '.$resultados['anyo_publicacion']. "</option>";
                } 
              }
            ?>
              </select>
        </div>
        <h7> ⠀ </h7>
        <div>
          <label for="investigador"> Selecciona el investigador principal: </label>
            <?php if($no_hay_equipo) { ?>
              <h6> No hay usuarios para mostrar. Cree uno primero </6>
            <?php } else { ?>
            <select  id="investigador" style="height:100px" multiple  name= 'investigador'>
            <?php
                foreach ($result as $equipo)
                {
                    echo "<option id=". 'investigador'. $equipo['id'].">" .$equipo['id'].'. '.$equipo['nombre'].' '.$equipo['apellidos']. "</option>";
                } 
              }
            ?>
            </select>
          <h7> ⠀ </h7>
          </div>
          <div>
            <label for="grupos"> Selecciona los grupos asociados a este proyecto: </label>
            <?php if($no_hay_grupo) { ?>
            <h6> No hay grupos para mostrar. Cree uno primero </h6>

            <?php } else { ?>
                      <select  id="grupos" style="height:100px" multiple name= 'grupos'>
            <?php
                foreach ($result3 as $grupos)
                {
                    echo "<option id=". 'grupos'. $grupos['id']." >" .$grupos['id'].'. '.$grupos['titulo']. "</option>";
                } 
              }
            ?>
            </select>       
          </div>
          <div class = "error">
            <h5 id="error">⠀</h5>
          </div>
        </form>
        <div>
          <button class="button-form" onclick='ComprobarProyecto("nuevo")'>Crear proyecto y generar web</button>
        </div>
  </section>
</section>

<?php } else{
    header("HTTP/1.1 401 Unauthorized");
    exit;
    } ?> 