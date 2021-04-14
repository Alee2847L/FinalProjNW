<section class="WWFilter">
</section>
<section class="WWList">
  <table>
    <thead>
    <h1>Gestión de Ciudades</h1>
      <tr>
        <th>Código</th>
        <th>Ciudad</th>
        <th>
          {{if new_enabled}}
            <button id="btnAdd">Nuevo</button>
          {{endif new_enabled}}
        </th>
      </tr>
    </thead>
    <tbody>
      {{foreach items}}
      <tr>
        <td>{{idCiudad}}</td>
        <td><a href="index.php?page=mnt_lugar&mode=DSP&idCiudad={{idCiudad}}">{{nombreCiudad}}</a></td>
        <td>
        {{if ~edit_enabled}}
          <form action="index.php" method="get">
             <input type="hidden" name="page" value="mnt_lugar"/>
              <input type="hidden" name="mode" value="UPD" />
              <input type="hidden" name="idCiudad" value={{idCiudad}} />
              <button type="submit">Editar</button>
          </form>
          {{endif ~edit_enabled}}
          {{if ~delete_enabled}}
          <form action="index.php" method="get">
             <input type="hidden" name="page" value="mnt_lugar"/>
              <input type="hidden" name="mode" value="DEL" />
              <input type="hidden" name="idCiudad" value={{idCiudad}} />
              <button type="submit">Eliminar</button>
          </form>
          {{endif ~delete_enabled}}
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
        window.location.assign("index.php?page=mnt_categoria&mode=INS&idCategoria=0");
      });
    });
</script>
