<h1>{{mode_dsc}}</h1>
<section>
    <form action="index.php?page=mnt_dispositivo&mode={{mode}}&idDispositivo={{idDispositivo}}" method="POST">

        <section>
            <label for="idDispositivo">idDispositivo</label>
            <input type="text" {{readonly}} name="idDispositivo" value="{{idDispositivo}}" maxlength="45" placeholder="idDispositivo" />
        </section>
        <section>
            <label for="nombre">nombre</label>
            <input type="text" {{readonly}} name="nombre" value="{{nombre}}" maxlength="45" placeholder="nombre" />
        </section>
        <section>
            <label for="marca">marca</label>
            <input type="text" {{readonly}} name="marca" value="{{marca}}" maxlength="45" placeholder="marca" />
        </section>
        <section>
            <label for="serie">serie</label>
            <input type="text" {{readonly}} name="serie" value="{{serie}}" maxlength="45" placeholder="numero de serie" />
        </section>
         <section>
            <label for="categorias_idCategoria">categorias_idCategoria</label>
            <input type="text" {{readonly}} name="categorias_idCategoria" value="{{categorias_idCategoria}}" maxlength="45" placeholder="numero de serie" />
        </section>
        <section>
            <label for="precioUnitario">precioUnitario</label>
            <input type="text" {{readonly}} name="precioUnitario" value="{{precioUnitario}}" maxlength="45" placeholder="Precio por unidad" />
        </section>
        <section>
            <label for="stock">stock</label>
            <input type="text" {{readonly}} name="stock" value="{{stock}}" maxlength="45" placeholder="Cantidad Disponible" />
        </section>
        <section>
            <label for="urldip">Url imagen dispositivo</label>
            <input type="text" {{readonly}} name="urldip" value="img\{{urldip}}.png" maxlength="45" placeholder="Coloque elnombre de la imagen" />
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
            window.location.assign("index.php?page=mnt_dispositivos");
        });
    });
</script>