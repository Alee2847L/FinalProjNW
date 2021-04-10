<h1>{{mode_dsc}}</h1>
<section>
    <form action="index.php?page=mnt_proveedor&mode={{mode}}&idProveedor={{idProveedor}}" method="POST">
        <section>
            <label for="idProveedor">Id proveedor</label>
            <input type="text" {{readonly}} name="idProveedor" value="{{idProveedor}}" maxlength="45" placeholder="id de proveedor" />
        </section>
        
        <section>
            <label for="nombreProveedor">Nombre proveedor</label>
            <input type="text" {{readonly}} name="nombreProveedor" value="{{nombreProveedor}}" maxlength="45" placeholder="nombre de proveedor" />
        </section>
        <section>
            <label for="correoProveedor">Correo proveedor</label>
            <input type="text" {{readonly}} name="correoProveedor" value="{{correoProveedor}}" maxlength="45" placeholder="Correo de proveedor" />
        </section>
        <section>
            <label for="numeroProveedor">Número proveedor</label>
            <input type="text" {{readonly}} name="numeroProveedor" value="{{numeroProveedor}}" maxlength="45" placeholder="nombre de proveedor" />
        </section>
        <section>
            <label for="direccionProveedor">Direccion proveedor</label>
            <input type="text" {{readonly}} name="direccionProveedor" value="{{direccionProveedor}}" maxlength="45" placeholder="direccion de proveedor" />
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
            window.location.assign("index.php?page=mnt_proveedores");
        });
    });
</script>