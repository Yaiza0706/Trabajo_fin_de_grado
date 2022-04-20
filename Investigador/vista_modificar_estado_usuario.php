<?php require_once('controlador_modificar_estado_usuario.php'); ?>

<div class="table-wrapper">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Estado</th>
                <th>Editar</th>
            </tr>
        </thead>
        
        <tbody>
            <?php
                foreach ($result as $equipo){
                    echo "<tr>";
                    echo "<td>".$equipo["id"]."</td>";
                    echo "<td>".$equipo["nombre"]."</td>";
                    echo "<td>".$equipo["id_estado_usuario"]."</td>";
                    echo '<td><button class="button small" onclick = "EditarEstadoUsuario('.$equipo["id"].')"> Editar </button></td>';
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</div>
