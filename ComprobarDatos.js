
function anadir_elemento_tabla(id_tabla, año, presupuesto)
{
    //Se cogen los datos de la tabla
    var table = document.getElementById(id_tabla);
    var año = $("#periodo_año").val();
    var presupuesto = $("#periodo_presupuesto").val();
    if(año != "" && presupuesto != "")
    {
        //Se meten en un array
        array_años.push(parseInt( año));
        array_presupuestos.push(parseInt(presupuesto));
        
        num_row = table.rows.length;
        var row = table.insertRow(table.rows.length);

        // Se añaden las nuevas celdas
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        cell1.innerHTML = '<tbody> <tr><td>' +año+ '</td>' ;
        cell2.innerHTML = '<td>' + presupuesto + '</td> </tr> </tbody>';
    }
}

function eliminar_elemento_tabla(id_tabla)
{
    //Se coge el id de la tabla
    var table = document.getElementById(id_tabla);
    var row_count = table.tBodies[0].rows.length;
    if(row_count > 0)
    {
        //Se pueden eliminar todas las filas menos la primera
        table.deleteRow(row_count);
        array_años.pop();
        array_presupuestos.pop();
    }
}

//Función para mostrar otra imagen de captcha diferente
function refreshcaptcha()
{
    document.getElementById('image-captcha').innerHTML = "";
    let url = "../captcha.php";
    $.ajax
    ({
        url:url,
        dataType: "html",
        type:"GET", //tipo de peticion
        success:function(response) //se utiliza si el servidor retorna informacion
        {
            document.getElementById('image-captcha').innerHTML = response + "<img src='images/reload.svg ' onclick = 'refreshcaptcha()'> </img>";
        },
        error: function (req, status, err){
            $("#error").text("Ha ocurrido un error.");
        }
    })
}

