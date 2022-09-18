<?php

require_once('../base_datos.php');
$id_proyecto = 0;
$no_existe = false;
$logo_anterior = 0;
$logo_menu_anterior = 0;
$no_objetivos = false;
$no_financiacion = false;

$no_hay_equipo = false;
$no_hay_resultado = false;
$no_hay_grupo = false;
$no_hay_logo_fin = false;


if(strtoupper($_SERVER['REQUEST_METHOD']) === 'GET') 
{
    if(isset($_GET["id"]))
    {
        //Se obtiene el valor del id del proyecto que se va a editar
        $id_proyecto = $_GET["id"];
        
        //Se realiza la conexion con la base de datos.
        $base_datos = new bbdd();
        $base_datos->conectar();

        //Se leen todos los datos del proyecto con el id recibido
        $sql = "SELECT * FROM proyecto WHERE id = " . $id_proyecto;
        $result = $base_datos->consulta($sql);
        if($result == -1)
        {
            $no_existe = true;
        }
        else
        {
            $proyecto = $result[0];
        }

        //Se leen todos los objetivos con el id del proyecto 
        $sql = "SELECT * FROM objetivos WHERE id_proyecto = " . $id_proyecto;
        $result = $base_datos->consulta($sql);
        if($result == -1)
        {
            $no_objetivos  = true;
        }
        else
        {
            $objetivos = $result[0];
        }

        //Se lee la financiacion con el id del proyecto 
        $sql = "SELECT * FROM financiacion WHERE id_proyecto = " . $id_proyecto;
        $result = $base_datos->consulta($sql);
        if($result == -1)
        {
            $no_financiacion  = true;
        }
        else
        {
            $financiacion = $result[0];
        }

        //Se leen los periodos de la financiacion con el id del proyecto 
        $sql = "SELECT * FROM periodos WHERE id_proyecto = " . $id_proyecto;
        $result0 = $base_datos->consulta($sql);
        if($result0 == -1)
        {
            $no_periodo  = true;
        }      

        $sql = "SELECT * FROM equipo";
        $result1 = $base_datos->consulta($sql);
        if($result1 == -1)
        {
            $no_hay_equipo = true;
        }

        $sql = "SELECT * FROM resultados";
        $result2 = $base_datos->consulta($sql);
        if($result2 == -1)
        {
            $no_hay_resultado = true;
        }

        $sql = "SELECT * FROM grupos";
        $result3 = $base_datos->consulta($sql);
        if($result3 == -1)
        {
            $no_hay_grupo = true;
        }

        $sql = "SELECT * FROM logo";
        $result4 = $base_datos->consulta($sql);
        if($result4 == -1)
        {
            $no_hay_logo_fin = true;
        }

        $sql = "SELECT id_resultado FROM rel_resultados_proyecto WHERE id_proyecto = " . $id_proyecto;
        $result = $base_datos->consulta($sql);
        if($result == -1)
        {
            $error = true;
        }
        else
        {   
            $array_resultado = [];
            for($i=0; $i<sizeof($result); $i++)
                array_push($array_resultado, (int)$result[$i]["id_resultado"]);
        }

        $sql = "SELECT id_grupo FROM rel_grupos_proyecto WHERE id_proyecto = " . $id_proyecto;
        $result = $base_datos->consulta($sql);
        if($result == -1)
        {
            $error = true;
        }
        else
        {   
            $array_grupo = [];
            for($i=0; $i<sizeof($result); $i++)
                array_push($array_grupo, (int)$result[$i]["id_grupo"]);
        }

        $sql = "SELECT id_equipo FROM rel_equipo_proyecto WHERE id_proyecto = " . $id_proyecto;
        $result = $base_datos->consulta($sql);
        if($result == -1)
        {
            $error = true;
        }
        else
        {   
            $array_equipo = [];
            for($i=0; $i<sizeof($result); $i++)
                array_push($array_equipo, (int)$result[$i]["id_equipo"]);
            
        }

        $sql = "SELECT id_ip FROM rel_ip_proyecto WHERE id_proyecto = " . $id_proyecto;
        $result = $base_datos->consulta($sql);
        if($result == -1)
        {
            $error = true;
        }
        else
        {   
            $array_investigador = [];
            for($i=0; $i<sizeof($result); $i++)
                array_push($array_investigador, (int)$result[$i]["id_ip"]);
        }

        $sql = "SELECT id_logo FROM rel_logo_proyecto WHERE id_proyecto = " . $id_proyecto;
        $result = $base_datos->consulta($sql);
        if($result == -1)
        {
            $error = true;
        }
        else
        {   
            $array_logo_fin = [];
            for($i=0; $i<sizeof($result); $i++)
                array_push($array_logo_fin, (int)$result[$i]["id_logo"]);
        }
    }
}

