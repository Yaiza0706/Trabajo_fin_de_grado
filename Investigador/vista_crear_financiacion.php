<section class="main-page">
  <div> ⠀ </div>
  <div> ⠀ </div>
  <section id="form-container">
    <h3> Introduzca los datos de la financiación nueva. </h3>
    <form>
      <div>
        <label for="descripcion"> Descripción : <input type="text" name="descripcion" id = "descripcion" placeholder="Descripción"> </label>
      </div>
      <div>
        <label for="presupuesto_total"> Presupuesto total : <input type="text" name="presupuesto_total" id = "presupuesto_total" placeholder="Presupuesto total"> </label>
      </div>
      <div>
        <label for="id_proyecto"> ID proyecto : <input type="text" name="id_proyecto" id = "id_proyecto" placeholder="ID proyecto a asociar"> </label>
      </div>
      <div> ⠀ </div>
      <div class = "error">
        <h5 id="error">⠀</h5>
      </div>
    </form>
    <div>
      <button class="button-form" onclick='ComprobarFinanciacion("nuevo")'> Crear nueva financiación</button>
    </div>
  </section>
</section>