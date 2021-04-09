<h1> Roles</h1>
<section class="WWFilter">

</section>
<section class="WWList">
  <table>
    <thead>
      <tr>
        <th>Código</th>
        <th>Roles</th>
        <th>Estado</th>
        <th><button id="btnAdd">Nuevo</button></th>
      </tr>
    </thead>
    <tbody>
      {{foreach items}}
      <tr>
        <td>{{rolescod}}</td>
        <td><a href="index.php?page=mnt_role&mode=DSP&rolescod={{rolescod}}">{{rolesdsc}}</a></td>
        <td>{{rolesest}}</td>
        <td>
          <form action="index.php" method="get">
             <input type="hidden" name="page" value="mnt_role"/>
              <input type="hidden" name="mode" value="UPD" />
              <input type="hidden" name="rolescod" value={{rolescod}} />
              <button type="submit">Editar</button>
          </form>
          <form action="index.php" method="get">
             <input type="hidden" name="page" value="mnt_role"/>
              <input type="hidden" name="mode" value="DEL" />
              <input type="hidden" name="rolescod" value={{rolescod}} />
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
        window.location.assign("index.php?page=mnt_role&mode=INS&rolescod=0");
      });
    });
</script>