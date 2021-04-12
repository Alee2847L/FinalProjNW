<section class="WWFilter">
</section>
<section class="WWList">
  <table>
    <thead>
    <h1>Gestión de Proveedores de Producto</h1>
      <tr>
        <th>Código</th>
        <th>Nombre Proveedor</th>
        <th>Correo Proveedor</th>
        <th>Número Proveedor</th>
        <th>Dirección Proveedor</th>
        <th><button id="btnAdd">Nuevo</button></th>
      </tr>
    </thead>
    <tbody>
      {{foreach items}}
      <tr>
        <td>{{idProveedor}}</td>
        <td><a href="index.php?page=mnt_proveedor&mode=DSP&idProveedor={{idProveedor}}">{{nombreProveedor}}</a></td>
        <td>{{correoProveedor}}</td>
        <td>{{numeroProveedor}}</td>
        <td>{{direccionProveedor}}</td>
        <td>
          <form action="index.php" method="get">
             <input type="hidden" name="page" value="mnt_proveedor"/>
              <input type="hidden" name="mode" value="UPD" />
              <input type="hidden" name="idProveedor" value={{idProveedor}} />
              <button type="submit">Editar</button>
          </form>
          <form action="index.php" method="get">
             <input type="hidden" name="page" value="mnt_proveedor"/>
              <input type="hidden" name="mode" value="DEL" />
              <input type="hidden" name="idProveedor" value={{idProveedor}} />
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
        window.location.assign("index.php?page=mnt_proveedor&mode=INS&idProveedor=0");
      });
    });
</script>
