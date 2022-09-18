<?php session_start();
if (isset ($_SESSION['valido'])) { 
require_once('controlador_modificar_equipo.php'); ?>

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
                 foreach ($result as $equipo){
                    if ($equipo["id"] == $_SESSION["id"])
                    {
                        echo "<tr>";
                        echo "<td>".$equipo["nombre"]."</td>";
                        echo "<td>".$equipo["apellidos"]."</td>";
                        echo '<td><button class="button small" onclick = "EditarEquipo('.$equipo["id"].')"> Editar </button></td>';
                        echo "</tr>";
                    }}
            ?>
        </tbody>
    </table>
</div>
<?php } else{
    header("HTTP/1.1 401 Unauthorized");
    exit;
    } ?> 