function ComprobarLogin() 
{
    var error = 0;
    var email = $("#email").val();
    var contraseña = $("#contraseña").val();
    var captcha = $("#captcha").val();

    // Se comprueba que se hayan introducido valores.
    if(esta_vacio(email))
        error = "email_vacio";

    else if(esta_vacio(contraseña))
        error = "contraseña_vacia";
    
    else if(esta_vacio(captcha))
        error = "argumentos_vacios"

    //Se comprueba que el email sea un email
    else if(!es_Email(email))
        error = "email_no_valido";

    else if (!es_cadena(contraseña))
        error = "contraseña_formato";

    if(error != 0)
        mostrar_errores(error);        
    else
    {
        var parametros = 
        {
            "email":email,
            "contraseña":contraseña,
            "captcha":captcha
        }
        $.ajax
        ({
            url:"controlador_login.php",
            dataType: "json",
            data: parametros,
            type:"POST", //tipo de peticion
            success:function(response) //se utiliza si el servidor retorna informacion
            {
                if(response.result == 'ok')
                {
                    window.location.href = "/Investigador/menu_investigador.php";
                }
                else if (response.result == 'no_verificado')
                {
                    $("#error").text("El usuario o la contraseña no son correctos");
                }
                else if(response.result == 'no_activo')
                {
                    $("#error").text("El usuario está inactivo. Pida al administrador que lo active");
                }
                else if (response.result == 'no_captcha')
                {
                    $("#error").text("Valores introducidos del captcha incorrectos.");
                }
                else
                {
                    console.log(response);
                    $("#error").text("Ha habido un problema");
                }
            },
            error: function (req, status, err)
            {
                console.log(err);
                $("#error").text("Ha ocurrido un error.");
            }
        })
    }
 }

 
 function ComprobarEstadoUsuario(id_equipo=0)
 {
    var error = 0;
    var id_estado_usuario = $("#estado_usuario").val();

    // Se comprueba que se hayan introducido valores.
    if (esta_vacio(id_estado_usuario))
    {
        error = "argumentos_vacios";
    }
    else if(id_estado_usuario != 1 && id_estado_usuario != 2)
    {
        error = "id_incorrecto";
    }

    if(error != 0)
        mostrar_errores(error);
                
    else
    {
        var parametros = 
        {
            "id_equipo":id_equipo,
            "id_estado_usuario":id_estado_usuario
        }
        $.ajax
        ({
            url:"/Investigador/controlador_editar_estado_usuario.php",
            dataType: "json",
            data: parametros,
            type:"POST", //tipo de peticion
            success:function(response) //se utiliza si el servidor retorna informacion
            {
                if(response.result == 'ok')
                {
                    window.location.href = "menu_investigador.php";
                }
                else
                {
                    console.log(response);
                    $("#error").text("Ha habido un problema.");
                }
            },
            error: function (req, status, err){
                console.log(err);
                $("#error").text("Ha ocurrido un error.");
            }
        })
    }
 }


 function ComprobarRegistro(op, id_equipo=0)
 {
    var error = 0;
    var nombre = $("#nombre").val();
    var apellido = $("#apellido").val();
    var titulacion = $("#titulacion").val();
    var web = $("#web").val();
    var email = $("#email").val();
    var contraseña = $("#contraseña").val();

    // Se comprueba que se hayan introducido valores.
    if(esta_vacio(nombre) || esta_vacio(apellido) || esta_vacio(titulacion) || esta_vacio(web) || esta_vacio(email) || esta_vacio(contraseña))
        error = "argumentos_vacios";
            
    //Se comprueba que el email sea un email
    else if(!es_Email(email))
        error = "email_no_valido";

    else if(!longitud_correcta(nombre,50))
        error = "nombre_largo";

    else if(!longitud_correcta(apellido,100))
        error = "apellido_largo";

    else if(!longitud_correcta(titulacion,100))
        error = "titulacion_larga";

    else if(!longitud_correcta(web, 100))
        error = "web_larga";
    
    else if(!longitud_correcta(email,50))
        error = "email_largo";

    else if(!es_cadena(nombre))
        error = "nombre_formato";

    else if(!es_cadena(apellido))
        error = "apellido_formato";

    else if(!es_cadena(titulacion))
        error = "titulacion_formato";

    else if(!es_cadena(web))
        error = "web_formato";
    
    else if(!es_cadena(contraseña))
        error = "contraseña_formato";
    
    else if(!contraseña_segura(contraseña))
        error = "contraseña_insegura";

    if(error != 0)
        mostrar_errores(error);       

    else
    {
        var parametros = 
        {
            "id_equipo":id_equipo,
            "nombre":nombre,
            "apellido":apellido,
            "titulacion":titulacion,
            "web":web,
            "email":email,
            "contraseña":contraseña
        }
        if(op === "nuevo")
        {
            $.ajax
            ({
                url:"/Registro/controlador_registro.php",
                dataType: "json",
                data: parametros,
                type:"POST", //tipo de peticion
                success:function(response) //se utiliza si el servidor retorna informacion
                {
                    if(response.result == 'ok')
                    {
                        window.location.href = "../index.php";
                    }
                    else if (response.result == 'email_existente')
                    {
                        $("#error").text("Ya existe un usuario con ese email.");
                    }
                    else
                    {
                        console.log(response);
                        $("#error").text("Ha habido un problema.");
                    }
                },
                error: function (req, status, err){
                    console.log(err);
                    $("#error").text("Ha ocurrido un error.");
                }
            })

        }else if(op === "actualizar")
        {
            $.ajax
            ({
                url:"/Investigador/controlador_editar_equipo.php",
                dataType: "json",
                data: parametros,
                type:"POST", //tipo de peticion
                success:function(response) //se utiliza si el servidor retorna informacion
                {
                    if(response.result == 'ok')
                    {
                        window.location.href = "menu_investigador.php";
                    }
                    else
                    {
                        console.log(response);
                        $("#error").text("Ha habido un problema.");
                    }
                },
                error: function (req, status, err){
                    console.log(err);
                    $("#error").text("Ha ocurrido un error.");
                }
            })
        }
    }
 }


 function ComprobarResultado(op, id_resultado=0)
 {
    var error = 0;
    var id_tipo_publicacion;
    var titulo = $("#titulo").val();
    var año_publicacion = $("#año_publicacion").val();
    var tipo_publicacion = $("#id_tipo_publicacion").val();
    var revista = $("#revista").val();
    var autores = $("#autores").val();
    var web = $("#web").val();

    // Se comprueba que se hayan introducido valores.
    if(esta_vacio(titulo) || esta_vacio(año_publicacion) || esta_vacio(tipo_publicacion) || esta_vacio(revista) || esta_vacio(autores) || esta_vacio(web))
        error = "argumentos_vacios";

    else if(!longitud_correcta(autores,2000))
        error = "autores_largo";

    else if(!longitud_correcta(titulo,200))
        error = "titulo_largo";

    else if(!longitud_correcta(revista,200))
        error = "revista_larga";

    else if(!es_cadena(titulo))
        error = "titulo_formato";

    else if(!es_cadena(revista))
        error = "revista_formato";

    else if(!es_cadena(autores))
        error = "autores_formato";

    else if(!es_int(año_publicacion))
        error = "año_formato";

    else if(!longitud_correcta(web, 100))
        error = "web_larga";

    else if(!es_cadena(web))
        error = "web_formato";

    else if (tipo_publicacion != "Artículo" && tipo_publicacion != "Letter" && tipo_publicacion != "Patente" && tipo_publicacion != "Congreso")
        error = "tipo_publicacion_formato";

    if(error != 0)
        mostrar_errores(error);       

    else
    {
        if (tipo_publicacion == "Artículo")
            id_tipo_publicacion = 1;

        if (tipo_publicacion == "Letter")
            id_tipo_publicacion = 2;

        if (tipo_publicacion == "Patente")
            id_tipo_publicacion = 3;

        if (tipo_publicacion == "Congreso")
            id_tipo_publicacion = 4;

        var parametros = 
        {
            "id_resultado":id_resultado,
            "titulo":titulo,
            "año_publicacion":año_publicacion,
            "id_tipo_publicacion":id_tipo_publicacion,
            "revista": revista,
            "autores": autores,
            "web": web,
        }

        if(op === "nuevo")
        {
            $.ajax
            ({
                url:"/Investigador/controlador_crear_resultado.php",
                dataType: "json",
                data: parametros,
                type:"POST", //tipo de peticion
                success:function(response) //se utiliza si el servidor retorna informacion
                {
                    if(response.result == 'ok')
                    {
                        window.location.href = "menu_investigador.php";
                    }
                    else
                    {
                        $("#error").text("Ha habido un problema.");
                    }
                },
                error: function (req, status, err){
                    $("#error").text("Ha ocurrido un error.");
                }
            })

        }else if(op === "actualizar")
        {
            $.ajax
            ({
                url:"/Investigador/controlador_editar_resultado.php",
                dataType: "json",
                data: parametros,
                type:"POST", //tipo de peticion
                success:function(response) //se utiliza si el servidor retorna informacion
                {
                    if(response.result == 'ok')
                    {
                        window.location.href = "menu_investigador.php";
                    }
                    else
                    {
                        console.log(response);
                        $("#error").text("Ha habido un problema.");
                    }
                },
                error: function (req, status, err){
                    $("#error").text("Ha ocurrido un error.");
                }
            })
        }
    }
 }

 function ComprobarLogo(op, id_logo=0)
 {
    var error = 0;
    var titulo = $("#titulo").val();
    var logo_financiacion = $('#img-logo')[0].files;

    // Se comprueba que se hayan introducido valores.
    if(esta_vacio(titulo) )
        error = "argumentos_vacios";

    else if(!longitud_correcta(titulo,100))
        error = "titulo_largo";

    else if(!es_cadena(titulo))
        error = "titulo_formato";

    if(error != 0)
        mostrar_errores(error);       

    else
    {
        var parametros = new FormData();
        parametros.append("id_logo",id_logo);
        parametros.append("titulo",titulo);
        parametros.append("logo_financiacion",logo_financiacion[0]);
        if(op === "nuevo")
        {  
            if(logo_financiacion.length == 0)
            {
                $("#error").text("Debe seleccionar una imagen.");
            }
            else
            {         
            $.ajax
                ({  
                    url:"/Investigador/controlador_crear_logo.php",
                    dataType: "json",
                    contentType: false,
                    processData: false,
                    data: parametros,
                    type:"POST", //tipo de peticion
                    success:function(response) //se utiliza si el servidor retorna informacion
                    {
                        if(response.result == 'ok')
                        {
                            window.location.href = "menu_investigador.php";
                        }
                        else
                        {
                            console.log(response)
                            $("#error").text("Ha habido un problema.");
                        }
                    },
                    error: function (req, status, err){
                        $("#error").text("Ha ocurrido un error.");
                        console.log(err);
                    }
                 })   
                }
        }

        else if(op === "actualizar")
        {
            $.ajax
            ({
                url:"/Investigador/controlador_editar_financiacion.php",
                dataType: "json",
                data: parametros,
                type:"POST", //tipo de peticion
                success:function(response) //se utiliza si el servidor retorna informacion
                {
                    if(response.result == 'ok')
                    {
                        window.location.href = "menu_investigador.php";
                    }
                    else
                    {
                        $("#error").text("Ha habido un problema.");
                    }
                },
                error: function (req, status, err){
                    $("#error").text("Ha ocurrido un error.");
                }
            })
        }
    }
 }



