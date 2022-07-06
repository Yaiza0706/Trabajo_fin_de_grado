<?php session_start();
if (isset ($_SESSION['valido'])) { 
    require_once('controlador_modificar_resultado.php'); ?>

<?php if($no_hay_resultados) { ?>
    <div> ⠀ </div>
    <div> ⠀ </div>
    <h3> No hay resultados para mostrar. </h3>

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
                foreach ($result as $resultados){
                    echo "<tr>";
                    echo "<td>".$resultados["id"]."</td>";
                    echo "<td>".$resultados["titulo"]."</td>";
                    echo '<td><button class="button small" onclick = "EditarResultado('.$resultados["id"].')"> Editar </button></td>';
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</div>

<?php }?>
<?php } else{
    header("HTTP/1.1 401 Unauthorized");
    exit;
    } ?> 