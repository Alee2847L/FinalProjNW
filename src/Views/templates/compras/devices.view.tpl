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
                                <div class="card-content">
                                    <h5 class="center-align" ref="index.php?page=compras_compra&mode=DSP&idDisp={{idDispositivo}}">{{nombre}}</h5>
                                    <h5 class="center-align">{{marca}}</h5>
                                    <h5 class="center-align">{{precioUnitario}}</h5>
                                    
                                </div>
                                <div class="card-action center">
                                 <form action="index.php" method="get">
                                    <input type="hidden" name="page" value="compras_compra"/>
                                      <input type="hidden" name="mode" value="INS" />
                                      <input type="hidden" name="idDispositivo" value={{idDispositivo}} />
                                      <button type="submit" class="btn">Comprar ahora<i class="fas fa-arrow-right right"></i></button>
                                  </form>
                                </div>
                                <div class="card-action center">
                                 <form action="index.php" method="get">
                                    <input type="hidden" name="page" value="compras_carrito"/>
                                      <input type="hidden" name="mode" value="INS" />
                                      <input type="hidden" name="idDispositivo" value={{idDispositivo}} />
                                      <button type="submit" class="btn">Add carrito<i class="fas fa-shopping-cart right"></i></button>
                                  </form>
                                </div>
                                  {{if showaction}}
                                    <button type="submit" name="btnGuardar" value="G">Guardar</button> 
                                  {{endif showaction}}
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
