<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include '../../Vistas/auxiliar/Persona.php';
session_start();
?>

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
        <?php
        if (isset($_SESSION['usuario'])) {
            $usuarios = $_SESSION['usuario'];

            $usuRegistrado = null;
            $usuAdmin = null;
            $index = 1;
            foreach ($usuarios as $fila) {
                if ($index == 2) {
                    $usuAdmin = $fila;
                } else {
                    $usuRegistrado = $fila;
                }
                $index++;
            }
        }
        ?>

        <div class="container-fluid">
            <?php
            include '../Registro/cabecera_registro.php';
            ?>
            <div class="panel_blanco_bread">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ver Perfil</li>
                    </ol>
                </nav>
            </div>

            <div class="panel_blanco">
                <div class="row justify-content-center align-items-center">
                    <div class="col-4">

                        <h3 class="centrado">Ver Perfil</h3>
                        <br>
                        <div class="panel_blanco">
                            <form name="frmPerfil" action="../../controlador.php" method="POST">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" readonly id="basic-addon1">Email: </span>
                                    </div>
                                    <input type="email" class="form-control" readonly id="email" name="email" value="<?php echo $usuRegistrado->getEmail() ?>" placeholder="nombre@dominio.com" aria-label="Email" aria-describedby="basic-addon1" required>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Nombre: </span>
                                    </div>
                                    <input type="text" class="form-control" id="nombre" name="nombre" required value="<?php echo $usuRegistrado->getNombre() ?>" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1" required>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Apellidos: </span>
                                    </div>
                                    <input type="text" class="form-control" id="apellidos" name="apellidos" required placeholder="Apellidos" value="<?php echo $usuRegistrado->getApellidos() ?>" aria-label="Apellidos" aria-describedby="basic-addon1" required>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Dirección: </span>
                                    </div>
                                    <input type="text" class="form-control" id="direccion" name="direccion" required placeholder="Dirección" aria-label="Dirección" value="<?php echo $usuRegistrado->getDireccion() ?>" aria-describedby="basic-addon1" required>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Teléfono: </span>
                                    </div>
                                    <input type="text" pattern="\d*" maxlength="9" id="telefono" name="telefono" required class="form-control" placeholder="000000000" min="9" value="<?php echo $usuRegistrado->getTelefono() ?>" aria-label="Teléfono" aria-describedby="basic-addon1" required>
                                </div>
                                <br>
                                <div class="container-fluid"> 
                                    <div class="row align-items-center">
                                        <div class="col text-center">
                                            <input type="submit" class="btn btn-danger" id="perfil" name="perfil" value="Modificar">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="container-fluid"> 
                                    <div class="row align-items-center">
                                        <div class="col text-center">
                                            <a href="../../index.php"><button type="button" class="btn btn-danger">Ir al index</button></a>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
