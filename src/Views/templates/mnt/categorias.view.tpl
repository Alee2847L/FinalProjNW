<section class="WWFilter">
</section>
<section class="WWList">
  <table>
    <thead>
    <h1>Gestión de Categorías</h1>
      <tr>
        <th>Código</th>
        <th>Categoría</th>
        <th><button id="btnAdd">Nuevo</button></th>
      </tr>
    </thead>
    <tbody>
      {{foreach items}}
      <tr>
        <td>{{idCategoria}}</td>
        <td><a href="index.php?page=mnt_categoria&mode=DSP&idCategoria={{idCategoria}}">{{nombreCategoria}}</a></td>
        <td>
          <form action="index.php" method="get">
             <input type="hidden" name="page" value="mnt_categoria"/>
              <input type="hidden" name="mode" value="UPD" />
              <input type="hidden" name="idCategoria" value={{idCategoria}} />
              <button type="submit">Editar</button>
          </form>
          <form action="index.php" method="get">
             <input type="hidden" name="page" value="mnt_categoria"/>
              <input type="hidden" name="mode" value="DEL" />
              <input type="hidden" name="idCategoria" value={{idCategoria}} />
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
        window.location.assign("index.php?page=mnt_categoria&mode=INS&idCategoria=0");
      });
    });
</script>
