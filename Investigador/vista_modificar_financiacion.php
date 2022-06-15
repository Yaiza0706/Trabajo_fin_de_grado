<?php require_once('controlador_modificar_financiacion.php'); ?>

<?php if($no_hay_financiacion) { ?>
    <div> ⠀ </div>
    <div> ⠀ </div>
    <h3> No hay financiaciones para mostrar. </h3>

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
                foreach ($result as $financiacion){
                    echo "<tr>";
                    echo "<td>".$financiacion["id"]."</td>";
                    echo "<td>".$financiacion["descripcion"]."</td>";
                    echo '<td><button class="button small" onclick = "EditarFinanciacion('.$financiacion["id"].')"> Editar </button></td>';
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</div>
<?php } ?>


