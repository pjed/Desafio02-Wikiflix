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
            
            <div class="panel_blanco_bread">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Olvidar Contraseña</li>
                    </ol>
                </nav>
            </div>
            <div class="panel_negro">
                <div class="row h-100 justify-content-center align-items-center">
                    <div class="col-4">
                        <form name="frmRegistro" action="../../controlador.php" method="POST">
                            <h3 class="white centrado">Contraseña olvidada</h3>
                            <br>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Email: </span>
                                </div>
                                <input type="email" class="form-control" id="email" name="email" required placeholder="nombre@dominio.com" aria-label="Email" aria-describedby="basic-addon1" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Contraseña: </span>
                                </div>
                                <input type="password" class="form-control" id="password" name="password" required placeholder="Contraseña" aria-label="Contraseña" aria-describedby="basic-addon1" required>
                            </div>
                            
                            <div class="container-fluid"> 
                                <div class="row align-items-center">
                                    <div class="col text-center">
                                        <button type="submit" class="btn btn-danger" id="cambiar" name="cambiar">Cambiar</button>
                                    </div>
                                    <div class="col text-center">
                                        <a href="../Registro/iniciar_sesion.php"><button type="button" class="btn btn-danger">Volver</button></a>
                                    </div>
                                </div>
                            </div>
                        </form>
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
