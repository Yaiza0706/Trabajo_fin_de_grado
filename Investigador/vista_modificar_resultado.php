<?php require_once('controlador_modificar_resultado.php'); ?>

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