function ComprobarGrupo(op, id_grupo=0)
 {
    var error = 0;
    var titulo_grupo = $("#titulo_grupo").val();
    var logo_grupo = $('#logo_grupo')[0].files;
    var descripcion = $("#descripcion").val();
    var web = $("#web").val();

    // Se comprueba que se hayan introducido valores.
    if(esta_vacio(titulo_grupo) || esta_vacio(descripcion) || esta_vacio(web))
        error = "argumentos_vacios";

    else if(!longitud_correcta(descripcion,2000))
        error = "descripcion_larga";

    else if(!longitud_correcta(titulo_grupo,200))
        error = "titulo_largo";

    else if(!es_cadena(titulo_grupo))
        error = "titulo_formato";

    else if(!es_cadena(descripcion))
        error = "descripcion_formato";

    else if(!longitud_correcta(web, 100))
        error = "web_larga";

    else if(!es_cadena(web))
        error = "web_formato";

    if(error != 0)
        mostrar_errores(error);       

    else
    {
        var parametros = new FormData();
        parametros.append("id_grupo",id_grupo);
        parametros.append("titulo_grupo",titulo_grupo);
        parametros.append("logo_grupo",logo_grupo[0]);
        parametros.append("descripcion", descripcion);
        parametros.append("web", web);

        if(op === "nuevo")
        {   
            if(logo_grupo.length == 0)
            {
                $("#error").text("Debe seleccionar una imagen.");
            }
            else
            {
                $.ajax
                ({  

                    url:"/Investigador/controlador_crear_grupo.php",
                    dataType: "json",
                    
                    contentType: false,
                    processData: false,
                    data: parametros,
                    type:"POST", //tipo de peticion
                    success:function(response) //se utiliza si el servidor retorna informacion
                    {
                        if(response.result == 'ok')
                        {
                            window.location.href = "menu_investigador.php";
                        }
                        else
                        {
                            console.log(response)
                            $("#error").text("Ha habido un problema.");
                        }
                    },
                    error: function (req, status, err){
                        $("#error").text("Ha ocurrido un error.");
                        console.log(err);
                    }
                 })
             }
        }
        else if(op === "actualizar")
        {
            $.ajax
            ({
                url:"/Investigador/controlador_editar_grupo.php",
                dataType: "json",
                contentType: false,
                processData: false,                
                data: parametros,
                type:"POST", //tipo de peticion
                success:function(response) //se utiliza si el servidor retorna informacion
                {
                    if(response.result == 'ok')
                    {
                        window.location.href = "menu_investigador.php";
                    }
                    else
                    {
                        console.log(response)
                        $("#error").text("Ha habido un problema.");
                    }
                },
                error: function (req, status, err){
                    console.log(err);
                    $("#error").text("Ha ocurrido un error.");
                }
            })
        }
    }
 }

