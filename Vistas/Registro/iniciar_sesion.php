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
                        <li class="breadcrumb-item active" aria-current="page">Iniciar Sesión</li>
                    </ol>
                </nav>
            </div>

            <div class="panel_negro">
                <div class="row h-100 justify-content-center align-items-center">
                    <div class="col-xl-6 col-lg-6 col-sm-6">
                        <form name="frmLogin" action="../../controlador.php" method="POST">
                            <h3 class="white centrado">Iniciar Sesión</h3>
                            <br>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Correo electrónico: </span>
                                </div>
                                <input type="email" class="form-control" id="usuario" name="usuario" value="espinosaduque@gmail.com" placeholder="Correo electrónico" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Contraseña: </span>
                                </div>
                                <input type="password" class="form-control" id="password" name="password" value="1" placeholder="Contraseña" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="container-fluid"> 
                                <div class="row align-items-center">
                                    <div class="col text-center">
                                        <button type="submit" id="iniciar" name="iniciar" class="btn btn-danger">Iniciar Sesión</button>
                                    </div>	
                                    <div class="col text-center">
                                        <a href="olvido.php"><button type="button" id="olvido" name="olvido" class="btn btn-danger">Olvidar contaseña</button></a>
                                    </div>	
                                    <div class="col text-center">
                                        <a href="registro.php"><button type="button" class="btn btn-danger">Registrarse</button></a>
                                    </div>
                                </div>
                            </div>
                        </form>
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
