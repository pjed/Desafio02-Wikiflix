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
        <script>
            $(function () {
                $operacion = "";
                $("#validar").click(function () {
                    $operacion = "Validar";
                });

                $("#modificar").click(function () {
                    $operacion = "Modificar";
                });

                $("#eliminar").click(function () {
                    $operacion = "Eliminar";
                });

                $("select.rol_usuario").change(function () {
                    $rol_usuario = $(this).children("option:selected").val();
                });
                

                $("select.rol_nuevo_usuario").change(function () {
                    $rol_nuevo_usuario = $(this).children("option:selected").val();
                });

                $("tbody tr").click(function () {
                    $('.selected').removeClass('selected');
                    $(this).addClass("selected");
                    $usuario = $('#usuario', this).val();
                    $password = $('#password', this).val();
                    $nombre = $('#nombre', this).val();
                    $apellidos = $('#apellidos', this).val();
                    $direccion = $('#direccion', this).val();
                    $telefono = $('#telefono', this).val();

                    alert($operacion + $usuario + $password + $nombre + $apellidos + $direccion + $telefono);

                    $.ajax({
                        data: {"operacion": $operacion, "usuario": $usuario, "password": $password, "nombre": $nombre, "apellidos": $apellidos, "direccion": $direccion, "telefono": $telefono}, //datos json recogidos del formulario formu
                        type: "POST", // método de envío de datos
                        url: "../auxiliar/servidor_crud.php", //código a ejecutar en el servidor
                        success: function (respuesta) {
                            var variable = JSON.parse(respuesta); //conversión a json de los datos de respuesta
//                            if (variable !== null) {
//                                $("#titulo").html(variable[0].nombre);
//                                $("#direccion").html(variable[0].direccion);
//                                $("#produccion").html(variable[0].produccion);
//                                $("#guion").html(variable[0].guion);
//                                $("#musica").html(variable[0].musica);
//                                $("#pais").html(variable[0].pais);
//                                $("#ano").html(variable[0].ano);
//                                $("#estreno").html(variable[0].estreno);
//                                $("#duracion").html(variable[0].duracion);
//                                $("#idiomas").html(variable[0].idiomas);
//                                $("#productora").html(variable[0].productora);
//                                $("#distribucion").html(variable[0].distribucion);
//                                $("#presupuesto").html(variable[0].presupuesto);
//                                $("#recaudacion").html(variable[0].recaudacion);
//                                $("#argumento").html(variable[0].argumento);
//                                $("#foto").attr('src', 'data:image/png;base64,' + variable[0].foto);
//                                if (variable[1].puntuacion != "0") {
//                                    $("#puntos").val(variable[1].puntuacion);
//                                    $('#puntos').attr('disabled', true);
//                                } else {
//                                    $("#puntos").val("0");
//                                    $('#puntos').prop("disabled", false);
//                                }
//                                $("#media_pelicula").html(variable[2].media);
//                            } else {
//                                alert("Se ha producido un error de ajax");
//                            }
                        }
                    });

                });
            });
        </script>

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
                        <li class="breadcrumb-item"><a href="#">Administración</a></li>
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
                                            <th class="blanco" scope="col">Password</th>
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
                                            <tr>
                                                <td></td>
                                                <td class="modificar"><button type="button" id="modificar" name="modificar" class="btn btn-danger validar"><span class="glyphicon glyphicon-pencil validar"></span></button></td>
                                                <td class="eliminar"><button type="button" id="eliminar" name="eliminar" class="btn btn-danger validar"><span class="glyphicon glyphicon glyphicon-trash validar"></span></button></td>
                                                <td class="usuario"><input type="text" style="width: 100%;" class="texto_centrado validar" id="usuario" name="nombre" value="<?php echo $usuario->getEmail() ?>"></td>
                                                <td class="password"><input type="text" style="width: 100%;" class="texto_centrado validar" id="password" name="password" value="<?php echo Codificar::codificarCadena($usuario->getContrasena()) ?>"></td>
                                                <td class="nombre"><input type="text" style="width: 100%;" class="texto_centrado validar" id="nombre" name="nombre" value="<?php echo $usuario->getNombre() ?>"></td>
                                                <td class="apellidos"><input type="text" style="width: 100%;" class="texto_centrado validar" id="apellidos" name="apellidos" value="<?php echo $usuario->getApellidos() ?>"></td>
                                                <td class="direccion"><input type="text" style="width: 100%;" class="texto_centrado validar" id="direccion" name="direccion" value="<?php echo $usuario->getDireccion() ?>"></td>
                                                <td class="telefono"><input type="text" style="width: 100%;" class="texto_centrado validar" id="telefono" name="telefono" value="<?php echo $usuario->getTelefono() ?>"></td>
                                                <td class="rol_usuario">
                                                    <select id="rol_usuario" style="width: 100%;" class="texto_centrado validar">
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
                                            <?php
                                        }
                                        ?>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td class="validar"><button type="button" id="validar" name="validar" class="btn btn-danger validar" name="validar" id="validar"><span class="glyphicon glyphicon-ok validar"></span></button></td>
                                            <td class="usuario"><input type="text" style="width: 100%;" class="texto_centrado validar" placeholder="Usuario" id="usuario" name="nombre" value=""></td>
                                            <td class="password"><input type="text" style="width: 100%;" class="texto_centrado validar" placeholder="Password" id="password" name="password" value=""></td>
                                            <td class="nombre"><input type="text" style="width: 100%;" class="texto_centrado validar" id="nombre" placeholder="Nombre" name="nombre" value=""></td>
                                            <td class="apellidos"><input type="text" style="width: 100%;" class="texto_centrado validar" id="apellidos" placeholder="Apellidos" name="apellidos" value=""></td>
                                            <td class="direccion"><input type="text" style="width: 100%;" class="texto_centrado validar" id="direccion" placeholder="Direccion" name="direccion" value=""></td>
                                            <td class="telefono"><input type="text" style="width: 100%;" class="texto_centrado validar" id="telefono" placeholder="Telefono" name="telefono" value=""></td>
                                            <td class="rol_usuario">
                                                <select id="rol_nuevo_usuario" style="width: 100%;" class="texto_centrado validar">
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
            <?php
            include '../Footers/footer1.php';
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
