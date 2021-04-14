<section class="WWFilter">
</section>
<section class="WWList">
    <table>
        <thead>
            <tr>
                <!-- Te sugerimos -->
                <div class="sugerimos">
                    <div class="section">
                        <h3 class="center-align"><b>Servicios</b></h3>
                        <div class="container">
                            <div class="row">
                                <div class="col m4" id="btnservice">
                                    <div class="card z-depth-1">
                                        <div class="card-image">
                                            <img src="img/serv.png" alt="Imagen de asistencia" />
                                        </div>
                                        <div>
                                                <h3 class="center-align"><b>Servicios</b></h3>
                                                <script>
                                                    document.addEventListener("DOMContentLoaded", function() {
                                                        document.getElementById("btnservice").addEventListener("click", function(e) {
                                                            e.preventDefault();
                                                            e.stopPropagation();
                                                            window.location.assign("index.php?page=mnt_servicios");
                                                        });
                                                    });
                                                </script>
                                        </div>
                                    </div>
                                </div>

                                <div class="col m4" id="btndispositivo">
                                    <div class="card z-depth-1">
                                        <div class="card-image">
                                            <img src="img/asis.png" alt="Imagen de dispositivos de venta" />
                                        </div>
                                        <div>
                                                <h3 class="center-align"><b>Ventas</b></h3>
                                                <script>
                                                    document.addEventListener("DOMContentLoaded", function() {
                                                        document.getElementById("btndispositivo").addEventListener("click", function(e) {
                                                            e.preventDefault();
                                                            e.stopPropagation();
                                                            window.location.assign("index.php?page=mnt_ventas");
                                                        });
                                                    });
                                                </script>
                                        </div>
                                    </div>
                                </div>
                                <div class="col m4" id="btnlugar">
                                    <div class="card z-depth-1">
                                        <div class="card-image">
                                            <img src="img/lugar.png" alt="Imagen de lugar de pedido" />
                                        </div>
                                        <div>
                                                <h3 class="center-align"><b>Lugares</b></h3>
                                                <script>
                                                    document.addEventListener("DOMContentLoaded", function() {
                                                        document.getElementById("btnlugar").addEventListener("click", function(e) {
                                                            e.preventDefault();
                                                            e.stopPropagation();
                                                            window.location.assign("index.php?page=mnt_lugares");
                                                        });
                                                    });
                                                </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Final de Te sugerimos-->

            </tr>
        </thead>
    </table>
</section>