else if (strtoupper($_SERVER['REQUEST_METHOD']) === 'POST')
{
    //Se guardan los datos introducidos en variables locales
    if (isset( $_POST['id_proyecto'] ))
    {
        $id_proyecto = $_POST['id_proyecto'];
    }

    if (isset( $_POST['titulo_pagina'] ))
    {
        $titulo_pagina = $_POST['titulo_pagina'];
    }

    if (isset( $_POST['titulo_proyecto'] ))
    {
        $titulo_proyecto = $_POST['titulo_proyecto'];
    }

    //Se realiza la conexion con la base de datos.
    $base_datos = new bbdd();
    $base_datos->conectar();

    $sql = "SELECT * FROM proyecto WHERE id = ?";
    $resultado = $base_datos->consulta_segura($sql, 'i', array($id_proyecto));  

    if(isset($_FILES['logo']['name']))
    {
        $filename = pathinfo($_FILES['logo']['name']);
        $image_path = 'logo_proyecto'.'_'.microtime(true).'.'.$filename['extension'];
        $logo_ruta = "../imagenes_subidas/".$image_path;

        if(!move_uploaded_file($_FILES['logo']['tmp_name'],$logo_ruta))
        {
            echo json_encode(['result' => 'error']);
        }
    }
    else
    {
        $logo_anterior = 1;
        foreach($resultado as $proyecto)
        {
            $logo_ruta = $proyecto['logo_proyecto'];
        }
    }
    
    if(isset($_FILES['logo_menu']['name']))
    {
        $filename2 = pathinfo($_FILES['logo_menu']['name']);
        $image_path2 = 'logo_menu'.'_'.microtime(true).'.'.$filename2['extension'];
        $logo_menu_ruta = "../imagenes_subidas/".$image_path2;

        if(!move_uploaded_file($_FILES['logo_menu']['tmp_name'],$logo_menu_ruta))
        {
            echo json_encode(['result' => 'error']);
        }
    }
    else
    {
        $logo_menu_anterior = 1;
        foreach($resultado as $proyecto)
        {
            $logo_menu_ruta = $proyecto['logo_menu'];
        }
    }

    if (isset( $_POST['expediente'] ))
    {
        $expediente = $_POST['expediente'];
    }

    if (isset( $_POST['inicio'] ))
    {
        $inicio = $_POST['inicio'];
    }

    if (isset( $_POST['cif'] ))
    {
        $cif = $_POST['cif'];
    }

    if (isset( $_POST['duracion'] ))
    {
        $duracion = $_POST['duracion'];
    }

    if (isset( $_POST['resumen'] ))
    {
        $resumen = $_POST['resumen'];
    }

    if (isset( $_POST['objetivos'] ))
    {
        $objetivos = $_POST['objetivos'];
    }

    if (isset( $_POST['descripcion_financiacion'] ))
    {
        $descripcion_financiacion = $_POST['descripcion_financiacion'];
    }

    if (isset( $_POST['presupuesto'] ))
    {
        $presupuesto = $_POST['presupuesto'];
    }

    if (isset( $_POST['logo_menu'] ))
    {
        $logo_menu = $_POST['logo_menu'];
    }
    if (isset( $_POST['array_equipo'] ))
    {
        $array_equipo = $_POST['array_equipo'];
        $array_equipo = explode(',', $array_equipo);
    }

    if (isset( $_POST['array_resultado'] ))
    {
        $array_resultado = $_POST['array_resultado'];
        $array_resultado = explode(',', $array_resultado);
    }
    if (isset( $_POST['array_investigador'] ))
    {
        $array_investigador = $_POST['array_investigador'];
        $array_investigador = explode(',', $array_investigador);
    }

    if (isset( $_POST['array_grupo'] ))
    {
        $array_grupo = $_POST['array_grupo'];
        $array_grupo = explode(',', $array_grupo);
    }

    if (isset( $_POST['array_logo_fin'] ))
    {
        $array_logo_fin = $_POST['array_logo_fin'];
        $array_logo_fin = explode(',', $array_logo_fin);
    }

    if (!$logo_anterior && !$logo_menu_anterior)
    { 
        //Se actualizan los nuevos valores introducidos
        $sql = "UPDATE proyecto
        SET titulo_proyecto = ?, logo_proyecto = ?, titulo = ?, numero_expediente = ?, fecha_inicio = ?,
        cif = ?, duracion = ?, resumen = ', logo_menu = ?
        WHERE id = ?";
        $result = $base_datos->consulta_segura($sql,'sssssssssi',array($titulo_proyecto, $logo_ruta, $titulo_pagina, $expediente, $inicio, $cif, $duracion, $resumen, $logo_menu_ruta, $id_proyecto));;
    }
    else if ($logo_anterior && $logo_menu_anterior)
    {
        $sql = "UPDATE proyecto
        SET titulo_proyecto = ?, titulo =?, numero_expediente = ?, fecha_inicio = ?,
        cif = ?, duracion = ?, resumen = ?
        WHERE id = ?";
        $result = $base_datos->consulta_segura($sql,'sssssssi',array($titulo_proyecto, $titulo_pagina, $expediente, $inicio, $cif, $duracion, $resumen, $id_proyecto));;
    }
    else if((!$logo_anterior && $logo_menu_anterior))
    {
        $sql = "UPDATE proyecto
        SET titulo_proyecto = ?, logo_proyecto = ?, titulo = ?, numero_expediente = ?, fecha_inicio = ?,
        cif = ?, duracion = ?, resumen = ?
        WHERE id = ?";
        $result = $base_datos->consulta_segura($sql,'ssssssssi',array($titulo_proyecto, $logo_ruta, $titulo_pagina, $expediente, $inicio, $cif, $duracion, $resumen, $id_proyecto));;
    }
    else
    {
        $sql = "UPDATE proyecto
        SET titulo_proyecto = ?, titulo = ?, numero_expediente = ?, fecha_inicio = ?,
        cif = ?, duracion = ?, resumen = ?, logo_menu = ?
        WHERE id = ?";
        $result = $base_datos->consulta_segura($sql,'ssssssssi',array($titulo_proyecto, $titulo_pagina, $expediente, $inicio, $cif, $duracion, $resumen, $logo_menu_ruta, $id_proyecto));;
    }
    
    
    if(!$result)
    {
        echo json_encode(['result' => 'error']);
    }
    else
    {
        $sql2 = "DELETE FROM rel_equipo_proyecto WHERE id_proyecto = ?";
        $result2 = $base_datos->consulta_segura($sql2,'i',array($id_proyecto));
        if(!$result2)
        {
            echo json_encode(['result' => 'error']);
        }             
        for ($i = 0; $i<sizeof($array_equipo); $i ++) 
        {        
           $sql2 = "INSERT INTO rel_equipo_proyecto(id_proyecto, id_equipo)
            VALUES(?,?)";
            $result2 = $base_datos->consulta_segura($sql2, 'ii', array($id_proyecto, $array_equipo[$i]));
            if(!$result2)
            {
                echo json_encode(['result' => 'error']);
            }
        }

        $sql2 = "DELETE FROM rel_resultados_proyecto WHERE id_proyecto = ?";
        $result2 = $base_datos->consulta_segura($sql2, 'i', array($id_proyecto));
        if(!$result2)
        {
            echo json_encode(['result' => 'error']);
        }

        for ($i = 0; $i<sizeof($array_resultado); $i ++) 
        {
           $sql2 = "INSERT INTO rel_resultados_proyecto(id_proyecto, id_resultado)
            VALUES(?, ?)";
            $result3 = $base_datos->consulta_segura($sql2, 'ii', array($id_proyecto, $array_resultado[$i]));
            if(!$result3)
            {
                echo json_encode(['result' => 'error']);
            }
        }
        $sql2 = "DELETE FROM rel_ip_proyecto WHERE id_proyecto = ?";
        $result2 = $base_datos->consulta_segura($sql2,  'i', array($id_proyecto));
        if(!$result2)
        {
            echo json_encode(['result' => 'error']);
        }

        for ($i = 0; $i<sizeof($array_investigador); $i ++) 
        {        
           $sql2 = "INSERT INTO rel_ip_proyecto(id_proyecto, id_ip)
            VALUES(?, ?)";
            $result4 = $base_datos->consulta_segura($sql2, 'ii', array($id_proyecto, $array_investigador[$i]));
            if(!$result4)
            {
                echo json_encode(['result' => 'error']);
            }
        }

        $sql2 = "DELETE FROM rel_grupos_proyecto WHERE id_proyecto = ?";
        $result2 = $base_datos->consulta_segura($sql2,  'i', array($id_proyecto));
        if(!$result2)
        {
            echo json_encode(['result' => 'error']);
        }
        

        for ($i = 0; $i<sizeof($array_grupo); $i ++) 
        {
           $sql2 = "INSERT INTO rel_grupos_proyecto(id_proyecto, id_grupo)
            VALUES(?, ?)";
            $result5 = $base_datos->consulta_segura($sql2, 'ii', array($id_proyecto, $array_grupo[$i]));
            if(!$result5)
            {
                echo json_encode(['result' => 'error']);
            }
        }

        $sql2 = "DELETE FROM rel_logo_proyecto WHERE id_proyecto = ?";
        $result2 = $base_datos->consulta_segura($sql2,  'i', array($id_proyecto));
        if(!$result2)
        {
            echo json_encode(['result' => 'error']);
        }
        
        for ($i = 0; $i<sizeof($array_logo_fin); $i ++) 
        {
           $sql2 = "INSERT INTO rel_logo_proyecto(id_proyecto, id_logo)
            VALUES(?, ?)";
            $result6 = $base_datos->consulta_segura($sql2,  'ii', array($id_proyecto, $array_logo_fin[$i]));
            if(!$result6)
            {
                echo json_encode(['result' => 'error']);
            }
        }

        //Se añaden los valores que el usuario ha introducido a la base de datos
        "UPDATE objetivos
        SET descripcion = ?, id_proyecto = ?";
        $result = $base_datos->consulta_segura($sql,  'si', array($objetivos, $id_proyecto));

        if(!$result)
        {
            echo json_encode(['result' => 'error']);
        }

        //Se añaden los valores que el usuario ha introducido a la base de datos
        "UPDATE financiacion
        SET descripcion = ?, presupuesto_total = ?, id_proyecto = ?" ;

        $result = $base_datos->consulta_segura($sql,  'ssi', array($descripcion_financiacion, $presupuesto, $id_proyecto));
        if(!$result)
        {
            echo json_encode(['result' => 'error']);
        }

        $sql = "DELETE FROM periodos WHERE id_proyecto = ?";
        $result = $base_datos->consulta_segura($sql,  'i', array($id_proyecto));
        if($result == -1)
        {
            $error = true;
        }
        
        $array_anyos = $_POST['array_anyos'];
        $array_anyos = explode(',', $array_anyos);
        
        $array_presupuestos = $_POST['array_presupuestos'];
        $array_presupuestos = explode(',', $array_presupuestos);
        
        for ($i = 0; $i<sizeof($array_anyos); $i ++) 
        {
            if (!empty($array_anyos[$i]) && !empty($array_presupuestos[$i]))
            {
            //Se añaden los valores que el usuario ha introducido a la base de datos
            $sql = "INSERT INTO periodos(anyo, presupuesto,id_proyecto) 
            VALUES(?, ?, ?)";
            $result = $base_datos->consulta_segura($sql,'iii',array($array_anyos[$i], $array_presupuestos[$i], $id_proyecto));

            if(!$result)
            {
                echo json_encode(['result' => 'error']);
            }
        }
        }

        echo json_encode(['result' => 'ok']);


        //Se genera la página web

        $path = "../paginas_generadas/$titulo_pagina";
        if (!file_exists($path)) 
        {
            mkdir($path, 0777, true);
            copy("../pagina_ejemplo/LICENSE.txt", "$path/LICENSE.txt");
            copy("../pagina_ejemplo/README.txt", "$path/README.txt");
            mkdir("$path/assets", 0777, true);
            mkdir("$path/assets/css", 0777, true);          
            copy("../pagina_ejemplo/assets/css/main.css", "$path/assets/css/main.css");
            copy("../pagina_ejemplo/assets/css/fontawesome-all.min.css", "$path/assets/css/fontawesome-all.min.css");

            mkdir("$path/assets/js", 0777, true); 
            copy("../pagina_ejemplo/assets/js/breakpoints.min.js", "$path/assets/js/breakpoints.min.js");
            copy("../pagina_ejemplo/assets/js/browser.min.js", "$path/assets/js/browser.min.js");
            copy("../pagina_ejemplo/assets/js/jquery.min.js", "$path/assets/js/jquery.min.js");
            copy("../pagina_ejemplo/assets/js/jquery.scrollex.min.js", "$path/assets/js/jquery.scrollex.min.js");
            copy("../pagina_ejemplo/assets/js/jquery.scrolly.min.js", "$path/assets/js/jquery.scrolly.min.js");
            copy("../pagina_ejemplo/assets/js/main.js", "$path/assets/js/main.js");
            copy("../pagina_ejemplo/assets/js/util.js", "$path/assets/js/util.js");

            mkdir("$path/assets/sass", 0777, true); 
            copy("../pagina_ejemplo/assets/sass/main.scss", "$path/assets/sass/main.scss");
            mkdir("$path/assets/sass/libs", 0777, true); 
            copy("../pagina_ejemplo/assets/sass/libs/_breakpoints.scss", "$path/assets/sass/libs/_breakpoints.scss");
            copy("../pagina_ejemplo/assets/sass/libs/_functions.scss", "$path/assets/sass/libs/_functions.scss");
            copy("../pagina_ejemplo/assets/sass/libs/_html-grid.scss", "$path/assets/sass/libs/_html-grid.scss");
            copy("../pagina_ejemplo/assets/sass/libs/_mixins.scss", "$path/assets/sass/libs/_mixins.scss");
            copy("../pagina_ejemplo/assets/sass/libs/_vars.scss", "$path/assets/sass/libs/_vars.scss");
            copy("../pagina_ejemplo/assets/sass/libs/_vendor.scss", "$path/assets/sass/libs/_vendor.scss");

            mkdir("$path/assets/webfonts", 0777, true); 
            copy("../pagina_ejemplo/assets/webfonts/fa-brands-400.eot", "$path/assets/webfonts/fa-brands-400.eot");
            copy("../pagina_ejemplo/assets/webfonts/fa-brands-400.svg", "$path/assets/webfonts/fa-brands-400.svg");
            copy("../pagina_ejemplo/assets/webfonts/fa-brands-400.ttf", "$path/assets/webfonts/fa-brands-400.ttf");
            copy("../pagina_ejemplo/assets/webfonts/fa-brands-400.woff", "$path/assets/webfonts/fa-brands-400.woff");
            copy("../pagina_ejemplo/assets/webfonts/fa-brands-400.woff2", "$path/assets/webfonts/fa-brands-400.woff2");
            copy("../pagina_ejemplo/assets/webfonts/fa-regular-400.eot", "$path/assets/webfonts/fa-regular-400.eot");
            copy("../pagina_ejemplo/assets/webfonts/fa-regular-400.svg", "$path/assets/webfonts/fa-regular-400.svg");
            copy("../pagina_ejemplo/assets/webfonts/fa-regular-400.ttf", "$path/assets/webfonts/fa-regular-400.ttf");
            copy("../pagina_ejemplo/assets/webfonts/fa-regular-400.woff", "$path/assets/webfonts/fa-regular-400.woff");
            copy("../pagina_ejemplo/assets/webfonts/fa-regular-400.woff2", "$path/assets/webfonts/fa-regular-400.woff2");
            copy("../pagina_ejemplo/assets/webfonts/fa-solid-900.eot", "$path/assets/webfonts/fa-solid-900.eot");
            copy("../pagina_ejemplo/assets/webfonts/fa-solid-900.svg", "$path/assets/webfonts/fa-solid-900.svg");
            copy("../pagina_ejemplo/assets/webfonts/fa-solid-900.ttf", "$path/assets/webfonts/fa-solid-900.ttf");
            copy("../pagina_ejemplo/assets/webfonts/fa-solid-900.woff", "$path/assets/webfonts/fa-solid-900.woff");
            copy("../pagina_ejemplo/assets/webfonts/fa-solid-900.woff2", "$path/assets/webfonts/fa-solid-900.woff2");
            
            mkdir("$path/images", 0777, true);
            copy("../pagina_ejemplo/images/banner.jpg", "$path/images/banner.jpg");
            copy("../pagina_ejemplo/images/logo-uah.png", "$path/images/logo-uah.png");
            copy("../pagina_ejemplo/images/vertical-line.png", "$path/images/vertical-line.png");
        }
        else
        {
            //Se borra el fichero index.html
            unlink("$path/index.html");
        }

        //Se guardan las imágenes subidas en la carpeta de la página
        $ext_menu = pathinfo($logo_menu_ruta, PATHINFO_EXTENSION);
        copy($logo_menu_ruta, "$path/images/logo-menu.$ext_menu");
        $ext_proyecto = pathinfo($logo_ruta, PATHINFO_EXTENSION);
        copy($logo_ruta, "$path/images/logo-proyecto.$ext_proyecto");

        $imagenes = "$path/images/";

        //Se añaden los periodos
        $periodo_html = '<thead> <tr> <th>Año</th>';
        for ($i = 0; $i<sizeof($array_anyos); $i ++) 
        {
            $periodo_html = $periodo_html .'<th>' .$array_anyos[$i].'</th>';
        }
        $periodo_html = $periodo_html. '</tr> </thead> <tbody> <tr> <td>Presupuesto Anual</td>';
        for ($i = 0; $i<sizeof($array_anyos); $i ++) 
        {
            $periodo_html = $periodo_html . '<td>'.$array_presupuestos[$i].'</td>' ;
        }
        $periodo_html = $periodo_html.'</tr> </tbody>';

        //Se añaden las tablas de equipo e investigador principal
        $cabecera_equipo ="
        <thead>
            <tr>
           <th id='table-number'>Nº</th>
           <th id='table-nombre'>Nombre</th>
           <th id='table-apellidos'>Apellido/s</th>
           <th id='table-titulacion'>Titulación</th>
           <th id='table-web'>Web</th>
            </tr>
        </thead>";

        $equipo_html = '';
        for ($i = 0; $i<sizeof($array_equipo); $i ++) 
        {
            $sql = "SELECT * FROM equipo WHERE id = ?";
            $resultado = $base_datos->consulta_segura($sql,'i',array($array_equipo[$i]));  
            foreach($resultado as $equipo)
            {
                $numero = $i+1;
                $equipo_html = $equipo_html . "<tr> <td id='table-number'>". $numero .'</td>';
                $equipo_html = $equipo_html . "<td id='table-nombre'>". $equipo['nombre']. '</td>';
                $equipo_html = $equipo_html . "<td id='table-apellidos'>". $equipo['apellidos']. '</td>';
                $equipo_html = $equipo_html . "<td id='table-titulacion'>". $equipo['titulacion']. '</td>';
                $equipo_html = $equipo_html . "<td id='table-web'><a class='icon solid fa-id-card' href='". $equipo['web']. "'> </a></td></tr>";
            } 
        }

        $ip_html = '';
        $ip = '';
        for ($i = 0; $i<sizeof($array_investigador); $i ++) 
        {
            $sql = "SELECT * FROM equipo WHERE id = ?";
            $resultado = $base_datos->consulta_segura($sql,'i',array($array_investigador[$i]));  
            foreach($resultado as $equipo)
            {
                $numero = $i+1;
                $ip_html = $ip_html . "<tr> <td id='table-number'>". $numero .'</td>';
                $ip_html = $ip_html . "<td id='table-nombre'>". $equipo['nombre']. '</td>';
                $ip_html = $ip_html . "<td id='table-apellidos'>". $equipo['apellidos']. '</td>';
                $ip_html = $ip_html . "<td id='table-titulacion'>". $equipo['titulacion']. '</td>';
                $ip_html = $ip_html . "<td id='table-web'><a class='icon solid fa-id-card' href='". $equipo['web']. "'> </a></td></tr>";
                $ip = $ip . "<a href='". $equipo['web']. "' >". $equipo['nombre'] . " " .$equipo['apellidos'] ."  </a>" ;
            } 
        }

        //Se añade la tabla de resultados
        $resultado_html = '';

        for ($i = 0; $i<sizeof($array_resultado); $i ++) 
        {
            $sql = "SELECT * FROM resultados WHERE id = ?";
            $result = $base_datos->consulta_segura($sql,'i',array($array_resultado[$i]));  
            foreach($result as $resultado)
            {
                $numero = $i+1;
                $resultado_html = $resultado_html . "<tr> <td>". $numero .'</td>';
                $resultado_html = $resultado_html . "<td>". $resultado['autores']. '</td>';
                $resultado_html = $resultado_html . "<td> <a href='" . $resultado['web']."'>". $resultado['titulo'] ."</a></td>";
                $resultado_html = $resultado_html . "<td>". $resultado['anyo_publicacion']. '</td>';
                if($resultado['id_tipo_publicacion'] == 1)
                {
                    $tipo = 'Artículo';
                }
                else if ($resultado['id_tipo_publicacion'] == 2)
                {
                    $tipo = 'Letter';
                }
                else  if ($resultado['id_tipo_publicacion'] == 3)
                {
                    $tipo = 'Patente';
                }
                else
                {
                    $tipo = 'Congreso';
                }
                $resultado_html = $resultado_html . "<td>". $tipo. '</td>';
                $resultado_html = $resultado_html . "<td>". $resultado['revista'].'</td></tr>';
            } 
        }

        //Se añaden los grupos
        $grupo_html = '';
        for ($i = 0; $i<sizeof($array_grupo); $i ++) 
        {
            $sql = "SELECT * FROM grupos WHERE id = ?";
            $resultado = $base_datos->consulta_segura($sql,'i',array($array_grupo[$i]));  
            foreach($resultado as $grupo)
            {
                
                $ext_grupo = pathinfo($grupo['logo_grupo'], PATHINFO_EXTENSION);
                copy($grupo['logo_grupo'], "$path/images/logo-grupo.$ext_grupo");
                $grupo_html = $grupo_html . "<a href='". $grupo['web']."'class='image'><img src='images/logo-grupo.$ext_grupo'alt='' /></a>";
                $grupo_html = $grupo_html . "<div class='inner'>";
                $grupo_html = $grupo_html . "<h4>". $grupo['titulo']. '</h4>';
                $grupo_html = $grupo_html . "<p>". $grupo['descripcion']."</p> </div>";
            } 
        }

        //Se guardan los logos en la carpeta
        $logos_financiacion = '';
        for ($i = 0; $i<sizeof($array_logo_fin); $i ++) 
        {
            $logos_financiacion = $logos_financiacion . "<div class='box alt'> <div class='row gtr-50 gtr-uniform'>";
            $sql = "SELECT * FROM logo WHERE id = ?";
            $resultado = $base_datos->consulta_segura($sql,'i',array($array_logo_fin[$i]));  
            foreach($resultado as $logo)
            {
                $ext_logo = pathinfo($logo['imagen'], PATHINFO_EXTENSION);
                $id_logo = $logo['id'];
                copy($logo['imagen'], "$path/images/logo-financiacion$id_logo.$ext_logo");
                $logos_financiacion = $logos_financiacion . "<div class='col-6'><span class='image fit'><img src='images/logo-financiacion$id_logo.$ext_logo' alt='' /></span></div>";
            } 
            $logos_financiacion = $logos_financiacion . "</div></div>";
        }

        //Se crea el fichero index.html
        $fichero_index = fopen("$path/index.html", "a");

        //Se concatena toda la información
        fwrite($fichero_index, "
        <!DOCTYPE HTML>
        <!--
            Read Only by HTML5 UP
            html5up.net | @ajlkn
            Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
        -->
        <html>");

        fwrite($fichero_index, "
        <head>
            <title>Proyecto $titulo_pagina</title>
            <meta charset='utf-8' />
            <meta name='viewport' content='width=device-width, initial-scale=1, user-scalable=no' />
            <link rel='stylesheet' href='assets/css/main.css' />
            <link rel='icon' type='image/jpeg' href='images/logo-proyecto.$ext_proyecto'/>

            <!-- Evita leer de cache -->
            <meta http-equiv='Expires' content='0'>
            <meta http-equiv='Last-Modified' content='0'>
            <meta http-equiv='Cache-Control' content='no-cache, mustrevalidate'>
            <meta http-equiv='Pragma' content='no-cache'>
	    </head>");
        
        fwrite($fichero_index,
        
        "<body class='is-preload'>
            <!-- Header -->
            <section id='header'>
                <header>
                    <span class='image avatar'><img src='images/logo-menu.$ext_menu' alt='' /></span>
                    <h1 id='logo'><a href='#'>$titulo_pagina</a></h1>
                    <p id='subtitulo'><a href = 'https://www.uah.es/es/investigacion/unidades-de-investigacion/grupos-de-investigacion/Redes-y-Sistemas-Inteligentes-Networks-and-Intelligent-Systems/#presen'> NetIS</a></p>
                </header>
                <nav id='nav'>
                    <ul>
                        <li><a href='#home' class='active'>Home</a></li>
                        <li><a href='#Objetivos'>Objetivos</a></li>
                        <li><a href='#grupos'>Grupos</a></li>
                        <li><a href='#equipo'>Equipo</a></li>
                        <li><a href='#Resultados'>Resultados</a></li>
                        <li><a href='#Presupuesto'>Financiación</a></li>
                        <!--<li><a href='#Mas'>Más</a></li>-->
                    </ul>
                </nav>
                <div class='col-2'>
                    <span class='image fit'  style='height:50%; width: 50%; margin-left: 25%;' >
                        <a href='https://www.uah.es' >
                            <img src='images/logo-uah.png' alt='' />
                        </a>
                    </span>
                </div>
                
                <footer>
                    <!--<ul class='icons'>
                        <li><a href='#' class='icon brands fa-twitter'><span class='label'>Twitter</span></a></li>
                        <li><a href='#' class='icon brands fa-facebook-f'><span class='label'>Facebook</span></a></li>
                        <li><a href='#' class='icon brands fa-instagram'><span class='label'>Instagram</span></a></li>
                        <li><a href='#' class='icon brands fa-github'><span class='label'>Github</span></a></li>
                        <li><a href='#' class='icon solid fa-envelope'><span class='label'>Email</span></a></li>
                    </ul>-->
                </footer>
            </section>" );

        fwrite($fichero_index,
            "<!-- Wrapper -->
            <div id='wrapper'>
                <!-- Main -->
                <div id='main'>
                    <!-- One -->
                    <section id='home'>
                         <div class='image main' data-position='center'>
                            <img src='images/banner.jpg' alt='' />
                         </div>
                        <div class='container'>
                            <header class='major'>
                                <h2>
                                    <img style class='image title'src='images/logo-proyecto.$ext_proyecto' alt='' />
                                    <img style class='image separator'src='images/vertical-line.png' alt='' />
                                    $titulo_pagina
                                </h2>
                                <p><br><strong>$titulo_proyecto</strong></br></p>
                                <ul class='feature-icons'>
                                    <li class='icon solid fa-book'>Nº Expediente: $expediente</li>
                                    <li class='icon solid fa-id-card'>Investigador Principal o Coordinador: $ip</li>
                                    <li class='icon solid fa-university'>Participantes: <a href='https://www.uah.es/' >UAH</a></li>
                                    <li class='icon solid fa-university'>CIF.: $cif</li>
                                    <li class='icon solid fa-calendar-alt'>Fecha inicio proyecto: $inicio</li>
                                    <li class='icon solid fa-history'>Duración del proyecto: $duracion</li>
                                </ul>
                            </header>
                            <h3>Resumen</h3>
                            <p> $resumen </p>
                        </div>
                    </section>

                    <!-- Four -->
                    <section id='Objetivos'>
                        <div class='container'>
                            <h3>Objetivos</h3>
                            <p> $objetivos </p>
                        </div>
                    </section>

                    <!-- Three -->
                    <section id='grupos'>
                        <div class='container'>
                            <h3>Grupos</h3>
                            <div class='features'>
                                <article>
                                $grupo_html
                                </article>
                             </div>
                        </div>
                    </section>

                    <section id='equipo'>
                        <div class='container'>
                            <h3>Equipo</h3>
                            <h4>Investigador/es principal/es</h4>
                            <table class='table table-jah table-miembros'>
                                $cabecera_equipo
                                <tbody>
                                $ip_html
                                </tbody>
                                <tfoot> </tfoot>
                            </table>
                            <h4>Miembros</h4>
                            <table class='table table-jah table-miembros'>
                                $cabecera_equipo
                                <tbody>
                                $equipo_html
                                </tbody>
                            </table>
                        </div>
                    </section>

                    <!-- Two -->
                    <section id='Resultados'>
                        <div class = 'container'>
                            <h3>Resultados</h3>
                            <h4>Publicaciones</h4>
                            <table class='table table-jah table-articulos'>
                                <thead>
                                    <tr>
                                        <th>Nº</th>
                                        <th>Autores</th>
                                        <th>Titulo</th>
                                        <th>Año de Publicación</th>
                                        <th>Tipo</th>
                                        <th>Revista</th>
                                    </tr>
                                </thead>
                                <tbody>
                                $resultado_html                                               
                                </tbody>
                            </table>
                            <!--<h4> Patentes </h4>
                            <table class='table table-jah table-patentes'>
                                <thead>
                                    <tr>
                                        <th>Nº</th>
                                        <th>Titulo</th>
                                        <th>Estado</th>
                                        <th>Autores</th>										
                                        <th>Año de Publicación</th>
                                        <th>Tipo</th>
                                        <th>Código</th>
                                    </tr>
                                </thead>
                            </table> -->
                            <!-- <h4> Conferencias </h4>
                            <tableclass='table table-jah table-conferencias'>
                                <thead>
                                    <tr>
                                        <th>Nº</th>
                                        <th>Autores</th>
                                        <th>Titulo</th>
                                        <th>Año de Publicación</th>
                                        <th>Tipo</th>
                                        <th>Conferencia</th>
                                    </tr>
                                </thead>
                            </table> -->
                        </div>
                    </section>

                    <!-- Five -->
                    <section id='Presupuesto'>
                        <div class='container'>
                            <h3>Financiación</h3>
                            <p> $descripcion_financiacion</p>
                            $logos_financiacion
                            <h4> Financiación otorgada</h4>
                            <table class='table table-jah table-financiacion'>
                                $periodo_html                       
                                <tfoot>
                                    <tr>
                                        <td colspan='2'>Presupuesto Total</td>
                                        <td >$presupuesto</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </section>
                </div> ");

            fwrite($fichero_index,
                "<!-- Footer -->
                <section id='footer'>
                    <div class='container'>
                        <!--<ul class='copyright'>
                            <li>&copy; Untitled. All rights reserved.</li><li>Design: <a href='http://html5up.net'>HTML5 UP</a></li>
                        </ul> -->
                    </div>
                </section>
            </div>

            <!-- Scripts -->
                <script src='assets/js/jquery.min.js'></script>
                <script src='assets/js/jquery.scrollex.min.js'></script>
                <script src='assets/js/jquery.scrolly.min.js'></script>
                <script src='assets/js/browser.min.js'></script>
                <script src='assets/js/breakpoints.min.js'></script>
                <script src='assets/js/util.js'></script>
                <script src='assets/js/main.js'></script>
                </body></html> ");

            //Se cierra el fichero
            fclose($fichero_index);
            
    }
}
 ?> 

