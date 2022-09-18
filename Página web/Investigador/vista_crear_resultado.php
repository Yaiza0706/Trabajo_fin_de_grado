<?php session_start();
if (isset ($_SESSION['valido'])) { ?>
<section class="main-page">
  <div> ⠀ </div>
  <div> ⠀ </div>
  <section id="form-container">
      <h3> Introduzca los datos del resultado nuevo. </h3>
      <form>
        <div>
         <label for="titulo"> Título resultado: <input type="text" id="titulo" placeholder="Título resultado"> </label>
        </div>
          <div>
          <label for="anyo_publicacion"> Año publicacion: <input type="text" id="anyo_publicacion" placeholder="Año publicación"> </label>
        </div>
        <div>
        <label for="id_tipo_publicacion"> Tipo publicación (Artículo / Letter / Patente / Congreso): <input type="text" id="id_tipo_publicacion" placeholder="ID tipo publicación">  </label>
        </div>
        <div>
        <label for="revista"> Revista: <input type="text" id="revista" placeholder="Revista"> </label>
        </div>
        <div>
        <label for="autores"> Autores: <input type="text" id="autores" placeholder="Autores">  </label>
        </div>
        <div>
        <label for="web"> Página web: <input type="text" id="web" placeholder="Web">  </label>
        </div>
        <div> ⠀ </div>
        <div class = "error">
          <h5 id="error">⠀</h5>
        </div>
      </form>
      <div>
          <button class="button-form"  onclick='ComprobarResultado("nuevo")'>Crear nuevo resultado</button>
        </div>
  </section>
</section>
<?php } else{
    header("HTTP/1.1 401 Unauthorized");
    exit;
    } ?> 