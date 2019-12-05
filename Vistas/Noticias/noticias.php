<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../../css/bootstrap.min.css">

        <!-- MyCSS -->
        <link rel="stylesheet" href="../../css/index.css">
        <link rel="stylesheet" href="../../css/menu_bootstrap.css">
    </head>
    <body class="background_listado">
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="../../js/jquery-3.4.1.min.js"></script>
        <script src="../../js/popper.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <div class="container-fluid">
            <?php
            include './Vistas/auxiliar/Persona.php';
            session_start();
            ob_start();


            //MOSTRAR MENU - NO REGISTRADOS
            include '../../Vistas/Headers/header.php';
            include '../../Vistas/Headers/cabecera_vacia.php';
//                include '../../Vistas/MenuDesplegable/menu_desplegable_no_registro.php';
            ?>
            <!--Miga de pan que marca el home-->
            <br>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Noticias</li>
                </ol>
            </nav>

            <div class="row">
                <div class="col-12">
                    <div class="panel_blanco">
                        <h1 class="centrado">Noticias Wikiflix</h1>
                    </div>
                </div>
            </div>
            <?php
            include '../../Vistas/Footers_iniciados/footer1.php';
            ?>
            <?php
            include '../../Vistas/Footers/footer2.php';
            ?>
        </div>
    </body>
</html>
