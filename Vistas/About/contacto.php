<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../../css/bootstrap.min.css">

        <!-- MyCSS -->
        <link rel="stylesheet" href="../../css/index.css">
        <link rel="stylesheet" href="../../css/menu_bootstrap.css">

        <script src="../../js/gmaps.js"></script>
        <script src="../../js/jquery-3.4.1.min.js"></script>
        <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwKmL1KMaYg3Hl6ggnEnCVgCCHhtsgvEU&libraries=drawing&callback=initMap"
        async defer></script>


        <script>
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(Sacalugar, nofunciona);
            } else {
                alert("En este navegador no rula la geolocalización");
            }

            function Sacalugar(position) {
//                        var latitud_actual = position.coords.latitude;
//                        var longitud_actual = position.coords.longitude;

                var latitud = 38.693277;
                var longitud = -4.108213;

                //alert("Estas en la latitud: " + latitud + ", longitud: " + longitud);
                var mapa = new google.maps.LatLng(latitud, longitud);
//                        var posicion_actual = new google.maps.LatLng(latitud_actual, longitud_actual);

                var ColocaMapa = {
                    zoom: 17,
                    center: mapa,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };

//                        var ColocaMapaActual = {
//                            zoom: 15,
//                            center: posicion_actual,
//                            mapTypeId: google.maps.MapTypeId.ROADMAP
//                        };


                var PintaMapa = new google.maps.Map(document.getElementById("map"), ColocaMapa);
//                        var PintaMapaActual = new google.maps.Map(document.getElementById("map"), ColocaMapaActual);
                // var vercalle = new google.maps.StreetViewPanorama(document.getElementById("map"), calle);


                var marca = new google.maps.Marker({
                    position: mapa,
                    map: PintaMapa
                });

//                        var marca = new google.maps.Marker({
//                            position: posicion_actual,
//                            map: PintaMapaActual
//                        });
            }

            function nofunciona(position) {
                alert("Aqui no funciona na");
            }
            ;
        </script>

    </head>
    <body>
        <div class="container-fluid">
            <?php
            include '../Headers/cabecera_vacia.php';
            ?>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contacto</li>
                </ol>
            </nav>
            <div class="container">
                <div class="jumbotron sobre_nosotros col-12">
                    <div class="row">
                        <div class="col-6">
                            <div class="container-fluid text-center">
                                <h4>Ubicación</h4>
                                <div class="map" id="map"></div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="container-fluid text-center">
                                <h4>Datos de Interés</h4><br>
                                <form name="frmContacto">
                                    <label>Dirección: Paseo de San Gregorio - Edificio CIFP Virgen de Gracia</label><br>
                                    <label>Número de Teléfono: 123456789</label><br>
                                    <label>Preguntar por Pedro Javier Espinosa Duque</label><br>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            include '../Footers_iniciados/footer1.php';
            ?>
            <?php
            include '../Footers/footer2.php';
            ?>
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="../../js/jquery-3.4.1.min.js"></script>
            <script src="../../js/popper.min.js"></script>
            <script src="../../js/bootstrap.min.js"></script>
    </body>
</html>
