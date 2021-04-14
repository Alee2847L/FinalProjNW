<section class="WWFilter">
</section>
<section class="WWList">
  <table>
    <thead>
        <div class="sugerimos">
            <div class="section">
                  <h3 class="center-align"><b>Dispositivos</b></h3>
                  <div class="container">
                      <div class="row">
                        {{foreach items}}
                           <div class="col s12 m3">
                              <div class="card">
                                <div class="card-image">
                                  <img src="{{urldip}}">
                                </div>
                                
                                <div class="card-action center">
                                    <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="fas fa-times"></i></a>
                                </div>
                                <div class="card-content">
                                    <h5 class="center-align" ref="index.php?page=compras_compra&mode=DSP&idDisp={{idDispositivo}}">{{nombre}}</h5>
                                    <h5 class="center-align">{{marca}}</h5>
                                    <h5 class="center-align">{{precioUnitario}}</h5>
                                    
                                </div>
                            </div>
                              </div>
                            </div>
                        {{endfor items}}
                      </div>
                   </div>
              </div>
          </div>
  </table>
</section>
<script>
   document.addEventListener("DOMContentLoaded", function () {
      document.getElementById("btnAdd").addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation();
        window.location.assign("index.php?page=compras_compra&mode=&idDispositivo={{idDispositivo}}");
      });
    });
</script>
