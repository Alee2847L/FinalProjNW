<h1> Funciones</h1>
<section class="WWFilter">

</section>
<section class="WWList">
  <table>
    <thead>
      <tr>
        <th>Código</th>
        <th>Funcion Descripcion</th>
        <th>Estado</th>
        <th>Funcion Tipo</th>
        <th><button id="btnAdd">Nuevo</button></th>
      </tr>
    </thead>
    <tbody>
      {{foreach items}}
      <tr>
        <td>{{fncod}}</td>
        <td><a href="index.php?page=mnt_funcion&mode=DSP&fncod={{fncod}}">{{fndsc}}</a></td>
        <td>{{fnest}}</td>
        <td>{{fntyp}}</td>
        <td>
          <form action="index.php" method="get">
             <input type="hidden" name="page" value="mnt_funcion"/>
              <input type="hidden" name="mode" value="UPD" />
              <input type="hidden" name="fncod" value={{fncod}} />
              <button type="submit">Editar</button>
          </form>
          <form action="index.php" method="get">
             <input type="hidden" name="page" value="mnt_funcion"/>
              <input type="hidden" name="mode" value="DEL" />
              <input type="hidden" name="fncod" value={{fncod}} />
              <button type="submit">Eliminar</button>
          </form>
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
        window.location.assign("index.php?page=mnt_funcion&mode=INS&catid=0");
      });
    });
</script>