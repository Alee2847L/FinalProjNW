<h1>{{mode_dsc}}</h1>
<section>
  <form action="index.php?page=mnt_role&mode={{mode}}&rolescod={{rolescod}}"
    method="POST" >
    <section>
    <label for="rolescod">Código</label>
    <input type="hidden" id="rolescod" name="rolescod" value="{{rolescod}}"/>
    <input type="text" readonly name="rolescoddummy" value="{{rolescod}}"/>
    </section>
    <section>
      <label for="rolesdsc">Descripcion rol</label>
      <input type="text" {{readonly}} name="rolesdsc" value="{{rolesdsc}}" maxlength="45" placeholder="Descripcion rol"/>
    </section>
    <section>
      <label for="rolesest">Estado</label>
      <select id="rolesest" name="rolesest" {{if readonly}}disabled{{endif readonly}}>
        <option value="ACT" {{rolesest_ACT}}>Activo</option>
        <option value="INA" {{rolesest_INA}}>Inactivo</option>
        <option value="PLN" {{rolesest_PLN}}>Planificación</option>
      </select>
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
        window.location.assign("index.php?page=mnt_roles");
      });
  });
</script>