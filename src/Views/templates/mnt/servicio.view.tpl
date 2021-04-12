<h1>{{mode_dsc}}</h1>
<section>
    <form action="index.php?page=mnt_servicio&mode={{mode}}&idServicio={{idServicio}}" method="POST">
        <section>
            <label for="idServicio">Id Servicio</label>
            <input type="text" {{readonly}} name="idServicio" value="{{idServicio}}" maxlength="45" placeholder="id de Servicio" />
        </section>
        
        <section>
            <label for="usuarios_idUsuario">Id solicitante</label>
            <input type="text" {{readonly}} name="usuarios_idUsuario" value="{{usuarios_idUsuario}}" maxlength="45" placeholder="Id solicitante" />
        </section>
        <section>
            <label for="dispositivos_idDispositivo">Id dispositivo</label>
            <input type="text" {{readonly}} name="dispositivos_idDispositivo" value="{{dispositivos_idDispositivo}}" maxlength="45" placeholder="Id dispositivo" />
        </section>
        <section>
            <label for="nombreServicio">Nombre Servicio</label>
            <input type="text" {{readonly}} name="nombreServicio" value="{{nombreServicio}}" maxlength="45" placeholder="nombre de Servicio" />
        </section>
        <section>
            <label for="tipoServicio">Tipo Servicio</label>
            <input type="text" {{readonly}} name="tipoServicio" value="{{tipoServicio}}" maxlength="45" placeholder="Tipo Servicio" />
        </section>
        <section>
            <label for="descripcionServicio">Descrpcion Servicio</label>
            <input type="text" {{readonly}} name="descripcionServicio" value="{{descripcionServicio}}" maxlength="45" placeholder="Descrpcion Servicio" />
        </section>
        <section>
            <label for="precioServicio">Precio Servicio</label>
            <input type="text" {{readonly}} name="precioServicio" value="{{precioServicio}}" maxlength="45" placeholder="Precio Servicio" />
        </section>
        <section>
            <label for="ciudades_idCiudad">Ciudad de solicitud</label>
            <input type="text" {{readonly}} name="ciudades_idCiudad" value="{{ciudades_idCiudad}}" maxlength="45" placeholder="Ciudad de solicitud" />
        </section>
         </div>
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
            <button type="submit" name="btnGuardar" value="G">Guardar</button> {{endif showaction}}
            <button type="button" id="btnCancelar">Cancelar</button>
        </section>
    </form>
</section>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("btnCancelar").addEventListener("click", function(e) {
            e.preventDefault();
            e.stopPropagation();
            window.location.assign("index.php?page=mnt_servicios");
        });
    });
</script>