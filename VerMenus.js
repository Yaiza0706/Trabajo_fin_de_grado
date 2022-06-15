function VerProyecto()
{
    $.ajax
    ({
        url:"../Investigador/vista_crear_proyecto.php",
        dataType: "html",
        type:"GET", //tipo de peticion
        success:function(response) //se utiliza si el servidor retorna informacion
        {
            $("#ventana_principal").html(response);
            $(document).attr("title", "Crear Proyecto"); 
        },
        error: function (req, status, err){
            $("#error").text("Ha ocurrido un error.");
        }
    })
}

function VerGrupo()
{
    $.ajax
    ({
        url:"../Investigador/vista_crear_grupo.php",
        dataType: "html",
        type:"GET", //tipo de peticion
        success:function(response) //se utiliza si el servidor retorna informacion
        {
            $("#ventana_principal").html(response);
            $(document).attr("title", "Crear grupo"); 
        },
        error: function (req, status, err){
            $("#error").text("Ha ocurrido un error.");
        }
    })
}

function VerFinanciacion()
{
    $.ajax
    ({
        url:"../Investigador/vista_crear_financiacion.php",
        dataType: "html",
        type:"GET", //tipo de peticion
        success:function(response) //se utiliza si el servidor retorna informacion
        {
            $("#ventana_principal").html(response);
            $(document).attr("title", "Crear financiación"); 
        },
        error: function (req, status, err){
            $("#error").text("Ha ocurrido un error.");
        }
    })
}

function VerResultado()
{
    $.ajax
    ({
        url:"../Investigador/vista_crear_resultado.php",
        dataType: "html",
        type:"GET", //tipo de peticion
        success:function(response) //se utiliza si el servidor retorna informacion
        {
            $("#ventana_principal").html(response);
            $(document).attr("title", "Crear resultado"); 
        },
        error: function (req, status, err){
            $("#error").text("Ha ocurrido un error.");
        }
    })
}

function ModificarProyecto()
{
    $.ajax
    ({
        url:"../Investigador/vista_modificar_proyecto.php",
        dataType: "html",
        type:"GET", //tipo de peticion
        success:function(response) //se utiliza si el servidor retorna informacion
        {
            $("#ventana_principal").html(response);
            $(document).attr("title", "Modificar Proyecto"); 
        },
        error: function (req, status, err){
            $("#error").text("Ha ocurrido un error.");
        }
    })
}

function ModificarGrupo()
{
    $.ajax
    ({
        url:"../Investigador/vista_modificar_grupo.php",
        dataType: "html",
        type:"GET", //tipo de peticion
        success:function(response) //se utiliza si el servidor retorna informacion
        {
            $("#ventana_principal").html(response);
            $(document).attr("title", "Modificar GRupo"); 
        },
        error: function (req, status, err){
            $("#error").text("Ha ocurrido un error.");
        }
    })
}

function ModificarResultado()
{
    $.ajax
    ({
        url:"../Investigador/vista_modificar_resultado.php",
        dataType: "html",
        type:"GET", //tipo de peticion
        success:function(response) //se utiliza si el servidor retorna informacion
        {
            $("#ventana_principal").html(response);
            $(document).attr("title", "Modificar Resultado"); 
        },
        error: function (req, status, err){
            $("#error").text("Ha ocurrido un error.");
        }
    })
}

function ModificarFinanciacion()
{
    $.ajax
    ({
        url:"../Investigador/vista_modificar_financiacion.php",
        dataType: "html",
        type:"GET", //tipo de peticion
        success:function(response) //se utiliza si el servidor retorna informacion
        {
            $("#ventana_principal").html(response);
            $(document).attr("title", "Modificar Financiación"); 
        },
        error: function (req, status, err){
            $("#error").text("Ha ocurrido un error.");
        }
    })
}

function ModificarEquipo()
{
    $.ajax
    ({
        url:"../Investigador/vista_modificar_equipo.php",
        dataType: "html",
        type:"GET", //tipo de peticion
        success:function(response) //se utiliza si el servidor retorna informacion
        {
            $("#ventana_principal").html(response);
            $(document).attr("title", "Modificar Equipo"); 
        },
        error: function (req, status, err){
            $("#error").text("Ha ocurrido un error.");
        }
    })
}

function ModificarEstadoUsuario()
{
    $.ajax
    ({
        url:"../Investigador/vista_modificar_estado_usuario.php",
        dataType: "html",
        type:"GET", //tipo de peticion
        success:function(response) //se utiliza si el servidor retorna informacion
        {
            $("#ventana_principal").html(response);
            $(document).attr("title", "Modificar Estado Usuario"); 
        },
        error: function (req, status, err){
            $("#error").text("Ha ocurrido un error.");
        }
    })
}