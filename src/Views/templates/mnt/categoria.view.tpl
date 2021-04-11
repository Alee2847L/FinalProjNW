<h1>{{mode_dsc}}</h1>
<section>
    <form action="index.php?page=mnt_categoria&mode={{mode}}&idCategoria={{idCategoria}}" method="POST">
        <section>
            <label for="idCategoria">Id Categoria</label>
            <input type="text" {{readonly}} name="idCategoria" value="{{idCategoria}}" maxlength="45" placeholder="id de Categoría" />
        </section>
        
        <section>
            <label for="nombreCategoria">Nombre Categoria</label>
            <input type="text" {{readonly}} name="nombreCategoria" value="{{nombreCategoria}}" maxlength="45" placeholder="nombre de Categoría" />
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
            window.location.assign("index.php?page=mnt_categorias");
        });
    });
</script>