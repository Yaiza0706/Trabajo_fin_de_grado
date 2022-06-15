<?php require_once('controlador_modificar_proyecto.php'); ?>


<?php if($no_hay_proyectos) { ?>
    <div> ⠀ </div>
    <div> ⠀ </div>
    <h3> No hay proyectos para mostrar. </h3>

<?php } else { ?>


    <div> ⠀ </div>
    <div> ⠀ </div>

<div class="table-wrapper">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Editar</th>
            </tr>
        </thead>
        
        <tbody>
            <?php
                foreach ($result as $proyecto){
                    echo "<tr>";
                    echo "<td>".$proyecto["id"]."</td>";
                    echo "<td>".$proyecto["titulo_proyecto"]."</td>";
                    echo '<td><button class="button small" onclick = "EditarProyecto('.$proyecto["id"].')"> Editar </button></td>';
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</div>

<?php }?>
