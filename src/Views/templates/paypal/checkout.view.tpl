<form action="index.php?page=checkout_checkout&mode={{mode}}&idDispositivo={{idDispositivo}}" method="post">
<section>
            <label for="usercodp">id cliente</label>
            <input type="text" {{readonly}} name="nombre" value="{{with login}}{{userName}}{{endwith login}}" maxlength="45" placeholder="nombre" />
        </section>
        <section>
            <label for="idDispositivo">Id Dispositivo</label>
            <input type="text" {{readonly}} name="idDispositivo" value="{{idDispositivo}}" maxlength="45" placeholder="Id Dispositivo" />
        </section>
        <section>
            <label for="idServicio">Servicio</label>
            <input type="text" {{readonly}} name="idServicio" value="{{idServicio}}" maxlength="45" placeholder="idServicio" />
        </section>
         <section>
            <label for="precio">Precio</label>
            <input type="text" {{readonly}} name="precio" value="{{precio}}" maxlength="45" placeholder="precio" />
        </section>
        <section>
            <label for="isv">isv</label>
            <input type="text" {{readonly}} name="isv" value="0.15" maxlength="45" placeholder="isv por unidad" />
        </section>
        <section>
            <label for="total">total</label>
            <input type="text" {{readonly}} name="total" value="{{total}}" maxlength="45" placeholder="total" />
        </section>
        <section>
            <label for="fechaFact">fecha factura</label>
            <input type="date" name="fechaFact" value="{{fechaFact}}" maxlength="45" placeholder="fechaFact"/>
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
            {{if showaction}} {{endif showaction}}
            
            <button type="submit" name="btnGuardar" value="G">Pagar ahora</button>
            <button type="button" id="btnCancelar">Cancelar</button>
        </section>
</form>