function ComprobarProyecto(op, id_proyecto=0)
{
    var error = 0;
    var titulo_pagina = $("#titulo_pagina").val();
    var titulo_proyecto = $("#titulo_proyecto").val();
    var logo = $('#img-logo')[0].files;
    var expediente = $("#expediente").val();
    var inicio = $("#datepicker").val();
    var cif = $("#cif").val();
    var duracion = $("#duracion").val();
    var resumen = $("#resumen").val();
    var objetivos = $("#objetivos").val();
    var descripcion_financiacion = $("#descripcion_financiacion").val();
    var presupuesto = $("#presupuesto").val();
    var logo_menu = $('#img-logo-menu')[0].files;
    var equipo = $('#equipo').val();
    var resultados =$('#resultados').val();
    var investigador = $('#investigador').val();
    var grupos =  $('#grupos').val();
    var logo_fin = $('#logo_financiacion').val();
    array_equipo = [];
    array_resultado = [];
    array_investigador = [];
    array_grupo = [];
    array_logo_fin = [];

    for(var i = 0; i < equipo.length; i++)
    {
        array_equipo.push(parseInt( equipo[i].substring(0,1)));
    }

    for(var i = 0; i < resultados.length; i++)
    {
        array_resultado.push(parseInt( resultados[i].substring(0,1)));
    }

    for(var i = 0; i < investigador.length; i++)
    {
        array_investigador.push(parseInt( investigador[i].substring(0,1)));
    }

    for(var i = 0; i < grupos.length; i++)
    {
        array_grupo.push(parseInt( grupos[i].substring(0,1)));
    }

    for(var i = 0; i < logo_fin.length; i++)
    {
        array_logo_fin.push(parseInt( logo_fin[i].substring(0,1)));
    }

    // Se comprueba que se hayan introducido valores.
    if(esta_vacio(titulo_pagina) || esta_vacio(titulo_proyecto) || esta_vacio(expediente) || esta_vacio(inicio) || esta_vacio(cif) ||
    esta_vacio(duracion) || esta_vacio(resumen) || esta_vacio(objetivos) || esta_vacio(descripcion_financiacion) || esta_vacio(presupuesto))
        error = "argumentos_vacios";

    else if(esta_vacio(array_equipo) || esta_vacio(array_resultado) || esta_vacio(array_investigador) || esta_vacio(array_grupo) || esta_vacio(array_logo_fin))
        error = "select_vacio";

    else if(!longitud_correcta(titulo_pagina,300))
        error = "titulo_pag_largo";

    else if(!longitud_correcta(titulo_proyecto,100))
        error = "titulo_proy_largo";

    else if(!longitud_correcta(expediente,50))
        error = "expediente_largo";

    else if(!longitud_correcta(inicio,20))
        error = "inicio_largo";

    else if(!longitud_correcta(cif,20))
        error = "cif_largo";

    else if(!longitud_correcta(duracion,20))
        error = "duracion_larga";

    else if(!longitud_correcta(resumen,2000))
        error = "resumen_largo";
    
    else if(!longitud_correcta(objetivos,5000))
        error = "objetivos_largo";

    else if(!longitud_correcta(descripcion_financiacion,2000))
        error = "descripcion_financiacion_largo";

    else if(!longitud_correcta(presupuesto,50))
        error = "presupuesto_largo";

    else if(!es_cadena(titulo_pagina))
        error = "titulo_pag_formato";

    else if(!es_cadena(titulo_proyecto))
        error = "titulo_proy_formato";
    
    else if(!es_cadena(expediente))
        error = "expediente_formato";

    else if(!es_cadena(inicio))
        error = "inicio_formato";

    else if(!es_cadena(cif))
        error = "cif_formato";

    else if(!es_cadena(duracion))
        error = "duracion_formato";

    else if(!es_cadena(resumen))
        error = "resumen_formato";

    else if(!es_cadena(objetivos))
        error = "objetivos_formato";
    
    else if(!es_cadena(descripcion_financiacion))
        error = "descripcion_financiacion_formato";

    else if(!es_cadena(presupuesto))
        error = "presupuesto_formato";
    
    if(error != 0)
        mostrar_errores(error);       

    else
    {
        var parametros = new FormData();
        parametros.append("id_proyecto",id_proyecto);
        parametros.append("titulo_pagina",titulo_pagina);
        parametros.append("titulo_proyecto",titulo_proyecto);
        parametros.append("logo", logo[0]);
        parametros.append("expediente",expediente);
        parametros.append("inicio",inicio);
        parametros.append("cif",cif);
        parametros.append("duracion",duracion);
        parametros.append("resumen",resumen);
        parametros.append("objetivos", objetivos);
        parametros.append("descripcion_financiacion",descripcion_financiacion);
        parametros.append("presupuesto", presupuesto);
        parametros.append("logo_menu",logo_menu[0]);
        parametros.append("array_equipo", array_equipo);
        parametros.append("array_resultado", array_resultado);
        parametros.append("array_grupo", array_grupo);
        parametros.append("array_investigador", array_investigador);
        parametros.append("array_años", array_años);
        parametros.append("array_presupuestos", array_presupuestos);
        parametros.append("array_logo_fin", array_logo_fin);


        if(op === "nuevo")
        {
            if(logo_menu.length == 0 || logo.length == 0)
            {
                $("#error").text("Debe seleccionar una imagen.");
            }
            else if(esta_vacio(array_años) || esta_vacio(array_presupuestos))
            {
                error = "no_año_presupuesto";
            }
            else
            {
                $.ajax
                ({
                    url:"/Investigador/controlador_crear_proyecto.php",
                    dataType: "json",
                    contentType: false,
                    processData: false,

                    data: parametros,
                    type:"POST", //tipo de peticion
                    success:function(response) //se utiliza si el servidor retorna informacion
                    {
                        if(response.result == 'ok')
                        {
                            window.location.href = "menu_investigador.php";
                        }
                        else
                        {
                            console.log(response)
                            $("#error").text("Ha habido un problema.");
                        }
                    },
                    error: function (req, status, err){
                        console.log(err);
                        $("#error").text("Ha ocurrido un error del servidor");
                    }
                })
            }
        }
        else if(op === "actualizar"){
            $.ajax
            ({
                url:"/Investigador/controlador_editar_proyecto.php",
                dataType: "json",
                contentType: false,
                processData: false,
                data: parametros,
                type:"POST", //tipo de peticion
                success:function(response) //se utiliza si el servidor retorna informacion
                {
                    if(response.result == 'ok')
                    {
                        window.location.href = "menu_investigador.php";
                    }
                    else
                    {
                        console.log(response);
                        $("#error").text("Ha habido un problema.");
                    }
                },
                error: function (req, status, err){
                    console.log(err);
                    $("#error").text("Ha ocurrido un error.");
                }
            })
        }
    }
}


