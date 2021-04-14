<section class="WWFilter">
</section>
<section class="WWList">
  <table>
    <thead>
        <h3 class="center-align"><b>Servicios</b></h3>
            <div class="container">
                 <div class="row">
                    {{foreach items}}
                    <div class="col s12 m4">
                        <div class="card">
                                <div class="card-image">
                                  <img src="img/serv.png">
                                </div>
                            <div class="card-content">
                                <h5 class="center-align">{{nombreServ}}</h5>
                                <p class="center-align">{{desc_serv}}</p>
                            </div>
                            <div class="card-action center">
                                <a class="btn">Solicitar Servicio<i class="fas fa-arrow-right right"></i></a>
                            </div>
                        </div>
                    </div>
                    {{endfor items}}
                </div>
             </div>
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
