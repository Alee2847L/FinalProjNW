<section class="WWFilter">
</section>
<section class="WWList">
  <table>
    <thead>
    <h1>Gestión de Servicios</h1>
      <tr>
        <th>Código</th>
        <th>Id del usuario</th>
        <th>Id del dispositivo</th>
        <th>Nombre del servicio</th>
        <th>Tipo Servicio</th>
        <th>Descripcion</th>
        <th>precio</th>
        <th>Ciudad solicitud</th>
        <th><button id="btnAdd">Nuevo</button></th>
      </tr>
    </thead>
    <tbody>
      {{foreach items}}
      <tr>
        <td>{{idServicio}}</td>
        <td>{{usuarios_idUsuario}}</td>
        <td>{{dispositivos_idDispositivo}}</td>
        <td><a href="index.php?page=servicio&mode=DSP&idServicio={{idServicio}}">{{nombreServicio}}</a></td>
        <td>{{tipoServicio}}</td>
        <td>{{descripcionServicio}}</td>
        <td>{{precioServicio}}</td>
        <td>{{ciudades_idCiudad}}</td>
        <td>
          <form action="index.php" method="get">
             <input type="hidden" name="page" value="mnt_servicio"/>
              <input type="hidden" name="mode" value="UPD" />
              <input type="hidden" name="idServicio" value={{idServicio}} />
              <button type="submit">Editar</button>
          </form>
          <form action="index.php" method="get">
             <input type="hidden" name="page" value="mnt_servicio"/>
              <input type="hidden" name="mode" value="DEL" />
              <input type="hidden" name="idServicio" value={{idServicio}} />
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
        window.location.assign("index.php?page=mnt_servicio&mode=INS&idServicio=0");
      });
    });
</script>
