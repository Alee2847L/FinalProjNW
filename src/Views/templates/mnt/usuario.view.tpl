<h1>{{mode_dsc}}</h1>
<section>
  <form action="index.php?page=mnt_usuario&mode={{mode}}&usercod={{usercod}}"
    method="POST" >
    <section>
    <label for="usercod">Código Usuarios</label>
    <input type="hidden" id="usercod" name="usercod" value="{{usercod}}"/>
    <input type="text" readonly name="usercoddummy" value="{{usercod}}"/>
    </section>
    <section>
      <label for="username">Descripcion Usuarios</label>
      <input type="text" {{readonly}} name="username" value="{{username}}" maxlength="45" placeholder="Descripcion Usuarios"/>
    </section>
    <section>
      <label for="userest">Estado</label>
      <select id="userest" name="userest" {{if readonly}}disabled{{endif readonly}}>
        <option value="ACT" {{userest_ACT}}>Activo</option>
        <option value="INA" {{userest_INA}}>Inactivo</option>
        <option value="PLN" {{userest_PLN}}>Planificación</option>
        </section>
       <section>
       <label for="useremail">Correo Usurio</label>
      <input type="email" name="useremail" value="{{useremail}}" maxlength="45" placeholder="email Usuario"/>
    </section>
        <section>
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
        window.location.assign("index.php?page=mnt_usuarios");
      });
  });
</script>