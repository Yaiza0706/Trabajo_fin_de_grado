<head>
		<title> Registro</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <script src="../assets/js/jquery.min.js"></script>
		<script src="../assets/js/browser.min.js"></script>
		<script src="../assets/js/breakpoints.min.js"></script>
		<script src="../assets/js/util.js"></script>
		<script src="../assets/js/main.js"></script>
		<script src="../VerMenus.js"></script>
		<script src="../ComprobarDatos.js"></script>
		<script src="../EditarDatos.js"></script>
		<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

</head>
<section id="ventana_principal">
  <div> ⠀ </div>
  <div> ⠀ </div>
  <section id="form-container">
    <h3> Introduzca los datos del usuario nuevo. </h3>
    <form>
      <div>
        <label for="nombre"> Nombre : <input type="text" name="nombre" id = "nombre" placeholder="Nombre"> </label>
      </div>
      <div>
        <label for="nombre"> Apellidos : <input type="text" name="apellido" id= "apellido" placeholder="Apellidos"> </label>
      </div>
      <div>
        <label for="nombre"> Titulación : <input type="text" name="titulacion" id="titulacion" placeholder="Titulación"> </label>
      </div>
      <div>
        <label for="nombre"> Web : <input type="text" name="web" id ="web" placeholder="Web"> </label>
      </div>
      <div>
        <label for="nombre"> Email : <input type="text" name="email" id ="email" placeholder="Correo electrónico"> </label>
      </div>
      <div>
        <label for="nombre"> Contraseña : <input type="password" name="contraseña" id="contraseña" placeholder="Contraseña"> </label>
      </div>
      <div> ⠀ </div>
      <div class = "error">
        <h5 id="error">⠀</h5>
      </div>
    </form>
    <div>
      <button class="button-form" onclick='ComprobarRegistro("nuevo")'>Crear nuevo usuario</button>
    </div>
  </section>
</section>