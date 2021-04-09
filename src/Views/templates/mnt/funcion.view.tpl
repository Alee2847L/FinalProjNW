<h1>{{mode_dsc}}</h1>
<section>
  <form action="index.php?page=mnt_funcion&mode={{mode}}&fncod={{fncod}}"
    method="POST" >
    <section>
    <label for="fncod">Código</label>
    <input type="hidden" id="fncod" name="fncod" value="{{fncod}}"/>
    <input type="text" readonly name="fncoddummy" value="{{fncod}}"/>
    </section>
    <section>
      <label for="fndsc">Funcion Descrripcion</label>
      <input type="text" {{readonly}} name="fndsc" value="{{fndsc}}" maxlength="45" placeholder="Funcion Descrripcion"/>
    </section>
    <section>
      <label for="fnest">Estado</label>
      <select id="fnest" name="fnest" {{if readonly}}disabled{{endif readonly}}>
        <option value="ACT" {{fnest_ACT}}>Activo</option>
        <option value="INA" {{fnest_INA}}>Inactivo</option>
        <option value="PLN" {{fnest_PLN}}>Planificación</option>
      </select>
      <section>
      <label for="fntyp">Funcion Tipo</label>
      <input type="text" {{readonly}} name="fntyp" value="{{fntyp}}" maxlength="45" placeholder="Funcion Tipo"/>
    </section>
    <section>
    </section>
    {{if hasErrors}}
        <section>
          <ul>
            {{foreach aErrors}}
                <li>{{this}}</li>
            {{endfor aErrors}}
          </ul>
        </section>
    {{endif hasErrors}}
    <section>
      {{if showaction}}
      <button type="submit" name="btnGuardar" value="G">Guardar</button>
      {{endif showaction}}
      <button type="button" id="btnCancelar">Cancelar</button>
    </section>
  </form>
</section>


<script>
  document.addEventListener("DOMContentLoaded", function(){
      document.getElementById("btnCancelar").addEventListener("click", function(e){
        e.preventDefault();
        e.stopPropagation();
        window.location.assign("index.php?page=mnt_funciones");
      });
  });
</script>