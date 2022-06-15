<?php require_once('controlador_editar_proyecto.php'); ?>
<?php if ($no_existe): ?>
    <h1>No existe el grupo</h1>
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
          <textarea type="text" name="resumen" id = "resumen" placeholder="Resumen" rows = "4" cols = "50" > <?= $proyecto["resumen"] ?> </textarea>
        </div>
        <div>
            <label for="objetivos"> Objetivos: </label>
            <textarea type="text" name="objetivos" id = "objetivos" placeholder="Objetivos" rows = "4" cols = "50" > <?= $objetivos["descripcion"] ?> </textarea>
          </div>

          <div>
            <label for="descripcion_financiacion"> Descripción financiación: </label>
            <textarea type="text" name="descripcion_financiacion" id = "descripcion_financiacion" placeholder="Descripcion Financiacion" rows = "4" cols = "50"> <?= $financiacion["descripcion"] ?> </textarea>
          </div>
          <div class="table-wrapper">
            <label for="tabla"> Datos de los periodos: </label>
            <table id = "tabla">
                <thead>
                    <tr>
                      <th> <label for="periodo_año"> Año : <input type="text" name="periodo_año" id = "periodo_año" placeholder="Año"> </label> </th>
                      <th><label for="periodo_presupuesto"> Presupuesto: <input type="text" name="periodo_presupuesto" id = "periodo_presupuesto" placeholder="Presupuesto"> </label> </th>
                      <th> <input type="button" class = "button small" value="Añadir" onclick="anadir_elemento_tabla('tabla')"> </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($result0 as $periodos){
                            echo "<tr>";
                            echo "<td>".$periodos["año"]."</td>";
                            echo "<td>".$periodos["presupuesto"]."</td>";
                            echo "</tr>";                          
                        }
                    ?>
                </tbody>
            </table>
        </div>      

          <div>
            <label for="presupuesto"> Presupuesto total: <input type="text" name="presupuesto" id = "presupuesto" placeholder="Presupuesto" value="<?= $financiacion["presupuesto_total"] ?>"> </label>
          </div>

        <div>
          <label for="logo"> Logo: </label>
          <input type="file" id="img-logo" name="img" accept="image/*">
          <div> ⠀ </div>
          <img src="<?= $proyecto["logo_proyecto"] ?>">
        </div>
        <h7> ⠀ </h7>
        <div>
          <label for="logo_menu"> Logo menú: </label>
          <input type="file" id="img-logo-menu" name="img" accept="image/*">
          <div> ⠀ </div>
          <img src="<?= $proyecto["logo_menu"] ?>">
        </div>

        <div> ⠀ </div>
          <div>
          <label for="equipo"> Selecciona los usuarios asociados a este proyecto: </label>
          <?php if($no_hay_equipo) { ?>
          <h6> No hay usuarios para mostrar.Cree uno primero </h6>

          <?php } else { ?>
          <select id="equipo" style="height:100px" multiple name= 'equipo'>
          <?php
              foreach ($result1 as $equipo)
              {
                if(in_array($equipo['id'], $array_equipo))
                  echo "<option id=". 'equipo'. $equipo['id']." selected >" .$equipo['id'].'. '.$equipo['nombre'].' '.$equipo['apellidos']. "</option>";
                else
                  echo "<option id=". 'equipo'. $equipo['id']." >" .$equipo['id'].'. '.$equipo['nombre'].' '.$equipo['apellidos']. "</option>";
              } 
            }
          ?>
        </select>
        </div>

        <br>
        <div>
        <label for="resultados"> Selecciona los resultados asociados a este proyecto: </label>
          <?php if($no_hay_resultado) { ?>
          <h6> No hay resultados para mostrar. Cree uno primero </h6>

          <?php } else { ?>
            <select id="resultados" style="height:100px" multiple  name= 'resultados'>
          <?php
              foreach ($result2 as $resultados)
              {
                if(in_array($resultados['id'], $array_resultado))
                  echo "<option id=". 'resultados'. $resultados['id']." selected>" .$resultados['id'].'. '.$resultados['titulo'].'. Año: '.$resultados['año_publicacion']. "</option>";
                else
                  echo "<option id=". 'resultados'. $resultados['id'].">" .$resultados['id'].'. '.$resultados['titulo'].'. Año: '.$resultados['año_publicacion']. "</option>";
                } 
            }
          ?>
        </select>
        <br>
          </div>

        <div>
        <label for="investigador"> Selecciona el investigador principal: </label>
          <?php if($no_hay_equipo) { ?>
          <h6> No hay usuarios para mostrar. Cree uno primero </6>

          <?php } else { ?>

          <select  id="investigador" style="height:100px" multiple  name= 'investigador'>
          <?php
              foreach ($result1 as $equipo)
              {
                if(in_array($equipo['id'], $array_investigador))
                  echo "<option id=". 'investigador'. $equipo['id']." selected>" .$equipo['id'].'. '.$equipo['nombre'].' '.$equipo['apellidos']. "</option>";
                else
                  echo "<option id=". 'investigador'. $equipo['id'].">" .$equipo['id'].'. '.$equipo['nombre'].' '.$equipo['apellidos']. "</option>";
              } 
            }
          ?>
          </select>
          <br>
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
                if(in_array($grupos['id'], $array_grupo))
                  echo "<option id=". 'grupos'. $grupos['id']." selected>" .$grupos['id'].'. '.$grupos['titulo']. "</option>";
                else
                  echo "<option id=". 'grupos'. $grupos['id']." >" .$grupos['id'].'. '.$grupos['titulo']. "</option>";
              } 
            }
          ?>
        </select>       
          </div>
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

