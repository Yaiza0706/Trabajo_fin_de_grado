<?php session_start();
if (isset ($_SESSION['valido'])) { ?>
<section class="main-page">
  <div> ⠀ </div>
  <div> ⠀ </div>
  <section id="form-container">
    <h3> Introduzca los datos del logo nuevo. </h3>
    <form>
      <div>
        <label for="titulo"> Título : <input type="text" name="titulo" id = "titulo" placeholder="Título"> </label>
      </div>
      <div>
        <label for="logo_financiacion"> Logo financiación: </label>
        <input type="file" id="img-logo" name="img" accept="image/*">
      </div>
        <h7> ⠀ </h7>
      <div> ⠀ </div>
      <div class = "error">
        <h5 id="error">⠀</h5>
      </div>
    </form>
    <div>
      <button class="button-form" onclick='ComprobarLogo("nuevo")'> Añadir nuevo logo</button>
    </div>
  </section>
</section>
<?php } else{
    header("HTTP/1.1 401 Unauthorized");
    exit;
    } ?> 