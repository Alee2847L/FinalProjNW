<section class="WWFilter">
</section>
<section class="WWList">
  <table>
    <thead>
    <h1>Gestión de Ventas</h1>
      <tr>
        <th>Código</th>
        <th>codigo usuario</th>
        <th>Codigo dispositivo</th>
        <th>Codigo Servicio</th>
        <th>Precio</th>
        <th>ISV</th>
        <th>total</th>
        <th>Fecha Factura</th>
          {{if new_enabled}}
            <button id="btnAdd">Nuevo</button>
          {{endif new_enabled}}
      </tr>
    </thead>
    <tbody>
      {{foreach items}}
      <tr>
        <td>{{idventas}}</td>
        <td><a href="index.php?page=mnt_venta&mode=DSP&idventas={{idventas}}">{{usercod}}</a></td>
        <td>{{idDispositivo}}</td>
        <td>{{idServicio}}</td>
        <td>{{precio}}</td>
        <td>{{isv}}</td>
        <td>{{total}}</td>
        <td>{{fechaFact}}</td>
        <td>
        {{if edit_enabled}}
          <form action="index.php" method="get">
             <input type="hidden" name="page" value="mnt_venta"/>
              <input type="hidden" name="mode" value="UPD" />
              <input type="hidden" name="idventas" value={{idventas}} />
              <button type="submit">Editar</button>
          </form>
        {{endif edit_enabled}}
        {{if delete_enabled}}
          <form action="index.php" method="get">
             <input type="hidden" name="page" value="mnt_venta"/>
              <input type="hidden" name="mode" value="DEL" />
              <input type="hidden" name="idventas" value={{idventas}} />
              <button type="submit">Eliminar</button>
          </form>
          {{endif delete_enabled}}
        </td>
      </tr>
      {{endfor items}}
    </tbody>
  </table>
</section>
<script>
   document.addEventListener("DOMContentLoaded", function () {
      document.getElementById("btnAdd").addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation();
        window.location.assign("index.php?page=mnt_venta&mode=INS&idventas=0");
      });
    });
</script>
