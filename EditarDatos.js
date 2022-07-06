function EditarProyecto(id)
{
    let url = "../Investigador/vista_editar_proyecto.php?id=" + id;
    $.ajax
    ({
        url:url,
        dataType: "html",
        type:"GET", //tipo de peticion
        success:function(response) //se utiliza si el servidor retorna informacion
        {
            window.scrollTo(0,0);
            $("#ventana_principal").html(response);
            $(document).attr("title", "Editar Proyecto"); 
        },
        error: function (req, status, err){
            $("#error").text("Ha ocurrido un error.");
        }
    })
}

function EditarResultado(id)
{
    let url = "../Investigador/vista_editar_resultado.php?id=" + id;
    $.ajax
    ({
        url:url,
        dataType: "html",
        type:"GET", //tipo de peticion
        success:function(response) //se utiliza si el servidor retorna informacion
        {
            window.scrollTo(0,0);
            $("#ventana_principal").html(response);
            $(document).attr("title", "Editar Resultado"); 
        },
        error: function (req, status, err){
            $("#error").text("Ha ocurrido un error.");
        }
    })
}

function EditarGrupo(id)
{
    let url = "../Investigador/vista_editar_grupo.php?id=" + id;
    $.ajax
    ({
        url:url,
        dataType: "html",
        type:"GET", //tipo de peticion
        success:function(response) //se utiliza si el servidor retorna informacion
        {
            window.scrollTo(0,0);
            $("#ventana_principal").html(response);
            $(document).attr("title", "Editar Grupo"); 
        },
        error: function (req, status, err){
            $("#error").text("Ha ocurrido un error.");
        }
    })
}

function EditarEquipo(id)
{
    let url = "../Investigador/vista_editar_equipo.php?id=" + id;
    $.ajax
    ({
        url:url,
        dataType: "html",
        type:"GET", //tipo de peticion
        success:function(response) //se utiliza si el servidor retorna informacion
        {
            window.scrollTo(0,0);
            $("#ventana_principal").html(response);
            $(document).attr("title", "Editar Usuario"); 
        },
        error: function (req, status, err){
            $("#error").text("Ha ocurrido un error.");
        }
    })
}

function EditarEstadoUsuario(id)
{
    let url = "../Investigador/vista_editar_estado_usuario.php?id=" + id;
    $.ajax
    ({
        url:url,
        dataType: "html",
        type:"GET", //tipo de peticion
        contentType: "text/plain",
        success:function(response) //se utiliza si el servidor retorna informacion
        {
            window.scrollTo(0,0);
            $("#ventana_principal").html(response);
            $(document).attr("title", "Editar Estado Usuario"); 
        },
        error: function (req, status, err){
            $("#error").text("Ha ocurrido un error.");
        }
    })
}