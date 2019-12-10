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
    </head>
    <body>
        <div class="container-fluid">
            <?php
            include '../Headers/cabecera_vacia.php';
            ?>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Quienes Somos</li>
                </ol>
            </nav>
            <div class="row">
                <div class="container">
                    <div class="jumbotron sobre_nosotros">
                        <div class="container-fluid text-center">
                            <h1>Quienes Somos</h1>
                            <div>
                                
                            </div>
                            <p>
                                <br>
                                <br>
                                <br>
                                El equipo de desarrollo de Wikiflix
                                <br>
                                <br>
                                <img src="../../img/wikiflix.svg" class="icono_grande">
                                <br>
                                <br>
                                ©2019 - Wikiflix - Todos los derechos reservados
                            </p>
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
        </div>


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="../../js/jquery-3.4.1.min.js"></script>
        <script src="../../js/popper.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
    </body>
</html>
