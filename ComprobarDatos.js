
function ComprobarLogin() {
    var error = 0;
    var email = $("#email").val();
    var contraseña = $("#contraseña").val();

    if(email=="")
        error=1;
    else if(contraseña=="")
        error=2;

    if(!isEmail(email))
        error=3;
    // COmprobar que los datos estan bien
    

    if(error == 1){
        $("#error").text("El campo email no puede estar vacío");
        //Por favor, rellene todos los campos.
    }else if(error == 2){
        $("#error").text("El campo contraseña no puede estar vacío");
    }else if(error == 3){
        $("#error").text("El email no es valido");
    }
    else{
        var parametros = {
            "email":email,
            "contraseña":contraseña
        }
        $.ajax({
            url:"controlador_login.php",
            dataType: "html",
            data: parametros,
            type:"POST", // la variable type guarda el tipo de la peticion GET,POST,..
            success:function(response){ //success es una funcion que se utiliza si el servidor retorna informacion
                if(response == 'true'){
                    window.location.href = "/Investigador/menu_investigador.php";
                }else{
                    $("#error").text("El usuario o la contraseña no son correctos");
                }
            },
            error: function (req, status, err){
                $("#error").text("Ha ocurrido un error inesperado.");
            }
        })
    }
    //Comprobar 
 }

 function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}