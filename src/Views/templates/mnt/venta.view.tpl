<h1>{{mode_dsc}}</h1>
<section>
    <form action="index.php?page=mnt_venta&mode={{mode}}&idventas={{idventas}}" method="POST">
        <section>
            <label for="idventas">Id Ventas</label>
            <input type="text" {{readonly}} name="idventas" value="{{idventas}}" maxlength="45" placeholder="Id Ventas" />
        </section>
        
        <section>
            <label for="usercod">Codigo Usuario</label>
            <input type="text" {{readonly}} name="usercod" value="{{usercod}}" maxlength="45" placeholder="Codigo Usuario" />
        </section>
        <section>
            <label for="idDispositivo">Codigo Dispositivo</label>
            <input type="text" {{readonly}} name="idDispositivo" value="{{idDispositivo}}" maxlength="45" placeholder="Codigo Dispositivo" />
        </section>
        <section>
            <label for="idServicio">Codigo Servicio</label>
            <input type="text" {{readonly}} name="idServicio" value="{{idServicio}}" maxlength="45" placeholder="Codigo Servicio" />
        </section>
        <section>
            <label for="precio">Costo</label>
            <input type="text" {{readonly}} name="precio" value="{{precio}}" maxlength="45" placeholder="Costo" />
        </section>
        <section>
            <label for="isv">ISV</label>
            <input type="text" {{readonly}} name="isv" value="{{isv}}" maxlength="45" placeholder="ISV" />
        </section>
        <section>
            <label for="total">Total a pagar</label>
            <input type="text" {{readonly}} name="total" value="{{total}}" maxlength="45" placeholder="Total a pagar" />
        </section>
        <section>
            <label for="fechaFact">Fecha Facturacion</label>
            <input type="hidden" id="fechaFact" name="fechaFact" value="{{fechaFact}}" />
            <input type="text" readonly name="fechaFactdummy" value="{{fechaFact}}" />
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
            window.location.assign("index.php?page=mnt_ventas");
        });
    });
</script>