//Función que verifica si la cadena introsucida es un email
function es_Email(email) 
{
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}

//Función que verifica si se ha introducido un parámetro
function esta_vacio(parametro)
{
    return(parametro == "");
}

//Función que verifica si una cadema tiene una longitud  menor a una determinada
function longitud_correcta(parametro,longitud)
{
    return (parametro.length < longitud);
}

//Función que verifica si el parámetro introducido es una cadena
function es_cadena(parametro)
{
    return(typeof(parametro) === 'string')
}

//Función que verifica si el parámetro introducido es de tipo int
function es_int(parametro)
{
    return(!isNaN(parametro))
}

function contraseña_segura(parametro)
{
    if (parametro.length >= 8)
    {
        var letras_min="abcdefghyjklmnñopqrstuvwxyz";
        var letras_may="ABCDEFGHYJKLMNÑOPQRSTUVWXYZ";
        var numeros = "123456789";
        var tiene_min = false;
        var tiene_may = false;
        var tiene_num = false;
        for(i=0; i<parametro.length; i++)
        {
            if (letras_min.indexOf(parametro.charAt(i),0)!=-1)
            {
                tiene_min = true;;
            }
            if (letras_may.indexOf(parametro.charAt(i),0)!=-1)
            {
                tiene_may = true;
            }
            if (numeros.indexOf(parametro.charAt(i),0)!=-1)
            {
                tiene_num = true;
            }
        }

        return (tiene_min && tiene_may && tiene_num);
    }
    else
    {
        return false;
    }
}

