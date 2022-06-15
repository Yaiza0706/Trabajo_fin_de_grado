<section class="main-page">
  <div> ⠀ </div>
  <div> ⠀ </div>
  <section id="form-container">
    <h3> Introduzca los datos del grupo nuevo. </h3>
    <form >
      <div>
        <label for="titulo_grupo"> Título grupo : <input type="text" name="titulo_grupo" id = "titulo_grupo"placeholder="Título grupo"> </label>
      </div>

      <div>
        <label for="logo_grupo"> Logo grupo: </label>
        <input type="file" id="logo_grupo" name="logo_grupo" accept="image/*">
      </div>
        <h7> ⠀ </h7>

      <div>
        <label for="descripcion"> Descripción: <input type="text" name="descripcion" id = "descripcion" placeholder="Descripción"> </label>
      </div>

      <div>
        <label for="web"> Página web: <input type="text" name="web" id = "web" placeholder="Web"> </label>
      </div>

      
      <div> ⠀ </div>
      <div class = "error">
        <h5 id="error">⠀</h5>
      </div>
    </form>
    <div>
       <button class="button-form" onclick='ComprobarGrupo("nuevo")'>Crear nuevo grupo </button>
    </div>
  </section>
</section>