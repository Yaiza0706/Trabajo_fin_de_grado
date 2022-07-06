<?php 
session_start();

if (isset ($_SESSION['valido'])) {
   
require_once('controlador_modificar_estado_usuario.php'); ?>
<div> ⠀ </div>
<div> ⠀ </div>

<h3> Edite el estado del usuario correspondiente: </h3>
<h5> 1. No activo </h5>
<h5> 2. Activo </h5>
<div> ⠀ </div>
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

<?php } else{
    header("HTTP/1.1 401 Unauthorized");
    exit;
    } ?> 