<?php require_once('controlador_modificar_grupo.php'); ?>

<?php if($no_hay_grupos) { ?>
    <div> ⠀ </div>
    <div> ⠀ </div>
    <h3> No hay grupos para mostrar. </h3>

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
                foreach ($result as $grupos){
                    echo "<tr>";
                    echo "<td>".$grupos["id"]."</td>";
                    echo "<td>".$grupos["titulo"]."</td>";
                    echo '<td><button class="button small" onclick = "EditarGrupo('.$grupos["id"].')"> Editar </button></td>';
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</div>
<?php } ?>
