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
    <body class="background">
        <div class="container-fluid">
            <?php
            include '../Registro/cabecera_registro_solo_logo.php';
            ?>
            <div class="panel_negro blanco">
                <div class="row h-100 justify-content-center align-items-center">
                    <div class="col-4">
                        <h1>Error</h1>
                        <h3>Usuario y/o contraseña incorrectos</h3>
                        <div class="container-fluid"> 
                            <div class="row align-items-center">
                                <div class="col text-center">
                                    <a href="../../Vistas/Registro/iniciar_sesion.php"><button type="button" class="btn btn-danger">Volver al login</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="../../js/jquery-3.4.1.min.js"></script>
        <script src="../../js/popper.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
    </body>
    <?php
    include '../Footers_iniciados/footer1.php';
    ?>
    <?php
    include '../Footers/footer2.php';
    ?>
</html>
