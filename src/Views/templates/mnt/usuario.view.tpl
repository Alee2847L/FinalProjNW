<h4>{{mode_dsc}}</h4>
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
      <label for="userest">Correo Usurio</label>
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
        </section>
      <section>
      <label for="userfching">userfching</label>
      <input type="date" name="userfching" value="{{userfching}}" maxlength="45" placeholder="userfching"/>
    </section>
       <section>
      <label for="userpswdest">userpswdest</label>
      <input type="text" name="userpswdest" value="{{userpswdest}}" maxlength="45" placeholder="userpswdest"/>
    </section>
      <section>
      <label for="userpswdexp">userpswdexp</label>
      <input type="date" name="userpswdexp" value="{{userpswdexp}}" maxlength="45" placeholder="userpswdexp"/>
    </section>
      <section>
      <label for="useractcod">useractcod</label>
      <input type="text" name="useractcod" value="{{useractcod}}" maxlength="45" placeholder="useractcod"/>
    </section>
      <section>
      <label for="userpswdchg">userpswdchg</label>
      <input type="date" name="userpswdchg" value="{{userpswdchg}}" maxlength="45" placeholder="userpswdchg"/>
    </section>
      <section>
      <label for="usertipo">usertipo</label>
      <input type="text" name="usertipo" value="{{usertipo}}" maxlength="45" placeholder="usertipo"/>
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