//Función que imprime los errores por pantalla
function mostrar_errores(error)
{
    if(error == "email_vacio")
    $("#error").text("El campo email no puede estar vacío");

    else if(error == "email_no_valido")
        $("#error").text("El email no es válido");

    else if(error == "contraseña_vacia")
        $("#error").text("El campo contraseña no puede estar vacío");

    else if(error == "contraseña_formato")
    $("#error").text("Formato contraseña incorrecto");
    
    else if(error == "argumentos_vacios")
        $("#error").text("Por favor, rellene todos los argumentos.");
        
    else if(error == "nombre_largo")
        $("#error").text("Cadena nombre demasiado larga.");

    else if(error == "apellido_largo")
        $("#error").text("Cadena apellido demasiado larga.");

    else if(error == "titulo_largo")
        $("#error").text("Cadena título demasiado larga.");

    else if(error == "titulacion_larga")
        $("#error").text("Cadena tituación demasiado larga.");

    else if(error == "web_larga")
        $("#error").text("Cadena web demasiado larga.");

    else if(error == "email_largo")
        $("#error").text("Cadena email demasiado larga.");

    else if(error == "descripcion_larga")
        $("#error").text("Cadena descripción demasiado larga.");
    
    else if(error == "nombre_formato")
        $("#error").text("Formato nombre incorrecto.");

    else if(error == "apellido_formato")
        $("#error").text("Formato apellido incorrecto.");

    else if(error == "titulacion_formato")
        $("#error").text("Formato titulación incorrecto.");
    
    else if(error == "titulo_formato")
        $("#error").text("Formato titulo incorrecto.");

    else if(error == "web_formato")
        $("#error").text("Formato web incorrecto.");

    else if(error == "descripcion_formato")
        $("#error").text("Formato descripción incorrecto.");

    else if(error == "id_formato")
        $("#error").text("Formato ID incorrecto.");

    else if(error == "titulo_pag_largo")
        $("#error").text("Cadena título página demasiado larga.");

    else if(error == "titulo_proy_largo")
        $("#error").text("Cadena título proyecto demasiado larga.");

    else if(error == "logo_largo")
        $("#error").text("Cadena link logo demasiado larga.");

    else if(error == "expediente_largo")
        $("#error").text("Cadena expediente demasiado larga.");

    else if(error == "inicio_largo")
        $("#error").text("Cadena inicio demasiado larga.");

    else if(error == "cif_largo")
        $("#error").text("Cadena cif demasiado larga.");

    else if(error == "duracion_larga")
        $("#error").text("Cadena duración demasiado larga.");
    
    else if(error == "resumen_largo")
        $("#error").text("Cadena resumen demasiado larga.");

    else if(error == "objetivos_largo")
        $("#error").text("Cadena objetivos demasiado larga.");

    else if(error == "revista_larga")
        $("#error").text("Cadena revista demasiado larga.");
    
    else if(error == "autores_largo")
        $("#error").text("Cadena autores demasiado larga.");

    else if(error == "revista_formato")
        $("#error").text("Formato revista incorrecto.");
    
    else if(error == "autores_formato")
        $("#error").text("Formato autores incorrecto.");

    else if(error == "año_formato")
        $("#error").text("Formato año incorrecto.");
    
    else if(error == "tipo_publicacion_formato")
        $("#error").text("Formato tipo publicación incorrecto.");

    else if(error == "titulo_pag_formato")
        $("#error").text("Formato título página incorrecto.");
    
    else if(error == "titulo_proy_formato")
        $("#error").text("Formato título proyecto incorrecto.");

    else if(error == "logo_formato")
        $("#error").text("Formato logo incorrecto.");

    else if(error == "expediente_formato")
        $("#error").text("Formato expediente incorrecto.");

    else if(error == "inicio_formato")
        $("#error").text("Formato inicio incorrecto.");

    else if(error == "cif_formato")
        $("#error").text("Formato cif incorrecto.");

    else if(error == "duracion_formato")
        $("#error").text("Formato duración incorrecto.");
    
    else if(error == "resumen_formato")
        $("#error").text("Formato resumen incorrecto.");
    
    else if(error == "objetivos_formato")
        $("#error").text("Formato objetivos incorrecto.");


    else if(error == "logo_menu_formato")
        $("#error").text("Formato logo menú incorrecto.");
    
    else if(error == "select_vacio")
        $("#error").text("Debe seleccionar algún elemento.");
    
    else if(error == "descripcion_financiacion_largo")
        $("#error").text("Cadena descripción financiación demasiado larga.");
    
    else if(error == "presupuesto_largo")
        $("#error").text("Cadena presupuesto demasiado larga.");

    else if(error == "descripcion_financiacion_formato")
        $("#error").text("Formato descripción incorrecto.");

    else if(error == "presupuesto_formato")
        $("#error").text("Formato presupuesto incorrecto.");

    else if(error == "id_incorrecto")
        $("#error").text("Valor de ID incorrecto."); 

    else if(error == "no_año_presupuesto")
        $("#error").text("Debe introducir un valor para año y presupuesto");    
    
    else if(error == "contraseña_insegura")
        $("#error").text("Debe introducir una contraseña segura(mínimo 8 caracteres que contenga letra mayúscula, letra minúscula y número."); 

}