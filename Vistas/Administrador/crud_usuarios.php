<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
include '../../Vistas/auxiliar/Pelicula.php';
include '../../Vistas/auxiliar/Persona.php';
include '../../Vistas/auxiliar/Codificar.php';
session_start();
include '../Registro/cabecera_registro_solo_logo.php';
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

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="../../js/jquery-3.4.1.min.js"></script>
        <script src="../../js/popper.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>


    </head>
    <body class="background">
        <div class="container-fluid">
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

            <div class="panel_blanco_bread">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
                        <li class="breadcrumb-item">Administración</li>
                        <li class="breadcrumb-item active" aria-current="page">CRUD Usuarios</li>
                    </ol>
                </nav>
            </div>
            <div class="panel_negro">
                <div class="row h-100 justify-content-center align-items-center">
                    <form name="frmCRUD" action="../../controlador_admin.php" method="POST">
                        <div class="row centrado">
                            <div class="col-12">
                                <input type="submit" class="btn btn-danger" name="crud" id="crud" value="Ver Usuarios">    
                            </div>
                        </div>
                        <div class="col-12">

                            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
                            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                            <?php
                            if (isset($_SESSION['usuarios_crud'])) {
                                $usuarios = $_SESSION['usuarios_crud'];
                                ?>
                                <table class="table-responsive" id="tabla">
                                    <thead>
                                        <tr>
                                            <th class="blanco" scope="col"></th>
                                            <th class="blanco" scope="col"></th>
                                            <th class="blanco" scope="col"></th>
                                            <th class="blanco" scope="col">Usuario</th>
                                            <th class="blanco" scope="col">Nombre</th>
                                            <th class="blanco" scope="col">Apellidos</th>
                                            <th class="blanco" scope="col">Direccion</th>
                                            <th class="blanco" scope="col">Teléfono</th>
                                            <th class="blanco" scope="col">Rol</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($usuarios as $usuario) {
                                            ?>

                                        <form>
                                            <tr>
                                                <td></td>
                                                <td><button type="submit" id="modificar_crud" name="modificar_crud" class="btn btn-danger validar"><span class="glyphicon glyphicon-pencil validar"></span></button></td>
                                                <td><button type="submit" id="eliminar_crud" name="eliminar_crud" class="btn btn-danger validar"><span class="glyphicon glyphicon glyphicon-trash validar"></span></button></td>
                                                <td><input type="text" style="width: 100%;" class="texto_centrado validar" readonly id="usuario" name="usuario" required value="<?php echo $usuario->getEmail() ?>"></td>
                                                <td><input type="text" style="width: 100%;" class="texto_centrado validar" id="nombre" name="nombre" required value="<?php echo $usuario->getNombre() ?>"></td>
                                                <td><input type="text" style="width: 100%;" class="texto_centrado validar" id="apellidos" name="apellidos" required value="<?php echo $usuario->getApellidos() ?>"></td>
                                                <td><input type="text" style="width: 100%;" class="texto_centrado validar" id="direccion" name="direccion" required value="<?php echo $usuario->getDireccion() ?>"></td>
                                                <td><input type="text" style="width: 100%;" class="texto_centrado validar" id="telefono" name="telefono" required value="<?php echo $usuario->getTelefono() ?>"></td>
                                                <td>
                                                    <select name="rol_usuario" style="width: 100%;" class="texto_centrado validar">
                                                        <?php
                                                        if ($usuario->getIdroles() === 1) {
                                                            ?>
                                                            <option value="1" selected>Registrado</option>
                                                            <option value="2">Administrador</option>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <option value="1" >Registrado</option>
                                                            <option value="2" selected>Administrador</option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </td>

                                            </tr>
                                        </form>
                                        <?php
                                    }
                                    ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td ><button type="submit" id="validar_crud" name="validar_crud" class="btn btn-danger validar" name="validar" id="validar"><span class="glyphicon glyphicon-ok validar"></span></button></td>
                                        <td class="usuario"><input type="text" style="width: 100%;"  class="texto_centrado validar" placeholder="Usuario" id="usuario_nuevo" name="usuario_nuevo" value=""></td>
                                        <td class="nombre"><input type="text" style="width: 100%;"  class="texto_centrado validar" id="nombre_nuevo" placeholder="Nombre" name="nombre_nuevo" value=""></td>
                                        <td class="apellidos"><input type="text" style="width: 100%;"  class="texto_centrado validar" id="apellidos_nuevo" placeholder="Apellidos" name="apellidos_nuevo" value=""></td>
                                        <td class="direccion"><input type="text" style="width: 100%;"  class="texto_centrado validar" id="direccion_nuevo" placeholder="Direccion" name="direccion_nuevo" value=""></td>
                                        <td class="telefono"><input type="text" style="width: 100%;"  class="texto_centrado validar" id="telefono_nuevo" placeholder="Telefono" name="telefono_nuevo" value=""></td>
                                        <td class="rol_usuario">
                                            <select id="rol_nuevo" name="rol_nuevo" style="width: 100%;" class="texto_centrado validar">
                                                <option value="1">Registrado</option>
                                                <option value="2">Administrador</option>
                                            </select>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <?php
                            }
                            ?>
                            <br>
                            <div class="container-fluid"> 
                                <div class="row align-items-center">
                                    <div class="col text-center">
                                        <a href="../../index.php"><button type="button" class="btn btn-danger">Volver al index</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="../../js/jquery-3.4.1.min.js"></script>
            <script src="../../js/popper.min.js"></script>
            <script src="../../js/bootstrap.min.js"></script>
        </div>
    </body>
    <?php
    if (!isset($_SESSION['usuario'])) {
        include '../Footers_iniciados/footer_noregistro.php';
    } else {
        include '../Footers_iniciados/footer1.php';
    }
    ?>
    <?php
    include '../Footers/footer2.php';
    ?>
</html>
