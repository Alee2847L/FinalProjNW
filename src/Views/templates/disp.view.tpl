<section class="WWFilter">
</section>
<section class="WWList">
    <table>
        <thead>
            <tr>
                <!-- Te sugerimos -->
                <div class="sugerimos">
                    <div class="section">
                        <h3 class="center-align"><b>Dispositivos</b></h3>
                        <div class="container">
                            <div class="row">
                                <div class="col m4" id="btncat">
                                    <div class="card z-depth-1">
                                        <div class="card-image">
                                            <img src="img/asistencia.1.png" alt="Imagen de asistencia" />


                                        </div>
                                        <div>
                                            <li>
                                                <h3 class="center-align"><b>Categoria</b></h3>
                                                <script>
                                                    document.addEventListener("DOMContentLoaded", function() {
                                                        document.getElementById("btncat").addEventListener("click", function(e) {
                                                            e.preventDefault();
                                                            e.stopPropagation();
                                                            window.location.assign("index.php?page=mnt_categorias");
                                                        });
                                                    });
                                                </script>
                                            </li>
                                        </div>
                                    </div>
                                </div>

                                <div class="col m4" id="btndispositivo">
                                    <div class="card z-depth-1">
                                        <div class="card-image">
                                            <img src="img/devices.png" alt="Imagen de dispositivos de venta" />
                                        </div>
                                        <div>
                                            <li>
                                                <h3 class="center-align"><b>Dispositivos</b></h3>
                                                <script>
                                                    document.addEventListener("DOMContentLoaded", function() {
                                                        document.getElementById("btndispositivo").addEventListener("click", function(e) {
                                                            e.preventDefault();
                                                            e.stopPropagation();
                                                            window.location.assign("index.php?page=mnt_dispositivos");
                                                        });
                                                    });
                                                </script>
                                            </li>
                                        </div>
                                    </div>
                                </div>

                                <div class="col m4" id="btnproveedores">
                                    <div class="card z-depth-1">
                                        <div class="card-image">
                                            <img src="img/devices.png" alt="Imagen de dispositivos de venta" />
                                        </div>
                                        <div>
                                            <li>
                                                <h3 class="center-align"><b>Proveedores</b></h3>
                                                <script>
                                                    document.addEventListener("DOMContentLoaded", function() {
                                                        document.getElementById("btnproveedores").addEventListener("click", function(e) {
                                                            e.preventDefault();
                                                            e.stopPropagation();
                                                            window.location.assign("index.php?page=mnt_proveedores");
                                                        });
                                                    });
                                                </script>
                                            </li>
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