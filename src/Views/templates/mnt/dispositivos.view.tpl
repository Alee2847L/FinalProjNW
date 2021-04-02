<section class="WWFilter">
</section>
<section class="WWList">
  <table>
    <thead>
    <h1>Gestión de Dispositivos</h1>
      <tr>
        <th>Código</th>
        <th>Nombre</th>
        <th>Marca</th>
        <th>Serie</th>
        <th>IDCategoria</th>
        <th>Precio</th>
        <th>stock</th>
        <th><button id="btnAdd">Nuevo</button></th>
      </tr>
    </thead>
    <tbody>
      {{foreach items}}
      <tr>
        <td>{{idDispositivo}}</td>
        <td><a href="index.php?page=mnt_dispositivo&mode=DSP&idDispositivo={{idDispositivo}}">{{nombre}}</a></td>
        <td>{{marca}}</td>
        <td>{{serie}}</td>
        <td>{{categorias_idCategoria}}</td>
        <td>{{precioUnitario}}</td>
        <td>{{stock}}</td>


        <td>
          <form action="index.php" method="get">
             <input type="hidden" name="page" value="mnt_dispositivo"/>
              <input type="hidden" name="mode" value="UPD" />
              <input type="hidden" name="idDispositivo" value={{idDispositivo}} />
              <button type="submit">Editar</button>
          </form>
          <form action="index.php" method="get">
             <input type="hidden" name="page" value="mnt_dispositivo"/>
              <input type="hidden" name="mode" value="DEL" />
              <input type="hidden" name="idDispositivo" value={{idDispositivo}} />
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
        window.location.assign("index.php?page=mnt_dispositivo&mode=INS&idDispositivo=0");
      });
    });
</script>
