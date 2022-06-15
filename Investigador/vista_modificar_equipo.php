<?php require_once('controlador_modificar_equipo.php'); ?>

<div class="table-wrapper">

<div> ⠀ </div>
<div> ⠀ </div>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Editar</th>
            </tr>
        </thead>
        
        <tbody>
            <?php
                echo "<tr>";
                echo "<td>".$_SESSION["nombre"]."</td>";
                echo "<td>".$_SESSION["apellidos"]."</td>";
                echo '<td><button class="button small" onclick = "EditarEquipo('.$_SESSION["id"].')"> Editar </button></td>';
                echo "</tr>";
            ?>
        </tbody>
    </table>
</div>