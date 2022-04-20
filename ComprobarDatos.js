function ComprobarLogin() 
{
    var error = 0;
    var email = $("#email").val();
    var contraseña = $("#contraseña").val();

    // Se comprueba que se hayan introducido valores.
    if(esta_vacio(email))
        error = "email_vacio";

    else if(esta_vacio(contraseña))
        error = "contraseña_vacia";

    //Se comprueba que el email sea un email
    else if(!es_Email(email))
        error = "email_no_valido";

    if(error != 0)
        mostrar_errores(error);        
    else
    {
        var parametros = 
        {
            "email":email,
            "contraseña":contraseña
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
                else
                {
                    $("#error").text("El usuario o la contraseña no son correctos");
                }
            },
            error: function (req, status, err){
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
    if(esta_vacio(nombre) || esta_vacio(apellido) || esta_vacio(titulacion) || esta_vacio(web) || esta_vacio(email))
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
                },
                error: function (req, status, err){
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


 function ComprobarResultado(op, id_resultado=0)
 {
    var error = 0;
    var id_tipo_publicacion;
    var titulo = $("#titulo").val();
    var año_publicacion = $("#año_publicacion").val();
    var tipo_publicacion = $("#id_tipo_publicacion").val();
    var revista = $("#revista").val();
    var autores = $("#autores").val();

    // Se comprueba que se hayan introducido valores.
    if(esta_vacio(titulo) || esta_vacio(año_publicacion) || esta_vacio(tipo_publicacion) || esta_vacio(revista) || esta_vacio(autores))
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

    else if (tipo_publicacion != "Artículo" && tipo_publicacion != "Letter")
        error = "tipo_publicacion_formato";

    if(error != 0)
        mostrar_errores(error);       

    else
    {
        if (tipo_publicacion == "Artículo")
            id_tipo_publicacion = 1;

        if (tipo_publicacion == "Letter")
            id_tipo_publicacion = 2;

        var parametros = 
        {
            "id_resultado":id_resultado,
            "titulo":titulo,
            "año_publicacion":año_publicacion,
            "id_tipo_publicacion":id_tipo_publicacion,
            "revista": revista,
            "autores": autores,
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

 function ComprobarFinanciacion(op, id_financiacion=0)
 {
    var error = 0;
    var descripcion = $("#descripcion").val();
    var presupuesto_total = $("#presupuesto_total").val();
    var id_proyecto = $("#id_proyecto").val();

    // Se comprueba que se hayan introducido valores.
    if(esta_vacio(descripcion) || esta_vacio(presupuesto_total) || esta_vacio(id_proyecto))
        error = "argumentos_vacios";

    else if(!longitud_correcta(descripcion,2000))
        error = "descripcion_larga";

    else if(!longitud_correcta(presupuesto_total,50))
        error = "presupuesto_largo";

    else if(!es_cadena(descripcion))
        error = "descripcion_formato";

    else if(!es_cadena(presupuesto_total))
        error = "presupuesto_formato";

    else if(!es_int(id_proyecto))
        error = "id_formato"

    if(error != 0)
        mostrar_errores(error);       

    else
    {
        var parametros = 
        {
            "id_financiacion":id_financiacion,
            "descripcion":descripcion,
            "presupuesto_total":presupuesto_total,
            "id_proyecto":id_proyecto
        }

        if(op === "nuevo")
        {
            $.ajax
            ({
                url:"/Investigador/controlador_crear_financiacion.php",
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
    var logo_grupo = $("#logo_grupo").val();
    var descripcion = $("#descripcion").val();

    // Se comprueba que se hayan introducido valores.
    if(esta_vacio(titulo_grupo) || esta_vacio(logo_grupo) || esta_vacio(descripcion))
        error = "argumentos_vacios";

    else if(!longitud_correcta(descripcion,2000))
        error = "descripcion_larga";

    else if(!longitud_correcta(titulo_grupo,200))
        error = "titulo_largo";

    else if(!es_cadena(titulo_grupo))
        error = "descripcion_formato";

    else if(!es_cadena(descripcion))
        error = "presupuesto_formato";

    if(error != 0)
        mostrar_errores(error);       

    else
    {
        var parametros = 
        {
            "id_grupo":id_grupo,
            "titulo_grupo":titulo_grupo,
            "logo_grupo":logo_grupo,
            "descripcion":descripcion
        }

        if(op === "nuevo")
        {
            $.ajax
            ({
                url:"/Investigador/controlador_crear_grupo.php",
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
                url:"/Investigador/controlador_editar_grupo.php",
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

function ComprobarProyecto(op, id_proyecto=0)
{
    var error = 0;
    var titulo_pagina = $("#titulo_pagina").val();
    var titulo_proyecto = $("#titulo_proyecto").val();
    var logo = $("#logo").val();
    var expediente = $("#expediente").val();
    var inicio = $("#datepicker").val();
    var cif = $("#cif").val();
    var duracion = $("#duracion").val();
    var resumen = $("#resumen").val();
    var logo_menu = $("#logo_menu").val();


    // Se comprueba que se hayan introducido valores.
    if(esta_vacio(titulo_pagina) || esta_vacio(titulo_proyecto) || esta_vacio(logo) || esta_vacio(expediente) || esta_vacio(inicio) || esta_vacio(cif) || esta_vacio(duracion) || esta_vacio(resumen) || esta_vacio(logo_menu))
        error = "argumentos_vacios";

    else if(!longitud_correcta(titulo_pagina,300))
        error = "titulo_pag_largo";

    else if(!longitud_correcta(titulo_proyecto,100))
        error = "titulo_proy_largo";

    // COMPROBAR SI HAY IMAGEN logo

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

    // COMPROBAR SI HAY IMAGEN logo menu

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

    if(error != 0)
        mostrar_errores(error);       

    else
    {
        var parametros = 
        {
            "id_proyecto":id_proyecto,
            "titulo_pagina":titulo_pagina,
            "titulo_proyecto":titulo_proyecto,
            "logo":logo,
            "expediente":expediente,
            "inicio":inicio,
            "cif":cif,
            "duracion":duracion,
            "resumen":resumen,
            "logo_menu":logo_menu
        }

        if(op === "nuevo")
        {
            $.ajax
            ({
                url:"/Investigador/controlador_crear_proyecto.php",
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
        }else if(op === "actualizar"){
            $.ajax
            ({
                url:"/Investigador/controlador_editar_proyecto.php",
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

//Función que imprime los errores por pantalla
function mostrar_errores(error)
{
    if(error == "email_vacio")
    $("#error").text("El campo email no puede estar vacío");

    else if(error == "email_no_valido")
        $("#error").text("El email no es válido");

    else if(error == "contraseña_vacia")
        $("#error").text("El campo contraseña no puede estar vacío");

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

    else if(error == "presupuesto_largo")
        $("#error").text("Cadena presupuesto demasiado larga.");
    
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

    else if(error == "presupuesto_formato")
        $("#error").text("Formato presupuesto incorrecto.");

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

    else if(error == "logo_menu_formato")
        $("#error").text("Formato logo menú incorrecto.");

}